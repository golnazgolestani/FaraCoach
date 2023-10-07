<?php

namespace App\Http\Controllers;

use App\answerline;
use App\followup;
use App\problemfollowup;
use App\User;
use App\user_type;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AnswerlineController extends Controller
{
    public function __construct()
    {
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');
        $this->timeNow = $dateNow->format('H:i:s');
        $api=config('kavenegar')['apikey'];
        $this->client=new client(
            [
                'headers' => [
                    'Accept' => 'application/json; charset=utf-8'
                ],
                'base_uri' => 'http://api.kavenegar.com/v1/'.$api.'/sms/',
                'timeout'  => 3.0,
            ]
        );
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answerline=answerline::get();
        foreach ($answerline as $item)
        {
            if($item->status==1)
            {
                $item->status='فعال';
            }
            else
            {
                $item->status='غیر فعال';
            }
        }
        return view('admin.smsPanel.answerLine.answerLineList')
                        ->with('answerLine',$answerline);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userTypes=user_type::where('status','=',1)
                        ->get();

        $problemFollowup=problemfollowup::where('status','=',1)
                            ->get();
        return view('admin.smsPanel.answerLine.answerLine_insert')
                            ->with('problemFollowup',$problemFollowup)
                            ->with('userTypes',$userTypes);
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
            'keyword'           =>'required|string|unique:answerlines',
            'user_type'         =>'required|numeric|',
            'problemfollowup_id'=>'required|numeric|',
            'followup_comment'  =>'required|string',
            'text_message'      =>'nullable|string',
            'status'            =>'required|boolean',
        ]);

        $status=answerline::create($request->all()+[
                'user_id'   =>Auth::user()->id,
            ]);

        if($status)
        {
            alert()->success('کلید با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت کلید')->persistent('بستن');
        }

        return redirect('/admin/settings/answerline');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\answerline  $answerline
     * @return \Illuminate\Http\Response
     */
    public function show(answerline $answerline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\answerline  $answerline
     * @return \Illuminate\Http\Response
     */
    public function edit(answerline $answerline)
    {
        $userTypes=user_type::where('status','=',1)
            ->get();

        $problemFollowup=problemfollowup::where('status','=',1)
            ->get();

        return view('admin.smsPanel.answerLine.answerLine_edit')
                    ->with('problemFollowup',$problemFollowup)
                    ->with('answerline',$answerline)
                    ->with('userTypes',$userTypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\answerline  $answerline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, answerline $answerline)
    {
        $this->validate($request,
            [
                'keyword'           =>'required|string',
                'user_type'         =>'required|numeric|',
                'problemfollowup_id'=>'required|numeric|',
                'followup_comment'  =>'required|string',
                'text_message'      =>'nullable|string',
                'status'            =>'required|boolean',
            ]);

        try {
            $status=$answerline->update($request->all()+[
                    'user_id'   =>Auth::user()->id,
                ]);
            if($status)
            {
                alert()->success('اطلاعات بروزرسانی شد')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در بروزرسانی')->persistent('بستن');
            }
            return redirect('/admin/settings/answerline');
        } catch (Throwable $e) {
            alert()->error('کلید تکراری می باشد')->persistent('بستن');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\answerline  $answerline
     * @return \Illuminate\Http\Response
     */
    public function destroy(answerline $answerline)
    {
        $status=$answerline->delete();
        if($status)
        {
            alert()->success('اطلاعات با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف اطلاعات')->persistent('بستن');
        }

        return back();
    }

    public function answerLine()
    {
        $response=$this->client->request('GET','receive.json?linenumber=10004002002020&isread=0');
        $response=json_decode($response->getBody()->getContents())->entries;
        if(!is_null($response)) {
            foreach ($response as $item) {
                $answerLine=answerline::where('keyword','=',$item->message)
                                ->first();

                if (!is_null($answerLine))
                {
                    $user = User::where('tel', 'like', '%' . substr($item->sender, 1) . '%')
                                    ->first();

                    if ($user)
                    {
                        if(is_null($user->followby_expert) || ($user->type==1))
                        {
                            $usersAdmin=user::where('type','=',3)
                                ->inRandomOrder()
                                ->first();
                            $user->followby_expert=$usersAdmin->id;
                        }
                        $user->type = $answerLine->user_type;
                        $user->save();
                        $v = verta();
                        $tomorrow = $v->addDays(2);
                        $status = followup::create([
                            'user_id'               => $user->id,
                            'insert_user_id'        => $user->id,
                            'comment'               => $answerLine->followup_comment,
                            'problemfollowup_id'    => $answerLine->problemfollowup_id,
                            'status_followups'      => $answerLine->user_type,
                            'nextfollowup_date_fa'  => $tomorrow,
                            'date_fa'               => $this->dateNow,
                            'time_fa'               => $this->timeNow,
                        ]);

                        $tmp = followup::where('user_id', '=', $user->id)
                                    ->get();

                        if ($tmp) {
                            foreach ($tmp as $item) {
                                $t = followup::where('id', '=', $item->id)
                                    ->first();
                                $t->flag = 0;
                                $t->update();
                            }
                        }
                        $t = followup::where('id', '=', $status->id)
                            ->first();

                        $t['flag'] = 1;
                        $t->update();
                    } else
                    {
                        User::create([
                            'tel'       =>"+98".(substr($item->sender, 1)),
                            'password'  =>Hash::make('1234'),
                            'resource'  =>'ارسال پیامک '.$item->message,
                        ]);
                    }

                }
            }
        }
    }
}
