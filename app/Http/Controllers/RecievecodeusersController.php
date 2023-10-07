<?php

namespace App\Http\Controllers;

use App\recievecodeusers;
use App\scholarship;
use App\verify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecievecodeusersController extends BaseController
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\recievecodeusers  $recievecodeusers
     * @return \Illuminate\Http\Response
     */
    public function show(recievecodeusers $recievecodeusers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recievecodeusers  $recievecodeusers
     * @return \Illuminate\Http\Response
     */
    public function edit(recievecodeusers $recievecodeusers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recievecodeusers  $recievecodeusers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recievecodeusers $recievecodeusers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recievecodeusers  $recievecodeusers
     * @return \Illuminate\Http\Response
     */
    public function destroy(recievecodeusers $recievecodeusers)
    {
        //
    }

    //چک کردن و سیو کردن کد وبینار
    public function store_webinarCode(Request $request)
    {

        $this->validate($request,[
            'code1'   =>'required|numeric|max:99|min:10',
            'code2'   =>'required|numeric|max:99|min:10',
            'code3'   =>'required|numeric|max:99|min:10',
        ]);

        $codeWebinar=$request->code1.$request->code2.$request->code3;


        $status = recievecodeusers::create(
            [
                'user_id'   => Auth::user()->id,
                'code'      => $codeWebinar,
                'date_fa'   => $this->dateNow,
                'time_fa'   => $this->timeNow,
                'type'      =>'وبینار بورسیه'
            ]);





        if($codeWebinar=='372739')
        {
            $scholarship=scholarship::where('user_id','=',Auth::user()->id)
                        ->first();
            $scholarship->confirm_webinar=1;
            $scholarship->save();
            alert()->success('کد وبینار با موفقیت وارد شد')->persistent('بستن');
            echo("<div class='alert alert-success'>کد با موفقیت وارد شد</div>");
            echo "<script>location.reload()</script>";

        }
        else
        {
            echo("<div class='alert alert-danger'>کد اشتباه می باشد</div>");

        }

        $recieveCode=recievecodeusers::where('user_id','=',Auth::user()->id)
                        ->count();


        if($recieveCode>2)
        {
            alert()->error('تعداد دفعات کد ورود وبینار بیش از حد مجاز می باشد')->persistent('بستن');
            echo "<script>location.reload()</script>";
        }
    }
}
