<?php

namespace App\Http\Controllers;

use App\booking;
use App\cart;
use App\coupon;
use App\course;
use App\reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert;

class CouponController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=coupon::where('user_id','=',Auth::user()->id)
                ->paginate($this->countPage());
        if(Auth::user()->type==2)
        {
            return view('admin.coupon.coupon')
                ->with('coupons',$coupons);
        }
        else
        {
            return view('user.coupon')
                ->with('coupons',$coupons);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dateNow=$this->dateNow;
        if(Auth::user()->type==2)
        {
            return view('admin.coupon.insertCoupon');
        }
        else
        {
            return view('user.coupon.insertCoupon');
        }
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
            'coupon'        =>'required|string|',
            'discount'      =>'required|numeric|',
            'type_discount' =>'required|in:تومان,%',
            'expire_date'   =>'required',
            'product'       =>'required|numeric',
            'limit_user'    =>'nullable|numeric',
            'count'         =>'nullable|numeric|',
        ]);
        $coupon=coupon::where('coupon','=',$request['coupon'])
                        ->where('user_id','=',Auth::user()->id)
                        ->get();

        if(count($coupon)==0) {
            if(is_null($request['count']))
            {
               $request['count']=-1 ;
            }

            $status = coupon::create($request->all()+
                [
                    'user_id'   =>Auth::user()->id,
                ]);

            if ($status) {
                alert()->success('کوپن با موفقیت ایجاد شد', 'پیام')->persistent('بستن');
            } else {
                alert()->error('خطا در ثبت کوپن', 'خطا')->persistent('بستن');
            }
        }else
        {
            alert()->error('کوپن با این نام قبلا ایجاد شده است','خطا')->persistent('بستن');
        }

        return redirect('/panel/coupon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(coupon $coupon)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(coupon $coupon)
    {
        if($coupon->user_id==Auth::user()->id)
        {
            $dateNow=$this->dateNow;
            if(Auth::user()->type==2)
            {
                return view('admin.coupon.editCoupon')
                    ->with('coupon',$coupon)
                    ->with('dateNow',$dateNow);
            }
            else
            {
                return view('user.coupon.editCoupon')
                    ->with('coupon',$coupon)
                    ->with('dateNow',$dateNow);
            }

        }
        else
        {
            alert()->error('این کوپن متعلق به شما نیست','خطا')->persistent('بستن');
            return redirect('/panel/coupon');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coupon $coupon)
    {
        if($coupon->user_id==Auth::user()->id)
        {
            $this->validate($request,[
                'coupon'        =>'required|string|',
                'discount'      =>'required|numeric|',
                'type_discount' =>'required|in:تومان,%',
                'expire_date'   =>'required',
                'product'       =>'required|numeric',
                'limit_user'    =>'nullable|numeric',
                'count'         =>'nullable|numeric|',
            ]);

            $status=$coupon->update($request->all());
            if($status)
            {
                alert()->success('اطلاعات بروزرسانی شد','پیام')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در بروزرسانی','خطا')->persistent('بستن');
            }
        }
        else
        {
            alert()->error('کوپن متعلق به شما نیست');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(coupon $coupon)
    {
        if($coupon->user_id==Auth::user()->id)
        {
            $status=$coupon->delete();
            if($status)
            {
                alert()->success('کوپن با موفقیت حذف شد','پیام')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در حذف کوپن تخفیف','خطا')->persistent('بستن');
            }
        }
        else
        {
            alert()->error('کوپن تخفیف متعلق به شما نمی باشد','خطا')->persistent('بستن');
        }

        return redirect('/panel/coupon');
    }


    public function check(Request $request)
    {

        $this->validate($request,[
            'coupon'=>'nullable|string'
        ]);



        $users=booking::join('users','bookings.user_id','=','users.id')
                ->where('bookings.id','=',$request['booking_id'])
                ->first();

        $coupon=coupon::where('coupon','=',$request['coupon'])
            ->where('user_id','=',$users->id)
            ->wherein('product',[0,$users->duration_booking])
            ->first();





        //اگر کوپن وجود نداشت
        if(is_null($coupon))
        {
            $this->validate($request,
                [
                    'booking_id'    =>'required|numeric',
                    'subject'       =>'required|string',
                    'type_booking'  =>'required|numeric',
                    'details'       =>'nullable|string',
                ]
            );
            $reserve=reserve::where('booking_id','=',$request['booking_id'])
                        ->first();

            $count_meeting_fi=$this->get_optionByName('count_meeting');
            $count_meeting_fi=$count_meeting_fi->option_value;

            $customer_satisfaction_fi=$this->get_optionByName('customer_satisfaction');
            $customer_satisfaction_fi=$customer_satisfaction_fi->option_value;

            $change_customer_fi=$this->get_optionByName('change_customer');
            $change_customer_fi=$change_customer_fi->option_value;

            $count_recommendation_fi=$this->get_optionByName('count_recommendation');
            $count_recommendation_fi=$count_recommendation_fi->option_value;

            $user=booking::join('users','bookings.user_id','=','users.id')
                ->join('coaches','users.id','=','coaches.user_id')
                ->where('bookings.id','=',$request['booking_id'])
                ->first();
            $count_meeting=$user->count_meeting;
            $customer_satisfaction=$user->customer_satisfaction;
            $change_customer=$user->change_customer;
            $count_recommendation=$user->count_recommendation;

//            $fi=($count_meeting_fi*$count_meeting)+($customer_satisfaction_fi*$customer_satisfaction)+($change_customer_fi*$change_customer)+($count_recommendation_fi*$count_recommendation);
            $fi=$user->fi;
            $off=0;
            $final_off=$fi-$off;
            $request['coupon']=NULL;


            if(is_null($reserve)) {
                $status = reserve::create($request->all()+
                    [
                        'user_id'   => Auth::user()->id,
                        'final_off' =>$final_off,
                        'fi'        =>$fi,
                    ]);
            }
            else
            {
                $status=$reserve->update($request->all()+
                    [
                        'user_id' => Auth::user()->id,
                        'final_off' =>$final_off,
                        'fi'        =>$fi,
                        'off'       =>NULL
                    ]);
            }

            $msg='کوپن تخفیف موجود نیست';
            $errorStatus='danger';

            return view('reserveFi')
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus)
                ->with('reserve',$reserve);
        }
        // اگر تعداد کوپن تمام شده بود
        else if($coupon->count==0)
        {
            $this->validate($request,
                [
                    'booking_id'    =>'required|numeric',
                    'subject'       =>'required|string',
                    'type_booking'  =>'required|numeric',
                    'details'       =>'nullable|string',
                ]
            );
            $reserve=reserve::where('booking_id','=',$request['booking_id'])
                ->first();

            $count_meeting_fi=$this->get_optionByName('count_meeting');
            $count_meeting_fi=$count_meeting_fi->option_value;

            $customer_satisfaction_fi=$this->get_optionByName('customer_satisfaction');
            $customer_satisfaction_fi=$customer_satisfaction_fi->option_value;

            $change_customer_fi=$this->get_optionByName('change_customer');
            $change_customer_fi=$change_customer_fi->option_value;

            $count_recommendation_fi=$this->get_optionByName('count_recommendation');
            $count_recommendation_fi=$count_recommendation_fi->option_value;

            $user=booking::join('users','bookings.user_id','=','users.id')
                ->join('coaches','users.id','=','coaches.user_id')
                ->where('bookings.id','=',$request['booking_id'])
                ->first();
            $count_meeting=$user->count_meeting;
            $customer_satisfaction=$user->customer_satisfaction;
            $change_customer=$user->change_customer;
            $count_recommendation=$user->count_recommendation;

//            $fi=($count_meeting_fi*$count_meeting)+($customer_satisfaction_fi*$customer_satisfaction)+($change_customer_fi*$change_customer)+($count_recommendation_fi*$count_recommendation);
            $fi=$user->fi;
            $off=0;
            $final_off=$fi-$off;
            $request['coupon']=NULL;



            if(is_null($reserve)) {
                reserve::create($request->all()+
                    [
                        'user_id'   => Auth::user()->id,
                        'final_off' =>$final_off,
                        'fi'        =>$fi,
                    ]);
            }
            else
            {
                $reserve->update($request->all()+
                    [
                        'user_id' => Auth::user()->id,
                        'final_off' =>$final_off,
                        'fi'        =>$fi,
                        'off'       =>NULL
                    ]);
            }

            $msg='تعداد کوپن تمام شده است';
            $errorStatus='danger';

            return view('reserveFi')
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus)
                ->with('reserve',$reserve);
            //return ('<div class="alert alert-danger">تعداد کوپن مورد نظر استفاده شده است</div>');
        }
        else
        {
            $coupon=coupon::join('users','coupons.user_id','=','users.id')
                    ->where('coupon','=',$request['coupon'])
                    ->where('user_id','=',$users->id)
                    ->first();
            if($coupon->user_id==$users->id)
            {
                $this->validate($request,
                    [
                        'booking_id'    =>'required|numeric',
                        'subject'       =>'required|string',
                        'type_booking'  =>'required|numeric',
                        'details'       =>'nullable|string',
                    ]
                );

                $reserve=reserve::where('booking_id','=',$request['booking_id'])
                        ->first();

                $count_meeting_fi=$this->get_optionByName('count_meeting');
                $count_meeting_fi=$count_meeting_fi->option_value;

                $customer_satisfaction_fi=$this->get_optionByName('customer_satisfaction');
                $customer_satisfaction_fi=$customer_satisfaction_fi->option_value;

                $change_customer_fi=$this->get_optionByName('change_customer');
                $change_customer_fi=$change_customer_fi->option_value;

                $count_recommendation_fi=$this->get_optionByName('count_recommendation');
                $count_recommendation_fi=$count_recommendation_fi->option_value;

                $user=booking::join('users','bookings.user_id','=','users.id')
                    ->join('coaches','users.id','=','coaches.user_id')
                    ->where('bookings.id','=',$request['booking_id'])
                    ->first();
                $count_meeting=$user->count_meeting;
                $customer_satisfaction=$user->customer_satisfaction;
                $change_customer=$user->change_customer;
                $count_recommendation=$user->count_recommendation;

//                $fi=($count_meeting_fi*$count_meeting)+($customer_satisfaction_fi*$customer_satisfaction)+($change_customer_fi*$change_customer)+($count_recommendation_fi*$count_recommendation);
                $fi=$user->fi;
                if($coupon->expire_date<$this->dateNow)
                {

                    $off=0;
                    $reserve->off=NULL;
                    $reserve->coupon=NULL;
                    $request['coupon']=NULL;
                }
                else
                {
                    $off=($fi*$coupon->discount)/100;
                }

                $final_off=$fi-$off;


                if(is_null($reserve))
                {
                    $reserve = reserve::create($request->all()+
                        [
                            'user_id'   => Auth::user()->id,
                            'off'       =>$coupon->discount,
                            'final_off' =>$final_off,
                            'fi'        =>$fi,
                        ]);
                }
                else
                {
                    if($coupon->expire_date<$this->dateNow)
                    {
                        $reserve->update($request->all() +
                            [
                                'user_id'   => Auth::user()->id,
                                'off'       => NULL,
                                'coupon'    => NULL,
                                'final_off' => $final_off,
                                'fi'        => $fi,
                            ]);

                        $msg='کوپن تخفیف منقضی شده است';
                        $errorStatus='danger';
                    }
                    else
                    {
                        $reserve->update($request->all() +
                            [
                                'user_id'   => Auth::user()->id,
                                'off'       => $coupon->discount,
                                'final_off' => $final_off,
                                'fi'        => $fi,
                            ]);
                        $msg='کوپن اعمال شد';
                        $errorStatus='success';
                    }
                }



                return view('reserveFi')
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus)
                    ->with('reserve',$reserve);
            }
            else
            {
                return '<div class="alert alert-danger">کد تخفیف مربوط به این محصول نمیباشد</div>';
            }
        }

    }


    //اعمال کد تخفیف در سبد خرید رزرو نوبت
    public function checkOff(request $request)
    {

        $this->validate($request, [
            'coupon' => 'nullable|string'
        ]);


        $cart=  (Auth::user()->reserves->where('status','=',0));


        foreach ($cart as $item)
        {

            $booking=booking::where('bookings.id', '=', $item['booking_id'])
                            ->first();

            $coupon = coupon::where('coupon', '=', $request['coupon'])
                            ->where(function($query) use ($booking)
                            {
                                $query->orwhere('user_id', '=', $booking->coach->user->id)
                                    ->orwhere('flag', '=', 1);
                            })
                            ->wherein('product', [0, $item->type_booking])
                            ->first();



            //اگر کوپن وجود نداشت
            if (is_null($coupon))
            {
                alert()->error('کوپن تخفیف وجود ندارد')->persistent('بستن');
                return back();
            }
            // اگر تعداد کوپن تمام شده بود
            else if ($coupon->count == 0) {
                alert()->warning('تعداد کوپن تمام شده است')->persistent('بستن');
                return back();
            }
            else
            {
                if (is_null($coupon->type) && ($coupon->product==$item->type_booking||$coupon->product==0))
                {
                    $fi = $item->booking->coach->fi;

                    if ($coupon->expire_date < $this->dateNow)
                    {
                        if($item->duration_booking==1)
                        {
                            $introduction_discount = ($fi * $item->booking->coach->introduction_discount) / 100;

                            $fi=$fi-$introduction_discount;
                        }


                        if($item->type_booking==1)
                        {
                            $extra=$booking->coach->extra_presence;
                            $fi=(($fi*$extra)/100)+$fi;
                        }

                        $off = 0;
                        $item->off = NULL;
                        $item->coupon = NULL;
                        $request['coupon'] = NULL;
                    } else
                    {

                        if($item->duration_booking==1)
                        {
                            $introduction_discount = ($fi * $item->booking->coach->introduction_discount) / 100;

                            $fi=$fi-$introduction_discount;
                        }

                        if($item->type_booking==1)
                        {
                            $extra=$booking->coach->extra_presence;
                            $fi=(($fi*$extra)/100)+$fi;
                        }


                        if($coupon->type_discount=='تومان')
                        {
                            $off = $coupon->discount;
                        }
                        else if($coupon->type_discount=='%')
                        {
                            $off = ($fi * $coupon->discount) / 100;
                        }
                    }

                    $final_off = $fi - $off;

                    if($final_off<0)
                    {
                        $final_off=0;
                    }



                    if (is_null($item))
                    {
                        $reserve = reserve::create(
                            [
                                'user_id'       => Auth::user()->id,
                                'off'           => $coupon->discount,
                                'type_discount' => $coupon->type_discount,
                                'final_off'     => $final_off,
                                'fi'            => $fi,
                            ]);
                    }
                    else
                    {
                        //چک کردن منقضی شدن کوپن تخفیف
                        if ($coupon->expire_date < $this->dateNow)
                        {
                            $item->update(
                                [
                                    'user_id'       => Auth::user()->id,
                                    'off'           => NULL,
                                    'type_discount' => NULL,
                                    'coupon'        => NULL,
                                    'final_off'     => $final_off,
                                    'fi'            => $fi,
                                ]);

                            alert()->error('کوپن نخفیف منقضی شده است')->persistent('بستن');
                        }
                        else
                        {

                            //اعمال شدن کوپن تخفیف
                            $status=$item->update(
                                [
                                    'user_id'       => Auth::user()->id,
                                    'off'           => $coupon->discount,
                                    'type_discount' => $coupon->type_discount,
                                    'final_off'     => $final_off,
                                    'fi'            => $fi,
                                    'coupon'        => $request['coupon'],
                                ]);
                            $item->save();
                            echo "<script>console.log('".$coupon."')</script>";
                            alert()->success('کوپن اعمال شد')->persistent('بستن');
                        }
                    }

                } else {
                    alert()->error('کد تخفیف مربوط به این محصول نمی باشد')->persistent('بستن');
                    return back();
                }
            }
        }
        return back();
    }




    //اعمال کد تخفیف در سبد خرید
    public function checkCoupon(request $request)
    {

        $this->validate($request, [
            'coupon' => 'nullable|string'
        ]);

        $coupon=coupon::where('coupon','=',$request->coupon)
                    //چک کردن کوپن های تخفیف که ادمین تعریف کرده
                    ->where('flag','=',1)
                    ->first();

        if($coupon)
        {
            if($coupon->count>0)
            {
                if($coupon->expire_date> $this->dateNow)
                {
                    $cart=cart::where('user_id','=',Auth::user()->id)
                                ->where('type','=',$coupon->type)
                                ->get();

                    foreach ($cart as $item)
                    {
                        if($item->type==$coupon->type)
                        {
                            $tmp=cart::where('id','=',$item->id)
                                        ->first();

                            switch ($item->type)
                            {
                                case 'course':$product=course::where('id','=',$item->product_id)
                                                        ->first();
                                                $product->final_off=$product->fi_off;
                            }

                            $tmp->off=$coupon->discount;
                            $tmp->coupon=$coupon->coupon;

                            $tmp->final_off =$product->final_off -(($product->final_off * $coupon->discount) / 100);
                            $tmp->save();
                        }
                    }

//                    $coupon->count=$coupon->count-1;
//                    $coupon->save();


                    alert()->success('کوپن تخفیف اعمال شد')->persistent('بستن');
                    return back();


                }
                else
                {
                    alert()->error('کوپن منقضی شده است')->persistent('بستن');
                }
            }
            else
            {
                alert()->error('تعداد کوپن مورد نظر تمام شده است')->persistent('بستن');

            }
        }
        else
        {
            alert()->error('کوپن وجود نداشت')->persistent('بستن');

        }

        return back();






        foreach ($cart as $item)
        {
            $coach = booking::join('users', 'bookings.user_id', '=', 'users.id')
                ->where('bookings.id', '=', $item['booking_id'])
                ->first();

            $coupon = coupon::where('coupon', '=', $request['coupon'])
                ->where('user_id', '=', $coach->id)
                ->wherein('product', [0, $coach->duration_booking])
                ->first();


            //اگر کوپن وجود نداشت
            if (is_null($coupon))
            {
                alert()->error('کوپن تخفیف وجود ندارد')->persistent('بستن');
                return back();
            }
            // اگر تعداد کوپن تمام شده بود
            else if ($coupon->count == 0) {
                alert()->warning('تعداد کوپن تمام شده است')->persistent('بستن');
                return back();
            }
            else
            {
                $coupon = coupon::join('users', 'coupons.user_id', '=', 'users.id')
                    ->where('coupon', '=', $request['coupon'])
                    ->where('user_id', '=', $coach->id)
                    ->first();

                if ($coupon->user_id == $coach->id)
                {

                    $reserve = reserve::where('booking_id', '=', $item['booking_id'])
                        ->first();


                    $count_meeting_fi = $this->get_optionByName('count_meeting');
                    $count_meeting_fi = $count_meeting_fi->option_value;

                    $customer_satisfaction_fi = $this->get_optionByName('customer_satisfaction');
                    $customer_satisfaction_fi = $customer_satisfaction_fi->option_value;

                    $change_customer_fi = $this->get_optionByName('change_customer');
                    $change_customer_fi = $change_customer_fi->option_value;

                    $count_recommendation_fi = $this->get_optionByName('count_recommendation');
                    $count_recommendation_fi = $count_recommendation_fi->option_value;

                    $user = booking::join('users', 'bookings.user_id', '=', 'users.id')
                        ->join('coaches', 'users.id', '=', 'coaches.user_id')
                        ->where('bookings.id', '=', $item['booking_id'])
                        ->first();
                    $count_meeting = $user->count_meeting;
                    $customer_satisfaction = $user->customer_satisfaction;
                    $change_customer = $user->change_customer;
                    $count_recommendation = $user->count_recommendation;
                    $fi = $user->fi;
                    if ($coupon->expire_date < $this->dateNow) {

                        $off = 0;
                        $reserve->off = NULL;
                        $reserve->coupon = NULL;
                        $request['coupon'] = NULL;
                    } else {

                        $off = ($fi * $coupon->discount) / 100;
                    }

                    $final_off = $fi - $off;
                    if (is_null($reserve)) {
                        $reserve = reserve::create(
                            [
                                'user_id' => Auth::user()->id,
                                'off' => $coupon->discount,
                                'final_off' => $final_off,
                                'fi' => $fi,
                            ]);
                    } else {
                        if ($coupon->expire_date < $this->dateNow)
                        {
                            $reserve->update(
                                [
                                    'user_id' => Auth::user()->id,
                                    'off' => NULL,
                                    'coupon' => NULL,
                                    'final_off' => $final_off,
                                    'fi' => $fi,
                                ]);
                            alert()->error('کوپن نخفیف منقضی شده است')->persistent('بستن');
                        } else
                        {
                            $status=$reserve->update(
                                [
                                    'user_id'   => Auth::user()->id,
                                    'off'       => $coupon->discount,
                                    'final_off' => $final_off,
                                    'fi'        => $fi,
                                    'coupon'    => $request['coupon'],
                                ]);
                            $reserve->save();
                            echo "<script>console.log('".$coupon."')</script>";
                            alert()->success('کوپن اعمال شد')->persistent('بستن');
                        }
                    }

                } else {
                    return '<div class="alert alert-danger">کد تخفیف مربوط به این محصول نمیباشد</div>';
                }
            }
        }
        return back();
    }
}
