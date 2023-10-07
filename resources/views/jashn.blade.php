@extends('master.index')
@section('headerscript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/js/animated-square-countdown/squareCountDownClock.css" />
    <style>
        .container-fluid{
            background-color:#fff9ee;
        }
        @font-face {
            font-family: SGKara-Regular;
            src: url({{asset('/fonts/other/SGKara-Regular.ttf')}});

            font-family: SGKara-bold;
            src: url({{ asset('/fonts/other/SGKara-SemiBold.ttf') }});
        }

        h2, #title{
            font-family:SG#img-centerKara-bold;
            color:#29547b;
        }
        h4{
            font-family:SGKara-bold;
            color:#29547b;
            font-size:16px;
            line-height:35px;
        }
        #small{
            color:#29547b;
            font-size:24px;
            font-weight: bolder;
        }

        #small + span
        {
            color:#29547b;
            font-weight: bolder;
            font-size: 16px ;
        }
        .container-fluid p{
            line-height:30px;
        }

        .sticky{
            border:2px solid #91bbe9 !important;
        }

        .btn{
            background-color:#a60802;
            color:#fff;
        }
        #ghoree{
            color:#fff;
        }
        .rounded{
            border:1px solid #f5f5f5;
        }
        #img-line1{

        }
        .sticky{
            position: -webkit-sticky;
            position: sticky;
            top: 70px;
            padding: 30px;

        }
        #img-center{
            width:85%;
        }


        .table-striped>tbody>tr:nth-of-type(odd)>*{
            --bs-table-accent-bg:#ffe7bb;
        }
        .table-info, .table-info>td, .table-info>th {
            background-color: #fff9ee;
        }

        #small img{
            width:2%;
        }


/* ---- Timeline ---- */
ol {
	position: relative;
	display: block;
	margin-top: 100px;
    margin-bottom:150px;
	height: 60px;
	background-image: url({{asset("/images/red.png")}});
    background-size:100%;
    background-repeat: no-repeat;
}
ol::before {
	left: -5px;
}


/* ---- Timeline elements ---- */
#des li,#mobile li {
	position: relative;
	display: inline-block;
	float: left;
	width: 139px;
	font: bold 14px arial;
    height: 50px;
}
li .diplome {
  position: absolute;
  top: -60px;
  color: #000000;
}
li .point {
	content: "";
    top: -4px;
    left: 38%;
    display: block;
    border-radius: 100% 100%;
    background: #fff9ee;
    position: absolute;
    width: 50px;
    height: 50px;
}
.bi{
    font-size: 50px;
    color: #a80d08;

}
li .description {
  display: none;
  background-image: url({{asset("/images/gif.png")}});
  background-size:100%;
  background-repeat: no-repeat;
  padding: 12px;
  margin-top: 20px;
  z-index: 1;
}

.description p
{
    line-height: 20px;
}
li .p{
    display: none;
    font-weight: normal;
    font-size: 11px;
}
.description::before {
  content: '';
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid #f4f4f4;
  position: absolute;
  top: -5px;
  left: 43%;
}

/* ---- Hover effects ---- */
li:hover {
    cursor: pointer;

}
li:hover .description {
    display: block;
    transition:2s;
}
li:hover .description > p {
    display: block;
    margin-top:90px;
    transition:2s;
}

#form{
    display:none;
}

#banner_jayeze_mobile
{
    display: none;
}


@media screen and (max-width:375px) and (min-width:320px){
    #img-des{
        width:35%
    }
    h2{
        font-size:18px;
    }

    .point{
        font-size:10px;
    }
}

    @media screen and (max-width:425px) and (min-width:320px){
        #des{
            display:none;
        }

        #small
        {
            font-size: 18px;
        }

        #small img{
            width:6%;
        }

        p{
            text-align: justify;
        }

        #banner_jayeze_desktop
        {
            display: none;
        }

        #banner_jayeze_mobile
        {
            display: block;
        }
    }
    </style>
