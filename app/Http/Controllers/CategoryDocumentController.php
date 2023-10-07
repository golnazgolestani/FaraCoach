<?php

namespace App\Http\Controllers;

use App\category_document;
use Illuminate\Http\Request;

class CategoryDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_documents=category_document::orderby('id','desc')
                            ->get();
        return view('admin.category_documents.category_documents_all')
                                    ->with('category_documents',$category_documents);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_documents.category_document_insert');

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
            'category'  =>'required|string|max:200|unique:category_documents,category',
            'status'    =>'required|boolean',
        ]);

        $status=category_document::create($request->all());
        if($status)
        {
            alert()->success('دسته با موفقیت اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در اضافه کردن دسته')->persistent('بستن');
        }

        return redirect('/admin/category_document');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category_document  $category_document
     * @return \Illuminate\Http\Response
     */
    public function show(category_document $category_document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category_document  $category_document
     * @return \Illuminate\Http\Response
     */
    public function edit(category_document $category_document)
    {
        return view('admin.category_documents.category_document_edit')
                            ->with('category_document',$category_document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category_document  $category_document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category_document $category_document)
    {
        $this->validate($request,[
            'category'  =>'required|string|max:200|unique:category_documents,category',
            'status'    =>'required|boolean',
        ]);

        $status=$category_document->update($request->all());
        if($status)
        {
            alert()->success('دسته بندی با موفقیت ویرایش شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return redirect('/admin/category_document');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category_document  $category_document
     * @return \Illuminate\Http\Response
     */
    public function destroy(category_document $category_document)
    {
        $status=$category_document->delete();
        if($status)
        {
            alert()->success('دسته بندی با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف دسته بندی')->persistent('بستن');
        }

        return back();
    }

    public  function list()
    {
        $category_documents=category_document::get();
        return view('user.documents.category_documents.category_documents')
                        ->with('category_documents',$category_documents);
    }

    public function category_document_show(category_document $category_document)
    {
        return view('user.documents.category_documents.category_single')
                            ->with('category_document',$category_document);
    }
}
