<?php

namespace App\Http\Controllers;

use App\booking;
use App\coach;
use App\homework;
use App\reserve;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Verta;
use SweetAlert;
use Carbon\Carbon;


class BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // وضعیتstatus مقدار 3 یعنی برگزار شده مقدار 4 یعنی کنسل شده

    public function index()
    {

           // وصعیت 1 برای رزرو های در حال رزرو و 0 رزرو شده هاست
            $booking = booking::where('user_id', '=', Auth::user()->id)
                ->where(function($query)
                {
                    $query->orwhere('status','<>',1)
                            ->orwhere('start_date','>=',$this->dateNow);
                })
                ->orderby('start_date', 'desc')
                ->orderby('start_time', 'desc')
                ->get();

            foreach ($booking as $item)
            {

                $item->caption_status=$this->get_statusBookings($item->status);

//                switch ($item->duration_booking) {
//                    case '1':
//                        $item->duration_booking = 'معارفه 30 دقیقه ای';
//                        break;
//                    case '2':
//                        $item->duration_booking = 'کوچینگ 60 دقیقه ای';
//                        break;
//                }
            }

            return view('user.booking.booking')
                ->with('booking', $booking)
                ->with('dateNow', $this->dateNow);

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
        $this->validate($request,[
            'start_date'      =>'required|',
            'start_time'      =>'required|date_format:H:i',
            //'duration_booking'=>'required|numeric|digits_between:1,5'
        ]);

        $duration_booking=60;

//        if($request['duration_booking']==1)
//        {
//            $duration_booking=30;
//        }
//        else if($request['duration_booking']==2)
//        {
//            $duration_booking=60;
//        }
//        else
//        {
//            return back();
//        }

        $tmp=(explode(' ~ ',$request->start_date));
        $tmp=Arr::sort($tmp);
        foreach ($tmp as $item)
        {
            if(($item<=$this->dateNow)&&($request['start_time']<=$this->timeNow))
            {
                alert()->error('تاریخ و ساعت انتخاب شده گذشته')->persistent('بستن');
                return back();
            }



            $check = booking::where('start_date', '=', $item)
                ->where('user_id','=',Auth::user()->id)
                ->where('start_time', '=', $request['time'])
                ->first();
            if(!is_null($check))
            {
                $msg="تاریخ ".$item." در ساعت ".$request['start_time']." قبلا تنظیم شده است.لطفا تاریخ ها را مجدد تنظیم کنید";
                alert()->error($msg,'خطا')->persistent('بستن');
                return back();
            }
            $carbon = new Carbon($item." ".$request['start_time']);

            $check = booking::where('start_date', '=', $item)
                        ->where('user_id','=',Auth::user()->id)
                        ->where(function($q) use ($request,$carbon,$duration_booking)
                        {
                            $q->orwherebetween('start_time',[$request['start_time'],$carbon->addMinutes($duration_booking)->format('H:i')])
                                ->orwherebetween('start_time',[$carbon->subMinutes(($duration_booking+5))->format('H:i'),$request['start_time']])
                                ->orwherebetween('end_time',[$carbon->format('H:i'),$carbon->addMinutes($duration_booking+5)->format('H:i')]);

                        })
                        ->get();


            if(count($check)!=0)
            {
                $msg="تاریخ ".$item." در ساعت ".$request['start_time']." با ".count($check)."جلسه دیگر دارای تداخل می باشد.لطفا تاریخ ها را مجدد تنظیم کنید";
                alert()->error($msg,'خطا')->persistent('بستن');
                return back();
            }
        }


        foreach ($tmp as $item) {
            $carbon = new Carbon($item." ".$request['start_time']);
            $carbon->addMinutes($duration_booking);

            $status=booking::create(
                [
                'start_date'        =>$item,
                'start_time'        =>$request['start_time'],
                'end_date'          =>$carbon->format('Y/m/d'),
                'end_time'          =>$carbon->format('H:i'),
                'duration_booking'  =>2, // 2 جسات کوچینگ می باشد
                'date_fa'           =>$this->dateNow,
                'time_fa'           =>$this->timeNow,
                'user_id'           =>Auth::user()->id
            ]);
            if($status)
            {
                alert()->success("اطلاعات با موفقیت ثبت شد",'پیام')->persistent('بستن');

            }
            else
            {
                alert()->error("کد ملی / پست الکترونیکی تکراری است",'خطا')->persistent('بستن');
                return back();
            }
        }
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
//        dd($booking);
//        if((Auth::user()->id==$booking->user_id))
//        {
//
//
////            $booking=booking::join('reserves','bookings.id','=','reserves.booking_id')
////                        ->where('bookings.id','=',$booking->id)
////                        ->first();
//
//
//
////            $reserve=reserve::join('users','reserves.user_id','=','users.id')
////                        ->where('reserves.booking_id','=',$booking['booking_id'])
////                        ->first();
//
//
//            //تاریخچه جلسات
//            $history=reserve::join('users','reserves.user_id','=','users.id')
//                        ->join('bookings','reserves.booking_id','=','bookings.id')
//                        ->where('bookings.user_id','=',Auth::user()->id)
//                        ->where('reserves.user_id','=',$booking->reserve->user_id)
//                        ->get();
//
//
//            $homework=homework::where('booking_id','=',$booking->id)
//                        ->where('type','=','booking')
//                        ->orderby('id')
//                        ->get();
//
//
//
////            $states=$this->states();
////            if(!is_null($reserve->city))
////            {
////                $reserve['city']=$this->city($reserve->city);
////            }
//
//            switch($booking->reserve->type_booking)
//            {
//                case '1':$booking->reserve->type_booking='حضوری';
//                        break;
//                case '2':$booking->reserve->type_booking='آنلاین';
//                        break;
//                case '0':$booking->reserve->type_booking='فرقی ندارد';
//                        break;
//                default:$booking->reserve->type_booking='خطا';
//                        break;
//            }
//
////            $feedback=booking::join('feedback_coachings','bookings.id','=','feedback_coachings.booking_id')
////                ->where('booking_id','=',$booking['booking_id'])
////                ->first();
//
//
//           $dateNow=$this->dateNow;
//           $timeNow=$this->timeNow;
//
////           if(Auth::user()->type==2){
////               return view('admin.InfoReserve')
////                            ->with('user',$reserve)
////                   ->with('feedback',$feedback)
////                   ->with('booking',$booking)
////                   ->with('history',$history);
////                            ->with('homework',$homework)
//
//////                            ->with('dateNow',$dateNow);
////           }
////           else
////            {
//                return view('user.InfoReserve')
////                    ->with('user',$reserve)
//                    ->with('booking',$booking)
//                    ->with('history',$history)
//                    ->with('homework',$homework)
////                    ->with('feedback',$feedback)
//                    ->with('dateNow',$dateNow);
////            }
//
//        }
//        else
//        {
//            alert()->error('این رزرو متعلق به شما نمی باشد','خطا')->persistent('بستن');
//            return back();
//        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {

        $this->validate($request,[
            'status'    =>'required|numeric:between:0,6',
        ]);


        $booking->status=1;
        $status=$booking->save();

        if($status)
        {
            $booking->reserve->status=$request->status;
            $booking->reserve->save();
            if ($booking->reserve->duration_booking == 1) {
                $duration = 'جلسه معارفه';
            } else {
                $duration = 'جلسه کوچینگ';
            }

//            $user = booking::join('users', 'bookings.user_id', '=', 'users.id')
//                            ->join('coaches', 'users.id', '=', 'coaches.user_id')
//                            ->where('bookings.id', '=', $booking->id)
//                            ->first();

            //ارسال پیامک برای کوچ
            $msg =$duration . " \n " . $booking->start_date . " \n " . $booking->start_time . "\n " . Auth::user()->fname . " " . Auth::user()->lname . "\nلغو شد" ;
            $this->sendSms($booking->coach->user->tel, $msg);
            //ارسال پیامک به مراجعه
            $msg =$duration . " \n " . $booking->start_date . " \n ساعت " . $booking->start_time . "\n کوچ:" . $booking->coach->fname . " " . $booking->coach->lname . "\nلغو شد" ;
            $this->sendSms(Auth::user()->tel, $msg);
            alert()->success('جلسه با موفقیت لغو شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در لغو جلسه')->persistent('بستن');
        }

        return back();//('/panel/booking/accept_reserve_useraccept_reserve_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        if($booking->user_id==Auth::user()->id)
        {
            $status=$booking->delete();
            if($status)
            {
                alert()->success('اطلاعات با موفقیت حذف شد','پیام')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در حذف اطلاعات','خطا')->persistent('بستن');
            }

            return back();
        }
        else
        {
            alert()->error('شما مجاز به حذف این زمان رزرو نیستید','خطا')->persistent('بستن');
            return back();
        }
    }

    //جستجوی تاریخ برای رزروها
    public function createAjax(Request $request)
    {
        $this->validate($request, [
            'coach' => 'required|numeric',
            'calenderSelector' => 'required|string'
        ]);


        $booking = booking::where('start_date', '=', $request['calenderSelector'])
            ->where('user_id', '=', $request['coach'])
            ->where('status', '=',1)
            ->orderby('start_time', 'asc')
            ->get();


        //چک کردن تعداد رزروهای ناقص کامل نشده در سبد خرید
        $cart=$this->get_reserve(NULL,Auth::user()->id,NULL,NULL,NULL,0,'get');


        if (count($booking) == 0) {
            return '<div class="alert alert-warning" role="alert">برای این تاریخ ساعت رزرو یافت نشد</div>';
        } else {
            return view('reserveCoaching')
                ->with('booking', $booking)
                ->with('cart', $cart);

        }
    }


    public function showFormReserve(Request $request)
    {
        $this->validate($request,[
            'id'    =>'required|numeric',
        ]);
        $booking=booking::find($request['id']);
        if(count(Auth::user()->reserves->where('status','=',3))==0)
        {
            $booking->type_booking=1;
        }
        else
        {
            $booking->type_booking=2;
        }


        return view('formReserve')
                    ->with('booking',$booking);

    }



    //گرارش کوچ توسط ادمین
    public function coach_report(User $coach,Request $request)
    {
        if(isset($request['start_date']))
        {
            $this->validate($request,[
                'start_date'    =>'required|string',
            ]);
            $request['start_date']=explode(' ~ ',$request['start_date']);
        }
        else
        {
            $startDate=verta()->startMonth()->format('Y/m/d');
            $endDate=verta()->format('Y/m/d');
            $request['start_date']=[$startDate,$endDate];

        }

        if($coach)
        {
            $reserveMoarefeh=reserve::where('status','=',1)
                    ->where('duration_booking','=',1)
                    ->wherehas('booking',function($query)use($request,$coach)
                        {
                            $query->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                                        ->where('user_id','=',$coach->id);
                        })
                    ->get();




            $reserveCoaching=reserve::where('status','=',1)
                                ->where('duration_booking','=',2)
                                ->wherehas('booking',function($query)use($request,$coach)
                                {
                                    $query->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                                                    ->where('user_id','=',$coach->id);
                                })
                                ->get();


            $waitingCoaching=booking::where('status','=',1)
                                    ->where('duration_booking','=',2)
                                    ->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                                    ->where('user_id','=',$coach->id)
                                    ->get();


            $waitingMoarefeh=booking::where('status','=',1)
                            ->where('bookings.duration_booking','=',1)
                            ->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                            ->where('user_id','=',$coach->id)
                            ->get();



            $heldCoaching=reserve::where('status','=',3)
                                ->where('duration_booking','=',2)
                                ->wherehas('booking',function($query)use($request,$coach)
                                {
                                    $query->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                                                    ->where('user_id','=',$coach->id);
                                })
                                ->get();


            foreach ($heldCoaching as $item)
            {
                switch ($item->duration_booking)
                {
                    case '1':
                        $item->duration_booking = 'معارفه 30 دقیقه ای';
                        break;
                    case '2':
                        $item->duration_booking = 'کوچینگ 60 دقیقه ای';
                        break;
                }
                $item->caption_status=$this->get_statusBookings($item->caption_status);

            }



            $heldMoarefeh=reserve::where('status','=',3)
                                ->where('duration_booking','=',1)
                                ->wherehas('booking',function($query)use($request,$coach)
                                {
                                    $query->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                                        ->where('user_id','=',$coach->id);
                                })
                                ->get();


            foreach ($heldMoarefeh as $item)
            {
                switch ($item->duration_booking)
                {
                    case '1':
                        $item->duration_booking = 'معارفه 30 دقیقه ای';
                        break;
                    case '2':
                        $item->duration_booking = 'کوچینگ 60 دقیقه ای';
                        break;
                }


                $item->caption_status=$this->get_statusBookings($item->status);

            }

            $cancelMoarefeh=reserve::where('status','=',4)
                    ->where('duration_booking','=',1)
                    ->wherehas('booking',function($query) use ($coach,$request)
                    {
                        $query->where('user_id','=',$coach->id)
                                ->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]]);
                    })
                    ->get();



            $cancelCoaching=reserve::where('status','=',4)
                ->where('duration_booking','=',2)
                ->wherehas('booking',function($query) use ($coach,$request)
                {
                    $query->where('user_id','=',$coach->id)
                        ->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]]);
                })
                ->get();

            $dateNow=$this->dateNow;
            return view('admin.booking.reportCoach')
                ->with('dateNow',$dateNow)
                ->with('reserveMoarefeh',$reserveMoarefeh)
                ->with('reserveCoaching',$reserveCoaching)
                ->with('waitingCoaching',$waitingCoaching)
                ->with('waitingMoarefeh',$waitingMoarefeh)
                ->with('heldCoaching',$heldCoaching)
                ->with('heldMoarefeh',$heldMoarefeh)
                ->with('cancelMoarefeh',$cancelMoarefeh)
                ->with('cancelCoaching',$cancelCoaching)
                ->with('coach',$coach);
        }
        else
        {
            alert()->error('کوچ مورد نظر یافت نشد')->persistent('بستن');
            return back();
        }
    }


    public function booking_report_byUser(Request $request)
    {

        $coach=coach::where('user_id','=',Auth::user()->id)
                        ->first();

        if(isset($request['start_date']))
        {
            $this->validate($request,[
                'start_date'    =>'required|string',
            ]);
            $request['start_date']=explode(' ~ ',$request['start_date']);
        }
        else
        {
            $startDate=verta()->startMonth()->format('Y/m/d');
            $endDate=verta()->format('Y/m/d');
            $request['start_date']=[$startDate,$endDate];

        }

        if($coach)
        {
            $reserveMoarefeh=reserve::where('status','=',1)
                ->where('duration_booking','=',1)
                ->wherehas('booking',function($query)use($request,$coach)
                {
                    $query->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                        ->where('user_id','=',$coach->user_id);
                })
                ->get();

            $reserveCoaching=reserve::where('status','=',1)
                ->where('duration_booking','=',2)
                ->wherehas('booking',function($query)use($request,$coach)
                {
                    $query->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                        ->where('user_id','=',$coach->user_id);
                })
                ->get();




            $waitingCoaching=booking::where('status','=',1)
                ->where('duration_booking','=',2)
                ->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                ->where('user_id','=',$coach->user_id)
                ->get();


            $waitingMoarefeh=booking::where('status','=',1)
                ->where('bookings.duration_booking','=',1)
                ->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                ->where('user_id','=',$coach->user_id)
                ->get();

            $heldCoaching=reserve::where('status','=',3)
                ->where('duration_booking','=',2)
                ->wherehas('booking',function($query)use($request,$coach)
                {
                    $query->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                        ->where('user_id','=',$coach->user_id);
                })
                ->get();

            foreach ($heldCoaching as $item)
            {
                switch ($item->duration_booking)
                {
                    case '1':
                        $item->duration_booking = 'معارفه 30 دقیقه ای';
                        break;
                    case '2':
                        $item->duration_booking = 'کوچینگ 60 دقیقه ای';
                        break;
                }
                $item->caption_status=$this->get_statusBookings($item->caption_status);

            }


            $heldMoarefeh=reserve::where('status','=',3)
                ->where('duration_booking','=',1)
                ->wherehas('booking',function($query)use($request,$coach)
                {
                    $query->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]])
                        ->where('user_id','=',$coach->user_id);
                })
                ->get();


            foreach ($heldMoarefeh as $item)
            {
                switch ($item->duration_booking)
                {
                    case '1':
                        $item->duration_booking = 'معارفه 30 دقیقه ای';
                        break;
                    case '2':
                        $item->duration_booking = 'کوچینگ 60 دقیقه ای';
                        break;
                }


                $item->caption_status=$this->get_statusBookings($item->status);

            }



            $cancelMoarefeh=reserve::wherein('status',[4,41,42])
                ->where('duration_booking','=',1)
                ->wherehas('booking',function($query) use ($coach,$request)
                {
                    $query->where('user_id','=',$coach->user_id)
                        ->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]]);
                })
                ->get();



            $cancelCoaching=reserve::wherein('status',[4,41,42])
                ->where('duration_booking','=',2)
                ->wherehas('booking',function($query) use ($coach,$request)
                {
                    $query->where('user_id','=',$coach->user_id)
                        ->whereBetween('start_date', [$request['start_date'][0],$request['start_date'][1]]);
                })
                ->get();

            $dateNow=$this->dateNow;
            return view('user.reportCoach')
                ->with('dateNow',$dateNow)
                ->with('reserveMoarefeh',$reserveMoarefeh)
                ->with('reserveCoaching',$reserveCoaching)
                ->with('waitingCoaching',$waitingCoaching)
                ->with('waitingMoarefeh',$waitingMoarefeh)
                ->with('heldCoaching',$heldCoaching)
                ->with('heldMoarefeh',$heldMoarefeh)
                ->with('cancelMoarefeh',$cancelMoarefeh)
                ->with('cancelCoaching',$cancelCoaching)
                ->with('coach',$coach);
        }
        else
        {
            alert()->error('کوچ مورد نظر یافت نشد')->persistent('بستن');
            return back();
        }
    }




    public function get_statusBookings($status)
    {
        switch ($status) {
            case '1':
                return 'آماده رزرو';
                break;
            case '0':
                return 'رزرو شد';
                break;
            case '3':
                return 'برگزارشد';
                break;
            case '4':
                return 'کنسل شد';
                break;

        }
    }


    //نمایش کامل لیست جلسات برای ادمین در ماه جاری
    public function reportAllCoach(Request $request)
    {
        if($request->start_date)
        {
                $this->validate($request,[
                    'start_date'    =>'required|string',
                ]);
                $request['start_date']=explode(' ~ ',$request['start_date']);
                $startDate=$request['start_date'][0];
                $endDate=$request['start_date'][1];
        }
        else
        {
            $startDate=verta()->startMonth()->format('Y/m/d');
            $endDate=verta()->format('Y/m/d');

        }


        $reserveBooking=booking::where('status',0)
                            ->wherebetween('start_date',[$startDate,$endDate])
                            ->orderby('start_date','desc')
                            ->get();

        $successBooking=booking::where('status',3)
                            ->wherebetween('start_date',[$startDate,$endDate])
                            ->orderby('start_date','desc')
                            ->get();

        $cancelBooking=booking::where('status',4)
                        ->wherebetween('start_date',[$startDate,$endDate])
                        ->orderby('start_date','desc')
                        ->get();



        $date_en=[$this->changeTimestampToMilad($startDate)." 00:00:00",$this->changeTimestampToMilad($endDate)." 23:59:59"];





        $appointments_booking=reserve::wherebetween('created_at',$date_en)
                                        ->where('status','=',1)
                                        ->get();

        return view('admin.booking.reportAllCoach')
                        ->with('reserveBooking',$reserveBooking)
                        ->with('successBooking',$successBooking)
                        ->with('appointments_booking',$appointments_booking)
                        ->with('cancelBooking',$cancelBooking);
    }




    //کنسلی جلسه
    public function cancelReserve()
    {

    }

    //نمایش جلسات برای ادمین
    public function bookingListAdmin()
    {
        $booking = booking::where('user_id', '=', Auth::user()->id)
            ->where('start_date','>=',$this->dateNow)
            ->orderby('start_date', 'desc')
            ->orderby('start_time', 'desc')
            ->paginate($this->countPage());

        foreach ($booking as $item) {

            $item->caption_status=$this->get_statusBookings($item->status);

            //تعیین وضعیت رزروهایی که تاریخ گذشته و رزرو نشده

//                if (($item->status == 1) && ($item->start_date < $this->dateNow)) {
////                    $item->status = 3;
//                    $item->caption_status = 'باطل شده';
//                }

            switch ($item->duration_booking) {
                case '1':
                    $item->duration_booking = 'معارفه 30 دقیقه ای';
                    break;
                case '2':
                    $item->duration_booking = 'کوچینگ 60 دقیقه ای';
                    break;
            }
        }
        return view('admin.booking')
            ->with('booking', $booking)
            ->with('dateNow', $this->dateNow);
    }

}
