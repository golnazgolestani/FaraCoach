<?php

namespace App\Http\Controllers;

use App\booking;
use App\category_coach;
use App\category_gettingknow;
use App\category_post;
use App\categoryTag;
use App\checkout;
use App\city;
use App\coach;
use App\comment;
use App\course;
use App\coursetype;
use App\event;
use App\eventreserve;
use App\followbyCategory;
use App\followup;
use App\lib\zarinpal;
use App\like;
use App\message;
use App\notification;
use App\option;
use App\post;
use App\problemfollowup;
use App\reserve;
use App\settingscore;
use App\settingsms;
use App\sms;
use App\state;
use App\tag;
use App\teacher;
use App\tweet;
use App\type_coach;
use App\User;
use App\user_type;
use Kavenegar;
use GuzzleHttp\Client;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use nusoap_client;



class BaseController extends Controller
{
    public function __construct() {
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');
        $this->timeNow = $dateNow->format('H:i:s');
        //ایجاد لاگ در سیستم
//        visitor()->visit();


    }

    public function signupForm()
    {
        if(Gate::allows('isUser')||Gate::allows('isAdmin'))
        {
            return redirect('/panel');
        }
        else
        {
            return view('signup');
        }
    }


    public function sendSms($tel,$msg)
    {
        try {
            $sender = "10004002002020";
            $message = $msg;
            $receptor = array($tel);
            $result = Kavenegar::Send($sender, $tel, $message);
            if ($result) {
                foreach ($result as $r) {
                    $messageid = $r->messageid;
                    $message = $r->message;
                    $status = $r->status;
                    $statustext = $r->statustext;
                    $sender = $r->sender;
                    $receptor = $r->receptor;
                    $date = $r->date;
                    $cost = $r->cost;
                }

                sms::create([
                    //'insert_user_id' => Auth::user()->id,
                    'recieve_user' => $tel,
                    'comment' => $message,
                    'date_fa' => $this->dateNow,
                    'time_fa' => $this->timeNow,
                    'type' => $status,
                    'code' => $messageid,
                ]);
                $msg=[];
                return $msg;
            }

        } catch (\Kavenegar\Exceptions\ApiException $e)
        {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            if(Auth::check())
            {
                $insert_user_id=Auth::user()->id;
            }
            else
            {
                $insert_user_id=NULL;
            }


            $msg=[];
            $msg['msg'] = $e->errorMessage();
            $msg['status']=false;
            sms::create([
                'insert_user_id' => $insert_user_id,
                'recieve_user' => $tel,
                'comment' => $message,
                'date_fa' => $this->dateNow,
                'time_fa' => $this->timeNow,
                'type' => $msg['status'],
                'code' =>  $msg['msg'],
            ]);
            return $msg;

        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            $msg=[];
            $msg['msg'] = $e->errorMessage();
            $msg['status'] =false;
            sms::create([
                'insert_user_id' => Auth::user()->id,
                'recieve_user' => $tel,
                'comment' => $message,
                'date_fa' => $this->dateNow,
                'time_fa' => $this->timeNow,
                'type' => $msg['status'],
                'code' =>  $msg['msg'],
            ]);
            return $msg;
        }
    }


    //نمایش استان ها از بانک اطلاعاتی
    public function states()
    {
        $states=state::orderby('name','asc')
                ->get();
        return $states;
    }

    public function city($code)
    {
        return city::where('id','=',$code)
                    ->select('cities.name')
                    ->first();
    }


    // انتخاب شهر بر اساس ورودی کد استان مورد نظر به صورت ایجکس برای فرم ها
    public function citiesAjax($state)
    {
        $user=Auth::user();
        $cities=city::where('state_id','=',$state)
                    ->groupby('name')
                    ->orderby('name','asc')
                    ->get();
        foreach($cities as $item)
        {
            echo "<option value='$item->id' @if($item->id==$user->city) selected @endif>".$item->name."</option>";
        }
    }
    public function get_userTypes()
    {
        $types=[
                '-3'    =>'مارکتینگ 3',
                '-2'    =>'مارکتینگ 2',
                '-1'    =>'خام',
                '1'     =>'پیگیری نشده',
                '2'     =>'مدیر',
                '3'     =>'فروش',
                '4'     =>'کلینیک',
                '11'    =>"تور پیگیری",
                '12'    =>"انصراف",
                '13'    =>"در انتظار تصمیم",
                '14'    =>"عدم پاسخگویی",
                '20'    =>"مشتری",
                '30'    =>'جلسات',
                '40'    =>'رویداد',
        ];
        return $types;
    }
    public function userType($status)
    {
        switch($status)
        {
            case "-3":return "مارکتینگ 3";
                        break;
            case "-2":return "مارکتینگ 2";
                        break;
            case "-1":return "مارکتینگ 1";
                        break;
            case "1": return "پیگیری نشده";
                        break;
            case "2":return "مدیر";
                        break;
            case "3":return "آموزش";
                        break;
            case "4":return "کلینیک";
                        break;
            case "11": return "تور پیگیری";
                        break;
            case "12":return "انصراف";
                        break;
            case "13":return "در انتظار تصمیم";
                        break;
            case "14":return "عدم پاسخگویی";
                        break;
            case "20":return "مشتری";
                        break;
            case "30":return "جلسات";
                        break;
            case "40":return "رویداد";
                        break;

            default:return "";
        }
    }

    //کاربر براساس شرطها برمیگرداند
    public function get_user($tel=NULL,$id=NULL,$type=NULL,$condition=NULL,$paginate=NULL,$between=NULL,$insertUser=NULL)
    {
        return User::when($tel,function($query,$tel)
            {
                return $query->where('tel','=',$tel);
            })
            ->when($id, function ($query,$id)
            {
                return $query->where('id', '=', $id);
            })
            ->when($type,function($query,$type){
                return $query->where('type','=',$type);
            })
            ->when($condition,function($query,$condition)
            {
                return $query->where($condition[0],'=',$condition[1]);
            })
            ->when($between,function($query,$between)
            {
                return $query->wherebetween('created_at',[$between[0],$between[1]]);
            })
            ->when($insertUser,function($query,$insertUser)
            {
                return $query->where('insert_user_id','=',$insertUser);
            })
            ->orderby('id', 'desc')
            ->when($paginate,function($query){
                return $query->first();
            },function($query){
                return $query->get();
            });
    }

