<?php

namespace App\Http\Controllers;

use App\scholarship;
use App\scholarshipExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScholarshipExamController extends BaseController
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
        return view('user.scholarship.examCoaching');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sum=0;
        $result=[];
        for ($i=1;$i<=25;$i++)
        {
            $sum=$sum+($request['vehicle'.$i]);
            array_push($result,$request['vehicle'.$i]);
        }

        $result=(implode(',',$result));
        scholarshipExam::create([
            'user_id'   =>Auth::user()->id,
            'result'    =>$result,
            'score'     =>$sum,
            'date_fa'   =>$this->dateNow,
            'time_fa'   =>$this->timeNow,
        ]);

        if($sum>50)
        {
            $scholarship=scholarship::where('user_id','=',Auth::user()->id)
                            ->first();
            $scholarship->confirm_exam=1;
            $scholarship->save();
            $msg="نتیجه آزمون شما:$sum \n"."تبریک\n شما در آزمون مقدماتی بورسیه کوچینگ قبول شده اید"."\nفراکوچ ";
            $this->sendSms(Auth::user()->tel,$msg);
            $msg=Auth::user()->fname.' '.Auth::user()->lname." در آزمون مقدماتی قبول شد."."\n امتیاز:$sum ";
            $this->sendSms('09153159020',$msg);
            alert()->success('شما در آزمون مقدماتی بورسیه کوچینگ قبول شده اید')->persistent('بستن');
        }
        else
        {
            $msg="نتیجه آزمون شما:$sum \n"."متاسفانه امتیاز شما در آزمون مقدماتی به حد نصاب ممکن نرسید"."\nفراکوچ ";
            $this->sendSms(Auth::user()->tel,$msg);
            $msg=Auth::user()->fname.' '.Auth::user()->lname." در آزمون مقدماتی رد شد."."\n امتیاز:$sum ";
            $this->sendSms('09153159020',$msg);
            alert()->error('متاسفانه امتیاز شما در آزمون مقدماتی به حد نصاب ممکن نرسید')->persistent('بستن');
        }

        return redirect('/panel/scholarship/me');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\scholarshipExam  $scholarshipExam
     * @return \Illuminate\Http\Response
     */
    public function show(scholarshipExam $scholarshipExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\scholarshipExam  $scholarshipExam
     * @return \Illuminate\Http\Response
     */
    public function edit(scholarshipExam $scholarshipExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\scholarshipExam  $scholarshipExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, scholarshipExam $scholarshipExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\scholarshipExam  $scholarshipExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(scholarshipExam $scholarshipExam)
    {
        //
    }
}
