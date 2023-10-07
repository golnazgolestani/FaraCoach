@extends('user.master.index')

@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <style>
        #bd-root-tarikh_zemanat
        {
            display: inline !important;
        }
    </style>
@endsection

@section('content')
<div class="card-body" >
    <div class="border border-1 p-1 mb-2 mt-1 shadow-sm shadow">
        <form method="post" action="/panel/warrany/{{$course->shortlink}}/store" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="product_id" value="{{$course->id}}" />
            <p class="text-center">تعهدنامه آموزشی</p>
            <p class="text-center"> «دوره آموزش کوچینگ و تربیت کوچ (سطح 1) آکادمی بین المللی فراکوچ»</p>
            <p>فرهیخته گرامی، ضمن عرض سلام و خوش آمد، شرایط و تعهدات حضور شما در دوره به شرح ذیل می باشد. لطفا قبل از حضور در دوره، تعهدنامه را به دقت مطالعه و با بارگذاری نمونه امضا خود تایید بفرمایید.</p>

            <b>1.	مشخصات دانش پذیر:</b>
            <table class="table table-bordered table-striped table-hover text-left" style="line-height: 0;margin-top: 15px;">
                <tr>
                    <th>نام و نام خانوادگی</th>
                    <td class="text-center">{{Auth::user()->fname}} {{Auth::user()->lname}}</td>
                    <th>کد ملی</th>
                    <td  class="text-center">{{Auth::user()->codemelli}}</td>
                </tr>
                <tr>
                    <th>نام پدر</th>
                    <td  class="text-center">{{Auth::user()->father}}</td>
                    <th>شماره شناسنامه</th>
                    <td class="text-center">{{Auth::user()->shenasname}}</td>
                </tr>
                <tr>
                    <th>مدرک تحصیلی</th>
                    <td class="text-center">{{Auth::user()->education}}</td>
                    <th>محل صدور شناسنامه</th>
                    <td class="text-center">{{Auth::user()->born}}</td>
                </tr>
                <tr>
                    <th>تاریخ تولد</th>
                    <td class="text-center">{{Auth::user()->datebirth}}</td>
                    <th>وضعیت تأهل</th>
                    <td  class="text-center">
                        @if(Auth::user()->married==0)
                            مجرد
                        @elseif(Auth::user()->married==1)
                            متاهل
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>محل تولد</th>
                    <td  class="text-center">{{Auth::user()->born}}</td>
                    <th>نام لاتین</th>
                    <td  class="text-center">{{Auth::user()->fname_en}} {{Auth::user()->lname_en}}</td>
                </tr>
                <tr>
                    <th>تلفن تماس ثابت</th>
                    <td class="text-center" dir="ltr">{{Auth::user()->tel}}</td>
                    <th>تلفن همراه	</th>
                    <td class="text-center" dir="ltr">{{Auth::user()->tel}}</td>
                </tr>
                <tr>
                    <th>نشانی محل سکونت</th>
                    <td class="text-center">{{Auth::user()->address}}</td>
                    <th>کد پستی</th>
                    <td class="text-center">نداریم    </td>
                </tr>
                <tr>
                    <th>شغل</th>
                    <td class="text-center">{{Auth::user()->job}}</td>
                    <th>آیدی اینستاگرام</th>
                    <td class="text-center">{{Auth::user()->instagram}}</td>
                </tr>
            </table>
            <b>	2.	مشخصات دوره:</b>

            <table class="table table-bordered table-striped table-hover text-left" style="line-height: 0; margin-top: 15px; ">
                <tr>
                    <th style="width: 200px">نحوه برگزاری دوره</th>
                    <td class="text-center">

                        @if($course->type_course==1)
                            انلاین
                        @elseif($course->type_course==2)
                            حضوری
                        @endif
                    </td>
                    <th style="width: 200px">شماره گروه دانشجویی</th>
                    <td  class="text-center">{{Auth::user()->students->where('course_id','=',$course->id)->first()['warrany_id']}} </td>
                </tr>
                <tr>
                    <th>مدت زمان دوره</th>
                    <td class="text-center" colspan="3">از تاریخ {{$course->start}}  لغایت   {{$course->end}}  به مدت   {{$course->duration_date}}</td>
                </tr>
            </table>
            <b>	3.	تعهدات موسسه:</b>
            <p style="margin-top: 15px;">آموزش مهارت‌های استاندارد کوچینگ طبق سرفصل اعلام‌شده توسط آموزشگاه؛</p>
            <p>ارائه طرح درس دوره و معرفی منابع آموزشی و کمک‌آموزشی موردنیاز؛</p>
            <p>اعلام برنامه کلاسی گروه‌ها در ابتدای هر دوره و اعلام تغییرات احتمالی حداقل 1 هفته قبل از شروع کلاس؛</p>
            <p>معرفی پشتیبان های علمی مسلط به فرایند آموزش توسط آموزشگاه جهت راهنمایی دانش‌پذیر در امور آموزشی؛</p>
            <p>تهیه و ارائه جزوات مربوطه به دانش‌پذیر؛</p>
            <p>حضور مدرس یا مربی معرفی‌شده از سوی آموزشگاه در کلیه جلسات آموزشی؛</p>
            <p>اداره جلسات حضوری یا آنلاین در 2 بخش کارگاهی و تئوری؛</p>
            <p>عضویت دانشجویان در گروه‌های ارتباطی و آموزشی؛</p>
            <p>تعیین کوچ معتبر برای دانش‌پذیر و ارسال فایل گزارش عملکرد دانشجویی؛</p>
            <p>برگزاری جلسه جبرانی در صورت عدم تشکیل هر جلسه؛</p>
            <p><b>تبصره 1:</b>  چنانچه به دلایلی گروه دانش‌پذیر حذف شود، با توافق دانش‌پذیر دروس باقیمانده در گروه‌های دیگر ادامه خواهد یافت.</p>
            <p>دانش‌پذیر با پشت سر گذاشتن برنامه تعیین‌شده طبق شرایط اعلام‌شده، موفقیت در آزمون، تکمیل و ارائه فایل گزارش عملکرد دانشجویی و تکمیل مدارک و انجام تسویه حساب، مجاز به دریافت «گواهی‌نامه آموزش و تربیت کوچ معتبر (سطح 1)» خواهد شد.</p>
            <p>تعیین روال و زمان برگزاری آزمون گواهی‌نامه صرفاً در صلاحیت آموزشگاه و با توجه به آئین نامه می‌باشد؛</p>
            <b>	ضمانت بازگشت کامل وجه:</b>
            <p style="margin-top: 15px">به این معنی است که چنانچه هریک از شرایط زیر محقق نشود، حق مطالبه کامل وجه شهریه برای دانشپذیر محفوظ است:</p>
            <p>1.	دوره در موعد مقرر برگزار نشود و این امر موجب انصراف دانش پذیر از شرکت در دوره گردد؛</p>
            <p>2.	موسسه به تعهدات خود به دانش پذیر به طور کامل عمل نکرده باشد؛</p>
            <p>3.	دانش پذیر پس از اتمام دوره و انجام تمام تکالیف و مسئولیت های محوله از طرف اساتید، به ۸ ویژگی یک کوچ از دیدگاه ICF مسلط نشده باشد و قادر به برگزاری و اداره یک جلسه کوچینگ نباشد؛</p>
            <p>4.	به رفع اشکالات و نیازمندی های درسی و آموزشی دانش پذیر در طول دوره ترتیب اثر داده نشود.</p>
            <p>همچنین، دانش پذیر جهت درخواست  بازگشت  وجه موظف به انجام کامل موارد زیر می باشد:</p>
            <p>1.	منشور اخلاقی مؤسسه فراکوچ را رعایت نماید؛</p>
            <p>2.	تمام مفاد قرارداد توسط دانش پذیر در موعد مقرر و به طور کامل انجام شده باشد؛</p>
            <p>3.	مواردی که باعث نارضایتی دانش پذیر شده است را جهت بررسی و رفع اشکال کتباً به مؤسسه اعلام نماید؛</p>
            <p>4.	در تمامی جلسات و کلاس ها حضور فعال داشته باشد؛</p>
            <p>5.	تمام تکالیف درسی محوله را طبق نظر اساتید در موعد مقرر انجام دهد، به طوریکه مورد تأیید اساتید قرار گیرد.</p>

            <b style="margin-top: 15px">4.	تعهدات دانش‌پذیر:</b>
            <p style="margin-top: 15px">ارسال مدارک لازم طبق درخواست آموزشگاه؛ هرگونه تغییرات اعم از آدرس، شماره تماس و غیره باید به اطلاع آموزشگاه برسد.</p>
            <b>تعهدات پرداخت:</b>
            <p style="margin-top: 15px">ارائه و تحویل تصویر واضح فیش پرداختی در صورت پرداخت نقدی؛ نحوه تحویل توسط آموزشگاه اعلام خواهد شد؛</p>
            <p>ارسال تصویر واضح چک¬(ها) و اصل چک (ها) به آدرس اعلامی از سوی آموزشگاه در صورت پرداخت اقساطی؛</p>
            <p>پرداخت اقساط مربوطه طبق ماده 6 این تعهدنامه؛ </p>
            <p><b>تبصره 1:</b>  پرداخت¬ اقساط بر اساس تاریخ ثبت‌ شده در تعهدنامه الزامی است و هرگونه مرخصی، تغییر گروه یا به تعویق افتادن حضور در کلاس و موارد دیگر، در خصوص تعهدات مالی از دانش‌پذیر سلب مسئولیت نمی‌کند. </p>
            <p><b>تبصره 2:</b> در صورت عدم پرداخت به‌موقع و تسویه‌حساب، دانش‌پذیر از دریافت جزوات، لینک شرکت در جلسات و حضور در آن دوره محروم و پس از 2 ماه تعویق، تعهدنامه از جانب آموزشگاه به‌صورت یک‌طرفه فسخ شده و باید مجددا ثبت نام انجام شود.</p>
            <p>حضور به‌موقع در تمام جلسات آموزشی و کارگاهی حضوری یا آنلاین طبق برنامه درسی (حداقل60 ساعت) که توسط آموزشگاه ارائه می‌شود؛ هرگونه تغییر در تاریخ یا ساعت جلسات، حتی‌الامکان 1 هفته قبل به اطلاع دانش‌پذیر خواهد رسید؛</p>
            <p></p>
            <p><b> تبصره 3:</b> حضور در کلیه جلسات الزامی است؛ چنانچه دانش‌پذیر به هر دلیلی در جلسه‌ای غیبت داشته باشد، ملزم است با اطلاع آموزشگاه در جلسه‌های جبرانی همان درس در دوره‌های دیگر شرکت نماید؛ این امتیاز فقط برای 5 جلسه غیبت برقرار است.</p>
            <p>حفظ امانت‌داری؛ محتوا، فایل صوتی کلاس‌ها و جزوات مربوط به دوره‌ها، مشمول قانون حق انحصاری (کپی‌رایت) و نزد دانش‌پذیر به‌صورت امانت جهت استفاده شخصی می‌باشد و هرگونه استفاده تجاری به‌جز کاربرد در جلسات کوچینگ و انتشار آن‌ها توسط دانش‌پذیر به هر نحو ممنوع است. همچنین، ضبط کردن جلسات برای استفاده تجاری ممنوع می‌باشد؛</p>
            <p>اخذ تأییدیه صلاحیت‌های استاندارد ملی کوچینگ (منطبق بر صلاحیتهایICF) از مدرس در جلسات آزمون گواهینامه؛</p>
            <p> <b>  تبصره 4:</b> دانش پذیر تا پایان دوره و شرکت در آزمون حق معرفی خود در فضای مجازی به عنوان "کوچ و برگزاری جلسات کوچینگ" را ندارد و در صورت استعلام مراجع از موسسه، تمامی اطلاعات دانش پذیر در اختیار ایشان قرارگرفته و در قبال اختلافات بوجود آمده موسسه هیچ تعهدی نمیپذیرد.</p>
            <p>حفظ شئونات و قوانین کشوری و همچنین اصول اخلاقی و حرفه ای در طول دوره.</p>
            <p><b>تبصره 5:</b> مهلت شرکت در آزمون پایان دوره، تا اتمام مدت قرارداد 9 ماهه می باشد؛ در غیر اینصورت جهت شرکت در آزمون بعد از اتمام قرارداد، دانش پذیر موظف به پرداخت هزینه آزمون خواهد بود.</p>
            <b>5.	نکات آموزشی:</b>
            <p style="margin-top: 15px">کلاس آموزشی با مدرس و مربی : هفته ای یک جلسه 2 ساعته جهت آموزش تئوری و عملی؛</p>
            <p>جلسه تمرینی با پشتیبان علمی: هفته ای یک جلسه 2 ساعته جهت رفع اشکال؛</p>
            <p>تمرین با دانشجویان هم کلاسی جهت مرور مطالب آموزشی: هفته ای 10 دقیقه؛</p>
            <p>جلسات کوچینگ با کوچ معتبر: هفته ای یک جلسه 1 ساعته به مدت 6 هفته؛</p>
            <p>برگزاری جلسات کوچینگ با دانشجوی سطح بالا و همسطح طبق آئین نامه آموزشی به دانش پذیر اعلام خواهد شد؛</p>
            <p>طرفین به یکدیگر حق استفاده از معرفی یکدیگر را میدهند و فقط موسسه حق دارد از صوت و فیلم های کلاسی، در صورت نیاز استفاده و در شبکه های اجتماعی منتشر کند.</p>
            <p> <b>تبصره 7:</b> حد مجاز غیبت 5 جلسه می باشد که در صورت هماهنگی و تایید آموزش امکان گذراندن این جلسات با گروه های دیگر فراهم می شود؛</p>
            <p> <b> تبصره 8:</b> امکان دریافت مرخصی و انتقال به دوره بعد، در صورت هماهنگی و تائید واحد آموزش وجود دارد؛</p>
            <b>6.	شرایط فسخ:</b>
            <p style="margin-top: 15px">دانش پذیر حق فسخ یک‌جانبه تعهدنامه را ندارد.</p>
            <p>حضور در جلسه معارفه رایگان است و در صورت انصراف از دوره قبل از شروع جلسه اول آموزشی، تمام مبلغ تعهدنامه قابل‌ برگشت است؛ با شرکت در جلسات بعدی آموزشی، هیچ وجهی مسترد نخواهد شد و امکان انصراف وجود ندارد.</p>
            <p>در صورت عدم انجام تعهدات مالی توسط دانش‌پذیر، ارائه خدمات آموزشی به وی مقدور نمیباشد.</p>
            <p>چنانچه وقوع فورس ماژور اعم از بروز هرگونه رخداد طبیعی و غیرطبیعی و قهری که  انجام تعهدنامه را غیرممکن نماید یا باعث تعلیق انجام تعهدات طرفین برای مدت بیشتر از 1 ماه شوند، هریک از طرفین حق فسخ تعهدنامه را خواهند داشت.</p>
            <b>7.	شرایط پرداخت شهریه:</b>
            <p>کل مبلغ قرارداد
                @if(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()['type']=='invoice')
                    {{number_format(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->invoice['fi']) }} تومان می¬باشد؛ که مبلغ
                @else
                    {{number_format(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->order['final_off']) }} تومان می¬باشد؛ که مبلغ
                @endif

                @if(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()['type']=='invoice')
                    @if(!is_null(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->invoice['pre_payment']))
                        {{number_format(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->invoice['pre_payment'])}}
                    @else
                        {{number_format(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->order['pre_paymant'])}}
                    @endif
                @else

                    @if(is_null(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->order['pre_paymant']))
                        {{number_format(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->order['final_off'])}}
                    @else
                        {{number_format(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->order['pre_paymant'])}}
                    @endif
                @endif



                 تومان به‌عنوان پیش‌پرداخت در تاریخ  {{Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->order['date_fa']}} واریز گردید؛</p>
            <p> شرایط پرداخت الباقی مبلغ قرارداد با توافق طرفین به‌صورت نقد/ اقساط/تهاتر بورسیه به شرح زیر توافق گردید؛</p>
            <p>مانده مبلغ قابل پرداخت {{number_format((Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->order['baghimandeh_batakhfif']))}} تومان می باشد؛</p>
            <p>درصورت نیاز (توافق با واحد ثبت نام ، درخواست گواهینامه زودتر از موعد یا شرایط خاص ) دانش پذیر یک فقره چک ضمانت/ سفته به شماره <input type="number" name="shomare_zemanat"  /> به تاریخ <input type="text" name="tarikh_zemanat" id="tarikh_zemanat"  /> عهده بانک
                <select name="bak_zemanat">
                    <option>بانک ملی</option>
                    <option>بانک صادرات</option>
                    <option>بانک کشاورزی</option>
                    <option>بانک رسالت</option>
                    <option>بانک ملت</option>
                    <option>بانک سپه</option>
                    <option>بانک صنعت و معدن</option>
                    <option>بانک مسکن</option>
                    <option>بانک تعاون</option>
                    <option>بانک پست بانک</option>
                    <option>بانک اقتصاد نوین</option>
                    <option>بانک پارسیان</option>
                    <option>بانک کارآفرین</option>
                    <option>بانک سامان</option>
                    <option>بانک سینا</option>
                    <option>بانک خاورمیانه</option>
                    <option>بانک شهر</option>
                    <option>بانک تجارت</option>
                    <option>بانک رفاه</option>
                    <option>بانک حکمت ایرانیان</option>
                    <option>بانک گردشگری</option>
                    <option>بانک ایران زمین</option>
                    <option>بانک قوامین</option>
                    <option>بانک سرمایه</option>
                    <option>بانک پاسارگاد</option>
                    <option>بانک مهر</option>
                </select>
                به مبلغ
                <input type="number" name="fi_zemanat"  />
                تومان) در اختیار آموزشگاه قرار میدهد که در صورت انجام به موقع تعهدات پس از پایان دوره به دانش پذیر عودت خواهد شد.</p>

            <p>الباقی مبلغ قرارداد به‌صورت اقساطی در تعداد {{Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->get_faktors->count()}}  قسط به شرح زیر پرداخت می‌شود:</p>
            <div class="row">
                <div class="col-12 col-md-8 mx-auto table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <tr>
                            <th>#</th>
                            <th>تاریخ فاکتور</th>
                            <th>مبلغ فاکتور</th>
                            <th>وضعیت</th>
                        </tr>
                        @foreach(Auth::user()->checkouts->where('status','=',1)->where('product_id','=',$course->id)->first()->get_faktors as $faktor)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$faktor->date_faktor}}</td>
                                <td>{{number_format($faktor->fi)}} تومان</td>
                                <td >
                                    @if($faktor->status==1)
                                        پرداخت شده
                                    @else
                                        پرداخت نشده
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>



            <p><b>تبصره 9:</b> بدیهیست فقط چکهای ثبت  شده در سامانه صیاد امکان پذیرش دارند.</p>
            <p> <b>تبصره 10:</b> شرکت در آزمون پایان دوره و همچنین صدور و دریافت گواهینامه، منوط به تسویه حساب کامل دانش پذیر می باشد؛</p>

            <p class="mt-3">اینجانب {{Auth::user()->fname.' '.Auth::user()->lname}} با امضاء این تعهدنامه تایید مینمایم که کلیه مندرجات آن را مطالعه نموده و قبول مینمایم.</p>
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label for="signature_zemanat">امضا</label>
                        <input type="file" class="form-control-file" id="signature_zemanat" name="signature_zemanat">
                        <small class="d-block">لطفا عکس امضا خود را بارگذاری کنید</small>
                        <small class="d-block">حداکثر 1024 کیلوبایت</small>
                        <small class="d-block"> فرمت های مورد قبول : jpeg , jpg , png</small>

                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <img src="{{asset('/images/motahedin_emza-2.png')}}" class="img-fluid" />
                    <small class="text-muted">نمونه امضا مورد قبول</small>
                </div>
            </div>
            <button class="btn btn-success">تعهدنامه آموزشی فوق را میپذیرم</button>
        </form>
    </div>
</div>
@endsection

@section('footerScript')
@section('footerScript')
    <!--  DATE SHAMSI PICKER  --->
    <script src="{{asset('/js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('/js/kamadatepicker.holidays.js')}}"></script>
    <script>
        kamaDatepicker('tarikh_zemanat',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });
    </script>
@endsection
