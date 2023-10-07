<?php

namespace App\Http\Controllers;

use App\option;
use Illuminate\Http\Request;

class OptionController extends Controller
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, option $option)
    {

        $this->validate($request,
            [
                'introduced_verify' =>'nullable|string'
            ]);

        $status=option::where('option_name','=','introduced_verify')
                    ->update(['option_value'=>$request['introduced_verify']]);
        if($status)
        {
            $msg="اطلاعات با موقفیت بروزرسانی شد";
            $errorStatus="success";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
        else
        {
            $msg="خطا در بروزرسانی";
            $errorStatus="danger";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(option $option)
    {
        //
    }

    public function settingReserve()
    {
        $setting=option::orwhere('option_name','=','count_meeting')
                        ->orwhere('option_name','=','customer_satisfaction')
                        ->orwhere('option_name','=','change_customer')
                        ->orwhere('option_name','=','count_recommendation')
                        ->get();

        return view('panelAdmin.settingReserve')
                    ->with('setting',$setting);

    }

    public function updateSettingReserve(Request $request)
    {
        $this->validate($request,[
            'count_meeting'         =>'required|numeric',
            'change_customer'       =>'required|numeric',
            'customer_satisfaction' =>'required|numeric',
            'count_recommendation'  =>'required|numeric',
        ]);

        $setting=option::where('option_name','=','count_meeting')
                    ->first();
        $setting->option_value=$request['count_meeting'];
        $status=$setting->save();
        if($status)
        {
            $setting=option::where('option_name','=','change_customer')
                ->first();
            $setting->option_value=$request['change_customer'];
            $status=$setting->save();
            if($status)
            {
                $setting=option::where('option_name','=','customer_satisfaction')
                    ->first();
                $setting->option_value=$request['customer_satisfaction'];
                $status=$setting->save();
                if($status)
                {
                    $setting=option::where('option_name','=','count_recommendation')
                        ->first();
                    $setting->option_value=$request['count_recommendation'];
                    $status=$setting->save();
                    if($status)
                    {
                        alert()->success('اطلاعات با موفقیت بروزرسانی شد','پیام')->persistent('بستن');
                    }
                    else
                    {
                        alert()->error('خطا در بزرورسانی قیمت هر توصیه نامه','خطا')->persistent('بستن');
                    }
                }
                else
                {
                    alert()->error('خطا در بزرورسانی قیمت هر تبدیل مشتری','خطا')->persistent('بستن');
                }


            }
            else
            {
                alert()->error('خطا در بزرورسانی قیمت هر تبدیل مشتری','خطا')->persistent('بستن');
            }

        }
        else
        {
            alert()->error('خطا در بزرورسانی قیمت هر ساعت جلسه','خطا')->persistent('بستن');
        }
        return back();
    }

    public function optionsCoaching()
    {
        $options_coaching=option::where('option_name','like','%_coaching')
            ->get();

        return view('admin.options.options_coaching')
                        ->with('options',$options_coaching);

    }

    public function updateOptionsBooking(Request $request)
    {
        $this->validate($request, [
            'rule_moarefeh_coaching'    => 'required|string',
            'rule_meeting_coaching'     => 'required|string',
        ]);
//        $data = option::where('option_name', '=', 'rule_moarefeh')->first();
        $data = option::updateorcreate([
            'option_name'   =>'rule_moarefeh_coaching',
        ],[
            'option_name'   =>'rule_moarefeh_coaching',
            'option_value'  =>$request['rule_moarefeh_coaching']
        ]);
        if(!is_null($data))
        {
            $data = option::updateorcreate([
                'option_name'   =>'rule_meeting_coaching',
            ],[
                'option_name'   =>'rule_meeting_coaching',
                'option_value'  =>$request['rule_meeting_coaching']
            ]);
            if($data)
            {
                alert()->success('تنظیمات با موفقیت بروزرسانی شد')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در بروزرسانی قوانین جلسات کوچینگ');
            }
        }
        else
        {
            alert()->error('خطا در بروزرسانی تنظیمات')->persistent('بستن');

        }
        return back();
    }
}
