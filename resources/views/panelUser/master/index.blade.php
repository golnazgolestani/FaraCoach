<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>پنل کاربری فراکوچ</title>
    <link rel="icon" href="{{('images/logo.png')}}"  />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- FILE MANAGER -->
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

    <link href="{{asset('../dashboard/dist/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('../css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('../css/timepicker.min.css')}}" rel="stylesheet" />
    <link href={{asset('../css/bootstrap-rtl.min.css')}} rel="stylesheet" />
    <link href="{{asset('../dashboard/dist/css/style.css')}}" rel="stylesheet" />


    <!-- <script src="{{asset('/js/app.js')}}"></script> -->
    @yield('headerScript')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link" id="goBack">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </a>
            </li>
        </ul>



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu
            <li class="nav-item ">
                <a class="nav-link"  href="/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="badge navbar-badge pr-4">خروج</span>
                </a>
            </li>
            -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                    <span class="badge  pr-4">{{Auth::user()->fname}} {{Auth::user()->lname}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="/" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title text-right">
                                    سایت اصلی
                                    <span class="float-left text-sm ">
                                        <i class="bi bi-house-fill"></i>
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/panel/profile" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title text-right">
                                    پروفایل
                                    <span class="float-left text-sm ">
                                        <i class="bi bi-person-circle"></i>
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/panel/user/password" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title text-right">
                                   تغییر رمز
                                    <span class="float-left text-sm ">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </h3>
                            </div>
                        </div>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title text-right">
                                    خروج
                                    <span class="float-left text-sm">
                                        <i class="bi bi-power"></i>
                                    </span>
                                </h3>
                            </div>
                        </div>

                    </a>
                </div>
            </li>

            <!-- Notifications Dropdown Menu
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge pr-4">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            -->
        </ul>
    </nav>
    <!-- /.navbar -->

@include('panelUser.master.leftNavbar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item active">داشبورد</li>
                            <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>

                        </ol>
                    </div>-->
                    <!-- /.col -->
                    <div class="col-sm-6 text-right">
                        <!-- <h1 class="m-0 text-dark">پنل مدیریت فراکوچ</h1> -->
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" >
                <!-- Main row -->
                <div class="row" dir="rtl">
                    @if($errors->any())
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(session('msg') && (session('errorStatus')))
                        <div class="col-12">
                            <div class="alert alert-{{session('errorStatus')}}">
                                <p class="p-0 m-0">{{session('msg')}}</p>
                            </div>
                        </div>
                    @endif
                    @yield('rowcontent')
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer" dir="rtl">

        <small>تمامی حقوق این سایت متعلق به مرکز آموزش کوچینگ ایران <a href="https://www.faracoach.com" target="_blank">فراکوچ</a> است</small> -
        <small>طراحی شده توسط <a href="" target="_blank">یاسر بهرامی</a> </small>
        <div class="float-left d-none d-sm-inline-block">
            <b>نسخه</b> 1.5.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

@include('sweet::alert')



<!--   Core JS Files   -->
<script src="{{asset('dashboard/assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/core/bootstrap.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src="{{asset('dashboard/assets/js/java.js')}}"></script>
<script src="{{asset('vendor/file-manager/js/file-manager.js')}}"></script>



<script src="{{asset('dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>





<script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>

<!-- <script src="{{asset('dashboard/dist/js/pages/dashboard2.js')}}"></script> -->

@yield('footerScript')
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="05ea1956-7561-4af6-a7ab-1c599909f103";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>
