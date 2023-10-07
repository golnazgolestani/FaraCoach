<?php

namespace App\Http\Controllers;

use App\course;
use App\invoice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=invoice::get();
        return view('admin.financial.invoice.invoice_all')
                        ->with('invoices',$invoices);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $courses=course::where('status','=',1)
                        ->where('start','>=',$this->dateNow)
                        ->where('id','<>',3)
                        ->get();

        return view('admin.financial.invoice.invoice')
                    ->with('courses',$courses)
                    ->with('user',$user);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $course=course::where('shortlink','=',$request->course_id)
                        ->first();
       $fi=str_replace(',','',$request->fi);



       $invoice=invoice::create([
           'user_id'            =>$request->user_id,
           'course_id'          =>$course->id,
           'fi'                 =>$fi,
           'off'                =>$request->off,
           'score'              =>$request->score,
           'fi_final'           =>$request->fi_final,
           'remaining'          =>($request->fi_final-$request->pre_payment),
           'pre_payment'        =>$request->pre_payment,
           'count_installment'  =>$request->count_installment,
           'fi_installment'     =>$request->fi_installment,
           'date_installment'   =>$request->date_installment,
           'expire_date'        =>$request->expire_date,
       ]);

       if($invoice)
       {
           alert()->success('پیش فاکتور با موفقیت انجام شد')->persistent('بستن');
       }
       else
       {
           alert()->error('خطا در ایجاد پیش فاکتور')->persistent('بستن');
       }

       return redirect('/admin/user/'.$request->user_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        if($invoice->delete())
        {
            alert()->success('پیش فاکتور با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف پیش فاکتور')->persistent('بستن');
        }
        return back();
    }

    public function course(course $course)
    {
        return (number_format($course->fi_off)  );
    }

    public function showinvoiceUser()
    {
        return view('user.financial.invoice.invoice');
    }

    public function pardakht(invoice $invoice)
    {
        dd($invoice);
    }
}
