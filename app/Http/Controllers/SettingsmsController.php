<?php

namespace App\Http\Controllers;

use App\settingsms;
use Illuminate\Http\Request;

class SettingsmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=settingsms::orderby('id','desc')
            ->get();
        foreach ($setting as $item)
        {
            if($item->type==1)
            {
                $item->type="پیگیری";
            }
            else if($item->type==2)
            {
                $item->type="ثبت نام مدیران";
            }
        }




        return view('admin.settingsSms')
            ->with('settingsms',$setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panelAdmin.insertSms');
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
            'type'      =>'required|numeric',
            'status'    =>'required|numeric',
            'comment'   =>'required|string',
        ]);
        $status=settingsms::create($request->all());
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
     * @param  \App\settingsms  $settingsms
     * @return \Illuminate\Http\Response
     */
    public function show($settingsms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\settingsms  $settingsms
     * @return \Illuminate\Http\Response
     */
    public function edit($settingsms)
    {
        $settingsms=settingsms::find($settingsms);
        return view('panelAdmin.editSms')
            ->with('settingsms',$settingsms);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\settingsms  $settingsms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settingsms=settingsms::find($id);
        if(!is_null($settingsms))
        {
            $this->validate($request,[
                'type'      =>'required|numeric',
                'status'    =>'required|numeric',
                'comment'   =>'required|string',
            ]);
            $status=$settingsms->update($request->all());
            if($status)
            {
                $msg="اطلاعات با موفقیت بروزرسانی شد";
                $errorStatus='success';
            }
            else
            {
                $msg="خطا در بروزرسانی";
                $errorStatus="danger";
            }
        }
        else
        {
            $msg="منبع بروزرسانی یافت نشد";
            $errorStatus='danger';
        }
        return  back()
            ->with('msg',$msg)
            ->with('errorStatus',$errorStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\settingsms  $settingsms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $settingsms=settingsms::find($id);
        if(!is_null($settingsms))
        {
            $status=$settingsms->delete();
            if($status)
            {
                $msg = "اطلاعات با موفقیت حذف شد";
                $errorStatus = "success";
                return back()->with('msg', $msg)
                    ->with('errorStatus', $errorStatus);
            }
            else
            {
                $msg = "خطا در حذف اطلاعات";
                $errorStatus = "danger";
                return back()->with('msg', $msg)
                    ->with('errorStatus', $errorStatus);
            }
        }
        else
        {
            $msg="منبع بروزرسانی یافت نشد";
            $errorStatus='danger';
        }
    }
}