    public function get_likes($id=NULL,$user_id=NULL,$post_id=NULL,$type=NULL,$paginate='paginate',$date_fa=NULL,$time_fa=NULL)
    {
        return like::when($id,function($query,$id)
        {
            return $query->where('id','=',$id);
        })
        ->when($user_id,function($query,$user_id)
        {
            return $query->where('user_id','=',$user_id);
        })
        ->when($post_id,function($query,$post_id)
        {
            return $query->where('post_id','=',$post_id);
        })
        ->when($type,function($query,$type)
        {
            return $query->where('type','=',$type);
        })
        ->when($date_fa,function($query,$date_fa)
        {
            return $query->where('date_fa','=',$date_fa);
        })
        ->when($time_fa,function($query,$time_fa)
        {
            return $query->where('time_fa','=',$time_fa);
        })
        ->orderby('id', 'desc')
        ->when($paginate=='paginate',function($query){
            return $query->paginate($this->countPage());
        })
        ->when($paginate=='paginate',function($query){
            return $query->paginate($this->countPage());
        })
        ->when($paginate=='first',function($query){
            return $query->first();
        })
        ->when($paginate=='get',function($query){
            return $query->get();
        });
    }

    public function get_user_byID($id)
    {
        return user::where('id','=',$id)
                 ->first();
    }

    public function get_user_byUserName($user)
    {
        return user::where('username','=',$user)
                    ->first();
    }

