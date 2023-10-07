<?php

namespace App\Http\Controllers;

use App\cart;
use App\checkout;
use App\course;
use App\faktor;
use App\lib\zarinpal;
use App\order;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends BaseController
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $cart = cart::where('user_id', '=', Auth::user()->id)
                            ->get();
        if($request->payment_type=='نقدی')
        {
            $order = new zarinpal();
            $sum_final_off = 0;
            $typeOrders = [];

            foreach ($cart as $item) {
                switch($item->type)
                {
                    case 'course':$course=course::where('id','=',$item->product_id)
                                        ->first();
                            $item->final_off=$item->final_off-($item->final_off*$course->peymant_off)/100;
                            break;
                }
                $sum_final_off = $item->final_off + $sum_final_off;
                array_push($typeOrders, $item->type);
            }


            $res = $order->pay($sum_final_off, Auth::user()->email, Auth::user()->tel, implode(',', $typeOrders));
            foreach ($cart as $item)
            {
                $status = order::create([
                    'user_id'       => Auth::user()->id,
                    'product_id'    => $item->product_id,
                    'capacity'      => $item->capacity,
                    'fi'            => $item->fi,
                    'off'           => $item->off,
                    'coupon'        => $item->free,
                    'final_off'     => $item->final_off,
                    'type'          => $item->type,
                    'payment_type'  => $request->payment_type,
                    'date_fa'       => $this->dateNow,
                    'time_fa'       => $this->timeNow,
                    'description'   => 'انتقال به درگاه',
                    'authority'     => $res,
                ]);




                if($status) {
                    $status = checkout::create([
                        'user_id'       => Auth::user()->id,
                        'product_id'    => $item->product_id,
                        'order_id'      => $status->id,
                        'price'         => $sum_final_off,
                        'type'          => $item->type,
                        'authority'     => $res,
                        'description'   => 'انتقال به درگاه',
                    ]);
                } else {
                    alert()->error('خطا')->persistent('بستن');
                    return back();
                }
            }

            if ($status) {
                if($sum_final_off==0)
                {

//                    faktor::create(
//                        [
//                        'user_id'               =>Auth::user()->id,
//                        'checkout_id'           =>$item->checkout_id,
//                        'product_id'            =>$item->product_id,
//                        'type'                  =>$item->type,
//                        'date_createfaktor'     =>$this->dateNow,
//                        'date_faktor'           =>$this->dateNow,
//                        'fi'                    =>$sum_final_off,
//                        'authority'             =>time(),
//                        'description'           =>'پرداخت شده',
//                        'date_pardakht'         =>$this->dateNow,
//                        'time_pardakht'         =>$this->timeNow,
//                        'checkout_id_pardakht'  =>$item->checkout_id,
//                        'insert_user_id'        =>Auth::user()->id,
//                    ]);


                    if ($item->type == 'course')
                    {
                        $status=student::create(
                            [
                                'user_id'       =>Auth::user()->id,
                                'course_id'    =>$item->product_id,
                                'date_fa'       =>$this->dateNow,
                                'time_fa'       =>$this->timeNow,
                            ]
                        );

                        if($status)
                        {
                            alert()->success('ثبت نام در دوره با موفقیت انجام شد')->persistent('بستن');
                        }
                        else
                        {
                            alert()->error('خطا در ثبت نام دانشجو')->persistent('بستن');
                        }

                        return redirect('/');
                    }
                }
                else
                {
                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
                }

            }
            else {
                return redirect('/');
            }
        }
        elseif ($request->payment_type=='اقساط')
        {
            $cart=cart::where('user_id', '=', Auth::user()->id)
                        ->orwhere('type_payment_id','=',[2,3])
                        ->first();

            switch($cart->type)
            {
                case 'course':$course=course::where('id','=',$cart->product_id)
                                            ->first();
                                $cart->product=$course->course;
                                $cart->fi=$cart->final_off;
                                $cart->prepayment=$course->prepayment;
                                $cart->peymant_off=$course->peymant_off;
                                $tmp_start=str_replace("/",'-',$course->start);
                                $tmp_start=(verta($this->changeTimestampToMilad($tmp_start)));
                                $tmp_end=str_replace("/",'-',$course->end);
                                $tmp_end=(verta($this->changeTimestampToMilad($tmp_end)));
                                $cart->tedadGhest=($tmp_start->diffMonths($tmp_end));
                                break;

            }

            return view('aghsat_single')
                        ->with('cart',$cart);


        }
        elseif ($request->payment_type=='کیف پول')
        {
            $order = new zarinpal();

            $res = $order->pay($request->amount, Auth::user()->email, Auth::user()->tel, 'شارژ کیف پول');


            if ($res) {
                $status = order::create([
                    'user_id'       => Auth::user()->id,
                    'fi'            => $request->amount,
                    'type'          => 'wallet',
                    'payment_type'  => 'کیف پول',
                    'date_fa'       => $this->dateNow,
                    'time_fa'       => $this->timeNow,
                    'description'   => 'انتقال به درگاه',
                    'authority'     => $res,
                ]);




                if($status) {
                    $status = checkout::create([
                        'user_id'       => Auth::user()->id,
                        'order_id'      => $status->id,
                        'price'         => $request->amount,
                        'type'          => 'wallet',
                        'authority'     => $res,
                        'description'   => 'انتقال به درگاه',
                    ]);

                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
                } else
                {
                    alert()->error('خطا')->persistent('بستن');
                    return back();
                }

            }

        }
        else {
            return redirect('/');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }

    public function storeAghsat(Request $request)
    {
        switch($request->type)
        {

            case 'course':$course=course::where('id','=',$request->product_id)
                                ->first();
                                $cart = cart::where('user_id', '=', Auth::user()->id)
                                    ->first();
                                $request['fi']=$course->fi_off;

                                $request['final_off']=$cart->final_off;
                                $request['coupon']=$cart->coupon;
                                $request['prepayment']=$course->prepayment;
//                                $tmp_start=str_replace("/",'-',$course->start);
//                                $tmp_start=(verta($this->changeTimestampToMilad($tmp_start)));
//                                $tmp_end=str_replace("/",'-',$course->end);
//                                $tmp_end=(verta($this->changeTimestampToMilad($tmp_end)));
//                                $cart->tedadGhest=($tmp_start->diffMonths($tmp_end));
                                break;

        }

        $status = order::create($request->all()+
        [
            'user_id'   =>Auth::user()->id,
            'date_fa'   =>$this->dateNow,
            'time_fa'   =>$this->timeNow,
        ]);

        if($status)
        {


            $description=$request->type.",".$request->product_id;
            $order = new zarinpal();
            $res = $order->pay($request->prepaymant,Auth::user()->email,Auth::user()->tel,$description);


            if($res)
            {
                $status = checkout::create([
                    'user_id'       => Auth::user()->id,
                    'order_id'      =>$status->id,
                    'product_id'    => $request->product_id,
                    'price'         => $request->prepaymant,
                    'type'          => $request->type,
                    'authority'     => $res,
                    'description'   => 'انتقال به درگاه',
                ]);

                if ($status) {
                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
                } else {
                    alert()->error('حطا در اتصال به درگاه')->persistent('بستن');
                    return redirect('/courses');
                }

            } else {
                alert()->error('خطا')->persistent('بستن');
                return redirect('/courses');
            }
        }
    }


}
