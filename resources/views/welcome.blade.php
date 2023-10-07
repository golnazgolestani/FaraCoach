@extends('master.index')
@section('navbarTop')
    @include('master.navbarTop')
@endsection
@section('header')
    @include('master.header')
@endsection

@section('row1')
        <!--************  VIDEOS*****************-->
        <div class="container" id="videosHome">
            <div class="row">
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <video src="videos/box.mp4" controls="controls" poster="images/What-is-Coaching.jpg" width="100%"></video>
                <strong>هی رفیق!
                هیچوقت تسلیم نشو!</strong>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <video src="videos/what is coaching.mp4" controls="controls" poster="images/What-is-Coaching.jpg" width="100%"></video>
                <strong>می دونی کوچینگ یعنی چی؟</strong>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <video src="videos/shabe-aftabi-01.mp4" controls="controls" poster="images/What-is-Coaching.jpg" width="100%"></video>
                <strong>گفتگو استاد متحدین با موضوع نقش #کوچینگ در کارآفرینی – شبکه ۳ برنامه شب آفتابی
                </strong>
            </article>
            <div class="col-12" id="moreVideosHome">
                <a href="#">سایر فیلم ها</a>
            </div>
            </div>
        </div>
@endsection


@section('row2')
    <!-- Garanties Part-->
    <div class="container" id="garantiesServices">
        <div class="row" id="garanties">
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="media">
              <img src="images/Icon-01.png" class="mr-3" alt="...">
              <div class="media-body">
                <a href=""><h5 class="mt-0">گارانتی 100% بازگشت پول</h5></a>
                <p>کیفیت بالای خدمات به همراه ضمانت بازگشت 100 درصدی شهریه</p>

              </div>
            </div>
            <div class="media">
              <img src="images/Icon-02.png" class="mr-3" alt="...">
              <div class="media-body">
                <a href=""><h5 class="mt-0">اولین و تنها آموزشگاه مجاز کوچینگ در ایران</h5></a>
                <p>سیستم آموزشی معتبر به همراه پشتیبانی علمی و اجرایی منحصر به فرد </p>
              </div>
            </div>
            <div class="media">
              <img src="images/Icon-03.png" class="mr-3" alt="...">
              <div class="media-body">
                <a href=""><h5 class="mt-0">کیفیت استاندارد خدمات با مناسب‌ترین قیمت ممکن</h5></a>
                <p>قیمت مناسب خدمات با بالاترین نرخ بازگشت سرمایه شما </p>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6" id="services">
            <div class="col-12">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
              </svg>
              <h3>خدمات فراکوچ</h3>
            </div>
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">آموزش کوچینگ</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">جلسات کوچینگ</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">رویدادها</a>
                <a class="nav-link" id="nav-product-tab" data-toggle="tab" href="#nav-product" role="tab" aria-controls="nav-contact" aria-selected="false">محصولات</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>مؤسسه فراکوچ، کامل ترین دوره آموزش کوچینگ فردی و سازمانی از نظر محتوا و قالب اجرایی را برگزار می کند. محتوای آموزشی به گونه ای طراحی و برنامه ریزی شده است که در پایان این دوره، دانش پذیر طبق استانداردهای فدراسیون بین المللی کوچینگ (ICF)، تمام صلاحیت های لازم را آموخته و تمرین کرده باشد. طول دوره آموزشی 60 ساعت است که شامل 48 ساعت آموزش و کارگاه ارزیابی و 12 جلسه یک ساعته کوچینگ با 2 کوچ حرف های و سطح بالا می باشد.</p>
                <p> جهت کسب اطلاعات بیشتر و ثبت نام در دوره های آموزشی موسسه فراکوچ <a href=""> کلیک کنید </a> .</p>
              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <p>مؤسسه فراکوچ با بهره گیری از یک تیم منسجم با عضویت 30 کوچ حرفه ای کشوری و بین المللی تاکنون موفق به برگزاری بیش از 5000 جلسه کوچینگ فردی و سازمانی برای اقشار مختلف در ایران سایر کشورها و نیز مدیران عامل، مدیران ارشد و کارشناسان بیش از 30 سازمان و شرکت بزرگ کشور -نظیر همراه اول، وزارت نفت، دیجی کالا، مزرعه نمونه آستان قدس رضوی و …- شده است.</p>
                <p> جهت کسب اطلاعات بیشتر و ثبت نام در دوره های آموزشی موسسه فراکوچ <a href=""> کلیک کنید </a> .</p>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
              <div class="tab-pane fade" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">...</div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('row3')
    <!--************* COACHS -->
    <section class="row" id="coachsHome">
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h2>دوست داری سفر شکوفایی‌ات را با یک کوچ حرفه‌ای شروع کنی؟ </h2>
            <p>به راحتی میتونی بین همه کوچ های حرفه ای وقت جلسه کوچینگ رزور کنی همراه با جلسه معارفه رایگان </p>
            <a href="#" class="btn  btn-outline-light btn-lg" role="button" aria-pressed="true">مشاهده و مقایسه همه کوچ های حرفه ای</a>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8" dir="ltr">
          <article class="container">
            <div class="your-class col-12" id="listCoachsHome">
              <div class="items-coachs">
                <img src="images/Yaser-Motahedin.png" />
                <h2>یاسر متحدین</h2>
                <a href="#" class="profileCoach btn btn-warning btn-lg " role="button" >دیدن پروفایل</a>
                <a href="#" class="reserveCoach btn-outline-primary btn-lg " role="button" >رزرو یک جلسه رایگان</a>
              </div>
              <div class="items-coachs">
                <div class="items-coachs">
                  <img src="images/Seyed-Hesam-Aghayi-1.png" />
                  <h2>سید حسام آقائی</h2>
                  <a href="#" class="profileCoach btn btn-warning btn-lg " role="button" >دیدن پروفایل</a>
                  <a href="#" class="reserveCoach btn-outline-primary btn-lg " role="button" >رزرو یک جلسه رایگان</a>
                </div>
              </div>
              <div class="items-coachs">
                <div class="items-coachs">
                  <img src="images/Elham-Shakibafar.png" />
                  <h2>الهام شکیبافر</h2>
                  <a href="#" class="profileCoach btn btn-warning btn-lg " role="button" >دیدن پروفایل</a>
                  <a href="#" class="reserveCoach btn-outline-primary btn-lg " role="button" >رزرو یک جلسه رایگان</a>
                </div>
              </div>
              <div class="items-coachs">
                <div class="items-coachs">
                  <img src="images/Elahe-Fakoorizadeh.png" />
                  <h2>الهه فکوری زاده</h2>
                  <a href="#" class="profileCoach btn btn-warning btn-lg " role="button" >دیدن پروفایل</a>
                  <a href="#" class="reserveCoach btn-outline-primary btn-lg " role="button" >رزرو یک جلسه رایگان</a>
                </div>
              </div>
              <div class="items-coachs">
                <div class="items-coachs">
                  <img src="images/Sadeq-Nejat.png" />
                  <h2>محمدصادق نجات</h2>
                  <a href="#" class="profileCoach btn btn-warning btn-lg " role="button" >دیدن پروفایل</a>
                  <a href="#" class="reserveCoach btn-outline-primary btn-lg " role="button" >رزرو یک جلسه رایگان</a>
                </div>
              </div>
              <div class="items-coachs">
                <div class="items-coachs">
                  <img src="images/mahshid karkhanechi.jpg" />
                  <h2>مهشید کارخانه چی</h2>
                  <a href="#" class="profileCoach btn btn-warning btn-lg " role="button" >دیدن پروفایل</a>
                  <a href="#" class="reserveCoach btn-outline-primary btn-lg " role="button" >رزرو یک جلسه رایگان</a>
                </div>
              </div>
            </div>
          </article>
        </div>
    </section>
