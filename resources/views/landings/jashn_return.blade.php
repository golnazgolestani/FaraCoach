@extends('master.index')
@section('headerscript')
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
            font-family:SGKara-bold;
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
            font-size:16px;
        }
        p{
            line-height:30px;
        }
        .btn{
            background-color:#a60802;
            color:#fff;
        }
        @media screen and (max-width:375px) and (min-width:320px){
            #img-des{
                width:35%;
            }
            h2{
                font-size:20px;
            }
            #img-mobile{
                width:90%;
            }
            ul {
                padding-left: 0rem;
                padding-right: 0rem;
            }
        }
    </style>
@endsection
@section('row1')
    <article class="mb-5">
        <!-------------------------------- CONTER --------------------->

        <div class="row mt-5 text-center mt-5 ">
            <div class="col-md-6 offset-md-3 col-12">
                <img id="img-mobile" src="{{asset('/images/baner.png')}}" class="img-fluid"/>
                <h2 class="mt-5">به جشن ما خیلی خوش اومدی</h2>
            </div>
        </div>
        <div class="col-md-10 offset-md-1 col-12 text-justify mt-3">
            <p id="small">
                از اونجا  که رسالت و تمامیت ما در این جشن اشاعه فرهنگ اصیل  و  ناب کوچینگ هست، ازت  میخوایم که مارو  در این مسیر همراهی کنی تا افراد بیشتری با کوچینگ اصیل و معتبر آشنا بشن و  بتونن به  شکوفایی فردی و شغلی خودشون برسن.
            </p>
            <h4  class="mt-3 mb-2">3  تا کار ساده دیگه  هست که لازمه  انجام  بدی تا  جزو برنده های خوش شانس ما باشی:</h4>
            <ul>
                <li>
                    <p>
                        5 تا از دوستان خوب و مستعد خودت رو زیر اخرین پست اینستاگرام فراکوچ منشن کن؛
                    </p>
                </li>
                <li>
                    <p>
                        همون پست رو هم به  مدت 24 ساعت استوری کن و پیج ما رو منشن کن تا پیامش برای ما بیاد
                    </p>
                </li>
                <li>
                    <P>
                        در روز جشن هم در لایو حضور داشته باش
                    </P>
                </li>
            </ul>
            <span>همین </span>
        </div>
        <div class="col-md-10 offset-md-1 col-12 text-justify mt-3">
            <h4 class="mt-3 mb-2">این نکات تکمیلی رو بخون</h4>
            <ul>
                <li>
                    <p>
                        برای استوری و منشن از ایدی@faracoach  استفاده کن
                    </p>
                </li>
                <li>
                    <p>
                        دقت کن پیجت خصوصی نباشه
                    </p>
                </li>
                <li>
                    <P>
                        میتونی هر 5 نفر رو در یک کامنت  منشن کنی (رنج سنی افرادی که منشن میکنی  بین 20 تا 50 سال باشه)
                    </P>
                </li>
                <li>
                    <P>
                        پیج های فیک و نامرتبط در قرعه کشی شرکت داده نمیشن
                    </P>
                </li>
            </ul>
        </div>
        <div class="col-md-10 offset-md-1 col-12 text-justify mt-3">
            <h2  class="mt-3 mb-2">میخوام شانس خودم را برای برنده شدن افزایش بدم:</h2>
            <h4  class="mt-3 mb-2">گه این موقعیت رو داری که  فعالیت بیشتری انجام بدی کافیه:</h4>
            <ul>
                <li>
                    <p>
                        لینک صفحه مربوط به این جشنواره را  انتشار دهید؛ ( هر بازدید یک شانس بیشتر)
                    </p>
                </li>
                <li>
                    <p>
                        ثبت نام هر فرد جدید با لینک اختصاصی تو (10 شانس بیشتر)
                    </p>
                </li>
                <li>
                    <p>
                        منشن افراد بیشتر زیر پست اخر (هر 5 منشن یک شانس بیشتر)
                    </p>
                </li>
            </ul>
        </div>
        <div class="row text-center">
            <h4 class="mt-3 mb-2">
                اگر هنوز تجربه حضور در یک جلسه کوچینگ را نداشتی؛
            </h4>
            <p>
                اگر تا به حال به دنبال آموزش کوچینگ بودی و شرایط تو برای شروع این سفر شگفت‌انگیز مهیا نبوده؛
                <br/>
                اگر برای تغییر آماده‌ای؛
                <br/>
                این یک  فرصت بی نظیره
            </p>


            @if(($user->resultoptions[0]!=1)||($user->resultoptions[1]!=1))
                <div class="col-md-6 col-12 my-5">
                    <h4>
                        برای شرکت در قرعه کشی موارد زیر را انجام دادم.
                    </h4>
                    <form method="post" action="/landPage/{{$user->id}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="custom-control custom-checkbox text-left pl-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" value="5 نفر از دوستانم رو تگ کردم"  name="options[]" />
                            <label class="custom-control-label" for="customCheck1">5 نفر از دوستانم رو تگ کردم.</label>
                        </div>
                        <div class="custom-control custom-checkbox text-left  pl-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" value="پست رو هم به مدت 24 ساعت استوری کردم و پیج فراکوچ رو هم منشن کردم."  name="options[]" />
                            <label class="custom-control-label" for="customCheck2">پست رو هم به مدت 24 ساعت استوری کردم و پیج فراکوچ رو هم منشن کردم.</label>
                        </div>
                        <input type="submit" class="btn mt-3" value="ارسال" />

                    </form>
                </div>
            @endif
            <div class="col-md-6 col-12  mb-4 ">
                <div class="card mt-4 col-12 " >
                    <div class="card-body text-center">
                        <h5>لینک دعوت اختصاصی شما</h5>
                        <p class="text-light bg-secondary p-2 dir-rtl text-center"  id="personal_link">{{asset('/jashn')."?q=".$user->id}}</p>
                    </div>
                </div>
            </div>

        </div>

        @if(($user->resultoptions[0]!=1)||($user->resultoptions[1]!=1))
            <div class="col-md-6 offset-md-3 col-12 mt-5 border border-2 border-success rounded">
                <fieldset>
                    <legend class="text-center mb-3 mt-2">جهت شرکت در قرعه کشی فرم زیر را تکمیل کنید</legend>
                    <form method="post" action="/jashn/{{$user->id}}/update">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="fname">نام:</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="{{$user->fname}}" required />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="lname">نام خانوادگی:</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="{{$user->lname}}" required  />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="email">پست الکترونیکی:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="instagram">آدرس صفحه اینستاگرام:</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{$user->instagram}}" required />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="mention">تعداد منشن شده:</label>
                                <input type="number" class="form-control" id="mention" name="mention" value="{{$user->mention}}" required />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="instagram">با کوچینگ چقدر آشنایی دارید:</label>
                                <div class="form-check">
                                    <label class="form-check-label" for="exampleRadios1">
                                        آشنایی ندارم
                                    </label>
                                    <input class="form-check-input" type="radio" name="introductioncoaching" id="exampleRadios1" value="آشنایی ندارم" required  @if($user->introductioncoaching=='آشنایی ندارم') checked  @endif  />
                                </div>
                                <div class="form-check">

                                    <label class="form-check-label" for="exampleRadios2">
                                        اطلاعات مختصری دارم
                                    </label>
                                    <input class="form-check-input" type="radio" name="introductioncoaching" id="exampleRadios2" value="اطلاعات مختصری دارم" required   @if($user->introductioncoaching=='اطلاعات مختصری دارم') checked  @endif  />
                                </div>
                                <div class="form-check">

                                    <label class="form-check-label" for="exampleRadios3">
                                        اطلاعات کامل دارم
                                    </label>
                                    <input class="form-check-input" type="radio" name="introductioncoaching" id="exampleRadios3" value="اطلاعات کامل دارم" required  @if($user->introductioncoaching=='اطلاعات کامل دارم') checked  @endif />
                                </div>

                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="instagram">آیا تمایل به حضور در دوره های آموزش کوچینگ دارید:</label>
                                <div class="form-check">
                                    <label class="form-check-label" for="attendingcoaching1">
                                        بلی
                                    </label>
                                    <input class="form-check-input" type="radio" name="attendingcoaching" id="attendingcoaching1" value="بلی" required @if($user->attendingcoaching=='بلی') checked  @endif  />
                                </div>
                                <div class="form-check">

                                    <label class="form-check-label" for="attendingcoaching2">
                                        خیر
                                    </label>
                                    <input class="form-check-input" type="radio" name="attendingcoaching" id="attendingcoaching2" value="خیر" required  @if($user->attendingcoaching=='خیر') checked  @endif />
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="instagram"> تمایل به استفاده از کدام خدمات کوچینگ دارید:</label>
                                <div class="form-check">

                                    <label class="form-check-label" for="coachingservices2">
                                        لایف کوچینگ
                                    </label>
                                    <input class="form-check-input" type="radio" name="coachingservices" id="coachingservices2" value="لایف کوچینگ" required @if($user->coachingservices=='لایف کوچینگ') checked  @endif />
                                </div>
                                <div class="form-check">

                                    <label class="form-check-label" for="coachingservices3">
                                        بیزنس کوچینگ
                                    </label>
                                    <input class="form-check-input" type="radio" name="coachingservices" id="coachingservices3" value="بیزنس کوچینگ" required @if($user->coachingservices=='بیزنس کوچینگ') checked  @endif  />
                                </div>


                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">بروزرسانی</button>
                            </div>



                        </div>
                    </form>
                </fieldset>
            </div>
        @endif
        <div class=" col-md-6 offset-md-3 col-12 text-center mt-5 ">
            <!--
            <span >تعداد بازدید از طریق لینک تو  </span>
            <input type="number" value="0" disabled><span>  بار</span>
            -->

            <div class="col-12  mb-4 ">
                <div class="card mt-4 col-12 bg-success" >
                    <div class="card-body text-center">
                        <h5>وضعیت ثبت نام شما در این قرعه کشی :</h5>
                        <small class="text-light mb-3 mt-3 ">این بخش توسط روابط عمومی تایید خواهد شد</small>
                        <p class=" bg-light p-2 text-center" > تگ کردن 5 نفر از دوستان @if($user->resultoptions[0]==1)  <b class="text-success">تایید شده</b>   @else  <b class="text-danger">هنوز تایید نشده</b>  @endif است </p>
                        <p class=" bg-light p-2 text-center" >استوری کردن 24 ساعته پست و منشن کردن پیج فراکوچ @if(isset($user->resultoptions[1])&&($user->resultoptions[1]==1))  <b class="text-success">تایید شده</b>   @else  <b class="text-danger">تایید نشده</b>  @endif است </p>
                        <p class=" bg-light p-2 text-center" >تعداد {{$user->introducedUser->count()}}  نفر از طریق لینک شما در این جشن شرکت کردن</p>
                    </div>
                </div>
            </div>

        </div>


    </article>
@endsection

@section('footerScript')
    <script>
        $("#personal_link").click(function()
        {
            navigator.clipboard.writeText($('#personal_link').text());
            alert('لینک دعوت اختصاصی شما کپی شد');
        });
    </script>
@endsection
