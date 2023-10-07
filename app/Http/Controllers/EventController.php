<?php

namespace App\Http\Controllers;

use App\event;
use App\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = event::where('status', '=', 1)
            ->orderby('start_date', 'desc')
            ->paginate(20);
        foreach ($events as $item)
        {
            if ($item->start_date < $this->dateNow) {
                $item->status_event = "برگزار شد";
            } else if ($item->start_date >= $this->dateNow && ($item->capacity > 0)) {
                $item->status_event = "در حال ثبت نام";
            } else if ($item->start_date >= $this->dateNow && ($item->capacity == 0)) {
                $item->status_event = "تکمیل ظرفیت";
            }

            $d = explode('/', $item->start_date);
            $t = explode(':', $item->start_time);
            $v = (Verta::createJalali($d[0], $d[1], $d[2], $t[0], $t[1], 0));
            $item->eventDate = ($v->formatWord('l')." ".$item->start_date);

        }
        return view('events')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::where('is_event','=',1)
                ->get();
        return view('admin.insertEvent')
                    ->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'event'         => 'required|persian_alpha_num|min:3',
            'shortlink'     => 'required|string|min:3|unique:events',
            'user_id'       => 'required|numeric',
            'description'   => 'required|string|min:3|',
            'capacity'      => 'required|numeric|',
            'type'          => 'required|numeric|',
            'address'       => 'required_with:type,1|string|',
            'image'         => 'required|mimes:jpeg,jpg,png,gif|max:600',
            'video'         => 'nullable|string|min:3|',
            'start_date'    => 'required|string|max:11|',
            'start_time'    => 'required|string|max:6|',
            'end_date'      => 'required|string|max:11|',
            'end_time'      => 'required|string|max:6|',
            'duration'      => 'required|string|min:3|',
            'expire_date'   => 'required|string|max:11|',
            'event_text'    => 'required|string|min:10|',
            'heading'       => 'nullable|string|min:10|',
            'contacts'      => 'nullable|string|min:10|',
            'faq'           => 'nullable|string|min:10|',
            'links'         => 'nullable|string|min:10|',
        ]);


        try {
            $status = event::create($request->all() + [
                    'insert_user' => Auth::user()->id,
                ]);

            if ($status) {
                if ($request->has('image') && $request->file('image')->isValid()) {
                    $file = $request->file('image');
                    $image = "event-" . time() . "." . $request->file('image')->extension();
                    $path = public_path('/documents/events/');
                    $files = $request->file('image')->move($path, $image);
                    $request->image = $image;
                }
                $status->image = $image;
                $status->update();

                alert()->success('رویداد با موفقیت ثبت شد')->persistent('بستن');
                return back();
            }
        } catch (Throwable $e) {
            alert()->error($e->errorInfo[2], 'خطا')->persistent('بستن');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\event $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event,Request $request)
    {
        if(isset($request->q))
        {
            $request->session()->put('introduce',$request->q);
        }



        $d = explode('/', $event->start_date);
        $t = explode(':', $event->start_time);
        $v = (Verta::createJalali($d[0], $d[1], $d[2], $t[0], $t[1], 0));
        $event->eventDate = ($v->format('%d %B Y  '));

        $eventReserve = NULL;
        if (Auth::check()) {
            $eventReserve = $this->get_eventReserve(NULL, Auth::user()->id, $event->id, NULL, NULL, 'first');
        }


        if ($event->start_date < $this->dateNow) {
            $event->status_event = "برگزار شد";
        } else if (($event->start_date >= $this->dateNow) && ($event->capacity > 0)) {
            $event->status_event = "در حال ثبت نام";
        } else if ($event->start_date >= $this->dateNow && ($event->capacity == 0)) {
            $event->status_event = "تکمیل ظرفیت";
        }

        $comments=$this->get_comments(NULL,NULL,$event->id,NULL,'event');

        return view('event')
            ->with('event', $event)
            ->with('comments', $comments)
            ->with('eventReserve', $eventReserve);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        return view('admin.editEvent')
            ->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        $this->validate($request, [
            'event' => 'required|persian_alpha_num|min:3',
            'shortlink' => 'required|unique:events,shortlink,' . $event->id,
            'description' => 'required|string|min:3|',
            'capacity' => 'required|numeric|',
            'type' => 'required|numeric|',
            'address' => 'required_with:type,1|string|',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:600',
            'video' => 'nullable|string|min:3|',
            'start_date' => 'required|string|max:11|',
            'start_time' => 'required|string|max:6|',
            'end_date' => 'required|string|max:11|',
            'end_time' => 'required|string|max:6|',
            'duration' => 'required|string|min:3|',
            'expire_date' => 'required|string|max:11|',
            'event_text' => 'required|string|min:10|',
            'heading' => 'nullable|string|min:10|',
            'contacts' => 'nullable|string|min:10|',
            'faq' => 'nullable|string|min:10|',
            'links' => 'nullable|string|min:10|',
        ]);

        try {
            $status = $event->update($request->all());

            if ($request->has('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $image = "event-" . time() . "." . $request->file('image')->extension();
                $path = public_path('/documents/events/');
                $files = $request->file('image')->move($path, $image);
                $request->image = $image;
                $event->image = $image;
                $event->update();
            }

            alert()->success('رویداد با موفقیت بروزرسانی شد')->persistent('بستن');
            return redirect('/admin/event/all');
        } catch (Throwable $e) {
            alert()->error($e->errorInfo[2], 'خطا')->persistent('بستن');
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        $status = $event->delete();
        if ($status) {
            alert()->success('رویداد با موفقیت حذف شد')->persistent('بستن');
        } else {
            alert()->error('خطا در حذف رویداد')->persistent('بستن');
        }
        return back();
    }

    public function eventsListAdmin()
    {
        $events = event::orderby('id','desc')
                    ->get();
        foreach ($events as $item)
        {
            $item->count=$this->get_eventReserve(NULL,NULL,$item->id,NULL,NULL,'get')->count();
        }



        foreach ($events as $item) {
            if ($item->start_date < $this->dateNow) {
                $item->status_event = "برگزار شد";
            } else if ($item->start_date >= $this->dateNow && ($item->capacity > 0)) {
                $item->status_event = "در حال ثبت نام";
            } else if (($item->start_date >= $this->dateNow) && ($item->capacity == 0)) {
                $item->status_event = "تکمیل ظرفیت";
            }

        }
        return view('admin.events')
            ->with('events', $events);
    }


    //شرکت کننده ها در رویئداد
    public function usersEvent(event $event)
    {
        $eventreserves=$event->eventreserves()
                        ->paginate(25);

//        $users = event::join('eventreserves', 'events.id', '=', 'eventreserves.event_id')
//            ->join('users', 'eventreserves.user_id', '=', 'users.id')
//            ->where('eventreserves.event_id', '=', $event->id)
//            ->orderby('eventreserves.id', 'asc')
//            ->select('users.*', 'eventreserves.date_fa', 'eventreserves.time_fa')
//            ->simplePaginate(20);
        return view('admin.listEventReserveUsers')
            ->with('event', $event)
            ->with('eventreserves', $eventreserves);
    }

    public function updateStatus(Request $request, event $event)
    {

        $this->validate($request,[
            'status'    =>'required|boolean'
        ]);

        $status=$event->update($request->all());

        if($status)
        {
            if($request->status==1)
            {
                return " رویداد ".$event->event." فعال شد ";
            }
            else
            {
                return " رویداد ".$event->event." غیرفعال شد ";
            }

        }
    }

    public function exportExcel(event $event)
    {
        $users=event::join('eventreserves','events.id','=','eventreserves.event_id')
                ->join('users','eventreserves.user_id','=','users.id')
                ->where('events.id','=',$event->id)
                ->select('users.fname','users.lname','users.tel')
                ->get();

        $fileName=time().".xlsx";
        $excel=fastexcel($users)->export($fileName);

        if($excel)
        {
            return response()->download(public_path($fileName))
                ->deleteFileAfterSend(true);
        }
        else
        {
            return back();
        }

    }

    public function organizers()
    {
        $users=User::where('is_event','=',1)
                ->get();
        return view('admin.events.organizers')
                        ->with('users',$users);
    }

    public  function organizers_store(Request $request)
    {
        $this->validate($request,[
            'user_id'   =>'required|numeric'
        ]);

        $user=User::where('id','=',$request->user_id)
                    ->first();

        if(is_null($user))
        {
            alert()->error('کاربر مورد نظر یافت نشد')->persistent('بستن');
        }
        else
        {
            $user->is_event=1;

            $status=$user->save();

            if($status)
            {
                alert()->success('کاربر به لیست برگزارکننده های رویداد اضافه شد')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در اضافه کردن برگزارکننده رویداد')->persistent('بستن');
            }

            return back();
        }
    }

    public function organizers_destroy(User $user,Request $request)
    {
        $user->is_event=0;
        $status=$user->save();

        if($status)
        {
            alert()->success('کاربر از لیست برگزارکننده های دوره حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف برگزارکننده')->persistent('بستن');
        }
        return back();

    }

}
