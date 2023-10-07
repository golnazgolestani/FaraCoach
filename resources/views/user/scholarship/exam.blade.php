<div class="card-body" >

    @if($scholarship->user->get_scholarshipExam->count()<2 && $scholarship->confirm_exam==0)
        <div class="container pb-4 mt-5">
            <div class="col-12 text-justify">
                <p>سلام به آزمون دوره  مقدماتی خوش آمدید </p>
                <p>این آزمون  هم از جهت  نمره  و امتیاز بورسیه اهمیت داره ( نمره زیر 50 بدون امتیاز ، 50 تا 70 ، فقط 10 و بالای 70 نمره  کامل  20 امتیاز ) و  هم برای صدور  گواهینامه  (فقط برای نمره  بالای 50 گواهینامه صادر میشه )</p>
                <p>این آزمون شامل 25 سواله که برای  جواب درست ، مناسب ترین گزینه را انتخاب نمایید.</p>
                <p>با آرزوی موفقیت، در مصاحبه میبینیمتون 🌺</p>
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
                    <form name="demo" id="demo" method="POST" action="/panel/scholarship/exam" class="myBook mt-4">
                        {{csrf_field()}}
                        <section >
                            <p>1- در کدام گزینه تعریف درستی از کوچینگ ارائه <u>نشده است</u>؟</p>
                            <input class="page-next" type="radio" id="vehicle1_5" name="vehicle1" value="0" required />
                            <label for="vehicle1_5"> کوچینگ یعنی کشف توانایی مراجع توسط مهارت یک کوچ</label><br>
                            <input class="page-next" type="radio" id="vehicle1_4" name="vehicle1" value="0" required />
                            <label for="vehicle1_4">کوچینگ یعنی تلاش برای رسیدن مراجع از دنیای موجود به دنیای مطلوب</label><br>
                            <input class="page-next" type="radio" id="vehicle1_3" name="vehicle1" value="4" required />
                            <label for="vehicle1_3"> کوچینگ یعنی راهنمایی مراجع برای رسیدن به هدف</label><br/>
                            <input class="page-next" type="radio" id="vehicle1_2" name="vehicle1" value="0" required />
                            <label for="vehicle1_2"> کوچینگ گفتگوی هدفدار بین کوچ و مراجع، برای کشف راه‌حل توسط مراجع</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>2- کدام گزینه در مورد کوچینگ صحیح <u>نمی باشد</u>?</p>
                            <input class="page-next" type="radio" id="vehicle2_5" name="vehicle2" value="4" required>
                            <label for="vehicle2_5">در کوچینگ از طریق فرمول و پروتکل های از پیش تعیین شده مساله  مراجع حل می‌شود</label><br>
                            <input class="page-next" type="radio" id="vehicle2_4" name="vehicle2" value="0" required>
                            <label for="vehicle2_4"> در کوچینگ تمرکز بر روی حال و آینده مراجع است  </label><br>
                            <input class="page-next" type="radio" id="vehicle2_3" name="vehicle2" value="0" required>
                            <label for="vehicle2_3">در کوچینگ به حل مشکلات گذشته مراجع پرداخته نمی‌شود</label><br/>
                            <input class="page-next" type="radio" id="vehicle2_2" name="vehicle2" value="0" required>
                            <label for="vehicle2_2"> در کوچینگ منبع دانش مراجع است</label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>3- اگر کوچ در زمینه یا موضوع مراجع اطلاعات یا دانش تخصصی دارد: .
                            </p>
                            <input class="page-next" type="radio" id="vehicle3_5" name="vehicle3" value="0" required>
                            <label for="vehicle3_5">با دریافت هزینه بیشتر این دانش و تخصص را به او ارائه می کند </label><br>
                            <input class="page-next" type="radio" id="vehicle3_4" name="vehicle3" value="4" required>
                            <label for="vehicle3_4">کوچ اجازه اعمال و انتقال اطلاعات یا دانش شخصی به مراجع را ندارد </label><br>
                            <input class="page-next" type="radio" id="vehicle3_3" name="vehicle3" value="0" required>
                            <label for="vehicle3_3">کوچ بعد از جلسه کوچینگ هم نمی‌تواند این اطلاعات یا دانش تخصصی را در اختیار مراجع قرار دهد</label><br/>
                            <input class="page-next"  type="radio" id="vehicle3_2" name="vehicle3" value="0" required>
                            <label for="vehicle3_2"> کوچ میتواند مستقیما راهکار لازم را  هر موقع صلاح ببیند، ارائه دهد</label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>4- اگر مراجع درخواست کند که کوچ برای او طرح کسب و کار بنویسد، کوچ چه کاری باید انجام دهد؟
                            </p>
                            <input class="page-next"  type="radio" id="vehicle4_5" name="vehicle4" value="0" required>
                            <label for="vehicle4_5">در ازای دریافت هزینه بنویسد</label><br>
                            <input class="page-next"  type="radio" id="vehicle4_4" name="vehicle4" value="0" required>
                            <label for="vehicle4_4">ننویسد چون کوچ هنوز تجربه ای ندارد </label><br>
                            <input class="page-next"  type="radio" id="vehicle4_3" name="vehicle4" value="0" required>
                            <label for="vehicle4_3">نپذیرد چرا که این کار مشاوره است و کوچینگ نیست</label><br/>
                            <input class="page-next"  type="radio" id="vehicle4_2" name="vehicle4" value="4" required>
                            <label for="vehicle4_2"> با همراهی با  مراجع به  او  کمک کند تا  موانع نوشتن طرح کسب و کار را پیدا کند </label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>5- پایه ای ترین چیزهایی که باعث تغییر در تمام ابعاد زندگی ما می‌شود حوزه ..... /...... /....... / ...... است. .
                            </p>
                            <input class="page-next"  type="radio" id="vehicle5_5" name="vehicle5" value="0" required>
                            <label for="vehicle5_5"> باورها / عقاید / تغییر/ نیاز </label><br>
                            <input  class="page-next" type="radio" id="vehicle5_4" name="vehicle5" value="0" required>
                            <label for="vehicle5_4">احساس / درک/ عقاید/ ارزش ها  </label><br>
                            <input class="page-next"  type="radio" id="vehicle3" name="vehicle5" value="0" required>
                            <label for="vehicle3">توانایی/ رفتار/ ارزش/ باور </label><br/>
                            <input class="page-next"  type="radio" id="vehicle1" name="vehicle5" value="4" required>
                            <label for="vehicle1"> افکار /عقاید / باورها / ارزش‌ها </label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>6- کدام گزینه گویای نظام ارزشها نیست؟ </p>
                            <input class="page-next"  type="radio" id="vehicle6_5" name="vehicle6" value="0" required>
                            <label for="vehicle6_5"> ارزش وابسته به زمان و مکان نیست </label><br>
                            <input class="page-next"  type="radio" id="vehicle6_4" name="vehicle6" value="0" required>
                            <label for="vehicle6_4">ارزش قابل دست  یافتن نیست </label><br>
                            <input class="page-next"  type="radio" id="vehicle6_3" name="vehicle6" value="0" required>
                            <label for="vehicle6_3"> منشا ارزش ها از باور ماست </label><br/>
                            <input class="page-next"  type="radio" id="vehicle6_2" name="vehicle6" value="4" required>
                            <label for="vehicle6_2"> توسعه و رشد یک ارزش محسوب می شود</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>7- رفتارهایی که از ما سرمی زند سه دلیل دارد:
                            </p>
                            <input class="page-next"  type="radio" id="vehicle7_5" name="vehicle7" value="0" required>
                            <label for="vehicle7_5"> کسب سود، ارضای نیازها، توسعه و رشد  </label><br>
                            <input class="page-next"  type="radio" id="vehicle7_4" name="vehicle7" value="0" required>
                            <label for="vehicle7_4"> شناساندن هویت، توسعه و رشد، دفع ضرر </label><br>
                            <input  class="page-next" type="radio" id="vehicle7_3" name="vehicle7" value="0" required>
                            <label for="vehicle7_3"> کسب تجربه، ابراز احساسات، بازخورد </label><br/>
                            <input  class="page-next" type="radio" id="vehicle7_2" name="vehicle7" value="4" required>
                            <label for="vehicle7_2"> کسب سود، دفع ضرر و رفتارهایی از سر عادت که عامل اصلی آن دیگر وجود ندارند </label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>8- از منظر حوزه تمرکز، کوچینگ با مشاوره به ترتیب چه تفاوتی دارد؟
                            </p>
                            <input  class="page-next" type="radio" id="vehicle8_5" name="vehicle8" value="0" required>
                            <label for="vehicle8_5"> با هم تفاوتی ندارند </label><br>
                            <input class="page-next"  type="radio" id="vehicle8_4" name="vehicle8" value="4" required>
                            <label for="vehicle8_4">تحقق اهداف مراجع/ حل مشکلات مراجع از ظریق ارائه راهکار  </label><br>
                            <input  class="page-next" type="radio" id="vehicle8_3" name="vehicle8" value="0" required>
                            <label for="vehicle8_3">تحقق اهداف مراجع/ انتقال تجربه </label><br/>
                            <input  class="page-next" type="radio" id="vehicle8_2" name="vehicle8" value="0" required>
                            <label for="vehicle8_2"> حل مشکلات ناشی از گذشته/ انتقال تجربه </label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>9- به طور کلی کوچینگ از دو بعد کلی با دیگر روشهای پشتیبان متفاوت است:
                            </p>
                            <input class="page-next"  type="radio" id="vehicle9_5" name="vehicle9" value="4" required>
                            <label for="vehicle9_5"> مخاطب/ رویکرد </label><br>
                            <input class="page-next"  type="radio" id="vehicle9_4" name="vehicle9" value="0" required>
                            <label for="vehicle9_4">هدف / برنامه ریزی </label><br>
                            <input class="page-next"  type="radio" id="vehicle9_3" name="vehicle9" value="0" required>
                            <label for="vehicle9_3"> تکنیک / مهارت </label><br/>
                            <input  class="page-next" type="radio" id="vehicle9_2" name="vehicle9" value="0" required>
                            <label for="vehicle9_2"> رویکرد /  هدف </label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>10- کوچینگ  بر کدام بخش وجودی انسان تمرکز دارد؟
                            </p>
                            <input class="page-next"  type="radio" id="vehicle10_5" name="vehicle10" value="0" required>
                            <label for="vehicle10_5">نقاط ضعف </label><br>
                            <input class="page-next"  type="radio" id="vehicle10_4" name="vehicle10" value="0" required>
                            <label for="vehicle10_4">احساسات منفی </label><br>
                            <input class="page-next"  type="radio" id="vehicle10_3" name="vehicle10" value="4" required>
                            <label for="vehicle10_3">نقاط قوت و استعدادها</label><br/>
                            <input class="page-next"  type="radio" id="vehicle10_2" name="vehicle10" value="0" required>
                            <label for="vehicle10_2"> حل مشکلات ناشی از گذشته/ انتقال تجربه </label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>11-  ویژگیهای یک کوچ خوب چه چیزی <u>نیست</u> ؟</p>
                            <input class="page-next"  type="radio" id="vehicle11_5" name="vehicle11" value="0" required>
                            <label for="vehicle11_5">توانایی برقراری ارتباط موثر داشته باشد .</label><br>
                            <input class="page-next"  type="radio" id="vehicle11_4" name="vehicle11" value="0" required>
                            <label for="vehicle11_4">پرسشگری درست را یاد داشته باشد . </label><br>
                            <input class="page-next"  type="radio" id="vehicle11_3" name="vehicle11" value="0" required>
                            <label for="vehicle11_3">عاشق کمک به دیگران باشد،علاقمند به رشد ،تغییر و موفقیت آنها باشد .</label><br/>
                            <input  class="page-next" type="radio" id="vehicle11_2" name="vehicle11" value="4" required>
                            <label for="vehicle11_2"> بتواند  با  تکنیکهای حل مساله مشکل مراجع را حل نماید</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>تفاوت کوچینگ و منتورینگ چه چیزی <u>نیست</u> ؟
                            </p>
                            <input class="page-next"  type="radio" id="vehicle12_5" name="vehicle12" value="0" required>
                            <label for="vehicle12_5"> منتورینگ فرایند طولانی دارد اما کوچینگ فرآیند کوتاه مدت با تمرکز بر توسعه عملکرد افراد است</label><br>
                            <input class="page-next"  type="radio" id="vehicle12_4" name="vehicle12" value="0"required >
                            <label for="vehicle12_4">یک منتور اصولا در کسب و کار تجربیات جدی دارد اما کوچ لزوما نیازی به تجربه از موضوع ندارد . </label><br>
                            <input class="page-next"  type="radio" id="vehicle12_3" name="vehicle12" value="0"required >
                            <label for="vehicle12_3">وظیفه کوچ تسهیل فرآیند توسعه وعملکرد اما منتور از طریق انتقال تجربه آموزش میدهد</label><br/>
                            <input class="page-next"  type="radio" id="vehicle12_2" name="vehicle12" value="4" required>
                            <label for="vehicle12_2"> تفاوت آنها  در نوع برگزاری جلسات حرفه ای است</label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>13- کوچ پذیری یعنی چه ؟
                            </p>
                            <input class="page-next"  type="radio" id="vehicle13_5" name="vehicle13" value="0" required >
                            <label for="vehicle13_5"> خود مراجع آماده  تغییر باشد</label><br>
                            <input class="page-next"  type="radio" id="vehicle13_4" name="vehicle13" value="0" required >
                            <label for="vehicle13_4">موضوع  مراجع ساده باشد </label><br>
                            <input  class="page-next" type="radio" id="vehicle13_3" name="vehicle13" value="0" required >
                            <label for="vehicle13_3">مراجع نیاز به ارجاع به درمان و مشاوره و آموزش نداشته باشد</label><br/>
                            <input class="page-next"  type="radio" id="vehicle13_2" name="vehicle13" value="4" required >
                            <label for="vehicle13_2"> الف و ج</label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>14-  فرایند کوچینگ از چه طریق به مراجع کمک می کند؟
                            </p>
                            <input  class="page-next" type="radio" id="vehicle14_5" name="vehicle14" value="0" required >
                            <label for="vehicle14_5"> ارائه راهکار مناسب </label><br>
                            <input  class="page-next" type="radio" id="vehicle14_4" name="vehicle14" value="4" required >
                            <label for="vehicle14_4">همراهی در تغییر دیدگاه و نگرش جدید </label><br>
                            <input class="page-next"  type="radio" id="vehicle14_3" name="vehicle14" value="0" required>
                            <label for="vehicle14_3">پرسشگری جهتمند برای روشنگری و اتخاذ تصمیم مناسب</label><br/>
                            <input class="page-next"  type="radio" id="vehicle14_2" name="vehicle14" value="0" required >
                            <label for="vehicle14_2"> مراجع  خودش برای خودش تصمیم میگیرد</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>15- کوچینگ در زندگی افراد چگونه عمل میکند؟
                            </p>
                            <input class="page-next"  type="radio" id="vehicle15_5" name="vehicle15" value="0" required >
                            <label for="vehicle15_5">  ارائه توصیه های تخصصی</label><br>
                            <input class="page-next"  type="radio" id="vehicle15_4" name="vehicle15" value="4" required>
                            <label for="vehicle15_4"> تمرکز بر عملکرد و استفاده از ظرفیت های موجود و بالقوه </label><br>
                            <input class="page-next"  type="radio" id="vehicle15_3" name="vehicle15" value="0" required>
                            <label for="vehicle15_3"> به عنوان ناجی و حلال مشکلات عمل میکند</label><br/>
                            <input class="page-next"  type="radio" id="vehicle15_2" name="vehicle15" value="0" required>
                            <label for="vehicle15_2">  تمرکز بر کسب دانش و مهارتهای شخصی</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>16- رویکرد کوچ، در ارزیابی عملکرد چگونه رویکردی است؟
                            </p>
                            <input class="page-next"  type="radio" id="vehicle16_5" name="vehicle16" value="0" required>
                            <label for="vehicle16_5">کوچ رفتاری امیدوارکننده دارد.</label><br>
                            <input class="page-next"  type="radio" id="vehicle16_4" name="vehicle16" value="0" required>
                            <label for="vehicle16_4">کوچ رفتاری امیدوارکننده و انگیزه بخش دارد. </label><br>
                            <input  class="page-next" type="radio" id="vehicle16_3" name="vehicle16" value="4" required>
                            <label for="vehicle16_3">کوچ رفتاری بی طرفانه و بدون نظر دارد.</label><br/>
                            <input class="page-next"  type="radio" id="vehicle16_2" name="vehicle16" value="0" required>
                            <label for="vehicle16_2"> کوچ با درنظرگرفتن احساسات مراجع نظر خود را بیان می کند.</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>17- مراجع به جلسه می‌آید با این موضوع که «در بورس سرمایه گذاری کنم یا ملک بخرم؟» کوچ در این مورد چه باید بکند؟
                            </p>
                            <input  class="page-next" type="radio" id="vehicle17_5" name="vehicle17" value="0" required>
                            <label for="vehicle17_5">او را به بیزینس کوچ ارجاع دهد </label><br>
                            <input class="page-next" type="radio" id="vehicle17_4" name="vehicle17" value="0" required>
                            <label for="vehicle17_4">اگر کوچ در این زمینه تخصص دارد به او در جلسه کمک کند  </label><br>
                            <input  class="page-next" type="radio" id="vehicle17_3" name="vehicle17" value="0" required>
                            <label for="vehicle17_3">او را راهنمایی می کند و از او هزینه اضافه دریافت میکند </label><br/>
                            <input class="page-next" type="radio" id="vehicle17_2" name="vehicle17" value="4" required>
                            <label for="vehicle17_2">این گونه موارد نیاز به وزن دهی یا ارزیابی از سوی کارشناس در محیط عمل دارد و کوچ موظف به  ارجاع است</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>18- اگر نتیجه مطلوب مراجع کاهش وزن باشد، یک کوچ سلامت می تواند
                            </p>
                            <input class="page-next" type="radio" id="vehicle18_5" name="vehicle18" value="0" required>
                            <label for="vehicle18_5">مراجع با تردمیل کوچ تمرین کند</label><br>
                            <input class="page-next" type="radio" id="vehicle18_4" name="vehicle18" value="0" required>
                            <label for="vehicle18_4">در مورد روشهای کاهش وزن به مراجع مشاوره دهد </label><br>
                            <input class="page-next"  type="radio" id="vehicle18_3" name="vehicle18" value="4" required>
                            <label for="vehicle18_3">مشخص کنید مراجع در جلساتی که هدف ان دست یافتن به کاهش وزن است بدنبال چه چیزی است</label><br/>
                            <input class="page-next"  type="radio" id="vehicle18_2" name="vehicle18" value="0" required>
                            <label for="vehicle18_2"> کوچینگ را با هدف کاهش وزن آغاز کند</label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>19- زمانیکه مراجع می گوید رابطه اش با شریکش بخاطر عدم وجود احساس درحال از بین رفتن است،کوچ باید این کار را انجام دهد.
                            </p>
                            <input class="page-next" type="radio" id="vehicle19_5" name="vehicle19" value="4" required>
                            <label for="vehicle19_5"> درحالیکه سکوت می کند منتظر بماند مراجع چیزهای بیشتری بگوید</label><br>
                            <input class="page-next" type="radio" id="vehicle19_4" name="vehicle19" value="0" required>
                            <label for="vehicle19_4">به مراجع بگوید همیشه همه چیز بهتر می شود </label><br>
                            <input class="page-next" type="radio" id="vehicle19_3" name="vehicle19" value="0" required>
                            <label for="vehicle19_3">از مراجع بپرسد پیشنهاد انجام چه کاری را می دهد</label><br/>
                            <input class="page-next" type="radio" id="vehicle19_2" name="vehicle19" value="0" required>
                            <label for="vehicle19_2"> از مراجع بپرسد چه احساسی دارد</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>20- مراجعی که بشدت منفعل و ارام است. کوچ باید
                            </p>
                            <input class="page-next" type="radio" id="vehicle20_5" name="vehicle20" value="4" required>
                            <label for="vehicle20_5"> این مساله را بررسی کرده و آنرا با مراجع به اشتراک بگذارد که دلیل کمبود انرژی وی چیست</label><br>
                            <input class="page-next" type="radio" id="vehicle20_4" name="vehicle20" value="0" required>
                            <label for="vehicle20_4">با مراجع خیلی پرانرژی صحبت کند و سعی کند به او روحیه بدهد </label><br>
                            <input class="page-next" type="radio" id="vehicle20_3" name="vehicle20" value="0" required>
                            <label for="vehicle20_3">برای روحیه دادن به او موسیقی راک پخش کند</label><br/>
                            <input class="page-next" type="radio" id="vehicle20_2" name="vehicle20" value="0" required>
                            <label for="vehicle20_2"> به او بگوید که افسرده است و او را به یک درمانگر ارجاع دهد</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>21- برای حمایت از مراجعی که می خواهد به سختی الگوی فکری خود را تغییر دهد،کوچ باید
                            </p>
                            <input class="page-next" type="radio" id="vehicle21_5" name="vehicle21" value="0" required>
                            <label for="vehicle21_5">مراجع را وادار کند تعداد دفعاتی که فکر می کند را بشمارد</label><br>
                            <input class="page-next" type="radio" id="vehicle21_4" name="vehicle21" value="0" required>
                            <label for="vehicle21_4">به مراجع تکنیکی را یاد بدهد که هنگام بروز ان الگوی فکری در ان اختلال ایجاد کند </label><br>
                            <input class="page-next" type="radio" id="vehicle21_3" name="vehicle21" value="0" required>
                            <label for="vehicle21_3">الگوی فکری جدیدی به او بیاموزد تا جایگزین الگوی قدیمی شود</label><br/>
                            <input class="page-next" type="radio" id="vehicle21_2" name="vehicle21" value="4" required>
                            <label for="vehicle21_2"> بررسی کند مراجع چه سودی از آن قالب فکری می برد</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>22- کوچ چگونه می تواند به بهترین وجه به خوداگاهی مراجع خود کمک کند؟
                            </p>
                            <input class="page-next" type="radio" id="vehicle22_5" name="vehicle22" value="0" required>
                            <label for="vehicle22_5"> با دادن مطالب خودیاری به مراجع</label><br>
                            <input class="page-next" type="radio" id="vehicle22_4" name="vehicle22" value="0" required>
                            <label for="vehicle22_4">با مشاوره دادن به مراجع درمورداینکه چه خوداگاهیهایی نیاز دارد </label><br>
                            <input class="page-next" type="radio" id="vehicle22_3" name="vehicle22" value="4" required>
                            <label for="vehicle22_3">با پرسیدن سوالات قدرتمند</label><br/>
                            <input class="page-next" type="radio" id="vehicle22_2" name="vehicle22" value="0" required>
                            <label for="vehicle22_2"> به مراجع اجازه دهد که درمورد زمانیکه به خوداگاهی رسید به کوچ اطلاع دهد</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>23- مراجع برای انتخاب بین گزینه های شغلی معضل دارد. کوچ بررسی می کند که ...........
                            </p>
                            <input class="page-next" type="radio" id="vehicle23_5" name="vehicle23" value="4" required>
                            <label for="vehicle23_5"> چه چیزی با ارزشها و اهداف بلند مدت مراجع همراستاست</label><br>
                            <input class="page-next" type="radio" id="vehicle23_4" name="vehicle23" value="0" required>
                            <label for="vehicle23_4">پرداخت بهتر در برابر کار کمتر چیست </label><br>
                            <input class="page-next" type="radio" id="vehicle23_3" name="vehicle23" value="0" required>
                            <label for="vehicle23_3"> با انجام چه کاری به خانواده و دوستانش بهتر خدمت می کند</label><br/>
                            <input class="page-next" type="radio" id="vehicle23_2" name="vehicle23" value="0" required>
                            <label for="vehicle23_2"> بپرسد بر مبنای مقیاس 10 چه رتبه ای به این گزینه ها می دهد</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>24- مراجع به دلیل داشتن رئیس سخت گیر می خواهد شغل خود را ترک کند.کوچ باید.
                            </p>
                            <input class="page-next" type="radio" id="vehicle24_5" name="vehicle24" value="0" required>
                            <label for="vehicle24_5"> به مراجع کمک کند تا گزینه های ترک شغل را بررسی کند</label><br>
                            <input class="page-next" type="radio" id="vehicle24_4" name="vehicle24" value="4" required>
                            <label for="vehicle24_4">مساله را بررسی کند تا ببیند مراجع چگونه می تواند با رئیسش ارتباط برقرار کند </label><br>
                            <input class="page-next" type="radio" id="vehicle24_3" name="vehicle24" value="0" required>
                            <label for="vehicle24_3">نیاز به جرات ورزی را به مراجعش اموزش دهد</label><br/>
                            <input class="page-next" type="radio" id="vehicle24_2" name="vehicle24" value="0" required>
                            <label for="vehicle24_2"> از مراجع در مورد اینکه همکارانش چه احساسی درمورد رئیسشان دارند ،بپرسد</label><br>
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>
                        <section >
                            <p>25- اکثر کوچینگها به کوچینگ زندگی ختم می شود زیرا
                            </p>
                            <input class="page-next" type="radio" id="vehicle25_5" name="vehicle25" value="0" required>
                            <label for="vehicle25_5"> کوچ و مراجع هنوز زندگی می کنند</label><br>
                            <input class="page-next" type="radio" id="vehicle25_4" name="vehicle25" value="0" required>
                            <label for="vehicle25_4">زندگی دائما با مسائل مختلفی معلق است </label><br>
                            <input class="page-next" type="radio" id="vehicle25_3" name="vehicle25" value="4" required>
                            <label for="vehicle25_3"> مباحث اصلی در مورد فرضیات،باورها و ارزشهاست</label><br/>
                            <input class="page-next" type="radio" id="vehicle25_2" name="vehicle25" value="0" required>
                            <label for="vehicle25_2"> شخص کار می کند که زندگی کند</label><br>

                            <div class="col-12 text-center mt-3">
                                <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                                <button type="button" class="page-next btn btn-primary col-12 col-md-3">بعدی</button>
                            </div>
                        </section>

                        <section class="page">
                            <!-- <a href="#">Terms of Service</a><br/>
                            <input type="checkbox" id="ts" name="ts" value="1" required />
                            <label for="ts"> I agree</label><br />
                            -->
                            <button type="button" class="page-prev btn btn-danger col-12 col-md-3">قبلی</button>
                            <button type="submit" class="page-next btn btn-success col-12 col-md-3" id="sendForm">پایان آزمون</button>
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
    @else
        @if($scholarship->confirm_exam==1)
            <div class="alert alert-success">
                تبریک شما در آزمون مقدماتی بورسیه کوچینگ قبول شده اید
            </div>
            @foreach($scholarship->user->get_scholarshipExam as $item)
                @if($loop->iteration==1)
                   <div class="alert alert-warning">نمره کسب شده در آزمون نوبت اول : {{$item->score}}</div>
                @elseif($loop->iteration==2)
                    <div class="alert alert-warning">نمره کسب شده در آزمون نوبت دوم : {{$item->score}}</div>
                @endif
            @endforeach

            @if(($scholarship->confirm_webinar==1) && ($scholarship->confirm_exam==1))
                <p>برای کسب مدرک ICF بورسیه کوچینگ باید مراحل زیر را طی کنید:</p>
                <ul>
                    <li>شرکت در وبینار آموزشی بورسیه کوچینگ و وارد کرد کد های داده شده در بخش آموزش</li>
                    <li>شرکت در آزمون بورسیه کوچینگ و کسب نمره قبولی در آزمون</li>
                    <li>وارد کردن نام و نام خانوادگی خود به صورت انگلیسی در قسمت پروفایل</li>
                </ul>
                <div class="text-center">
                        <a href="{{asset('/panel/scholarship/certificate/download')}}" class="btn btn-primary">دانلود گواهینامه</a>
                </div>
            @endif

        @else
            <div class="alert alert-danger">
                متاسفانه امتیاز شما در آزمون مقدماتی به حد نصاب ممکن نرسید
            </div>
            @foreach($scholarship->user->get_scholarshipExam as $item)
                <div class="alert alert-warning">آزمون {{$loop->iteration}} نمره =  {{$item->score}}</div>
            @endforeach
        @endif


    @endif

</div>
