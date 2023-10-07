<?php

namespace App\Http\Controllers;

use App\user_type;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=user_type::get();
        return view('admin.userType.userType_list')
                            ->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.userType.userType_insert');
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
            'type'  =>'required|persian_alpha',
            'code'  =>'required|numeric|unique:user_types',
            'status'=>'required|boolean',
        ]);
        $status=user_type::create($request->all());
        if($status)
        {
            alert()->success('دسته بندی با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت دسته ')->persistent('بستن');
        }

        return redirect('/admin/settings/user_type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function show(user_type $user_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function edit(user_type $user_type)
    {
        return view('admin.userType.userType_edit')
                    ->with('userType',$user_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_type $user_type)
    {
        $this->validate($request,[
            'type'      =>'required|string',
            'status'    =>'required|boolean'
        ]);

        $status=$user_type->update($request->all());
        if($status)
        {
            alert()->success('اطلاعات بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return  redirect('/admin/settings/user_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_type $user_type)
    {
        //
    }
}
