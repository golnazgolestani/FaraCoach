<?php

namespace App\Http\Controllers;

use App\category_document;
use App\document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DocumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Gate::allows('isAdmin'))
        {
            $category_documents=category_document::where('status','=',1)
                                ->get();
            $documents=document::get();
            return view('admin.documents.documents')
                ->with('category_documents',$category_documents)
                ->with('documents',$documents);
        }
        else
        {
            if(Auth::user()->students->count()==0)
            {
                $documents=document::where('permission','=',0)
                            ->get();
            }
            else
            {
                $documents=document::wherein('permission',[0,1])
                                    ->get();
            }
            return view('user.documents.documents')
                ->with('documents',$documents);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panelAdmin.insertDocument');
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
            'title'      =>'required|string|max:200',
            'shortlink' =>'required|string|unique:documents,shortlink',
            'content'   =>'required|string',
            'file'      =>'required',
        ]);

        $document=document::create($request->all());
        if ($request->has('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $file_name = $request->title . "." . $request->file('file')->extension();
            $path = 'public/'.$file_name;
            $status=Storage::disk('local')->put($path,file_get_contents($request->file));
        }

        $document->file=$file_name;
        $document->size=$request->file('file')->getSize();
        $document->extension=$request->file('file')->getClientOriginalExtension();
        $status=$document->save();

        if($status)
        {
            alert()->success('فایل با موفقیت بارگذاری شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بارگذاری فایل')->persistent('بستن');
        }

        return back();



//        if(!file_exists(public_path('documents/files/'.$request->file('file')->getClientOriginalName()))) {
//            $this->validate($request, [
//                'title'         => ['required','string', 'max:30'],
//                'shortlink'     => ['required','string','max:250','unique:documents'],
//                'content'       => ['required','string'],
//                'permission'    => ['required','numeric'],
//                'file'          => ['required','max:40000'],
//            ]);
//            $image = $request->file('file')->getClientOriginalName();
//            $path = public_path('/documents/files/');
//            $file = $request->file('file')->move($path, $image);
//            $request['file']=$image;
//            $request['date_fa']=$this->dateNow;
//            $request['time_fa']=$this->timeNow;
//
//            $status = document::create([
//                'title'                     => $request['title'],
//                'shortlink'                 => $request['shortlink'],
//                'content'                   => $request['content'],
//                'permission'                => $request['permission'],
//                'file'                      => $image,
//                'date_fa'                   => $request['date_fa'],
//                'time_fa'                   => $request['time_fa'],
//            ]);
//            if($status)
//            {
//                $msg="فایل با موفقیت در سیستم ثبت شد";
//                $errorStatus="success";
//                return back()
//                    ->with('msg',$msg)
//                    ->with('errorStatus',$errorStatus);
//            }
//            else
//            {
//                $msg="خطا در ثبت فایل";
//                $errorStatus="danger";
//                return back()
//                    ->with('msg',$msg)
//                    ->with('errorStatus',$errorStatus);
//            }
//        }
//        else
//        {
//            $msg="فایلی با این نام موجود است";
//            $errorStatus="danger";
//            return back()
//                ->with('msg',$msg)
//                ->with('errorStatus',$errorStatus);
//        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(document $document)
    {
        $document->clicks++;
        $document->save();

        if(Storage::disk('local')->exists('public/'.$document->file))
        {
            return Storage::disk('local')->download('public/'.$document->file);
        }
        else
        {
            alert()->error('فایل مورد نظر یافت نشد')->persistent('بستن');
            return back();
        }

//        $document=document::where('shortlink','=',$document)
//                        ->first();
//        return view('panelAdmin.showDocument')
//                        ->with('document',$document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(document $document)
    {
        $category_documents=category_document::where('status','=',1)
                                    ->get();
        return view('admin.documents.editDocument')
                    ->with('document',$document)
                    ->with('category_documents',$category_documents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, document $document)
    {
        $this->validate($request, [
            'title'                 => ['nullable','string', 'max:200'],
            'shortlink'             => ['nullable','string','max:250',Rule::unique('documents')->ignore($document->id)],
            'content'               => ['nullable','string'],
            'permission'            => ['nullable','numeric'],
            'file'                  => ['nullable'],
            'category_document_id'  => ['nullable','numeric'],
        ]);

        $status=$document->update($request->all());
        if ($request->has('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $file_name = $request->title . "." . $request->file('file')->extension();
            $path = 'public/'.$file_name;
            $status=Storage::disk('local')->put($path,file_get_contents($request->file));
            $document->file=$file_name;
            $document->size=$request->file('file')->getSize();
            $document->extension=$request->file('file')->getClientOriginalExtension();
            $document->save();
        }

        if($status)
        {
            alert()->success('فایل بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */



    public function destroy(document $document)
    {
        Storage::disk('local')->delete('public/'.$document->file);
        $status=$document->delete();
        if($status)
        {
            alert()->success('فایل با موفقیت حف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف فایل')->persistent('بستن');
        }
        return back();
    }

    public function indexUser()
    {
        $documents=document::orderby('id','desc')
                ->get();
        return view('panelUser.documents')
            ->with('documents',$documents);
    }

    public function showUser($document)
    {

        $document=document::where('shortlink','=',$document)
            ->first();
        return view('panelUser.showDocument')
            ->with('document',$document);
    }
}
