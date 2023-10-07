@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">اضافه کردن استاد</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/teachers" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="fname">نام</label>
                    <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" />
                </div>
                <div class="form-group">
                    <label for="lname">نام خانوادگی</label>
                    <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" />
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک</label>
                    <input type="text" class="form-control @error('shortlink') is-invalid @enderror" id="shortlink" name="shortlink" />
                </div>
                <div class="form-group">
                    <label for="email">پست الکترونیکی</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" />
                </div>
                <div class="form-group">
                    <label for="tel">تلفن همراه</label>
                    <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" />
                </div>
                <div class="form-group row">
                    <label for="gender1" style="margin-left: 30px" >جنسیت</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="gender1" name="sex" class="custom-control-input @error('sex') is-invalid @enderror"  value="1">
                        <label class="custom-control-label  text-dark " for="gender1" >مرد</label>
                    </div>
                    <div class="custom-control custom-radio ">
                        <input type="radio" id="gender2" name="sex" class="custom-control-input @error('sex') is-invalid @enderror" value="0">
                        <label class="custom-control-label  text-dark" for="gender2" >زن</label>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="education">تحصیلات</label>
                    <select id="education" class="form-control p-0 @error('education') is-invalid @enderror" name="education">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="زیردیپلم">زیردیپلم</option>
                        <option value="دیپلم">دیپلم</option>
                        <option value="لیسانس">لیسانس</option>
                        <option value="فوق لیسانس">فوق لیسانس</option>
                        <option value="دکتری و بالاتر">دکتری و بالاتر</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">دسته بندی</label>
                    <select id="type" class="form-control p-0 @error('type') is-invalid @enderror" name="type">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="کوچ حرفه ای">کوچ حرفه ای</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">شهر</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" />
                </div>
                <div class="form-group">
                    <label>عکس</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" />
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ckeditor">بیوگرافی</label>
                    <textarea id="ckeditor" name="biography" class="@error('biography') is-invalid @enderror"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">افزودن</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection

@section('scriptfooter')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection
