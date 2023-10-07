<?php

namespace App\Http\Controllers;

use App\booking;
use App\categoryTag;
use App\checkout;
use App\followup;
use App\landPage;
use App\message;
use App\problemfollowup;
use App\reserve;
use App\student;
use App\tag;
use App\User;
use App\verify;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use SweetAlert;
use Shetabit\Visitor\Traits\Visitor;




class AdminController extends BaseController
{

    public function __construct()
    {
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');

        $api=config('kavenegar')['apikey'];
        $this->client=new client(
            [
                'headers' => [
                    'Accept' => 'application/json; charset=utf-8'
                ],
                'base_uri' => 'http://api.kavenegar.com/v1/'.$api.'/sms/',
                'timeout'  => 3.0,
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Gate::allows('isAdmin')||Gate::allows('isEducation'))
        {

            $dateNow=$this->dateNow;

            $followupToday=User::join('followups','users.id','=','followups.user_id')
                    ->where('nextfollowup_date_fa','=',$dateNow)
                    ->where('flag','=',1)
                    ->wherenotIn('users.type',[2,12])
                    ->groupby('users.id')
                    ->get();


            $expirefollowupToday=User::join('followups','users.id','=','followups.user_id')
                    ->where('nextfollowup_date_fa','<',$dateNow)
                    ->where('flag','=',1)
                    ->where('followby_expert','=',Auth::user()->id)
//                    ->wherenotIn('users.type',[2,12])
                    ->count();

            $usersEducation=user::orwhere('type','=',3)
                        ->orwhere('type','=',4)
                        ->get();

//            $sumcancelfollowup=0;
//            $sumallFollowups=0;
//            $sumtodayFollowups=0;
//            $sumfollowedTodaybyID=0;
//            $sumcontinuefollowup=0;
//            $sumwaiting=0;
//            $sumstudents=0;
//            $sumnoanswering=0;
//            $suminsertuser=0;
//            $sumtalktimeToday=0;
//            $sumtalktime=0;



            if(isset($_GET['range']))
            {
                $this->validate($request,[
                    'start_date'    =>'required|string',
                ]);
                $request['start_date']=explode(' ~ ',$request['start_date']);
            }
            else
            {
                $request['start_date']=[$this->dateNow,$this->dateNow];

            }

            if(isset($request['start_date']))
            {

                $date_en=[$this->changeTimestampToMilad($request['start_date'][0])." 00:00:00",$this->changeTimestampToMilad($request['start_date'][1])." 23:59:59"];
            }
            else
            {

                $date_en=[$this->changeTimestampToMilad($request['start_date'][0])." 00:00:00",$this->changeTimestampToMilad($request['start_date'][1])." 23:59:59"];
            }

            //جلسات رزرو شده در امروز
            $condition=['created_at','like',$this->changeTimestampToMilad($this->dateNow).'%'];
            $countBookingReserve=$this->get_reserve(NULL,NULL,NULL,NULL,$condition,NULL,'get');

            //تعداد رزرو شده برای امروز
            $bookingsToday=booking::where('status','=',0)
                        ->where('start_date','=',$this->dateNow)
                        ->get();



            $dateNowMiladi=$this->changeTimestampToMilad($this->dateNow);

            //میزان واریزی امروز
            $checkoutToday=checkout::where('created_at','like','%'.$dateNowMiladi.'%')
                        ->where('status','=',1)
                        ->sum('price');
            //تعداد ثبت نام امروز
            $insertUserToday=User::where('created_at','like','%'.$dateNowMiladi.'%')
                                    ->count();

            //تعداد ورودی امروز
            $loginUserToday=User::where('last_login_at','like','%'.$dateNowMiladi.'%')
                            ->whereNotIn('type',[2,3])
                            ->count();

            $users=User::get();













//            $countUnreadMessages=$this->countUnreadMessages();
            return view('admin.home')
                        ->with('date_en',$date_en)
                        ->with('dateNow',$dateNow)
                        ->with('rangeDate',$request['start_date'])
                        ->with('followupToday',$followupToday)
                        ->with('expirefollowupToday',$expirefollowupToday)
                        ->with('countBookingReserve',$countBookingReserve)
                        ->with('usersEducation',$usersEducation)
                        ->with('countBookingReserve',$countBookingReserve)
                        ->with('bookingsToday',$bookingsToday)
                        ->with('checkoutToday',$checkoutToday)
                        ->with('insertUserToday',$insertUserToday)
                        ->with('loginUserToday',$loginUserToday)
                        ->with('users',$users);
        }
        else if(Gate::allows('isUser'))
        {

            $user=(Auth::user());
            if(($user->status_coach==-2)||($user->status_coach==1))
            {
                $user=User::join('coaches','users.id','=','coaches.user_id')
                            ->where('users.id','=',$user->id)
                            ->select('users.*','coaches.id as id_coaches_table')
                            ->first();
            }

            if(strlen($user->personal_image)==0)
            {
                $user->personal_image="default-avatar.png";
            }

            //تعداد افراد دعوت شده
            $countIntroducedUser=User::where('introduced','=',$user->id)
                ->count();

            //یوزر توسط چه کسی معرفی شده است
            $resourceIntroduce=User::where('id','=',$user->introduced)
                ->first();
            //تعداد پیام های خوانده نشده
            $unreadMessage=message::where('user_id_recieve','=',$user->id)
                    ->where('status','=',1)
                    ->count();
            //کسب امتیازات
            $score=0;
            $scoreIntroducedUser=$countIntroducedUser* ($this->get_scores()->introduced);
            $score=$score+$scoreIntroducedUser;


            $verifyScore=$user->tel_verified;
            if($verifyScore==1)
            {
                $scoreTelverify=$this->get_scores()->tel_verified;
                $score=$score+$scoreTelverify;
            }
            else
            {
                $scoreTelverify=0;
            }



            $verifyScore=$user->email_verified_at;

            if(!is_null($verifyScore))
            {
                $scoreEmailverify=$this->get_scores()->email_verified;
                $score=$score+$scoreEmailverify;
            }
            else
            {
                $scoreEmailverify=0;
            }


            $SuccessIntroduced=User::where('introduced','=',$user->id)
                    ->where('type','=',20)
                    ->count();



            $scoreSuccess=$SuccessIntroduced*($this->get_scores()->changeintroduced);
            $score=$score+$scoreSuccess;

            $checkTimeCode=verify::where('tel','=',$user['tel'])
                            ->where('verify','=',0)
                            ->latest()
                            ->first();
            $verifyStatus=false;
            if(!is_null( $checkTimeCode))
            {
                $date=($checkTimeCode['created_at']);
                $checkDays=$date->addMinutes(2);
                if($checkDays>Carbon::now())
                {
                    $verifyStatus=true;
                }
            }

            //تعداد جلسات رزرو شده تعیین تکلیف نشده
//            $condition=['start_date','<',$this->dateNow];
//            $undefind_booking=booking::where('user_id','=',Auth::user()->id)
//                                        ->where('status','=',0)
//                                        ->where('start_date','<',$this->dateNow)
//                                        ->get();
//
//            if($undefind_booking->count()>0)
//            {
//                alert()->warning(' تعداد '.$undefind_booking->count()." جلسه رزرو شده شما تعیین تکلیف نشده است.\n لطفا نسبت به برگزار شدن یا عدم برگزاری جلسه اقدام نمائید. ")->persistent('بستن');
//            }

            //تعداد جلسات مراجعی که بازخورد ثبت نکرده است
            $reserve_notFeedback=reserve::leftjoin('feedback_coachings','reserves.booking_id','=','feedback_coachings.booking_id')
                        ->where('reserves.status','=',3)
                        ->where('reserves.user_id','=',Auth::user()->id)
                        ->whereNull('feedback_coachings.created_at')
                        ->get();
//            if($reserve_notFeedback->count()>0)
//            {
//                alert()->warning(' برای تعداد '.$reserve_notFeedback->count()." جلسه برگزار شده بازخورد ثبت نشده است ")->persistent('بستن');
//            }

            $courses=student::join('courses','students.course_id','=','courses.id')
                        ->where('students.user_id','=',Auth::user()->id)
                        ->orderby('students.id','desc')
                        ->select('courses.*')
                        ->get();



            //
//            if((is_null(Auth::user()->fname))||(is_null(Auth::user()->lname))||(is_null(Auth::user()->username)))
//            {
//                alert()->warning('لطفا اطلاعات پروفایل خود را کامل کنید')->persistent('بستن');
//            }

            return view('user.home')
                ->with('user',$user)
                ->with('countIntroducedUser',$countIntroducedUser)
                ->with('resourceIntroduce',$resourceIntroduce)
                ->with('unreadMessage',$unreadMessage)
                ->with('score',$score)
                ->with('verifyScore',$verifyScore)
                ->with('scoreSuccess',$scoreSuccess)
                ->with('verifyStatus',$verifyStatus)
                ->with('scoreIntroducedUser',$scoreIntroducedUser)
                ->with('SuccessIntroduced',$SuccessIntroduced)
                ->with('courses',$courses)
                ->with('scoreTelverify',$scoreTelverify)
                ->with('scoreEmailverify',$scoreEmailverify);

        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //نمایش صفحه تنظیمات ادمین
    public function showSettings()
    {
        $problemfollowup=problemfollowup::get();
        foreach ($problemfollowup as $item)
        {
            if($item->status==1)
            {
                $item->status="نمایش";
            }
            elseif ($item->status==0)
            {
                $item->status="عدم نمایش";
            }
        }

        $parentCategory=$this->get_parentCategory();
        foreach ($parentCategory as $item)
        {
            if($item->status==1)
            {
                $item->status="نمایش";
            }
            elseif ($item->status==0)
            {
                $item->status="عدم نمایش";
            }
        }

        $categoryTags=categoryTag::get();
        foreach ($categoryTags as $item)
        {
            if($item->status==1)
            {
                $item->status="نمایش";
            }
            elseif ($item->status==0)
            {
                $item->status="عدم نمایش";
            }
        }


        $options=$this->get_options();

        foreach ($options as $item)
        {
            $options[$item->option_name]=$item->option_value;

        }

        $tmp=['parent_id','=',0];
        $categoryGettingknow=$this->get_categoryGettingknow(NULL,NULL,NULL,NULL,'get',$tmp);
        foreach ($categoryGettingknow as $item)
        {
            if($item->status==1)
            {
                $item->status="نمایش";
            }
            elseif ($item->status==0)
            {
                $item->status="عدم نمایش";
            }
        }

        $tmp=['parent_id','<>',0];
        $gettingknow=$this->get_categoryGettingknow(NULL,NULL,1,NULL,'get',$tmp);
        foreach ($gettingknow as $item)
        {
            //dd($this->get_categoryGettingknow(2,NULL,NULL,NULL,'first'));
            $parent=$this->get_categoryGettingknow($item->parent_id,NULL,NULL,NULL,'first');
            $item->parent=$parent->category;
            if($item->status==1)
            {
                $item->status="نمایش";
            }
            elseif ($item->status==0)
            {
                $item->status="عدم نمایش";
            }
        }

        return view('admin.settings')
                    ->with('problemfollowup',$problemfollowup)
                    ->with('parentCategory',$parentCategory)
                    ->with('categoryTags',$categoryTags)
                    ->with('categoryGettingknow',$categoryGettingknow)
                    ->with('gettingknow',$gettingknow)
                    ->with('options',$options);
    }

    public function showProducts()
    {
        $contents_api=$this->get_data_api();
        return view('panelUser.products')
                    ->with('contents_api',$contents_api);
    }

    public function showFreePackages()
    {
        return  redirect()
            ->route('freePackageLanding')
            ->with('status',true);
    }

    public function loginSMS()
    {
        if (Auth::check())
        {
            return back();
        }
        else
        {
            return view('loginSMS');
        }
    }

    public function changePasswordView($tel)
    {
        $user=$this->get_user($tel);
        if(is_null($user))
        {
            alert()->error('کاربری با چنین مشخصاتی وجود ندارد', 'خطا')->persistent('close');
//            $msg="کاربری با چنین مشخصاتی وجود ندارد";
//            $errorStatus="danger";
            return redirect("/admin/users");
//                    ->with('msg',$msg)
//                    ->with('errorStatus',$errorStatus);
        }
        else
        {
            return view('panelAdmin.changePassword')
                    ->with('tel',$tel);
        }
    }

    public function changePasswordViewUser()
    {
        $user=Auth::user();
        return view('user.changePassword')
                ->with('user',$user);

    }
}
