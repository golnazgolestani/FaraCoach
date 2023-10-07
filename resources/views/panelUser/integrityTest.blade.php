@extends('panelUser.master.index')
@section('headerScript')
    <link src="{{asset('/css/jquery-book.css')}}"></link>
    <style>
        #fff{
            border: 2px solid rgba(2,1,19,.81);
            border-radius:20px;
        }
        .progress {position:relative;
        }

        .progress span {
            position:absolute;
            left:0;
            width:100%;
            text-align:center;
            z-index:2;
            font-weigh:bold;
        }

        .progress{
            height: 25px;
            background: #262626;
            padding: 5px;
            overflow: visible;
            border-radius: 20px;
            border-top: 1px solid #000;
            border-bottom: 1px solid #7992a8;
            margin-top: 50px;
        }

        .progress .progress-bar{
            border-radius: 20px;
            position: relative;
            animation: animate-positive 2s;
        }

        .progress .progress-value{
            display: block;
            padding: 3px 7px;
            font-size: 13px;
            color: #fff;
            border-radius: 4px;
            background: #191919;
            border: 1px solid #000;
            position: absolute;
            top: -40px;
            right: -10px;
        }

        .progress .progress-value:after{
            content: "";
            border-top: 10px solid #191919;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            position: absolute;
            bottom: -6px;
            left: 26%;
        }

        .progress-bar.active{
            animation: reverse progress-bar-stripes 0.40s linear infinite, animate-positive 2s;
        }

        @-webkit-keyframes animate-positive{
            0% { width: 0; }
        }

        @keyframes animate-positive{
            0% { width: 0; }
        }
    </style>