@endsection
@section('row1')
<!-------------------------------- CONTER --------------------->
    <article class="container-fluid mb-5">

        <!-------------------------------- CONTER --------------------->
        <div class="row text-center mt-5">
            <div class="col-md-6 offset-md-3 col-12">

            </div>
        </div>
        <div class="col-md-10 offset-md-1 col-12 text-center mt-3">
            <h2 class="text-danger">جایزه باران فراکوچ</h2>
            <p id="small" class="d-inline">
                به مناسبت میلاد امیرالمومنین <img src="{{asset('/images/u.svg')}}">و روز پدر و ششمین سالگرد فعالیت فراکوچ
            </p>
            <span> (چهارمین سالگرد تاسیس)</span>
        </div>

        <div class="row text-center mt-3">
            @if($errors->any())
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div class="col-md-10 offset-md-1 col-12">
                    <img class="mt-3" id="img-center" src="{{asset('/images/happy.png')}}"/>

                    <h2 class="font-weight-bold" lass="mt-3">
                    از 17 تا 26 بهمن ماه با هدایای ارزنده نقدی و غیر نقدی به ارزش 100 میلیون تومان
                    </h2>

                    <div class="row">
                        <div id="app"></div>
                    </div>

                    <div id="banner_jayeze_desktop">
                        <img src="{{asset('/images/jayeze1.png')}}" class="img-fluid mb-5 mt-5" width="70%" />
                        <img src="{{asset('/images/jayeze2.png')}}" class="img-fluid mb-5" width="70%"/>
                        <img src="{{asset('/images/jayeze3.png')}}" class="img-fluid mb-5" width="70%" />
                    </div>
                    <div id="banner_jayeze_mobile">
                        <img src="{{asset('/images/jayeze1_mobile.png')}}" class="img-fluid mb-3 mt-3" />
                        <img src="{{asset('/images/jayeze2_mobile.png')}}" class="img-fluid mb-3" />
                        <img src="{{asset('/images/jayeze3_mobile.png')}}" class="img-fluid mb-3" />
                    </div>

                    <!----------------------------------------TIMELINE ------------->
                    <!--
                    <ol id="des" class="d-none d-sm-block">
                        <li>
                            <p class="diplome"> 1 هدیه به ارزش <br/>  5,000,000 تومان  </p>
                            <span class="point">
                            <i class="bi bi-gem"></i>
                            </span>
                            <div class="description">
                                <p  class="p pb-4">
                                هدیه نقدی 5 میلیون تومانی برای یک نفر
                                </p>
                            </div>
                        </li>
                        <li>
                            <p class="diplome"> 6 هدیه به ارزش <br/> 500,000 تومان </p>
                            <span class="point">
                            <i class="bi bi-gem"></i>
                            </span>
                            <div class="description">
                                <p class="p pb-4">
                                هدیه نقدی 500 هزار تومانی برای 6 نفر
                                </p>
                            </div>
                        </li>
                        <li>
                            <p class="diplome"> 1 هدیه به ارزش <br/> 10,000,000 تومان</p>
                            <span class="point">
                            <i class="bi bi-mortarboard"></i>
                            </span>
                            <div class="description">
                                <p  class="p">
                                بن  تخفیف 10 میلیون تومانی شرکت در دوره های آموزش کوچینگ برای 1 نفر
                                </p>
                            </div>
                        </li>
                        <li>
                            <p class="diplome"> 3 هدیه به ارزش <br/> 5,000,000 تومان</p>
                            <span class="point">
                            <i class="bi bi-mortarboard"></i>
                            </span>
                            <div class="description">
                                <p  class="p">
                                بن  تخفیف 6 میلیون تومانی شرکت در دوره های آموزش کوچینگ برای 3 نفر
                                </p>
                            </div>
                        </li>
                        <li>
                        <p class="diplome">  6 هدیه به ارزش <br/> 2,000,000 تومان</p>
                            <span class="point">
                            <i class="bi bi-people"></i>
                            </span>
                            <div class="description">
                                <p  class="p">
                                جلسه کوچینگ به ارزش 2 میلیون تومان با استاد متحدین برای 6 نفر
                                </p>
                            </div>
                        </li>
                        <li>
                        <p class="diplome"> 30 هدیه به ارزش <br/> 500,000 تومان</p>
                            <span class="point">
                            <i class="bi bi-people"></i>
                            </span>
                            <div class="description">
                                <p  class="p">
                                جلسه کوچینگ به ارزش بیش از 500 هزار تومان با سایر کوچ های آکادمی فراکوچ برای 30 نفر
                                </p>
                            </div>
                        </li>
                        <li>
                        <p class="diplome"> 20 هدیه به ارزش<br/> 2,000,000 تومان </p>
                            <span class="point">
                            <i class="bi bi-mortarboard"></i>
                            </span>
                            <div class="description">
                                <p class="p">
                                بن  تخفیف 2 میلیون تومانی شرکت در دوره های آموزش کوچینگ برای 20 نفر
                                </p>
                            </div>
                        </li>
                        </ol>
                    -->

                    <!---------------------------- MOBILE  --------------------------------------->
                    <div class="row text-right">
                        <table class="table-bordered table table-striped d-md-none">
                            <tr class="table-info">
                                <td class="font-weight-bold text-center" colspan="2"> 1 هدیه به ارزش <br/> 5,000,000 تومان</td>
                            </tr>
                            <tr class="table-info">
                                <td class="font-weight-bold text-center"> 6 هدیه به ارزش <br/> 500,000 تومان </td>
                                <td class="font-weight-bold text-center">هدیه نقدی 500 هزار تومانی</td>
                            </tr>
                            <tr class="table-info">
                                <td class="font-weight-bold text-center"> 1 هدیه به ارزش <br/> 10,000,000 تومان</td>
                                <td class="font-weight-bold text-center">بن  تخفیف 10 میلیون تومانی شرکت در دوره های آموزش کوچینگ</td>
                            </tr>
                            <tr class="table-info">
                                <td class="font-weight-bold text-center"> 3 هدیه به ارزش <br/> 5,000,000 تومان</td>
                                <td class="font-weight-bold text-center">بن  تخفیف 6 میلیون تومانی شرکت در دوره های آموزش کوچینگ</td>
                            </tr>

                            <tr class="table-info">
                                <td class="font-weight-bold text-center">6 هدیه به ارزش <br/> 2,000,000 تومان</td>
                                <td class="font-weight-bold text-center">جلسه کوچینگ خصوصی به ارزش 2 میلیون تومان با شخص استاد متحدین</td>
                            </tr>
                            <tr class="table-info">
                                <td class="font-weight-bold text-center"> 30 هدیه به ارزش <br/> 500,000 تومان</td>
                                <td class="font-weight-bold text-center">
                                    جلسه کوچینگ خصوصی به ارزش بیش از 500 هزار تومان با سایر کوچ های آکادمی فراکوچ
                                </td>
                            </tr>
                            <tr class="table-info">
                                <td class="font-weight-bold text-center"> 20 هدیه به ارزش<br/> 2,000,000 تومان </td>
                                <td class="font-weight-bold text-center">
                                    جلسه کوچینگ خصوصی به ارزش بیش از 500 هزار تومان با سایر کوچ های آکادمی فراکوچ
                                </td>
                            </tr>

                        </table>


                        <ul id="mobile" class="d-none">
                            <li>
                                <p class=""> 1 هدیه به ارزش <br/> 5,000,000 تومان</p>
                                <span class="point">
                                <i class="bi bi-gem"></i>
                                </span>

                            </li>
                            <li>
                                <p class="diplome"> 6 هدیه به ارزش <br/> 500,000 تومان </p>
                                <span class="point">
                                <i class="bi bi-gem"></i>
                                </span>
                                <div class="description">
                                    <p class="p pb-4">
                                    هدیه نقدی 500 هزار تومانی
                                    </p>
                                </div>
                            </li>
                            <li>
                                <p class="diplome"> 1 هدیه به ارزش <br/> 10,000,000 تومان</p>
                                <span class="point">
                                <i class="bi bi-mortarboard"></i>
                                </span>
                                <div class="description">
                                    <p  class="p">
                                    بن  تخفیف 10 میلیون تومانی شرکت در دوره های آموزش کوچینگ
                                    </p>
                                </div>
                            </li>
                            <li>
                                <p class="diplome"> 3 هدیه به ارزش <br/> 5,000,000 تومان</p>
                                <span class="point">
                                <i class="bi bi-mortarboard"></i>
                                </span>
                                <div class="description">
                                    <p  class="p">
                                    بن  تخفیف 6 میلیون تومانی شرکت در دوره های آموزش کوچینگ
                                    </p>
                                </div>
                            </li>
                            <li>
                            <p class="diplome">  6 هدیه به ارزش <br/> 2,000,000 تومان</p>
                                <span class="point">
                                <i class="bi bi-people"></i>
                                </span>
                                <div class="description">
                                    <p  class="p">
                                    جلسه کوچینگ خصوصی به ارزش 2 میلیون تومان با شخص استاد متحدین
                                    </p>
                                </div>
                            </li>
                            <li>
                            <p class="diplome"> 30 هدیه به ارزش <br/> 500,000 تومان</p>
                                <span class="point">
                                <i class="bi bi-people"></i>
                                </span>
                                <div class="description">
                                    <p  class="p">
                                    جلسه کوچینگ خصوصی به ارزش بیش از 500 هزار تومان با سایر کوچ های آکادمی فراکوچ
                                    </p>
                                </div>
                            </li>
                            <li>
                            <p class="diplome"> 20 هدیه به ارزش<br/> 2,000,000 تومان </p>
                                <span class="point">
                                <i class="bi bi-mortarboard"></i>
                                </span>
                                <div class="description">
                                    <p class="p">
                                    بن  تخفیف 2 میلیون تومانی شرکت در دوره های آموزش کوچینگ
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--------------------------------- -------------------------->

                    <div class="col-12">
                        <h2 class="mt-5">یا علی گفتیم و عشق آغاز شد:</h2>
                        <p>زمستون سال 1394 بود که برای اولین بار دور هم جمع شدیم و فعالیت‌های علمی خودمون رو در حوزه مباحث توسعه فردی و کسب‌وکار با بهره‌گیری از روشی مدرن و بین‌المللی به نام کوچینگ (Coaching) شروع کردیم و در بهمن سال ۱۳۹۶ تصمیم گرفتیم  تا اولین مؤسسه حقوقی کشور رو با نام تجاری «فراکوچ» به ثبت برسونیم.</p>
                    </div>
                    <img class="mt-3 img-fluid" id="img-line" src="{{asset('/images/red.png')}}"/>
                    <div class="col-md-6 col-12 float-left">
                        <p id="title">
                        از اون روز تا الان کلی اتفاقات خوب و شیرین و البته سخت رو پشت سر گذاشتیم و این  ویدئو خلاصه ای  از روند  کاری ما رو  طی  این مدت  نشون میده:
                        </p>
                        <style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/Zw5dH/vt/frame" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                        <!-- <video class="video-fluid z-depth-1 col-12"  loop controls muted>
                            <source src="https://mdbootstrap.com/img/video/Sail-Away.mp4" type="video/mp4" />
                        </video> -->
                    </div>

                    <div class="col-md-6 col-12 float-left">
                        <p id="title">
                       قصد داریم این سالگرد رو با قدردانی از همراهی شما شیرین تر کنیم و با کلی هدیه بسیار ارزشمند جشن بگیریم.
                        </p>
                        <style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/fPcWI/vt/frame" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                        <!-- <video class="video-fluid z-depth-1 col-12"  loop controls muted>
                            <source src="https://mdbootstrap.com/img/video/Sail-Away.mp4" type="video/mp4" />
                        </video> -->
                    </div>
                </div>
                <div class="mt-5">
                    <img class="mt-5 img-fluid" src="{{asset('/images/gb.png')}}"/>
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="col-12 text-center">
                    <!--
                    <h4 class="mt-5">
                    قصد داریم این سالگرد رو با قدردانی از همراهی شما شیرین تر کنیم و با کلی هدیه بسیار ارزشمند جشن بگیریم.
                    </h4>
                    -->
                    <h4> از 17 بهمن تا آخرین دقایق 24 بهمن فرصت داری تو این جشن  ثبت نام کنی.</h4>
                    <a href="#collapseExample"  class="btn btn-lg px-5 mt-4" id="ghoree"  data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample" >ثبت نام قرعه کشی فراکوچ</a>

                    <div id="collapseExample" class="mt-5 collapse" >
                        @include('registerLanding')
                    </div>
                    <h2 class="mt-5">
                        مهلت شرکت در قرعه کشی این جشنواره
                    </h2>
                    <p class="mt-4">
                    فرصت برای شرکت در این قرعه کشی بی‌نظیر محدود و بدون تمدید است:
                    <br/>
