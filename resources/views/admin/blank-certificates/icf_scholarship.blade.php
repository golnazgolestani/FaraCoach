<!doctype html>
<html lang='fa'>
<head>
    <meta charset='UTF-8'>
    <link href='{{public_path('css/reset.css') }}' rel='stylesheet' />

    <style>

        .cls
        {
            background-image: url({{public_path('images/blank-certificates/ICF_Scholarship.jpg') }});
            /*
            background-image: url({{public_path('images/blank-certificates/level1.jpg') }});
             */
            width: 100%;
            height: 100vh;
            background-size: 100% 100%;

        }

        .cls_pdf{
            background-image: url('{{public_path('images/blank-certificates/ICF_Scholarship.jpg') }}');
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
<div class='cls_pdf'  style="background-image:url('{{public_path('images/blank-certificates/ICF_Scholarship.jpg')}}');background-size: 100% 100% ">
    @if(strlen(Auth::user()->fname_en.' '.Auth::user()->lname_en)>20 && strlen(Auth::user()->fname_en.' '.Auth::user()->lname_en)<26)
        <h1 class='tag_h1' style='font-size: 120px'>{{Auth::user()->fname_en.' '.Auth::user()->lname_en}}</h1>
    @elseif(strlen(Auth::user()->fname_en.' '.Auth::user()->lname_en)>=26)
        <h1 class='tag_h1' style='font-size: 100px'>{{Auth::user()->fname_en.' '.Auth::user()->lname_en}}</h1>
    @else
        <h1 class='tag_h1'>{{Auth::user()->fname_en.' '.Auth::user()->lname_en}}</h1>
    @endif
</div>
</body>
</html>
