<!DOCTYPE html>
<html lang="fa">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>صفحه وبلاگ</title>

    <link href="{{asset('/fonts/fontawesome/css/all.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/bootstrap-rtl.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('/css/style.css')}}" rel="stylesheet"/>

    <style></style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" dir="rtl">
    <div class="container">
        <a class="navbar-brand" href="#">سیستم بلاگ فراکوچ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/{{$user->username}}">صفحه اصلی
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>-->

            </ul>
            <div class="ml-auto my-2 my-lg-0">
                <div class="section" id="b-section-navbar-search-form" name="Navbar: search form"><div class="widget BlogSearch" data-version="2" id="BlogSearch1">
                        <!--
                        <form method="/{{$user->username}}"  action="/{{$user->username}}" class="form-inline">
                            <input aria-label="Search this blog" class="form-control mr-sm-2" name="q" placeholder="جستجو در بلاگ" type="text">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">جستجو</button>
                        </form>-->
                    </div></div>
            </div>
        </div>
    </div>
</nav>





<!-- Page Content -->
<div class="container mt-5" dir="rtl">

    <div class="row" id="blog_home">

        <!-- Blog Entries Column -->
        <div class="col-md-9">
            <h1 class="my-4 border-bottom pb-3">
                <small>دلنوشته های {{$user->fname}} {{$user->lname}} در فراکوچ</small>
            </h1>

            <!-- Blog Post -->
            @yield('rowcontent')
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3">

            <!-- Search Widget
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                    </div>
                </div>
            </div>-->

            <!-- Side Widget -->
            <div class="card my-4 ">
                <h5 class="card-header bg-dark text-light ">درباره من</h5>
                <div class="card-body">
                    {{$user->aboutme}}
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-3">
                <h5 class="card-header  bg-dark text-light">دسته بندی مطالب</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @foreach($categoryposts as $item)
                                    <li>
                                        <a href="/{{$user->username}}/category/{{$item->category}}">{{$item->category}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories Widget
            <div class="card my-3">
                <h5 class="card-header">آرشیوها</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">آرشیو 1</a>
                                </li>
                                <li>
                                    <a href="#">آرشیو 2</a>
                                </li>
                                <li>
                                    <a href="#">آرشیو 3</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>-->


            <!-- Side Widget
            <div class="card my-4">
                <h5 class="card-header">banner</h5>
                <div class="card-body">
                    <img class="card-img-top" src="https://2.bp.blogspot.com/-vvG5hMTFOro/W6RaoxdAikI/AAAAAAAAK1k/jezYdP7fvfYvt15Jv8a0agrGQE2lMU8YgCKgBGAs/s1600/MASAI-2.jpg" alt="Card image cap">
                </div>
            </div>
             tweeter -->

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!--footer-->
<footer class="pt-3" dir="rtl">
    <!-- Top Footer Area Start
    <div class="foo_top_header_one section_padding_100_70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="kilimanjaro_part">
                        <h5>درباره من</h5>

                        <p>خلاصه مطالب در باره من</p>
                    </div>
                    <div class="m-top-15">
                        <h5>راه های ارتباطی</h5>
                        <ul>
                            <li class="text-dark d-inline"><a href="#" class="text-dark"><i class="fab fa-instagram"></i></a></li>
                            <li class="text-dark d-inline"><a href="#" class="text-dark"><i class="fab fa-telegram"></i></a></li>
                            <li class="text-dark d-inline"><a href="#" class="text-dark"><i class="fab fa-linkedin"></i></a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="kilimanjaro_part">
                        <h5>Tags Widget</h5>
                        <ul class=" kilimanjaro_widget">
                            <li><a href="#">Classy</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">One Page</a></li>
                            <li><a href="#">Multipurpose</a></li>
                            <li><a href="#">Minimal</a></li>
                            <li><a href="#">Classic</a></li>
                            <li><a href="#">Medical</a></li>
                        </ul>
                    </div>

                    <div class="kilimanjaro_part m-top-15">
                        <h5>Important Links</h5>
                        <ul class="kilimanjaro_links">
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Terms & Conditions</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>About Licences</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Help & Support</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Careers</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Privacy Policy</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Community & Forum</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="kilimanjaro_part">
                        <h5>Latest News</h5>
                        <div class="kilimanjaro_blog_area">
                            <div class="kilimanjaro_thumb">
                                <img class="img-fluid" src="https://3.bp.blogspot.com/--C1wpaf_S4M/W7V__10nRoI/AAAAAAAAK24/1NSfapuYSIY0f0wzXY9NgoH0FjQLT07YACKgBGAs/s1600/maxresdefault.jpg" alt="">

                            </div>
                            <a href="#">Your Blog Title Goes Here</a>
                            <p class="kilimanjaro_date">21 Jan 2018</p>
                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                        <div class="kilimanjaro_blog_area">
                            <div class="kilimanjaro_thumb">
                                <img class="img-fluid" src="https://3.bp.blogspot.com/--C1wpaf_S4M/W7V__10nRoI/AAAAAAAAK24/1NSfapuYSIY0f0wzXY9NgoH0FjQLT07YACKgBGAs/s1600/maxresdefault.jpg" alt="">
                            </div>
                            <a href="#">Your Blog Title Goes Here</a>
                            <p class="kilimanjaro_date">21 Jan 2018</p>
                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                        <div class="kilimanjaro_blog_area">
                            <div class="kilimanjaro_thumb">
                                <img class="img-fluid" src="https://3.bp.blogspot.com/--C1wpaf_S4M/W7V__10nRoI/AAAAAAAAK24/1NSfapuYSIY0f0wzXY9NgoH0FjQLT07YACKgBGAs/s1600/maxresdefault.jpg" alt="">
                            </div>
                            <a href="#">Your Blog Title Goes Here</a>
                            <p class="kilimanjaro_date">21 Jan 2018</p>
                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="kilimanjaro_part">
                        <h5>Quick Contact</h5>
                        <div class="kilimanjaro_single_contact_info">
                            <h5>Phone:</h5>
                            <p>+255 789 54 50 40 <br> +2255 766 90 94 00</p>
                        </div>
                        <div class="kilimanjaro_single_contact_info">
                            <h5>Email:</h5>
                            <p>support@webblogoverflow.com <br> luckmoshy@gmail.com</p>
                        </div>
                    </div>
                    <div class="kilimanjaro_part">
                        <h5>Latest Works</h5>
                        <div class="kilimanjaro_works">
                            <a class="kilimanjaro_works_img" href="img/gallery/1.jpg"><img src="img/gallery/1.jpg" alt=""></a>
                            <a class="kilimanjaro_works_img" href="img/gallery/4.jpg"><img src="img/gallery/4.jpg" alt=""></a>
                            <a class="kilimanjaro_works_img" href="img/gallery/5.jpg"><img src="img/gallery/5.jpg" alt=""></a>
                            <a class="kilimanjaro_works_img" href="img/gallery/7.jpg"><img src="img/gallery/7.jpg" alt=""></a>
                            <a class="kilimanjaro_works_img" href="img/gallery/10.jpg"><img src="img/gallery/10.jpg" alt=""></a>
                            <a class="kilimanjaro_works_img" href="img/gallery/11.jpg"><img src="img/gallery/11.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Footer Bottom Area Start -->
    <div class="text-center bg-dark pt-2 fixed-bottom ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-light">©تمامی حقوق این وبلاگ مربوط به موسسه  <a href="#">فراکوچ<i class="fa fa-love"></i></a> می باشد</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JavaScript -->

<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('/js/jquery-3.5.1.slim.min.js')}}" ></script>
</body>

</html>
