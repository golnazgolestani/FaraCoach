<?php

namespace App\Http\Controllers;

use App\collabration_accept;
use App\collabration_details;
use App\scholarship;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollabrationAcceptController extends Controller
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

        $this->validate($request,
            [
                'count'         =>'required|string',
                'expire'        =>'required|string',
                'description'   =>'nullable|string|max:200',
            ]);
        $collabration_accept=collabration_accept::where('user_id','=',Auth::user()->id)
                                ->where('collabration_detail_id','=',$request->collabration_detail_id)
                                ->first();

        if($collabration_accept)
        {
            ?>

            <script>
                alert('این زمینه کاری قبلا انتخاب شده است');
                collabration_category(0);
                collabration_details_acceptShow();
            </script>
            <?php
        }
        else
        {

            $sum_calculate=Auth::user()->collabration_accept->sum('calculate');
            $calculate=((int) str_replace(',', '', $request->calculate));

            $sum_collabration_accept=collabration_accept::where('collabration_detail_id','=',$request->collabration_detail_id)
                                    ->sum('calculate');
            $collabration_detail=collabration_details::where('id','=',$request->collabration_detail_id)
                                        ->first();
            if(!is_null($collabration_detail->max_faracoach)&&(($sum_collabration_accept+$calculate)>$collabration_detail->max_faracoach))
            {
                ?>
                <script>
                    alert('حداکثر ظرفیت این زمینه پر شده است');
                    collabration_category(0);
                    collabration_details_acceptShow();

                </script>
                <?php
            }
            else
            {
                $fi=(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi);
                $score=(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score);
                $loan=(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan);

                if((($sum_calculate+ $calculate) > (((($fi*$score)/100)-((($fi*$score)/100)* $loan)/100)+((($fi*$score/100)-((($fi*$score)/100)*$loan)/100))/2)*2))
                {
                    ?>
                    <script >
                        window.alert('مبلغ درخواستی بیش از سقف همکاری می باشد');
                        collabration_category(0);
                        collabration_details_acceptShow();
                    </script>
                    <?php
                }
                else
                {

                    $status=collabration_accept::create(
                    [
                        'user_id'               =>Auth::user()->id,
                        'value'                 =>(str_replace(',', '', $request->value)),
                        'count'                 =>$request->count,
                        'expire'                =>$request->expire,
                        'calculate'             =>((int)str_replace(',', '', $request->calculate)),
                        'collabration_detail_id'=>$request->collabration_detail_id,
                        'description'           =>$request->description,
                    ]);

                    if($status)
                    {
                        ?>

                        <script>
                            alert('با موفقیت ثبت شد');
                            collabration_category(0);
                            collabration_details_acceptShow();
                        </script>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="alert alert-danger">خطا در ثبت</div>
                        <?php
                    }
                }
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\collabration_accept  $collabration_accept
     * @return \Illuminate\Http\Response
     */
    public function show(collabration_accept $collabration_accept)
    {
        return ($collabration_accept);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collabration_accept  $collabration_accept
     * @return \Illuminate\Http\Response
     */
    public function edit(collabration_accept $collabration_accept)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\collabration_accept  $collabration_accept
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, collabration_accept $collabration_accept)
    {
        $collabration_accept->value=$request->value;
        $collabration_accept->count=$request->count;
        $collabration_accept->expire=$request->expire;
        $collabration_accept->calculate=((int) str_replace(',', '', $request->calculate));
        $collabration_accept->description=$request->description;
        $status=$collabration_accept->update();
        if($status)
        {
            alert()->success('زمینه همکاری بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی') ->persistent('بستن');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\collabration_accept  $collabration_accept
     * @return \Illuminate\Http\Response
     */
    public function destroy(collabration_accept $collabration_accept)
    {
        $status=$collabration_accept->delete();
        if($status)
        {
            alert()->success('همکاری با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف همکاری ')->persistent('بستن');
        }

        return back();
    }

    public function collabrationAccept_ajax()
    {
        return view('user.scholarship.table_collabration_details');
    }

    public function collabrationAcceptEdit_ajax(collabration_accept $collabration_accept)
    {
        $collabration_details=$collabration_accept->collabration_details;
        return view('user.scholarship.collabration_details_edit')
                        ->with('collabration_details',$collabration_details)
                        ->with('collabration_accept',$collabration_accept);
    }


    public function collabrationAcceptUpdate_ajax(collabration_accept $collabration_accept,Request $request)
    {

    }

    public function collabrationUpdate_byAdmin(Request $request,collabration_accept $collabration_accept)
    {

        $this->validate($request,[
            'value'     =>'required|string',
            'count'     =>'required|string',
            'calculate' =>'required|string',
            'status'    =>'required|between:0,3',
        ]);

        $collabration_accept->value=$request->value;
        $collabration_accept->count=$request->count;
        $collabration_accept->expire=$request->expire;
        $collabration_accept->calculate=((int) str_replace(',', '', $request->calculate));
        $collabration_accept->status=$request->status;
        $status=$collabration_accept->update();

        if($status)
        {
            alert()->success('زمینه با موفقیت بر.زرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در برزورسانی زمینه')->persistent('بستن');
        }

        return back();
    }

    public function store_addCollabration_bydAdmin(Request $request,User $user)
    {

        $this->validate($request,[
            'collabration_detail_id'    =>'required|numeric',
            'value'                     =>'required|string',
            'count'                     =>'required|string',
            'expire'                    =>'required|string',
            'calculate'                 =>'required|string',
            'description'               =>'nullable|string|max:200',
        ]);

        $check=collabration_accept::where('user_id','=',$request->user_id)
                                ->where('collabration_detail_id','=',$request->collabration_detail_id)
                                ->first();


        if(is_null($check))
        {
            $status=collabration_accept::create(
                [
                    'user_id'               =>$request->user_id,
                    'value'                 =>(str_replace(',', '', $request->value)),
                    'count'                 =>$request->count,
                    'expire'                =>$request->expire,
                    'calculate'             =>((int)str_replace(',', '', $request->calculate)),
                    'collabration_detail_id'=>$request->collabration_detail_id,
                    'description'           =>$request->description,
                ]);

            if($status)
            {
                alert()->success('زمینه همکاری با موفقیت اضافه شد')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در اضافه کردن زمینه همکاری')->persistent('بستن');
            }

        }
        else
        {
            alert()->error('این زمینه همکاری برای این کاربر قبلا ثبت شده است ')->persistent('بستن');
        }

        return redirect('/admin/scholarship/'.$user->scholarship['id']);


    }


}
