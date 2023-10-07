<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="{{public_path('css/reset.css')}}">

    <style>


        body{
            font-family: 'britanic';
            position: relative;
        }

        .cls_pdf{
            background-image: url({{public_path('images/blank-certificates/acsth_blank.jpg') }});
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
            position: relative;

        }



        .h1_size
        {
            position: absolute;
            top: 1000px;
            left: 270px;
            font-size: 160px;
            color: #000000;
            font-family: 'BRITANIC';

        }




        #number_certificates
        {
            position: absolute;
            top: 2060px;
            left: 1010px;
            font-size: 35px;
            color: #38383a;
        }


        #date_certificates
        {
            position: absolute;
            top: 2105px;
            left: 870px;
            font-size: 35px;
            color: #38383a;
        }


    </style>
</head>
<body class="cls_pdf " style="background-image:url('{{public_path('images/blank-certificates/acsth_blank.jpg')}}');background-size: 100% 100%;position: relative">


    @if(strlen($student->user->fname_en.' '.$student->user->lname_en)>20 && strlen($student->user->fname_en.' '.$student->user->lname_en)<26)
        <p class="h1_size" style="font-size: 112px; font-family: 'britanic';font-weight: bold">{{Str::upper($student->user->fname_en).' '.Str::upper($student->user->lname_en)}}</p>
    @elseif(strlen($student->user->fname_en.' '.$student->user->lname_en)>=26)
        <p class="h1_size" style="font-size: 80px;font-family: 'britanic';font-weight: bold">{{Str::upper($student->user->fname_en).' '.Str::upper($student->user->lname_en)}}</p>
    @else
        <p class="h1_size" style="font-family: 'britanic';font-weight: bold">{{Str::upper($student->user->fname_en).' '.Str::upper($student->user->lname_en)}}</p>
    @endif

    <p id="number_certificates">{{$student->code}}</p>
    <p id="date_certificates">{{$student->date_jalali}}</p>


</body>
</html>
