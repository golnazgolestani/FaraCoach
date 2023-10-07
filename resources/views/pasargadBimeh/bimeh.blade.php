@extends('master.index')
@section('headerscript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .title{
            border-radius: 15px;
            background-color: #f1fbee;
            margin:0 0 10px 0;
            padding:10px;
        }

        class="cp-pen-styles">body{
                                 margin: 0;
                                 padding: 0;
                                 font-family: sans-serif;
                             }

        h1, h2, h3, h4, h5, h6{
            color:#0043a4;
        }

        a{
            text-decoration: none;
        }

        /* GRID */

        .grid { max-width: 1140px; width: 100%; margin: 0 auto; }

        .four {
            width: 32.26%;
        }

        /* COLUMNS */

        .col {
            display: block;
            float:left;
            margin: 1% 0 1% ;
        }

        .col:first-of-type { margin-left: 0; }

        /* CLEARFIX */

        .cf:before,
        .cf:after {
            content: " ";
            display: table;
        }

        .cf:after { clear: both; }
        .cf { *zoom: 1; }

        /* GENERAL STYLES FOR BOX AND OVERLAY */

        .box {
            display: block;
            width: 100%;
            height: 200px;
            overflow: hidden;
            background-color: #bbb;
            text-align: center;
            position: relative;
        }
        .box1 {
            height: 176px;

        }

        .overlay{
            width: 100%;
            height:100%;
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
        }

        /* SLIDE IN */

        .slide-in .overlay{
            background-color: #6addaa;
            line-height: 200px;
            color: #fff;
            transform: translateX(-100%);
            -webkit-transition: transform 0.5s ease-out;
            -o-transition: transform 0.5s ease-out;
            transition: transform 0.5s ease-out;
        }

        .slide-in .box:hover .overlay{
            /*transform: translateX(0);*/
        }

        /* SLIDE UP */

        .slide-up .overlay{
            background-color: #3dcbe8;
            line-height: 200px;
            color: #fff;
            transform: translateY(100%);
            -webkit-transition: transform 0.5s ease-out;
            -o-transition: transform 0.5s ease-out;
            transition: transform 0.5s ease-out;
        }

        .slide-up .box:hover .overlay{
            /*transform: translateY(0);*/
        }

        /* SLIDE DOWN DELAY */

        .slide-down-delay .overlay{
            background-color: #ee6f8c;
            line-height: 200px;
            color: #fff;
            transform: translateY(-100%);
            -webkit-transition: transform 0.5s ease-out;
            -o-transition: transform 0.5s ease-out;
            transition: transform 0.5s ease-out;
        }

        .slide-down-delay .box:hover .overlay{
            /*transform: translateY(0);*/
        }

        .slide-down-delay .overlay i{
            transform: translateY(-80%);
            opacity: 0;
            -webkit-transition: transform 0.5s linear, opacity 0.5s linear 0.5s;
            -o-transition: transform 0.5s linear, opacity 0.5s linear 0.5s;
            transition: transform 0.5s linear, opacity 0.5s linear 0.5s;
        }

        .slide-down-delay .box:hover .overlay i{
            transform: translateY(0);
            opacity: 1;
        }

        /* ROTATE */

        .rotate .overlay{
            background-color: #6d94bb;
            line-height: 200px;
            color: #fff;
            transform-origin: 0 0;
            transform: rotate(90deg);
            -webkit-transition: transform 0.5s ease-in-out;
            -o-transition: transform 0.5s ease-in-out;
            transition: transform 0.5s ease-in-out;
        }

        .rotate .box:hover .overlay{
            transform: rotate(0deg);
        }

        /* SCALE */

        .scale .overlay{
            background-color: #efcb5e;
            line-height: 200px;
            color: #fff;
            transform: translateX(210%) scale(3);
            -webkit-transition: transform 0.6s ease-in-out;
            -o-transition: transform 0.6s ease-in-out;
            transition: transform 0.6s ease-in-out;
        }

        .scale .box:hover .overlay{
            transform: translateX(0) scale(1);
        }

        /* FLIP */

        .flip .overlay{
            background-color: #009688;
            line-height: 200px;
            color: #fff;
            opacity: 0;
            transform: rotateY(180deg);
            -webkit-transition: transform 0.6s ease-in-out 0.3s, opacity 0.3s ease-in-out;
            -o-transition: transform 0.6s ease-in-out 0.3s, opacity 0.3s ease-in-out;
            transition: transform 0.6s ease-in-out 0.3s, opacity 0.3s ease-in-out;
        }

        .flip .box:hover .overlay{
            opacity: 1;
            transform: rotateY(0deg);
        }

        /* SKEW */

        .skew .overlay{
            background-color: #f44336;
            line-height: 200px;
            color: #fff;
            opacity: 0;
            transform: skewX(-10deg);
            -webkit-transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            -o-transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .skew .box:hover .overlay{
            transform: skewX(0deg);
            opacity: 1;
        }

        /* CORNER */

        .corner-bottom .overlay{
            background-color: #9c27b0;
            line-height: 200px;
            color: #fff;
            transform: translate(100%, 100%);
            -webkit-transition: transform 0.4s ease-in-out;
            -o-transition: transform 0.4s ease-in-out;
            transition: transform 0.4s ease-in-out;
        }

        .corner-bottom .box:hover .overlay{
            transform: translate(0, 0);
        }

        /* CORNER */

        .corner-top .overlay{
            background-color: #ff5722;
            line-height: 200px;
            color: #fff;
            transform: translate(-100%, -100%);
            -webkit-transition: transform 0.4s ease-in-out;
            -o-transition: transform 0.4s ease-in-out;
            transition: transform 0.4s ease-in-out;
        }

        .corner-top .box:hover .overlay{
            transform: translate(0, 0);
        }
    </style>
@endsection
@section('row1')
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <img src="{{asset('/images/بیمه-پاسارگاد--بنر.png')}}" alt="post img" class="img-fluid"/>
                <div class="title text-center mt-5">
                    <h2>بیمه عمر و تامین آتیه پاسارگاد</h2>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <img src="{{asset('/images/pexels-kindel-media-7688374---.jpg')}}" alt="post img" class="img-fluid">
            </div>
            <div class="col-md-8 mt-5">
                <p>
                    همه ما آرزو داریم در مقطعی از زندگی خود به آزادی مالی دست یابیم و شاید هر زمان به این موضوع فکر می‌کنیم. اکثر ما بر این باوریم که پس انداز برای ثبات مالی کافی است. اما، اگر از منظر عملی به زندگی نگاه کنید، متوجه می شوید که پس انداز به تنهایی برای دستیابی به آزادی مالی کافی نیست.
                </p>
                <p>
                    در همین راستا ما امروز برای شما یک راهکار خوب پیشنهاد می‌دهیم.
                </p>
                <p>
                    بیمه. بله بیمه. در واقع با بیمه کردن خود به طور قابل توجهی در هزینه‌ها ی جاری و پیش بینی نشده خود صرفه جویی  کرده‌اید و حتی ازنظر پس‌انداز هم در این مسیر قرار خواهید داشت.؛
                </p>
                <p>
                    در میان بیمه‌های مختلف، بیمه پاسارگادکه بصورت تخصصی در حوزه بیمه عمر فعالیت میکند بین جامعه و مشتریان خود از اعتبار ویژه‌ای برخوردار بوده و رضایتمندی بیشتری را نسبت به دیگر بیمه‌ها در این حوزه داشته است.
                </p>
                <p>
                    به همین دلیل فراکوچ در اقدامی فوق‌العاده و خاص، فرصتی را برای اعضای باشگاه مشتریان خود فراهم کرد تا بتوانند از این بیمه و مزایای آن بهر‌مند شوند.
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 mt-5">
                <div class="title text-center">
                    <p>شعارما در بیمه عمر پاسارگاد این است که:<p>
                    <h3> « بهترین بیمه عمر بیمه ای است که با توجه به نیازهای شما تنظیم شده باشد.» </h3>
                </div>
            </div>
            <div class="col-md-12 mt-5 text-center">
                <h3> بیمه عمر پاسارگاد چگونه بیمه‌ای است؟ </h3>
                <p>
                    بیمه عمر پاسارگاد تلفیقی از بیمه نامه های عمر به شرط حیات و بیمه نامه های عمر به شرط فوت می باشد. هر فردی که بیمه عمر پاسارگاد را انتخاب می‌کند می‌تواند با پرداخت حق بیمه با توجه به توان مالی خودش از تمام پوشش های این بیمه استفاده کند    .
                </p>
            </div>
        </div>
        <!-------------------- TARIF-PIC -------------------------------->
        <div class="grid">
            <div class="row cf">
                <div class="slide-in four col">
                    <div class="box box1">
                    <span class="original">
                        <img src="{{asset('/images/pexels-mikhail-nilov-8297362--.jpg')}}" class="img-fluid"/>
                    </span>
                        <div class="overlay">
                            <i class="bi bi-credit-card-2-back fa-3x" aria-hidden="true">
                            </i>
                        </div>
                    </div>
                </div>
                <div class="slide-up four col">
                    <div class="box box1">
                    <span class="original">
                        <img src="{{asset('/images/pexels-pixabay-268941--.jpg')}}" class="img-fluid"/>
                    </span>
                        <div class="overlay">
                            <i class="bi bi-emoji-smile fa-3x" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------- TARIF COLLAPS -------------------------------->
        <div class="row">
            <div class="col-md-6" id="One" >
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                پوشش های مالی
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#collapseTwo">
                        <div class="card-body">
                            <p class=" text-justify mt-4">
                                یکی از مواردی که اعضای باشگاه مشتریان فراکوچ باید بدانند این است که در بیمه عمر پاسارگاد سرمایه گذاری در طول مدت بیمه نامه شکل می‌گیرد و می‌تواند به صورت پشتوانه مالی و اقتصادی برای بیمه شده در صورت حیات و حتی ذینفعان بیمه نامه در صورت فوت بیمه شده باشند.
                            </p>
                            <ul>
                                <li>
                                    سود تضمینی از بیمه مرکزی
                                </li>
                                <li>
                                    سود مشارکت در منافع از بیمه پاسارگاد
                                </li>
                                <li>
                                    معافیت ‌مالیاتی
                                </li>
                                <li>
                                    دریافت وام بدون ضامن و چک و سفته
                                </li>
                                <li>
                                    دریافت مستمری و بازنشستگی
                                </li>
                                <li>
                                    پوشش آتش سوزی منزل مسکونی همراه با زلزله تا پایان قرارداد
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                پوشش های درمانی
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#collapseOne">
                        <div class="card-body">
                            <p class=" text-justify mt-4">
                                با توجه به هزینه‌های زیاد خدمات بیمارستانی و به منظور جبران این هزینه ها بیمه عمر پاسارگاد به اعضای باشگاه فراکوچ پوشش های درمانی خود را به صورت کاربردی ارائه می دهد.
                            </p>
                            <ul>
                                <li class="mt-4 mb-3">  غرامت بیماری های خاص
                                    <ul>
                                        <li>
                                            سکته قلبی
                                        </li>
                                        <li>
                                            سکته مغزی
                                        </li>
                                        <li>
                                            جراحی عروق قلب
                                        </li>
                                        <li>
                                            انواع سرطان ها
                                        </li>
                                        <li>
                                            پیوند اعضای اصلی بدن
                                        </li>
                                    </ul>
                                </li>
                                <li class="mt-4 mb-3">
                                    پوشش از کار افتادگی
                                    <ul>
                                        <li>
                                            معافیت از پرداخت حق بیمه تا پایان قرارداد در صورت از کار افتادگی کلی
                                        </li>
                                        <li>
                                            پرداخت غرامت ازکارافتادگی
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    پرداخت هزینه‌های پزشکی بر اثر حادثه
                                </li>
                                <li>
                                    پرداخت دیه نقص عضو بر اثر حادثه
                                </li>
                                <li>
                                    پرداخت دیه فوت طبیعی بیمه شده طبق جداول محاسباتی
                                </li>
                                <li>
                                    پرداخت دیه فوت حادثه بیمه شده طبق جداول محاسباتی
                                </li>
                                <li>
                                    بیمه تکمیل درمان انفرادی رایگان توسط شرکت (sos) جهت هزینه های بستری در بیمارستان
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------- GRADE -------------------------------->
        <div class="grid">
            <div class="row cf">
                <div class="slide-in four col">
                    <div class="box">
					<span class="original">
                        <img src="{{asset('/images/bimari.jpg')}}" class="img-fluid"/>
					</span>
                        <div class="overlay">
                            <i class="fa fa-hospital fa-3x" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="slide-up four col">
                    <div class="box">
					<span class="original">
                        <img src="{{asset('/images/az-kar-oftadegi.jpg')}}" class="img-fluid"/>
					</span>
                        <div class="overlay">
                            <i class="fa fa-hospital fa-3x" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="slide-down-delay four col">
                    <div class="box">
					<span class="original">
                        <img src="{{asset('/images/kar-hadese.jpg')}}" class="img-fluid"/>
					</span>
                        <div class="overlay">
                            <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------- FORM -------------------------------->
        <!--   <form>
               <div class="row ">
                   <p> فرم پیش ثبت نام </p>
               </div>
               <div class="form-row">
                   <div class="col-md-4 mt-3">
                       <input type="text" class="form-control is-valid" id="validationServer01" placeholder="نام" required>
                   </div>
                   <div class="col-md-4 mt-3">
                       <input type="text" class="form-control is-valid" id="validationServer02"  placeholder="نام خانوادگی" required>
                   </div>
                   <div class="col-md-4 mt-3 ">
                       <button class="btn btn-primary btn-block" type="submit">ذخیره </button>
                   </div>
               </div>
           </form> -->
        <!-------------------- CALL -------------------------------->
        <div class="row mt-5 ">
            <h4 class="font-weight-bold text-center"> آیا مشاوره قبل از تکمیل فرم امکان‌پذیر است؟ </h4>
            <p>از آنجایی که رویکرد نمایندگی جنرال 8057بیمه پاسارگاد و باشگاه مشتریان فراکوچ، مبتنی بر ارائه مشاوره تخصصی است، می توانید جهت مشاوره و خرید بیمه عمر پاسارگاد، از طریق تکمیل فرم موجود و یا تماس شماره تلفن ۰۹۱۵1015130 و 09387368699 مدیر ارشد نمایندگی آقای مهدی دهقان پور مشاور تخصصی دریافت نمایید. </p>
            <p>  طبق قرارداد همکاری بین نمایندگی ۸۰۵۷ بیمه پاسارگاد و باشگاه مشتریان فراکوچ ۲۰% تخفیف جهت صدور بیمه نامه های عمر پاسارگاد در نظر گرفته شده است که شما می توانید برای خود خانواده یا دوستان خود اقدام نمایید.</p>
        </div>

    </div>
    <script src='https://use.fontawesome.com/f56e4513c5.js'></script>

@endsection
