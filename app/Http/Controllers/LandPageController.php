<?php

namespace App\Http\Controllers;

use App\landPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LandPageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=landPage::where('resource','=','سالگرد')
                    ->orderby('id','desc')
                    ->get();

        $count=$users->count();

        return view('landings.jashn_list')
                ->with('count',$count)
                ->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(is_numeric($request->q) )
        {
            $introduced=landPage::where('id','=',$request->q)
                    ->where('resource','=','سالگرد')
                    ->first();
            if(!is_null($introduced))
            {
                $introduced=$request->q;
            }
            else
            {
                $introduced=NULL;
                alert()->error('کاربر معرف شما نامعتبر است')->persistent('بستن');

            }

        }
        else
        {
            $introduced=NULL;
        }
        return  view('jashn')
                    ->with('introduced',$introduced);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['tel']=$this->convertPersianNumber($request->tel);
        $user=landPage::where('tel','=',$request['tel'])
                    ->where('resource','=',$request->resource)
                    ->first();
        if(is_null($user)) {
            $this->validate($request, [
                'fname' => 'nullable|string|max:15',
                'lname' => 'nullable|string|max:50',
                'email' => 'nullable|email',
                'tel' => 'required|iran_mobile',
                'resource' => 'required|string',
                'introduced' => 'nullable|numeric',
            ]);

            $status = landPage::create($request->all());
            if ($status) {
                if ($request->resource == 'وبینار تمامیت') {
                    $introduced=landPage::where('id','=',$request->introduced)
                                    ->where('resource','=','سالگرد')
                                    ->first();

                    $msg = $request->lname . " عزیز \nاطلاعات شما با موفقیت ثبت شد.\n" . "با توجه به تکمیل ظرفیت وبینار، ویدئوی ضبط شده وبینار در اختیار شما قرار خواهد گرفت.\n" . "\n نام کاربری و رمز متعاقبا ارسال خواهد شد." . "\n" . "فراکوچ";
                    $this->sendSms($request->tel, $msg);


                    alert()->success($request->lname . " عزیز \nاطلاعات شما با موفقیت ثبت شد.\n" . "با توجه به تکمیل ظرفیت وبینار، ویدئوی ضبط شده وبینار در اختیار شما قرار خواهد گرفت.\n" . "\n نام کاربری و رمز متعاقبا ارسال خواهد شد.")->persistent("بستن");
                    return back();
                } else if ($request->resource == 'سالگرد') {
                    $msg = $request->fname . " " . $request->lname . " عزیز \n تبریک نام شما در لیست قرعه کشی هدایای سالگرد فراکوچ ثبت شد\n برای تایید نهایی سایر مراحل را انجام دهید"."\n لینک معرفی اختصاصی شما:"."\n".asset('/jashn?q='.$status->id."\n جهت استفاده در شبکه های اجتماعی ، بایو و استوری اینستاگرام ");
                    $this->sendSms($request['tel'], $msg);
                    $msg="تبریک ".$request->fname.' '.$request->lname." توسط لینک شما در قرعه کشی فراکوچ ثبت نام کرد \n "."شانس شما بیشتر شد";
                    $this->sendSms($status->introduce['tel'],$msg);
                    $status->resultoptions=explode(',',$status->resultoptions);
                    return view('landings.jashn_return')
                        ->with('user', $status);
                } else {
                    alert()->success("ثبت نام شما با موفقیت انجام شد")->persistent("بستن");
                }

            } else {
                alert()->error('خطا در ثبت نام ' . $request->resource)->persistent('بستن');;
            }
        }
        else
        {
            $user->resultoptions=explode(',',$user->resultoptions);
            return view('landings.jashn_return')
                ->with('user', $user);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\landPage  $landPage
     * @return \Illuminate\Http\Response
     */
    public function show(landPage $landPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\landPage  $landPage
     * @return \Illuminate\Http\Response
     */
    public function edit(landPage $landPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\landPage  $landPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, landPage $landPage)
    {

        $this->validate($request,[
            'options'   =>'required|array'
        ]);

        $request['options']=implode(',',$request->options);
        $status=$landPage->update($request->all());
        if($status)
        {
//            if(!is_null($request->count))
//            {
//                $msg=$landPage->lname." عزیز \n".'میزبان شما و '.$request->count." میهمان ارزشمندتان در 'وبینار تمامیت' خواهیم بود\n"."لینک وبینار متعاقبا ارسال خواهد شد\n"."لینک اختصاصی جهت معرفی میهمانان: \n".asset('/integrity?q='.$landPage->id)."\n فراکوچ-مدیران ایران ";
//            }
//            else
//            {
//                $msg=$landPage->lname." عزیز \n".'میزبان شما و میهمان ارزشمندتان در "وبینار تمامیت" خواهیم بود'."لینک وبینار متعاقبا ارسال خواهد شد\n"."لینک اختصاصی جهت معرفی میهمانان: \n".asset('/integrity?q='.$landPage->id)."\n فراکوچ-مدیران ایران ";
//            }


            $msg=$landPage->fname.' '.$landPage->lname." عزیز \n"."درخواست شما ثبت شد\n پس از تایید اقدامات در لیست نهایی قرار می گیرید";



            $this->sendSms($landPage->tel,$msg);
            alert()->success($msg)->persistent("بستن");
        }
        else
        {
            alert()->error('خطا در ثبت اطلاعات')->persistent('بستن');
        }
        return redirect('/jashn');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\landPage  $landPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(landPage $landPage)
    {
        //
    }

    public function optionsUser(landPage $landPage)
    {
        $landPage->options=explode(',',$landPage->options);
        $landPage->resultoptions=explode(',',$landPage->resultoptions);

        return view('landings.jashn_options')
                    ->with('landPage',$landPage);

    }

    public function optionsUserUpdate(Request $request,landPage $landPage)
    {

        $landPage->resultoptions=(implode(',',$request->resultoptions));
        $status=$landPage->save();
        if($status)
        {
            $landPage->resultoptions=explode(',',$landPage->resultoptions);
            if($landPage->resultoptions[0]==1 &&$landPage->resultoptions[1]==1)
            {
                $this->sendSms($landPage->tel,'شرایط شما برای شرکت در قرعه کشی فراکوچ توسط روابط عمومی تایید شد');
            }
            alert()->success('بروزرسانی شد')->persistent('بستن');

        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return back();

    }

    public function exportExcel()
    {
        Artisan::call('cache:clear');
        $landPage=landPage::where('resource','=','سالگرد')
                    ->orderby('id')
                    ->get();

        $fileName=rand();
        $excel=fastexcel($landPage)->export($fileName.'.xlsx');
        if($excel)
        {

            return response()->download(public_path($fileName.'.xlsx'))
                ->deleteFileAfterSend(true);

        }
        else
        {
            return back();
        }
    }

    public function update_jashn(Request $request,landPage $landPage)
    {
        $this->validate($request,[
           'fname'                  =>'required|string|min:3',
           'lname'                  =>'required|string|min:3',
           'email'                  =>'required|email',
           'instagram'              =>'required|string',
           'introductioncoaching'   =>'required|string',
           'attendingcoaching'      =>'required|string',
           'coachingservices'       =>'required|string',
           'mention'                =>'required|numeric',

        ]);

        $status=$landPage->update($request->all());

        if($status)
        {
            $landPage->resultoptions='1,1';
            $landPage->save();
            $msg=$landPage->fname." "." گرامی\n ثبت نام قطعی شد"."\n قرعه کشی سه شنبه 11 ظهر"."\n پیج Faracoach";
            $this->sendSms($landPage->tel,$msg);
            $landPage->resultoptions=explode(',',$landPage->resultoptions);
            alert()->success('اطلاعات تکمیلی با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert('خطا در بروزرسانی اطلاعات تکمیلی')->persistent('بستن');
        }

        return view('landings.jashn_return')
                        ->with('user',$landPage);

    }

}
