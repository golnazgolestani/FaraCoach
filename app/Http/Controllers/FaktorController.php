<?php

namespace App\Http\Controllers;

use App\course;
use App\faktor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaktorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faktors=faktor::where('user_id','=',Auth::user()->id)
                    ->get();

        return view('user.financial.listFaktors')
                        ->with('faktors',$faktors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $courses=course::orderby('id','desc')
                    ->get();
        return view('admin.financial.faktor_insert')
                    ->with('user',$user)
                    ->with('courses',$courses);

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
            'user_id'       =>'required|numeric',
            'product_id'    =>'required|numeric',
            'date_faktor'   =>'required|string|max:11',
            'fi'            =>'required|numeric',
            'status'        =>'numeric|in:0,1,2',
            'authority'     =>'required_if:status,1',
            'date_pardakht' =>'required_if:status,1',
            'time_pardakht' =>'required_if:status,1',
        ]);


        $faktor=faktor::create($request->all()+[
                'type'              =>'course',
                'date_createfaktor' =>$this->dateNow,
                'insert_user_id'    =>Auth::user()->id,
            ]);

        if($faktor)
        {
            if($request->status==2)
            {
                $msg=$faktor->user->fname.' '.$faktor->user->lname. " عزیز\nمبلغ ".$request->fi." تومان ".$request->description." از حساب تهاتر شما کسر گردید\nفراکوچ ";
                $this->sendSms($faktor->user->tel,$msg);
            }
            alert()->success('فاکتور با موفقیت ایجاد شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ایجاد فاکتور')->persistent('بستن');
        }

        return redirect('/admin/user/'.$request->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\faktor  $faktor
     * @return \Illuminate\Http\Response
     */
    public function show(faktor $faktor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\faktor  $faktor
     * @return \Illuminate\Http\Response
     */
    public function edit(faktor $faktor)
    {
        $courses=course::orderby('id','desc')
                        ->get();
        return view('admin.financial.faktor_edit')
                        ->with('courses',$courses)
                        ->with('faktor',$faktor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\faktor  $faktor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, faktor $faktor)
    {

        $this->validate($request,[
            'date_faktor'   =>'required|string',
            'fi'            =>'required|string',
            'status'        =>'required|in:0,1',
            'authority'     =>'required_unless:status,0',
            'date_pardakht' =>'required_unless:status,0',
            'time_pardakht' =>'required_unless:status,0',
            'product_id'    =>'required|numeric',
        ]);
        $status=$faktor->update($request->all());
        if($status)
        {
            alert()->success('بروزرسانی با موفقیت انجام شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return redirect('/admin/user/'.$faktor->user_id);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\faktor  $faktor
     * @return \Illuminate\Http\Response
     */
    public function destroy(faktor $faktor)
    {
        $status= $faktor->delete();
        if($status)
        {
            alert()->success('فاکتور با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف فاکتور')->persistent('بستن');
        }

        return back();
    }

    //نمایش فاکتورها برای ادمین
    public function faktorAdmin(Request $request)
    {
        if($request->start_date)
        {
            $this->validate($request,[
                'start_date'    =>'required|string',
            ]);
            $request['start_date']=explode(' ~ ',$request['start_date']);
            $startMonth=$request['start_date'][0];
            $endtMonth=$request['start_date'][1];
        }
        else
        {
            $startMonth=verta();
            $startMonth=($startMonth->startYear())->format('Y/m/d');
            $endtMonth=verta();
            $endtMonth=($endtMonth->endMonth())->format('Y/m/d');

        }


        $faktors=faktor::orderby('id','desc')
                    ->wherebetween('date_faktor',[$startMonth,$endtMonth])
                    ->orderby('date_faktor','desc')
                    ->get();

        $faktorsExpire=faktor::wherebetween('date_faktor',[$startMonth,$endtMonth])
                            ->where('status','=','0')
                            ->orderby('date_faktor','desc')
                            ->get();

        $faktorsSuccess=faktor::wherebetween('date_faktor',[$startMonth,$endtMonth])
                            ->where('status','=','1')
                            ->orderby('date_faktor','desc')
                            ->get();

        return view('admin.financial.faktor-all')
                        ->with('faktorsExpire',$faktorsExpire)
                        ->with('faktorsSuccess',$faktorsSuccess)
                        ->with('faktors',$faktors);

    }
}
