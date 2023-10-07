
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4"  >
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{asset('images/white-logo.png')}}" alt="فراکوچ لگو" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل کاربری فراکوچ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(is_null(Auth::user()->personal_image))
                    <img class="img-circle elevation-2" src={{asset("/images/default-avatar.jpg")}} alt="..." />
                @else
                    <img class="img-circle elevation-2" src={{asset("/documents/users/".Auth::user()->personal_image)}} alt="..." />
                @endif

            </div>
            <div class="info">
                <a href="/panel/profile" class="d-block">{{Auth::user()->fname}} {{Auth::user()->lname}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/panel" class="nav-link @if(request()->is('panel')) active  @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>                            صفحه اصلی
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/panel/profile" class="nav-link @if(request()->is('panel/profile*')) active  @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>پروفایل</p>
                    </a>
                </li>

                <!--
                <li class="nav-item">
                    <a href="/panel/messages#" class="nav-link @if(request()->is('panel/messages*')) active  @endif">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            پیام ها

                             <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                </li> -->
                @if(Auth::user()->tel_verified==1)

                    <li class="nav-item">
                        <a href="/panel/introduced" class="nav-link @if(request()->is('panel/introduced*')) active  @endif">
                            <i class="nav-icon fas fa-file"></i>
                            <p>سفیر کوچینگ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/panel/products" class="nav-link @if(request()->is('panel/products*')) active  @endif">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>محصولات</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/coaches/all" class="nav-link @if(request()->is('coaches/all*')) active  @endif">
                            <i class="fas fa-chalkboard"></i>
                            <p>لیست کوچ ها</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/panel/teachers" class="nav-link @if(request()->is('panel/teachers*')) active  @endif">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <p>اساتید</p>
                        </a>
                    </li>

                    @if(Auth::user()->status_coach==1)
                        <li class="nav-item has-treeview ">
                            <a href="/panel/booking/" class="nav-link @if(request()->is('panel/booking*')) active  @endif">
                                <i class="fas fa-clipboard-list"></i>
                                <p>
                                    کوچ
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/panel/coach/{{Auth::user()->id}}/edit" class="nav-link @if(request()->is('panel/booking')) active  @endif">
                                        <i class="fas fa-user-cog"></i>
                                        <p> رزومه کوچ</p>
                                    </a>
                                    <a href="/panel/booking/" class="nav-link @if(request()->is('panel/booking')) active  @endif">
                                        <i class="fas fa-user-cog"></i>
                                        <p> لیست جلسات</p>
                                    </a>
                                    <a href="/panel/booking/accept" class="nav-link @if(request()->is('panel/booking/accept*')) active  @endif">
                                        <i class="fas fa-user-cog"></i>
                                        <p>جلسات رزرو شده</p>
                                    </a>
                                    <a href="/panel/booking/report" class="nav-link @if(request()->is('panel/booking/report*')) active  @endif">
                                        <i class="bi bi-bar-chart-fill"></i>
                                        <p>گزارش جلسات</p>
                                    </a>

                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="/panel/coupon/" class="nav-link @if(request()->is('panel/coupon*')) active  @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                                    <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                </svg>
                                <p>                                کوپن تخفیف
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/panel/coupon/" class="nav-link @if(request()->is('panel/coupon')) active  @endif">
                                        <i class="fas fa-user-cog"></i>
                                        <p>کوپن ها</p>
                                    </a>
                                    <a href="/panel/coupon/create" class="nav-link @if(request()->is('panel/coupon/create*')) active  @endif">
                                        <i class="fas fa-user-cog"></i>
                                        <p>کوپن جدید</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/panel/coach/create" class="nav-link @if(request()->is('panel/coach/create*')) active  @endif">
                                <i class="fas fa-clipboard-list"></i>
                                <p>
                                    همکاری به عنوان کوچ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview ">

                            <a href="/panel/booking/" class="nav-link @if(request()->is('panel/booking*')) active  @endif">
                                <i class="fas fa-clipboard-list"></i>
                                <p>
                                    جلسات
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/panel/booking/accept_reserve_user" class="nav-link @if(request()->is('panel/booking/accept*')) active  @endif">
                                        <i class="fas fa-user-cog"></i>
                                        <p>جلسات رزرو شده</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="/panel/documents" class="nav-link @if(request()->is('panel/documents*')) active  @endif">
                            <i class="fas fa-photo-video"></i>
                            <p>فایلها</p>
                        </a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a href="/panel/freepackages" class="nav-link @if(request()->is('panel/freepackages*')) active  @endif">
                            <i class="fas fa-chalkboard"></i>
                            <p>دوره رایگان آموزش کوچینگ</p>
                        </a>
                    </li>
                    -->
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link @if(request()->is('panel/post*')||request()->is('panel/categoryposts*')||request()->is('panel/comments*')) active  @endif">
                            <i class="fas fa-blog"></i>
                            <p>بلاگ</p>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/{{Auth::user()->username}}" class="nav-link" target="_blank">
                                    <i class="fas fa-blog"></i>
                                    <p>نمایش وبلاگ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/panel/post" class="nav-link @if(request()->is('panel/post*')) active  @endif">
                                    <i class="fas fa-blog"></i>
                                    <p>پست های خودم</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/panel/categoryposts" class="nav-link @if(request()->is('panel/categoryposts*')) active  @endif">
                                    <i class="fas fa-blog"></i>
                                    <p>دسته بندی مطالب</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/panel/comments" class="nav-link @if(request()->is('panel/comments*')) active  @endif">
                                    <i class="fas fa-comments"></i>
                                    <p>دیدگاه ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/blogs/newposts" class="nav-link @if(request()->is('/blogs/newposts*')) active  @endif">
                                    <i class="fas fa-blog"></i>
                                    <p>جدیدترین پست ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

