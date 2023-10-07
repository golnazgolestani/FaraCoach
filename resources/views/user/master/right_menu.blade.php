
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/panel/profile">
                <!--<div class="brand-logo"><img class="logo" src="{{ asset('/acckt/assets/img/logo.png') }}" width=""></div>-->
<!--                    <div class="brand-logo">
                        @if(is_null(Auth::user()->personal_image))
                            <img class="round" src="{{asset('/panel_assets/images/profile/user-profile-thumbnail.png')}}" width="40px" height="40px">
                        @else
                            <img class="round" src="{{asset('/documents/users/'.Auth::user()->personal_image)}}" width="40px" height="40px" >
                        @endif
                    </div>-->
                    <h5 class="brand-text mb-0" style="font-size: 1.2rem;">
                        {{Auth::user()->fname." ".Auth::user()->lname}}
                    </h5>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class=" navigation-header"><span>پورتال فراکوچ</span></li>
            <li class=" nav-item"><a href="/panel"><span class="menu-title">داشبورد</span></a></li>

            <li class=" nav-item"><a href="/panel/profile"><span class="menu-title" > حساب کاربری </span></a> </li>

            <li class="nav-item">
                <a href="/panel/scholarship/me">
                    @if(is_null(Auth::user()->scholarship))
                        <span class="menu-title" >آموزش رایگان </span>
                    @else
                        <span class="menu-title" >بورسیه</span>
                    @endif
                </a>
            </li>
            <li class=" nav-item"><a href="/panel/introduced"><span class="menu-title">سفیر کوچینگ</span></a></li>
            <li class=" nav-item"><a href="/coaches/all"><span class="menu-title">لیست کوچ ها</span></a></li>
            <!-- <li class=" nav-item"><a href="/panel/teachers"><span class="menu-title">اساتید</span></a></li> -->
            @if(Auth::user()->status_coach==1)
                <li class=" nav-item has-sub "><a href="#"><span class="menu-title" >کوچینگ</span></a>
                    <ul class="menu-content">
                        <li><a href="/panel/booking/" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >لیست جلسات</span></a></li>
                        <li><a href="/panel/booking/accept" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >لیست جلسات رزرو شده</span></a></li>
                        <li><a href="/panel/booking/report" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >گزارش جلسات</span></a></li>
                        <li><a href="/panel/settings/booking/" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >تتنظیمات جلسات</span></a></li>
                        <li><a href="/panel/coupon" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >کوپن</span></a></li>
                    </ul>
                </li>

            @else
                <li class=" nav-item has-sub">
                    <a href="#"><span class="menu-title">کلینیک</span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="/panel/coach_request/create"><span class="menu-title">همکاری به عنوان کوچ</span></a>
                        </li>
                        <li>
                            <a href="/panel/coach_request/requests"><span class="menu-title">وضعیت درخواست ها</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-sub"><a href="#"><span class="menu-title" >جلسات</span></a>
                    <ul class="menu-content">
                        <li><a href="/panel/reserve/accept_reserve_user" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item" >جلسات رزرو شده</span></a></li>
                    </ul>
                </li>
            @endif

            <li class="nav-item">
                <a href="/panel/category_document">
                    <span class="menu-title" >دانلودها </span>
                </a>
            </li>
            <li class="nav-item has-sub"><a href="#"><span class="menu-title" >مالی</span></a>
                <ul class="menu-content">
                    <li><a href="/panel/wallet" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item" >کیف پول</span></a></li>
                    <li><a href="/panel/invoice" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item" >پیش فاکتورها</span></a></li>
                    <li><a href="/panel/faktor" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item" >فاکتورها</span></a></li>
                    <li><a href="/panel/checkout/transaction" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item" >تراکنش های مالی</span></a></li>
                    <li><a href="/panel/warrany" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item" >تعهدنامه</span></a></li>
                </ul>
            </li>
            <!--
            <li class=" nav-item has-sub "><a href="#"><span class="menu-title" >بلاگ</span></a>
                <ul class="menu-content">
                    <li><a href="/{{Auth::user()->username}}" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item" >نمایش وبلاگ</span></a></li>
                    <li><a href="/panel/post" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >نوشته های خودم</span></a></li>
                    <li><a href="/panel/categoryposts" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >دسته بندی مطالب</span></a></li>
                    <li><a href="/panel/comments" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >دیدگاه ها</span></a></li>
                    <li><a href="/blogs/newposts" ><i class="bx bx-left-arrow-alt"></i><span class="menu-item"  >جدیدترین مطالب</span></a></li>

                </ul>
            </li>

            <li class=" nav-item"><a href="#"><span class="menu-title" data-i18n="Chat">پیام ها</span></a>
                <ul class="menu-content">
                    <li><a href="/panel/message"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List">تیکت ها</span></a></li>

                </ul>
            </li>
            -->

        </ul>
    </div>
</div>
<!-- END: Main Menu-->

