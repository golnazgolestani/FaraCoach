@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">تنظیمات امتیازها</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/settingscore/{{$settingscore->id}}" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="signup">امتیاز ثبت نام</label>
                    <input type="text" class="form-control" id="signup" name="signup" value="{{$settingscore->signup}}"/>
                </div>
                <div class="form-group">
                    <label for="tel_verified">امتیاز تایید تلفن همراه</label>
                    <input type="text" class="form-control" id="tel_verified" name="tel_verified" value="{{$settingscore->tel_verified}}"/>
                </div>
                <div class="form-group">
                    <label for="tel_verified">امتیاز تایید ایمیل</label>
                    <input type="text" class="form-control" id="tel_verified" name="email_verified" value="{{$settingscore->email_verified}}"/>
                </div>
                <div class="form-group">
                    <label for="partsprofile">امتیاز تکمیل هر بخش اطلاعات شخصی</label>
                    <input type="text" class="form-control" id="partsprofile" name="partsprofile" value="{{$settingscore->partsprofile}}"/>
                </div>
                <div class="form-group">
                    <label for="introduced">امتیاز هر دعوت</label>
                    <input type="text" class="form-control" id="introduced" name="introduced" value="{{$settingscore->introduced}}"/>
                </div>
                <div class="form-group">
                    <label for="loginintroduced">امتیاز ورود هر دعوت</label>
                    <input type="text" class="form-control" id="loginintroduced" name="loginintroduced" value="{{$settingscore->loginintroduced}}"/>
                </div>
                <div class="form-group">
                    <label for="changeintroduced">امتیاز تبدیل به مشتری هر دعوت</label>
                    <input type="text" class="form-control" id="changeintroduced" name="changeintroduced" value="{{$settingscore->changeintroduced}}"/>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
