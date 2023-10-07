<?php

namespace App\Http\Controllers;

use App\certificate;
use App\student;
use App\User;


use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use niklasravnsborg\LaravelPdf\Facades\Pdf;


class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificate $certificate)
    {
        //
    }


    public function get_certificate()
    {

        if(Auth::user()->scholarship->confirm_exam==1 && Auth::user()->scholarship->confirm_webinar==1 )
        {

            if (is_null(Auth::user()->fname_en) || is_null(Auth::user()->lname_en)) {
                alert()->error('نام و نام خانوادگی خود را به انگلیسی در پروفایل وارد کنید')->persistent('بستن');
                return redirect('/panel/profile');
            }


            ini_set('max_execution_time', 0);




            $pdf=Pdf::loadView('user.blank-certificates.icf_scholarship', [],[],[
                'format'    =>[900,655],

            ]);



            $fileName=time().'_.pdf';

            $pdf->allow_charset_conversion=false;  // Set by default to TRUE


            $pdf->charset_in='UTF-8';

            $pdf->save($fileName);

            return response()->download(public_path($fileName))
                ->deleteFileAfterSend(true);






        }
        else
        {
            alert()->error('برای شما مدرکی صادر نشده است')->persistent('بستن');
            return back();
        }

    }


    public function get_certificateByAdmin(User $user)
    {

        if($user->scholarship->confirm_exam==1 && $user->scholarship->confirm_webinar==1 )
        {


            if (is_null($user->fname_en) || is_null($user->lname_en)) {
                alert()->error('نام و نام خانوادگی خود را به انگلیسی در پروفایل وارد کنید')->persistent('بستن');
                return redirect('/panel/profile');
            }

            ini_set('max_execution_time', 0);

            $tmp="<!doctype html>
<html lang='fa'>
<head>
    <meta charset='UTF-8'>
    <link href='".public_path('/css/reset.css')." ' rel='stylesheet' />
    <style>



        @font-face {
            font-family: 'embassybt';
            src: url('".storage_path('/fonts/embassybt.ttf')."') format('truetype');
            font-style: normal;
            font-weight: normal;
        }

        .cls_pdf{
            background-image: url('".public_path('/images/blank-certificates/ICF_Scholarship.jpg')."');
            width: 100%;
            height: 100%;
            background-size: 100% 100%;

        }

        .tag_h1
        {
            position: relative;
            text-align: center;
            font-size: 160px;
            color: #000000;
            top: 1100px;
            text-transform: capitalize;
            font-family:'embassybt';
        }


    </style>
</head>
<body>
<div class='cls_pdf'>
        <h1 class='tag_h1' style='font-size: 120px'>ALI</h1>
</div>
</body>
</html>
";

//            Pdf::setOption(['dpi' => 300, 'fontDir' => storage_path('/fonts'), 'font_cache' => storage_path('fontsCache/'),'defaultFont'=>'embassybt'])->loadView('user.blank-certificates.icf_scholarship')->setPaper('a4', 'landscape')->save($user->id . '.pdf');
            Pdf::setOption(['dpi' => 300, 'fontDir' => storage_path('/fonts'), 'font_cache' => storage_path('fontsCache/'),'defaultFont'=>'embassybt'])->loadHTML($tmp)->setPaper('a4', 'landscape')->save($user->id . '.pdf');


//            return response()->download(public_path($user->id.'.pdf'))
//                ->deleteFileAfterSend(true);
//            return view('user.blank-certificates.icf_scholarship');
        }
        else
        {
            alert()->error('مدرکی صادر نشده است')->persistent('بستن');
            return back();
        }

    }



    public function get_certificate1()
    {

        if(is_null(Auth::user()->fname_en)||is_null(Auth::user()->lname_en))
        {
            alert()->error('نام و نام خانوادگی خود را به انگلیسی در پروفایل وارد کنید')->persistent('بستن');
            return redirect('/panel/profile');
        }

        ini_set('max_execution_time', 0);


//        Pdf::setOption(['dpi' => 300])->loadView('user.blank-certificates.level1')->setPaper('a4', 'landscape')->save(Auth::user()->id.'.pdf');
        Pdf::setOption(['dpi' => 300,'fontDir'=>storage_path('/fonts'),'font_cache'=>storage_path('fontsCache/')])->loadView('user.blank-certificates.icf_scholarship')->setPaper('a4', 'landscape')->save(Auth::user()->id.'.pdf');
//        return response()->download(asset(Auth::user()->id.'.pdf'))
//                        ->deleteFileAfterSend(true);
        return view('user.blank-certificates.icf_scholarship');

    }

    public function get_certificate_acsth(student $student)
    {

        $date_jalali=(Verta::parse(str_replace('/','-',$student->date_gratudate).' 00:00:00')->datetime()->format('Y/n/j'));
        $student->date_jalali=$date_jalali;
        if(is_null($student->user->fname_en)||is_null($student->user->lname_en))
        {
            alert()->error('نام و نام خانوادگی را به انگلیسی در پروفایل وارد کنید')->persistent('بستن');
            return redirect('/panel/profile');
        }

        ini_set('max_execution_time', 0);




        $pdf=Pdf::loadView('admin.blank-certificates.acsth', array('student' => $student),[],[
            'format'    =>[900,655],

        ]);



        $fileName=time().'_.pdf';

        $pdf->allow_charset_conversion=false;  // Set by default to TRUE


        $pdf->charset_in='UTF-8';

        $pdf->save($fileName);

        return response()->download(public_path($fileName))
                         ->deleteFileAfterSend(true);

    }

    public function get_fcc(student $student)
    {

//        if(is_null($student->user->instagram))
//        {
//            alert()->error(' اینستاگرام را به انگلیسی در پروفایل وارد کنید')->persistent('بستن');
//            return redirect('/panel/profile');
//        }
        $customPaper = array(0,0,300,312);

        ini_set('max_execution_time', 0);
//
//        Pdf::setOption([
//            'dpi'                   => 300,
////            'fontDir'               =>public_path('fonts/'),
////            'defaultFont'           =>'Britannic Bold',
//            'isRemoteEnabled'          =>false,
//
//        ])
//            ->loadView('admin.blank-certificates.fcc_blank', array('student' => $student))
//            ->setPaper($customPaper, 'landscape')
//            ->save($student->id.'.pdf');
        $data=[
            'student' => $student
        ];

        $pdf=Pdf::loadView('admin.blank-certificates.fcc_blank',$data,[],[
            'format'    =>[280,280],

        ]);

        $fileName=time().'_.pdf';

        $pdf->allow_charset_conversion=false;  // Set by default to TRUE


        $pdf->charset_in='UTF-8';
        $pdf->format='A5-L';

        $pdf->save($fileName);


//        return view('admin.blank-certificates.fcc_blank')
//                        ->with('student',$student);
        return response()->download(public_path($fileName))
            ->deleteFileAfterSend(true);



    }

    public function get_fc1byAdmin(student $student)
    {

        $date_jalali=(Verta::parse(str_replace('/','-',$student->date_gratudate).' 00:00:00')->datetime()->format('Y/n/j'));
        $student->date_jalali=$date_jalali;
        if(is_null($student->user->fname_en)||is_null($student->user->lname_en))
        {
            alert()->error('نام و نام خانوادگی را به انگلیسی در پروفایل وارد کنید')->persistent('بستن');
            return redirect('/panel/profile');
        }

        ini_set('max_execution_time', 0);




        $pdf=Pdf::loadView('admin.blank-certificates.FC1_logo', array('student' => $student),[],[
            'format'    =>[900,655],

        ]);



        $fileName=time().'_.pdf';

        $pdf->allow_charset_conversion=false;  // Set by default to TRUE


        $pdf->charset_in='UTF-8';

        $pdf->save($fileName);

        return response()->download(public_path($fileName))
            ->deleteFileAfterSend(true);
    }






}
