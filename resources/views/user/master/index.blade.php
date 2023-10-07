<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl" dir="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>پورتال فراکوچ</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/images/logo.png') }}">
    <meta name="theme-color" content="#5A8DEE">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/vendors/css/vendors.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/vendors/css/extensions/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/vendors/css/pickers/datepicker-jalali/bootstrap-datepicker.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/plugins/extensions/swiper.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/pages/faq.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/pages/app-email.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/intl_tel/css/intlTelInput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/css/pages/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/intl_tel/css/intlTelInput.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        @font-face {
            font-family: 'Lalezar';
            font-style: normal;
            font-weight: 400;
            src: url('{{asset('/fonts/Lalezar.woff2')}}') format('woff2');

        }
    </style>

    <link rel="stylesheet" property="stylesheet" href="/modules/system/assets/css/framework.extras.css">
    <script src="{{asset('/js/sweetalert.min.js')}}"></script>

    <style>
        .main-menu.menu-dark .navigation li a {
            color: #fff;
        }

        .main-menu.menu-dark {
            background: #153a64 !important;
        }

        .main-menu.menu-dark .navigation {
            background: #153a64 !important;
        }

        .main-menu.menu-dark .navigation > li.nav-item.open.has-sub.open{
            background-color: #153a64 !important;
        }

        .main-menu.menu-dark .navigation > li > ul > li:first-child > a.disabled {
            color: #7b889d;
        }

        .main-menu .navbar-header {
            padding: 0.85rem 1.3rem 0.3rem 1.45rem !important;
        }
    </style>

    @yield('headerScript')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<!--<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@include('sweet::alert')
@include('user.master.header_menu')
@include('user.master.right_menu')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <!--
                        <h5 class="content-header-title float-left pr-1">تنظیمات حساب کاربری</h5>
                        <div class="breadcrumb-wrapper">

                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="/portal"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item"> تنظیمات حساب کاربری</li>
                                <li class="breadcrumb-item active">شبکه های اجتماعی</li>
                            </ol>

                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body"><!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                    @if($errors->any())
                                                        <div class="col-12">
                                                            <div class="alert alert-danger" role="alert">
                                                                @foreach($errors->all() as $error)
                                                                    <li>{{$error}}</li>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                        @yield('content')
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page ends -->
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- widget chat demo ends -->

<!-- </div>-->



<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('admin.master.footer_menu')


<!-- BEGIN: Vendor JS -->
<script src="{{ asset('/panel_assets/js/jquery.min.js') }}"></script>
<!--<script src="{{ asset('/panel_assets/js/bootstrap.min.js') }}"></script>-->
<script src="{{ asset('/panel_assets/vendors/js/vendors.min.js') }}"></script>

<script src="{{ asset('/panel_assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js') }}"></script>
<script src="{{ asset('/panel_assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
<script src="{{ asset('/panel_assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('/panel_assets/vendors/js/extensions/swiper.min.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/pickers/datepicker-jalali/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/pickers/datepicker-jalali/bootstrap-datepicker.fa.min.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/extensions/dropzone.min.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('/panel_assets/js/scripts/configs/vertical-menu-dark.js') }}"></script>
<script src="{{ asset('/panel_assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('/panel_assets/js/core/app.js') }}"></script>
<script src="{{ asset('/panel_assets/js/scripts/components.js') }}"></script>
<script src="{{ asset('/panel_assets/js/scripts/footer.js') }}"></script>
<script src="{{ asset('/panel_assets/js/scripts/customizer.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/extensions/jquery.steps.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('/panel_assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('/panel_assets/js/scripts/pages/page-account-settings.js') }}"></script>
<script src="{{ asset('/panel_assets/js/scripts/forms/form-repeater.js') }}"></script>
<script src="{{ asset('/panel_assets/js/scripts/forms/wizard-steps.js') }}"></script>
<script src="{{ asset('/panel_assets/js/scripts/forms/validation/form-validation.js') }}"></script>
<script src="{{ asset('/panel_assets/js/scripts/pages/faq.js') }}"></script>
<script src="{{ asset('/panel_assets/js/scripts/pages/app-email.js') }}"></script>
<script src="{{ asset('/panel_assets/intl_tel/js/intlTelInput.js') }}"></script>
<script src="{{ asset('/panel_assets/intl_tel/js/utils.js') }}"></script>
<script src="{{ asset('/panel_assets/js/java.js') }}"></script>
<!-- END: Page JS-->

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@yield('footerScript')

</body>
<!-- END: Body-->
</html>
