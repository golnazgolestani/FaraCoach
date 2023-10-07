<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}" />
    <link href="{{asset('landing/css/bootstrap-rtl.min.css')}}" rel="stylesheet" />
    <link href="{{asset('landing/css/jquery.countdown.css')}}" rel="stylesheet" />


    <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
    <link href="{{asset('landing/css/style.css')}}" rel="stylesheet" />

    <title>فراکوچ - مرکز آموزش کوچینگ ایران</title>
    <meta content="43 پس از برگزاری 42 دوره موفق آموزشی چهل و سومین دوره آموزش کوچینگ همراه با معتبرترین مدرک ملی کوچینگ با اعتبار بین المللی توضیحات و ثبت‌نام دریافت پکیج رایگان کوچینگ مشاوره با یک کوچ حرفه ای و دانلود کتاب آموزش کوچینگ است همچنین میتونین با ثبت نام این پکیج از تخفیف خرید دوره استفاده &hellip;" />
</head>
<body>
<main class="container-fluid" dir="rtl">
    <div class="container">
        <article class="row">
            @yield('rowTopBlue')
        </article>
    </div>
    <div class="container">
        @yield('rowShoar')
    </div>
    <div class="row" id="shoar">

        <div class="borderBlue"></div>
        <div class="container">
           @yield('whiteBox')
        </div>
        <div class="borderBlue borderBlue1"></div>
    </div>
    <footer>
        <div class="container">
            <div class="row">

            </div>
        </div>
    </footer>
</main>


<script src="{{asset('landing/js/jquery-3.5.1.slim.min.js')}}" ></script>
<script src="{{asset('landing/js/popper.min.js')}}" ></script>
<script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landing/js/jquery.countdown.js')}}"></script>
<script>
    $('#example').countdown({
        date: '{{$timeCounter}}'
    }, function () {
        alert('نخفیف به پایان رسید');
    });
</script>
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="{{asset('landing/js/video.js')}}"></script>
</body>
</html>
