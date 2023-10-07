<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
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
                <a href="/admin/user/{{Auth::user()->id}}" class="d-block">{{Auth::user()->fname}} {{Auth::user()->lname}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="/panel" class="nav-link @if(request()->is('panel*')) active  @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>                            صفحه اصلی
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview @if(request()->is('admin/users')) menu-open  @endif">
                    <a href="#" class="nav-link @if(request()->is('admin/user*')) active  @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            کاربرها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/users" class="nav-link @if(request()->is('admin/users')) active  @endif">
                                <i class="fas fa-users nav-icon"></i>
                                <p>همه کاربرها</p>
                            </a>
                        </li>
                        @if(Auth::user()->type==2)
                            <li class="nav-item">
                                <a href="/admin/add" class="nav-link @if(request()->is('admin/add')) active  @endif">
                                    <i class="bi bi-person-plus-fill"></i>
                                    <p>کاربر جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/users/excel" class="nav-link @if(request()->is('admin/users/excel')) active  @endif">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>اضافه کردن کاربر از طریق فایل</p>
                                </a>
                            </li>

                        @endif
                    </ul>
                </li>

                <li class="nav-item has-treeview @if(request()->is('admin/message')) menu-open  @endif">
                    <!--
                    <a href="#" class="nav-link @if(request()->is('admin/message*')) active  @endif">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            پیام ها
                            <i class="fas fa-angle-left right"></i>
                             <span class="badge badge-info right">6</span>
                        </p>
                    </a>-->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/messages/" class="nav-link @if(request()->is('admin/message')) active  @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>همه پیام ها</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview @if(request()->is('admin/filemanager')) menu-open  @endif">
                    <a href="#" class="nav-link @if(request()->is('admin/filemanager*')) active  @endif">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            مدیریت فایل ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/filemanager" class="nav-link @if(request()->is('admin/filemanager')) active  @endif">
                                <i class="fas fa-file nav-icon"></i>
                                <p>مشاهده همه فایلها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/documents" class="nav-link @if(request()->is('admin/documents')) active  @endif">
                                <i class="fas fa-file nav-icon"></i>
                                <p>لیست فایل های آموزشی</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->type==2)
                    <!-- <li class="nav-item has-treeview @if(request()->is('admin/reports')) menu-open  @endif">
                        <a href="#" class="nav-link @if(request()->is('admin/reports*')) active  @endif">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                گزارش گیری
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/reports" class="nav-link @if(request()->is('admin/reports')) active  @endif">
                                    <i class="fas fa-chart-pie nav-icon"></i>
                                    <p>گزارش ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview @if(request()->is('admin/teachers')) menu-open  @endif">
                        <a href="#" class="nav-link @if(request()->is('admin/teacher*')) active  @endif">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <p>
                                اساتید
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/teachers" class="nav-link @if(request()->is('admin/teachers')) active  @endif">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <p>همه اساتید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/teachers/create" class="nav-link @if(request()->is('admin/teachers/create')) active  @endif">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <p>اضافه کردن استاد</p>
                                </a>
                            </li>
                        </ul>
                    </li>-->
                @endif
                @if(Auth::user()->type==2 || Auth::user()->type==3 || Auth::user()->type==4)
                    <li class="nav-item has-treeview ">
                        <a href="" class="nav-link @if(request()->is('admin/education*')) active  @endif">
                            <i class="fas fa-university"></i>
                            <p>
                                آموزش
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/education/students" class="nav-link @if(request()->is('admin/education/students*')) active  @endif">
                                    <i class="fas fa-graduation-cap"></i>
                                    <p> لیست دانشجویان</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview @if(request()->is('admin/coach')) menu-open  @endif">
                        <a href="#" class="nav-link @if(request()->is('admin/coach*')) active  @endif">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <p>
                                کوچ ها
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/coach" class="nav-link @if(request()->is('admin/coach')) active  @endif">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <p>همه کوچ ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/coach/request" class="nav-link @if(request()->is('admin/coach/request')) active  @endif">
                                    <i class="fas fa-hourglass"></i>
                                    <p>درخواست های همکاری</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/coach/reject" class="nav-link @if(request()->is('admin/coach/reject')) active  @endif">
                                    <i class="fas fa-ban"></i>
                                    <p>درخواست های رد شده</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if(request()->is('admin/category_coach*')) active  @endif">
                                    <i class="fas fa-list-alt"></i>
                                    <p>                                موضوعات کوچ ها
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/category_coach/" class="nav-link @if(request()->is('admin/category_coach')) active  @endif">
                                            <i class="fas fa-user-cog"></i>
                                            <p>موضوعات</p>
                                        </a>
                                        <a href="/admin/category_coach/create" class="nav-link @if(request()->is('admin/category_coach/create')) active  @endif">
                                            <i class="fas fa-plus-square"></i>
                                            <p>موضوع جدید</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if(request()->is('admin/type_coach*')) active  @endif">
                                    <i class="bi bi-type"></i>
                                    <p>                               سطوح کوچ ها
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/type_coach/" class="nav-link @if(request()->is('admin/type_coach')) active  @endif">
                                            <i class="bi bi-list-ol"></i>
                                            <p>سطوح</p>
                                        </a>
                                        <a href="/admin/type_coach/create" class="nav-link @if(request()->is('admin/type_coach/create')) active  @endif">
                                            <i class="bi bi-node-plus-fill"></i>
                                            <p>سطح جدید</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview @if(request()->is('admin/courses')) menu-open  @endif">
                        <a href="#" class="nav-link @if(request()->is('admin/course*')) active  @endif">
                            <i class="fas fa-chalkboard"></i>
                            <p>
                                دوره ها
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/courses" class="nav-link @if(request()->is('admin/courses')) active  @endif">
                                    <i class="fas fa-chalkboard"></i>
                                    <p>همه دوره ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/courses/create" class="nav-link @if(request()->is('admin/courses/create')) active  @endif">
                                    <i class="fas fa-chalkboard"></i>
                                    <p>اضافه کردن دوره</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/coursetype" class="nav-link @if(request()->is('admin/coursetype')) active  @endif">
                                    <i class="fas fa-chair"></i>
                                    <p>دسته بندی دوره ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/coursetype/create" class="nav-link @if(request()->is('admin/coursetype/create')) active  @endif">
                                    <i class="fas fa-plus-circle"></i>
                                    <p>اضافه کردن دسته بندی دوره</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="/admin/settings/" class="nav-link @if(request()->is('admin/setting*')) active  @endif">
                            <i class="fas fa-clipboard-list"></i>
                            <p>
                                جلسات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/booking/" class="nav-link @if(request()->is('admin/booking*')) active  @endif">
                                    <i class="fas fa-user-cog"></i>
                                    <p> لیست جلسات</p>
                                </a>
                                <a href="/admin/booking/accept" class="nav-link @if(request()->is('panel/booking/accept*')) active  @endif">
                                    <i class="fas fa-user-cog"></i>
                                    <p>جلسات رزرو شده</p>
                                </a>
                                <a href="/admin/reserve/waiting" class="nav-link @if(request()->is('admin/booking/waiting*')) active  @endif">
                                    <i class="fas fa-user-cog"></i>
                                    <p>رزرو های ناقص</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview ">
                                <a href="/admin/coupon/" class="nav-link @if(request()->is('admin/coupon*')) active  @endif">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                                        <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                    </svg>
                                    <p>                                کوپن تخفیف
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/coupon/" class="nav-link @if(request()->is('admin/coupon')) active  @endif">
                                            <i class="fas fa-user-cog"></i>
                                            <p>کوپن ها</p>
                                        </a>
                                        <a href="/admin/coupon/create" class="nav-link @if(request()->is('admin/coupon/create*')) active  @endif">
                                            <i class="fas fa-user-cog"></i>
                                            <p>کوپن جدید</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link @if(request()->is('admin/setting*')) active  @endif">
                            <i class="bi bi-display"></i>
                            <p>
                                رویدادها
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/event/all" class="nav-link @if(request()->is('admin/event*')) active  @endif">
                                    <i class="bi bi-display"></i>
                                    <p>همه رویدادها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/event/create" class="nav-link @if(request()->is('admin/event/create')) active  @endif">
                                    <i class="bi bi-plus-lg"></i>
                                    <p>ایجاد رویداد</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                @endif
                @if(Auth::user()->type==2)
                    <li class="nav-item has-treeview ">
                        <a href="/admin/settings/" class="nav-link @if(request()->is('admin/setting*')) active  @endif">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                تنظیمات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/settings/" class="nav-link @if(request()->is('admin/setting*')) active  @endif">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>تنظیمات کلی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/settingscore" class="nav-link @if(request()->is('admin/score')) active  @endif">
                                    <i class="fas fa-medal"></i>
                                    <p>امتیازات </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/settingreserve" class="nav-link @if(request()->is('admin/settingreserve')) active  @endif">
                                    <i class="fas fa-medal"></i>
                                    <p>قیمت جلسات </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview @if(request()->is('admin/settingsms')) menu-open  @endif">
                        <a href="#" class="nav-link @if(request()->is('admin/settingsms*')) active  @endif">
                            <i class="fas fa-sms"></i>
                            <p>
                                پیامک
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/sms/create" class="nav-link @if(request()->is('admin/sms/create')) active  @endif">
                                    <i class="fas fa-paper-plane"></i>
                                    <p>ارسال پیامک</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/settingsms" class="nav-link @if(request()->is('admin/settingsms')) active  @endif">
                                    <i class="fas fa-tools"></i>
                                    <p>تنظیمات </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/sms/" class="nav-link @if(request()->is('admin/sms')) active  @endif">
                                    <i class="fas fa-chart-pie"></i>
                                    <p>گزارش پیامک</p>
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
