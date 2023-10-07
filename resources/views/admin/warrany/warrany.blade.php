@extends('admin.master.index')

@section('content')
    <div class="col-12">

    <input type="hidden" name="type" value="scholarship_payment" />
    <p class="text-center">تعهدنامه آموزشی</p>
    <p class="text-center"> «دوره آموزش کوچینگ و تربیت کوچ (سطح 1) آکادمی بین المللی فراکوچ»</p>
    <p>فرهیخته گرامی، ضمن عرض سلام و خوش آمد، شرایط و تعهدات حضور شما در دوره به شرح ذیل می باشد. لطفا قبل از حضور در دوره، تعهدنامه را به دقت مطالعه و با بارگذاری نمونه امضا خود تایید بفرمایید.</p>

    <h4 class="text-danger">1.	مشخصات دانش پذیر:</h4>
    <table class="table table-bordered table-striped table-hover text-left" style="line-height: 0;margin-top: 15px;">
        <tr>
            <th>نام و نام خانوادگی</th>
            <td class="text-center">{{$warrany->scholarship->user->fname}} {{$warrany->scholarship->user->lname}}</td>
            <th>کد ملی</th>
            <td  class="text-center">{{$warrany->scholarship->user->codemelli}}</td>
        </tr>
        <tr>
            <th>نام پدر</th>
            <td  class="text-center">{{$warrany->scholarship->user->father}}</td>
            <th>شماره شناسنامه</th>
            <td class="text-center">{{$warrany->scholarship->user->shenasname}}</td>
        </tr>
        <tr>
            <th>مدرک تحصیلی</th>
            <td class="text-center">{{$warrany->scholarship->user->education}}</td>
            <th>محل صدور شناسنامه</th>
            <td class="text-center">{{$warrany->scholarship->user->born}}</td>
        </tr>
        <tr>
            <th>تاریخ تولد</th>
            <td class="text-center">{{$warrany->scholarship->user->datebirth}}</td>
            <th>وضعیت تأهل</th>
            <td  class="text-center">
                @if($warrany->scholarship->user->married==0)
                    مجرد
                @elseif($warrany->scholarship->user->married==1)
                    متاهل
                @endif
            </td>
        </tr>
        <tr>
            <th>محل تولد</th>
            <td  class="text-center">{{$warrany->scholarship->user->born}}</td>
            <th>نام لاتین</th>
            <td  class="text-center">{{$warrany->scholarship->user->fname_en}} {{$warrany->scholarship->user->lname_en}}</td>
        </tr>
        <tr>
            <th>تلفن تماس ثابت</th>
            <td class="text-center" dir="ltr">{{$warrany->scholarship->user->tel}}</td>
            <th>تلفن همراه	</th>
            <td class="text-center" dir="ltr">{{$warrany->scholarship->user->tel}}</td>
        </tr>
        <tr>
            <th>نشانی محل سکونت</th>
            <td class="text-center">{{$warrany->scholarship->user->address}}</td>
            <th>کد پستی</th>
            <td class="text-center">نداریم    </td>
        </tr>
        <tr>
            <th>شغل</th>
            <td class="text-center">{{$warrany->scholarship->user->job}}</td>
            <th>آیدی اینستاگرام</th>
            <td class="text-center">{{$warrany->scholarship->user->instagram}}</td>
        </tr>
    </table>
    <h4 class="text-danger">	2.	مشخصات دوره:</h4>

    <table class="table table-bordered table-striped table-hover text-left" style="line-height: 0; margin-top: 15px; ">
        <tr>
            <th style="width: 200px">نحوه برگزاری دوره</th>
            <td class="text-center">
                @if($warrany->scholarship->get_financial->scholarship_course->type_course==1)
                    انلاین
                @elseif($warrany->scholarship->get_financial->scholarship_course->type_course==2)
                    حضوری
                @endif
            </td>
            <th style="width: 200px">شماره گروه دانشجویی</th>
            <td  class="text-center">{{$warrany->scholarship->get_financial->scholarship_course['course']}} </td>
        </tr>
        <tr>
            <th>مدت زمان دوره</th>
            <td class="text-center" colspan="3">از تاریخ {{$warrany->scholarship->get_financial->scholarship_course->start}}  لغایت   {{$warrany->scholarship->get_financial->scholarship_course->end}}  به مدت   {{$warrany->scholarship->get_financial->scholarship_course->duration_date}}</td>
        </tr>
    </table>

    <h4 class="text-danger">	3.	تعهدات موسسه:</h4>
    <ul>
        <li style="margin-top: 15px;">آموزش مهارت‌های استاندارد کوچینگ طبق سرفصل اعلام‌شده توسط آموزشگاه؛</li>
        <li>ارائه طرح درس دوره و معرفی منابع آموزشی و کمک‌آموزشی موردنیاز؛</li>
        <li>اعلام برنامه کلاسی گروه‌ها در ابتدای هر دوره و اعلام تغییرات احتمالی حداقل 1 هفته قبل از شروع کلاس؛</li>
        <li>معرفی پشتیبان های علمی مسلط به فرایند آموزش توسط آموزشگاه جهت راهنمایی دانش‌پذیر در امور آموزشی؛</li>
        <li>تهیه و ارائه جزوات مربوطه به دانش‌پذیر؛</li>
        <li>حضور مدرس یا مربی معرفی‌شده از سوی آموزشگاه در کلیه جلسات آموزشی؛</li>
        <li>اداره جلسات حضوری یا آنلاین در 2 بخش کارگاهی و تئوری؛</li>
        <li>عضویت دانشجویان در گروه‌های ارتباطی و آموزشی؛</li>
        <li>تعیین کوچ معتبر برای دانش‌پذیر و ارسال فایل گزارش عملکرد دانشجویی؛</li>
        <li>برگزاری جلسه جبرانی در صورت عدم تشکیل هر جلسه؛</li>
        <li><b>تبصره 1:</b>  چنانچه به دلایلی گروه دانش‌پذیر حذف شود، با توافق دانش‌پذیر دروس باقیمانده در گروه‌های دیگر ادامه خواهد یافت.</li>
        <li>دانش‌پذیر با پشت سر گذاشتن برنامه تعیین‌شده طبق شرایط اعلام‌شده، موفقیت در آزمون، تکمیل و ارائه فایل گزارش عملکرد دانشجویی و تکمیل مدارک و انجام تسویه حساب، مجاز به دریافت «گواهی‌نامه آموزش و تربیت کوچ معتبر (سطح 1)» خواهد شد.</li>
        <li>تعیین روال و زمان برگزاری آزمون گواهی‌نامه صرفاً در صلاحیت آموزشگاه و با توجه به آئین نامه می‌باشد؛</li>
    </ul>
    <h4 class="text-danger">	ضمانت بازگشت کامل وجه:</h4>
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

    <h4 class="text-danger" style="margin-top: 15px">4.	تعهدات دانش‌پذیر:</h4>
    <ul>
        <li style="margin-top: 15px" class="font-weight-bold">ارسال مدارک لازم طبق درخواست آموزشگاه؛ هرگونه تغییرات اعم از آدرس، شماره تماس و غیره باید به اطلاع آموزشگاه برسد.</li>



        <li style="margin-top: 15px">ارائه و تحویل تصویر واضح فیش پرداختی در صورت پرداخت نقدی؛ نحوه تحویل توسط آموزشگاه اعلام خواهد شد؛</li>
        <li>ارسال تصویر واضح چک¬(ها) و اصل چک (ها) به آدرس اعلامی از سوی آموزشگاه در صورت پرداخت اقساطی؛</li>

        <li>پرداخت اقساط مربوطه طبق ماده 6 این تعهدنامه؛ </li>
    </ul>
    <p><b>تبصره 1:</b>  پرداخت¬ اقساط بر اساس تاریخ ثبت‌ شده در تعهدنامه الزامی است و هرگونه مرخصی، تغییر گروه یا به تعویق افتادن حضور در کلاس و موارد دیگر، در خصوص تعهدات مالی از دانش‌پذیر سلب مسئولیت نمی‌کند. </p>
    <p><b>تبصره 2:</b> در صورت عدم پرداخت به‌موقع و تسویه‌حساب، دانش‌پذیر از دریافت جزوات، لینک شرکت در جلسات و حضور در آن دوره محروم و پس از 2 ماه تعویق، تعهدنامه از جانب آموزشگاه به‌صورت یک‌طرفه فسخ شده و باید مجددا ثبت نام انجام شود.</p>
    <ul>
        <li>حضور به‌موقع در تمام جلسات آموزشی و کارگاهی حضوری یا آنلاین طبق برنامه درسی (حداقل60 ساعت) که توسط آموزشگاه ارائه می‌شود؛ هرگونه تغییر در تاریخ یا ساعت جلسات، حتی‌الامکان 1 هفته قبل به اطلاع دانش‌پذیر خواهد رسید؛</li>
    </ul>
    <p></p>

    <p> تبصره 3: حضور در کلیه جلسات الزامی است؛ چنانچه دانش‌پذیر به هر دلیلی در جلسه‌ای غیبت داشته باشد، ملزم است با اطلاع آموزشگاه در جلسه‌های جبرانی همان درس در دوره‌های دیگر شرکت نماید؛ این امتیاز فقط برای 5 جلسه غیبت برقرار است.</p>
    <ul>
        <li>حفظ امانت‌داری؛ محتوا، فایل صوتی کلاس‌ها و جزوات مربوط به دوره‌ها، مشمول قانون حق انحصاری (کپی‌رایت) و نزد دانش‌پذیر به‌صورت امانت جهت استفاده شخصی می‌باشد و هرگونه استفاده تجاری به‌جز کاربرد در جلسات کوچینگ و انتشار آن‌ها توسط دانش‌پذیر به هر نحو ممنوع است. همچنین، ضبط کردن جلسات برای استفاده تجاری ممنوع می‌باشد؛</li>
        <li>اخذ تأییدیه صلاحیت‌های استاندارد ملی کوچینگ (منطبق بر صلاحیتهایICF) از مدرس در جلسات آزمون گواهینامه؛</li>
    </ul>
    <p> <b>  تبصره 4:</b> دانش پذیر تا پایان دوره و شرکت در آزمون حق معرفی خود در فضای مجازی به عنوان "کوچ و برگزاری جلسات کوچینگ" را ندارد و در صورت استعلام مراجع از موسسه، تمامی اطلاعات دانش پذیر در اختیار ایشان قرارگرفته و در قبال اختلافات بوجود آمده موسسه هیچ تعهدی نمیپذیرد.</p>
    <ul>
        <li>حفظ شئونات و قوانین کشوری و همچنین اصول اخلاقی و حرفه ای در طول دوره.</li>
    </ul>
    <p><b>تبصره 5:</b> مهلت شرکت در آزمون پایان دوره، تا اتمام مدت قرارداد 9 ماهه می باشد؛ در غیر اینصورت جهت شرکت در آزمون بعد از اتمام قرارداد، دانش پذیر موظف به پرداخت هزینه آزمون خواهد بود.</p>
    <h4 class="text-danger">5.	نکات آموزشی:</h4>
    <ul>
        <li style="margin-top: 15px">کلاس آموزشی با مدرس و مربی : هفته ای یک جلسه 2 ساعته جهت آموزش تئوری و عملی؛</li>
        <li>جلسه تمرینی با پشتیبان علمی: هفته ای یک جلسه 2 ساعته جهت رفع اشکال؛</li>
        <li>تمرین با دانشجویان هم کلاسی جهت مرور مطالب آموزشی: هفته ای 10 دقیقه؛</li>
        <li>جلسات کوچینگ با کوچ معتبر: هفته ای یک جلسه 1 ساعته به مدت 6 هفته؛</li>
        <li>برگزاری جلسات کوچینگ با دانشجوی سطح بالا و همسطح طبق آئین نامه آموزشی به دانش پذیر اعلام خواهد شد؛</li>
        <li>طرفین به یکدیگر حق استفاده از معرفی یکدیگر را میدهند و فقط موسسه حق دارد از صوت و فیلم های کلاسی، در صورت نیاز استفاده و در شبکه های اجتماعی منتشر کند.</li>
    </ul>
    <p> <b>تبصره 7:</b> حد مجاز غیبت 5 جلسه می باشد که در صورت هماهنگی و تایید آموزش امکان گذراندن این جلسات با گروه های دیگر فراهم می شود؛</p>
    <p> <b> تبصره 8:</b> امکان دریافت مرخصی و انتقال به دوره بعد، در صورت هماهنگی و تائید واحد آموزش وجود دارد؛</p>
    <h4 class="text-danger">6.	شرایط فسخ:</h4>
    <ul>
        <li style="margin-top: 15px">دانش پذیر حق فسخ یک‌جانبه تعهدنامه را ندارد.</li>
        <li>حضور در جلسه معارفه رایگان است و در صورت انصراف از دوره قبل از شروع جلسه اول آموزشی، تمام مبلغ تعهدنامه قابل‌ برگشت است؛ با شرکت در جلسات بعدی آموزشی، هیچ وجهی مسترد نخواهد شد و امکان انصراف وجود ندارد.</li>
        <li>در صورت عدم انجام تعهدات مالی توسط دانش‌پذیر، ارائه خدمات آموزشی به وی مقدور نمیباشد.</li>
        <li>چنانچه وقوع فورس ماژور اعم از بروز هرگونه رخداد طبیعی و غیرطبیعی و قهری که  انجام تعهدنامه را غیرممکن نماید یا باعث تعلیق انجام تعهدات طرفین برای مدت بیشتر از 1 ماه شوند، هریک از طرفین حق فسخ تعهدنامه را خواهند داشت.</li>
    </ul>
    <hr/>
    <h4 class="text-danger">7.	شرایط پرداخت شهریه:</h4>
    <ul style="line-height: 2">
        <li>کل مبلغ قرارداد <b class="text-success">{{number_format($warrany->scholarship->get_financial->scholarship_course->fi)}}</b> تومان می¬باشد؛ که مبلغ <b class="text-success">{{number_format($warrany->scholarship->get_financial->schoalrshipPayment->pre_payment)}}</b> تومان به‌عنوان پیش‌پرداخت در تاریخ  {{$warrany->scholarship->get_financial->schoalrshipPayment->date_fa}} واریز گردید؛</li>
        <li> شرایط پرداخت الباقی مبلغ قرارداد با توافق طرفین به‌صورت نقد/ اقساط/تهاتر بورسیه به شرح زیر توافق گردید؛</li>
        <li>مانده مبلغ قابل پرداخت <b class="text-success">{{number_format($warrany->scholarship->get_financial->schoalrshipPayment->remaining)}}</b> تومان می باشد؛</li>

        <li>   مبلغ <b class="text-success">{{number_format(($warrany->scholarship->get_financial->schoalrshipPayment->fi*$warrany->scholarship->get_financial->schoalrshipPayment->score)/100)}}</b> تومان از هزینه دوره به عنوان بورسیه (تعهد همکاری علمی، فنی و تجاری) در نظر گرفته شده است که با همکاری های آتی دانشپذیر با موسسه فراکوچ،  طی مدت 14 ماه از تاریخ شروع دوره ، تهاتر و از بدهی وی کسر خواهد شد. بدیهی است پس از پایان این مدت چنانچه تسویه حساب کامل انجام  نشده باشد، دانشپذیر موظف است الباقی مبلغ بدهی خود را به صورت نقدی (یا از محل چک تسلیمی) تسویه نماید تا مجاز به در یافت گواهینامه خود گردد.</li>
        <li>درصورت نیاز (توافق با واحد ثبت نام ، درخواست گواهینامه زودتر از موعد یا شرایط خاص ) دانش پذیر یک فقره چک ضمانت/ سفته به شماره <b class="text-success">{{$warrany->scholarship->warrany->receipt}}</b> به تاریخ {{$warrany->scholarship->warrany->date_fa}} عهده بانک
            <b class="text-success">{{$warrany->scholarship->warrany->bank}}</b>
            به مبلغ
            <b class="text-success">{{$warrany->scholarship->warrany->fi}}</b>
            تومان) در اختیار آموزشگاه قرار میدهد که در صورت انجام به موقع تعهدات پس از پایان دوره به دانش پذیر عودت خواهد شد.</li>
        <li>الباقی مبلغ قرارداد به‌صورت اقساطی در تعداد {{$warrany->scholarship->get_financial->get_faktors->count()}}  قسط به شرح زیر پرداخت می‌شود:</li>
        <li>مبلغ باقیمانده قابل پرداخت به صورت نقدی <b class="text-success">{{number_format($warrany->scholarship->get_financial->schoalrshipPayment->remaining)}}</b> تومان می باشد که به شرح ذیل پرداخت خواهد شد:</li>
    </ul>
    <div class="row">
        <div class="col-12 col-md-8 mx-auto table-responsive">
            <table class="table table-striped table-bordered text-center">
                <tr>
                    <th>#</th>
                    <th>تاریخ فاکتور</th>
                    <th>مبلغ فاکتور</th>
                    <th>وضعیت</th>
                </tr>
                @foreach($warrany->scholarship->get_financial->get_faktors as $faktor)
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
    <p> <b>تبصره 10:</b>شرکت در آزمون پایان دوره و همچنین صدور و دریافت گواهینامه، منوط به تسویه حساب کامل دانش پذیر در دوره  های عادی و  برای دانشپذیران بورسیه ، تسویه حداقل 50 درصد  مبلغ  بورسیه می باشد؛</p>
    <p> <b>تبصره 11:</b>چنانچه  به دانشپذیر وام صندوق شکوفایی تعلق بگیرد، در صورتحساب تسویه تهاتر بورسیه لحاظ خواهد شد.</p>
    <hr/>

    <p class="mt-3">اینجانب {{Auth::user()->fname.' '.Auth::user()->lname}} با امضاء این تعهدنامه تایید مینمایم که کلیه مندرجات آن را مطالعه نموده و قبول مینمایم.</p>
    <div class="row">
        <div class="col-12 col-md-9">
            <div class="form-group">
                <label for="signature_zemanat">امضا</label>

                <small class="d-block">لطفا عکس امضا خود را بارگذاری کنید</small>
                <small class="d-block">حداکثر 1024 کیلوبایت</small>
                <small class="d-block"> فرمت های مورد قبول : jpeg , jpg , png</small>

            </div>
        </div>
        <div class="col-12 col-md-3">
            <img src="{{asset('/documents/signatures/'.$warrany->signature)}}" class="img-fluid" />
        </div>
    </div>

    </div>
@endsection