@endsection

@section('row4')
<div class="row" id="commentsHome">
    <section class="container">
      <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
          <div class="media">
            <img src="images/icon.png" class="mr-3" alt="...">
            <div class="media-body">
              <h2 class="mt-0">بازخورد ها و نظرات </h2>
              <p>تشویق کردن مدیران برای اینکه الگوی مربیگری را بخشی از شغل خود بدانند و به آن به عنوان یک تهدید نگاه نکنند.</p>
            </div>
          </div>
        </div>
        <article class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
          <div class="itemComments" dir="ltr">
            <div>
              <img src="images/elahe_khaleghi.jpg" />
              <p>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-quote-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm7.194 2.766c.087.124.163.26.227.401.428.948.393 2.377-.942 3.706a.446.446 0 0 1-.612.01.405.405 0 0 1-.011-.59c.419-.416.672-.831.809-1.22-.269.165-.588.26-.93.26C4.775 7.333 4 6.587 4 5.667 4 4.747 4.776 4 5.734 4c.271 0 .528.06.756.166l.008.004c.169.07.327.182.469.324.085.083.161.174.227.272zM11 7.073c-.269.165-.588.26-.93.26-.958 0-1.735-.746-1.735-1.666 0-.92.777-1.667 1.734-1.667.271 0 .528.06.756.166l.008.004c.17.07.327.182.469.324.085.083.161.174.227.272.087.124.164.26.228.401.428.948.392 2.377-.942 3.706a.446.446 0 0 1-.613.01.405.405 0 0 1-.011-.59c.42-.416.672-.831.81-1.22z"/>
                </svg>
              </p>
              <p>می خواستم ازتون تشکر کنم بابت جلسات کوچینگی که با هم داشتیم. این جلسات بسیار عالی بود و خیلی به من کمک کرد که مسیرم و اهدافم را مشخص کنم. و با آن پروژه ای که همان اول ب هم اسمش را گذاشتیم «پروژه پرواز»، اینقدر به خواسته‌ها و اهدافم رسیدم که فکر می‌کنم در این چند سال اخیر اینقدر پیشرفت نداشتم...</p>
              <h5> دکتر الهه خالقی</h5>
              <p>روانشناس</p>
            </div>
            <div>
              <img src="images/hamid_babazadeh.jpg" />
              <p>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-quote-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm7.194 2.766c.087.124.163.26.227.401.428.948.393 2.377-.942 3.706a.446.446 0 0 1-.612.01.405.405 0 0 1-.011-.59c.419-.416.672-.831.809-1.22-.269.165-.588.26-.93.26C4.775 7.333 4 6.587 4 5.667 4 4.747 4.776 4 5.734 4c.271 0 .528.06.756.166l.008.004c.169.07.327.182.469.324.085.083.161.174.227.272zM11 7.073c-.269.165-.588.26-.93.26-.958 0-1.735-.746-1.735-1.666 0-.92.777-1.667 1.734-1.667.271 0 .528.06.756.166l.008.004c.17.07.327.182.469.324.085.083.161.174.227.272.087.124.164.26.228.401.428.948.392 2.377-.942 3.706a.446.446 0 0 1-.613.01.405.405 0 0 1-.011-.59c.42-.416.672-.831.81-1.22z"/>
                </svg>
              </p>
              <p>یک کوچ مانند یک دوست واقعی و بدون قضاوت، کمک میکند تا ما بهتر و دقیقتر فکر کنیم و راه حل مسائل خود را از درون خود بدست اوریم...</p>
              <h5>مهندس حمید بابازاده</h5>
              <p>رییس هیئت مدیره شرکت مشهد سازه - ریاست اتحادیه صادر کنندگان خدمات مهندسی - خراسان رضوی</p>
            </div>
          </div>
        </article>
      </div>
    </section>
