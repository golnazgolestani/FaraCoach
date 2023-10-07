<?php

namespace App\Http\Controllers;

use App\course;
use App\followup;
use App\problemfollowup;
use App\User;
use App\user_type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class FollowupController extends BaseController
{

    public function showForm($id)
    {
        $userAdmin=Auth::user();
        return view('panelAdmin.insertFollowUp')
                ->with('id',$id)
                ->with('userAdmin',$userAdmin);
    }

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
            'insert_user_id'        =>'required|numeric',
            'course_id'             =>'required|numeric',
            'user_id'               =>'required|numeric|',
            'followup'              =>'required|numeric',
            'status_followups'      =>'required|numeric',
            'comment'               =>'nullable|string|min:3',
            'tags'                  =>'required|array',
            'date_fa'               =>'required|string',
            'time_fa'               =>'required|string',
            'nextfollowup_date_fa'  =>'string|min:9|nullable',
            'followby_expert'       =>'required|numeric|',
            'talktime'              =>'required|numeric|',
        ]);

        $request['tags']=implode(',',$request['tags']);


        $check=followup::create([
            'user_id'               =>$request['user_id'],
            'insert_user_id'        =>$request['insert_user_id'],
            'course_id'             =>$request['course_id'],
            'comment'               =>$request['comment'],
            'talktime'              =>$request['talktime'],
            'problemfollowup_id'    =>$request['followup'],
            'status_followups'      =>$request['status_followups'],
            'tags'                  =>$request['tags'],
            'date_fa'               =>$request['date_fa'],
            'insert_user_id'        =>auth()->user()->id,
            'nextfollowup_date_fa'  =>$request['nextfollowup_date_fa'],
            'sms'                   =>$request['sms'],
            'time_fa'               =>$request['time_fa'],
            'datetime_fa'           =>$request['date_fa']." ".$request['time_fa']
        ]);

        $data=$this->get_user_byID($request['user_id']);
        $data->type=$request['status_followups'];


        $data->followby_expert=$request['followby_expert'];
        $data->tel_verified=1;
        $data->save();
        $request['followby_expert']=$this->get_user_byID($request['followby_expert'])->fname." ".$this->get_user_byID($request['followby_expert'])->lname;
        if($request['sms']!="0")
        {
            //$request['sms']=$request['sms']."\n https://crm.faracoach.com";
            $request['sms']=str_replace('{nextDate}',$request['nextfollowup_date_fa'],$request['sms']);
            $request['sms']=str_replace('{followby_expert}',$request['followby_expert'],$request['sms']);
            $request['sms']=str_replace("<br>","\r\n",$request['sms']);
            $this->sendSms($data['tel'],$request['sms']);
        }
        if($check)
        {
//            $tmp=$this->get_followup_join_user(NULL,$request['user_id'],NULL,NULL,NULL,NULL);
            $tmp=followup::where('user_id','=',$request['user_id'])   //$this->get_followup(NULL,,NULL,NULL,'get');
                                ->get();

            if($tmp)
            {
                foreach ($tmp as $item)
                {
                    $t=followup::where('id','=',$item->id)   //    $this->get_followup($item->followups_id,NULL,NULL,NULL,"first");
                                        ->first();
                    $t->flag=0;
                    $t->update();
                }
            }
            $t=followup::where('id','=',$check->id)
                        ->first();  //$this->get_followup(,NULL,NULL,NULL,"first");


            $t['flag']="1";
            $t->update();

            $msg="پیگیری با موفقیت ثبت شد";
            $errorStatus="success";
        }
        else
        {
            $msg="خطا در ثبت";
            $errorStatus="danger";
        }


        if($request['followby_expert']==Auth::user()->id)
        {
            return back()->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
        else
        {
            return redirect('/admin/users')->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function show(followup $followup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function edit(followup $followup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, followup $followup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function destroy(followup $followup)
    {
        //
    }


    public function store_user(Request $request)
    {
        $this->validate($request,[
            'insert_user_id'        =>'required|numeric',
            'course_id'             =>'required|numeric',
            'user_id'               =>'required|numeric|',
            'followup'              =>'required|numeric',
            'status_followups'      =>'required|numeric',
            'comment'               =>'nullable|string|min:3',
            'date_fa'               =>'required|string',
            'time_fa'               =>'required|string',
            'nextfollowup_date_fa'  =>'string|min:9|nullable',
            'talktime'              =>'required|numeric|',
        ]);


        //$tmp=$this->get_followup_join_user(NULL,$request['user_id'],NULL,'get');

        $check=followup::create([
            'user_id'               =>$request['user_id'],
            'insert_user_id'        =>$request['insert_user_id'],
            'course_id'             =>$request['course_id'],
            'comment'               =>$request['comment'],
            'talktime'              =>$request['talktime'],
            'problemfollowup_id'    =>$request['followup'],
            'status_followups'      =>$request['status_followups'],
            'date_fa'               =>$request['date_fa'],
            'insert_user_id'        =>auth()->user()->id,
            'nextfollowup_date_fa'  =>$request['nextfollowup_date_fa'],
            'sms'                   =>$request['sms'],
            'time_fa'               =>$request['time_fa'],
            'datetime_fa'           =>$request['date_fa']." ".$request['time_fa'],
        ]);


        $data=$this->get_user_byID($request['user_id']);
        $data->type=$request['status_followups'];
        $data->followby_expert=Auth::user()->id;
        $data->save();

        if($request['sms']!="0")
        {
            //$request['sms']=$request['sms']."\n https://crm.faracoach.com";
            $request['sms']=str_replace('{nextDate}',$request['nextfollowup_date_fa'],$request['sms']);
            $request['sms']=str_replace('{followby_expert}',$request['followby_expert'],$request['sms']);
            $request['sms']=str_replace("<br>","\r\n",$request['sms']);
            $this->sendSms($data['tel'],$request['sms']);
        }

        if($check)
        {

            alert()->success("پیگیری با موفقیت ثبت شد",'پیام')->persistent('بستن');
        }
        else
        {
            alert()->error("خطا در ثبت",'خطا')->persistent('بستن');
        }

        return back();

    }

//    این بخش برای پیدا کردن و پیاده سازی آخرین پیگیری های انجام شده در جدول است
    public function test()
    {
        $follow=followup::get();
        foreach ($follow as $item)
        {
            $t=followup::where('id','=',$item->id)   //    $this->get_followup($item->followups_id,NULL,NULL,NULL,"first");
                        ->first();
            $t->flag=0;
            $t->update();
        }

        $follow=followup::get();
        foreach ($follow as $item)
        {
            $t=followup::where('user_id','=',$item->user_id)
                            ->orderby('id','desc')
                            ->first();
            $t->flag=1;
            $t->update();
        }
    }

    public function createExcel()
    {
        $userTypes=user_type::where('status','=',1)
                        ->get();

        $problemFollowup=problemfollowup::where('status','=',1)
                        ->get();
        $course=course::where('status','=',1)
                        ->orderby('id','desc')
                        ->get();
        return view('admin.followups.importExcel')
                            ->with('userTypes',$userTypes)
                            ->with('course',$course)
                            ->with('problemFollowup',$problemFollowup);
    }

    public function storeExcel(Request $request)
    {
        $this->validate($request, [
            'excel'                 =>['required','mimes:xlsx,csv'],
            'type'                  =>'required|numeric',
            'problemfollowup_id'    =>'required|numeric',
            'course_id'             =>'required|numeric',
            'comment'               =>'required|string',
            'date_fa'               =>'required|string',
            'time_fa'               =>'required|string',
            'nextfollowup_date_fa'  =>'nullable|string',
        ]);
        $collection = fastexcel()->import($request->file('excel'));
        $i=0;
        foreach ($collection as $item)
        {
            $tel='+98'.substr($item['Sender'],1) ;
            $user=User::where('tel','=',$tel)
                            ->first();

            if(is_null($user))
            {
                $user=User::create([
                    'tel'   =>$tel,
                ]);
            }

            $tmp=followup::where('user_id','=',$user->id)
                                ->get();

            if($tmp)
            {
                foreach ($tmp as $item_followups)
                {
                    $t=followup::where('id','=',$item_followups->id)
                                ->first();
                    $t->flag=0;
                    $t->update();
                }
            }

            $followup=followup::create([
                'user_id'               =>$user->id,
                'insert_user_id'        =>Auth::user()->id,
                'course_id'             =>$request->course_id,
                'comment'               =>$request->comment,
                'talktime'              =>0,
                'problemfollowup_id'    =>$request->problemfollowup_id,
                'status_followups'      =>$request->type,
                'nextfollowup_date_fa'  =>$request->nextfollowup_date_fa,
                'flag'                  =>1,
                'date_fa'               =>$request->date_fa,
                'time_fa'               =>$request->time_fa,
                'datetime_fa'           =>$request->date_fa.' '.$request->time_fa,
            ]);

            if($followup)
            {
                $user->type=$request->type;
                if(is_null($user->followby_expert))
                    {
                        $array1=['315','316','317'];
                        $user->followby_expert=Arr::random($array1);
                    }
                $user->save();
            }
            $i++;
        }

        alert()->success('تعداد '.$i.' پیگیری در سیستم ثبت شد ')->persistent('بستن');
        return back();
    }
}
