<?php

namespace App\Http\Controllers;

use App\landPage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class landingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('landing');
    }

    public function showPackageDownload()
    {
        if(session('status')==true)
        {
            return  view('freePackageLanding');
        }
        else
        {
            return back();
        }
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
        $this->validate(request(),
        [
            'fname' =>'required|min:3|persian_alpha',
            'lname' =>'required|min:3|persian_alpha',
            'tel'   =>'required|iran_mobile',
            'email' =>'nullable|email'
        ]);

        $check=User::where('email','=',$request['email'])
                ->orwhere('tel','=',$request['tel'])
                ->count();

        if($check==1)
        {
            $user=User::where('tel','=',$request['tel'])
                        ->orwhere('email','=',$request['email'])
                        ->first();

            if(!is_null($user) )
            {
                if ($user->fname != $request['fname']) {
                    $user->fname = $request['fname'];
                }

                if($user->lname!=$request['lname'])
                {
                    $user->lname=$request['lname'];
                }


                if($user->email!=$request['email'])
                {
                    $user->email=$request['email'];
                }

                if($user->tel!=$request['tel'])
                {
                    $user->tel!=$request['tel'];
                }
                $status=$user->update();
            }
            else
            {
                $status=User::create($request->all() +
                    [
                        'date_fa'       =>$this->dateNow,
                        'time_fa'       =>$this->timeNow
                    ]);

            }

            if($status)
            {
                $msg = "پروفایل با موفقیت به روزرسانی شد";
                $errorStatus = "success";
            }
            else
            {
                $msg = "خطا در بروزرسانی اطلاعات";
                $errorStatus = "danger";
            }
            return  redirect()
                    ->route('freePackageLanding')
                    ->with('status',true)
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus);

        }
        else if($check>1)
        {
            $msg="بیش از 1 نفر با اطلاعات وارد شده در سیستم موجوداست";
            $errorStatus="danger";
            return  back()
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus);
        }
        else if($check==0)
        {
            $status = User::create($request->all()+
            [
                'type'               =>'1',
                'password'           =>Hash::make('12345678'),
                'resource'           =>'کمپین',
                'detailsresource'    =>'17 ربیع 1399'
            ]);
            if($status)
            {
                $msg = "اطلاعات با موفقیت ثبت شد";
                $errorStatus = "success";
                $msgSMS=$request->fname." ".$request->lname. " عزیز اطلاعات شما در سیستم فراکوچ ثبت شد";
                $this->sensSms($request['tel'],$msgSMS);
            }
            else
            {
                $msg = "خطا در ثبت اطلاعات";
                $errorStatus = "danger";
            }
            return  redirect()
                    ->route('freePackageLanding')
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus)
                    ->with('status',true);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function store_landing_gift(Request $request)
    {

        $this->validate(request(),
            [
                'fname' =>'required|min:3|persian_alpha',
                'lname' =>'required|min:3|persian_alpha',
                'tel'   =>'required|iran_mobile',
                'email' =>'nullable|email'
            ]);



            $land=landPage::where('tel','=',$request->tel)
                            ->latest()
                            ->first();


            $status=$land->update($request->all()+[
                    'date_fa'       =>$this->dateNow,
                    'time_fa'       =>$this->timeNow
                ]);


            if($status)
            {
                alert()->success('اطلاعات با موفقیت ثبت شد')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در ثبت')->persistent('بستن');
            }

            return  redirect('/gift');



    }

//    //لندینگ دریافت تخفیف 50درصد
    public function bookOffCreate()
    {
            return view('whatIsCoaching');
    }

    public function bookOffStore (Request $request)
    {
        $this->validate($request,[
            'tel'               =>'required|iran_mobile',
        ]);
//
        $status=landPage::create($request->all()+[
                'resource'  =>'کتاب کوچینگ چیست'

            ]);

        $user=User::where('tel','=',$status->tel)
                    ->first();

        if(!is_null($user))
        {
            if(Auth::check())
            {
                return redirect('/panel');
            }
            else
            {
                Auth::loginUsingId($user->id);
                return redirect('/panel');
            }
        }
        else
        {
            $user=User::create($request->all()+[
                    'password'   => Hash::make('1234'),
                ]);
            Auth::loginUsingId($user->id);
            return redirect('/panel');
        }
    }


    // رویداد اصفهان
//    public function isfahanCreate(Request $request)
//    {
//        if(isset($request->q))
//        {
//            $user=landPage::where('id','=',$request->q)
//                        ->first();
//            if(is_null($user))
//            {
//                alert()->error('کد اختصاصی شما اشتباه است')->persistent('بستن');
//            }
//        }
//        else
//        {
//            $user=NULL;
//        }
//
//        return view('invitation')
//                        ->with('user',$user);
//    }

//    public function isfahanStore (Request $request)
//    {
//        $this->validate($request,[
//            'fname'             =>'required|persian_alpha|',
//            'lname'             =>'required|persian_alpha|',
//            'tel'               =>'required|iran_mobile',
//            'introduced'        =>'nullable|numeric',
//            'options'           =>'required|persian_alpha',
//        ]);
////
//        $status=landPage::create($request->all()+[
//                'resource'  =>'رویداد اصفهان'
//
//            ]);
//
//        if($status)
//        {
//            $tmp="شما در لیست رزرو قرار گرفتید \n"."\nجهت حضور بهتون اطلاع رسانی خواهد شد "."لینک دعوت اختصاصی:"."\n crm.faracoach.com/events/isfahan?q=".$status->id;
//            $this->sendSms($request->tel,$tmp);
//            alert()->success( " شما در لیست رزرو قرار گرفتید \n جهت حضور بهتون اطلاع رسانی خواهد شد.\n منتظر اطلاع رسانی های بعدی باشید.")->persistent('بستن');
//        }
//        else
//        {
//            alert()->error('خطا در ثبت')->persistent('بستن');
//        }
//
//        return redirect('/');
//    }

    public function isfahanList()
    {
        $users=landPage::where('resource','=','رویداد اصفهان')
                    ->orderby('id','asc')
                    ->groupby('tel')
                    ->get();

        return view('panelAdmin.event_Isfahan')
                    ->with('users',$users);
    }

//    public function isfahanExport()
//    {
//        //خروجی اکسل
//        $list=landPage::where('resource','=','رویداد اصفهان')
//                ->groupby('tel')
//                ->get();
//        $name='isfahan'.time();
//
//        $excel=fastexcel($list)->export($name.'.xlsx');
//        if($excel)
//        {
//            return response()->download(public_path($name.'.xlsx'));
//
//        }
//        else
//        {
//            return back();
//        }
//
//    }
}
