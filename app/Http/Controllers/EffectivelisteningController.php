<?php

namespace App\Http\Controllers;

use App\effectivelistening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EffectivelisteningController extends BaseController
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
        return view('user.effectiveListenings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $score=0;
        for ($i=1;$i<=15;$i++)
        {
            $tmp="vehicle".$i;
            $score=$score+$request->$tmp;
        }

        $status=effectivelistening::create([
            'user_id'   =>Auth::user()->id,
            'score'     =>$score

        ]);
        if($status)
        {
            $tmp='امتیاز شما در ارزیابی گوش دادن موثر '.$status->score." می باشد \n برای دریافت پاسخ و راهکارهای اختصاصی خود کلیک کنید \n"."b2n.ir/t49858";
            $this->sendSms(Auth::user()->tel,$tmp);
            alert()->success("آزمون با موفقیت انجام شد\n"."\n امتیاز آزمون شما ".$status->score."\n می باشد ". " می باشد \n برای دریافت پاسخ و راهکارهای اختصاصی خود کلیک کنید \n" ."<a href='https://b2n.ir/t49858' class='btn btn-primary' target='_blank'>کلیک کنید</a>")->html()->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت آزمون')->persistent('بستن');
        }

        return redirect('/panel')
                    ->with('effective',$status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\effectivelistening  $effectivelistening
     * @return \Illuminate\Http\Response
     */
    public function show(effectivelistening $effectivelistening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\effectivelistening  $effectivelistening
     * @return \Illuminate\Http\Response
     */
    public function edit(effectivelistening $effectivelistening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\effectivelistening  $effectivelistening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, effectivelistening $effectivelistening)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\effectivelistening  $effectivelistening
     * @return \Illuminate\Http\Response
     */
    public function destroy(effectivelistening $effectivelistening)
    {
        //
    }
}
