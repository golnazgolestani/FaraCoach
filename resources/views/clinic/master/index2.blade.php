<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css"  />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/clinic.css" />
    @yield('headerScript')
    <title>کلینیک فراکوچ</title>
</head>
<body>
<div class="container-fluid" dir="rtl" id="bg_header">
    @include('master.navbarTop')

</div>
<main class="container-fluid" dir="rtl">

    @yield('content')

    <footer class="row pb-5">
        <div class="col-12 col-md-4 mx-auto text-center rounded-lg shadow-lg position-relative p-3 bg-secondary" id="consultation_request">
            <p class="text-light">برای دریافت مشاوره جلسه کوچینگ تلفن خود را وارد کنید</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-warning" type="button" id="button-addon1">ثبت</button>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-3 text-right ">
                    <a href="" class="text-light">
                        <img src="/images/white-logo.png" class="img-fluid mb-5" />
                        <p class="text-justify">وب‌سایت کوچ شامل معرفی کوچ‌های متخصص در همه حوزه‌ها می‌باشد. این وب‌سایت با بهره‌گیری از
                            دانش و تجربه کوچ‌های متخصص در رشته‌های مختلف، تلاش می‌کند تا دریافت خدمات کوچینگ را برای
                            مراجعان آسان نماید و ارتباط مطمئنی را مابین کوچ و مراجع برقرار نماید.</p>
                    </a>
                </div>
                <div class="col-12 col-md-3 text-right pt-5">
                    <p class="text-light mb-3">لینک های مفید</p>
                    <ul >
                        <a href="">
                            <li>انتخاب کوچ</li>
                        </a>
                        <a href="">
                            <li>انتخاب کوچ</li>
                        </a>

                    </ul>
                </div>
                <div class="col-12 col-md-3 text-right pt-5">
                    <p class="text-light mb-3">لینک های مفید</p>
                    <ul >
                        <a href="">
                            <li>انتخاب کوچ</li>
                        </a>
                        <a href="">
                            <li>انتخاب کوچ</li>
                        </a>

                    </ul>
                </div>
                <div class="col-12 col-md-3 text-right pt-5">
                    <p class="text-light mb-3">لینک های مفید</p>
                    <ul >
                        <a href="">
                            <li>انتخاب کوچ</li>
                        </a>
                        <a href="">
                            <li>انتخاب کوچ</li>
                        </a>

                    </ul>
                </div>
            </div>

        </div>
    </footer>

</main>


<script src="/js/jquery-3.5.1.min.js"></script>
<script src=/js/popper.min.js ></script>
<script src=/js/bootstrap.min.js ></script>
<script src="/dashboard/plugins/jquery/jquery.slim.min.js" ></script>
<script src="/js/bootstrap.bundle.min.js" ></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
-->
</body>
</html>
