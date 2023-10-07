<?php

namespace App\Http\Controllers;

use App\category_coach;
use Illuminate\Http\Request;
use Throwable;

class CategoryCoachController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorycoaches=category_coach::paginate($this->countPage());
        foreach ($categorycoaches as $item)
        {
            if($item->status==1)
            {
                $item->status='فعال';
            }
            else if($item->status==0)
            {
                $item->status='غیرفعال';
            }
        }
        return view('admin.categoryCoaches')
                        ->with('categorycoaches',$categorycoaches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insertCategoryCoach');
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
            'category'      =>'required|persian_alpha|min:2',
            'shortlink'     =>'required|string|min:2|unique:category_coaches',
            'status'        =>'required|boolean',
        ],[
            'category.required'         =>'دسته بندی اجباریست',
            'category.persian_alpha'    =>'دسته بندی باید کاملا فارسی باشد',
            'category.min'              =>'دسته بندی حداقل دو کارکتر باید باشد',
            'shortlink.required'        =>'شورت لینک اجباریست',
            'shortlink.unique'          =>'شورت لینک نباید تکراری باشد',
            'status.required'           =>'وضعیت اجباریست',
            'status.boolean'            =>'وضعیت را درست وارد کنید',


        ]);
        $status=category_coach::create($request->all());
        if($status)
        {
            alert()->success('دسته با موفقیت ایجاد شد','پیام')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت دسته','خطا')->persistent('بستن');
        }

        return redirect('/admin/category_coach');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category_coach  $category_coach
     * @return \Illuminate\Http\Response
     */
    public function show(category_coach $category_coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category_coach  $category_coach
     * @return \Illuminate\Http\Response
     */
    public function edit(category_coach $category_coach)
    {
       return view('admin.editCategoryCoaches')
                ->with('categorycoaches',$category_coach);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category_coach  $category_coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category_coach $category_coach)
    {
            $this->validate($request,[
                'category'      =>'required|persian_alpha|min:2',
                'shortlink'     =>'required|string|min:2|',
                'status'        =>'required|boolean',
            ],[
                'category.required'         =>'دسته بندی اجباریست',
                'category.persian_alpha'    =>'دسته بندی باید کاملا فارسی باشد',
                'category.min'              =>'دسته بندی حداقل دو کارکتر باید باشد',
                'shortlink.required'        =>'شورت لینک اجباریست',
                'shortlink.unique'          =>'شورت لینک نباید تکراری باشد',
                'status.required'           =>'وضعیت اجباریست',
                'status.boolean'            =>'وضعیت را درست وارد کنید',
            ]);

            $check=category_coach::where('shortlink','=',$request['shortlink'])
                        ->get();

            if($check->count()==1)
            {
                $check=category_coach::where('shortlink','=',$request['shortlink'])
                    ->first();
                if($check->shortlink==$request['shortlink'])
                {
                    try {
                        $status = $category_coach->update($request->all());
                    } catch (Throwable $e) {
                        alert()->error($e->errorInfo[2],'خطا')->persistent('بستن');
                        return back();
                    }



//                    $status = $category_coach->update($request->all());
                    if ($status) {
                        alert()->success('اطلاعات با موفقیت بروزرسانی شد','پیام')->persistent('بستن');
                    } else {
                        alert()->error('خطا در بروزرسانی','پیام')->persistent('بستن');
                    }
                }
                else
                {
                    alert()->error('شورت لینک تکراری است','پیام')->persistent('بستن');
                }

            }
            else if(count($check)==0)
            {

                $status = $category_coach->update($request->all());
                if ($status) {
                    alert()->success('اطلاعات با موفقیت بروزرسانی شد','پیام')->persistent('بستن');

                } else {
                    alert()->error('خطا در بروزرسانی','پیام')->persistent('بستن');
                }
            }
            else
            {
                return abort('403');
            }


        return redirect('/admin/category_coach');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category_coach  $category_coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(category_coach $category_coach)
    {
        $status=$category_coach->delete();
        if($status)
        {
            alert()->success('دسته با موفقیت حذف شد','پیام')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف دسته','خطا')->persistent('بستن');
        }
        return redirect('/admin/category_coach');
    }
}
