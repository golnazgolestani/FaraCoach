<?php

namespace App\Http\Controllers;

use App\coursetype;
use Illuminate\Http\Request;

class CoursetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursetype=coursetype::orderby('id','desc')
                    ->get();
        foreach ($coursetype as $item)
        {
            if($item->status==1)
            {
                $item->status="نمایش";
            }
            else
            {
                $item->status="عدم نمایش";
            }
        }
        return view('admin.coursetype')
                    ->with('courseType',$coursetype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insertCourseType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type'          => ['required','persian_alpha','max:100'],
            'shortlink'     => ['required','persian_alpha','max:50','unique:coursetypes'],
            'status'        => ['required', 'boolean'],
        ]);

        $status =coursetype::create($request->all());

        if($status)
        {
            $msg="اطلاعات با موفقیت در سیستم ثبت شد";
            $errorStatus="success";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
        else
        {
            $msg="خطا در ثبت";
            $errorStatus="danger";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coursetype  $coursetype
     * @return \Illuminate\Http\Response
     */
    public function show(coursetype $coursetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coursetype  $coursetype
     * @return \Illuminate\Http\Response
     */
    public function edit(coursetype $coursetype)
    {
        return view('admin.editCourseType')
                    ->with('courseType',$coursetype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coursetype  $coursetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coursetype $coursetype)
    {
        $this->validate($request, [
            'type'          => ['required','persian_alpha','max:100'],
            'shortlink'     => ['required','persian_alpha','max:50'],
            'status'        => ['required', 'boolean'],
        ]);

        $status=$coursetype->update($request->all());
        if($status)
        {
            $msg="اطلاعات به روزرسانی شد";
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
     * @param  \App\coursetype  $coursetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(coursetype $coursetype)
    {
        $coursetype->status=0;
        $status=$coursetype->delete();
        if($status)
        {
            $msg="اطلاعات با موفقیت حذف شد";
            $errorStatus="success";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
        else
        {
            $msg="خطا در حذف";
            $errorStatus="danger";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }

    }
}
