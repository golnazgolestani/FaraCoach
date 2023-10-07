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
                <form name="demo" id="demo" method="POST" action="/panel/psychological" class="myBook mt-4">
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
                        <p>1- اکثر افراد مرا دوست داشتنی و باعاطفه و مهربان می دانند.</p>
                        <input class="page-next" type="radio" id="vehicle1_5" name="vehicle1" value="6" required />
                        <label for="vehicle1_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle1_4" name="vehicle1" value="5" required />
                        <label for="vehicle1_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle1_3" name="vehicle1" value="4" required />
                        <label for="vehicle1_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle1_2" name="vehicle1" value="3" required />
                        <label for="vehicle1_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle1_1" name="vehicle1" value="2" required />
                        <label for="vehicle1_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle1_0" name="vehicle1" value="1" required />
                        <label for="vehicle1_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>2- من از ابراز عقایدم هراسی ندارم حتی زمانی که آن‌ها با عقاید اکثر مردم متضاد هستند.</p>
                        <input class="page-next" type="radio" id="vehicle2_5" name="vehicle2" value="6" required>
                        <label for="vehicle2_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle2_4" name="vehicle2" value="5" required>
                        <label for="vehicle2_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle2_3" name="vehicle2" value="4" required>
                        <label for="vehicle2_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle2_2" name="vehicle2" value="3" required>
                        <label for="vehicle2_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle2_1" name="vehicle2" value="2" required>
                        <label for="vehicle2_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle2_0" name="vehicle2" value="1" required>
                        <label for="vehicle2_0">مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>3- در کل احساس می کنم من در خدمت موقعیتی هستم که در آن زندگی می کنم.</p>
                        <input class="page-next" type="radio" id="vehicle3_5" name="vehicle3" value="6" required>
                        <label for="vehicle3_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle3_4" name="vehicle3" value="5" required>
                        <label for="vehicle3_4">موافقم </label><br>
                        <input class="page-next" type="radio" id="vehicle3_3" name="vehicle3" value="4" required>
                        <label for="vehicle3_3"> تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle3_2" name="vehicle3" value="3" required>
                        <label for="vehicle3_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle3_1" name="vehicle3" value="2" required>
                        <label for="vehicle3_1">مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle3_0" name="vehicle3" value="1" required>
                        <label for="vehicle3_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>4- من به فعالیت هایی که افق های وسیعی برای من باز می‌کنند علاقه‌مند نیستم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle4_5" name="vehicle4" value="6" required>
                        <label for="vehicle4_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle4_4" name="vehicle4" value="5" required>
                        <label for="vehicle4_4">موافق </label><br>
                        <input class="page-next"  type="radio" id="vehicle4_3" name="vehicle4" value="4" required>
                        <label for="vehicle4_3">تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle4_2" name="vehicle4" value="3" required>
                        <label for="vehicle4_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle4_1" name="vehicle4" value="2" required>
                        <label for="vehicle4_1">مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle4_0" name="vehicle4" value="1" required>
                        <label for="vehicle4_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>5- من در زمان حال زندگی می کنم و واقعاً به آینده فکر نمی کنم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle5_5" name="vehicle5" value="6" required>
                        <label for="vehicle5_5"> کاملا موافق</label><br>
                        <input  class="page-next" type="radio" id="vehicle5_4" name="vehicle5" value="5" required>
                        <label for="vehicle5_4">موافق </label><br>
                        <input class="page-next"  type="radio" id="vehicle3" name="vehicle5" value="4" required>
                        <label for="vehicle3">تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle1" name="vehicle5" value="3" required>
                        <label for="vehicle1"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle2" name="vehicle5" value="2" required>
                        <label for="vehicle2"> مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle0" name="vehicle5" value="1" required>
                        <label for="vehicle0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>6- وقتی‌که به داستان زندگی خودم نگاه می¬کنم،از هر آنچه در آن پیش‌آمده خشنودم.</p>
                        <input class="page-next"  type="radio" id="vehicle6_5" name="vehicle6" value="6" required>
                        <label for="vehicle6_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle6_4" name="vehicle6" value="5" required>
                        <label for="vehicle6_4">موافق </label><br>
                        <input class="page-next"  type="radio" id="vehicle6_3" name="vehicle6" value="4" required>
                        <label for="vehicle6_3">تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle6_2" name="vehicle6" value="3" required>
                        <label for="vehicle6_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle6_1" name="vehicle6" value="2" required>
                        <label for="vehicle6_1"> مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle6_0" name="vehicle6" value="1" required>
                        <label for="vehicle6_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>7- حفظ ارتباطات نزدیک و صمیمی برای من سخت و مشقت¬بار بوده است.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle7_5" name="vehicle7" value="6" required>
                        <label for="vehicle7_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle7_4" name="vehicle7" value="5" required>
                        <label for="vehicle7_4">موافق </label><br>
                        <input  class="page-next" type="radio" id="vehicle7_3" name="vehicle7" value="4" required>
                        <label for="vehicle7_3">تا حدودی موافق</label><br/>
                        <input  class="page-next" type="radio" id="vehicle7_2" name="vehicle7" value="3" required>
                        <label for="vehicle7_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle7_1" name="vehicle7" value="2" required>
                        <label for="vehicle7_1"> مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle7_0" name="vehicle7" value="1" required>
                        <label for="vehicle7_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>8- تصمیمات من معمولاً با آنچه دیگران انجام می دهند تحت تأثیر قرار
                            نمی گیرند.

                        </p>
                        <input  class="page-next" type="radio" id="vehicle8_5" name="vehicle8" value="6" required>
                        <label for="vehicle8_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle8_4" name="vehicle8" value="5" required>
                        <label for="vehicle8_4">موافق</label><br>
                        <input  class="page-next" type="radio" id="vehicle8_3" name="vehicle8" value="4" required>
                        <label for="vehicle8_3"> تا حدودی موافق</label><br/>
                        <input  class="page-next" type="radio" id="vehicle8_2" name="vehicle8" value="3" required>
                        <label for="vehicle8_2"> تا حدودی مخالف</label><br>
                        <input  class="page-next" type="radio" id="vehicle8_1" name="vehicle8" value="2" required>
                        <label for="vehicle8_1"> مخالف</label><br>
                        <input  class="page-next" type="radio" id="vehicle8_0" name="vehicle8" value="1" required>
                        <label for="vehicle8_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>9- نیازها و خواسته های روزمره زندگی اغلب مرا خسته می کند.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle9_5" name="vehicle9" value="6" required>
                        <label for="vehicle9_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle9_4" name="vehicle9" value="5" required>
                        <label for="vehicle9_4">موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle9_3" name="vehicle9" value="4" required>
                        <label for="vehicle9_3"> تا حدودی موافق</label><br/>
                        <input  class="page-next" type="radio" id="vehicle9_2" name="vehicle9" value="3" required>
                        <label for="vehicle9_2"> تا حدودی مخالف</label><br>
                        <input  class="page-next" type="radio" id="vehicle9_1" name="vehicle9" value="2" required>
                        <label for="vehicle9_1"> مخالف</label><br>
                        <input  class="page-next" type="radio" id="vehicle9_0" name="vehicle9" value="1" required>
                        <label for="vehicle9_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>10- من راه‌های تازه ای برای انجام دادن کارهایم نمی خواهم، زندگی من به همین روش فعلی مطلوب است.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle10_5" name="vehicle10" value="6" required>
                        <label for="vehicle10_5"> کاملاً موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle10_4" name="vehicle10" value="5" required>
                        <label for="vehicle10_4">موافق </label><br>
                        <input class="page-next"  type="radio" id="vehicle10_3" name="vehicle10" value="4" required>
                        <label for="vehicle10_3">تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle10_2" name="vehicle10" value="3" required>
                        <label for="vehicle10_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle10_1" name="vehicle10" value="2" required>
                        <label for="vehicle10_1">مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle10_0" name="vehicle10" value="1" required>
                        <label for="vehicle10_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>11- تمایل دارم بر «حال» تمرکز کنم چراکه «آینده» همیشه برای من مشکلاتی را به همراه دارد.</p>
                        <input class="page-next"  type="radio" id="vehicle11_5" name="vehicle11" value="6" required>
                        <label for="vehicle11_5"> کاملاً موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle11_4" name="vehicle11" value="5" required>
                        <label for="vehicle11_4">موافق </label><br>
                        <input class="page-next"  type="radio" id="vehicle11_3" name="vehicle11" value="4" required>
                        <label for="vehicle11_3"> تا حدودی موافق</label><br/>
                        <input  class="page-next" type="radio" id="vehicle11_2" name="vehicle11" value="3" required>
                        <label for="vehicle11_2"> تا حدودی مخالف</label><br>
                        <input  class="page-next" type="radio" id="vehicle11_1" name="vehicle11" value="2" required>
                        <label for="vehicle11_1">مخالف</label><br>
                        <input  class="page-next" type="radio" id="vehicle11_0" name="vehicle11" value="1" required>
                        <label for="vehicle11_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>12- درمجموع، اعتمادبه‌نفس و حس مثبتی درباره¬ی خودم دارم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle12_5" name="vehicle12" value="6" required>
                        <label for="vehicle12_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle12_4" name="vehicle12" value="5"required >
                        <label for="vehicle12_4">موافق </label><br>
                        <input class="page-next"  type="radio" id="vehicle12_3" name="vehicle12" value="4"required >
                        <label for="vehicle12_3">تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle12_2" name="vehicle12" value="3" required>
                        <label for="vehicle12_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle12_1" name="vehicle12" value="2" required>
                        <label for="vehicle12_1">مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle12_0" name="vehicle12" value="1" required>
                        <label for="vehicle12_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>13- گاهی احساس تنهایی می¬کنم چراکه دوستان صمیمی کمی‌دارم که می‌توانم نگرانی¬هایم را با آن‌ها در میان بگذارم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle13_5" name="vehicle13" value="6" required >
                        <label for="vehicle13_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle13_4" name="vehicle13" value="5" required >
                        <label for="vehicle13_4">موافق</label><br>
                        <input  class="page-next" type="radio" id="vehicle13_3" name="vehicle13" value="4" required >
                        <label for="vehicle13_3"> تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle13_2" name="vehicle13" value="3" required >
                        <label for="vehicle13_2"> تا حدودی مخالف</label><br>
                        <input  class="page-next" type="radio" id="vehicle13_1" name="vehicle13" value="2" required >
                        <label for="vehicle13_1"> مخالف</label><br>
                        <input  class="page-next" type="radio" id="vehicle13_0" name="vehicle13" value="1" required >
                        <label for="vehicle13_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>14- در مورد آنچه مردم در مورد من فکر می‌کنند، نگرانم می¬کند.
                        </p>
                        <input  class="page-next" type="radio" id="vehicle14_5" name="vehicle14" value="6" required >
                        <label for="vehicle14_5"> کاملا موافق</label><br>
                        <input  class="page-next" type="radio" id="vehicle14_4" name="vehicle14" value="5" required >
                        <label for="vehicle14_4">موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle14_3" name="vehicle14" value="4" required>
                        <label for="vehicle14_3">تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle14_2" name="vehicle14" value="3" required >
                        <label for="vehicle14_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle14_1" name="vehicle14" value="2" required >
                        <label for="vehicle14_1">مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle14_0" name="vehicle14" value="1" required >
                        <label for="vehicle14_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>15- با افراد و جامعه اطرافم خیلی خوب همخوانی خوبی ندارم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle15_5" name="vehicle15" value="6" required >
                        <label for="vehicle15_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle15_4" name="vehicle15" value="5" required>
                        <label for="vehicle15_4">موافق </label><br>
                        <input class="page-next"  type="radio" id="vehicle15_3" name="vehicle15" value="4" required>
                        <label for="vehicle15_3">تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle15_2" name="vehicle15" value="3" required>
                        <label for="vehicle15_2">تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle15_1" name="vehicle15" value="2" required>
                        <label for="vehicle15_1">مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle15_0" name="vehicle15" value="1" required>
                        <label for="vehicle15_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>16- داشتن تجربیات جدیدی که چگونگی تصور شمارا درباره ی خود و جهان اطرافتان به چالش می کشد، مهم است.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle16_5" name="vehicle16" value="6" required>
                        <label for="vehicle16_5"> کاملا موافق</label><br>
                        <input class="page-next"  type="radio" id="vehicle16_4" name="vehicle16" value="5" required>
                        <label for="vehicle16_4">موافق </label><br>
                        <input  class="page-next" type="radio" id="vehicle16_3" name="vehicle16" value="4" required>
                        <label for="vehicle16_3"> تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle16_2" name="vehicle16" value="3" required>
                        <label for="vehicle16_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle16_1" name="vehicle16" value="2" required>
                        <label for="vehicle16_1"> مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle16_0" name="vehicle16" value="1" required>
                        <label for="vehicle16_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>17- اغلب فعالیت‌های هرروزه‌ی من به نظرم تکراری و بی اهمیت به نظرم می آید.
                        </p>
                        <input  class="page-next" type="radio" id="vehicle17_5" name="vehicle17" value="6" required>
                        <label for="vehicle17_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle17_4" name="vehicle17" value="5" required>
                        <label for="vehicle17_4">موافق </label><br>
                        <input  class="page-next" type="radio" id="vehicle17_3" name="vehicle17" value="4" required>
                        <label for="vehicle17_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle17_2" name="vehicle17" value="3" required>
                        <label for="vehicle17_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle17_1" name="vehicle17" value="2" required>
                        <label for="vehicle17_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle17_0" name="vehicle17" value="1" required>
                        <label for="vehicle17_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>18- فکر می¬کنم بیشتر افرادی که می¬شناسم از زندگی بهره¬ی بیشتری در مقایسه با من می¬برند.
                        </p>
                        <input class="page-next" type="radio" id="vehicle18_5" name="vehicle18" value="6" required>
                        <label for="vehicle18_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle18_4" name="vehicle18" value="5" required>
                        <label for="vehicle18_4">موافق </label><br>
                        <input class="page-next"  type="radio" id="vehicle18_3" name="vehicle18" value="4" required>
                        <label for="vehicle18_3"> تا حدودی موافق</label><br/>
                        <input class="page-next"  type="radio" id="vehicle18_2" name="vehicle18" value="3" required>
                        <label for="vehicle18_2">تا حدودی مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle18_1" name="vehicle18" value="2" required>
                        <label for="vehicle18_1"> مخالف</label><br>
                        <input class="page-next"  type="radio" id="vehicle18_0" name="vehicle18" value="1" required>
                        <label for="vehicle18_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>19- من از روابط فردی و دوطرفه با اعضای خانواده یا دوستانم لذت می برم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle19_5" name="vehicle19" value="6" required>
                        <label for="vehicle19_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle19_4" name="vehicle19" value="5" required>
                        <label for="vehicle19_4">موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle19_3" name="vehicle19" value="4" required>
                        <label for="vehicle19_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle19_2" name="vehicle19" value="3" required>
                        <label for="vehicle19_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle19_1" name="vehicle19" value="2" required>
                        <label for="vehicle19_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle19_0" name="vehicle19" value="1" required>
                        <label for="vehicle19_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>20- شاد بودن برای خودم، اهمیت بیشتری برای من دارد تا رضایت دیگران.
                        </p>
                        <input class="page-next" type="radio" id="vehicle20_5" name="vehicle20" value="6" required>
                        <label for="vehicle20_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle20_4" name="vehicle20" value="5" required>
                        <label for="vehicle20_4">موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle20_3" name="vehicle20" value="4" required>
                        <label for="vehicle20_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle20_2" name="vehicle20" value="3" required>
                        <label for="vehicle20_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle20_1" name="vehicle20" value="2" required>
                        <label for="vehicle20_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle20_0" name="vehicle20" value="1" required>
                        <label for="vehicle20_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>21- من کاملاً در مدیریت بسیاری از مسئولیت های زندگی ام موفق هستم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle21_5" name="vehicle21" value="6" required>
                        <label for="vehicle21_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle21_4" name="vehicle21" value="5" required>
                        <label for="vehicle21_4">موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle21_3" name="vehicle21" value="4" required>
                        <label for="vehicle21_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle21_2" name="vehicle21" value="3" required>
                        <label for="vehicle21_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle21_1" name="vehicle21" value="2" required>
                        <label for="vehicle21_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle21_0" name="vehicle21" value="1" required>
                        <label for="vehicle21_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>22- وقتی خوب فکر می کنم، من واقعاً در طی سال ها کمال استفاده از عمرم نبرده ام.
                        </p>
                        <input class="page-next" type="radio" id="vehicle22_5" name="vehicle22" value="6" required>
                        <label for="vehicle22_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle22_4" name="vehicle22" value="5" required>
                        <label for="vehicle22_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle22_3" name="vehicle22" value="4" required>
                        <label for="vehicle22_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle22_2" name="vehicle22" value="3" required>
                        <label for="vehicle22_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle22_1" name="vehicle22" value="2" required>
                        <label for="vehicle22_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle22_0" name="vehicle22" value="1" required>
                        <label for="vehicle22_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>23- حس خوبی ازآنچه هست، برای به دست آوردن آن در زندگی تلاش می کنم، ندارم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle23_5" name="vehicle23" value="6" required>
                        <label for="vehicle23_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle23_4" name="vehicle23" value="5" required>
                        <label for="vehicle23_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle23_3" name="vehicle23" value="4" required>
                        <label for="vehicle23_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle23_2" name="vehicle23" value="3" required>
                        <label for="vehicle23_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle23_1" name="vehicle23" value="2" required>
                        <label for="vehicle23_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle23_0" name="vehicle23" value="1" required>
                        <label for="vehicle23_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>24- من اکثر جنبه های شخصیتم را دوست دارم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle24_5" name="vehicle24" value="6" required>
                        <label for="vehicle24_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle24_4" name="vehicle24" value="5" required>
                        <label for="vehicle24_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle24_3" name="vehicle24" value="4" required>
                        <label for="vehicle24_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle24_2" name="vehicle24" value="3" required>
                        <label for="vehicle24_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle24_1" name="vehicle24" value="2" required>
                        <label for="vehicle24_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle24_0" name="vehicle24" value="1" required>
                        <label for="vehicle24_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>25- من افراد زیادی را در اختیار ندارم که هنگام نیاز به گفتگو با آن‌ها، به من گوش کنند.
                        </p>
                        <input class="page-next" type="radio" id="vehicle25_5" name="vehicle25" value="6" required>
                        <label for="vehicle25_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle25_4" name="vehicle25" value="5" required>
                        <label for="vehicle25_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle25_3" name="vehicle25" value="4" required>
                        <label for="vehicle25_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle25_2" name="vehicle25" value="3" required>
                        <label for="vehicle25_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle25_1" name="vehicle25" value="2" required>
                        <label for="vehicle25_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle25_0" name="vehicle25" value="1" required>
                        <label for="vehicle25_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>26- توسط افرادی با عقاید قوی تحت تأثیر قرار می گیرم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle26_5" name="vehicle26" value="6" required>
                        <label for="vehicle26_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle26_4" name="vehicle26" value="5" required>
                        <label for="vehicle26_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle26_3" name="vehicle26" value="4" required>
                        <label for="vehicle26_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle26_2" name="vehicle26" value="3" required>
                        <label for="vehicle26_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle26_1" name="vehicle26" value="2" required>
                        <label for="vehicle26_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle26_0" name="vehicle26" value="1" required>
                        <label for="vehicle26_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>27- اغلب احساس می کنم در برابر مسئولیت هایم از پا می افتم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle27_5" name="vehicle27" value="6" required>
                        <label for="vehicle27_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle27_4" name="vehicle27" value="5" required>
                        <label for="vehicle27_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle27_3" name="vehicle27" value="4" required>
                        <label for="vehicle27_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle27_2" name="vehicle27" value="3" required>
                        <label for="vehicle27_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle27_1" name="vehicle27" value="2" required>
                        <label for="vehicle27_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle27_0" name="vehicle27" value="1" required>
                        <label for="vehicle27_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>28- این حس رادارم که فردی رشد یافته ام.
                        </p>
                        <input class="page-next" type="radio" id="vehicle28_5" name="vehicle28" value="6" required>
                        <label for="vehicle28_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle28_4" name="vehicle28" value="5" required>
                        <label for="vehicle28_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle28_3" name="vehicle28" value="4" required>
                        <label for="vehicle28_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle28_2" name="vehicle28" value="3" required>
                        <label for="vehicle28_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle28_1" name="vehicle28" value="2" required>
                        <label for="vehicle28_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle28_0" name="vehicle28" value="1" required>
                        <label for="vehicle28_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>29-عادت داشتم برای خودم اهدافی را ترتیب دهم اما الآن فکر می کنم این وقت تلف کردن است.
                        </p>
                        <input class="page-next" type="radio" id="vehicle29_5" name="vehicle29" value="6" required>
                        <label for="vehicle29_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle29_4" name="vehicle29" value="5" required>
                        <label for="vehicle29_4">موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle29_3" name="vehicle29" value="4" required>
                        <label for="vehicle29_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle29_2" name="vehicle29" value="3" required>
                        <label for="vehicle29_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle29_1" name="vehicle29" value="2" required>
                        <label for="vehicle29_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle29_0" name="vehicle29" value="1" required>
                        <label for="vehicle29_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>30- اشتباهاتی درگذشته داشته ام، اما حس می کنم که همه‌چیز برای بهترین حالت فراهم بوده است.
                        </p>
                        <input class="page-next" type="radio" id="vehicle30_5" name="vehicle30" value="6" required>
                        <label for="vehicle30_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle30_4" name="vehicle30" value="5" required>
                        <label for="vehicle30_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle30_3" name="vehicle30" value="4" required>
                        <label for="vehicle30_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle30_2" name="vehicle30" value="3" required>
                        <label for="vehicle30_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle30_1" name="vehicle30" value="2" required>
                        <label for="vehicle30_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle30_0" name="vehicle30" value="1" required>
                        <label for="vehicle30_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>31- به نظرم اکثر افراد تعداد دوستان بیشتری از من دارند.
                        </p>
                        <input class="page-next" type="radio" id="vehicle31_5" name="vehicle31" value="6" required>
                        <label for="vehicle31_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle31_4" name="vehicle31" value="5" required>
                        <label for="vehicle31_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle31_3" name="vehicle31" value="4" required>
                        <label for="vehicle31_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle31_2" name="vehicle31" value="3" required>
                        <label for="vehicle31_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle31_1" name="vehicle31" value="2" required>
                        <label for="vehicle31_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle31_0" name="vehicle31" value="1" required>
                        <label for="vehicle31_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>32- من به عقاید اطمینان دارم حتی اگر آن‌ها بر ضد نظر اکثریت باشد.
                        </p>
                        <input class="page-next" type="radio" id="vehicle32_5" name="vehicle32" value="6" required>
                        <label for="vehicle32_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle32_4" name="vehicle32" value="5" required>
                        <label for="vehicle32_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle32_3" name="vehicle32" value="4" required>
                        <label for="vehicle32_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle32_2" name="vehicle32" value="3" required>
                        <label for="vehicle32_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle32_1" name="vehicle32" value="2" required>
                        <label for="vehicle32_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle32_0" name="vehicle32" value="1" required>
                        <label for="vehicle32_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>33- من معمولاً اقدام مناسبی برای حفاظت از اعتبار و امور شخصی خودم انجام می دهم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle33_5" name="vehicle33" value="6" required>
                        <label for="vehicle33_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle33_4" name="vehicle33" value="5" required>
                        <label for="vehicle33_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle33_3" name="vehicle33" value="4" required>
                        <label for="vehicle33_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle33_2" name="vehicle33" value="3" required>
                        <label for="vehicle33_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle33_1" name="vehicle33" value="2" required>
                        <label for="vehicle33_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle33_0" name="vehicle33" value="1" required>
                        <label for="vehicle33_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>34- من از قرار گرفتن در موقعیت های جدیدی که نیاز به تغییر در روش‌های آشنایی قدیمی خودم داشته باشند، لذت نمی برم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle34_5" name="vehicle34" value="6" required>
                        <label for="vehicle34_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle34_4" name="vehicle34" value="5" required>
                        <label for="vehicle34_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle34_3" name="vehicle34" value="4" required>
                        <label for="vehicle34_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle34_2" name="vehicle34" value="3" required>
                        <label for="vehicle34_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle34_1" name="vehicle34" value="2" required>
                        <label for="vehicle34_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle34_0" name="vehicle34" value="1" required>
                        <label for="vehicle34_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>35- از طراحی برای آینده و تلاش برای رساندن آن‌ها به واقعیت لذت می برم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle35_5" name="vehicle35" value="6" required>
                        <label for="vehicle35_5"> کاملا موافق</label><br />
                        <input class="page-next" type="radio" id="vehicle35_4" name="vehicle35" value="5" required>
                        <label for="vehicle35_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle35_3" name="vehicle35" value="4" required>
                        <label for="vehicle35_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle35_2" name="vehicle35" value="3" required>
                        <label for="vehicle35_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle35_1" name="vehicle35" value="2" required>
                        <label for="vehicle35_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle35_0" name="vehicle35" value="1" required>
                        <label for="vehicle35_0"> کاملا مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>36- به طرق مختلف از موقعیت¬هایم در زندگی احساس نارضایتی دارم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle36_5" name="vehicle36" value="6" required>
                        <label for="vehicle36_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle36_4" name="vehicle36" value="5" required>
                        <label for="vehicle36_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle36_3" name="vehicle36" value="4" required>
                        <label for="vehicle36_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle36_2" name="vehicle36" value="3" required>
                        <label for="vehicle36_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle36_1" name="vehicle36" value="2" required>
                        <label for="vehicle36_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle36_0" name="vehicle36" value="1" required>
                        <label for="vehicle36_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>37- مردم مرا به‌عنوان فردی دهنده و خواهان در اختیار گذاشتن وقتم با دیگران می شناسند.
                        </p>
                        <input class="page-next" type="radio" id="vehicle37_5" name="vehicle37" value="6" required>
                        <label for="vehicle37_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle37_4" name="vehicle37" value="5" required>
                        <label for="vehicle37_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle37_3" name="vehicle37" value="4" required>
                        <label for="vehicle37_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle37_2" name="vehicle37" value="3" required>
                        <label for="vehicle37_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle37_1" name="vehicle37" value="2" required>
                        <label for="vehicle37_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle37_0" name="vehicle37" value="1" required>
                        <label for="vehicle37_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>38- برایم ابراز عقیده در موارد بحث‌انگیز مشکل است.
                        </p>
                        <input class="page-next" type="radio" id="vehicle38_5" name="vehicle38" value="6" required>
                        <label for="vehicle38_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle38_4" name="vehicle38" value="5" required>
                        <label for="vehicle38_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle38_3" name="vehicle38" value="4" required>
                        <label for="vehicle38_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle38_2" name="vehicle38" value="3" required>
                        <label for="vehicle38_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle38_1" name="vehicle38" value="2" required>
                        <label for="vehicle38_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle38_0" name="vehicle38" value="1" required>
                        <label for="vehicle38_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>39- من در بکار گرفتن وقتم استادم پس می¬توانم هر چیزی را همان‌طور که لازم است انجام دهم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle39_5" name="vehicle39" value="6" required>
                        <label for="vehicle39_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle39_4" name="vehicle39" value="5" required>
                        <label for="vehicle39_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle39_3" name="vehicle39" value="4" required>
                        <label for="vehicle39_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle39_2" name="vehicle39" value="3" required>
                        <label for="vehicle39_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle39_1" name="vehicle39" value="2" required>
                        <label for="vehicle39_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle39_0" name="vehicle39" value="1" required>
                        <label for="vehicle39_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>40- برای من زندگی فرآیندی مداوم از یادگیری تغییر و رشد است.
                        </p>
                        <input class="page-next" type="radio" id="vehicle40_5" name="vehicle40" value="6" required>
                        <label for="vehicle40_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle40_4" name="vehicle40" value="5" required>
                        <label for="vehicle40_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle40_3" name="vehicle40" value="4" required>
                        <label for="vehicle40_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle40_2" name="vehicle40" value="3" required>
                        <label for="vehicle40_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle40_1" name="vehicle40" value="2" required>
                        <label for="vehicle40_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle40_0" name="vehicle40" value="1" required>
                        <label for="vehicle40_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>41- فردی فعال در به ثمر رساندن اهدافم هستم.
                        </p>
                        <input class="page-next" type="radio" id="vehicle41_5" name="vehicle41" value="6" required>
                        <label for="vehicle41_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle41_4" name="vehicle41" value="5" required>
                        <label for="vehicle41_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle41_3" name="vehicle41" value="4" required>
                        <label for="vehicle41_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle41_2" name="vehicle41" value="3" required>
                        <label for="vehicle41_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle41_1" name="vehicle41" value="2" required>
                        <label for="vehicle41_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle41_0" name="vehicle41" value="1" required>
                        <label for="vehicle41_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>42- نگرش من درباره ی خودم احتمالاً با اندازه ای مثبت نیست که سایرین در مورد خودشان مثبت فکر می‌کنند.
                        </p>
                        <input class="page-next" type="radio" id="vehicle42_5" name="vehicle42" value="6" required>
                        <label for="vehicle42_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle42_4" name="vehicle42" value="5" required>
                        <label for="vehicle42_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle42_3" name="vehicle42" value="4" required>
                        <label for="vehicle42_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle42_2" name="vehicle42" value="3" required>
                        <label for="vehicle42_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle42_1" name="vehicle42" value="2" required>
                        <label for="vehicle42_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle42_0" name="vehicle42" value="1" required>
                        <label for="vehicle42_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>43- من ارتباطات گرم و مورد اعتماد زیادی را با دیگران تجربه نکرده ام.
                        </p>
                        <input class="page-next" type="radio" id="vehicle43_5" name="vehicle43" value="6" required>
                        <label for="vehicle43_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle43_4" name="vehicle43" value="5" required>
                        <label for="vehicle43_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle43_3" name="vehicle43" value="4" required>
                        <label for="vehicle43_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle43_2" name="vehicle43" value="3" required>
                        <label for="vehicle43_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle43_1" name="vehicle43" value="2" required>
                        <label for="vehicle43_1">مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle43_0" name="vehicle43" value="1" required>
                        <label for="vehicle43_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>44- اغلب نظرم را درباره ی تصمیماتم عوض می کنم اگر دوستان یا خانواده‌ام مخالف باشند.
                        </p>
                        <input class="page-next" type="radio" id="vehicle44_5" name="vehicle44" value="6" required>
                        <label for="vehicle44_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle44_4" name="vehicle44" value="5" required>
                        <label for="vehicle44_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle44_3" name="vehicle44" value="4" required>
                        <label for="vehicle44_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle44_2" name="vehicle44" value="3" required>
                        <label for="vehicle44_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle44_1" name="vehicle44" value="2" required>
                        <label for="vehicle44_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle44_0" name="vehicle44" value="1" required>
                        <label for="vehicle44_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>45- ترتیب دادن زندگی ام آن‌گونه که برایم رضایت بخش باشد، برایم دشوار است.
                        </p>
                        <input class="page-next" type="radio" id="vehicle45_5" name="vehicle45" value="6" required>
                        <label for="vehicle45_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle45_4" name="vehicle45" value="5" required>
                        <label for="vehicle45_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle45_3" name="vehicle45" value="4" required>
                        <label for="vehicle45_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle45_2" name="vehicle45" value="3" required>
                        <label for="vehicle45_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle45_1" name="vehicle45" value="2" required>
                        <label for="vehicle45_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle45_0" name="vehicle45" value="1" required>
                        <label for="vehicle45_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>46- تلاش برای بهبود یا تغییر زندگی ام را خیلی وقت است متوقف کرده ام.
                        </p>
                        <input class="page-next" type="radio" id="vehicle46_5" name="vehicle46" value="6" required>
                        <label for="vehicle46_5"> کاملا موافق</label><br>
                        <input class="page-next"type="radio" id="vehicle46_4" name="vehicle46" value="5" required>
                        <label for="vehicle46_4">موافق </label><br>
                        <input class="page-next"type="radio" id="vehicle46_3" name="vehicle46" value="4" required>
                        <label for="vehicle46_3">تا حدودی موافق</label><br/>
                        <input class="page-next"type="radio" id="vehicle46_2" name="vehicle46" value="3" required>
                        <label for="vehicle46_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle46_1" name="vehicle46" value="2" required>
                        <label for="vehicle46_1">مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle46_0" name="vehicle46" value="1" required>
                        <label for="vehicle46_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>47- خیلی افراد در زندگی بی هدف و سرگردان هستند ولی من یکی از آن‌ها نیستم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle47_5" name="vehicle47" value="6" required>
                        <label for="vehicle47_5"> کاملا موافق</label><br>
                        <input class="page-next"type="radio" id="vehicle47_4" name="vehicle47" value="5" required>
                        <label for="vehicle47_4">موافق</label><br>
                        <input class="page-next"type="radio" id="vehicle47_3" name="vehicle47" value="4" required>
                        <label for="vehicle47_3"> تا حدودی موافق</label><br/>
                        <input class="page-next"type="radio" id="vehicle47_2" name="vehicle47" value="3" required>
                        <label for="vehicle47_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle47_1" name="vehicle47" value="2" required>
                        <label for="vehicle47_1"> مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle47_0" name="vehicle47" value="1" required>
                        <label for="vehicle47_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>48- گذشته پستی‌وبلندی‌های زیادی داشته، اما در کل نمی¬خواهم آن را تغییر دهم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle48_5" name="vehicle48" value="6" required>
                        <label for="vehicle48_5"> کاملا موافق</label><br>
                        <input class="page-next"type="radio" id="vehicle48_4" name="vehicle48" value="5" required>
                        <label for="vehicle48_4">موافق </label><br>
                        <input class="page-next"type="radio" id="vehicle48_3" name="vehicle48" value="4" required>
                        <label for="vehicle48_3"> تا حدودی موافق</label><br/>
                        <input class="page-next"type="radio" id="vehicle48_2" name="vehicle48" value="3" required>
                        <label for="vehicle48_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle48_1" name="vehicle48" value="2" required>
                        <label for="vehicle48_1"> مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle48_0" name="vehicle48" value="1" required>
                        <label for="vehicle48_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>49- می دانم که  می توانم به دوستانم اعتماد کنم و آن‌ها نیز به من اعتماد کنند.
                        </p>
                        <input class="page-next" type="radio" id="vehicle49_5" name="vehicle49" value="6" required>
                        <label for="vehicle49_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle49_4" name="vehicle49" value="5" required>
                        <label for="vehicle49_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle49_3" name="vehicle49" value="4" required>
                        <label for="vehicle49_3">تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle49_2" name="vehicle49" value="3" required>
                        <label for="vehicle49_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle49_1" name="vehicle49" value="2" required>
                        <label for="vehicle49_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle49_0" name="vehicle49" value="1" required>
                        <label for="vehicle49_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>50- درباره ی خودم با آنچه برایم اهمیت دارد قضاوت می کنم و نه باارزش‌هایی دیگران فکر می‌کنند مهم است.
                        </p>
                        <input class="page-next" type="radio" id="vehicle50_5" name="vehicle50" value="6" required>
                        <label for="vehicle50_5"> کاملا موافق</label><br>
                        <input class="page-next" type="radio" id="vehicle50_4" name="vehicle50" value="5" required>
                        <label for="vehicle50_4">موافق </label><br>
                        <input class="page-next" type="radio" id="vehicle50_3" name="vehicle50" value="4" required>
                        <label for="vehicle50_3"> تا حدودی موافق</label><br/>
                        <input class="page-next" type="radio" id="vehicle50_2" name="vehicle50" value="3" required>
                        <label for="vehicle50_2"> تا حدودی مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle50_1" name="vehicle50" value="2" required>
                        <label for="vehicle50_1"> مخالف</label><br>
                        <input class="page-next" type="radio" id="vehicle50_0" name="vehicle50" value="1" required>
                        <label for="vehicle50_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>51- من توانسته ام خانه ای و سبکی از زندگی که دوست داشته ام برای خود بنا کنم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle51_5" name="vehicle51" value="6" required>
                        <label for="vehicle51_5"> کاملا موافق</label><br>
                        <input class="page-next"type="radio" id="vehicle51_4" name="vehicle51" value="5" required>
                        <label for="vehicle51_4">موافق </label><br>
                        <input class="page-next"type="radio" id="vehicle51_3" name="vehicle51" value="4" required>
                        <label for="vehicle51_3"> تا حدودی موافق</label><br/>
                        <input class="page-next"type="radio" id="vehicle51_2" name="vehicle51" value="3" required>
                        <label for="vehicle51_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle51_1" name="vehicle51" value="2" required>
                        <label for="vehicle51_1"> مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle51_0" name="vehicle51" value="1" required>
                        <label for="vehicle51_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>52- این گفته حقیقت دارد که شما نمی توانید به سگ پیر شیرین کاری یاد دهید.
                        </p>
                        <input class="page-next"type="radio" id="vehicle52_5" name="vehicle52" value="6" required>
                        <label for="vehicle52_5"> کاملا موافق</label><br>
                        <input class="page-next"type="radio" id="vehicle52_4" name="vehicle52" value="5" required>
                        <label for="vehicle52_4">موافق </label><br>
                        <input class="page-next"type="radio" id="vehicle52_3" name="vehicle52" value="4" required>
                        <label for="vehicle52_3">تا حدودی موافق</label><br/>
                        <input class="page-next"type="radio" id="vehicle52_2" name="vehicle52" value="3" required>
                        <label for="vehicle52_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle52_1" name="vehicle52" value="2" required>
                        <label for="vehicle52_1">مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle52_0" name="vehicle52" value="1" required>
                        <label for="vehicle52_0"> کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>53- گاهی می پرسم آیا همه‌چیز را که می توانستم در زندگی انجام دهم، انجام داده ام؟
                        </p>
                        <input class="page-next"type="radio" id="vehicle53_5" name="vehicle53" value="6" required>
                        <label for="vehicle53_5"> کاملا موافق</label><br>
                        <input class="page-next"type="radio" id="vehicle53_4" name="vehicle53" value="5" required>
                        <label for="vehicle53_4">موافق </label><br>
                        <input class="page-next"type="radio" id="vehicle53_3" name="vehicle53" value="4" required>
                        <label for="vehicle53_3">تا حدودی موافق</label><br/>
                        <input class="page-next"type="radio" id="vehicle53_2" name="vehicle53" value="3" required>
                        <label for="vehicle53_2">تا حدودی مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle53_1" name="vehicle53" value="2" required>
                        <label for="vehicle53_1"> مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle53_0" name="vehicle53" value="1" required>
                        <label for="vehicle53_0">کاملاً مخالف</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>54- وقتی خودم را با دوستان و آشنایان مقایسه می¬کنم، از همین‌که هستم احساس خوبی دارم.
                        </p>
                        <input class="page-next"type="radio" id="vehicle54_5" name="vehicle54" value="6" required>
                        <label for="vehicle54_5"> کاملا موافق</label><br>
                        <input class="page-next"type="radio" id="vehicle54_4" name="vehicle54" value="5" required>
                        <label for="vehicle54_4">موافق </label><br>
                        <input class="page-next"type="radio" id="vehicle54_3" name="vehicle54" value="4" required>
                        <label for="vehicle54_3"> تا حدودی موافق</label><br/>
                        <input class="page-next"type="radio" id="vehicle54_2" name="vehicle54" value="3" required>
                        <label for="vehicle54_2"> تا حدودی مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle54_1" name="vehicle54" value="2" required>
                        <label for="vehicle54_1">مخالف</label><br>
                        <input class="page-next"type="radio" id="vehicle54_0" name="vehicle54" value="1" required>
                        <label for="vehicle54_0">کاملاً مخالف</label><br>
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
