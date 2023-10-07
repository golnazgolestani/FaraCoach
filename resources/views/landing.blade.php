@extends('master.index')
@section('row1')
<div class="container">
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 card" id="form_landing">
        <strong class="text-center mb-3">برای دانلود پکیج رایگان آموزش کوچینگ لطفا مشخصات خود را وارد کنید</strong>
        <div class="alert alert-warning" role="alert">
            پر کردن تمامی فیلدها اجباریست
         </div>
         @if(session('msg') && (session('errorStatus')))
            <div class="alert alert-{{session('errorStatus')}}">
                    {{session('msg')}}
            </div>
         @endif
        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger" role="alert">
                   {{$item}}
                </div>
            @endforeach
        @endif
        <form method="POST" action="/landing/store">
            {{csrf_field()}}
            <div class="form-group ">
                <label for="fname">نام:</label>
                <input type="text" class="form-control" id="fname" name="fname" lang="fa" value=""/>
            </div>
            <div class="form-group ">
                <label for="lname">نام خانوادگی:</label>
                <input type="text" class="form-control" id="lname" name="lname" lang="fa"/>
            </div>
            <div class="form-group ">
                <label for="tel">تلفن همراه:</label>
                <input type="text" class="form-control" id="tel" name="tel"/>
            </div>
            <div class="form-group ">
                <label for="email">پست الکترونیکی:</label>
                <input type="text" class="form-control" id="email" name="email" />
            </div>

            <button type="submit" class="btn btn-success btn-block">ثبت نام</button>
        </form>
    </div>
</div>
@endsection
