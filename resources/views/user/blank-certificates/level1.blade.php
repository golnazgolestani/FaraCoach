<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <link href="{{asset('/css/reset.css') }}" rel="stylesheet" />
    <style>


        .cls
        {
            background-image: url({{asset('images/blank-certificates/level1.jpg') }});
            /*
            background-image: url({{public_path('images/blank-certificates/level1.jpg') }});
             */
            width: 100%;
            height: 100vh;
            background-size: 100% 100%;

        }

        .cls_pdf{
            background-image: url("{{asset('/images/blank-certificates/level1.jpg') }}");
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
            position: relative;

        }

        h1
        {
            position: absolute;
            top: 930px;
            left: 270px;
            font-size: 160px;
            color: #000000;
        }


    </style>
</head>
<body>
<div class="cls_pdf">
    @if(strlen(Auth::user()->fname_en.' '.Auth::user()->lname_en)>20 && strlen(Auth::user()->fname_en.' '.Auth::user()->lname_en)<26)
        <h1 style="font-size: 112px">{{Str::upper(Auth::user()->fname_en).' '.Str::upper(Auth::user()->lname_en)}}</h1>
    @elseif(strlen(Auth::user()->fname_en.' '.Auth::user()->lname_en)>=26)
        <h1 style="font-size: 80px">{{Str::upper(Auth::user()->fname_en).' '.Str::upper(Auth::user()->lname_en)}}</h1>
    @else
        <h1>{{Str::upper(Auth::user()->fname_en).' '.Str::upper(Auth::user()->lname_en)}}</h1>
    @endif
</div>
</body>
</html>
