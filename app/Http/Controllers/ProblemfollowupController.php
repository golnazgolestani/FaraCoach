<?php

namespace App\Http\Controllers;

use App\problemfollowup;
use Illuminate\Http\Request;

class ProblemfollowupController extends Controller
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
        $this->validate(request(),
            [
                'problem'  =>'required|string|min:4',
                'color'    =>'required|string' ,
                'status'   =>'required|numeric'
            ]);
        $status = problemfollowup::create($request->all());
        if($status)
        {
            $msg="اطلاعات با موفقیت ذخیره شد";
            $errorStatus='success';
        }
        else
        {
            $msg="خطا در ذخیره";
            $errorStatus="danger";
        }
        return  back()
            ->with('msg',$msg)
            ->with('errorStatus',$errorStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\problemfollowup  $problemfollowup
     * @return \Illuminate\Http\Response
     */
    public function show(problemfollowup $problemfollowup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\problemfollowup  $problemfollowup
     * @return \Illuminate\Http\Response
     */
    public function edit(problemfollowup $problemfollowup)
    {
        return view('panelAdmin/editProblemFollowup')
                ->with('problemfollowup',$problemfollowup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\problemfollowup  $problemfollowup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, problemfollowup $problemfollowup)
    {
        $this->validate(request(),
            [
                'problem'  =>'required|string|min:4',
                'status'   =>'required|numeric'
            ]);

        $status=$problemfollowup->update($request->all());
        if($status)
        {
            $msg="اطلاعات با موفقیت بروزرسانی  شد";
            $errorStatus='success';
        }
        else
        {
            $msg="خطا در بروزرسانی";
            $errorStatus="danger";
        }
        return  back()
            ->with('msg',$msg)
            ->with('errorStatus',$errorStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\problemfollowup  $problemfollowup
     * @return \Illuminate\Http\Response
     */
    public function destroy(problemfollowup $problemfollowup)
    {
        $status=$problemfollowup->delete();
        if($status)
        {
            $msg="اطلاعات با موفقیت حذف شد";
            $errorStatus="success";
        }
        else
        {
            $msg="خطا در ذخیره";
            $errorStatus="danger";
        }

        return back()->with('msg',$msg)
                     ->with('errorStatus',$errorStatus);
    }
}
