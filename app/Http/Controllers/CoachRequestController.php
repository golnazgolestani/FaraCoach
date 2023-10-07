<?php

namespace App\Http\Controllers;

use App\city;
use App\clinic_basic_info;
use App\coach_request;
use App\message;
use App\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CoachRequestController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coach_requests=coach_request::orwhere('status','!=',2)
                        ->orwhereNull('status')
                        ->orderby('id','desc')
                        ->get();
        return view('admin.clinic.Coach_request.request_coaches')
                        ->with('coach_requests',$coach_requests);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=state::get();
        $cities=city::where('state_id','=',Auth::user()->state)->get();
        $services=  clinic_basic_info:: wherenull ('parent_id')->get ();
        $services_id= Clinic_Basic_info:: select ('id')->wherenull ('parent_id')
            ->get ();
        $speciality=clinic_basic_info::whereIn('parent_id',$services_id)->get();
        $orientation=clinic_basic_info::whereNotIn('parent_id',$services_id)->get();

        $messages=message::where('type','=','coach')
                        ->where(function ($query)
                        {
                            $query->orwhere('user_id_send','=',Auth::user()->id)
                                    ->orwhere('user_id_recieve','=',Auth::user()->id);
                        })
                        ->get();



        return view('user.clinic.coach_collabration_request')
            ->with('states',$states)
            ->with('cities',$cities)
            ->with('services',$services)
            ->with('speciality',$speciality)
            ->with('messages',$messages)
            ->with('orientation',$orientation);
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
            'fk_orientations'    =>'required|array' ,
        ]);





        foreach ($request->fk_orientations as $fk_orientation)
        {
                $tmp=coach_request::where('user_id',Auth::user()->id)
                            ->where('fk_orientation',$fk_orientation)
                            ->first();

                if(is_null($tmp))
                {
                    $coach_request=coach_request::create([
                        'user_id'           =>Auth::user()->id,
                        'create_date'       =>$this->dateNow,
                        'fk_orientation'    =>$fk_orientation,
                    ]);
                }
                else
                {
                    alert()->error('درخواست همکاری تکراری ارسال شده بود')->persistent('بستن');
                    return back();
                }
        }


        if($coach_request)
        {
            alert()->success('درخواست با موفقیت اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت درخواست');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coach_request  $coach_request
     * @return \Illuminate\Http\Response
     */
    public function show(coach_request $coach_request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coach_request  $coach_request
     * @return \Illuminate\Http\Response
     */
    public function edit(coach_request $coach_request)
    {

        $states=state::get();
        $cities=city::where('state_id','=',Auth::user()->state)->get();
        $services=  clinic_basic_info:: wherenull ('parent_id')->get ();
        $services_id= Clinic_Basic_info:: select ('id')->wherenull ('parent_id')
            ->get ();
        $speciality=clinic_basic_info::whereIn('parent_id',$services_id)->get();
        $orientation=clinic_basic_info::whereNotIn('parent_id',$services_id)->get();

        $messages=message::where('type','=','coach')
            ->where(function ($query) use ($coach_request)
            {
                $query->orwhere('user_id_send','=',$coach_request->user->id)
                    ->orwhere('user_id_recieve','=',$coach_request->user->id);
            })
            ->get();
        return view('admin.clinic.Coach_request.coach_collabration_request_edit')
                        ->with('states',$states)
                        ->with('cities',$cities)
                        ->with('services',$services)
                        ->with('speciality',$speciality)
                        ->with('messages',$messages)
                        ->with('orientation',$orientation)
                        ->with('coach_request',$coach_request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coach_request  $coach_request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coach_request $coach_request)
    {
        $this->validate($request,[
            'status'=>'required|in:NULL,0,1',
        ]);

        $coach_request=$coach_request->update($request->all());
        if($coach_request)
        {
            alert()->success('درخواست با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در برزورسانی ')->persistent('بستن');
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coach_request  $coach_request
     * @return \Illuminate\Http\Response
     */
    public function destroy(coach_request $coach_request)
    {
        //
    }

    public function requests()
    {
        $coach_requests=coach_request::where('user_id','=',Auth::user()->id)
                        ->get();
        return view('user.clinic.coach_request_status')
                            ->with('coach_requests',$coach_requests);
    }

    public function pending_user(coach_request $coach_request)
    {

        if($coach_request->user_id==Auth::user()->id && $coach_request->status==0)
        {
            $states=state::get();
            $cities=city::where('state_id','=',Auth::user()->state)->get();
            $services=  clinic_basic_info:: wherenull ('parent_id')->get ();
            $services_id= Clinic_Basic_info:: select ('id')->wherenull ('parent_id')
                ->get ();
            $speciality=clinic_basic_info::whereIn('parent_id',$services_id)->get();
            $orientation=clinic_basic_info::whereNotIn('parent_id',$services_id)->get();

            $messages=message::where('type','=','coach')
                ->where(function ($query)
                {
                    $query->orwhere('user_id_send','=',Auth::user()->id)
                        ->orwhere('user_id_recieve','=',Auth::user()->id);
                })
                ->get();



            return view('user.clinic.coach_collabration_request_edit')
                        ->with('states',$states)
                        ->with('cities',$cities)
                        ->with('services',$services)
                        ->with('speciality',$speciality)
                        ->with('messages',$messages)
                        ->with('orientation',$orientation);


        }
        else
        {
            alert()->error('خطا در سطح دسترسی ')->persistent('بستن');
        }

        return back();

    }
}
