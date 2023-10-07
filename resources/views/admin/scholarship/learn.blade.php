@if($scholarship->confirm_webinar==1)
    <div class="alert alert-success">
        کد شرکت در وبینار به درستی وارد شده است
    </div>
@elseif($scholarship->user->get_recieveCodeUsers->count()>=3)
    <div class="alert alert-danger">
        کاربر تعداد مجاز برای وارد کردن کد را انجام داده است
    </div>
@else
    <div class="alert alert-warning">
        تعداد دفعات ورود کد {{$scholarship->user->get_recieveCodeUsers->count()}}  بار می باشد
    </div>
@endif

@if($scholarship->confirm_webinar==1)
    <div class="row">

        <div class="mx-auto col-12 col-md-4 text-center">

            <p>امتیاز از آموزش :  5 امتیاز</p>
        </div>
    </div>
@else
    <div class="row">
        <div class="mx-auto col-12 col-md-4 text-center">
            <p>امتیاز از آموزش :  0 امتیاز</p>
        </div>
    </div>
@endif

<form method="post" action="/admin/scholarship/{{$scholarship->id}}/confirm_webinar" class="text-center">
    {{csrf_field()}}
    <button type="submit" class="btn btn-primary">تائید کد آموزشی</button>

</form>
