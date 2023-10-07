<?php

namespace App\Http\Controllers;

use App\checkout;
use App\eventreserve;
use App\lib\zarinpal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use nusoap_client;

class EventreserveController extends BaseController
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
        $this->validate($request,[
            'event_id'  =>'required|numeric'
        ]);
        $event=$this->get_events($request->event_id,NULL,NULL,NULL,NULL,NULL,'first');

        if($event->capacity!=0)
        {
            if($event->fi==0 || is_null($event->fi)|| $event->fi=='')
            {
                $status = eventreserve::create([
                    'user_id' => Auth::user()->id,
                    'event_id' => $event->id,
                    'date_fa' => $this->dateNow,
                    'time_fa' => $this->timeNow,
                ]);

                if ($status) {
                    $event->capacity--;
                    $event->save();
                    $msg = Auth::user()->lname . " عزیز \nثبت نام شما در " . $event->event . " با موفقیت انجام شد\n فراکوچ ";
                    $this->sendSms(Auth::user()->tel, $msg);
                    alert()->success('رزرو دوره با موفقیت انجام شد')->persistent('بستن');
                    return back();
//                    return $status;
                } else {
                    return back();
//                    return $status;
                }
            }
            else
            {
                $order = new zarinpal();

                $res = $order->pay($event->fi,Auth::user()->email,Auth::user()->tel,$event->event);

                $status=checkout::create([
                    'user_id'       =>Auth::user()->id,
                    'product_id'    =>$event->id,
                    'price'         =>$event->fi,
                    'type'          =>'event',
                    'authority'     =>$res,
                    'description'   =>'انتقال به درگاه',
                ]);

                if($status)
                {
                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
                }
                else
                {
                    return redirect('/');
                }


                //$this->checkout(Auth::user()->id,$event->id,$event->fi,'event',Auth::user()->email,Auth::user()->tel,$event->event);
            }


        }
        else
        {
            alert()->error('ظرفیت دوره تکمیل شد')->persistent('بستن');
            echo "<script>location.reload(); </script>";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\eventreserve  $eventreserve
     * @return \Illuminate\Http\Response
     */
    public function show(eventreserve $eventreserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eventreserve  $eventreserve
     * @return \Illuminate\Http\Response
     */
    public function edit(eventreserve $eventreserve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eventreserve  $eventreserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eventreserve $eventreserve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eventreserve  $eventreserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(eventreserve $eventreserve)
    {
        //
    }
}
