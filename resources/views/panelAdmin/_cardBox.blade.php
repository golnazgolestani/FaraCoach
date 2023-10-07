<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/admin/messages/">خوانده نشده</a>
            </span>
            <span class="info-box-number">
                  {{$countUnreadMessages}}
                  <small>پیام</small>
                </span>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/admin/users/category/?categoryUsers=notfollowup">پیگیری نشده</a>
            </span>
            <span class="info-box-number">
                  {{$notFollowup}}
                  <small> نفر</small>
                </span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/admin/users/category/?categoryUsers=continuefollowup">در حال مذاکره</a>
            </span>
            <span class="info-box-number">
                  {{$follow}}
                  <small>  نفر</small>
            </span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/admin/users/category/?categoryUsers=waiting">در انتظار تصمیم</a>
            </span>
            <span class="info-box-number">
                  {{$waiting}}
                  <small> نفر</small>
            </span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/admin/users/category/?categoryUsers=cancelfollowup">انصراف</a>
            </span>
            <span class="info-box-number">
                  {{$cancel}}
                  <small> نفر</small>
            </span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/admin/users/category/?categoryUsers=students">مشتری / دانشجو</a>
            </span>
            <span class="info-box-number">
              {{$student}}
              <small> نفر</small>
        </span>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar-day"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/admin/users/category/?categoryUsers=todayFollowup">پیگیری امروز</a>
            </span>
            <span class="info-box-number">
              {{$followupToday}}
              <small> نفر</small>
        </span>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar-day"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/admin/users/category/?categoryUsers=expireFollowup">پیگیری تاریخ گذشته</a>
            </span>
            <span class="info-box-number">
              {{$expirefollowupToday}}
              <small> نفر</small>
        </span>
        </div>
    </div>
</div>
