<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;

class TagController extends BaseController
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
        $categoryTags=$this->get_parentCategory();
        return view('panelAdmin.insertTags')
                ->with('categoryTags',$categoryTags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
            [
                'tag'               =>'required|string|min:3|persian_alpha',
                'category_tags_id'  =>'required|numeric',
                'status'            =>'required|numeric'
            ]);
        $status = tag::create($request->all());
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
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
        $categoryTags=$this->get_parentCategory();
        return view('panelAdmin/editTags')
            ->with('tag',$tag)
            ->with('categoryTags',$categoryTags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tag $tag)
    {

        $this->validate(request(),
            [
                'tag'               =>'required|string|min:3|persian_alpha',
                'category_tags_id'  =>'required|numeric',
                'status'            =>'required|numeric'
            ]);

        $status=$tag->update($request->all());
        if($status)
        {
            $msg="اطلاعات با موفقیت بروزرسانی  شد";
            $errorStatus='success';
        }
        else
        {
            $msg="خطا در بروزرسانی";
            $errorStatus="danger";
        }
        return  back()
            ->with('msg',$msg)
            ->with('errorStatus',$errorStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        $status=$tag->delete();
        if($status)
        {
            $msg="اطلاعات با موفقیت حذف شد";
            $errorStatus="success";
        }
        else
        {
            $msg="خطا در حذف اطلاعات";
            $errorStatus="danger";
        }

        return back()->with('msg',$msg)
            ->with('errorStatus',$errorStatus);
    }

    public function ajaxsettingstag($data)
    {
        if($data==0)
        {
            $tags=tag::where('category_tags_id','=',$data)
                ->orwhere('category_tags_id','=',NULL)
                ->get();
        }
        else
        {
            $tags=tag::where('category_tags_id','=',$data)
                ->get();
        }


        $tmp="";
        $i=1;
        foreach ($tags as $item)
        {
            if($item->status==0)
            {
                $item->status='عدم نمایش';
            }
            else
            {
                $item->status='نمایش';
            }
            $tmp=$tmp."<tr><td>".$i++."</td><td>".$item->tag."  </td><td>".$item->status."</td><td><a href='/admin/settings/tags/edit/$item->id'>
                                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                        <path fill-rule='evenodd' d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                    </svg>
                                </a>
                            </td>
                            <td >
                                <a href='/admin/settings/tags/delete/{{$item->id}}'>
                                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash2-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                        <path d='M2.037 3.225l1.684 10.104A2 2 0 0 0 5.694 15h4.612a2 2 0 0 0 1.973-1.671l1.684-10.104C13.627 4.224 11.085 5 8 5c-3.086 0-5.627-.776-5.963-1.775z'/>
                                        <path fill-rule='evenodd' d='M12.9 3c-.18-.14-.497-.307-.974-.466C10.967 2.214 9.58 2 8 2s-2.968.215-3.926.534c-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466zM8 5c3.314 0 6-.895 6-2s-2.686-2-6-2-6 .895-6 2 2.686 2 6 2z'/>
                                    </svg>
                                </a>
                            </td></tr>";
        }

        return $tmp;
    }

    public function updateAllTags(Request $request)
    {
        dd($request);
    }


}
