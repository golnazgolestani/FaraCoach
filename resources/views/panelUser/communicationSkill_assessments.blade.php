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
            <h3 >ارزیابی مهارت ارتباط فردی</h3>
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
                <form name="demo" id="demo" method="POST" action="/panel/effectiveListenings" class="myBook mt-4">
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
                        <p>1- گاهی مدتها با کسی صحبت – یا مکاتبه – می‌کنم و متوجه نمی‌شوم که منظورم را متوجه نشده است.</p>
                        <input class="page-next" type="radio" id="vehicle1_5" name="vehicle1" value="0" required />
                        <label for="vehicle1_5">تقریبا همیشه</label><br>
                        <input class="page-next" type="radio" id="vehicle1_4" name="vehicle1" value="1" required />
                        <label for="vehicle1_4">بیشتر اوقات</label><br>
                        <input class="page-next" type="radio" id="vehicle1_3" name="vehicle1" value="2" required />
                        <label for="vehicle1_3">نیمی از زمانها</label><br/>
                        <input class="page-next" type="radio" id="vehicle1_2" name="vehicle1" value="3" required />
                        <label for="vehicle1_2"> به ندرت</label><br>
                        <input class="page-next" type="radio" id="vehicle1_1" name="vehicle1" value="4" required />
                        <label for="vehicle1_1"> هیچ وقت</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>2- نمی‌توانم به سادگی دنیا را از نگاه فرد دیگری – که دیدگاه‌هایش با من تفاوت دارد – ببینم.</p>
                        <input class="page-next" type="radio" id="vehicle2_5" name="vehicle2" value="0" required>
                        <label for="vehicle2_5">تقریبا همیشه</label><br>
                        <input class="page-next" type="radio" id="vehicle2_4" name="vehicle2" value="1" required>
                        <label for="vehicle2_4">بیشتر اوقات </label><br>
                        <input class="page-next" type="radio" id="vehicle2_3" name="vehicle2" value="2" required>
                        <label for="vehicle2_3">نیمی از زمانها</label><br/>
                        <input class="page-next" type="radio" id="vehicle2_2" name="vehicle2" value="3" required>
                        <label for="vehicle2_2">به ندرت</label><br>
                        <input class="page-next" type="radio" id="vehicle2_1" name="vehicle2" value="4" required>
                        <label for="vehicle2_1">هیچ وقت</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>3- گاهی در هنگام مکالمه، احساسات طرف مقابل را تشخیص نمی‌دهم.</p>
                        <input class="page-next" type="radio" id="vehicle3_5" name="vehicle3" value="0" required>
                        <label for="vehicle3_5"> تقریبا همیشه</label><br>
                        <input class="page-next" type="radio" id="vehicle3_4" name="vehicle3" value="1" required>
                        <label for="vehicle3_4">بیشتر اوقات </label><br>
                        <input class="page-next" type="radio" id="vehicle3_3" name="vehicle3" value="2" required>
                        <label for="vehicle3_3">نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle3_2" name="vehicle3" value="3" required>
                        <label for="vehicle3_2"> به ندرت</label><br>
                        <input class="page-next"  type="radio" id="vehicle3_1" name="vehicle3" value="4" required>
                        <label for="vehicle3_1">هیچ وقت</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>4- به ایده ها و مفاهیم اصلی گوینده گوش می دهم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle4_5" name="vehicle4" value="0" required>
                        <label for="vehicle4_5">در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle4_4" name="vehicle4" value="1" required>
                        <label for="vehicle4_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle4_3" name="vehicle4" value="2" required>
                        <label for="vehicle4_3">نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle4_2" name="vehicle4" value="3" required>
                        <label for="vehicle4_2"> بیشتر زمانها</label><br>
                        <input class="page-next"  type="radio" id="vehicle4_1" name="vehicle4" value="4" required>
                        <label for="vehicle4_1">همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>5- به حرف های شفاهی گوینده گوش می دهم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle5_5" name="vehicle5" value="0" required>
                        <label for="vehicle5_5">در هیچ زمان</label><br>
                        <input  class="page-next" type="radio" id="vehicle5_4" name="vehicle5" value="1" required>
                        <label for="vehicle5_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle3" name="vehicle5" value="2" required>
                        <label for="vehicle3">نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle1" name="vehicle5" value="3" required>
                        <label for="vehicle1"> بیشتر زمانها</label><br>
                        <input class="page-next"  type="radio" id="vehicle2" name="vehicle5" value="4" required>
                        <label for="vehicle2"> همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>6- زبان بدن گوینده را مشاهده می کنم.</p>
                        <input class="page-next"  type="radio" id="vehicle6_5" name="vehicle6" value="0" required>
                        <label for="vehicle6_5">در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle6_4" name="vehicle6" value="1" required>
                        <label for="vehicle6_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle6_3" name="vehicle6" value="2" required>
                        <label for="vehicle6_3">نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle6_2" name="vehicle6" value="3" required>
                        <label for="vehicle6_2"> بیشتر زمانها</label><br>
                        <input class="page-next"  type="radio" id="vehicle6_1" name="vehicle6" value="4" required>
                        <label for="vehicle6_1">همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>7- ذهنم را باز نگه می دارم.</p>
                        <input class="page-next"  type="radio" id="vehicle7_5" name="vehicle7" value="0" required>
                        <label for="vehicle7_5"> در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle7_4" name="vehicle7" value="1" required>
                        <label for="vehicle7_4">به ندرت </label><br>
                        <input  class="page-next" type="radio" id="vehicle7_3" name="vehicle7" value="2" required>
                        <label for="vehicle7_3">نیمی از زمانها</label><br/>
                        <input  class="page-next" type="radio" id="vehicle7_2" name="vehicle7" value="3" required>
                        <label for="vehicle7_2"> بیشتر زمانها</label><br>
                        <input class="page-next"  type="radio" id="vehicle7_1" name="vehicle7" value="4" required>
                        <label for="vehicle7_1">همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>8- صحبت دیگران را برای آغاز کردن صحبت خودم، متوقف نمی کنم.
                        </p>
                        <input  class="page-next" type="radio" id="vehicle8_5" name="vehicle8" value="0" required>
                        <label for="vehicle8_5"> در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle8_4" name="vehicle8" value="1" required>
                        <label for="vehicle8_4">به ندرت </label><br>
                        <input  class="page-next" type="radio" id="vehicle8_3" name="vehicle8" value="2" required>
                        <label for="vehicle8_3">نیمی از زمانها</label><br/>
                        <input  class="page-next" type="radio" id="vehicle8_2" name="vehicle8" value="3" required>
                        <label for="vehicle8_2"> بیشتر زمانها</label><br>
                        <input  class="page-next" type="radio" id="vehicle8_1" name="vehicle8" value="4" required>
                        <label for="vehicle8_1"> همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>9- از پاسخ های گوش دادنی مناسب مانند: من می بینم، استفاده می کنم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle9_5" name="vehicle9" value="0" required>
                        <label for="vehicle9_5">در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle9_4" name="vehicle9" value="1" required>
                        <label for="vehicle9_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle9_3" name="vehicle9" value="2" required>
                        <label for="vehicle9_3">نیمی از زمانها</label><br/>
                        <input  class="page-next" type="radio" id="vehicle9_2" name="vehicle9" value="3" required>
                        <label for="vehicle9_2"> بیشتر زمانها</label><br>
                        <input  class="page-next" type="radio" id="vehicle9_1" name="vehicle9" value="4" required>
                        <label for="vehicle9_1">همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>10- جهت تشریح و توضیح معنی صحبت های فرد، سوالاتی را می پرسم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle10_5" name="vehicle10" value="0" required>
                        <label for="vehicle10_5"> در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle10_4" name="vehicle10" value="1" required>
                        <label for="vehicle10_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle10_3" name="vehicle10" value="2" required>
                        <label for="vehicle10_3">نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle10_2" name="vehicle10" value="3" required>
                        <label for="vehicle10_2"> بیشتر زمانها</label><br>
                        <input class="page-next"  type="radio" id="vehicle10_1" name="vehicle10" value="4" required>
                        <label for="vehicle10_1"> همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>11- در حالیکه فردی در حال صحبت کردن می باشد، شروع به صحبت نمی کنم.</p>
                        <input class="page-next"  type="radio" id="vehicle11_5" name="vehicle11" value="0" required>
                        <label for="vehicle11_5">در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle11_4" name="vehicle11" value="1" required>
                        <label for="vehicle11_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle11_3" name="vehicle11" value="2" required>
                        <label for="vehicle11_3">نیمی از زمانها</label><br/>
                        <input  class="page-next" type="radio" id="vehicle11_2" name="vehicle11" value="3" required>
                        <label for="vehicle11_2"> بیشتر زمانها</label><br>
                        <input  class="page-next" type="radio" id="vehicle11_1" name="vehicle11" value="4" required>
                        <label for="vehicle11_1"> همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>12- از زبان بدن مناسبی استفاده می کنم.
                        </p>
                        <input class="page-next"  type="radio" id="vehicle12_5" name="vehicle12" value="0" required>
                        <label for="vehicle12_5"> در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle12_4" name="vehicle12" value="1"required >
                        <label for="vehicle12_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle12_3" name="vehicle12" value="2"required >
                        <label for="vehicle12_3">نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle12_2" name="vehicle12" value="3" required>
                        <label for="vehicle12_2"> بیشتر زمانها</label><br>
                        <input class="page-next"  type="radio" id="vehicle12_1" name="vehicle12" value="4" required>
                        <label for="vehicle12_1"> همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>13- از حالات صورت مناسبی استفاده می کنم.</p>
                        <input class="page-next"  type="radio" id="vehicle13_5" name="vehicle13" value="0" required >
                        <label for="vehicle13_5"> در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle13_4" name="vehicle13" value="1" required >
                        <label for="vehicle13_4">به ندرت </label><br>
                        <input  class="page-next" type="radio" id="vehicle13_3" name="vehicle13" value="2" required >
                        <label for="vehicle13_3">نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle13_2" name="vehicle13" value="3" required >
                        <label for="vehicle13_2"> بیشتر زمانها</label><br>
                        <input  class="page-next" type="radio" id="vehicle13_1" name="vehicle13" value="4" required >
                        <label for="vehicle13_1">همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>14- حالات صورت و بدنم را در هنگام برقراری ارتباط با دیگران، بخوبی حفظ میکنم.
                        </p>
                        <input  class="page-next" type="radio" id="vehicle14_5" name="vehicle14" value="0" required >
                        <label for="vehicle14_5"> در هیچ زمان</label><br>
                        <input  class="page-next" type="radio" id="vehicle14_4" name="vehicle14" value="1" required >
                        <label for="vehicle14_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle14_3" name="vehicle14" value="2" required>
                        <label for="vehicle14_3"> نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle14_2" name="vehicle14" value="3" required >
                        <label for="vehicle14_2"> بیشتر زمانها</label><br>
                        <input class="page-next"  type="radio" id="vehicle14_1" name="vehicle14" value="4" required >
                        <label for="vehicle14_1"> همه زمانها</label><br>
                        <div class="col-12 text-center mt-3">
                            <button type="button" class="page-prev btn btn-danger col-3 ">قبلی</button>
                            <button type="button" class="page-next btn btn-primary col-3">بعدی</button>
                        </div>
                    </section>
                    <section >
                        <p>15- از خنده های تقلیدی و جعلی استفاده نمی کنم.</p>
                        <input class="page-next"  type="radio" id="vehicle15_5" name="vehicle15" value="0" required >
                        <label for="vehicle15_5">در هیچ زمان</label><br>
                        <input class="page-next"  type="radio" id="vehicle15_4" name="vehicle15" value="1" required>
                        <label for="vehicle15_4">به ندرت </label><br>
                        <input class="page-next"  type="radio" id="vehicle15_3" name="vehicle15" value="2" required>
                        <label for="vehicle15_3"> نیمی از زمانها</label><br/>
                        <input class="page-next"  type="radio" id="vehicle15_2" name="vehicle15" value="3" required>
                        <label for="vehicle15_2"> بیشتر زمانها</label><br>
                        <input class="page-next"  type="radio" id="vehicle15_1" name="vehicle15" value="4" required>
                        <label for="vehicle15_1"> همه زمانها</label><br>
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