@endsection
@section ('rowcontent')
    <div class="container pb-4 mt-5">
        <div class="col-12 text-justify">
            <p >سلام ، تست پیش رو شامل 65 سوال است که به منظور بررسی میزان « تمامیت » شما در حوزه های مختلف: مالی ، مسائل شخصی ، تعهدات ، روابط اجتماعی ، سلامتی و بهداشت ، عرف و قوانین جامعه تدارک دیده شده است.</p>
            <p>لطفا این تست را یکبار قبل از برگزاری وبینار و یکبار دیگر حدود یک ماه بعد از برگزاری وبینار و آشنایی شما با تمامیت ، مجددا انجام داده و اثرات به کار بستن قانون تمامیت را در زندگی و کسب و کار خود مشاهده نمائید</p>
        </div>
    </div>
    <div class="container pb-4 mt-5 " id="fff">
        <div class=" d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  progress">
                <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 0%;">
                    <div class="progress-value">0%</div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <div class=" col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form name="demo" id="demo" method="POST" action="/panel/integrityTest" class="myBook mt-4">
                    {{csrf_field()}}
                    <!--
                    <section>
                        <label for="fname">نام:</label><br>
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="علی" required><br>
                        <label for="lname">نام خانوادگی:</label><br>
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="محمدی" required><br>
                        <div class="form-group">
                            <label for="tel">تلفن همراه</label>
                            <input type="number" class="form-control" id="tel"  name="tel" placeholder="به عنوان مثال: 09151234567"  required/>
                        </div>
                        <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                    </section>
                    -->
                    <section >
                        <p>1- اتفاق می افتد که خط تلفن یا موبایلم یک طرفه می شود و یا اخطار قطع دریافت می کنم</p>
                        <input class="page-next" type="radio" id="vehicle1_5" name="vehicle1" value="1" required />
                        <label for="vehicle1_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle1_4" name="vehicle1" value="2" required />
                        <label for="vehicle1_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle1_3" name="vehicle1" value="3" required />
                        <label for="vehicle1_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle1_2" name="vehicle1" value="4" required />
                        <label for="vehicle1_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle1_1" name="vehicle1" value="5" required />
                        <label for="vehicle1_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>2- وقتی نتواسته باشم، قولی که داده ام را به انجام برسانم، از روبرو شدن و یا تماس با طرف حذر می کنم
                        </p>
                        <input class="page-next" type="radio" id="vehicle2_5" name="vehicle2" value="1" required>
                        <label for="vehicle2_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle2_4" name="vehicle2" value="2" required>
                        <label for="vehicle2_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle2_3" name="vehicle2" value="3" required>
                        <label for="vehicle2_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle2_2" name="vehicle2" value="4" required>
                        <label for="vehicle2_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle2_1" name="vehicle2" value="5" required>
                        <label for="vehicle2_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>3- وقتی با دیگران مشکل پیدا می کنم، برایم سخت است رو در رو مساله را حل کنم و به دنبال واسطه می گردم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle3_5" name="vehicle3" value="1" required>
                        <label for="vehicle3_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle3_4" name="vehicle3" value="2" required>
                        <label for="vehicle3_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle3_3" name="vehicle3" value="3" required>
                        <label for="vehicle3_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle3_2" name="vehicle3" value="4" required>
                        <label for="vehicle3_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle3_1" name="vehicle3" value="5" required>
                        <label for="vehicle3_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>4- همیشه دلم می خواسته است که ورزش را توی برنامه کاریم بگذارم ولی نتوانستم
                        </p>
                        <input class="page-next"  type="radio" id="vehicle4_5" name="vehicle4" value="1" required>
                        <label for="vehicle4_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle4_4" name="vehicle4" value="2" required>
                        <label for="vehicle4_4">موافقم </label><br>
                        <input class="page-next"  type="radio" id="vehicle4_3" name="vehicle4" value="3" required>
                        <label for="vehicle4_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle4_2" name="vehicle4" value="4" required>
                        <label for="vehicle4_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle4_1" name="vehicle4" value="5" required>
                        <label for="vehicle4_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>5- وقتی از من خواسته می شود کاری را انجام دهم که حوصله اش را ندارم، ترجیح می دهم به جای اینکه آن را رد کنم، به انجام آن تظاهر کنم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle5_5" name="vehicle5" value="1" required>
                        <label for="vehicle5_5"> کاملا موافقم</label><br>
                        <input  class="page-next" type="radio" id="vehicle5_4" name="vehicle5" value="2" required>
                        <label for="vehicle5_4">موافقم </label><br>
                        <input class="page-next"  type="radio" id="vehicle3" name="vehicle5" value="3" required>
                        <label for="vehicle3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle1" name="vehicle5" value="4" required>
                        <label for="vehicle1"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle2" name="vehicle5" value="5" required>
                        <label for="vehicle2"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>6- در اولین فرصتی که بتوانم از خیابان عبور کنم، عرض خیابان را طی می کنم و توجهی به چراغ، پل عابر پیاده و یا خط کشی را ندارم</p>
                            <input class="page-next"  type="radio" id="vehicle6_5" name="vehicle6" value="1" required>
                            <label for="vehicle6_5"> کاملا موافقم</label><br>
                            <input class="page-next"  type="radio" id="vehicle6_4" name="vehicle6" value="2" required>
                            <label for="vehicle6_4">موافقم </label><br>
                            <input class="page-next"  type="radio" id="vehicle6_3" name="vehicle6" value="3" required>
                            <label for="vehicle6_3"> نه موافق و نه مخالف</label><br/>
                            <input class="page-next"  type="radio" id="vehicle6_2" name="vehicle6" value="4" required>
                            <label for="vehicle6_2"> مخالفم</label><br>
                            <input class="page-next"  type="radio" id="vehicle6_1" name="vehicle6" value="5" required>
                            <label for="vehicle6_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>7- ترجیح می دهم با کسانی که از ایشان پول قرض گرفتم، روبرو نشوم
                        </p>
                        <input class="page-next"  type="radio" id="vehicle7_5" name="vehicle7" value="1" required>
                        <label for="vehicle7_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle7_4" name="vehicle7" value="2" required>
                        <label for="vehicle7_4">موافقم </label><br>
                        <input  class="page-next" type="radio" id="vehicle7_3" name="vehicle7" value="3" required>
                        <label for="vehicle7_3"> نه موافق و نه مخالف</label><br/>
                        <input  class="page-next" type="radio" id="vehicle7_2" name="vehicle7" value="4" required>
                        <label for="vehicle7_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle7_1" name="vehicle7" value="5" required>
                        <label for="vehicle7_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>8- بخشی از وقتم را صرف پیدا کردن چیزهای گم شده می کنم
                        </p>
                        <input  class="page-next" type="radio" id="vehicle8_5" name="vehicle8" value="1" required>
                        <label for="vehicle8_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle8_4" name="vehicle8" value="2" required>
                        <label for="vehicle8_4">موافقم </label><br>
                        <input  class="page-next" type="radio" id="vehicle8_3" name="vehicle8" value="3" required>
                        <label for="vehicle8_3"> نه موافق و نه مخالف</label><br/>
                        <input  class="page-next" type="radio" id="vehicle8_2" name="vehicle8" value="4" required>
                        <label for="vehicle8_2"> مخالفم</label><br>
                        <input  class="page-next" type="radio" id="vehicle8_1" name="vehicle8" value="5" required>
                        <label for="vehicle8_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>9- وقتی با کسی یا موضوعی موافق نیستم، چون حوصله درگیری ندارم، ترجیح می دهم مخالفت و ناراحتی خود را نشان ندهم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle9_5" name="vehicle9" value="1" required>
                        <label for="vehicle9_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle9_4" name="vehicle9" value="2" required>
                        <label for="vehicle9_4">موافقم </label><br>
                        <input class="page-next"  type="radio" id="vehicle9_3" name="vehicle9" value="3" required>
                        <label for="vehicle9_3"> نه موافق و نه مخالف</label><br/>
                        <input  class="page-next" type="radio" id="vehicle9_2" name="vehicle9" value="4" required>
                        <label for="vehicle9_2"> مخالفم</label><br>
                        <input  class="page-next" type="radio" id="vehicle9_1" name="vehicle9" value="5" required>
                        <label for="vehicle9_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>10- رئیسم نمی داند گاهی در محل کار، کارهای شخصی خود را انجام می دهم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle10_5" name="vehicle10" value="1" required>
                        <label for="vehicle10_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle10_4" name="vehicle10" value="2" required>
                        <label for="vehicle10_4">موافقم </label><br>
                        <input class="page-next"  type="radio" id="vehicle10_3" name="vehicle10" value="3" required>
                        <label for="vehicle10_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle10_2" name="vehicle10" value="4" required>
                        <label for="vehicle10_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle10_1" name="vehicle10" value="5" required>
                        <label for="vehicle10_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>11- مبعضی وقتها برای اینکه زودتر برسم چاره ای ندارم که قوانین راهنمائی رانندگی را ندیده بگیرم</p>
                            <input class="page-next"  type="radio" id="vehicle11_5" name="vehicle11" value="1" required>
                            <label for="vehicle11_5"> کاملا موافقم</label><br>
                            <input class="page-next"  type="radio" id="vehicle11_4" name="vehicle11" value="2" required>
                            <label for="vehicle11_4">موافقم </label><br>
                            <input class="page-next"  type="radio" id="vehicle11_3" name="vehicle11" value="3" required>
                            <label for="vehicle11_3"> نه موافق و نه مخالف</label><br/>
                            <input  class="page-next" type="radio" id="vehicle11_2" name="vehicle11" value="4" required>
                            <label for="vehicle11_2"> مخالفم</label><br>
                            <input  class="page-next" type="radio" id="vehicle11_1" name="vehicle11" value="5" required>
                            <label for="vehicle11_1"> به شدت مخالفم</label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                            </div>
                    </section>
                    <section >
                        <p>12- اگر تردید داشته باشم که مبلغ محاسبه شده توسط فروشنده درست است، برایم سخت است که از او بخواهم که مجددا محاسبه کند
                        </p>
                        <input class="page-next"  type="radio" id="vehicle12_5" name="vehicle12" value="1" required>
                        <label for="vehicle12_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle12_4" name="vehicle12" value="2"required >
                        <label for="vehicle12_4">موافقم </label><br>
                        <input class="page-next"  type="radio" id="vehicle12_3" name="vehicle12" value="3"required >
                        <label for="vehicle12_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle12_2" name="vehicle12" value="4" required>
                        <label for="vehicle12_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle12_1" name="vehicle12" value="5" required>
                        <label for="vehicle12_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>13- اگر پارتی داشته باشم تا کارم جلو بیاندازد، حتما از آن استفاده می کنم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle13_5" name="vehicle13" value="1" required >
                        <label for="vehicle13_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle13_4" name="vehicle13" value="2" required >
                        <label for="vehicle13_4">موافقم </label><br>
                        <input  class="page-next" type="radio" id="vehicle13_3" name="vehicle13" value="3" required >
                        <label for="vehicle13_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle13_2" name="vehicle13" value="4" required >
                        <label for="vehicle13_2"> مخالفم</label><br>
                        <input  class="page-next" type="radio" id="vehicle13_1" name="vehicle13" value="5" required >
                        <label for="vehicle13_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>14- اگر در جلسه ای شرکت کنم و موضوع آن را دوست نداشته باشم، علیرغم میلم، آن را تا آخر تحمل می کنم و حرفی نمی زنم
                        </p>
                        <input  class="page-next" type="radio" id="vehicle14_5" name="vehicle14" value="1" required >
                        <label for="vehicle14_5"> کاملا موافقم</label><br>
                        <input  class="page-next" type="radio" id="vehicle14_4" name="vehicle14" value="2" required >
                        <label for="vehicle14_4">موافقم </label><br>
                        <input class="page-next"  type="radio" id="vehicle14_3" name="vehicle14" value="3" required>
                        <label for="vehicle14_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle14_2" name="vehicle14" value="4" required >
                        <label for="vehicle14_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle14_1" name="vehicle14" value="5" required >
                        <label for="vehicle14_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>15- بعضی وقتها احساس درد پراکنده ای دارم ولی فرصت نمی کنم دکتر بروم
                        </p>
                        <input class="page-next"  type="radio" id="vehicle15_5" name="vehicle15" value="1" required >
                        <label for="vehicle15_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle15_4" name="vehicle15" value="2" required>
                        <label for="vehicle15_4">موافقم </label><br>
                        <input class="page-next"  type="radio" id="vehicle15_3" name="vehicle15" value="3" required>
                        <label for="vehicle15_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle15_2" name="vehicle15" value="4" required>
                        <label for="vehicle15_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle15_1" name="vehicle15" value="5" required>
                        <label for="vehicle15_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>16- در جلسه یا کلاس، برایم مشکل است سوالم را بپرسم یا در بحث شرکت کنم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle16_5" name="vehicle16" value="1" required>
                        <label for="vehicle16_5"> کاملا موافقم</label><br>
                        <input class="page-next"  type="radio" id="vehicle16_4" name="vehicle16" value="2" required>
                        <label for="vehicle16_4">موافقم </label><br>
                        <input  class="page-next" type="radio" id="vehicle16_3" name="vehicle16" value="3" required>
                        <label for="vehicle16_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle16_2" name="vehicle16" value="4" required>
                        <label for="vehicle16_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle16_1" name="vehicle16" value="5" required>
                        <label for="vehicle16_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>17- همیشه برای تاخیرهای خودم یک دلیلی پیدا می کنم
                        </p>
                        <input  class="page-next" type="radio" id="vehicle17_5" name="vehicle17" value="1" required>
                        <label for="vehicle17_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle17_4" name="vehicle17" value="2" required>
                        <label for="vehicle17_4">موافقم </label><br>
                        <input  class="page-next" type="radio" id="vehicle17_3" name="vehicle17" value="3" required>
                        <label for="vehicle17_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle17_2" name="vehicle17" value="4" required>
                        <label for="vehicle17_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle17_1" name="vehicle17" value="5" required>
                        <label for="vehicle17_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>18- اتفاق افتاده که من چیزی را لازم داشته ام ولی موقع استفاده فهمیدم که قبلا فراموش کرده ام آنرا تهیه یا آماده کنم
                        </p>
                        <input class="page-next" type="radio" id="vehicle18_5" name="vehicle18" value="1" required>
                        <label for="vehicle18_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle18_4" name="vehicle18" value="2" required>
                        <label for="vehicle18_4">موافقم </label><br>
                        <input class="page-next"  type="radio" id="vehicle18_3" name="vehicle18" value="3" required>
                        <label for="vehicle18_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"  type="radio" id="vehicle18_2" name="vehicle18" value="4" required>
                        <label for="vehicle18_2"> مخالفم</label><br>
                        <input class="page-next"  type="radio" id="vehicle18_1" name="vehicle18" value="5" required>
                        <label for="vehicle18_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>19- «نه» گفتن برایم سخت است و به این خاطر خود را دچار سختی و گرفتاری می کنم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle19_5" name="vehicle19" value="1" required>
                        <label for="vehicle19_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle19_4" name="vehicle19" value="2" required>
                        <label for="vehicle19_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle19_3" name="vehicle19" value="3" required>
                        <label for="vehicle19_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle19_2" name="vehicle19" value="4" required>
                        <label for="vehicle19_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle19_1" name="vehicle19" value="5" required>
                        <label for="vehicle19_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>20- همیشه دنبال فرصتی میگردم که بتوانم وزنم را کاهش دهم
                        </p>
                        <input class="page-next" type="radio" id="vehicle20_5" name="vehicle20" value="1" required>
                        <label for="vehicle20_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle20_4" name="vehicle20" value="2" required>
                        <label for="vehicle20_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle20_3" name="vehicle20" value="3" required>
                        <label for="vehicle20_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle20_2" name="vehicle20" value="4" required>
                        <label for="vehicle20_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle20_1" name="vehicle20" value="5" required>
                        <label for="vehicle20_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>21- فکرم درگیر کارهای عقب افتاده ای است که روی هم جمع شده است
                        </p>
                        <input class="page-next" type="radio" id="vehicle21_5" name="vehicle21" value="1" required>
                        <label for="vehicle21_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle21_4" name="vehicle21" value="2" required>
                        <label for="vehicle21_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle21_3" name="vehicle21" value="3" required>
                        <label for="vehicle21_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle21_2" name="vehicle21" value="4" required>
                        <label for="vehicle21_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle21_1" name="vehicle21" value="5" required>
                        <label for="vehicle21_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>22- اگر بدانم هنگام رانندگی پلیس یا دوربین های کنترل ترافیک وجود ندارد، خود را مجبور به پیروی از قوانین راهنمایی و رانندگی نمی دانم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle22_5" name="vehicle22" value="1" required>
                        <label for="vehicle22_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle22_4" name="vehicle22" value="2" required>
                        <label for="vehicle22_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle22_3" name="vehicle22" value="3" required>
                        <label for="vehicle22_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle22_2" name="vehicle22" value="4" required>
                        <label for="vehicle22_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle22_1" name="vehicle22" value="5" required>
                        <label for="vehicle22_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>23- وقتی برای کسی تعهد مالی می سپارم، راحت نمی توانم از وام گیرنده تعهدات متناسب بگیرم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle23_5" name="vehicle23" value="1" required>
                        <label for="vehicle23_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle23_4" name="vehicle23" value="2" required>
                        <label for="vehicle23_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle23_3" name="vehicle23" value="3" required>
                        <label for="vehicle23_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle23_2" name="vehicle23" value="4" required>
                        <label for="vehicle23_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle23_1" name="vehicle23" value="5" required>
                        <label for="vehicle23_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>24- در مسافرت هایم، نبردن وسایل ضروری برایم مشکل آفرین بوده است.
                        </p>
                        <input class="page-next" type="radio" id="vehicle24_5" name="vehicle24" value="1" required>
                        <label for="vehicle24_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle24_4" name="vehicle24" value="2" required>
                        <label for="vehicle24_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle24_3" name="vehicle24" value="3" required>
                        <label for="vehicle24_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle24_2" name="vehicle24" value="4" required>
                        <label for="vehicle24_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle24_1" name="vehicle24" value="5" required>
                        <label for="vehicle24_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>25- پیش آمده در مورد دیگران حرفهائی زده ام که بعدا فهمیدم درست نبوده اند و من برای جبران آن نیز کاری نکرده ام
                        </p>
                        <input class="page-next" type="radio" id="vehicle25_5" name="vehicle25" value="1" required>
                        <label for="vehicle25_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle25_4" name="vehicle25" value="2" required>
                        <label for="vehicle25_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle25_3" name="vehicle25" value="3" required>
                        <label for="vehicle25_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle25_2" name="vehicle25" value="4" required>
                        <label for="vehicle25_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle25_1" name="vehicle25" value="5" required>
                        <label for="vehicle25_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>26- بعضی وقتها به خاطر اینکه وسط حرف دیگران می پرم، از دستم ناراحت می شوند
                        </p>
                        <input class="page-next" type="radio" id="vehicle26_5" name="vehicle26" value="1" required>
                        <label for="vehicle26_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle26_4" name="vehicle26" value="2" required>
                        <label for="vehicle26_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle26_3" name="vehicle26" value="3" required>
                        <label for="vehicle26_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle26_2" name="vehicle26" value="4" required>
                        <label for="vehicle26_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle26_1" name="vehicle26" value="5" required>
                        <label for="vehicle26_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>27- وقتی غذا خوشمزه است، نمی توانم جلوی پرخوری خود را بگیرم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle27_5" name="vehicle27" value="1" required>
                        <label for="vehicle27_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle27_4" name="vehicle27" value="2" required>
                        <label for="vehicle27_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle27_3" name="vehicle27" value="3" required>
                        <label for="vehicle27_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle27_2" name="vehicle27" value="4" required>
                        <label for="vehicle27_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle27_1" name="vehicle27" value="5" required>
                        <label for="vehicle27_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>28- قبول اینکه یک کاری را خراب کردم برایم سخت است و سعی می کنم یک جوری برایش توجیه پیدا کنم
                        </p>
                        <input class="page-next" type="radio" id="vehicle28_5" name="vehicle28" value="1" required>
                        <label for="vehicle28_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle28_4" name="vehicle28" value="2" required>
                        <label for="vehicle28_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle28_3" name="vehicle28" value="3" required>
                        <label for="vehicle28_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle28_2" name="vehicle28" value="4" required>
                        <label for="vehicle28_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle28_1" name="vehicle28" value="5" required>
                        <label for="vehicle28_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>29- برایم سخت است که در زمان قرض دادن پول یا چیزی از طرف مقابل رسید بگیرم و به این خاطر دچار مشکل شده ام.
                        </p>
                        <input class="page-next" type="radio" id="vehicle29_5" name="vehicle29" value="1" required>
                        <label for="vehicle29_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle29_4" name="vehicle29" value="2" required>
                        <label for="vehicle29_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle29_3" name="vehicle29" value="3" required>
                        <label for="vehicle29_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle29_2" name="vehicle29" value="4" required>
                        <label for="vehicle29_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle29_1" name="vehicle29" value="5" required>
                        <label for="vehicle29_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>30- خیلی وقت است که می خواهم یکی از وسایل خراب را برای تعمیر به تعمیر گاه ببرم و یا خودم آنرا تعمیر کنم
                        </p>
                        <input class="page-next" type="radio" id="vehicle30_5" name="vehicle30" value="1" required>
                        <label for="vehicle30_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle30_4" name="vehicle30" value="2" required>
                        <label for="vehicle30_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle30_3" name="vehicle30" value="3" required>
                        <label for="vehicle30_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle30_2" name="vehicle30" value="4" required>
                        <label for="vehicle30_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle30_1" name="vehicle30" value="5" required>
                        <label for="vehicle30_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>31- وقتی حوصله شنیدن حرف های طرف مقابلم را نداشته باشم، برایم سخت است که به هر نحوی به او بگویم
                        </p>
                        <input class="page-next" type="radio" id="vehicle31_5" name="vehicle31" value="1" required>
                        <label for="vehicle31_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle31_4" name="vehicle31" value="2" required>
                        <label for="vehicle31_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle31_3" name="vehicle31" value="3" required>
                        <label for="vehicle31_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle31_2" name="vehicle31" value="4" required>
                        <label for="vehicle31_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle31_1" name="vehicle31" value="5" required>
                        <label for="vehicle31_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>32- به محض اینکه حالم کمی بهتر می شود، مصرف داروهایم را قطع می کنم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle32_5" name="vehicle32" value="1" required>
                        <label for="vehicle32_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle32_4" name="vehicle32" value="2" required>
                        <label for="vehicle32_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle32_3" name="vehicle32" value="3" required>
                        <label for="vehicle32_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle32_2" name="vehicle32" value="4" required>
                        <label for="vehicle32_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle32_1" name="vehicle32" value="5" required>
                        <label for="vehicle32_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>33- پیش آمده است که به خاطر عدم تناسب پوشش با محیطی که در آن هستم، تذکر دریافت کرده ام.
                        </p>
                        <input class="page-next" type="radio" id="vehicle33_5" name="vehicle33" value="1" required>
                        <label for="vehicle33_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle33_4" name="vehicle33" value="2" required>
                        <label for="vehicle33_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle33_3" name="vehicle33" value="3" required>
                        <label for="vehicle33_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle33_2" name="vehicle33" value="4" required>
                        <label for="vehicle33_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle33_1" name="vehicle33" value="5" required>
                        <label for="vehicle33_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>34- پیش آمده که من قرارداد را تا آخر نخوانده ام و با طرف مقابل به مشکل خورده ام
                        </p>
                        <input class="page-next" type="radio" id="vehicle34_5" name="vehicle34" value="1" required>
                        <label for="vehicle34_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle34_4" name="vehicle34" value="2" required>
                        <label for="vehicle34_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle34_3" name="vehicle34" value="3" required>
                        <label for="vehicle34_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle34_2" name="vehicle34" value="4" required>
                        <label for="vehicle34_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle34_1" name="vehicle34" value="5" required>
                        <label for="vehicle34_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>35- اگر کاری فوری و کوتاه داشته باشم ، پارک دوبله می کنم
                        </p>
                        <input class="page-next" type="radio" id="vehicle35_5" name="vehicle35" value="1" required>
                        <label for="vehicle35_5"> کاملا موافقم</label><br />
                        <input class="page-next" type="radio" id="vehicle35_4" name="vehicle35" value="2" required>
                        <label for="vehicle35_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle35_3" name="vehicle35" value="3" required>
                        <label for="vehicle35_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle35_2" name="vehicle35" value="4" required>
                        <label for="vehicle35_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle35_1" name="vehicle35" value="5" required>
                        <label for="vehicle35_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>36- اگر وسیله یا پولی را قرض بگیرم، تا وام دهنده چند بار پیگیری نکند، آن را برنمی گردانم
                        </p>
                        <input class="page-next" type="radio" id="vehicle36_5" name="vehicle36" value="1" required>
                        <label for="vehicle36_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle36_4" name="vehicle36" value="2" required>
                        <label for="vehicle36_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle36_3" name="vehicle36" value="3" required>
                        <label for="vehicle36_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle36_2" name="vehicle36" value="4" required>
                        <label for="vehicle36_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle36_1" name="vehicle36" value="5" required>
                        <label for="vehicle36_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>37- هرکاری به من ارجاع می شود را قبول می کنم و بعضا به خاطر عدم انجام آنها، دچار دردسر و شرمندگی شده ام
                        </p>
                        <input class="page-next" type="radio" id="vehicle37_5" name="vehicle37" value="1" required>
                        <label for="vehicle37_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle37_4" name="vehicle37" value="2" required>
                        <label for="vehicle37_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle37_3" name="vehicle37" value="3" required>
                        <label for="vehicle37_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle37_2" name="vehicle37" value="4" required>
                        <label for="vehicle37_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle37_1" name="vehicle37" value="5" required>
                        <label for="vehicle37_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>38- وقتی از کسی دلگیرم، به او نمی گویم و این دلگیری تا مدت زیادی با من است
                        </p>
                        <input class="page-next" type="radio" id="vehicle38_5" name="vehicle38" value="1" required>
                        <label for="vehicle38_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle38_4" name="vehicle38" value="2" required>
                        <label for="vehicle38_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle38_3" name="vehicle38" value="3" required>
                        <label for="vehicle38_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle38_2" name="vehicle38" value="4" required>
                        <label for="vehicle38_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle38_1" name="vehicle38" value="5" required>
                        <label for="vehicle38_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>39- تلاش زیادی می کنم تا کسی از زندگی من سردر نیاورد
                        </p>
                        <input class="page-next" type="radio" id="vehicle39_5" name="vehicle39" value="1" required>
                        <label for="vehicle39_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle39_4" name="vehicle39" value="2" required>
                        <label for="vehicle39_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle39_3" name="vehicle39" value="3" required>
                        <label for="vehicle39_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle39_2" name="vehicle39" value="4" required>
                        <label for="vehicle39_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle39_1" name="vehicle39" value="5" required>
                        <label for="vehicle39_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>40- در پرداخت کرایه آژانس معمولا به مشکل می خورم چون قبلا با راننده یا آژانس توافق نکرده بودم
                        </p>
                        <input class="page-next" type="radio" id="vehicle40_5" name="vehicle40" value="1" required>
                        <label for="vehicle40_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle40_4" name="vehicle40" value="2" required>
                        <label for="vehicle40_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle40_3" name="vehicle40" value="3" required>
                        <label for="vehicle40_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle40_2" name="vehicle40" value="4" required>
                        <label for="vehicle40_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle40_1" name="vehicle40" value="5" required>
                        <label for="vehicle40_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>41- وقتی حوصله ضوابط دست و پا گیر را نداشته باشم، یک راهی برای دور زدن آنها پیدا می کنم
                        </p>
                        <input class="page-next" type="radio" id="vehicle41_5" name="vehicle41" value="1" required>
                        <label for="vehicle41_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle41_4" name="vehicle41" value="2" required>
                        <label for="vehicle41_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle41_3" name="vehicle41" value="3" required>
                        <label for="vehicle41_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle41_2" name="vehicle41" value="4" required>
                        <label for="vehicle41_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle41_1" name="vehicle41" value="5" required>
                        <label for="vehicle41_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>42- تا زمانیکه بیماریم جدی نشود و از کار نیافتم، دکتر نمی روم
                        </p>
                        <input class="page-next" type="radio" id="vehicle42_5" name="vehicle42" value="1" required>
                        <label for="vehicle42_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle42_4" name="vehicle42" value="2" required>
                        <label for="vehicle42_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle42_3" name="vehicle42" value="3" required>
                        <label for="vehicle42_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle42_2" name="vehicle42" value="4" required>
                        <label for="vehicle42_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle42_1" name="vehicle42" value="5" required>
                        <label for="vehicle42_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>43- خیلی وقت ها متوجه نمی شوم چرا رفتار دیگران با من تغییر کرده و یا ارتباطاتم با آنها رو به سردی رفته است
                        </p>
                        <input class="page-next" type="radio" id="vehicle43_5" name="vehicle43" value="1" required>
                        <label for="vehicle43_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle43_4" name="vehicle43" value="2" required>
                        <label for="vehicle43_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle43_3" name="vehicle43" value="3" required>
                        <label for="vehicle43_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle43_2" name="vehicle43" value="4" required>
                        <label for="vehicle43_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle43_1" name="vehicle43" value="5" required>
                        <label for="vehicle43_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>44- تا ماشینم خراب نشود برای بازرسی و یا تعمیر دوره ای، تعمیرگاه نمی روم
                        </p>
                        <input class="page-next" type="radio" id="vehicle44_5" name="vehicle44" value="1" required>
                        <label for="vehicle44_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle44_4" name="vehicle44" value="2" required>
                        <label for="vehicle44_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle44_3" name="vehicle44" value="3" required>
                        <label for="vehicle44_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle44_2" name="vehicle44" value="4" required>
                        <label for="vehicle44_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle44_1" name="vehicle44" value="5" required>
                        <label for="vehicle44_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>45- برایم سخت است که در مورد اشتباهاتی که در حق دیگران انجام داده ام عذر خواهی کنم و یا به نحوی آنرا جبران کنم
                        </p>
                        <input class="page-next" type="radio" id="vehicle45_5" name="vehicle45" value="1" required>
                        <label for="vehicle45_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle45_4" name="vehicle45" value="2" required>
                        <label for="vehicle45_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle45_3" name="vehicle45" value="3" required>
                        <label for="vehicle45_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle45_2" name="vehicle45" value="4" required>
                        <label for="vehicle45_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle45_1" name="vehicle45" value="5" required>
                        <label for="vehicle45_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>46- وقتی حوصله ندارم یا خسته ام مسواک نمی زنم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle46_5" name="vehicle46" value="1" required>
                        <label for="vehicle46_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle46_4" name="vehicle46" value="2" required>
                        <label for="vehicle46_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle46_3" name="vehicle46" value="3" required>
                        <label for="vehicle46_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle46_2" name="vehicle46" value="4" required>
                        <label for="vehicle46_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle46_1" name="vehicle46" value="5" required>
                        <label for="vehicle46_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>47- به نظرم در طبیعت آنقدر زباله هست که وقتی ما هم چیزی بریزیم، اوضاع بدتر نمی شود.
                        </p>
                        <input class="page-next"type="radio" id="vehicle47_5" name="vehicle47" value="1" required>
                        <label for="vehicle47_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle47_4" name="vehicle47" value="2" required>
                        <label for="vehicle47_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle47_3" name="vehicle47" value="3" required>
                        <label for="vehicle47_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle47_2" name="vehicle47" value="4" required>
                        <label for="vehicle47_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle47_1" name="vehicle47" value="5" required>
                        <label for="vehicle47_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>48- درمورد دستمزد یا هزینه های انجام یک کار توافق قبلی نمی کنم و هنگام دریافت یا پرداخت حق الزحمه دچار اختلاف جدی با طرف مقابل می شوم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle48_5" name="vehicle48" value="1" required>
                        <label for="vehicle48_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle48_4" name="vehicle48" value="2" required>
                        <label for="vehicle48_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle48_3" name="vehicle48" value="3" required>
                        <label for="vehicle48_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle48_2" name="vehicle48" value="4" required>
                        <label for="vehicle48_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle48_1" name="vehicle48" value="5" required>
                        <label for="vehicle48_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>49- به خاطر اینکه خوب بلد نیستم از وسایل کاریم استفاده کنم معمولا وقت زیادی از خودم یا دیگران تلف می کنم
                        </p>
                        <input class="page-next" type="radio" id="vehicle49_5" name="vehicle49" value="1" required>
                        <label for="vehicle49_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle49_4" name="vehicle49" value="2" required>
                        <label for="vehicle49_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle49_3" name="vehicle49" value="3" required>
                        <label for="vehicle49_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle49_2" name="vehicle49" value="4" required>
                        <label for="vehicle49_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle49_1" name="vehicle49" value="5" required>
                        <label for="vehicle49_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>50- در بحث ها برای رضایت طرف مقابلم مجبورم چیزهایی را بگویم که خودم هم باور ندارم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle50_5" name="vehicle50" value="1" required>
                        <label for="vehicle50_5"> کاملا موافقم</label><br>
                        <input class="page-next" type="radio" id="vehicle50_4" name="vehicle50" value="2" required>
                        <label for="vehicle50_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle50_3" name="vehicle50" value="3" required>
                        <label for="vehicle50_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next" type="radio" id="vehicle50_2" name="vehicle50" value="4" required>
                        <label for="vehicle50_2"> مخالفم</label><br>
                        <input class="page-next" type="radio" id="vehicle50_1" name="vehicle50" value="5" required>
                        <label for="vehicle50_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>51- تنها وقتی چکاپ می کنم که ضرورت داشته باشد
                        </p>
                        <input class="page-next"type="radio" id="vehicle51_5" name="vehicle51" value="1" required>
                        <label for="vehicle51_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle51_4" name="vehicle51" value="2" required>
                        <label for="vehicle51_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle51_3" name="vehicle51" value="3" required>
                        <label for="vehicle51_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle51_2" name="vehicle51" value="4" required>
                        <label for="vehicle51_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle51_1" name="vehicle51" value="5" required>
                        <label for="vehicle51_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>52- برای اینکه بهتر کار کنم، باید حقوق بهتری بگیرم
                        </p>
                        <input class="page-next"type="radio" id="vehicle52_5" name="vehicle52" value="1" required>
                        <label for="vehicle52_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle52_4" name="vehicle52" value="2" required>
                        <label for="vehicle52_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle52_3" name="vehicle52" value="3" required>
                        <label for="vehicle52_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle52_2" name="vehicle52" value="4" required>
                        <label for="vehicle52_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle52_1" name="vehicle52" value="5" required>
                        <label for="vehicle52_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>53- وقتی در موعد مقرر نمی توانم پولی را که قرض گرفته ام پس دهم، جواب تلفن طلبکارها را نمی دهم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle53_5" name="vehicle53" value="1" required>
                        <label for="vehicle53_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle53_4" name="vehicle53" value="2" required>
                        <label for="vehicle53_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle53_3" name="vehicle53" value="3" required>
                        <label for="vehicle53_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle53_2" name="vehicle53" value="4" required>
                        <label for="vehicle53_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle53_1" name="vehicle53" value="5" required>
                        <label for="vehicle53_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>54- برای اینکه به دردسر نیفتم، لازم باشد، دروغ مصلحتی هم می گویم
                        </p>
                        <input class="page-next"type="radio" id="vehicle54_5" name="vehicle54" value="1" required>
                        <label for="vehicle54_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle54_4" name="vehicle54" value="2" required>
                        <label for="vehicle54_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle54_3" name="vehicle54" value="3" required>
                        <label for="vehicle54_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle54_2" name="vehicle54" value="4" required>
                        <label for="vehicle54_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle54_1" name="vehicle54" value="5" required>
                        <label for="vehicle54_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>55- کارهایی دارم که باید انجام دهم ولی به دلایل مختلفی انجام آنها را به عقب انداخته ام مانند خریدن چیزی یا شروع یادگیری زبان و ...
                        </p>
                        <input class="page-next"type="radio" id="vehicle55_5" name="vehicle55" value="1" required>
                        <label for="vehicle55_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle55_4" name="vehicle55" value="2" required>
                        <label for="vehicle55_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle55_3" name="vehicle55" value="3" required>
                        <label for="vehicle55_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle55_2" name="vehicle55" value="4" required>
                        <label for="vehicle55_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle55_1" name="vehicle55" value="5" required>
                        <label for="vehicle55_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>56- معمولا تماس های بی پاسخ را پیگیری نمی کنم
                        </p>
                        <input class="page-next"type="radio" id="vehicle56_5" name="vehicle56" value="1" required>
                        <label for="vehicle56_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle56_4" name="vehicle56" value="2" required>
                        <label for="vehicle56_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle56_3" name="vehicle56" value="3" required>
                        <label for="vehicle56_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle56_2" name="vehicle56" value="4" required>
                        <label for="vehicle56_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle56_1" name="vehicle56" value="5" required>
                        <label for="vehicle56_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>57- فقط وقتی به دندانپزشک سر می زنم که یک مشکل جدی با دندانهایم پیدا کرده باشم
                        </p>
                        <input class="page-next"type="radio" id="vehicle57_5" name="vehicle57" value="1" required>
                        <label for="vehicle57_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle57_4" name="vehicle57" value="2" required>
                        <label for="vehicle57_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle57_3" name="vehicle57" value="3" required>
                        <label for="vehicle57_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle57_2" name="vehicle57" value="4" required>
                        <label for="vehicle57_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle57_1" name="vehicle57" value="5" required>
                        <label for="vehicle57_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>58- بعضی وقتها، همسایه ها از سر وصدای زیاد ما شاکی می شوند
                        </p>
                        <input class="page-next"type="radio" id="vehicle58_5" name="vehicle58" value="1" required>
                        <label for="vehicle58_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle58_4" name="vehicle58" value="2" required>
                        <label for="vehicle58_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle58_3" name="vehicle58" value="3" required>
                        <label for="vehicle58_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle58_2" name="vehicle58" value="4" required>
                        <label for="vehicle58_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle58_1" name="vehicle58" value="5" required>
                        <label for="vehicle58_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>59- وقتی متوجه شوم معامله ای که انجام داده ام به ضررم بوده است ، راهی برای خلاصی از آن پیدا می کنم
                        </p>
                        <input class="page-next"type="radio" id="vehicle59_5" name="vehicle59" value="1" required>
                        <label for="vehicle59_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle59_4" name="vehicle59" value="2" required>
                        <label for="vehicle59_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle59_3" name="vehicle59" value="3" required>
                        <label for="vehicle59_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle59_2" name="vehicle59" value="4" required>
                        <label for="vehicle59_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle59_1" name="vehicle59" value="5" required>
                        <label for="vehicle59_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>60- وقتی به قولی که داده ام، نتوانم عمل کنم، سعی می کنم با طرف روبرو نشوم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle60_5" name="vehicle60" value="1" required>
                        <label for="vehicle60_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle60_4" name="vehicle60" value="2" required>
                        <label for="vehicle60_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle60_3" name="vehicle60" value="3" required>
                        <label for="vehicle60_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle60_2" name="vehicle60" value="4" required>
                        <label for="vehicle60_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle60_1" name="vehicle60" value="5" required>
                        <label for="vehicle60_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>61- وقتی از کسی ناراحت هستم، برایم سخت است دلیلش را شفاف به او بگویم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle61_5" name="vehicle61" value="1" required>
                        <label for="vehicle61_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle61_4" name="vehicle61" value="2" required>
                        <label for="vehicle61_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle61_3" name="vehicle61" value="3" required>
                        <label for="vehicle61_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle61_2" name="vehicle61" value="4" required>
                        <label for="vehicle61_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle61_1" name="vehicle61" value="5" required>
                        <label for="vehicle61_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>62- بنا به ضرورت کاریم، لازم است یک زبان خارجی یاد بگیرم که هنوز فرصت نکرده ام.
                        </p>
                        <input class="page-next"type="radio" id="vehicle62_5" name="vehicle62" value="1" required>
                        <label for="vehicle62_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle62_4" name="vehicle62" value="2" required>
                        <label for="vehicle62_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle62_3" name="vehicle62" value="3" required>
                        <label for="vehicle62_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle62_2" name="vehicle62" value="4" required>
                        <label for="vehicle62_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle62_1" name="vehicle62" value="5" required>
                        <label for="vehicle62_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>63- وقتی در جلسه هستم، موبایلم مانع از این می شود که به طور کامل در جلسه حضور فکری داشته باشم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle63_5" name="vehicle63" value="1" required>
                        <label for="vehicle63_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle63_4" name="vehicle63" value="2" required>
                        <label for="vehicle63_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle63_3" name="vehicle63" value="3" required>
                        <label for="vehicle63_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle63_2" name="vehicle63" value="4" required>
                        <label for="vehicle63_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle63_1" name="vehicle63" value="5" required>
                        <label for="vehicle63_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>64- به خاطر فراموش کردن قولی که به دیگران داده ام، دچار شرمندگی شدم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle64_5" name="vehicle64" value="1" required>
                        <label for="vehicle64_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle64_4" name="vehicle64" value="2" required>
                        <label for="vehicle64_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle64_3" name="vehicle64" value="3" required>
                        <label for="vehicle64_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle64_2" name="vehicle64" value="4" required>
                        <label for="vehicle64_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle64_1" name="vehicle64" value="5" required>
                        <label for="vehicle64_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>65- در کارم مهارت هایی را لازم دارم که فرصت نکرده ام یاد بگیرم و این بر روی کیفیت کارم تاثیر گذاشته..
                        </p>
                        <input class="page-next"type="radio" id="vehicle65_5" name="vehicle65" value="1" required>
                        <label for="vehicle65_5"> کاملا موافقم</label><br>
                        <input class="page-next"type="radio" id="vehicle65_4" name="vehicle65" value="2" required>
                        <label for="vehicle65_4">موافقم </label><br>
                        <input class="page-next"type="radio" id="vehicle65_3" name="vehicle65" value="3" required>
                        <label for="vehicle65_3"> نه موافق و نه مخالف</label><br/>
                        <input class="page-next"type="radio" id="vehicle65_2" name="vehicle65" value="4" required>
                        <label for="vehicle65_2"> مخالفم</label><br>
                        <input class="page-next"type="radio" id="vehicle65_1" name="vehicle65" value="5" required>
                        <label for="vehicle65_1"> به شدت مخالفم</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>

                    <section class="page">
                        <!-- <a href="#">Terms of Service</a><br/>
                        <input type="checkbox" id="ts" name="ts" value="1" required />
                        <label for="ts"> I agree</label><br />
                        -->
                        <button type="button" class="page-prev btn btn-danger col-3">قبلی</button>
                        <button type="submit" class="page-next btn btn-success col-3" id="sendForm">تکمیل شد</button>
                    </section>
                    <!--
                    <section class="page" style="margin:auto;text-align:center">
                        فرم شما تکمیل شد.
                    </section>
                    -->
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footerScript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{asset('/js/jquery-ui.min.js')}}" ></script>
    <script src="{{asset('/js/jquery-book.js')}}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        $thing = $('#demo').book({
            onPageChange: updateProgress,
            speed:200}
        ).validate();


        function updateProgress(prevPageIndex, currentPageIndex, pageCount, pageName){
            t = (currentPageIndex / (pageCount-1)) * 100;
            $('.progress-bar').attr('aria-valuenow', t);
            $('.progress-bar').css('width', t+'%');
            //$('.progress span').text('Completed: '+Math.trunc(t)+'%');
            $('.progress-value').text(Math.trunc(t)+'%');
        }
    </script>
@endsection
