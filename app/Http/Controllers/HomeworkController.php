<?php

namespace App\Http\Controllers;

use App\homework;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends BaseController
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
        $this->validate($request,[
            'text'                  =>'required|string|max:255',
            'homework_id_answer'    =>'nullable|numeric|',
            'attach'                =>'nullable|mimes:jpeg,jpg,pdf,doc,docx|max:600'
        ]);

        $user=User::join('reserves','users.id','=','reserves.user_id')
            ->join('bookings','reserves.booking_id','=','bookings.id')
            ->where('bookings.id','=',$request->booking_id)
            ->select('users.*','bookings.start_date')
            ->first();


        $status=homework::create($request->all()+
        [
            'user_id_send'      =>Auth::user()->id,
            'type'              =>'booking',
            'date_fa'           =>$this->dateNow,
            'time_fa'           =>$this->timeNow,
        ]);

        if($status)
        {
            if($request->has('attach')&&$request->file('attach')->isValid())
            {
                $file=$request->file('attach');
                $attach="homework-".time().".".$request->file('attach')->extension();
                $path=public_path('/documents/homework/');
                $files=$request->file('attach')->move($path, $attach);
                $status->attach=$attach;
                $status->save();
            }

//            $this->sendSms($user->tel,'تکلیف جلسه کوچینگ '.$user->start_date." شما توسط کوچ در پورتال قرار گرفت.\n فراکوچ " );
            alert()->success('تکلیف با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت تکلیف')->persistent('بستن');
        }

        return back();
    }


    public function answer(Request $request)
    {
        $this->validate($request,[
            'text'  =>'required|string|max:255',
            'attach'=>'nullable|mimes:jpeg,jpg,pdf,doc,docx|max:600'
        ]);

        $status=homework::create($request->all()+
            [
                'user_id_send'      =>Auth::user()->id,
                'type'              =>'booking',
                'date_fa'           =>$this->dateNow,
                'time_fa'           =>$this->timeNow,
            ]);



        if($status)
        {
            if($request->has('attach')&&$request->file('attach')->isValid())
            {
                $file=$request->file('attach');
                $attach="homework-".time().".".$request->file('attach')->extension();
                $path=public_path('/documents/homework/');
                $files=$request->file('attach')->move($path, $attach);
                $status->attach=$attach;
                $status->save();
            }
            alert()->success('تکلیف با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت تکلیف')->persistent('بستن');
        }

        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(homework $homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(homework $homework)
    {
        //
    }
}