</div>
@endsection

@section('row5')
    <!--*********** Article & Events        -->
      <div class="container" dir="rtl" >
        <div class="row" >
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="eventsHome">
            <div class="col-12" >
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
              <h3>آخرین رویداد</h3>
              <a href="">همه رویدادها</a>
            </div>
            <div class="col-12">
              <img src="images/photo_2020-08-24_14-23-45-1024x768.jpg" class="w-100"/>
              <div class="col-12" id="titrEventHome">
                <a href="">افتتاحیه آموزشگاه فنی و حرفه ای آزاد فراکوچ</a>
              </div>
              <div class="col-12" id="detailsEventHome">
                <p>مکان :آموزشگاه فنی و حرفه ای آزاد فراکوچ </p>
                <p>زمان : 1399/06/02 </p>
              </div>
              <div class="col-12">
                <a href="#" class="btn btn-primary" role="button" aria-pressed="true">توضیحات بیشتر</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="articleHome">
            <div class="col-12" >
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-newspaper" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
              </svg>
              <h3>تازه های کوچینگ</h3>
              <a href="">همه مقالات</a>
            </div>
            <div class="articleHome">
              <div class="media">
                <img src="images/tose_fardi.jpg" class="mr-3" alt="...">
                <div class="media-body">
                  <a href="">
                      <h5 class="mt-0">آیا باورها، همان تجربه ما از زندگی است؟</h5>
                  </a>
                  <p>آیا باورها، همان تجربه ما از زندگی است؟کتاب‌هایی مانند «راز» و «قدرت» در افزایش محبوبیت ایده‌هایی نقش داشته‌اند که انسان‌ها می‌تواند آرزوها را از طریق تجسم و تفکر مثبت محقق کنند. باوجود این‌که این دیدگاه به دلیل اتکا به ادعاهای علمی غیر معتبر مانند استناد به فیزیک کوانتوم برای توضیح چگونگی عملکرد ذهن و همچنین
                  </p>
                </div>
              </div>
              <div class="media">
                <img src="images/ezzat nafs.jpg" class="mr-3" alt="...">
                <div class="media-body">
                  <a href="">
                      <h5 class="mt-0">عزت‌نفس، نیاز آشکار هر فرد (عزت‌نفس و فرزند پروری)</h5>
                  </a>
                  <p>عزت‌نفس، نیاز آشکار هر فرد آن‌طور که دوست دارم، وظایفم را انجام نمی‌دهم. هیچ‌کس در خانه به من توجه زیادی نمی‌کند. والدینم انتظارات بیش‌ازحدی از من دارند. همه‌چیز در زندگی من گره خورده است. آیا موارد بالا در مورد شما وزندگی‌تان صدق می‌کند؟ اگر پاسخ شما به آن‌ها مثبت است، باید به دنبال راهکارهایی باشید
                  </p>
                </div>
              </div>
              <div class="media">
                <img src="images/coaching.jpg" class="mr-3" alt="...">
                <div class="media-body">
                  <a href="">
                      <h5 class="mt-0">معرفی کوچینگ سازمانی</h5>
                  </a>
                  <p>معرفی کوچینگ سازمانی پیشگفتار مباحث «جستارهایی در قلمرو کوچینگ» به بررسی نحوه پیدایش کوچینگ و مروری بر ماهیت و چیستی آن پرداخته می‌شود. در این بخش، به بررسی تأثیری که کوچینگ می‌تواند در یک سازمان و کسب‌وکار داشته باشد، اشاراتی خواهد شد. مقدمه‌ای بر کوچینگ سازمانی امروزه، سازمان‌ها و شرکت‌ها ناچار به رقابت در بازارهایی

                  </p>
                </div>
              </div>
              <div class="media">
                <img src="images/etemad_benafs.jpg" class="mr-3" alt="...">
                <div class="media-body">
                  <a href="">
                      <h5 class="mt-0">مؤثرترین روش برای افزایش اعتمادبه‌نفس</h5>
                  </a>
                  <p>به نظر شما برای اینکه کسی اعتمادبه‌نفس داشته باشد، به چه توانایی‌هایی نیاز دارد؟ برای ایجاد و تقویت اعتمادبه‌نفس و ارزش‌گذاری خود، به چه مواردی نیاز داریم؟ تعریف شما از هر یک از این واژه‌ها چیست؟ اعتمادبه‌نفس/ عزت‌نفس/ احترام به نفس برای تقویت آن‌ها به دنبال عاملی بیرونی می‌گردید یا معتقدید در درون باید به
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('row6')
    <!--  ***************** Achievement *********************-->
      <div class="row" id="achievementHome">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-5" id="titrAchievementHome">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-award" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9.669.864L8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193l-1.51-.229L8 1.126l-1.355.702-1.51.229-.684 1.365-1.086 1.072L3.614 6l-.25 1.506 1.087 1.072.684 1.365 1.51.229L8 10.874l1.356-.702 1.509-.229.684-1.365 1.086-1.072L12.387 6l.248-1.506-1.086-1.072-.684-1.365z"/>
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                  </svg>
                  <h5>دستاوردهای فراکوچ </h5>
                  <p>Faracoch Achievement</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-7 col-xl-7">
                  <div class="achievement" dir="ltr">
                    <div>
                      <img src="images/achievement1.png" />
                    </div>
                    <div>
                      <img src="images/achievement2.png" />
                    </div>
                    <div>
                      <img src="images/achievement3.png" />
                    </div>
                    <div>
                      <img src="images/achievement4.png" />
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
@endsection

