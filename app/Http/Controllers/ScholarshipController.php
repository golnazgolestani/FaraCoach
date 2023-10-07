<?php

namespace App\Http\Controllers;

use App\checkout;
use App\city;
use App\collabration_accept;
use App\collabration_category;
use App\collabration_details;
use App\course;
use App\document;
use App\faktor;
use App\followup;
use App\message;
use App\Notifications\sendMessageNotification;
use App\scholarship;
use App\scholarship_payment;
use App\state;
use App\student;
use App\User;
use Faker\Provider\Base;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Throwable;

class ScholarshipController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$scholarships=scholarship::wherein('status',[0,2,3,4])
        $scholarships=scholarship::orwhere('resource','=','scholarship')
                ->orwhere('resource','=','knot')
                ->orderby('financial')
                ->get();
        foreach ($scholarships as $scholarship)
        {
            $scholarship->created_at=$this->changeTimestampToShamsi($scholarship->created_at);
        }

        return view('admin.scholarship.users')
                    ->with('scholarships',$scholarships);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        session()->forget('status');
//
        if(isset($request->introduce))
        {
            $request->session()->put('introduce',$request->introduce);
        }


        if((!$request->session()->has('scholarshipStatus')) && Auth::check())
        {

//            $request->session()->put('scholarshipStatus','infoUser');
        }


        if((Auth::check()))
        {
            if((!is_null(Auth::user()->scholarship)))
            {

                return redirect('/panel/scholarship/me');

            }
        }

        return  view('scholarship.beforeRegister_Scholarship');
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
            'user_id'       =>'required|numeric|',
            'target'        =>'required|array',
            'types'         =>'required|array',
            'gettingknow'   =>'required|string',
