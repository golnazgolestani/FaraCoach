<?php

namespace App\Http\Controllers;

use App\scientific_support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScientificSupportController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scientific_supports=scientific_support::orderby('id','desc')
                        ->get();
        return view('admin.scientific_support.scientific_support_all')
                                ->with('scientific_supports',$scientific_supports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scientific_support=scientific_support::where('user_id','=',Auth::user()->id)
                                            ->first();
        if(!is_null($scientific_support))
        {
            alert()->error('شما درخواست همکاری به عنوان پشتیبان علمی را پر کرده اید')->persistent('بستن');
            return back();
        }

        return view('user.scientific_support.scientific_support_insert');
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
            'level'                 =>'required|numeric|between:1,2',
            'students_experience'   =>'required|numeric|',
            'external_experience'   =>'required|numeric|',
            'certificates'          =>'required|string|max:200',
            'resume'                =>'required|string',
            'educational_activity'  =>'required|string',
            'know_icdl'             =>'required|numeric|between:0,2',
            'free_time'             =>'required|string|max:200',
            'blooming_experience'   =>'required|string',
        ]);
        $status=scientific_support::create($request->all()+[
                'user_id'   =>Auth::user()->id,
            ]);
        if($status)
        {
            $msg="درخواست همکاری شما به عنوان پشتیبان علمی در فراکوچ با موفقیت ثبت شد\nپس از بررسی اطلاعات شما نتیجه به شما اطلاع داده خواهد شد.";
            $this->sendSMS(Auth::user()->tel,$msg);
            $msg=Auth::user()->fname.' '.Auth::user()->lname."فرم همکاری به عنوان پشتیبانی علمی را پر کرد ";
            $this->sendSms('09198906540',$msg);
            alert()->success('درخواست همکاری شما به عنوان پشتیبان علمی ارسال شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ارسال درخواست همکاری')->persistent('بستن');
        }

        return redirect('/panel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\scientific_support  $scientific_support
     * @return \Illuminate\Http\Response
     */
    public function show(scientific_support $scientific_support)
    {
        return view('admin.scientific_support.scientific_support_edit')
                                ->with('scientific_support',$scientific_support);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\scientific_support  $scientific_support
     * @return \Illuminate\Http\Response
     */
    public function edit(scientific_support $scientific_support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\scientific_support  $scientific_support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, scientific_support $scientific_support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\scientific_support  $scientific_support
     * @return \Illuminate\Http\Response
     */
    public function destroy(scientific_support $scientific_support)
    {
        //
    }

    public function changeStatus(Request $request,scientific_support $scientific_support)
    {
        $this->validate($request,[
            'status'    =>'required|numeric|'
        ]);

        $status=$scientific_support->update($request->all());
        if($status)
        {
            $msg=$scientific_support->user->fname.' '.$scientific_support->user->lname." عزیز درخواست همکاری پشتیبان علمی شما در فراکوچ به ".$scientific_support->get_status()." تغییر کرد";
            $this->sendSms($scientific_support->user->tel,$msg);
            alert()->success('وضعیت درخواست پشتیبان علمی تغییر کرد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در تغییر وضعیت')->persistent('بستن');
        }
        return back();
    }
}
