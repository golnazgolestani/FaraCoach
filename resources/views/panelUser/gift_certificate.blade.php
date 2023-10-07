@extends('panelUser.master.index')
@section('headerScript')
    <style>
        p,#suggest li{
            font-size: 18px;
            line-height: 2;
            text-align: justify;
        }

        #suggest ol{
            list-style-type: none;
        }

        #suggest li
        {
            list-style-position: inside;
            border: 2px solid #d0d0d0;
            padding: 10px;
            border-radius: 50px;
            margin-bottom: 10px;
        }

        #suggest li > span
        {
            width: 40px;
            height: 40px;
            display: inline-block;
            border-radius: 50%;
            background-color: #eac600;
            font-size: 18px;
            text-align: center;
        }

        #suggest input[type='text']
        {
            width: 80%;
            border:none;
        }

        #suggest input[type='text']:focus
        {
            outline: none;

        }

        .custom-select
        {
            width: auto !important;
        }
    </style>
@endsection
@section('rowcontent')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="text-center">ثبت درخواست دریافت گواهینامه ACSTH</h1>
                <p>فراکوچی عزیز</p>
                <p>سلام</p>
                <p>از اینکه همراه ما هستید بسیار خرسندیم. تلاش فراکوچ همیشه بر این بوده تا در کنار آموزش استاندارد مهارت کوچینگ، در مسیر آموزش و توسعه فرهنگی جامعه هم در حد توان خود گام بردارد.</p>
                <p>امروز که فدراسیون بین‌المللی کوچینگ مهر تأیید خود را بر ساختار و محتوای آموزشی فراکوچ زده و تأییدیه ACSTH را به این موسسه اعطا کرده، فرصت را مغتنم می‌شماریم و برای جذب مشارکت حداکثری در انجام مسئولیت‌های اجتماعی، از همه شما عزیزان یاری می‌طلبیم.</p>
                <p>تصمیم داریم به جای دریافت هزینه مالی برای اهدای گواهینامه بین‌المللی به دانش‌پذیران دوره های گذشته، مشارکتشان را در فعالیت های اجتماعی با محوریت کوچینگ و توسعه فردی جلب نماییم.</p>
                <p>دریافت این گواهینامه برای دانشپذیران دوره‌های آینده مشمول هزینه مضاعف نسبت به هزینه اصلی دوره است اما برای دانش‌پذیران دوره های گذشته، منوط به همکاری در انجام مسئولیت‌های اجتماعی، امکان‌پذیر است.</p>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 text-center">
                <img src="{{asset('/images/icf_certificate.jpg')}}" class="img-fluid d-block" />
                <cite>نمونه مدرک ICF</cite>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 text-center ">
                <img src="{{asset('/images/icf_logo.png')}}" class="img-fluid align-baseline " />
            </div>
            <div class="col-12 mb-3 mt-3">
                <p>لیست موارد پیشنهادی موسسه، برای مشارکت در انجام مسئولیت های اجتماعی ، به شرح ذیل تدوین شده است که شما می‌توانید موارد مورد نظر خود را انتخاب کنید. </p></ح>
                <p>همچنین فعالیت مورد نظر خود را میتوانید در باکس آخر درج نمائید تا در لیست نهایی اضافه شود.</p>
                <p>و طی هفته های آینده عنواین نهایی بهمراه امتیازات هر فعالیت، در همین صفحه درج میشود و شما قادر به انتخاب و انجام فعالیت مورد نظر خواهید بود.</p>
            </div>
            <form method="POST" action="">
                {{csrf_field()}}
                <div class="col-12 mb-5" id="suggest">
                    <ol>
                        <li>
                            <span>1</span>
                            نگارش مقالات علمی در حوزه کوچینگ (موضوع مقاله باید به تائید دبیرخانه برسد)
                        </li>
                        <li>
                            <span>2</span>
                            آشنا کردن 3 نفر با مقوله کوچینگ از طریق برگزاری جلسه کوچینگ
                        </li>
                        <li>
                            <span>3</span>
                            تولید محتوا برای انتشار در فضای مجازی با هدف آشنایی مخاطبان با کوچینگ
                        </li>
                        <li>
                            <span>4</span>
                            معرفی مستقیم 2 نفر برای شرکت در دوره آموزش و تربیت کوچ سطح یک
                        </li>
                    </ol>
                    <p class="font-weight-bold">پیشنهاد شما:</p>
                    <ol>
                        <li>
                            <span>5</span>
                            <input type="text"  id="suggest_text" name="suggest" placeholder="پیشنهاد شما">
                        </li>
                    </ol>
                </div>
                <div class="col-12">
                    <p>اینجانب {{Auth::user()->fname." ".Auth::user()->lname}}
                        دانشپذیر دوره
                        <select class="custom-select" name="options">
                            <option selected disabled>انتخاب دوره</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        تقاضای حضور در این رویداد و مشارکت در مسئولیت های اجتماعی خانواده فراکوچ را دارم.
                    </p>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="options" name="options" value="شرکت در دورهمی" />
                        <label class="custom-control-label" for="options">آمادگی خود را برای شرکت در دورهمی مشهد اعلام می نمایم.</label>
                    </div>
                    <input type="submit" class="btn btn-success btn-lg float-left" value="ثبت درخواست و ارسال پیشنهاد" />
                </div>
            </form>

        </div>
    </div>
@endsection
