<?php

namespace App\Http\Controllers;

use App\course;
use App\message;
use App\notification;
use App\Notifications\sendMessageNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Gate;

class MessageController extends BaseController
{

    public function __construct()
    {
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');
        $this->timeNow = $dateNow->format('H:i:s');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        if(Gate::allows('isAdmin'))
        {
//            if(isset($request['q']))
//            {
//                $this->validate(request(),
//                    [
//                        'q'     =>'required|numeric'
//                    ],
//                    [
//                        'q.required'=>'شماره تیکت به عدد وارد کنید'
//                    ]);
//                $messages = message::where('message_id_answer', '=', NULL)
//                    ->where('id','=',$request['q'])
//                    ->where(function ($query) {
    //                        $query->orwhere('user_id_send', '=', Auth::user()->id)
//                            ->orwhere('user_id_recieve', '=', Auth::user()->id);
//
//                    })
//                    ->get();
//            }
//            else {

                $messages = message::where('message_id_answer', '=', NULL)
                            ->where(function ($query) {
                                $query->orwhere('user_id_send', '=', Auth::user()->id)
                                    ->orwhere('user_id_recieve', '=', Auth::user()->id)
                                    ->orwhere('user_id_send', '=', Auth::user()->type)
                                    ->orwhere('user_id_recieve', '=', Auth::user()->type);

                            })

//                            ->orwhere('user_id_send', '=', Auth::user()->type)
//                            ->orwhere('user_id_recieve', '=', Auth::user()->type)
//                            ->orwhere('user_id_send', '=', Auth::user()->id)
//                            ->orwhere('user_id_recieve', '=', Auth::user()->id)


                            ->orderby('updated_at','desc')
                            ->orderby('status','desc')
                            ->paginate(20);


//            }

            foreach ($messages as $item)
            {
                $item->user_id_send=$this->get_user_byID($item->user_id_send)->fname." ".$this->get_user_byID($item->user_id_send)->lname;
                $item->user_recieve=$this->get_user_byID($item->user_id_recieve)->fname." ".$this->get_user_byID($item->user_id_recieve)->lname;
            }



            $countUnreadMessages=$this->countUnreadMessages();
            return view('admin.messages')
                    ->with('messages',$messages)
                    ->with('countUnreadMessages',$countUnreadMessages);
        }
        else if(Gate::allows('isUser'))
        {
            $messages = message::where('message_id_answer', '=', NULL)
                ->where(function ($query) {
                    $query->orwhere('user_id_send', '=', Auth::user()->id)
                        ->orwhere('user_id_recieve', '=', Auth::user()->id);

                })
                ->orderby('id','desc')
                ->paginate(20);
            foreach ($messages as $item)
            {
                $item->user_id_send=$this->get_user_byID($item->user_id_send)->fname." ".$this->get_user_byID($item->user_id_send)->lname;
                $item->user_recieve=$this->get_user_byID($item->user_id_recieve)->fname." ".$this->get_user_byID($item->user_id_recieve)->lname;
            }
            $countUnreadMessages=$this->countUnreadMessages();
            return view('user.tickets')
                    ->with('messages',$messages)
                    ->with('countUnreadMessages',$countUnreadMessages);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //یوزر توسط چه کسی معرفی شده است
//        $resourceIntroduce=User::where('id','=',Auth::user()->introduced)
//                ->select('users.id','users.fname','users.lname','users.tel')
//                ->first();
//
//        //لیست افراد معرفی شده
//        $listIntroducedUser=User::where('introduced','=',Auth::user()->id)
//                ->select('users.id','users.fname','users.lname','users.tel')
//                ->get();

//        $followby_expert=user::orwhere('type','=',2)
//                            ->orwhere('type','=',3)
//                            ->get();
//        foreach ($followby_expert as $item)
//        {
//            $item->type=$this->userType($item->type);
//        }
        //سطح دسترسی ها
//        if(Gate::allows('isAdmin'))
//        {
//            return view('panelAdmin.insertMessage')
//                    ->with('resourceIntroduce',$resourceIntroduce)
//                    ->with('listIntroducedUser',$listIntroducedUser)
//                    ->with('followby_expert',$followby_expert);
//        }else if(Gate::allows('isUser'))
//        {
//            return view('panelUser.insertMessage')
//                    ->with('resourceIntroduce',$resourceIntroduce)
//                    ->with('listIntroducedUser',$listIntroducedUser)
//                    ->with('followby_expert',$followby_expert);
//        }
//        else
//        {
//            return back();
//        }
        if(Gate::allows('isAdmin')) {
            $events=$this->get_events(NULL,NULL,NULL,NULL,NULL,1,'get');
            $courses=course::get();

            return view('admin.insertMessage')
                        ->with('courses',$courses)
                        ->with('events',$events);
        }
        else
        {
            return view('user.insertTicket');
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
        $this->validate(request(),
        [
            'subject'           =>'required|min:3|string',
            //'user_id_recieve'   =>'required|numeric',
            'events_id'         =>'nullable|array',
            'comment'           =>'required|string|min:3|',
            'attach'            =>'nullable|mimes:jpeg,jpg,pdf|max:600',
        ]);

        if(isset($request['attach'])) {
            $filename = time() . "-" . Auth::user()->tel . "." . $request->file('attach')->extension();
            $files = $request->file('attach')->move(public_path('/documents/messages/'), $filename);
            $request['attach'] = $filename;
        }
        else
        {
            $filename=NULL;
        }


        if($request->events_id)
        {
            foreach ($request->events_id as $item)
            {
                $users=User::join('eventreserves','users.id','=','eventreserves.user_id')
                    ->where('eventreserves.event_id','=',$item)
                    ->select('users.*')
                    ->get();

//                //باید حذف شود
//                $users=user::orwhere('id','=',1)
//                            ->orwhere('tel','=','+989339273736')
//                            ->get();

                foreach ($users as $item2)
                {
                    $status = message::create(
                        [
                            'subject' => $request['subject'],
                            'user_id_recieve' => $item2->id,
                            //'events_id' => $request['events_id'],
                            'comment' => $request['comment'],
                            'user_id_send' => Auth::user()->id,
                            'attach' => $filename,
                            'date_fa' => $this->dateNow,
                            'time_fa' => $this->timeNow
                        ]);
                    $item2->notify(new sendMessageNotification($item2->tel,'شما در پورتال فراکوچ یک پیام خصوصی دارید.'."\nنام کاربری شماره همراه شما"."\n my.faracoach.com"));
                    notification::create([
                        'user_id'           =>$item2->id,
                        'insert_user_id'    =>Auth::user()->id,
                        'notification'      =>'یک پیام خصوصی دارید',
                        'date_fa'           =>$this->dateNow,
                        'time_fa'           =>$this->timeNow,
                    ]);
//                    $this->sendSms($item2->tel,'شما در پورتال فراکوچ یک پیام خصوصی دارید.'."\nنام کاربری شماره همراه شما"."\n my.faracoach.com");
                }
            }

        }

        if($request->course_id)
        {
            foreach ($request->course_id as $item)
            {
                $users=User::join('students','users.id','=','students.user_id')
                            ->where('students.course_id','=',$item)
                            ->select('users.*')
                            ->get();
                foreach ($users as $item2)
                {
                    $status = message::create(
                        [
                            'subject' => $request['subject'],
                            'user_id_recieve' => $item2->id,
                            //'events_id' => $request['events_id'],
                            'comment' => $request['comment'],
                            'user_id_send' => Auth::user()->id,
                            'attach' => $filename,
                            'date_fa' => $this->dateNow,
                            'time_fa' => $this->timeNow
                        ]);
                    $item2->id->notify(new sendMessageNotification($item2->tel,'شما در پورتال فراکوچ یک پیام خصوصی دارید.'."\nنام کاربری شماره همراه شما"."\n my.faracoach.com"));
                   // $this->sendSms($item2->tel,'شما در پورتال فراکوچ یک پیام خصوصی دارید.'."\nنام کاربری شماره همراه شما"."\n my.faracoach.com");
                }
            }
        }

        if($request->user_category)
        {
            foreach ($request->user_category as $item)
            {
                foreach(explode(',',$item) as $item2)
                {
                    $users=user::where('type','=',$item2)
                                ->get();
                    foreach ($users as $item2)
                    {
                        $status = message::create(
                            [
                                'subject' => $request['subject'],
                                'user_id_recieve' => $item2->id,
                                //'events_id' => $request['events_id'],
                                'comment' => $request['comment'],
                                'user_id_send' => Auth::user()->id,
                                'attach' => $filename,
                                'date_fa' => $this->dateNow,
                                'time_fa' => $this->timeNow
                            ]);
                        $item2->id->notify(new sendMessageNotification($item2->tel,'شما در پورتال فراکوچ یک پیام خصوصی دارید.'."\nنام کاربری شماره همراه شما"."\n my.faracoach.com"));
                        //$this->sendSms($item2->tel,'شما در پورتال فراکوچ یک پیام خصوصی دارید.'."\nنام کاربری شماره همراه شما"."\n my.faracoach.com");
                    }
                }

            }

        }

//        $request['events_id']=implode(',',$request['events_id']);



        if($status)
        {
            alert()->success("پیام با موفقیت ارسال شد")->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ارسال')->persistent('بستن');
        }
        return  back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {
        if(Gate::allows('isAdmin'))
        {
            if(($message->user_id_send== Auth::user()->id)||($message->user_id_recieve== Auth::user()->id)||($message->user_id_send== Auth::user()->type)||($message->user_id_recieve== Auth::user()->type))
            {

                $messages=message::leftjoin('users','messages.user_id_send','=','users.id')
                    ->orwhere('messages.id','=',$message->id)
                    ->orwhere('messages.message_id_answer','=',$message->id)
                    //->orderby('messages.id','desc')
                    ->select('messages.*','users.fname','users.lname')
                    ->get();

                foreach ($messages as $item)
                {
                    //$item->info=$this->get_user(NULL,$item->)
                    if($item->user_id_send!=Auth::user()->id)
                    {
                       $item['status']=0;
                       message::where('id','=',$item->id)
                            ->update([
                                'status'    =>$item[0]
                            ]);
                    }
                }
                return view('admin.message_single')
                        ->with('messages',$messages)
                        ->with('message',$message);
            }
            else
            {
                return back();
            }
        }
        else if(Gate::allows('isUser')) {
            if (($message->user_id_send == Auth::user()->id) || ($message->user_id_recieve == Auth::user()->id)) {

                $messages = message::leftjoin('users', 'messages.user_id_send', '=', 'users.id')
                    ->orwhere('messages.id', '=', $message->id)
                    ->orwhere('messages.message_id_answer', '=', $message->id)
                    //->orderby('messages.id','desc')
                    ->select('messages.*', 'users.fname', 'users.lname')
                    ->get();

                foreach ($messages as $item) {

                    if ($item->user_id_send != Auth::user()->id) {
                        $item['status'] = 0;
                        message::where('id', '=', $item->id)
                            ->update([
                                'status' => $item[0]
                            ]);
                    }
                }

                return view('user.message_single')
                    ->with('messages', $messages)
                    ->with('message', $message);

            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }

    public function reply(Request $request)
    {
        $this->validate(request(),
        [
            'comment'   =>'required|string|min:3'
        ]);
        if(isset($request['attach'])) {
            $filename = time() . "-" . Auth::user()->tel . "." . $request->file('attach')->extension();
            $files = $request->file('attach')->move(public_path('/documents/messages/'), $filename);
            $request['attach'] = $filename;
        }
        else
        {
            $filename=NULL;
        }

        $status=message::create(
            [
                'user_id_recieve'   =>$request['user_id_recieve'],
                'comment'           =>$request['comment'],
                'message_id_answer' =>$request['message_id_answer'],
                'user_id_send'      =>Auth::user()->id,
                'attach'            =>$filename,
                'date_fa'           =>$this->dateNow,
                'time_fa'           =>$this->timeNow
            ]);

        if($status)
        {
            $message=message::where('id','=',$request['message_id_answer'])->first();
            $message->status=1;
            $message->save();
            alert()->success('پیام با موفقیت ارسال شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ارسال ')->persistent('بستن');
        }


        if(Gate::allows('isAdmin')) {
            return redirect('/admin/message');
        }
        else
        {
            return redirect('/panel/message');
        }



    }


    public function sendMessage(Request $request)
    {

        $this->validate($request,[
            'subject'   =>'nullable|string',
            'comment'   =>'required|string',
            'attach'    =>'nullable|mimes:jpeg,jpg,pdf|max:1024',
        ]);

        $status=message::create($request->all()+
            [
                'user_id_send'      =>Auth::user()->id,
                'date_fa'           =>$this->dateNow,
                'time_fa'           =>$this->timeNow,
            ]
        );
        if($status)
        {
            alert()->success('پیام با موفقیت ارسال شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ارسال پیام')->persistent('بستن');
        }

        return back();
    }
}