تنها تا ساعت ۲۴ روز ۲۴ بهمن ماه 1400
                    </p>


                    <br/>
                    <!--
                    نتایج قرعه کشی جشنواره هفتمین سالگرد تأسیس آکادمی بین‌المللی فراکوچ متعاقبا از طریق سایت و پیج رسمی این آکادمی اطلاع‌رسانی خواهد شد.
                    </p>
                    <a  class="btn btn-lg px-5 mt-4" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" >ثبت نام قرعه کشی فراکوچ</a>
                    <div id="collapseExample1" class="mt-5 collapse" >
                        @include('registerLanding')
                    </div>
                    -->
                </div>
                <div class="col-12  border border-4 p-3 bg-success rounded">
                    <h2 class="">
                        زمان قرعه‌کشی
                    </h2>
                    <h5 class="mt-4 mb-4">
                        26 بهمن ماه 1400 ساعت 11 از طریق پیج اینستاگرام فراکوچ

                    <h2 style="font-weight: bolder">
                        برای شرکت در قرعه کشی حضور در لایو الزامی می باشد
                    </h2>
                </div>

            </div>

            <div class="col-md-3 col-12 mt-5">
                <div class="sticky rounded" >
                    <h4>                        میخوام تو این قرعه کشی شرکت کنم</h4>
                    <p>
                        کافیه چند تا کار ساده رو انجام بدی:
                    <p>
                        از اینجا شروع  کن  :

                    </p>
                    <form method="post" action="/landPage">
                        {{csrf_field()}}
                        <input type="hidden" value="سالگرد" name="resource" />
                        <input type="hidden" value="{{$introduced}}" name="introduced" />
                        <input class="form-control" type="text" name="tel" placeholder="تلفن همراه" required/>
                        <button class="btn px-5 mt-4"  type="submit">ثبت نام قرعه کشی فراکوچ <small>(ورود مجدد)</small></button>
                    </form>

                </div>
            </div>
        </div>

    </article>
@endsection

@section('footer')




    <script src="/js/animated-square-countdown/squareCountDownClock.js"></script>
    <script>
        const myClock = $('#app').squareCountDownClock({
        countdownDate: 'Dec 24, 2020 15:37:25',
        topColor: 'orange',
        bottomColor: null,
        innerLabelColor: '#fff'
        });
        myClock.startTimer();
    </script>
    <script>


</script>

@endsection
