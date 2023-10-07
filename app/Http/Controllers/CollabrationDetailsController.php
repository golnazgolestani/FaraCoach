<?php

namespace App\Http\Controllers;

use App\collabration_category;
use App\collabration_details;
use App\Http\Requests\CollabrationDetailsRequest;
use App\scholarship;
use Illuminate\Http\Request;

class CollabrationDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collabration_details=collabration_details::get();
        $collabration_category=collabration_category::get();
        return view('admin.scholarship.settings.details')
                            ->with('collabration_category',$collabration_category)
                            ->with('collabration_details',$collabration_details);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collabration_category=collabration_category::get();
        return view('admin.scholarship.settings.details_insert')
                            ->with('collabration_category',$collabration_category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollabrationDetailsRequest $request)
    {

        $status=collabration_details::create($request->all());
        if($status)
        {
            alert()->success('عنوان همکاری اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در اضافه کردن ')->persistent('بستن');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\collabration_details  $collabration_details
     * @return \Illuminate\Http\Response
     */
    public function show(collabration_details $collabration_details)
    {
        dd($collabration_details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collabration_details  $collabration_details
     * @return \Illuminate\Http\Response
     */
    public function edit( $collabration_details)
    {
        $collabration_details=collabration_details::where('id','=',$collabration_details)
                            ->first();
        $collabration_category=collabration_category::get();

        return view('admin.scholarship.settings.details_edit')
                            ->with('collabration_details',$collabration_details)
                            ->with('collabration_category',$collabration_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\collabration_details  $collabration_details
     * @return \Illuminate\Http\Response
     */
    public function update(CollabrationDetailsRequest $request, $collabration_details)
    {
        $collabration_details=collabration_details::where('id','=',$collabration_details)
                                ->first();

        $status=$collabration_details->update($request->all());
        if($status)
        {
            alert()->success('عنوان با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->success('عنوان با موفقیت بروزرسانی شد')->persistent('بستن');
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\collabration_details  $collabration_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(collabration_details $collabration_details)
    {
        //
    }

    public function ajaxDetails(collabration_details $collabration_details)
    {
            return view('user.scholarship.collabration_details_forms')
                            ->with('collabration_details',$collabration_details);
    }

    public function create_addCollabration_byAdmin(scholarship $scholarship,collabration_details $collabration_details)
    {

        return view('admin.scholarship.collabration_add')
            ->with('collabration_details',$collabration_details)
            ->with('scholarship',$scholarship);

    }





}
