<?php

namespace App\Http\Controllers;

use App\category_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryPostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Gate::allows('isAdmin'))
        {

        }
        else
        {
            $category_post=category_post::where('user_id','=',Auth::user()->id)
                        ->orderby('id','desc')
                        ->paginate($this->countPage());

            return view('user.categoryPosts')
                        ->with('category_post',$category_post);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.insertCategoryPosts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'category'  =>'required|string',
            'shortlink' =>'required|string',
            'status'    =>'required|boolean'
        ]);
        $check=category_post::where('user_id','=',Auth::user()->id)
                    ->where('shortlink','=',$request['shortlink'])
                    ->get();
        if(count($check)==0)
        {
            $request['user_id'] = Auth::user()->id;
            $request['date_fa'] = $this->dateNow;
            $request['time_fa'] = $this->timeNow;

            $status = category_post::create($request->all());
            if ($status) {
//                $msg = "دسته بندی با موفقیت ذخیره شد";
//                $errorStatus = "success";
                alert()->success("دسته بندی با موفقیت ذخیره شد",'پیام')->persistent('بستن');
                return redirect('/panel/categoryposts');
//                    ->with('msg', $msg)
//                    ->with('errorStatus', $errorStatus);
            } else {
//                $msg = "خطا در ذخیره";
//                $errorStatus = "danger";
                alert()->error("خطا در ذخیره",'خطا')->persistent('بستن');
                return back();
//                    ->with('msg', $msg)
//                    ->with('errorStatus', $errorStatus);
            }
        }
        else
        {
//            $msg = "لینک اختصاصی شما تکراری است";
//            $errorStatus = "danger";
            alert()->error("لینک اختصاصی شما تکراری است",'خطا')->persistent('بستن');
            return back();
//                    ->with('msg', $msg)
//                    ->with('errorStatus', $errorStatus);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category_post  $category_post
     * @return \Illuminate\Http\Response
     */
    public function show(category_post $categorypost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category_post  $category_post
     * @return \Illuminate\Http\Response
     */
    public function edit($category_post)
    {
        $category_post=category_post::where('id','=',$category_post)
                                        ->first();
        if(is_null($category_post))
        {
            return abort(404);
        }
        else {
            if (Auth::user()->id == $category_post->user_id) {
                return view('user.editCategoryPost')
                    ->with('category_post', $category_post);
            } else {
                return abort(403);
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category_post  $category_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,category_post $categorypost)
    {
        //چک می شود که دسته آیا متعلق به خود کاربر است
        if (Auth::user()->id == $categorypost->user_id) {
            $check = category_post::where('user_id', '=', Auth::user()->id)
                    ->where('shortlink', '=', $request['shortlink'])
                    ->get();

            if (count($check) == 1) {
                if ($categorypost->shortlink == $request['shortlink']) {
                    $status = $categorypost->update($request->all());
                    if ($status) {
//                        $msg = "پست با موفقیت بروزرسانی شد";
//                        $errorStatus = "success";
                        alert()->success("پست با موفقیت بروزرسانی شد",'پیام')->persistent('بستن');


                    } else {
//                        $msg = "خطا در بروزرسانی";
//                        $errorStatus = "danger";
                        alert()->error("خطا در بروزرسانی",'خطا')->persistent('بستن');
                    }
                } else {
//                    $msg = "لینک اختصاصی قبلا استفاده شده است";
//                    $errorStatus = "danger";
                    alert()->error("لینک اختصاصی قبلا استفاده شده است",'خطا')->persistent('بستن');

                }

            } else if (count($check) == 0) {
                $status = $categorypost->update($request->all());
                if ($status) {
//                    $msg = "دسته با موفقیت بروزرسانی شد";
//                    $errorStatus = "success";
                    alert()->success("دسته با موفقیت بروزرسانی شد",'پیام')->persistent('بستن');

                } else {
//                    $msg = "خطا در بروزرسانی";
//                    $errorStatus = "danger";
                    alert()->error("خطا در بروزرسانی",'خطا')->persistent('بستن');
                }
            } else {
                return abort('403');
            }
        } else {
            return abort('403');
        }

        return back();
//            ->with('msg', $msg)
//            ->with('errorStatus', $errorStatus);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category_post  $category_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(category_post $categorypost)
    {

        if(Auth::user()->id==$categorypost->user_id)
        {
            $status=$categorypost->delete();
            if($status)
            {
//                $msg = "دسته با موفقیت بروزرسانی شد";
//                $errorStatus = "success";
                alert()->success("دسته با موفقیت بروزرسانی شد",'پیام')->persistent('بستن');
                return redirect('/panel/categoryposts');
//                    ->with('msg', $msg)
//                    ->with('errorStatus', $errorStatus);
            }
            else
            {
//                $msg = "خطا در بروزرسانی";
//                $errorStatus = "danger";
                alert()->success("خطا در بروزرسانی",'خطا')->persistent('بستن');
                return redirect('/panel/categoryposts');
//                    ->with('msg', $msg)
//                    ->with('errorStatus', $errorStatus);
            }
        }
        else
        {
            return abort(403);
        }
    }
}
