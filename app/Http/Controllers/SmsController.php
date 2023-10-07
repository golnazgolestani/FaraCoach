<?php

namespace App\Http\Controllers;

use App\followup;
use App\sms;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavenegar;
use GuzzleHttp\Client;


class SmsController extends BaseController
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
        $sms=sms::orderby('id','desc')
                ->paginate(50);
        foreach ($sms as $item)
        {
            if(!is_null($item->insert_user_id))
            {
                $item->insert_user_id=$this->get_user_byID($item->insert_user_id)->fname." ".$this->get_user_byID($item->insert_user_id)->lname;
            }
        }
        return view ('panelAdmin.sms')
                    ->with('sms',$sms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=($this->get_detailsResource());

        //تگ ها
        $tags = $this->get_tags();
        $parentCategory = $this->get_category('پیگیری');
        $problem=$this->getproblemfollowup();
        $types=$this->get_userTypes();
        return view('panelAdmin.sendSms')
                    ->with('categories',$categories)
                    ->with('parentCategory',$parentCategory )
                    ->with('tags',$tags)
                    ->with('problem',$problem)
                    ->with('types',$types);
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
            'comment'   =>'required'
        ]);
//        $user=user::query();
//        $user->leftjoin('followups','users.id','=','followups.user_id')
//                ->distinct('followups.user_id');
//
//        if(isset($request->categories)) {
//            for ($i = 0; $i < count($request->categories); $i++) {
//                $user = $user->orwhere('resource', '=', $request['categories'][$i]);
//                $user = $user->orwhere('detailsresource', '=', $request['categories'][$i]);
//            }
//        }
//
//        if(isset($request->tags))
//        {
//            for ($i = 0; $i < count($request->tags); $i++) {
//                $user = $user->where('followups.tags', 'like', "%".$request['tags'][$i]."%");
//            }
//        }
//        if(isset($request->fields)) {
//            for ($i = 0; $i < count($request->fields); $i++) {
//                $user = $user->where($request['fields'][$i], $request['comparison'][$i], $request['values'][$i]);
//            }
//        }
//
//        if(isset($request->problem)) {
//            for ($i = 0; $i < count($request->problem); $i++) {
//                $user = $user->orwhere('followups.problemfollowup_id', '=', $request['problem'][$i]);
//            }
//        }
//
//        if(isset($request->types)) {
//            for ($i = 0; $i < count($request->types); $i++) {
//                if ($request['types'][$i] == 1) {
//                    $user = $user->orwhere('users.type', '=', '1');
//                } else if ($request['types'][$i] == 2) {
//                    $user = $user->orwhere('users.type', '=', '2');
//                }else if($request['types'][$i] == 3) {
//                    $user = $user->orwhere('users.type', '=', '3');
//                }
//                else {
//                    $user = $user->orwhere('users.type', '=', $request['types'][$i]);
//                }
//            }
//        }
//
//
//        $user=$user->get();
        $user=User::leftjoin('followups','users.id','=','followups.user_id')
                ->when($request->categories,function($query,$request)
                {
                    foreach ($request as $item) {
                        $query->orwhere('resource', '=', $item);
                        return $query->orwhere('detailsresource', '=', $item);
                    }
                })
                ->when($request->tags,function($query,$request)
                {
                    foreach ($request as $item) {
                        return $query->where('followups.tags', 'like', "%".$item."%");
                    }
                })
                ->when($request->problem,function($query,$request)
                {
                    foreach ($request as $item) {
                        $query->orwhere('followups.problemfollowup_id', '=', $item);
                    }
                    return $query->distinct('followups.user_id');
                })
                ->when($request->types,function($query,$request)
                {
                    foreach ($request as $item) {
                        if ($item == 1) {
                            $query->orwhere('users.type', '=', '1');
                        } else if ($item == 2) {
                            $query->orwhere('users.type', '=', '2');
                        }else if($item == 3) {
                            $query->orwhere('users.type', '=', '3');
                        }
                        else {
                            $query->orwhere('users.type', '=', $item);
                        }
                    }
                    return $query;
                })
                ->groupby('users.id')
                ->get();


        if((count($user)>0)||(isset($request['tel_recieves']))) {
            $tel_array = [];
            foreach ($user as $item) {
                array_push($tel_array, $item->tel);
            }
            $tel = implode(',', $tel_array);
            if(isset($request['tel_recieves']))
            {
                $tel=$tel.",".$request['tel_recieves'];
            }

            // دستور زیر باید برای قسمت فیلدها ادیت شود
            if(isset($request->fields)) {
                for ($i = 0; $i < count($request->fields); $i++) {
                    $user = $user->where($request['fields'][$i], $request['comparison'][$i], $request['values'][$i]);
                }
            }

            foreach ($user as $item) {
                $comment=$request['comment'];
                if($item->sex==1)
                {
                    $item->sex="آقای ";
                }
                else if(is_null($item->sex))
                {
                    $item->sex="کاربر ";
                }
                else if($item->sex==0)
                {
                    $item->sex="خانم ";
                }

                $comment=str_replace("{tel}",$item->tel,$comment);
                $comment=str_replace("{fname}",$item->fname,$comment);
                $comment=str_replace("{lname}",$item->lname,$comment);
                $comment=str_replace("{datebirth}",$item->datebirth,$comment);
                $comment=str_replace("{sex}",$item->sex,$comment);
                $this->sendSms($item->tel,$comment);
            }


            $msg = "پیام با موفقیت به تعداد " .count($user) . " ارسال شد";
            $errorStatus = "success";
            return back()->with('msg', $msg)
                ->with('errorStatus', $errorStatus);
        }
        else
        {
            $msg = "تعداد افراد فیلترشده 0 نفر می باشد";
            $errorStatus = "danger";
            return back()->with('msg', $msg)
                ->with('errorStatus', $errorStatus);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(sms $sms)
    {
        //
    }

    public function createAjax(request $request,$paginate=NULL)
    {

        //$user=user::get();

        $user=User::leftjoin('followups','users.id','=','followups.user_id')
                ->when($request->categories,function($query,$request)
                {
                    foreach ($request as $item) {
                        $query->orwhere('resource', '=', $item);
                        return $query->orwhere('detailsresource', '=', $item);
                    }
                })
                ->when($request->tags,function($query,$request)
                {
                    foreach ($request as $item) {
                        return $query->where('followups.tags', 'like', "%".$item."%");
                    }
                })
                ->when($request->problem,function($query,$request)
                {
                    foreach ($request as $item) {
                         $query->orwhere('followups.problemfollowup_id', '=', $item);
                    }
                    return $query->distinct('followups.user_id');
                })
                ->when($request->types,function($query,$request)
                {
                    foreach ($request as $item) {
                        if ($item == 1) {
                            $query->orwhere('users.type', '=', '1');
                        } else if ($item == 2) {
                            $query->orwhere('users.type', '=', '2');
                        }else if($item == 3) {
                            $query->orwhere('users.type', '=', '3');
                        }
                        else {
                            $query->orwhere('users.type', '=', $item);
                        }
                    }
                    return $query;
                })
                ->groupby('users.id')
                ->get();





//        if(isset($request->categories)) {
//            for ($i = 0; $i < count($request->categories); $i++) {
//                $user = $user->orwhere('resource', '=', $request['categories'][$i]);
//                $user = $user->orwhere('detailsresource', '=', $request['categories'][$i]);
//            }
//        }

//        if(isset($request->tags))
//        {
//            for ($i = 0; $i < count($request->tags); $i++) {
//                $user = $user->where('followups.tags', 'like', "%".$request['tags'][$i]."%");
//            }
//        }



        // دستور زیر باید برای قسمت فیلدها ادیت شود
        if(isset($request->fields)) {
            for ($i = 0; $i < count($request->fields); $i++) {
                $user = $user->where($request['fields'][$i], $request['comparison'][$i], $request['values'][$i]);
            }
        }

//        if(isset($request->problem)) {
//            for ($i = 0; $i < count($request->problem); $i++) {
//                $user = $user->orwhere('followups.problemfollowup_id', '=', $request['problem'][$i]);
//            }
//        }

//        if(isset($request->types)) {
//            for ($i = 0; $i < count($request->types); $i++) {
//                if ($request['types'][$i] == 1) {
//                    $user = $user->orwhere('users.type', '=', '1');
//                } else if ($request['types'][$i] == 2) {
//                    $user = $user->orwhere('users.type', '=', '2');
//                }else if($request['types'][$i] == 3) {
//                    $user = $user->orwhere('users.type', '=', '3');
//                }
//                else {
//                    $user = $user->orwhere('users.type', '=', $request['types'][$i]);
//                }
//            }
//        }

//        $user=$user->get();

        if(($user->count()>0)||(isset($request['tel_recieves']))) {
            echo "تعداد افراد فیلترشده ".$user->count()." نفر می باشد";
        }
        else
        {
            $msg = "تعداد افراد فیلترشده 0 نفر می باشد";
            $errorStatus = "danger";
            return back()->with('msg', $msg)
                ->with('errorStatus', $errorStatus);
        }
    }

    public function countRecieve()
    {

//        $response=$this->client->request('GET', 'receive.json?linenumber=10004002002020&isread=0');
        $response=$this->client->request('GET', 'countinbox.json?startdate=1642636800&enddate=1642723200&linenumber=10004002002020&isread=1');
        dd(json_decode($response->getBody()->getContents())->entries);
    }

    public function recieve()
    {



//        $response=$this->client->request('GET','send.json?receptor=09376578529&sender=10004002002020&message=mobile=$clientnumber&keyword=$keyword&linenumber=$linenumber');
        $enddate = Carbon::now()->timestamp;
        $startdate = Carbon::yesterday()->timestamp;
        $response=$this->client->request('GET','receive.json?linenumber=10004002002020&isread=1&page=2&pageindex=200');
        $response=json_decode($response->getBody()->getContents())->entries;

        if(!is_null($response)) {
            foreach ($response as $item)
            {
                $user = User::where('tel', 'like', '%' . substr($item->sender, 1) . '%')
                    ->first();

                if ($user)
                {
                   $item->id=$user->id;
                   $item->fname=$user->fname;
                   $item->lname=$user->lname;
                   $item->jalaliDate= $this->changeTimestampToShamsi($item->date);
                }
                else
                {
                    $item->id=NULL;
                    $item->fname=NULL;
                    $item->lname=NULL;
                    $item->jalaliDate= $this->changeTimestampToShamsi($item->date);
                }
            }

        }

        return view('admin.smsPanel.smsRecieve')
                        ->with('response',$response);
    }
}
