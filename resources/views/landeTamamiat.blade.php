@extends('master.index')
@section('row1')
    <style>



        h1{
            font-size:28px;
            color:rgb(13 44 90);
            padding-bottom:10px;
            font-weight:700;
        }
        h2{
            font-size:24px;
            color:rgb(13 44 90);
            padding:18px 0 10px 0;
            font-weight:600;
        }
        .mad{
            background-color:#f7f7f7;
        }
        p, a, ol, li{
            text-align:justify;
            margin-top:10px;
            line-height: 2;
            font-size:16px;
        }
        .text-img{
            border:1px solid #ced4da;
        }
        .img{
            width:50%;
            height: 50%;
        }

        .swal-text
        {
            text-align: center;
            direction: rtl;
        }
        /* Small devices (320 px) */
        @media only screen and (max-width: 321px){
            .title{
                font-size:20px;
            }
            p, a,li{
                font-size:12px;
            }
            h2{
                font-size:16px;
            }

            #angizeshi,#vebinar,#time
            {
                font-size: 24px;
            }

        }

    </style>
    <div class="container mt-5" id="int">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div >
                    <img src="{{asset('/images/int.png')}}" target="_blank" class="img-fluid img-thumbnail " id="banner" />
                    <div class="text-center title mt-3">
                        <a href="#form" class="btn btn-success btn-block btn-lg mb-5 mt-5" style="font-size: 30px">فرم ثبت نام - کلیک کنید</a>
                        <h1>وبینار تمامیت</h1>
                    </div>
                    <p class="d-inline">
                        با مقوله « تمامیت » (integrity) چقدر آشنا هستید؟ آیا میدانید در حال حاضر، «تمامیت داشتن» ، یکی از مهمترین فاکتورهای سازمانهای بزرگ برای استخدام کارکنان است؟
                        <br/>
                        آیا میدانستید تمامیت ، در کنار منابع چهارگانه سازمانها، بعنوان یکی از مهمترین عوامل موفقیت یا عدم موفقیت سازمانها و برندهاست؟
                        <br/>
                    </p>
                    <p class="d-inline" style="font-size: 20px">آیا می‌دانستید،</p>
                    <p class="d-inline font-weight-bold" style="font-size: 20px"> مهمترین عامل برای ساختن پرسنال برند </p>
                    <p class="d-inline" style="font-size: 20px">( برند شخصی ) و حتی برند سازمانی،</p>
                    <p class="font-weight-bold d-inline" style="font-size: 20px">داشتن تمامیت</p>
                    <p class="d-inline" style="font-size: 20px">و به کارگیری دستورات «قانون تمامیت » است؟</p>
                </div>
                <div class="row col-12 mad">
                    <div class="p-5 mt-5 col-sm-12 col-md-8 col-lg-8 col-xl-8  text-justify">
                        <p>وارن بافت ، سرمایه گذار و کارآفرین امریکایی :</p>
                        <p>وقتی میخواهید فردی را استخدام کنید، به سه قابلیت اصلی او توجه کنید:<strong> تمامیت، هوشمندی، انرژی </strong>یادتان باشد که اگر اولی را نداشته باشد، دو مورد بعدی شما را خواهد کشت.
                        </p>
                    </div>
                    <div class="p-3  col-sm-12 col-md-4 col-lg-4 col-xl-4 text-justify ">
                        <img src="{{asset('/images/وارن-بافت.jpg')}}" target="_blank" class="img-fluid img-thumbnail border border-primary" />
                    </div>
                </div>
                <h2 class="text-center">
                    اما تمامیت چیست؟
                </h2>
                <p>تمامیت مفهومی از تمام و کمال بودن است. اتوموبیلی را فرض کنید که چرخ ندارد، این اتوموبیل هرگز کارکرد درستی نخواهد داشت. حتی جزئی تر از آن، اتوموبیلی را تصور کنید که یک برف پاک کن ساده را ندارد ، باز هم یک اتوموبیل تمام و کمال نخواهد بود و در شرایط بحرانی ممکن است باعث بروز خسارت های جدی به ما شود.                        <br/>
                </p>
                <div class="p-3 col-12">
                    <div class="row">
                        <div class=" feed col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div id="97454693371"><script type="text/JavaScript" src="https://www.aparat.com/embed/5JOI3?data[rnddiv]=97454693371&data[responsive]=yes"></script></div>
                        </div>
                        <div class=" feed col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div id="60738551128"><script type="text/JavaScript" src="https://www.aparat.com/embed/jdl9N?data[rnddiv]=60738551128&data[responsive]=yes"></script></div>
                        </div>
                        <div class=" feed col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div id="75923739805">
                                <script type="text/JavaScript" src="https://www.aparat.com/embed/5jvpk?data[rnddiv]=75923739805&data[responsive]=yes"></script>
                            </div>
                        </div>

                    </div>
                    <p>
                        تمامیت در انسانها هم تقریبا به همین شکل است. اگر ما یک فرد تمام و کمال نباشیم چگونه می‌توانیم اهدافمان را به درستی تدوین و اجرا کنیم؟ چگونه نزدیکان ما می‌توانند به ما اعتماد کنند؟ و اگر کسی به ما اعتماد نداشته باشد، چگونه می‌توانیم در ایجاد روابط اجتماعی و عاطفی موفق باشیم.
                        <br/><strong>
                            تمامیت یعنی صادقانه رفتار کردن، متعهد بودن در قبال مسئولیت‌ها، پذیرش خطای خود و جبران آن، احترام به دیگران و قابل‌اعتماد بودن. به‌طورکلی فردی که تمامیت دارد از انجام کاری که برخلاف ارزش‌های اخلاقی است، صرف‌نظر می‌کند؛ چون به خود و ارزش‌های خود وفادار و پایبند است.
                        </strong>
                    </p>
                    <div class="row col-12 mad">
                        <div class="p-5 mt-5  col-sm-12 col-md-8 col-lg-8 col-xl-8  text-justify">
                            <p>
                                پروفسور مایکل جنسن ، استاد ممتاز دانشگاه هاروارد پس از حدود یک دهه تحقیق و بررسی سازمانها و برندهای موفق و ناموفق، متوجه شد که اغلب شکست‌ها، حتی در سازمان‌هایی که بودجه های کلانی را صرف تبلیغات و برندسازی و حتی تجهیزات و فناوری کرده‌اند، نداشتن « تمامیت» بوده است.
                            </p>
                        </div>
                        <div class="p-3  col-sm-12 col-md-4 col-lg-4 col-xl-4 text-justify ">
                            <img src="{{asset('/images/jenson.png')}}" target="_blank" class="img-fluid img-thumbnail border border-primary" />
                        </div>
                    </div>
                    <p class="text-center font-weight-bold">
                        و موسسه فراکوچ با همکاری موسسه مدیران ایران با توجه به اهمیت شناخت و به‌کارگیری تمامیت در زندگی امروزی، بر آن شدند تا با برگزاری یک وبینار با محوریت موضوع تمامیت، به معرفی این ویژگی مهم و تأثیرگذار بپردازد.
                    </p>
                    <div class="col-12 mad pt-2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="{{asset('/images/logo_ravanshenasi.jpg')}}" class="img-fluid" />
                            </div>
                            <div class="p-3 col-12 text-justify">
                                <h2 class="text-left" >
                                    محوریت این وبینار چیست؟
                                </h2>
                                <p>
                                    در این وبینار بیشتر به مفهوم تمامیت و تحولی که در زندگی ایجاد خواهد کرد می‌پردازیم. با درک بهتر از تمامیت، بهتر می‌توانیم تمامیت را به زندگی شخصی آورده و حتی آن را به محیط کار ببریم و از مزایای آن استفاده کنیم. با پیشرفت علمی و درک عمیقی که افراد از زندگی باکیفیت به دست آورده‌اند، بحث تمامیت خود یک دانشگاه توسعه فردی محسوب می‌شود که به افزایش کیفیت روابط، افزایش اعتماد و احترام می‌انجامد.
                                </p>
                            </div>
                        </div>
                    </div >
                    <div class="feed col-12 text-center mt-3 mb-3">
                        <div id="91334936968" style="width: 400px" class="d-inline-block"><script type="text/JavaScript" src="https://www.aparat.com/embed/vnwCo?data[rnddiv]=91334936968&data[responsive]=yes"></script></div>
                    </div>
                    <div class="col-12">
                        <h2 class="text-center text-danger display-4" id="angizeshi">
                            این یک جمله انگیزشی و یا اغراق شده نیست:
                        </h2>
                        <h3 class="text-center display-5" id="vebinar">شرکت در این وبینار می‌تواند یک تغییر اساسی در زندگی شخصی و کاری شما ایجاد کند</h3>
                    </div>


                    <p  class="mt-3 text-center" >
                        شرکت در این وبینار برای هر فرد لازم است؛ چراکه:
                        <br/>
                        علاوه بر آشنایی با مفهوم تمامیت با کاربردهای آن در زندگی شخصی و کسب‌وکار خود نیز آشنا خواهید شد. اینکه چگونه افراد تمامیت را در فضای کسب‌وکار و زندگی خود پیاده‌سازی کنند. چگونه با تمامیت زندگی خود را تغییر دهند و تحولی عظیم اول در خود و کم‌کم پس‌ازآن، در اجتماع ایجاد کنند. در وبینار تمامیت به بررسی گام‌هایی خواهیم پرداخت که شما را به سمت داشتن تمامیت در زندگی سوق می‌دهند.
                    </p>
                    <div class="col-12">
                        <h2 class="text-center text-dark ">
                            پس اگر تصمیم دارید از همین امروز تمامیت  خود را نشان دهید، باید بگویم که
                            <br/>
                            <small>اولین گام آن ثبت‌نام در این وبینار و آشنایی با آن است.</small>
                        </h2>
                    </div>
                    <div class="col-12 m-4 text-danger">
                        <h2 class="text-center display-5">
                            تاریخ برگزاری این وبینار
                        </h2>
                        <p class="text-center display-4 " id="time">
                            پنج‌شنبه ۱ مهر ساعت ۱۷:۰۰
                        </p>
                    </div>
                    <div class="col-12 mad">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">
                                    مدرسین وبینار
                                </h2>
                                <p class="text-center">
                                    این وبینار با حضور سرکار خانم ندا مفاخری و استاد یاسر متحدین برگزار خواهد شد.
                                </p>
                            </div>
                            <div class="p-3 col-xs-12 col-md-6 col-xl-6 col-lg-6 text-center ">
                                <img src="{{asset('/images/neda.jpg')}}" target="_blank" class="img-fluid img-thumbnail border border-primary" />
                                <p class="text-center font-weight-bold">
                                     دکتر ندا مفاخری
                                </p>
                                <p class="text-justify">
                                     مدیرعامل مدیران ایران، مربی حرفه‌ای توسعه فردی و سازمانی ICF هستند. ایشان دارای مدرک DBA، نویسنده صدها مقاله و مطلب مدیریتی بوده و در این حوزه سخنران و مدرس هم می‌باشند. خانم دکتر مفاخری به مطالبی در مورد مفهوم تمامیت، تمامیت و تحول، تمامیت در زندگی شخصی و تمامیت در فضای کسب‌وکار خواهند پرداخت.
                                </p>
                            </div>
                            <div class="p-3 col-xs-12 col-md-6 col-xl-6 col-lg-6 text-center">
                                <img src="{{asset('/images/yaser.jpg')}}" target="_blank" class="img-fluid img-thumbnail border border-primary" />
                                <p class="text-center font-weight-bold">
                                    استاد یاسر متحدین
                                </p>
                                <p class="text-justify">
                                 مؤسس مرکز آموزش کوچینگ ایران، بنیان‌گذار بنیاد کوچ‌های حرفه‌ای ایران دارای مدرک دکترای حرفه‌ای مدیریت کسب‌وکار DBA، عضو فدراسیون بین‌المللی کوچینگ ICF و کوچ حرفه‌ای بین‌المللی PCC هستند. ایشان سرپرست هیئت‌علمی آموزشگاه فراکوچ و مدیر مرکز مشاوره و اطلاع‌رسانی کارآفرینی در خراسان رضوی بوده و سابقه بیش از 1000 نفر ساعت تجربه تدریس و اجرای کوچینگ برای افراد، مدیران و سازمان‌های خصوصی و دولتی دارند. آقای متحدین بیشتر در مورد کاربردهای تمامیت در زندگی برای ما خواهند گفت.                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="row col-12">
                        <div class="text p-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 " style="text-align:center;">
                        <!--<img src="{{asset('/images/ravanshenasi.jpg')}}" target="_blank" class="img-fluid img-thumbnail border border-primary"/>
    --> <p class="text-center text-primary display-5 font-weight-bold">پلتفرم برگزاری وبینار تمامیت</p>
                            <p class="text-justify"> این وبینار بی‌نظیر در فضای اسکای روم برگزار می‌شود که امکان حضور را پس از تکمیل ثبت‌نام و دریافت یوزر و پسورد از همکاران ما در بخش ثبت‌نام، خواهید داشت.</p>
                        </div>
                        <div class="text p-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 " style="text-align:center;">
                        <!--<img src="{{asset('/images/ravanshenasi.jpg')}}" target="_blank" class="img-fluid img-thumbnail border border-primary"/>
    --> <p class="text-center text-primary display-5 font-weight-bold">هزینه شرکت در وبینار</p>
                            <del class="text-justify font-weight-bold text-danger">ارزش سرمایه گزاری : 4.000.000</del>
                            <p class="text-center font-weight-bold display-4">رایگان</p>
                        </div>
                        <div class="text p-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 " style="text-align:center;">
                        <!--<img src="{{asset('/images/ravanshenasi.jpg')}}" target="_blank" class="img-fluid img-thumbnail border border-primary"/>
    --><p class="text-center text-primary display-5 font-weight-bold">مزایای شرکت در این وبینار</p>
                            <ol>
                                <li class="text-justify">درک مفهوم تمامیت و تلاش برای به‌کارگیری آن به‌منظور افزایش کیفیت زندگی</li>
                                <li class="text-justify">درک اهمیت تمامیت و نقش آن در زندگی اجتماعی امروزی</li>
                                <li class="text-justify">به‌کارگیری آن در تمامی جوانب زندگی و محل کار</li>
                                <li class="text-justify">متعهد شدن به آنچه می‌گوییم و باور داریم و...</li>
                            </ol>
                        </div>
                        <div class="text p-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 " style="text-align:center;">
                        <!--<img src="{{asset('/images/ravanshenasi.jpg')}}" target="_blank" class="img-fluid img-thumbnail"/>
    --><p class="text-center text-primary display-5 font-weight-bold">نحوه ثبت‌نام</p>
                            <p class="text-justify"> برای شرکت در این وبینار تمامیت تنها با درج موارد مورد نیاز در فرم زیر ثبت ‌نام خود را نهایی کنید و از این وبینار ارزشمند بهره‌مند شوید.</p>
                        </div>
                    </div>
                </div>
                <p class="text-center">
                    جهت رزرو وبینار تمامیت  فرم زیر را تکمیل نمائید.
                </p>
            </div>
        </div>

        <form method="POST" action="/landPage" class="mb-3" id="form">
            {{csrf_field()}}
            <input type="hidden" value="وبینار تمامیت" name="resource" />

            <div class="form-group row">
                <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('نام:*') }}</label>
                <div class="col-md-6">
                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" placeholder="به عنوان مثال: علیرضا" name="fname" value="{{ old('fname') }}" required  />

                    @error('fname')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوادگی:*') }}</label>
                <div class="col-md-6">
                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"  placeholder="به عنوان مثال: علیرضایی" name="lname" value="{{ old('lname') }}" required />
                    @error('lname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('پست الکترونیکی:*') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="به عنوان مثال: yaser@gmail.com" />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('تلفن همراه:*') }}</label>

                <div class="col-md-6">
                    <div class="input-group">
                        <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required placeholder="به عنوان مثال: 09151234567">
                        @error('tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>


            @if(!is_null($introduced))
                <input type="hidden" value="{{$introduced}}" name="introduced" />
            @else
                <div class="form-group row">
                    <label for="introduced" class="col-md-4 col-form-label text-md-right">{{ __('معرف:') }}</label>
                    <div class="col-md-6">
                        <input id="introduced" type="text" class="form-control @error('introduced') is-invalid @enderror" name="introduced" value="{{ old('introduced') }}"  placeholder="به عنوان مثال: 09151234567"  />
                        <small class="text-muted">لطفا شماره همراه معرف خود را وارد کنید</small>
                        @error('introduced')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
            @endif

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('تکمیل مرحله اول ثبت نام') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    </div>


@endsection

@section('footerScript')
    <script>

        window.location="#int";


        $(window).resize(function() {
            if ($(window).width() <= 425) {
                $("#banner").attr('src', "{{asset('/images/int2.jpg')}}");
            }
        });

        if (screen.width <= 425) {
            $("#banner").attr('src', "{{asset('/images/int2.jpg')}}");
        }
    </script>
@endsection
