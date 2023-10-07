<div class="row">
    <div class="col-12 text-center">
        <img class="avatar border-gray rounded-circle" src="{{asset('/documents/users/'.$user->personal_image)}}" />
        @if(!is_null($user->username))
            <a href="{{"/".$user->username}}" target="_blank">صفحه وبلاگ</a>
        @endif
    </div>
    <div class="col-md-6 pl-1">
        <div class="form-group">
            <label>نام</label>
            <input type="text" class="form-control" disabled="disabled" value="{{$user->fname}}"  />
        </div>
    </div>
    <div class="col-md-6 px-1">
        <div class="form-group">
            <label>نام خانوادگی</label>
            <input type="text" class="form-control" disabled="disabled" value="{{$user->lname}}"  />
        </div>
    </div>
    <div class="col-md-6 pl-1">
        <div class="form-group">
            <label>تلفن تماس</label>
            <input type="text" class="form-control" disabled="disabled" value="{{$user->tel}}"  />
        </div>
    </div>
    <div class="col-md-6 px-1">
        <div class="form-group">
            <label>پست الکترونیکی</label>
            <input type="text" class="form-control" disabled="disabled" value="{{$user->email}}"  />
        </div>
    </div>
    <div class="col-md-6 px-1">
        <div class="form-group">
            <label>وضعیت</label>
            <input type="text" class="form-control" disabled="disabled" value="{{$user->type}}"  />
        </div>
    </div>
    <div class="col-md-6 px-1">
        <div class="form-group">
            <label>آخرین ورود</label>
            <input type="text" class="form-control" disabled="disabled" value="{{$user->last_login_at}}"  />
        </div>
    </div>
</div>
