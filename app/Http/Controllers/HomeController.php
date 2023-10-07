<?php

namespace App\Http\Controllers;

use App\course;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');
        $this->timeNow = $dateNow->format('H:i:s');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts=$this->get_post(NULL,1,'limit');
        if(Auth::check())
        {
            $tweets=$this->get_tweet(NULL,[2,1],'paginate');
        }
        else
        {
            $tweets=$this->get_tweet(NULL,[1],'paginate');
        }
        foreach ($posts as $item)
        {
            $item->time=$this->diff($item->created_at_post,'Asia/Tehran');
        }

        foreach ($tweets as $item)
        {
            $item->time=$this->diff($item->created_at_tweet,'Asia/Tehran');
            $item->like=$this->get_likes(NULL, NULL,$item->id,'دلنوشته','get');
            if(Auth::check()) {
                foreach ($item->like as $item_like)
                {
                    if ($item_like->user_id == Auth::user()->id) {
                        $item->status_like = true;
                    }
                }
            }
        }

        //آخرین کاربرهای فعال
        $last_users=User::wherenotin('type',['2','3','4'])
            ->where('status_coach','<>','1')
            ->orderby('last_login_at','desc')
            ->limit(12)
            ->get();

        //آخرین کوچ های فعال
        $last_coaches=User::where('status_coach','=',1)
                    ->orderby('last_login_at','desc')
                    ->limit(12)
                    ->get();


        //متولدین ای ماه
        $v=verta();
        if($v->month<10)
        {
            $s="0".$v->month;
        }
        else
        {
            $s=$v->month;
        }

        $birthday=User::where('datebirth','like','%/'.$s.'/%')
                    ->get();

        //کاربرهای آنلاین ناقص می باشد
        $condition=['last_login_at',$this->changeTimestampToMilad($this->dateNow)];
        //$onlineUser=$this->get_user(NULL,NULL,NULL,$condition,'get');

        // آآخرین رویدادها
        //$condition=['start_date','>',$this->dateNow];
        $events=$this->get_events(NULL,NULL,NULL,NULL,NULL,1,'limit');

        //دوره های در حال ثبت نام
        $courses=course::where('start','>',$this->dateNow)
            ->where('id','<>',3)
            ->where('id','<>',15)
            ->where('id','<>',65)
            ->limit(5)
            ->get();


        return view('home')
//        return redirect('/login')
                    ->with('tweets',$tweets)
                    ->with('posts',$posts)
                    ->with('last_users',$last_users)
                    ->with('birthday',$birthday)
                    ->with('events',$events)
                    ->with('courses',$courses)
                    ->with('last_coaches',$last_coaches);

    }

    public function diff($item,$timezone)
    {
        date_default_timezone_set('UTC');
        $dt=Carbon::now($timezone);
        if (($dt->diffInSeconds($item))<=59)
        {
            return $dt->diffInMinutes($item)." ثانیه ";
        }
        else if( ($dt->diffInMinutes($item))<=59)
        {
            return $dt->diffInMinutes($item)." دقیقه ";
        }
        else if( ($dt->diffInHours($item))<=23)
        {
            return $dt->diffInHours($item)." ساعت ";
        }
        else
        {
            return $dt->diffInDays($item)." روز ";
        }
    }
}
