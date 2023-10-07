
<!-- BEGIN: Header-->
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-dark">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                 <div class="col text-center d-none d-lg-block">
                    <h3>
                        <a href="/">
                            <img src="{{asset('/images/logo-colored.png')}}" style="margin: 0 auto; width: 100px">
                            <!-- <span class="" style="font-family: Lalezar;">فراکوچ</span>  -->
                        </a>
                    </h3>
                </div>
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <!--<li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-ir"></i><span class="selected-language">فارسی</span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="fa"><i class="flag-icon flag-icon-ir mr-50"></i> فارسی</a><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us mr-50"></i> انگلیسی</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr mr-50"></i> فرانسوی</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de mr-50"></i> آلمانی</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt mr-50"></i> پرتغالی</a></div>
                    </li>-->
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-money bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up"></span></a></li>
                    <!--<li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>-->
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                            <input class="input" type="text" placeholder="جستجو ..." tabindex="-1" data-search="template-search">
                            <div class="search-input-close"><i class="bx bx-x"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
                        <ul class="dropdown-menu dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">3 اعلان جدید</span><span class="text-bold-400 cursor-pointer">علامت خوانده شده به همه</span></div>
                            </li>
                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                <div class="media d-flex align-items-center">
                                    <div class="media-left pr-0">
                                        <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">نازنین</span></div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"><span class="text-bold-500">تبریک بابت خرید </span>ایده شماره یک</h6><small class="notification-text">15 اردیبهشت 12:32 ب.ظ</small>
                                    </div>
                                </div></a>
                                <div class="d-flex justify-content-between read-notification cursor-pointer">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left pr-0">
                                            <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">رحمان</span></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading"><span class="text-bold-500">پیام جدید</span> دریافت شد</h6><small class="notification-text">شما 18 پیام خوانده نشده دارید</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between cursor-pointer">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left pr-0">
                                            <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">رضا</span></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading"><span class="text-bold-500">نظر جدید برای </span> ایده شماره دو</h6><small class="notification-text">1 ساعت پیش</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">خواندن همه اعلان ها</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                        <!--<div class="user-nav d-sm-flex d-none"><span class="user-name"></span></div>-->
                        <span>
                            @if(is_null(Auth::user()->avatar))
                                <img class="round" src="{{asset('/panel_assets/images/profile/user-profile-thumbnail.png')}}" alt="avatar" height="40" width="40">
                            @else
                                <img class="round" src="{{asset('/images/users/'.Auth::user()->avatar)}}" alt="avatar" height="40" width="40">
                            @endif
                        </span></a>
                        <div class="dropdown-menu pb-0">
                            <a class="dropdown-item" href="/panel"><i class="bx bx-user mr-50"></i> ویرایش پروفایل</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="/logout" data-request="onLogout" data-request-data="redirect: '/'"><i class="bx bx-power-off mr-50"></i> خروج</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
