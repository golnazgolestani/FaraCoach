<?php

namespace App\Http\Controllers;

use App\type_coach;
use Illuminate\Http\Request;
use Throwable;

class TypeCoachController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typecoaches=type_coach::paginate($this->countPage());

        foreach ($typecoaches as $item)
        {
            if($item->status==1)
            {
                $item->status='فعال';
            }
            else
            {
                $item->status='غیرفعال';
            }
        }

        return view('panelAdmin.typeCoaches')
                    ->with('typecoaches',$typecoaches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panelAdmin.insertTypeCoach');
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
            'type'          =>'required|string|min:3',
            'shortlink'     =>'required|string|unique:type_coaches',
            'coefficient'   =>'required|numeric|',
            'status'        =>'required|boolean'
        ]);
        $status=type_coach::create($request->all());
        if($status)
        {
            alert()->success('سطح با موفقیت اضافه شد','پیام')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در اضافه کردن سطح','خطا')->persistent('بستن');
        }

        return redirect('/admin/type_coach');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\type_coach  $type_coach
     * @return \Illuminate\Http\Response
     */
    public function show(type_coach $type_coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\type_coach  $type_coach
     * @return \Illuminate\Http\Response
     */
    public function edit(type_coach $type_coach)
    {
        return view('panelAdmin.editTypeCoach')
                ->with('type_coach',$type_coach);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\type_coach  $type_coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, type_coach $type_coach)
    {
        $this->validate($request,[
            'type'          =>'required|string|min:3',
            'shortlink'     =>'required|string|',
            'coefficient'   =>'required|numeric|',
            'status'        =>'required|boolean'
        ]);
        try {
            $status = $type_coach->update($request->all());
            if($status)
            {
                alert()->success('اطلاعات بروزرسانی شد','پیام')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در بروزرسانی','خطا')->persistent('بستن');
            }
        } catch (Throwable $e) {
            alert()->error($e->errorInfo[2],'خطا')->persistent('بستن');
            return back();
        }

        return redirect('/admin/type_coach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\type_coach  $type_coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(type_coach $type_coach)
    {
        $status=$type_coach->delete();
        if($status)
        {
            alert()->success('سطح با موفقیت حذف شد','پیام')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف سطح','خطا')->persistent('بستن');
        }
        return redirect('/admin/type_coach');
    }
}
