@section('headerScript')
    <style>
        #board p
        {
            font-size: 16px;
        }
    </style>
@endsection

@if($user->tel_verified==0)
    <!--
    <div class="col-12">

        @if ($verifyStatus==false)
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle-fill"></i>
                برای ادامه فعالیت باید تلفن همراه خود را در سیستم فراکوچ ثبت کنید
                <form class="d-inline" method="get" action="/panel/active/mobile/">
                    <button class="btn btn-info text-light btn-sm text-dark" type="submit" id="activeMobile" data-toggle="modal" data-target="#ModalMobile">ارسال کد فعال سازی</button>
                </form>
            </div>

        @else
            <div class="alert alert-warning">
                جهت فعال سازی کد ارسال شده به تلفن همراه را وارد کنید
                <form method="post" action="/panel/active/mobile/code" class="mt-2">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel">
                        <div class="input-group-prepend ">
                            <button class="btn btn-outline-secondary btn-info text-light m-0" type="submit" id="activeMobile" data-toggle="modal" data-target="#ModalMobile">فعال سازی</button>
                        </div>
                    </div>
                </form>
            </div>

        @endif
    </div>
    -->
@endif

@if((is_null(Auth::user()->fname))||(is_null(Auth::user()->lname))||(is_null(Auth::user()->username)))
    <div class="col-12">
        <div class="alert alert-danger">
            لطفا اطلاعات پروفایل خود را کامل کنید <a href="/panel/profile" class="btn btn-primary">اینجا</a>
        </div>
    </div>
@endif

<!--

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/panel/messages/">خوانده نشده</a>
            </span>
            <span class="info-box-number">
                  {{$unreadMessage}}
                  <small>پیام</small>
                </span>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-warning elevation-1 text-light"><i class="fas fa-project-diagram"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="/panel/introduced">افراد دعوت شده</a>
            </span>
            <span class="info-box-number">
                  {{$countIntroducedUser}}
                  <small>نفر</small>
            </span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-medal"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <a href="#" data-toggle="modal" data-target="#ScoreModal">امتیازات</a>
            </span>
            <span class="info-box-number">
                  {{$score}}
                  <small>امتیاز</small>
            </span>
        </div>
    </div>
</div>
-->



<div class="container-fluid  " >
    <div class="row pt-3" id="board">

        <div class="col-12 border-bottom border-1">
            <h5>
                <i class="bi bi-pen-fill"></i>
                میز کار
            </h5>
        </div>
        <div class="col-12 text-center mt-1">
            <a href="/panel/scholarship/me" class="btn btn-block btn-primary">
                <p>پنل آموزش رایگان کوچینگ + گواهینامه</p>
            </a>
        </div>

        @if($user->status_coach==0)
            <div class="col-lg-3 col-md-6 col-sm-6 text-center mt-1 items">
                <a href="panel/coach/create"  class="btn btn-info shadow-lg">
                    <i class="bi bi-person-circle" ></i>
                    <p>همکاری به عنوان کوچ</p>
                </a>
            </div>
        @elseif($user->status_coach=='-1')
            <div class="col-lg-3 col-md-6 col-sm-6 text-center mt-1 items">
                <a href="#"  class="btn btn-info shadow-lg">
                    <i class="bi bi-person-circle" ></i>
                    <p>درخواست همکاری شما در حال بررسی است</p>
                </a>
            </div>
        @elseif($user->status_coach==1)
            <div class="col-lg-3 col-md-6 col-sm-6   text-center mt-1 items ">
                <a href="/panel/coach/{{$user->id_coaches_table}}/edit"  class="btn btn-info  shadow-lg">
                    <i class="bi bi-person-circle" ></i>
                    <p>شما یک کوچ هستید</p>
                </a>
            </div>
        @elseif($user->status_coach==-2)
            <div class="col-lg-3 col-md-6 col-sm-6  text-center mt-1 items">
                <a href="/panel/coach/{{$user->id_coaches_table}}/edit"  class="btn btn-info shadow-lg">
                    <i class="bi bi-person-circle" ></i>
                    <p>درخواست همکاری شما رد شد</p>
                </a>
            </div>
        @endif
        <div class="col-lg-3 col-md-6 col-sm-6 text-center mt-1 items">
            <a href="/panel/integrity/files"  class="btn btn-success">
                <i class="bi bi-camera-reels-fill" ></i>
                <p> ویدئوی وبینار تمامیت</p>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 text-center mt-1 items">
            <a href="/panel/scientific_support/create"  class="btn btn-success">
                <i class="bi bi-person-circle" ></i>
                <p>همکاری به عنوان پشتیبان علمی </p>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 text-center mt-1 items">
            <a href="/panel/integrityTest"  class="btn btn-success">
                <i class="bi bi-pentagon-half" ></i>
                <p> تست تمامیت شخصی</p>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 text-center mt-1 items">
            <a href="/panel/effectiveListenings/create" class="btn btn-success">
                <i class="bi bi-ear-fill"></i>
                <p>ارزیابی گوش دادن موثر</p>
            </a>
        </div>



        <div class="col-12 mt-2 border-bottom border-1">
            <h5>آخرین دوره های ثبت نام شده</h5>
        </div>
        <div class="col-12">
            <ul type="none">

            </ul>


            <div class="list-group">
                @if($courses->count()>0)
                    @foreach($courses as $item)
                        <a href="#" class="list-group-item list-group-item-action" target="_blank">{{$item->course}}</a>
                    @endforeach
                @else
                    <div class="alert alert-warning">
                        تا کنون دوره ای ثبت نام نکرده اید
                    </div>
                @endif

            </div>

        </div>


    </div>
</div>

<!-- Modal Scores-->
<div class="modal fade" id="ScoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">گزارش امتیازات</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-12 mr-3">
                <ul class="list-group p-0 border-0">

                    <li class="list-group-item">
                        <div class="row border pt-2">
                            <div class="col-md-6 col-2">
                                <p> افراد دعوت شده {{$countIntroducedUser}} نفر</p>
                            </div>
                            <div class="col-md-6 col-3 text-right">
                                <p>{{$scoreIntroducedUser}} امتیاز</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row border pt-2">
                            <div class="col-md-6 col-2">
                                <p> ثبت شماره همراه</p>
                            </div>
                            <div class="col-md-6 col-3 text-right">
                                <p>{{$scoreTelverify}} امتیاز</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row border pt-2">
                            <div class="col-md-6 col-2">
                                <p> ثبت پست الکترونیکی</p>
                            </div>
                            <div class="col-md-6 col-3 text-right">
                                <p>{{$scoreEmailverify}} امتیاز</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row border pt-2">
                            <div class="col-md-6 col-2">
                                <p>دانشجوی معرفی شده {{$SuccessIntroduced}} نفر</p>
                            </div>
                            <div class="col-md-6 col-3 text-right">
                                <p>{{$scoreSuccess}} امتیاز</p>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
          </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