    public function get_data_api()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://faracoach.com/',
            // You can set any number of default request options.
            'timeout'  => 60.0,
        ]);

        $response = $client->request('GET', 'wp-json/wc/store/products/');
        $contents_api=(json_decode($response->getBody()->getContents()));
        foreach ($contents_api as $item)
        {
            $item->name=str_replace('&#8221;','"',$item->name);
            $item->name=str_replace('&#8220;','"',$item->name);
            $item->name=str_replace('&#8211;','-',$item->name);

        }
        return $contents_api;
    }

    public function getFollowbyCategory()
    {
        return followbyCategory::where('status','=',1)
                        ->get();
    }

    public function getProblemFollowup_byID($id)
    {
        return problemfollowup::where('id','=',$id)->first();
    }

    public function get_problemfollowup($id=NULL,$status=NULL,$color=NULL,$paginate='get')
    {
        return problemfollowup::when($id,function($query) use ($id)
                {
                    return $query->where('id','=',$id);
                })
                ->when($color,function($query) use ($color)
                {
                    return $query->where('color','=',$color);
                })
                ->when($status,function($query) use ($status)
                {
                    return $query->where('status','=',$status);
                })
                ->when($paginate=='get',function($query) use ($paginate)
                {
                    return $query->get();
                })
                ->when($paginate=='paginate',function($query)
                {
                    return $query->paginate($this->countPage());
                })
                ->when($paginate=='first',function($query)
                {
                    return $query->first();
                });


    }

    // تگ های فعال را برمی گرداند
    public function get_tags()
    {
        return tag::where('status','=',1)
                ->get();
    }


    //تگ ها را براساس آیدی برمی گرداند
    public function get_tag_byID($id)
    {
        return tag::where('id','=',$id)
                ->first();
    }

    //تبدیل تاریخ میلادی به شمسی
    public function changeTimestampToShamsi($date)
    {
        $dateMiladi=new verta($date);
        return ($dateMiladi->hour.":".$dateMiladi->minute."  ".$dateMiladi->year."/".$dateMiladi->month."/".$dateMiladi->day);
    }

    //تبدیل تاریخ شمسی به میلادی
    public function changeTimestampToMilad($date)
    {
        $dateShamsi=Verta::parse($date);
        $dateMiladi= (Verta::getGregorian($dateShamsi->year,$dateShamsi->month,$dateShamsi->day));

        if(($dateMiladi[1]>0) && ($dateMiladi[1]<10))
        {
            $dateMiladi[1]='0'.$dateMiladi[1];
        }
        if(($dateMiladi[2]>0) && ($dateMiladi[2]<10))
        {
            $dateMiladi[2]='0'.$dateMiladi[2];
        }

        $dateMiladi=($dateMiladi[0].'-'.$dateMiladi[1].'-'.$dateMiladi[2]);
        return $dateMiladi;
    }

    //دسته بندی تگ ها را برمیگرداند
    public function categoryTags()
    {
        return categoryTag::where('status','=',1)
                            ->get();
    }

    public function get_parentCategory()
    {
        return categoryTag::where('status','=',1)
                            ->where('parent_id','=',0)
                            ->get();
    }

    public function get_category($request)
    {
        $categoryTag=categoryTag::where('category','=',$request)
                                ->first();
        return categoryTag::where('parent_id','=',$categoryTag->id)->get();
    }

    public function countUnreadMessages()
    {
//        return message::where('status','=',1)
//            ->where('user_id_recieve', '=', Auth::user()->id)
//            ->count();
    }

    public function get_countFollowup($id)
    {
        return followup::where('user_id','=',$id)->count();
    }

    //آخرین پیگیری کاربر را براساس آیدی آن بر میگرداند
    public function get_lastFollowupUser($id)
    {
        return followup::join('problemfollowups','followups.problemfollowup_id','=','problemfollowups.id')
                    ->where('user_id','=',$id)
                    ->orderby('followups.id','desc')
                    ->first();
    }


    public function get_notfollowup($order="users.id",$parameter="asc")
    {
        return User:: leftjoin('followups', 'users.id', '=', 'followups.user_id')
            ->where(function ($query)
            {
                $query  ->where('users.type', '=', '1')
                    ->orwhere('followby_expert','=',NULL);

            })
            ->groupby('users.id')
            ->select('users.*')
            ->orderby($order, $parameter)
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function get_notfollowup_withoutPaginate()
    {
        return User:: leftjoin('followups', 'users.id', '=', 'followups.user_id')
            ->where(function ($query)
            {
                $query  ->where('users.type', '=', '1')
                    ->orwhere('followby_expert','=',NULL);

            })
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }


    public function get_continuefollowup($type=NULL,$id=NULL,$paginate=NULL)
    {
        $users= User::join('followups','users.id','=','followups.user_id')

            ->when($id, function ($query) {
                return $query->where('followby_expert', '=', Auth::user()->id);
            })
            ->when($type,function($query,$type){
                return $query->where('users.type','=',$type);
            })
            ->orderby('followups.id', 'desc')
            ->groupby('followups.user_id')
            ->select('users.*')
            ->when($paginate,function($query){
                    return $query->paginate($this->countPage());
            },function($query){
                    return $query->get();
            });
        return $users;

    }

    public function get_continuefollowup_withoutPaginate()
    {
        $users =DB::table('users')
            ->join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', Auth::user()->id)
            ->where('users.type','=',11)
            ->orderby('followups.id', 'desc')
            ->distinct('followups.user_id')
            ->get();
        return $users;

    }

    public function get_continuefollowupbyID($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', $id)
            ->where('status_followups','=',11)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_continuefollowupbyID_withoutPaginate($id=NULL)
    {

        return User::join('followups','users.id','=','followups.user_id')
            ->where('users.type','=',11)

            ->when($id, function ($query, $id) {
                return $query->where('followby_expert', $id);
            })
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function getAll_continuefollowup()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups', '=', '11')
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_continuefollowup_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups', '=', '11')
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_cancelfollowup()
    {
         return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', Auth::user()->id)
//            ->where('status_followups','=',12)
            ->where('users.type','=',12)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_cancelfollowup_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups', '=', '12')
            ->where('followby_expert', '=', Auth::user()->id)
            ->where('status_followups','=',12)
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_cancelfollowupbyID($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', $id)
            ->where('status_followups','=',12)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_cancelfollowupbyID_withoutPaginate($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', $id)
            ->where('status_followups','=',12)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function getAll_cancelfollowup()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups','=',12)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_cancelfollowup_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups','=',12)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_waiting()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', Auth::user()->id)
//            ->where('status_followups','=',13)
            ->where('users.type','=',13)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_waiting_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', Auth::user()->id)
            ->where('status_followups','=',13)
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_waitingbyID($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups', '=', '13')
            ->where('followby_expert', '=', $id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_waitingbyID_withoutPaginate($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups', '=', '13')
            ->where('followby_expert', '=', $id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function getAll_waiting()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups','=',13)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_waiting_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups','=',13)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_noanswering()
    {
         return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', Auth::user()->id)
            ->where('status_followups','=',14)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_noanswering_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', Auth::user()->id)
            ->where('status_followups','=',14)
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_noansweringbyID($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups', '=', '14')
            ->where('followby_expert', '=', $id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_noansweringbyID_withoutPaginate($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('users.type', '=', '14')
            ->where('followby_expert', '=', $id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function getAll_noanswering()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups','=',14)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_noanswering_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups','=',14)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_students()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', Auth::user()->id)
            //->where('status_followups','=',20)
            ->where('users.type','=',20)
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->select('users.*')
            ->paginate($this->countPage());
    }

    public function get_students_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('followby_expert', '=', Auth::user()->id)
            ->where('status_followups','=',20)
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_studentsbyID($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups', '=', '20')
            ->where('followby_expert', '=', $id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_studentsbyID_withoutPaginate($id)
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups', '=', '20')
            ->where('followby_expert', '=', $id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function getAll_students()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups','=',20)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_students_withoutPaginate()
    {
        return User::join('followups','users.id','=','followups.user_id')
            ->where('status_followups','=',20)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_todayFollowup()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '=', $this->dateNow)
            ->where('followby_expert', '=', Auth::user()->id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_todayFollowup_withoutPaginate()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '=', $this->dateNow)
            ->where('followby_expert', '=', Auth::user()->id)
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }


    public function get_todayFollowupbyID($id)
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '=', $this->dateNow)
            ->where('followby_expert', '=', $id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_todayFollowupbyID_withoutPaginate($id)
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '=', $this->dateNow)
            ->where('followby_expert', '=', $id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_todayFollowup()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '=', $this->dateNow)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_todayFollowup_withoutPaginate()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '=', $this->dateNow)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_expireFollowup()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '<', $this->dateNow)
            ->where('followby_expert', '=', Auth::user()->id)
            ->wherenotIn('users.type', [2, 12])
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_expireFollowup_withoutPaginate()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '<', $this->dateNow)
            ->where('followby_expert', '=', Auth::user()->id)
            ->wherenotIn('users.type', [2, 12])
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_expireFollowupbyID($id)
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '<', $this->dateNow)
            ->where('followby_expert', '=', $id)
            ->wherenotIn('users.type', [2, 12])
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_expireFollowup()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '<', $this->dateNow)
            ->wherenotIn('users.type', [2, 12])
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_expireFollowup_withoutPaginate()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.nextfollowup_date_fa', '<', $this->dateNow)
            ->wherenotIn('users.type', [2, 12])
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_myfollowup()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=', Auth::user()->id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_myfollowup_withoutPaginate()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=', Auth::user()->id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_myfollowupbyID($id)
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=',$id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function get_myfollowupbyID_withoutPaginate($id)
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=',$id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function getAll_myfollowup()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.user_id','=',Auth::user()->id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->paginate($this->countPage());
    }

    public function getAll_myfollowup_withoutPaginate()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=', Auth::user()->id)
            ->select('users.*')
            ->groupby('users.id')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_followedToday()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=', Auth::user()->id)
            ->where('date_fa', '=', $this->dateNow)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function get_followedToday_withoutPaginate()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=', Auth::user()->id)
            ->where('date_fa', '=', $this->dateNow)
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_followedTodaybyID($id)
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=', $id)
            ->where('date_fa', '=', $this->dateNow)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function get_followedTodaybyID_withoutPaginate($id)
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('followups.insert_user_id', '=', $id)
            ->where('date_fa', '=', $this->dateNow)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->get();
    }



    public function getAll_followedToday()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('date_fa', '=', $this->dateNow)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function getAll_followedToday_withoutPaginate()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('date_fa', '=', $this->dateNow)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->get();
    }

    public function get_insertuserToday()
    {
        return User::where('users.insert_user_id', '=', Auth::user()->id)
            ->where('date_fa', '=', $this->dateNow)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function get_insertuserbyID($id)
    {
        return User::where('insert_user_id', '=',$id)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function getAll_insertuser()
    {
        return User::join('followups', 'users.id', '=', 'followups.user_id')
            ->where('insert_user_id', '=', Auth::user()->id)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function get_trashuserToday()
    {
        return User::where('date_fa', '=', $this->dateNow)
            ->where('type','=',0)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function get_trashuserbyID($id)
    {

        return User::where('insert_user_id', '=',$id)
            ->where('type','=',0)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function getAll_trashuser()
    {
        return User::where('type', '=', 0)
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate($this->countPage());
    }

    public function getAll_trashuser_withoutPaginate()
    {
        return User::where('type', '=', 0)
            ->groupby('users.id')
            ->select('users.*')
            ->orderby('users.id', 'desc')
            ->get();
    }

    public function get_teachers()
    {
        return teacher::orderby('id','desc')
                ->get();
    }

    public function get_teachersById($id)
    {
        return teacher::where('id','=',$id)
                ->orderby('id','desc')
                ->first();
    }

    public function get_courses($date=NULL)
    {
        return course::where('status','=',1)
                    ->when($date,function($query,$date)
                    {
                        return $query->where('start','>',$date);
                    })
                    ->get();
    }

    public function get_coursesByID($id)
    {
        return course::where('id','=',$id)
            ->first();
    }

    public function get_courseType()
    {
        return coursetype::orderby('id','desc')
                ->get();
    }

    public function get_detailsResource()
    {
        return user::whereNotNull('detailsresource')
                ->groupby('detailsresource')
                ->get();

    }

    public function get_talktimeByID($id,$between=NULL)
    {
        return followup::where('insert_user_id','=',$id)
                    ->when($between,function($query,$between)
                    {
                        return $query->wherebetween('followups.date_fa',[$between[0],$between[1]]);
                    })
                    ->sum('followups.talktime');
    }

    public function get_talktimeTodayByID($id)
    {
        return followup::where('insert_user_id','=',$id)
                    ->where('date_fa','=',$this->dateNow)
                    ->sum('followups.talktime');
    }

    public function get_settingsmsByType($type)
    {
        return settingsms::where('type',$type)
                    ->where('status','=',1)
                    ->get();
    }

    public function countPage()
    {
        $count=30;
        return $count;
    }

    public function get_options()
    {
        return option::get();
    }

    public function get_optionByName($value)
    {
        return option::where('option_name','=',$value)
                    ->first();
    }

    public function get_optionsWithWhere($options,$camprison,$value)
    {
        return option::where($options,$camprison,$value)
            ->get();
    }

    public function get_postById($post)
    {
        return post::where('id','=',$post)
            ->first();
    }

    public function get_post($id=NULL,$status=NULL,$paginate='paginate')
    {
        return post::join('users','posts.user_id','=','users.id')
                    ->when($id,function($query,$id)
                    {
                          return $query->where('id','=',$id);
                    })
                    ->when($status,function($query,$status)
                    {
                        return $query->where('status','=',$status);
                    })
                    ->when($paginate=='paginate',function($query,$paginate)
                    {
                        return  $query->orderby('id','desc')
                                        ->select('users.*','posts.*','posts.created_at as created_at_post')
                                        ->paginate($this->countPage());
                    })
                    ->when($paginate=='first',function($query)
                    {

                        return  $query->orderby('id','desc')
                                        ->select('users.*','posts.*','posts.created_at as created_at_post')
                                        ->first();
                    })
                    ->when($paginate=='limit',function($query)
                    {
                        return  $query->orderby('posts.id','desc')
                                ->select('users.*','posts.*','posts.created_at as created_at_post')
                                ->limit(10)
                                ->get();
                    })
                    ->when($paginate=='get',function($query)
                    {
                        return  $query->orderby('id','desc')
                                        ->get();
                    });
    }

    public function get_tweet($user=NULL,$status=NULL,$paginate='paginate')
    {
        return tweet::join('users','tweets.user_id','=','users.id')
            ->when($user,function ($query,$user)
            {
                return $query->where('user_id','=',$user);
            })
            ->when($status,function($query,$status)
            {
                return $query->wherein ('status',$status);
            })

            ->when($paginate=='first',function($query)
            {
                return  $query->orderby('tweets.id','desc')
                    ->select('users.*','tweets.*','tweets.created_at as created_at_tweet')
                    ->first();
            })
            ->when($paginate=='limit',function($query)
            {
                return  $query->orderby('tweets.id','desc')
                    ->select('users.*','tweets.*','tweets.created_at as created_at_tweet')
                    ->limit(10)
                    ->get();
            })
            ->when($paginate=='get',function($query)
            {
                return  $query->orderby('tweets.id','desc')
                    ->select('users.*','tweets.*','tweets.created_at as created_at_tweet')
                    ->get();
            })
            ->when($paginate=='paginate',function($query,$paginate)
            {
                return  $query->orderby('tweets.id','desc')
                    ->select('users.*','tweets.*','tweets.created_at as created_at_tweet')
                    ->paginate(10);
            });

    }
    public function get_commentByPostId($id,$status=1)
    {
        return comment::where('post_id','=',$id)
                ->where('status','=',$status)
                ->orderby('id','desc')
                ->paginate($this->countPage());
    }

    public function get_commentByPostId_withoutPaginate($id)
    {
        return comment::where('post_id','=',$id)
            ->orderby('id','desc')
            ->get();
    }

    public function get_categoryPostByUserId($id)
    {
        return category_post::where('user_id','=',$id)
                        ->get();
    }

    public function get_categoryPost_ByUserId_ByCategory($id,$category)
    {
        return category_post::where('user_id','=',$id)
                        ->where('category','=',$category)
                        ->first();
    }

    public function get_categoryPostById($id)
    {
        return category_post::where('id','=',$id)
                ->first();
    }

    public function get_scores()
    {
        return settingscore::first();
    }


    public function get_usersByType($type=NULL,$followby_expert=NULL,$paginate=NULL,$between=NULL,$condition=NULL,$statusFollowup=NULL,$flag=NULL)
    {

        $users= User::join('followups','users.id','=','followups.user_id')
            ->when($followby_expert, function ($query,$followby_expert) {
                return $query->where('followby_expert', '=', $followby_expert);
            })
            ->when($type,function($query,$type){
                return $query->where('users.type','=',$type);
            })
            ->when($between,function($query,$between)
            {
                return $query->wherebetween('followups.date_fa',[$between[0],$between[1]]);
            })
            ->when($condition,function($query,$condition)
            {
                return $query->where($condition[0],$condition[1],$condition[2]);
            })
            ->when($statusFollowup,function($query,$statusFollowup)
            {
                return $query->where('followups.status_followups','=',$statusFollowup);
            })
            ->when($flag,function($query,$flag)
            {
                return $query->where('followups.flag','=',$flag);
            })
            ->when($flag,function($query,$flag)
            {
                return $query->where('followups.flag','=',$flag);
            })
            ->orderby('followups.id', 'desc')
            ->groupby('followups.user_id')
            ->select('users.*','followups.nextfollowup_date_fa')
            ->when($paginate=='paginate',function($query){
                return $query->paginate($this->countPage());
            },function($query){
                return $query->get();
            });

        return $users;
    }

    public function get_categoryCoaches($id=NULL,$shortlink=NULL,$status=NULL,$paginate=NULL)
    {
        return category_coach::when($id,function($query,$id){
                return $query->where('id','=',$id);
            })
            ->when($shortlink,function ($query,$shortlink)
            {
                return $query->where('shortlink','=',$shortlink);
            })
            ->when($status,function($query,$status)
            {
                return $query->where('status','=',1);
            })
            ->when($paginate,function($query){
                return $query->paginate($this->countPage());
            },function($query){
                return $query->get();
            });
    }

    public function get_typeCoaches($id=NULL,$status=NULL,$paginate='get')
    {
        return type_coach::when($id,function($query,$id)
                    {
                        return $query->where('id','=',$id);
                    })
                    ->when($status,function($query,$status)
                    {
                        return $query->where('status','=',$status);
                    })
                    ->when($paginate=='get',function($query)
                    {
                        return $query->get();
                    })
                    ->when($paginate=='first',function($query)
                    {
                        return $query->first();
                    })
                    ->when($paginate=='paginate',function($query)
                    {
                        return $query->paginate($this->countPage());
                    });

    }

    public function get_categoryGettingknow($id=NULL,$category=NULL,$status=NULL,$parent_id=NULL,$paginate='get',$condition=NULL)
    {
        return category_gettingknow::when($id,function($query) use ($id)
        {
            return $query->where('id','=',$id);
        })
        ->when($category,function($query) use ($category)
        {
            return $query->where('category','=',$category);
        })
        ->when($status,function($query) use ($status)
        {
            return $query->where('status','=',$status);
        })
        ->when($parent_id,function($query) use ($parent_id)
        {
            return $query->where('parent_i','=',$parent_id);
        })
        ->when($condition,function($query) use ($condition)
        {
            return $query->where($condition[0],$condition[1],$condition[2]);
        })
        ->when($paginate=='get',function($query)use ($paginate)
        {
            return $query->get();
        })
        ->when($paginate=='paginate',function($query)
        {
            return $query->paginate($this->countPage());
        })
        ->when($paginate=='first',function($query)
        {
            return $query->first();
        });
    }


    public function get_followup_join_user($id=NULL,$user_id=NULL,$insert_user_id=NULL,$flag=NULL,$paginate='get',$join=true)
    {
        return followup::when($join,function ($query)
                {
                    $query->select('users.*','followups.id as followups_id');
                    return $query->join('users','users.id','=','followups.user_id');
                })
                ->when($id,function($query)use ($id)
                {
                    return $query->where('id','=',$id);
                })
                ->when($user_id,function($query)use ($user_id)
                {
                    return $query->where('user_id','=',$user_id);
                })
                ->when($insert_user_id,function($query)use ($insert_user_id)
                {
                    return $query->where('insert_user_id','=',$insert_user_id);
                })
                ->when($flag,function($query)use ($flag)
                {
                    return $query->where('flag','=',$flag);
                })
                ->when($paginate=='get',function($query)use ($paginate)
                {
                    return $query->get();
                })
                ->when($paginate=='paginate',function($query)use ($paginate)
                {
                    return $query->paginate($this->countPage());
                })
                ->when($paginate=='first',function($query)use ($paginate)
                {
                    $query->first();
                });


    }

    public function get_followup($id=NULL,$user_id=NULL,$insert_user_id=NULL,$flag=NULL,$paginate=NULL)
    {
        return followup::join('problemfollowups','followups.problemfollowup_id','=','problemfollowups.id')
            ->when($id,function($query)use ($id)
            {
                return $query->where('id','=',$id);
            })
            ->when($user_id,function($query)use ($user_id)
            {
                return $query->where('user_id','=',$user_id);
            })
            ->when($insert_user_id,function($query)use ($insert_user_id)
            {
                return $query->where('insert_user_id','=',$insert_user_id);
            })
            ->when($flag,function($query)use ($flag)
            {
                return $query->where('flag','=',$flag);
            })
            ->when($paginate=='get',function($query)
            {
                $query->orderby('followups.id','desc');
                return $query->get();
            })
            ->when($paginate=='paginate',function($query)
            {
                $query->orderby('followups.id','desc');
                return $query->paginate($this->countPage());
            })
            ->when($paginate=='first',function($query)
            {
                $query->orderby('followups.id','desc');
                return $query->first();
            });
    }


    //ارسال گزارش تعداد کاربرها براساس دسته بندی برای همکاران
    public function get_staticsCountUsers_admin()
    {
        if(Auth::user()->type==2)
            {
                //لیست تعداد کاربرها
                $statics['notfollowup'] = $this->get_user(NULL,NULL,1,NULL,NULL,NULL )->count();

                $lead=$this->get_user(NULL,NULL,-1,NULL,NULL)->count();
                $continuefollowup = $this->get_usersByType(11,Auth::user()->id,NULL,NULL,NULL,NULL )->count();
                $cancelfollowup = $this->get_usersByType(12,Auth::user()->id,NULL,NULL,NULL,NULL )->count();
                $waiting = $this->get_usersByType(13,Auth::user()->id,NULL,NULL,NULL,NULL )->count();
                $noanswering = $this->get_usersByType(14,Auth::user()->id,NULL,NULL,NULL,NULL )->count();
                $students = $this->get_usersByType(20,Auth::user()->id,NULL,NULL,NULL,NULL )->count();
                $condition=['nextfollowup_date_fa','=',$this->dateNow];
                $todayFollowup = $this->get_followup_join_user(NULL,Auth::user()->id,NULL,1,$condition,NULL )->count();
                $condition=['followups.nextfollowup_date_fa', '<', $this->dateNow];
                $expireFollowup=$this->get_usersByType(NULL,Auth::user()->id,NULL,NULL,$condition,NULL )->count();
                $myfollowup = $this->get_usersByType(NULL,Auth::user()->id,NULL,NULL,NULL,NULL )->count();
                $condition=['date_fa','=',$this->dateNow];
                $followedToday = $this->get_usersByType(NULL,Auth::user()->id,NULL,NULL,$condition,NULL )->count();
                $scholarship=User::where('resource','=','بورسیه تحصیلی')
                    ->count();
                $trashuser=$this->get_usersByType(0,Auth::user()->id,NULL,NULL,NULL,NULL )->count();
                $marketing1=User::where('type','=','-1')
                    ->orderby('id','desc')
                    ->get();
                $marketing2=User::where('type','=','-2')
                    ->orderby('id','desc')
                    ->get();
                $marketing3=User::where('type','=','-3')
                    ->orderby('id','desc')
                    ->get();
            }
        else
            {
                $dateNow=$this->dateNow;
                //لیست تعداد کاربرها
                $statics['notfollowup'] = $this->get_user(NULL,NULL,1,NULL,NULL,NULL )->count();
                $statics['lead']=$this->get_user(NULL,NULL,-1,NULL,NULL)->count();
//                $statics['continuefollowup'] = $this->get_usersByType(11,Auth::user()->id,NULL,NULL,NULL,NULL )->count();

                $statics['continuefollowup']=Auth::user()
                                            ->get_followby_expert()
                                            ->where('users.type','=',11)
                                            ->count();

//                $statics['cancelfollowup'] = $this->get_usersByType(12,Auth::user()->id,NULL,NULL,NULL,NULL )->count();

                $statics['cancelfollowup'] = Auth::user()
                                            ->get_followby_expert()
                                            ->where('users.type','=',12)
                                            ->count();

//                $statics['waiting'] = $this->get_usersByType(13,Auth::user()->id,NULL,NULL,NULL,NULL )->count();

                $statics['waiting'] =Auth::user()
                                    ->get_followby_expert()
                                    ->where('users.type','=',13)
                                    ->count();


//                $statics['noanswering'] = $this->get_usersByType(14,Auth::user()->id,NULL,NULL,NULL,NULL )->count();

                $statics['noanswering'] = Auth::user()
                                    ->get_followby_expert()
                                    ->where('users.type','=',14)
                                    ->count();



//                $statics['students'] = $this->get_usersByType(20,Auth::user()->id,NULL,NULL,NULL,NULL )->count();

                $statics['students'] = Auth::user()
                                    ->get_followby_expert()
                                    ->where('users.type','=',20)
                                    ->count();

                $condition=['nextfollowup_date_fa','=',$this->dateNow];
                $statics['todayFollowup'] = $this->get_usersByType(NULL,Auth::user()->id,NULL,NULL,$condition,NULL,1)->count();
                $condition=['followups.nextfollowup_date_fa', '<', $this->dateNow];
                $statics['expireFollowup']=User::where('followby_expert','=',Auth::user()->id)
                    ->whereNotIn('type',['-1','-2','-3','12'])
                    ->whereHas('followups',function($query) use ($dateNow)
                    {
                        $query->where('flag','=',1)
                            ->where('nextfollowup_date_fa','<',$dateNow);
                    })
                    ->count();



                $statics['myfollowup'] = Auth::user()
                                    ->get_followby_expert()
                                    ->count();


                $condition=['date_fa','=',$this->dateNow];
                $statics['followedToday'] = $this->get_usersByType(NULL,Auth::user()->id,NULL,NULL,$condition,NULL )->count();
//                $statics['trashuser']=$this->get_usersByType(0,Auth::user()->id,NULL,NULL,NULL,NULL )->count();
                $statics['trashuser']=Auth::user()
                                    ->get_followby_expert()
                                    ->where('users.type','=',0)
                                    ->count();

               $statics['scholarship']=User::where('resource','=','بورسیه تحصیلی')
                    ->count();


                $statics['marketing1']=User::where('type','=','-1')
                        ->orderby('id','desc')
                        ->count();
                $statics['marketing2']=User::where('type','=','-2')
                        ->orderby('id','desc')
                        ->count();
                $statics['marketing3']=User::where('type','=','-3')
                        ->orderby('id','desc')
                        ->count();

                return ($statics);
            }
    }

    public function get_reserve($id=NULL,$user_id=NULL,$booking_id=NULL,$type_booking=NULL,$condition=NULL,$status=NULL,$paginate='get')
    {
        return reserve::when($id,function ($query) use ($id)
        {
            return $query->where('id','=',$id);
        })
        ->when($user_id,function ($query) use ($user_id)
        {
            return $query->where('user_id','=',$user_id);
        })
        ->when($booking_id,function ($query) use ($booking_id)
        {
            return $query->where('booking_id','=',$booking_id);
        })
        ->when($type_booking,function ($query) use ($type_booking)
        {
            return $query->where('type_booking','=',$type_booking);
        })
        ->when($condition,function ($query) use ($condition)
        {
            return $query->where($condition[0],$condition[1],$condition[2]);
        })
        ->when($status,function ($query) use ($status)
        {
            return $query->where('status','=',$status);
        })
        ->when($paginate=='get',function ($query)
        {
            return $query->get();
        })
        ->when($paginate=='paginate',function ($query)
        {
            return $query->paginate($this->countPage());
        })
        ->when($paginate=='first',function ($query)
        {
            return $query->first();
        });
    }


    //تبدیل اعداد فارسی به انگلیسی
    public function convertPersianNumber($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }


    //دریافت دسته بندی و زیر مجمومعه های نحوه های آشنایی
    public function get_category_gettingknows($id=NULL,$category=NULL,$status=NULL,$parent_id=NULL,$content=NULL,$paginate='get')
    {
        category_gettingknow::when($id,function($query) use ($id)
        {
            return $query->where('id','=',$id);
        })
        ->when($category, function ($query) use ($category)
        {
            return $query->where('category','=',$category);
        })
        ->when($status,function($query) use ($status)
        {
            return $query->where('status','=',$status);
        })
        ->when($parent_id,function($query) use ($parent_id)
        {
            return $query->where('parent_id','=',$parent_id);
        })
        ->when($content,function ($query) use ($content)
        {
            return $query->where($content[0],$content[1],$content[2]);
        })
        ->when($paginate=='get',function($query)
        {
            return $query->get();
        })
        ->when($paginate=='paginate',function($query)
        {
            return $query->paginate($this->countPage());
        })
        ->when($paginate=='first',function($query)
        {
            return $query->first();
        });
    }


    public function get_booking($id=NULL,$user_id=NULL,$start_date=NULL,$start_time=NULL,$duration_booking=NULL,$status=NULL,$condition=NULL,$paginate='get')
    {
        return booking::when($id,function($query)use($id)
        {
            return $query->where('id','=',$id);
        })
        ->when($user_id,function($query)use($user_id)
        {
            return $query->where('user_id','=',$user_id);
        })
        ->when($start_date,function($query)use($start_date)
        {
            return $query->where('start_date','=',$start_date);
        })
        ->when($start_time,function($query)use($start_time)
        {
            return $query->where('start_date','=',$start_time);
        })
        ->when($duration_booking,function($query)use($duration_booking)
        {
            return $query->where('duration_booking','=',$duration_booking);
        })
        ->when($status,function($query)use($status)
        {
            return $query->where('status','=',$status);
        })
        ->when($condition,function($query)use($condition)
        {
            return $query->where($condition[0],$condition[1],$condition[2]);
        })
        ->when($paginate=='paginate',function($query)
        {
            return $query->paginate($this->countPage());
        })
        ->when($paginate=='get',function($query)
        {
            return $query->get();
        })
        ->when($paginate=='first',function($query)
        {
            return $query->first();
        });

    }


    public function get_cartUser()
    {
        if(Auth::check()) {


            return reserve::join('bookings', 'bookings.id', '=', 'reserves.booking_id')
                ->join('users', 'users.id', '=', 'bookings.user_id')
                ->where('reserves.user_id', '=', Auth::user()->id)
                ->where('bookings.start_date', '>', $this->dateNow)
                ->where('reserves.status', '=', 0)
                ->select('users.*', 'bookings.*', 'reserves.*', 'reserves.id as reserves_id')
                ->get();
        }
        else
        {
            return NULL;
        }
    }

    public function checkout($user_id=NULL,$product_id=NULL,$Amount=NULL,$type=NULL,$Email=NULL,$Mobile=NULL,$Description=NULL)
    {
//        $Amount=$fi;
//        $Email=Auth::user()->email;
//        $Mobile=Auth::user()->tel;
//        $Description="تست فروش";

        //Redirect to URL You can do it also by creating a form
        $order = new zarinpal();

        $res = $order->pay($Amount,$Email,$Mobile,$Description);

        $status=checkout::create([
            'user_id'       =>$user_id,
            'product_id'    =>$product_id,
            'price'         =>$Amount,
            'type'          =>$type,
            'authority'     =>$res,
            'description'   =>$Description,
        ]);

        if($status)
        {
            dd($res);

            return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
        }
        else
        {
            return redirect('/');
        }
    }


    public function get_events($id=NULL,$event=NULL,$shortlink=NULL,$type=NULL,$condition=NULL,$status=1,$paginate='paginate')
    {
        return event::when($id,function($query) use ($id)
        {
            return $query->where('id','=',$id);
        })
        ->when($event,function($query) use ($event)
        {
            return $query->where('event','=',$event);
        })
        ->when($shortlink,function($query) use ($shortlink)
        {
            return $query->where('shortlink','=',$shortlink);
        })
        ->when($type,function($query) use ($type)
        {
            return $query->where('type','=',$type);
        })
        ->when($status,function($query) use ($status)
        {
            return $query->where('status','=',$status);
        })
        ->when($condition,function($query) use ($condition)
        {
            return $query->where($condition[0],$condition[1],$condition[2]);
        })
        ->when($paginate=='paginate',function($query,$paginate)
        {
            return  $query->orderby('id','desc')
                ->paginate($this->countPage());
        })
        ->when($paginate=='limit',function($query)
        {
            return  $query->orderby('start_date','desc')
                ->limit(4)
                ->get();
        })
        ->when($paginate=='get',function($query)
        {
            return  $query->orderby('id','desc')
                        ->get();
        })
        ->when($paginate=='first',function($query)
        {
            return  $query->orderby('id','desc')
                ->first();
        });

    }


    public function get_eventReserve($id=NULL,$user_id=NULL,$event_id=NULL,$status=NULL,$condition=NULL,$paginate='paginate')
    {
        return eventreserve::when($id,function($query) use ($id)
        {
            return $query->where('id','=',$id);
        })
        ->when($user_id,function($query) use ($user_id)
        {
            return $query->where('user_id','=',$user_id);
        })
        ->when($event_id,function($query) use ($event_id)
        {
            return $query->where('event_id','=',$event_id);
        })
        ->when($status,function($query) use ($status)
        {
            return $query->where('status','=',$status);
        })
        ->when($condition,function($query) use ($condition)
        {
            return $query->where($condition[0],$condition[1],$condition[2]);
        })
        ->when($paginate=='paginate',function($query,$paginate)
        {
            return  $query->orderby('id','desc')
                ->paginate($this->countPage());
        })
        ->when($paginate=='get',function($query)
        {
            return  $query->orderby('id','desc')
                ->get();
        })
        ->when($paginate=='first',function($query)
        {
            return  $query->orderby('id','desc')
                ->first();
        });
    }

    public function get_coach($id=NULL,$user_id=NULL,$status=NULL,$condition=NULL,$paginate='first')
    {
        return coach::join('users','coaches.user_id','=','users.id')
            ->when($id,function($query) use ($id)
            {
                return $query->where('coaches.id','=',$id);
            })
            ->when($user_id,function($query) use ($user_id)
            {
                 return $query->where('users.id','=',$user_id);
            })
            ->when($status,function($query) use ($status)
            {
                return $query->where('coaches.status','=',$status);
            })
            ->when($condition,function($query) use ($condition)
            {
                return $query->where($condition[0],$condition[1],$condition[2]);
            })
            ->when($paginate=='paginate',function($query)
            {
                return  $query->orderby('coaches.id','desc')
                    ->paginate($this->countPage());
            })
            ->when($paginate=='get',function($query)
            {
                return  $query->orderby('coaches.id','desc')
                    ->get();
            })
            ->when($paginate=='first',function($query)
            {
                return  $query->orderby('coaches.id','desc')
                    ->first();
            });

    }

    public function get_comments($id=NULL,$user_id=NULL,$post_id=NULL,$status=NULL,$type=NULL,$condition=NULL,$paginate='get')
    {
        return comment::join('users','comments.user_id','=','users.id')
                        ->when($id,function ($query)use($id)
                        {
                            return $query->where('id','=',$id);
                        })
                        ->when($user_id,function ($query)use($user_id)
                        {
                            return $query->where('user_id','=',$user_id);
                        })
                        ->when($post_id,function ($query)use($post_id)
                        {
                            return $query->where('post_id','=',$post_id);
                        })
                        ->when($status,function ($query)use($status)
                        {
                            return $query->where('status','=',$status);
                        })
                        ->when($type,function ($query)use($type)
                        {
                            return $query->where('comments.type','=',$type);
                        })
                        ->when($condition,function($query) use ($condition)
                        {
                            return $query->where($condition[0],$condition[1],$condition[2]);
                        })
                        ->when($paginate=='paginate',function($query)
                        {
                            return  $query->orderby('comments.id','desc')
                                ->paginate($this->countPage());
                        })
                        ->when($paginate=='get',function($query)
                        {
                            return  $query->orderby('comments.id','desc')
                                ->get();
                        })
                        ->when($paginate=='first',function($query)
                        {
                            return  $query->orderby('comments.id','desc')
                                ->first();
                        });

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

    public function send_notification($user,$notification)
    {
        notification::create([
            'user_id'           =>$user,
            'insert_user_id'    =>Auth::user()->id,
            'notification'      =>$notification,
            'date_fa'           =>$this->dateNow,
            'time_fa'           =>$this->timeNow,
        ]);
    }


    public function countSMSRecieve()
    {
        $response=$this->client->request('GET', 'countinbox.json?startdate=1642636800&enddate=1642723200&linenumber=10004002002020&isread=1');
        return json_decode($response->getBody()->getContents())->entries;
    }

    public function checkoutStore($product_id,$fi_final,$user,$type,$order_id=NULL,$description)
    {
        $order = new zarinpal();
        $res = $order->pay($fi_final, $user->email, $user->tel,$description);
        $status=checkout::create([
            'user_id'       =>Auth::user()->id,
            //شماره آیدی فاکتور بجای order_id در اقساط ساب میشود
            'order_id'      =>$order_id,
            'product_id'    =>$product_id,
            'price'         =>$fi_final,
            'type'          =>$type,
            'authority'     =>$res,
            'description'   =>'انتقال به درگاه',
        ]);

        if($status)
        {
            return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
        }
        else
        {
            alert()->error('خطا در اتصال به درگاه')->persistent('بستن');
            return redirect('/');
        }
    }
}
