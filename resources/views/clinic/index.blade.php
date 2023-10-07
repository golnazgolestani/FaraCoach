@extends('clinic.master.index')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>فـــراکـوچ </h1>
                    <h2>اعتبار کوچینگ ایران</h2>
                </div>
            </div>
            <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                @foreach($clinic_basic_infos as $clinic_basic_info)
                    @foreach($clinic_basic_info->children as $item)
                        <div class="col-xl-2 col-md-4">
                            <div class="icon-box">
                                <img src="{{asset('/images/clinic/tel.png')}}" width="80px" class="d-inline mb-3" />
                                <h3><a href="/coaches/category/{{$item->title}}">{{$item->title}}</a></h3>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section><!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="{{asset('/images/clinic/coaching.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
                    <h3 class=mb-4">جلسه کوچینگ چیست؟ </h3>
                    <p class="fst-italic">
                        جلسات کوچینگ را میتوان گفت‌وگویی هدفمند بین کوچ و مراجع(کوچی) تلقی کرد. جلسه کوچینگ، مجموعه‌ای از اقدامات بین کوچ و مراجع است که در آن درباره مسائلی چون عملکرد، موقعیت‌ها، اهداف بلند و کوتاه مدت، پیشرفت شغلی، مشکلات شخصی و کاری و… بحث شده و تلاش می‌شود تا در آن وضعیت شخص بهبود یابد. کوچ با پرسیدن سوالات جهت دار و هدفمند، به مراجع خود کمک میکند چالش خود را ریشه یابی کرده و دید درستی نسبت به خود بیاید. به بیان دیگر در جلسات کوچینگ مراجع با کمک کوچ، می تواند به مشکلاتش دید بهتری به دست آورده و مهارت حل مسئله را در خود بهبود بخشد..
                    </p>
                    <!--   <ul>
                            <li><i class="ri-check-double-line"></i>  قبل از جلسه کوچینگ : قبل از ورود به جلسه کوچینگ و حتی قبل از انتخاب کوچ مورد نظر، بهتراست بررسی کاملی از مساله خود داشته و حتی نکات قابل توجه را یادداشت کنید. تا بتوانید کوچ خود را با اطلاعات بیشتری از شرایط خود مطلع نمایید.</li>
                            <li><i class="ri-check-double-line"></i>زمان برگزاری جلسات کوچینگ: در حین برگزاری جلسه، حواس خود را به خوبی معطوف مکالمه خود و کوچ نمایید. به سوالات او فکر کرده و سعی کنید پاسخی صریح، واضح و صحیح به آنها داشته باشید!</li>
                            <li><i class="ri-check-double-line"></i>                         بعد از جلسه کوچینگ: معمولا در پایان جلسات کوچینگ، مراجع برای حرکت در مسیر پیشرفت خود تعهد میدهد تا اقدامی خاص را انجام دهد. تفکر، بررسی، آغاز یک کارو… از این اقدامات محسوب میشوند. به عنوان یک مراجع این تکالیف را جدی بگیرید و یقین داشته باشید هیچ کس به اندازه شما در آینده خودتان تاثیرگذار نخواهد بود!
                            </li>
                        </ul>
                        !-->
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{asset('/images/bank refah.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('/images/digikala.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('/images/elmofanavari.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('/images/hamrahaval.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('/images/oloom_pezeshki.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('/images/shahrdari_mashhad.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('/images/naft.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('/images/roshdana.png')}}" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div id="73537936991"  class="image col-lg-6" data-aos="fade-right"><script type="text/JavaScript" src="https://www.aparat.com/embed/Wc0pO?data[rnddiv]=73537936991&data[responsive]=yes"></script></div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                    <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                        <h4>مزایای استفاده از جلسات کوچینگ چیست؟ </h4>
                        <p>توانایی هدف گذاری، برنامه ریزی، حل مسئله، تغییر دیدگاه و مدیریت زمان، افزایش خودشناسی، خودآگاهی و مسئولیت پذیری، تصمیم گیری موثر، شناخت نقاط قوت و ضعف، افزایش اعتماد به نفس، افزایش یادگیری، ایجاد حس آرامش و مفید بودن، تاثیرگذاری، افزایش تعادل کارو زندگی، بهبود ارتباطات موثر، باز شدن گره های ذهنی، رفع موانع فردی، توانایی مدیریت برخورد، ریشه یابی مهارت های فردی و…
                            در نظر داشته باشید که یک کوچ حرفه ای، در جلسه کوچینگ به دور از هرگونه قضاوت، پیش داوری و تصوری از مراجع به سخنان وی گوش میدهد. به همین دلیل می توانید یقین داشته باشید که راه حل به دست آمده در یک جلسه کوچینگ کاملا زاییده ذهن خودتان است.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Features Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <!--<h2>خـدمات</h2>-->
                <p>خدمات ما به شما</p>
            </div>
            <div class="row">
                @foreach($clinic_basic_infos as $clinic_basic_info)
                    @foreach($clinic_basic_info->children as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bxl-dribbble">
                                        <img src="{{asset('/images/clinic/tel.png')}}" width="80px" class="d-inline mb-3" />
                                    </i></div>
                                <h4><a href="/coaches/category/{{$item->title}}">{{$item->title}}</a></h4>
                                <p>متن تستی خدمات ما به شما</p>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble">
                                <img src="{{asset('/images/clinic/tel.png')}}" width="80px" class="d-inline mb-3" />
                            </i></div>
                        <h4><a href="/coaches/category/">منابع انسانی</a></h4>
                        <p>متن تستی خدمات ما به شما</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble">
                                <img src="{{asset('/images/clinic/tel.png')}}" width="80px" class="d-inline mb-3" />
                            </i></div>
                        <h4><a href="/coaches/category/">منابع انسانی</a></h4>
                        <p>متن تستی خدمات ما به شما</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble">
                                <img src="{{asset('/images/clinic/tel.png')}}" width="80px" class="d-inline mb-3" />
                            </i></div>
                        <h4><a href="/coaches/category/">منابع انسانی</a></h4>
                        <p>متن تستی خدمات ما به شما</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3> درخواست همکاری </h3>
                <p> کلینیک فراکوچ به عنوان یکی از مراکز مشاوره، اطلاع‌رسانی و خدمات کارآفرینی اداره کل تعاون کار و رفاه اجتماعی خراسان رضوی، به صورت رسمی در حوزه توسعه فردی، کسب و کار و ارائه خدمات کوچینگ فعالیت می‌نماید. در همین راستا، از کلیه دانش‌آموختگان و فارغ‌التحصیلان کوچینگ آکادمی های معتبر داخلی و خارجی که متقاضی همکاری با این کلینیک هستند دعوت می‌شود با تکمیل فرم همکاری و ارسال مدارک و سوابق کاری، آمادگی خود را جهت همکاری اعلام نمایند.</p>
                <a class="cta-btn" href="#">درخواست همکاری</a>
            </div>
        </div>
    </section>
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <!--<section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portfolio</h2>
                <p>Check our Portfolio</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-3.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-4.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-5.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-6.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-7.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-8.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{asset('/images/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="{{asset('/images/img/portfolio/portfolio-9.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Portfolio Section --> !-->

    <!-- ======= Counts Section ======= -->
    <!--    <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row no-gutters">
                    <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-delay="100"></div>
                    <div class="col-xl-7 ps-4 ps-lg-5 pe-4 pe-lg-1 d-flex align-items-stretch" data-aos="fade-left" data-aos-delay="100">
                        <div class="content d-flex flex-column justify-content-center">
                            <h3>Voluptatem dignissimos provident quasi</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p>
                            <div class="row">
                                <div class="col-md-6 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="bi bi-emoji-smile"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="2" class="purecounter"></span>
                                        <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="bi bi-journal-richtext"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="2" class="purecounter"></span>
                                        <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et quia dere tan</p>
                                    </div>
                                </div>

                                <div class="col-md-6 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="bi bi-clock"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="35" data-purecounter-duration="4" class="purecounter"></span>
                                        <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus aut voluptate non vel</p>
                                    </div>
                                </div>

                                <div class="col-md-6 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="bi bi-award"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="4" class="purecounter"></span>
                                        <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et nemo pad der</p>
                                    </div>
                                </div>
                            </div>
                        </div>&lt;!&ndash; End .content&ndash;&gt;
                    </div>
                </div>

            </div>
        </section>--><!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    <!--    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('/images/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>&lt;!&ndash; End testimonial item &ndash;&gt;

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('/images/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>&lt;!&ndash; End testimonial item &ndash;&gt;

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>&lt;!&ndash; End testimonial item &ndash;&gt;

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>&lt;!&ndash; End testimonial item &ndash;&gt;

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>&lt;!&ndash; End testimonial item &ndash;&gt;
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>&lt;!&ndash; End Testimonials Section &ndash;&gt;-->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>تیم فراکوچ</h2>
                <p> کوچ های منتخب این ماه  </p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="{{asset('images/clinic/yaser.jpg')}}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>یاسر متحدین</h4>
                            <span>مدیرعامل فراکوچ</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="{{asset('images/clinic/yaser.jpg')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>یاسر متحدین</h4>
                                <span>مدیرعامل فراکوچ</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="300">
                        <div class="member-img">
                            <img src="{{asset('images/clinic/yaser.jpg')}}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>یاسر متحدین</h4>
                            <span>مدیرعامل فراکوچ</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="400">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="{{asset('images/clinic/yaser.jpg')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>یاسر متحدین</h4>
                                <span>مدیرعامل فراکوچ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <!--
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section>&lt;!&ndash; End Contact Section &ndash;&gt;
    -->
@endsection
