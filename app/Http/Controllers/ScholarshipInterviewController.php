<?php

namespace App\Http\Controllers;

use App\followup;
use App\Http\Requests\scholarshipinterviewrequest;
use App\scholarship_interview;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScholarshipInterviewController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(scholarshipinterviewrequest $request)
    {

        $data=$request->validated();
        $status=scholarship_interview::create($data+[
           'insert_user_id'     =>Auth::user()->id,
           'date_fa'            =>$this->dateNow,
           'time_fa'            =>$this->timeNow,
        ]);


        if($status)
        {

            $followups = followup::where('user_id', '=', $data['user_id'])
                ->get();

            foreach ($followups as $item) {
                $t = followup::where('id', '=', $item->id)   //    $this->get_followup($item->followups_id,NULL,NULL,NULL,"first");
                            ->first();
                $t->flag = 0;
                $t->update();
            }

            followup::create([
                'user_id' => $data['user_id'],
                'insert_user_id' => Auth::user()->id,
                'comment' => $data['description']."بورسیه:",
                'status_followups' => 11,
                'flag' => 1,
                'date_fa' => $this->dateNow,
                'time_fa' => $this->timeNow,
            ]);

            $user=User::find($data['user_id']);

            if($user->scholarship->confirm_introductionletter==1)
            {
                $introductionletter="دارد";
            }
            else
            {
                $introductionletter="ندارد";
            }

            $countInvitation=$user->get_invitations->where('created_at','>','2022-07-20 00:00:00')->where('resource','=','بورسیه تحصیلی')->count();

//            $msg=$user->fname." ".$user->lname." عزیز\n"." شما ".$data['score']." امتیاز در مصاحبه بورسیه کوچینگ کسب کردید "."\n فراکوچ";         "$user->fname $user->lname عزیز ";
            $msg=$user->fname." ".$user->lname." عزیز\n"." امتیاز مصاحبه شما ثبت شد. "."\n مشاهده در my.faracoach.com\n"."\nمعرفی نامه: $introductionletter \nتعداد معرفی:$countInvitation \n مرحله پایانی:\n دریافت گواهینامه\nثبت نام دوره";
            $this->sendSms($user->tel,$msg);
            alert()->success('مصاحبه با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت مصاحبه')->persistent('بستن');
        }

        return  back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\scholarship_interview  $scholarship_interview
     * @return \Illuminate\Http\Response
     */
    public function show(scholarship_interview $scholarship_interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\scholarship_interview  $scholarship_interview
     * @return \Illuminate\Http\Response
     */
    public function edit(scholarship_interview $scholarship_interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\scholarship_interview  $scholarship_interview
     * @return \Illuminate\Http\Response
     */
    public function update(scholarshipinterviewrequest $request, scholarship_interview $scholarship_interview)
    {
        $data=$request->validated();
        $status=$scholarship_interview->update($data+[
                'insert_user_id'     =>Auth::user()->id,
                'date_fa'            =>$this->dateNow,
                'time_fa'            =>$this->timeNow,
            ]);


        if($status)
        {
            $followups = followup::where('user_id', '=', $data['user_id'])
                ->get();

            foreach ($followups as $item) {
                $t = followup::where('id', '=', $item->id)   //    $this->get_followup($item->followups_id,NULL,NULL,NULL,"first");
                ->first();
                $t->flag = 0;
                $t->update();
            }

            followup::create([
                'user_id' => $data['user_id'],
                'insert_user_id' => Auth::user()->id,
                'comment' => $data['description']."بورسیه:",
                'status_followups' => 11,
                'flag' => 1,
                'date_fa' => $this->dateNow,
                'time_fa' => $this->timeNow,
            ]);

            $user=User::find($data['user_id']);

            if($user->scholarship->confirm_introductionletter==1)
            {
                $introductionletter="دارد";
            }
            else
            {
                $introductionletter="ندارد";
            }

            $countInvitation=$user->get_invitations->where('created_at','>','2022-07-20 00:00:00')->where('resource','=','بورسیه تحصیلی')->count();

//            $msg=$user->fname." ".$user->lname." عزیز\n"." امتیاز مصاحبه شما ثبت شد. "."\n مشاهده در my.faracoach.com\n"."\nمعرفی نامه: $introductionletter \nتعداد معرفی:$countInvitation \n مرحله پایانی:\n دریافت گواهینامه\nثبت نام دوره";
//            $this->sendSms($user->tel,$msg);
            alert()->success('مصاحبه با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت مصاحبه')->persistent('بستن');
        }

        return  back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\scholarship_interview  $scholarship_interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(scholarship_interview $scholarship_interview)
    {
        //
    }
}
