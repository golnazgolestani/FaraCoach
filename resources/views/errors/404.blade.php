@extends('master.index')
@section('headerscript')
    <style>
        #img-403 {
            max-width:80%;
        }
        p{
            font-size: 40px;
        }
        @media (min-width: 320px) and (max-width:767px){
            p{
                font-size: 17px;
            }
            #img-403 {
                max-width:100%;
            }
            body{
                overflow: hidden;
            }
        }
    </style>
@endsection
@section('row1')
    <body>
    <div class="col-12 text-center mt-xl-5 mt-lg-5 mt-md-4 mt-sx-3  pt-5 ">

        <p class=" text-bold mt-xl-5 mt-lg-5 mt-md-5 mt-sx-5">صفحه مورد نظر یافت نشد!</p>
        <a href= "/login" class="btn btn-primary mt-xl-5 mt-lg-5 mt-md-4 mt-sx-3 btn-lg" > بازگشت  به صفحه ورود </a>
    </div>
    </body>

@endsection