@section('row7')
        <!--********** Products *****************-->
      <div class="container" id="productsHome">
        <div class="row">
          <div class="col-12" >
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
            </svg>
            <h3>محصولات</h3>
            <a href="">همه محصولات</a>
          </div>
        </div>
        <div class="row clsproductsHome" >
          <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <img src="images/Targeting-in-the-coaching-session-300x300.jpg" class="w-100" />
            <p>کوچینگ</p>
            <a href="">
              <h2>محصول صوتی کارگاه هدف‌گذاری در جلسه کوچینگ</h2>
            </a>
            <p class="offProduct">149,000 تومان</p>
            <p class="fiProduct">99,000 تومان</p>
            <div class="col-12">
              <a href="" class="profileCoach btn btn-warning btn-lg w-100" role="button">
                <h5 class="mt-0">افزودن به سبد خرید</h5>
              </a>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <img src="images/Use-of-Instagram-in-marketing-300x300.jpg" class="w-100" />
            <p>توسعه فردی</p>
            <a href="">
              <h2>محصول صوتی کارگاه کاربرد اینستاگرام در مارکتینگ</h2>
            </a>
            <p class="offProduct">149,000 تومان</p>
            <p class="fiProduct">49,000 تومان</p>
            <div class="col-12">
              <a href="" class="profileCoach btn btn-warning btn-lg w-100" role="button">
                <h5 class="mt-0">افزودن به سبد خرید</h5>
              </a>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <img src="images/Miracle-Question-300x300.jpg" class="w-100" />
            <p>توسعه فردی</p>
            <a href="">
              <h2>محصول صوتی کارگاه جادوی پرسش (کوئسشنولوژی)</h2>
            </a>
            <p class="offProduct">49,000 تومان</p>
            <p class="fiProduct">49,00 تومان</p>
            <div class="col-12">
              <a href="" class="profileCoach btn btn-warning btn-lg w-100" role="button">
                <h5 class="mt-0">افزودن به سبد خرید</h5>
              </a>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <img src="images/Targeting-in-the-coaching-session-300x300.jpg" class="w-100" />
            <p>کوچینگ</p>
            <a href="">
              <h2>محصول صوتی کارگاه آموزشی تضاد، ارتباط، زندگی – ابزار ارتباطی NVC</h2>
            </a>
            <p class="offProduct">119,000 تومان</p>
            <p class="fiProduct">99,000 تومان</p>
            <div class="col-12">
              <a href="" class="profileCoach btn btn-warning btn-lg w-100" role="button">
                <h5 class="mt-0">افزودن به سبد خرید</h5>
              </a>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('row8')
    <!--   *******************   Customers-->
    <div class="container" id="customers">
        <div class="col-12">
          <h5>مشتریان فراکوچ </h5>
          <p>\ Faracoach customers</p>
        </div>
        <div class="col-12" dir="ltr">
          <div class="customersItem">
            <div>
              <img src="images/shahrdari_mashhad.png" />
            </div>
            <div>
              <img src="images/naft.png" />
            </div>
            <div>
              <img src="images/faniherfei.png" />
            </div>
            <div>
              <img src="images/oloom_pezeshki.png" />
            </div>
             <div>
              <img src="images/digikala.png" />
            </div>
            <div>
              <img src="images/hamrahaval.png" />
            </div>
          </div>
        </div>
    </div>
@endsection

@section('row9')
<div class="container" id="Partners">
    <div class="col-12">
      <h5>همکاران فراکوچ </h5>
      <p>\ Faracoach Partners</p>
    </div>
    <div class="col-12" dir="ltr">
      <div class="customersItem">
        <div>
          <img src="images/roshdana.png" />
        </div>
        <div>
          <img src="images/taavon.png" />
        </div>
        <div>
          <img src="images/moshaveran.png" />
        </div>
        <div>
          <img src="images/elmofanavari.png" />
        </div>
         <div>
          <img src="images/ideal.png" />
        </div>

      </div>
    </div>
  </div>
@endsection

@section('footer')
    @include('master.footer')
@endsection
