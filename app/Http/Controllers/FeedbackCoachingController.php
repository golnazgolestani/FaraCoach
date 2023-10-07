<?php

namespace App\Http\Controllers;

use App\booking;
use App\feedback_coaching;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackCoachingController extends BaseController
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
    public function store(Request $request)
    {

        $this->validate($request,
        [
            'sense'                 =>'required|numeric|between:1,5',
            'expectations'          =>'required|numeric|between:1,5',
            'trust'                 =>'required|numeric|between:1,5',
            'listen'                =>'required|numeric|between:1,5',
            'emotions'              =>'required|numeric|between:1,5',
            'failure_provide'       =>'required|numeric|between:1,5',
            'time_management'       =>'required|numeric|between:1,5',
            'proper_feedback'       =>'required|numeric|between:1,5',
            'drawing_goals'         =>'required|numeric|between:1,5',
            'check_dimensions'      =>'required|numeric|between:1,5',
            'solution_evaluation'   =>'required|numeric|between:1,5',
            'homework'              =>'required|numeric|between:1,5',
            'summary_comments'      =>'required|numeric|between:1,5',
            'best_offer'            =>'nullable|string|max:250',
            'effective_criticism'   =>'nullable|string|max:250',
            'achievement'           =>'nullable|string|max:250',
            'self_awareness'        =>'nullable|string|max:250',
            'challenges'            =>'nullable|string|max:250',
            'opportunities_you'     =>'nullable|string|max:250',
            'future_expectations'   =>'nullable|string|max:250',
            'suggestions_progress'  =>'nullable|string|max:250',
            'satisfaction'          =>'required|boolean',
            'comment'               =>'nullable|string',
        ],[
            'sense.required'                =>'امتیاز "حس شما از شرکت در جلسه" الزامی است',
            'expectations.required'         =>'امتیاز "میزان برآورده شدن انتظارات شما و اثر بخشی جلسه" الزامی است',
            'trust.required'                =>'امتیاز "ایجاد اعتماد و فضای امن و مثبت توسط کوچ" الزامی است',
            'listen.required'               =>'امتیاز "گوش دادن موثر کوچ" الزامی است',
            'emotions.required'             =>'امتیاز "درک احساسات و همدلی مناسب کوچ با شما" الزامی است',
            'failure_provide.required'      =>'امتیاز "عدم ارائه راهکارهای مستقیم به شما" الزامی است',
            'time_management.required'      =>'امتیاز "مدیریت زمان جلسه توسط کوچ (شروع و پایان به موقع)" الزامی است',
            'proper_feedback.required'      =>'امتیاز "جمع بندی و ارائه بازخوردهای مناسب به شما" الزامی است',
            'drawing_goals.required'        =>'امتیاز "کمک به ترسیم اهداف کلی شما" الزامی است',
            'check_dimensions.required'     =>'امتیاز "کمک به بررسی ابعاد مختلف موضوع" الزامی است',
            'solution_evaluation.required'  =>'امتیاز "کمک به ارزیابی راهکارهای موجود و یافته شده" الزامی است',
            'homework.required'             =>'امتیاز "ارائه تکلیف و تمرین به شما" الزامی است',
            'summary_comments.required'     =>'امتیاز "جمع بندی نظرات شما در یک جمله" الزامی است',
            'satisfaction.required'         =>'امتیاز "پیشنهاد این کوچ به دیگران" الزامی است',
        ]);


        $booking=booking::where('id','=',$request->booking_id)
                        ->first();

        $status=feedback_coaching::create($request->all()+[
                'user_id'   =>Auth::user()->id,
            ]);
        if($status)
        {
            alert()->success('بازخورد با موفقیت ثبت شد','پیام')->persistent('بستن');
            $msg='بازخورد جلسه '.$booking->start_date."  شما در سیستم ثبت شد \n فراکوچ ";
            $this->sendSms($booking->coach->user->tel,$msg);
        }
        else
        {
            alert()->error('خطا در ثبت بازخورد','خطا')->persistent('بستن');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\feedback_coaching  $feedback_coaching
     * @return \Illuminate\Http\Response
     */
    public function show(feedback_coaching $feedback_coaching)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\feedback_coaching  $feedback_coaching
     * @return \Illuminate\Http\Response
     */
    public function edit(feedback_coaching $feedback_coaching)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\feedback_coaching  $feedback_coaching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, feedback_coaching $feedback_coaching)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\feedback_coaching  $feedback_coaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(feedback_coaching $feedback_coaching)
    {
        //
    }
}