//            'description'   =>'nullable|string',
//            'scientific'    =>'required|string',
//            'executive'     =>'required|string',
//            'introduce'     =>'nullable|string',
            'cooperation'   =>'required|string',
            'applicant'     =>'required|numeric',
            'resume'        =>'nullable|mimes:jpeg,jpg,pdf,doc,png|max:1024',
        ]);

        $check=scholarship::where('user_id','=',Auth::user()->id)
                    ->first();

        if(is_null($check))
        {
            if($request->has('resume')&&$request->file('resume')->isValid())
            {
                $file = $request->file('resume');
                $resume = "resume-" . Auth::user()->tel . "." . $request->file('resume')->extension();
                $path = public_path('/documents/scholarship');
                $files = $request->file('resume')->move($path, $resume);
            }
            else
            {
                $resume=NULL;
            }



            $dateNow = verta();
            $this->dateNow = $dateNow->format('Ymd');
            $this->timeNow = $dateNow->format('His');
            $trackingCode = $this->dateNow . $this->timeNow;


            $status = scholarship::create(
                [
                    'user_id' => Auth::user()->id,
                    'target' => implode(',', $request->target),
                    'types' => implode(',', $request->types),
                    'gettingknow' => $request->gettingknow,
//            'description'   =>$request->description,
//            'scientific'    =>$request->scientific,
//            'executive'     =>$request->executive,
                    'introduce' => session()->get('introduce'),
                    'cooperation' => $request->cooperation,
                    'applicant' => $request->applicant,
                    'resume' => $resume,
                    'trackingcode' => $trackingCode,

                ]);


            if ($status) {
                $msg = Auth::user()->fname . ' ' . Auth::user()->lname . " عزیز\nدرخواست شما ثبت شد\nمنتظر تایید اولیه اطلاعات باشید\nلینک دعوت از دوستان و کسب امتیاز معرفی: " . "my.faracoach.com/scholarship/register?introduce=" . Auth::user()->id;
                $this->sendSms(Auth::user()->tel, $msg);
//            $this->sendSms(Auth::user()->tel,'شماره پیگیری بورسیه فراکوچ:'.$trackingCode."\nلینک اختصاصی شما جهت دعوت در بورسیه:\n "."my.faracoach.com/scholarship/register?introduce=".Auth::user()->id);
                $this->sendSms('09153159020', $status->id . ' بورسیه:' . Auth::user()->fname . ' ' . Auth::user()->lname . "\nتحصیلات:\n " . Auth::user()->education);
                alert()->success("ثبت نام شما در بورسیه فراکوچ با موفقیت انجام شد \nکد پیگیری شما $trackingCode")->persistent('بستن');
                $request->session()->forget('scholarshipStatus');
                return redirect('/panel');
            }
        }else
        {
            $request->session()->forget('scholarshipStatus');
            alert()->error('اطاعات شما در سامانه بورسیه کوچینگ قبلا ثبت شده است')->persistent('بستن');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $scholarship
     * @return \Illuminate\Http\Response
     */

    public function show(scholarship  $scholarship)
    {

        $states=$this->states();
        $city=$this->city($scholarship->user->city);
        $scholarship->types=explode(',' ,$scholarship->types);
        $id=$scholarship->user_id;
        $messages=message::where(function($query) use($id)
                            {
                                $query->orwhere('user_id_send','=',$id)
                                    ->orwhere('user_id_recieve','=',$id);
                            })
                            ->where(function($query)
                            {
                                $query->orwhere('type','=','scholarship')
                                    ->orwhere('type','=','scholarship_introductionletter');
                            })
                            ->orderby('id','desc')
                            ->get();

        $cities=city::where('state_id',$scholarship->user->state)
            ->get();

        if(!is_null($scholarship->user->gettingknow))
        {
            $scholarship->user->gettingknow_parent_user=$this->get_categoryGettingknow($scholarship->user->gettingknow,NULL,NULL,NULL,'first')->parent_id;
            $condition=['parent_id','=',$scholarship->user->gettingknow_parent_user];
            $gettingKnow_child_list=$this->get_categoryGettingknow(NULL,NULL,1,NULL,'get',$condition);
        }
        else
        {
            $gettingKnow_child_list=NULL;
        }

        $condition=['parent_id','=','0'];
        $gettingKnow_parent_list=$this->get_categoryGettingknow(NULL,NULL,1,NULL,'get',$condition);

        $getFollowbyCategory=$this->getFollowbyCategory();


        $count_scholarshipIntroduce=0;
        foreach ($scholarship->user->get_invitations->where('created_at','>','2022-07-20 00:00:00')->where('resource','=','بورسیه تحصیلی') as $item)
        {
            if(!is_null($item->scholarship))
            {
                if($item->scholarship->get_score()>0)
                {

                    $count_scholarshipIntroduce=$count_scholarshipIntroduce+(floor(($item->scholarship->get_score()*10)/100) );
                }

            }
        }


//        $count_scholarshipIntroduce=$count_scholarshipIntroduce*4;

        //جمع امتیازات
        $result_final=0;
        if(is_null($scholarship->score_profile))
        {
            $result_final=$result_final+0;
        }
        else
        {
            $result_final=$result_final+$scholarship->score_profile;

        }

        if($scholarship->confirm_webinar==1)
        {
            $result_final=$result_final+5;
        }
        else
        {
            $result_final=$result_final+0;
        }

        $result_final=$result_final+$count_scholarshipIntroduce;

        if(count($scholarship->user->get_scholarshipexam)==0 || $scholarship->user->get_scholarshipexam->last()->score<50)
        {
            $result_final=$result_final+0;
        }
        elseif(($scholarship->user->get_scholarshipexam->last()->score) >= 50 && ($scholarship->user->get_scholarshipexam->last()->score) <= 70)
        {
            $result_final=$result_final+5;
        }
        elseif(($scholarship->user->get_scholarshipexam->last()->score) > 70)
        {
            $result_final=$result_final+5;
        }

        if(is_null($scholarship->user->get_scholarshipInterview))
        {
            $result_final=$result_final+0;
        }
        else
        {
            $result_final=$result_final+$scholarship->user->get_scholarshipInterview->score;
        }

        $result_final=$result_final+$scholarship->score_introductionletter;
        $s="\%";
//        dd(collabration_accept::where('value','not like',"%$s")->get());
//        dd($scholarship->user->collabration_accept->where('value','not like',"%$s"));

        $collabration_category=collabration_category::where('status','=',1)
                                ->get();

        $courses=course::orderby('id','desc')
                            ->get();

        $documents=document::where('type','=','scholarship')
                            ->where('status','=',1)
                            ->get();

       return view('admin.scholarship.scholarship')
                    ->with('scholarship',$scholarship)
                    ->with('gettingKnow_child_list',$gettingKnow_child_list)
                    ->with('gettingKnow_parent_list',$gettingKnow_parent_list)
                    ->with('getFollowbyCategory',$getFollowbyCategory)
                    ->with('count_scholarshipIntroduce',$count_scholarshipIntroduce)
                    ->with('city',$city)
                    ->with('cities',$cities)
                    ->with('messages',$messages)
                    ->with('result_final',$result_final)
                    ->with('collabration_category',$collabration_category)
                    ->with('courses',$courses)
                    ->with('documents',$documents)
                    ->with('states',$states);
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
    public function update(Request $request,scholarship $scholarship)
    {
        $this->validate($request,[
            'view_score'    =>'boolean|required',
        ]);


        if($scholarship->update($request->all()))
        {
            if($scholarship->confirm_introductionletter==1)
            {
                $introductionletter="دارد";
            }
            else
            {
                $introductionletter="ندارد";
            }

            $countInvitation=$scholarship->user->get_invitations->where('created_at','>','2022-07-20 00:00:00')->where('resource','=','بورسیه تحصیلی')->count();

            $msg=$scholarship->user->fname." ".$scholarship->user->lname." عزیز\n"." امتیاز مصاحبه شما ثبت شد. "."\n مشاهده در my.faracoach.com\n"."\nمعرفی نامه: $introductionletter \nتعداد معرفی:$countInvitation \n مرحله پایانی:\n دریافت گواهینامه\nثبت نام دوره";
            $this->sendSms($scholarship->user->tel,$msg);
            alert()->success('اطلاعات با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return back();
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


    public function register_Scholarship(Request $request)
    {

        $this->validate($request,[
            'fname'                 =>'required|string',
            'lname'                 =>'required|string',
            'sex'                   =>'required|in:1,0',
            'email'                 =>'required|email',
            'tel'                   =>'required|string',
            'education'             =>'required|string',
            'reshteh'               =>'required|string',
//            'password'              =>'required_with:password_confirmation|string',
            'password'              =>'nullable|string|confirmed',
        ]);


        $user=User::where('tel','=',$request->tel)
            ->first();


        try {

            $status=$user->update($request->all());

        } catch (Throwable $e) {
            alert()->error('ایمیل وارد شده تکراری می باشد','خطا')->persistent('بستن');
            return back();
        }


         if(!is_null($request['password']))
         {
             $user->password=Hash::make($request['password']);
             $user->save();
         }

        $request->session()->put('scholarshipStatus','infoScholarship');
//        return view('scholarship.infoCoach_scholarship')

        return back()
                ->with('user',$user);

    }

    //پاک کردن تلفن از سشن
    public function cleartel()
    {
        session()->forget('scholarshipStatus');
        return back();
    }

    public function changestatus(Request $request,scholarship $scholarship)
    {

        $this->validate($request, [
            'status' => 'required|numeric',
            'comment' => 'required|string',
        ]);
        //برای اینمه تمام فیلدها ریست بشن و از اول مقدار برای کانفیرم بگیرن رسیت میشوند به روش زیر
        $scholarship->confirm_target = 0;
        $scholarship->confirm_types = 0;
        $scholarship->confirm_gettingknow = 0;
        $scholarship->confirm_cooperation = 0;
        $scholarship->confirm_applicant = 0;
        $scholarship->confirm_resume = 0;
        $scholarship->save();


        $scholarship->update($request->all());

        $scholarship->status = $request->status;
        if ($request->status == 2) {
            $followups = followup::where('user_id', '=', $scholarship->user_id)
                ->get();

            foreach ($followups as $item) {
                $t = followup::where('id', '=', $item->id)   //    $this->get_followup($item->followups_id,NULL,NULL,NULL,"first");
                ->first();
                $t->flag = 0;
                $t->update();
            }

            followup::create([
                'user_id' => $scholarship->user_id,
                'insert_user_id' => Auth::user()->id,
                'comment' => 'کاربر از بخش بورسیه به فروش منتقل شد',
                'status_followups' => 11,
                'nextfollowup_date_fa' => $this->dateNow,
                'flag' => 1,
                'date_fa' => $this->dateNow,
                'time_fa' => $this->timeNow,

            ]);

            $user = User::where('id', '=', $scholarship->user_id)
                        ->first();
            $user->type = 11;
            $user->followby_expert = NULL;
            $user->save();
        }
        $scholarship->save();
        $status = message::create([
            'user_id_send' => Auth::user()->id,
            'comment' => $request->comment,
            'user_id_recieve' => $scholarship->user->id,
            'type' => 'scholarship',
            'date_fa' => $this->dateNow,
            'time_fa' => $this->timeNow,
        ]);

        switch ($request->status)
        {
            case(1):$status_scholarship= 'قبول';
                            break;
            case(2):$status_scholarship ='رد درخواست';
                            break;
            case(3):$status_scholarship='در حال بررسی';
                            break;
            case(4):$status_scholarship='اصلاح درخواست';
                            break;

        }


        if($request->status==1)
        {
            $msg=$scholarship->user->fname." ".$scholarship->user->lname." عزیز \n مرحله اول و دوم درخواست بورسیه کوچینگ با موفقیت ثبت شد\n";
        }
        else
        {
            $msg="نتیجه درخواست بورسیه شما:".$status_scholarship."\n برای آگاهی بیشتر به پورتال فراکوچ مراجعه کنید";
        }
        $this->sendSms($scholarship->user->tel,$msg);



        if($status)
        {
            alert()->success('اطلاعات با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت اطلاعات')->persistent('بستن');
        }

        return redirect('/admin/scholarship/');

    }


    //نمایش صفحه برای خود کاربر
    public function me()
    {
        $scholarship=scholarship::where('user_id','=',Auth::user()->id)
                    ->first();
        if(is_null($scholarship))
        {
            session()->put('scholarshipStatus','infoUser');
            alert()->warning('شما در بورسیه فراکوچ ثبت نام نکرده اید')->persistent('بستن');
            return redirect('/scholarship/register');
        }
        else
        {
            $scholarship->target=explode(',',$scholarship->target);
            $scholarship->types=explode(',',$scholarship->types);

            $messages=message::where(function($query)
            {
                $query->orwhere('user_id_send','=',Auth::user()->id)
                    ->orwhere('user_id_recieve','=',Auth::user()->id);
            })
            ->where(function($query)
            {
                  $query->orwhere('type','=','scholarship')
                        ->orwhere('type','=','scholarship_introductionletter');
            })
            ->orderby('id','desc')
            ->get();

            $states=state::get();

            $cities=city::where('state_id',$scholarship->user->state)
                                ->get();


            //انتخاب شهر براساس کد
            $city=$this->city($scholarship->user->city);

            if(!is_null($scholarship->user->gettingknow))
            {
                $scholarship->user->gettingknow_parent_user=$this->get_categoryGettingknow($scholarship->user->gettingknow,NULL,NULL,NULL,'first')->parent_id;
                $condition=['parent_id','=',$scholarship->user->gettingknow_parent_user];
                $gettingKnow_child_list=$this->get_categoryGettingknow(NULL,NULL,1,NULL,'get',$condition);
            }
            else
            {
                $gettingKnow_child_list=NULL;
            }


            $condition=['parent_id','=','0'];
            $gettingKnow_parent_list=$this->get_categoryGettingknow(NULL,NULL,1,NULL,'get',$condition);

            $getFollowbyCategory=$this->getFollowbyCategory();


//            if(!is_null($scholarship->user->get_scholarshipInterview))
//            {
                $courses=course::where('start','>',$this->dateNow)
                    ->where('id','<>',3)
                    ->where('id','<>',15)
                    ->where('id','<>',65)

                    //برای این شرط باید لول 2 یا در نظر گرفته بشه

//                    ->when($scholarship->user->get_scholarshipInterview->level==3,function($query)use($scholarship)
//                    {
//                        $query->where('type','=',1);
//                    })
//                    ->when($scholarship->user->get_scholarshipInterview->level!=3,function($query)use($scholarship)
//                    {
//                        $query->where('type','=',$scholarship->user->get_scholarshipInterview->level);
//                    })
//                    ->when($scholarship->user->get_scholarshipInterview->type_holding==1,function($query)use($scholarship)
//                    {
//                        //حضوری ها در مصاحبه مقدار 1 دارند در جدول درس 2
//                        //آنلاین ها در مصاحبه مقدار 2 دارند در جدول درس 1
//
//                        $query->where('type_course','=',2);
//                    })
//                    ->when($scholarship->user->get_scholarshipInterview->type_holding==2,function($query)use($scholarship)
//                    {
//                        //حضوری ها در مصاحبه مقدار 1 دارند در جدول درس 2
//                        //آنلاین ها در مصاحبه مقدار 2 دارند در جدول درس 1
//                        $query->where(function($query)
//                        {
//                                $query->orwhere('type_course','=',1)
//                                    ->orwhere('type_course','=',2);
//                        });
//                    })
                    ->orderby('id','desc')
                    ->get();
//            }
//            else
//            {
//                $courses=NULL;
//            }



            //امتیاز
            $count_scholarshipIntroduce=0;
            foreach ($scholarship->user->get_invitations->where('created_at','>','2022-07-20 00:00:00')->where('resource','=','بورسیه تحصیلی') as $item)
            {
                if(!is_null($item->scholarship))
                {
                    if($item->scholarship->get_score()>0)
                    {
                        $count_scholarshipIntroduce=$count_scholarshipIntroduce+(floor(($item->scholarship->get_score()*10)/100) );
                    }
                }
            }

//            $count_scholarshipIntroduce=$count_scholarshipIntroduce*4;

            //جمع امتیازات
            $result_final=0;

            if(is_null($scholarship->score_profile))
            {
                $result_final=$result_final+0;
            }
            else
            {
                $result_final=$result_final+$scholarship->score_profile;

            }

            if($scholarship->confirm_webinar==1)
            {
                $result_final=$result_final+5;
            }
            else
            {
                $result_final=$result_final+0;
            }

            $result_final=$result_final+$count_scholarshipIntroduce;

            if(count($scholarship->user->get_scholarshipexam)==0 || $scholarship->user->get_scholarshipexam->last()->score<50)
            {
                $result_final=$result_final+0;
            }
            elseif(($scholarship->user->get_scholarshipexam->last()->score) >= 50 && ($scholarship->user->get_scholarshipexam->last()->score) <= 70)
            {
                $result_final=$result_final+5;
            }
            elseif(($scholarship->user->get_scholarshipexam->last()->score) > 70)
            {
                $result_final=$result_final+5;
            }

            if(is_null($scholarship->user->get_scholarshipInterview))
            {
                $result_final=$result_final+0;
            }
            else
            {
                $result_final=$result_final+$scholarship->user->get_scholarshipInterview->score;
            }

            $result_final=$result_final+$scholarship->score_introductionletter;

            $nextMonth=verta()->addMonth(1)->format('Y/m/d');
            if($scholarship->type_payment==1)
            {
                $secondMonth=verta()->addMonth(2)->format('Y/m/d');
            }
            elseif($scholarship->type_payment==2)
            {
                $secondMonth=[];
                for($i=1;$i<=5;$i++)
                {
                    array_push($secondMonth,verta()->addMonth($i)->format('Y/m/d'));
                }
            }
            elseif($scholarship->type_payment==3)
            {
                $secondMonth=[];
                for($i=1;$i<=2;$i++)
                {
                    array_push($secondMonth,verta()->addMonth($i)->format('Y/m/d'));
                }
            }
            else
            {
                $secondMonth=NULL;
            }


            $collabration_category=collabration_category::where('status','=',1)
                                ->get();





            return  view('user.scholarship.profile')
                        ->with('messages',$messages)
                        ->with('states',$states)
                        ->with('city',$city)
                        ->with('cities',$cities)
                        ->with('gettingKnow_child_list',$gettingKnow_child_list)
                        ->with('gettingKnow_parent_list',$gettingKnow_parent_list)
                        ->with('getFollowbyCategory',$getFollowbyCategory)
                        ->with('courses',$courses)
                        ->with('result_final',$result_final)
                        ->with('count_scholarshipIntroduce',$count_scholarshipIntroduce)
                        ->with('nextMonth',$nextMonth)
                        ->with('secondMonth',$secondMonth)
                        ->with('collabration_category',$collabration_category)
                        ->with('scholarship',$scholarship);
        }
    }



    public function answerstatus(Request $request)
    {
        $this->validate($request,[
            'target'        =>'nullable|array',
            'types'         =>'nullable|array',
            'gettingknow'   =>'nullable|string',
            'cooperation'   =>'nullable|string',
            'applicant'     =>'nullable|numeric',
            'resume'        =>'nullable|mimes:jpeg,jpg,pdf,doc,png|max:1024',
        ]);

        $scholarship=scholarship::where('user_id','=',Auth::user()->id)
                        ->first();

        $scholarship->update($request->all());

        if ($request->has('resume') && $request->file('resume')->isValid()) {
            $file = $request->file('resume');
            $resume = "resume-" . Auth::user()->tel . "." . $request->file('resume')->extension();
            $path = public_path('/documents/scholarship');
            $files = $request->file('resume')->move($path, $resume);

        }

        if(isset($resume))
        {
            $scholarship->resume=$resume;
        }

        if(!is_null($request->target))
        {
            $scholarship->target=implode(',',$request->target);
        }

        if(!is_null($request->types))
        {
            $scholarship->types=implode(',',$request->types);
        }

        $scholarship->confirm_target=0;
        $scholarship->confirm_types=0;
        $scholarship->confirm_gettingknow=0;
        $scholarship->confirm_cooperation=0;
        $scholarship->confirm_applicant=0;
        $scholarship->confirm_resume=0;
        $scholarship->status=5;
        $scholarship->save();

        $status=message::create([
            'user_id_send'      =>Auth::user()->id,
            'comment'           =>$request->comment,
            'user_id_recieve'   =>$scholarship->user->id,
            'type'              =>'scholarship',
            'date_fa'           =>$this->dateNow,
            'time_fa'           =>$this->timeNow,
        ]);
        if($status)
        {
            $msg=Auth::user()->fname.' '.Auth::user()->lname."\n فرم بورسیه را اصلاح کرد";
            $this->sendSms("09153159020",$msg);

            alert()->success('اطلاعات با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت اطلاعات')->persistent('بستن');
        }
        return back();

    }

    //جواب معرفی نامه
    public function answerstatus_introduction(Request $request)
    {
        $this->validate($request,[
            'comment'       =>'required|string',
        ]);

        $scholarship=scholarship::where('user_id','=',Auth::user()->id)
            ->first();

        $status=message::create([
            'user_id_send'      =>Auth::user()->id,
            'comment'           =>$request->comment,
            'user_id_recieve'   =>$scholarship->user->id,
            'type'              =>'scholarship_introductionletter',
            'date_fa'           =>$this->dateNow,
            'time_fa'           =>$this->timeNow,
        ]);

        if($status)
        {
            $msg=Auth::user()->fname.' '.Auth::user()->lname."\n معرفی نامه را اصلاح کرد";
            $this->sendSms("09153159020",$msg);
            alert()->success('اطلاعات با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت اطلاعات')->persistent('بستن');
        }
        return back();
    }

    public function exportExcel()
    {

        $scholarship=scholarship::get();
        foreach ($scholarship as $item)
        {
            if($item->user->created_at>'2022-07-20 00:00:00')
            {
                $item->newUser='*';
            }

            $item->created_at=$this->changeTimestampToShamsi($item->created_at);
        }



        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Ymd');
        $this->timeNow = $dateNow->format('His');
        $fileName=$this->dateNow.$this->timeNow.".xlsx";

        $list=[];

        foreach ($scholarship as $item) {
            array_push($list,['جدید'=>$item['newUser'],'نام'=>$item->user->fname,'نام خانوادگی'=>$item->user->lname,'تلفن همراه'=>$item->user->tel,'تاریخ ثبت نام'=>substr($item->created_at,0,10)]);
        }

        $excel=fastexcel($list)->export($fileName);

        if($excel)
        {
            return response()->download(public_path($fileName))
                                ->deleteFileAfterSend(true);
        }
    }



    public function sendSMS_incompleteProfile()
    {
        $scholarship=scholarship::where('status','<>','1')
                        ->get();
        $user_incomplete=[];
        foreach ($scholarship as $item)
        {
            if(strlen($item->user->email)==0||strlen($item->user->fname)==0||strlen($item->user->lname)==0||strlen($item->user->datebirth)==0|| strlen($item->user->father)==0|| strlen($item->user->codemelli)==0||strlen($item->user->sex)==0||strlen($item->user->tel)==0||strlen($item->user->shenasname)==0||strlen($item->user->born)==0||strlen($item->user->education)==0||strlen($item->user->reshteh)==0||strlen($item->user->job)==0||strlen($item->user->state)==0||strlen($item->user->city)==0||strlen($item->user->address)==0||strlen($item->user->personal_image)==0||strlen($item->user->resume)==0||strlen($item->user->married)==0)
            {
                array_push($user_incomplete,$item->user);
            }

        }

        foreach ($user_incomplete as $item)
        {
            $msg="$item->fname $item->lname عزیز\n "."مرحله دوم پروفایل بورسیه شما کامل نشده است.\n"."لطفا هرچه سریعتر با استفاده از لینک زیر آن را تکمیل نمایید.\n"."b2n.ir/g42306";
            $item->notify(new sendMessageNotification($item->tel,$msg));

            $followups = followup::where('user_id', '=', $item->id)
                            ->get();

            foreach ($followups as $item_followup)
            {
                $t = followup::where('id', '=', $item_followup->id)   //    $this->get_followup($item->followups_id,NULL,NULL,NULL,"first");
                            ->first();
                $t->flag = 0;
                $t->update();
            }

            followup::create(
                [
                'user_id' => $item->id,
                'insert_user_id' => Auth::user()->id,
                'comment' => "ارسال پیامک: $msg",
                'status_followups' => 11,
                'nextfollowup_date_fa' => NULL,
                'flag' => 1,
                'date_fa' => $this->dateNow,
                'time_fa' => $this->timeNow,

            ]);
        }

        alert()->success(count($user_incomplete). " پیامک برای افرادی که پروفایل ناقص دارند ارسال شد")->persistent('بستن');
        return back();

    }

    //لیست قبول شده های وبینار
//    public function webinar_accept()
//    {
//        $scholarships=scholarship::where('confirm_webinar','=',1)
//                        ->get();
//        foreach ($scholarships as $item)
//        {
//            $item->created_at=$this->changeTimestampToShamsi($item->created_at);
//        }
//
//
//        return view('admin.scholarship.users')
//            ->with('scholarships',$scholarships);
//    }

    //لیست قبول شده های آزمون
//    public function exam_accept()
//    {
//        $scholarships=scholarship::where('confirm_exam','=',1)
//            ->get();
//        foreach ($scholarships as $item)
//        {
//            $item->created_at=$this->changeTimestampToShamsi($item->created_at);
//        }
//
//
//        return view('admin.scholarship.users')
//            ->with('scholarships',$scholarships);
//    }


    //معرفی نامه
    public function introductionletter(Request $request)
    {
        $this->validate($request,[
            'introductionletter'    =>'required|mimes:jpeg,jpg,bmp,png,pdf,doc|max:1024',
        ]);

        $scholarship=Auth::user()->scholarship;
        if ($request->has('introductionletter') && $request->file('introductionletter')->isValid()) {
            $file = $request->file('introductionletter');
            $introductionletter = "introductionletter-" . Auth::user()->tel . "." . $request->file('introductionletter')->extension();
            $path = public_path('documents/scholarship/');
            $request->file('introductionletter')->move($path, $introductionletter);
        }

        $scholarship->introductionletter=$introductionletter;
        $status=$scholarship->save();
        if($status)
        {
            alert()->success('معرفی نامه با موفقیت بارگذاری شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بارگذاری معرفی نامه')->persistent('بستن');
        }

        return back();
    }

    //شرکت نکرده ها در آزمون
    public function dontParticipateIntheExam()
    {
        $scholarships=scholarship::where('confirm_exam','=',0)
                        ->get();
        foreach ($scholarships as $item)
        {
            $item->created_at=$this->changeTimestampToShamsi($item->created_at);
        }

        return view('admin.scholarship.users')
            ->with('scholarships',$scholarships);

    }


    public function financial()
    {
        $checkouts=checkout::where('status','=',1)
                    ->where('type','=','scholarship_payment')
                    ->get();

        $scholarships=scholarship::where('resource','=','scholarship')
                        ->whereNotNull('financial')
                        ->get();

        foreach ($scholarships as $item)
        {
            $item->created_at=$this->changeTimestampToShamsi($item->created_at);
        }

        return view('admin.scholarship.financial')
            ->with('checkouts',$checkouts)
            ->with('scholarships',$scholarships);
    }


    public function scoreStore(Request $request,scholarship $scholarship)
    {

        $this->validate($request,
        [
           'score_profile'              =>'nullable|numeric|min:0',
           'score_introductionletter'   =>'nullable|numeric|between:0,5',
        ]);
        $scholarship->update($request->all());
        alert()->success('امتیاز با موفقیت ثبت شد')->persistent('بستن');
        return back();
    }

    public  function changestatusIntroductionLetter(Request $request,scholarship $scholarship)
    {

        $this->validate($request, [
            'confirm_introductionletter' => 'required|numeric',
            'comment' => 'required|string',
        ]);



        $scholarship->confirm_introductionletter = $request->confirm_introductionletter;
        $scholarship->save();
        $status = message::create([
            'user_id_send' => Auth::user()->id,
            'comment' => $request->comment,
            'user_id_recieve' => $scholarship->user->id,
            'type' => 'scholarship_introductionletter',
            'date_fa' => $this->dateNow,
            'time_fa' => $this->timeNow,
        ]);

        switch ($request->confirm_introductionletter)
        {
            case(1):$status_scholarship= 'قبول';
                break;
            case(2):$status_scholarship ='رد معرفی نامه';
                break;
            case(3):$status_scholarship='در حال بررسی';
                break;
            case(4):$status_scholarship='اصلاح معرفی نامه';
                break;

        }


        if($request->status==1)
        {
            $msg=$scholarship->user->fname." ".$scholarship->user->lname." عزیز \n معرفی نامه شما تائید شد\n";
        }
        else
        {
            $msg="نتیجه معرفی نامه شما:".$status_scholarship."\n برای آگاهی بیشتر به پورتال فراکوچ مراجعه کنید";
        }
        $this->sendSms($scholarship->user->tel,$msg);



        if($status)
        {
            alert()->success('اطلاعات با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت اطلاعات')->persistent('بستن');
        }

        return back();
    }

    public function sendSMSIntroduce(Request $request)
    {

        $this->validate($request,
        [
            'sendSMSIntroduce'  =>'required|array',
            'exampleSendSms'    =>'required|numeric|in:1,2',
        ]);

        foreach ($request->sendSMSIntroduce as $item)
        {
            $user=User::where('id','=',$item)
                        ->first();
            if($request->exampleSendSms==1)
            {
                Auth::user()->tel=(str_replace("+98",0,Auth::user()->tel));
                $sms=$user->fname.' '.$user->lname." عزیز\n".Auth::user()->fname.' '.Auth::user()->lname." شما را واجد شرایط دانسته، برای بورسیه کوچینگ آکادمی فراکوچ معرفی نمود\n"."پیشنهاد میکنم این فرصت بینظیر را از دست ندهید."." \nfaracoach.com/scholaship";

            }
            elseif($request->exampleSendSms==2)
            {
                Auth::user()->tel=(str_replace("+98",0,Auth::user()->tel));
                $sms= $user->fname." ".$user->lname." عزیز\n".
                    "من ".Auth::user()->fname.' '.Auth::user()->lname.
                    "\nشما را واجد شرایط دانسته و برای بورسیه کوچینگ آکادمی فراکوچ معرفی نمودم ".
                    "\nبرای اطلاعات بیشتر با من تماس بگیرید\n".
                    Auth::user()->tel."\n".
                    "faracoach.com/scholarship";
            }

            $this->sendSms($user->tel,$sms);
        }

        alert()->success('پیامها برای افراد مشخص شده ارسال شد')->persistent('بستن');
        return back();
    }

    public function confirm_webinar(Request $request,scholarship $scholarship)
    {
        $scholarship->confirm_webinar=1;
        $status=$scholarship->save();
        if($status)
        {
            alert()->success('کد دوره آموزشی مورد تایید قرار گرفت')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در تایید کد دوره آموزشی')->persistent('بستن');
        }

        return back();

    }

    public function type_payment(Request $request,scholarship $scholarship)
    {
        $this->validate($request,[
           'type_payment'   =>'required|numeric'
        ]);

        $scholarship->type_payment=$request->type_payment;
        $status=$scholarship->save();
        if($status)
        {
            alert()->success('نحوه پرداخت تغییر کرد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا نحوه پرداخت ')->persistent('بستن');
        }

        return back();
    }

    public function report_result()
    {
        $scholarships=scholarship::where('resource','=','scholarship')
                            ->get();
        foreach($scholarships as $item)
        {
            $item->score=$item->get_score_details();
        }
        return view('admin.scholarship.report_details')
                    ->with('scholarships',$scholarships);
    }

    public function sendAcceptCollabration()
    {
        $scholarship=scholarship::where('user_id','=',Auth::user()->id)
                    ->first();
        $scholarship->collabration=1;
//        collabration_accept::where('user_id','=',Auth::user()->id)
//                            ->update([
//                                'status'    =>1,
//                            ]);

        $status=$scholarship->update();
        if($status)
        {
            $this->sendSms(Auth::user()->tel,'درخواست های همکاری بورسیه شما جهت بررسی ارسال شد');
            $this->sendSms('09153159020',Auth::user()->fname.' '.Auth::user()->lname." درخواست های همکاری خود را جهت بررسی ارسال کرد ");
            alert()->success('درخواست جهت بررسی ارسال شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ارسال درخواست')->persistent('بستن');
        }
        return back();
    }


    public  function collabrations()
    {
        $scholarships=scholarship::where('collabration','=',1)
                    ->orderby('financial')
                    ->get();
        foreach ($scholarships as $scholarship)
        {
            $scholarship->created_at=$this->changeTimestampToShamsi($scholarship->created_at);
        }

        $collabration_details=collabration_details::where('status','=','1')
                                ->get();
        return view('admin.scholarship.users_collabration')
                        ->with('collabration_details',$collabration_details)
                        ->with('scholarships',$scholarships);
    }



    public function create_knot(Request $request)
    {
        if(isset($request->introduce))
        {
            session()->put('introduce',$request->introduce);

        }


        if((Auth::check()))
        {
            if((!is_null(Auth::user()->scholarship)))
            {
                return redirect('/panel/scholarship/me');
            }
        }

        return  view('knot.knot');
    }


    public function updateregister(scholarship $scholarship,Request $request)
    {
        $this->validate($request,[
           'target'     =>'required|array',
           'types'      =>'required|array',
           'gettingknow'=>'required|between:1,3',
           'cooperation'=>'nullable|string',
           'applicant' =>'required|between:1,2',
           'resume'    =>'required|mimes:docx,doc,pdf,jpg,png|max:1024',
        ]);
        $scholarship->update($request->all());
        if($request->has('resume')&&$request->file('resume')->isValid())
        {
            $file = $request->file('resume');
            $resume = "resume-" . Auth::user()->tel . "." . $request->file('resume')->extension();
            $path = public_path('/documents/scholarship');
            $files = $request->file('resume')->move($path, $resume);
        }
        else
        {
            $resume=NULL;
        }


        $scholarship->target = implode(',', $request->target);
        $scholarship->types = implode(',', $request->types);
        $scholarship->gettingknow = $request->gettingknow;
        $scholarship->cooperation = $request->cooperation;
        $scholarship->applicant = $request->applicant;
        $scholarship->resume = $resume;
        $status=$scholarship->save();

        if($status)
        {
            alert()->success('اطلاعات با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در اپدیت')->persistent('بستن');
        }

        return back();

    }

    public function register_financial(Request $request,scholarship $scholarship)
    {

        $this->validate($request,[
            'course_id'     =>'required|numeric',
            'fi'            =>'required|numeric',
            'score'         =>'required|numeric|between:0,100',
            'fi_final'      =>'required|numeric',
            'pre_payment'   =>'required|numeric',
            'date_payment'  =>'required|string',
            'type_payment'  =>'required|numeric|between:1,12',
            'time_fa'       =>'required|string',
            'authority'     =>'required|unique:scholarships,financial|string',
        ]);

        $scholarship->financial=$request->authority;
        $scholarship->save();
        if($request->score<50)
        {
            $loan=0;
        }
        else
        {
            $loan=10;
        }


        $status=scholarship_payment::create([
            'user_id'     =>$scholarship->user_id,
            'course_id'   =>$request->course_id,
            'fi'          =>$request->fi,
            'loan'        =>$loan,
            'score'       =>$request->score,
            'fi_final'    =>$request->fi_final,
            'pre_payment' =>$request->pre_payment,
            'remaining'   =>($request->fi_final-$request->pre_payment),
            'date_fa'     =>$request->date_payment,
            'time_fa'     =>$request->time_fa,
            'type_payment'=>0,
        ]);

        if($status)
        {
            $status_checkout=checkout::create([
                'user_id'   =>$scholarship->user_id,
                'order_id'  =>$status->id,
                'product_id'=>$request->course_id,
                'price'     =>$request->pre_payment,
                'type'      =>'scholarship_payment',
                'authority' =>$request->authority,
                'description'=>'خرید انجام شد',
                'status'    =>1,

            ]);

            if($status_checkout)
            {
                $remaining=$request->fi_final-$request->pre_payment;
                $newDate=Verta::parse(str_replace('/','-',$request->date_payment.' '.$request->time_fa));
                for ($i=1;$i<=$request->type_payment;$i++)
                {
                    $newDate=$newDate->addMonth(1);
                    faktor::create([
                        'user_id'           =>$scholarship->user_id,
                        'checkout_id'       =>$status_checkout->id,
                        'product_id'        =>$request->course_id,
                        'type'              =>'course',
                        'date_createfaktor' =>$request->date_payment,
                        'date_faktor'       =>$newDate->format('Y/m/d'),
                        'fi'                =>$remaining/$request->type_payment,
                    ]);
                }
                alert()->success('اطلاعات پرداخت با موفقیت ثبت شد')->persistent('بستن');
                $student=student::where('user_id','=',$scholarship->user_id)
                            ->where('course_id','=',$request->course_id)
                            ->first();
                if(is_null($student))
                {
                    student::create([
                        'user_id'   =>$scholarship->user_id,
                        'course_id' =>$request->course_id,
                        'status'    =>1,
                        'date_fa'   =>$request->date_payment,
                        'time_fa'   =>$request->time_fa,
                    ]);
                }

            }
            else
            {
                alert()->error('خطا در صبت اطلاعات درگاه')->persistent('بستن');
            }
        }
        else
        {
            alert()->error('خطا در ثبت اطلاعات پرداخت بورسیه')->persistent('بستن');
        }

        return back();

    }



}
