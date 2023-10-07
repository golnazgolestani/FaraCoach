<?php

namespace App\Http\Controllers;

use App\coach;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert;
use Hekmatinasser\Verta\Verta;

class CoachController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaches=coach::join('users','coaches.user_id','=','users.id')
                    ->orwhere('users.status_coach','=','1')
                    ->orwhere('users.status_coach','=','2')
                    ->select('users.*','coaches.*','users.id as id_user_table')
                    ->get();
        foreach ($coaches as $item)
        {
            if($item->status==1)
            {
                $item->status='در حال همکاری';
            }
            else if ($item->status==2)
            {
                $item->status='عدم همکاری';
            }

        }
        return view('admin.coaches')
                    ->with('coaches',$coaches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if((Auth::user()->status_coach==0)||((Auth::user()->type==2)))
        {
            $user=Auth::user();
            if((strlen($user->username)>0) && (strlen($user->fname)>0)&& (strlen($user->lname)>0)&&(strlen($user->codemelli )>0)&&(strlen($user->job)>0)&&(strlen($user->datebirth)>0) )
            {
                $typeCoach=$this->get_typeCoaches(NULL,1,'get');

                $categoryCoaches=$this->get_categoryCoaches(NULL,NULL,true);

                return view('user.insertCoach')
                                ->with('categoryCoaches',$categoryCoaches)
                                ->with('typeCoaches',$typeCoach);
            }
            else
            {
                alert()->error('برای درخواست همکاری باید اطلاعات پروفایل خود را کامل کنید','خطا')->persistent('بستن');
                return redirect('/panel/profile');
            }

        }
        else
        {
            alert()->error('شما مجاز به دسترسی به این بخش نیستید','خطا')->persistent('بستن');
            return redirect('/panel');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'education_background'  =>'required|string',
            'certificates'          =>'required|string',
            'experience'            =>'required|string',
            'skills'                =>'required|string',
            'researches'            =>'nullable|string',
            'count_meeting'         =>'required|numeric|between:0,10000',
            'customer_satisfaction' =>'required|numeric|between:0,1000',
            'category'              =>'required|array',
            'typecoach_id'          =>'required|numeric',
            'change_customer'       =>'required|numeric|between:0,1000',
            'count_recommendation'  =>'required|numeric|between:0,1000'
        ]);

        $user=Auth::user();
        $coach=coach::where('user_id','=',$user->id)
                ->first();
        if(is_null($coach)) {
            $status = coach::create([
                'user_id'               => Auth::user()->id,
                'education_background'  => $request['education_background'],
                'researches'            => $request['researches'],
                'certificates'          => $request['certificates'],
                'experience'            => $request['experience'],
                'skills'                => $request['skills'],
                'count_meeting'         => $request['count_meeting'],
                //'customer_satisfaction' => $request['customer_satisfaction'],
                'category'              => implode(',',$request['category']),
                'typecoach_id'          => $request['typecoach_id'],
                //'change_customer'       => $request['change_customer'],
                'count_recommendation'  => $request['count_recommendation'],
            ]);

            if ($status) {
                $user->status_coach = '-1';
                $user->update();
                $this->sendSms(Auth::user()->tel,'درخواست همکاری شما در سیستم فراکوچ ثبت شد');
                $this->sendSms('09153159020',Auth::user()->fname.''.Auth::user()->lname.' درخواست همکاری به عنوان کوچ در سیستم ثبت کرد');
                alert()->success('درخواست همکاری شما با موفقیت ثبت شد', 'پیام')->persistent('بستن');
            } else {
                alert()->error('خطا در ثبت', 'خطا')->persistent('بستن');
            }
        }
        else
        {
            alert()->error('درخواست همکاری شما قبلا ارسال شده است', 'خطا')->persistent('بستن');
        }

        return redirect('/panel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show($coach)
    {

        //چک کردن یوزر کاربر وارد شده در لینک
        $user=$this->get_user_byUserName($coach);
        if(is_null($user->coach))
        {
            alert()->error('کوچ مورد نظر یافت نشد','خطا')->persistent('بستن');
            return redirect('/coaches/all');
        }
        else
        {

//            $coach = coach::join('users', 'coaches.user_id', '=', 'users.id')
//                                ->where('users.id', '=', $user->id)
//                                ->first();

            if($user->coach->status==2)
            {
                alert()->error('لینک منقضی شده است')->persistent('بستن');
                return redirect('/coaches/all');
            }
            else
            {
//                $feedbacks=coach::join('bookings', 'coaches.user_id', '=', 'bookings.user_id')
//                        ->join('feedback_coachings','bookings.id','=','feedback_coachings.booking_id')
//                        ->join('users','users.id','=','feedback_coachings.user_id')
//                        ->where('coaches.user_id','=',$user->id)
//                        ->paginate(10);
                if($user->coach->today_meeting)
                {
                    $condition=['start_date','>=',$this->dateNow];
                }
                else
                {
                    $condition=['start_date','>',$this->dateNow];
                }

                $bookings=$this->get_booking(NULL,$user->coach->user_id,NULL,NULL,NULL,1,$condition,'get');

                //کامنت های گذاشته شده برای کوچ
//                $comments=$this->get_comments(NULL,NULL,$user->id,NULL,'coach');



                if(is_null($user->coach))
                {
                    alert()->error('شخص مورد نظر به عنوان کوچ تعریف نشده است','خطا')->persistent('بستن');
                    return redirect('/coaches/all');
                }
                else
                {
//                    if (!is_null($user->coach->city)) {
//                        $coach->city = $this->city($user->coach->city)->name;
//                    }

                    $dateNow = verta();

                    if ($user->coach->today_meeting == 0) {
                        $dateNow->addDays(1);
                    }


                    $dateShamsi = $dateNow->format('Y-m-d H:i:s');


                    $date_Miladi = Verta::getGregorian($dateNow->format('Y'), $dateNow->format('m'), $dateNow->format('d'));

                    $date_Miladi = $date_Miladi[0] . '-' . $date_Miladi[1] . '-' . $date_Miladi[2];

                    //چک کردن تعداد رزروهای ناقص کامل نشده در سبد خرید
//                    $cart = $this->get_cartUser();

                }
                    return view('clinic.coach')
                        ->with('coach', $coach)
                        ->with('bookings', $bookings)
                        ->with('dateNow', $dateShamsi)
                        ->with('date_Miladi', $date_Miladi)
                        ->with('user', $user);
//                        ->with('feedbacks',$feedbacks)
//                        ->with('comments',$comments)
//                        ->with('cart',$cart);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(coach $coach)
    {
        if((Auth::user()->type==2) ||(Auth::user()->type==3)||(Auth::user()->type==4))
        {
            $coach=coach::join('users','coaches.user_id','=','users.id')
                ->where('coaches.id','=',$coach->id)
                ->select('coaches.*','users.fname','users.lname','users.personal_image')
                ->first();

            $messages=coach::join('messages', function($query)
            {
                $query->oron('coaches.id', '=', 'messages.user_id_send')
                    ->oron('coaches.id', '=', 'messages.user_id_recieve');

            })
            ->where('coaches.id','=',$coach->id)
            ->where('messages.type','=','coach')
            ->get();

            $categoryCoaches=$this->get_categoryCoaches(NULL,NULL,true);
            $coach->category=explode(',',$coach->category);
            $typeCoaches=$this->get_typeCoaches(NULL,1,'get');
            return view('admin.editCoach')
                ->with('coach',$coach)
                ->with('typeCoaches',$typeCoaches)
                ->with('messages',$messages)
                ->with('categoryCoaches',$categoryCoaches);
        }
        else
        {

            if(Auth::user()->id==$coach->user_id)
            {

                $coach->category=explode(',',$coach->category);

                $categoryCoaches=$this->get_categoryCoaches(NULL,NULL,true);
                $coach=coach::join('users','coaches.user_id','=','users.id')
                            ->where('coaches.id','=',$coach->id)
                            ->select('coaches.*','users.fname','users.lname','users.personal_image')
                            ->first();
                $coach->category=explode(',',$coach->category);

                $messages=coach::join('messages', function($query)
                {
                    $query->oron('coaches.id', '=', 'messages.user_id_send')
                        ->oron('coaches.id', '=', 'messages.user_id_recieve');

                })
                ->where('coaches.id','=',$coach->id)
                ->where('messages.type','=','coach')
                ->get();

                $typeCoaches=$this->get_typeCoaches(NULL,1,'get');
                return view('user.editCoach')
                            ->with('categoryCoaches',$categoryCoaches)
                            ->with('messages',$messages)
                            ->with('typeCoaches',$typeCoaches)
                            ->with('coach',$coach);
            }
            else{

                alert()->error('شما سطح دسترسی به این بخش را ندارید','خطا')->persistent('بستن');
                return back();
            }

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coach $coach)
    {
        $this->validate($request,[
            'education_background'  =>'required|string',
            'certificates'          =>'required|string',
            'experience'            =>'required|string',
            'skills'                =>'required|string',
            'researches'            =>'nullable|string',
            'count_meeting'         =>'required|numeric|between:0,10000',
            //'customer_satisfaction' =>'required|numeric|between:0,1000',
            //'change_customer'       =>'required|numeric|between:0,1000',
            'count_recommendation'  =>'required|numeric|between:0,1000',
            'category'              =>'required|array',
            'typecoach_id'          =>'required|numeric',
            'fi'                    =>'nullable|numeric',
            'confirm_faracoach'     =>'nullable|boolean',
            'student_meeting'       =>'nullable|boolean',
            'type'                  =>'required|numeric',
            'status'                =>'required|numeric|between:-2,5'
        ],[
            'education_background.required' =>'سوابق تحصیلی اجباریست',
            'education_background.string'   =>'سوابق تحصیلی درست وارد نشده است',
            'certificates.required'         =>'گواهینامه ها اجباریست',
            'certificates.string'           =>'گواهینامه ها درست وارد نشده است',
            'experience.required'           =>'سوابق کاری اجباریست',
            'experience.string'             =>'سوابق کاری درست وارد نشده است',
            'skills.required'               =>'مهارت ها اجباریست',
            'skills.string'                 =>'مهارت ها درست وارد نشده است',
            'researches.string'             =>'سوابق مقالات درست وارد نشده است',
            'count_meeting.required'        =>'تعداد ساعت جلسات اجباریست',
            'count_meeting.numeric'         =>'تعداد ساعت جلسات باید عدد باشد',
            'count_meeting.between'         =>'تعداد ساعت جلسات باید بین 0 تا 10000 باشد',
            'customer_satisfaction.required'=>'تعداد رضایت مشتریان اجباریست',
            'customer_satisfaction.numeric' =>'تعداد رضایت مشتریان باید عدد باشد',
            'customer_satisfaction.between' =>'تعداد رضایت مشتریان باید بین 0 تا 1000 باشد',
            'change_customer.required'      =>'تعداد تبدیل مشتری اجباریست',
            'change_customer.numeric'       =>'تعداد تبدیل مشتری باید عدد باشد',
            'change_customer.between'       =>'تعداد تبدیل مشتری باید بین 0 تا 1000 باشد',
            'count_recommendation.required' =>'تعداد توضیه نامه اجباریست',
            'count_recommendation.numeric'  =>'تعداد توضیه نامه باید عدد باشد',
            'count_recommendation.between'  =>'تعداد توضیه نامه باید بین 0 تا 1000 باشد',
            'category.required'             =>'دسته بندی ها اجباریست',
            'category.array'                =>'دسته بندی ها درست انتخاب نشده است',
            'status.required'               =>'وضعیت اجباریست',
            'status.numeric'                =>'وضعیت درست انتخاب نشده است',
            'status.between'                =>'وضعیت خارج از فرمت وارد شده است',

        ]);

        $request['category']=implode(',',$request['category']);

        $status=$coach->update($request->all());
        if($status)
        {
            $user = User::where('id', '=', $coach->user_id)
                ->first();
            $user->status_coach = $request['status'];
            $user->save();
            alert()->success('اطلاعات با موفقیت بروزرسانی شد','پیام')->persistent('بستن');

            switch ($request->status)
            {

                case '1'://$this->sendSms($user->tel,'درخواست همکاری شما به عنوان کوچ در فراکوچ تائید شد');
                            break;
                case '-2':$this->sendSms($user->tel,'درخواست همکاری شما به عنوان کوچ در فراکوچ رد شد');
                            break;
                case '2':$this->sendSms($user->tel,'همکاری شما به عنوان کوچ در فراکوچ موقتا غیرفعال شد');
                    break;
            }
        }
        else
        {
            alert()->error('خطا در بروزرسانی','خطا ')->persistent('بستن');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(coach $coach)
    {
        //
    }

    public function coach_request()
    {
        $coaches=coach::join('users','coaches.user_id','=','users.id')
                ->where('status','=','0')
                ->select('users.*','coaches.*','users.id as id_user_table')
                ->get();

        foreach ($coaches as $item)
        {
            if($item->status==0)
            {
                $item->status='درخواست همکاری';
            }
        }
        return view('admin.coaches')
            ->with('coaches',$coaches);
    }

    public function coach_reject()
    {
        $coaches=coach::join('users','coaches.user_id','=','users.id')
            ->wherein('coaches.status',[2,-2])
            ->select('users.*','coaches.*','users.id as id_user_table')
            ->get();
        foreach ($coaches as $item)
        {
            switch ($item->status)
            {
                case 2:$item->status='غیرفعال';
                        break;
                case -2:$item->status='رد درخواست';
                        break;
            }
        }
        return view('admin.coaches')
            ->with('coaches',$coaches);
    }

    //نمایش همه کوچ ها
    public function viewAllCoaches(Request $request)
    {
        $v=verta();
        $month=[$this->dateNow,$v->endMonth()->format('Y/m/d')];
        $users=coach::join('users','coaches.user_id','=','users.id')
            ->when($request['q'], function ($query,$request)
            {
                return $query->orwhere('users.fname', 'like', "%$request%")
                             ->orwhere('users.lname', 'like', "%$request%");
            })
            ->when($request['gender'],function($query,$request)
            {
                if($request==2)
                {
                    $request=0;
                }
                return $query->where('users.sex','=',$request);
            })
            ->when($request['categoryCoaches'],function($query,$request)
            {
                return $query->where('coaches.category','LIKE',"%$request%");
            })
            ->where('users.status_coach','=',1)
            ->where('coaches.status','=',1)
            ->orderby('coaches.typecoach_id','desc')
            ->get();
//            ->sortBydesc(function($coach)  use ($month)
//            {
//                return $coach->bookings->wherebetween('start_date',$month)->count();
//            });

        $category_coaches=$this->get_categoryCoaches(NULL,NULL,1);

        return view('allCoaches')
            ->with('category_coaches',$category_coaches)
            ->with('month',$month)
            ->with('coaches',$users);
    }

    public function search(Request $request)
    {
        dd($request);
    }

    //درخواست جدید توسط کاربر بعد از رد درخواست
    public function newrequest (Request $request, coach $coach)
    {
        $this->validate($request,[
            'education_background'  =>'required|string',
            'certificates'          =>'required|string',
            'experience'            =>'required|string',
            'skills'                =>'required|string',
            'researches'            =>'nullable|string',
            'count_meeting'         =>'required|numeric|between:0,10000',
            'customer_satisfaction' =>'required|numeric|between:0,1000',
            'change_customer'       =>'required|numeric|between:0,1000',
            'count_recommendation'  =>'required|numeric|between:0,1000',
        ]);

        $status=$coach->update($request->all()+[
            'status'    =>0
            ]);
        if($status)
        {
            $user = User::where('id', '=', $coach->user_id)
                    ->first();
            $user->status_coach = -1;
            $user->save();

            alert()->success('اطلاعات با موفقیت بروزرسانی شد','پیام')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی','خطا ')->persistent('بستن');
        }
        return redirect('/panel');
    }


    public function updateCoach(Request $request,coach $coach)
    {
        $this->validate($request,[
            'education_background'  =>'required|string',
            'certificates'          =>'required|string',
            'experience'            =>'required|string',
            'skills'                =>'required|string',
            'researches'            =>'nullable|string',
            'count_meeting'         =>'required|numeric',
            'count_recommendation'  =>'required|numeric',
            'category'              =>'required|array',
            'typecoach_id'          =>'required|numeric',
        ]);

        $request['category']=implode(',',$request->category);
        $status=$coach->update($request->all());
        if($status)
        {
            alert()->success('اطلاعات با موفقیت بروزرسانی شد','پیام')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی','خطا ')->persistent('بستن');
        }
        return redirect('/panel');
    }






    public function profile_coach()
    {
        $coach=coach::where('user_id','=',Auth::user()->id)
                    ->first();

        $coach->category=explode(',',$coach->category);

        $categoryCoaches=$this->get_categoryCoaches(NULL,NULL,true);
        $coach=coach::join('users','coaches.user_id','=','users.id')
            ->where('coaches.id','=',$coach->id)
            ->select('coaches.*','users.fname','users.lname','users.personal_image')
            ->first();
        $coach->category=explode(',',$coach->category);


        $messages=coach::join('messages', function($query)
        {
            $query->oron('coaches.id', '=', 'messages.user_id_send')
                ->oron('coaches.id', '=', 'messages.user_id_recieve');

        })
        ->where('coaches.id','=',$coach->id)
        ->where('messages.type','=','coach')
        ->get();

        $typeCoaches=$this->get_typeCoaches(NULL,1,'get');
        return view('user.editCoach')
            ->with('categoryCoaches',$categoryCoaches)
            ->with('messages',$messages)
            ->with('typeCoaches',$typeCoaches)
            ->with('coach',$coach);
    }





}
