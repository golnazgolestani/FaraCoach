@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">ویرایش اطلاعات استاد</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/teachers/{{$teacher->shortlink}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="fname">نام</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="{{$teacher->fname}}"/>
                </div>
                <div class="form-group">
                    <label for="lname">نام خانوادگی</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="{{$teacher->lname}}"/>
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک</label>
                    <input type="text" class="form-control" id="shortlink" name="shortlink" value="{{$teacher->shortlink}}"/>
                </div>
                <div class="form-group">
                    <label for="email">پست الکترونیکی</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$teacher->email}}"/>
                </div>
                <div class="form-group">
                    <label for="tel">تلفن همراه</label>
                    <input type="text" class="form-control" id="tel" name="tel" value="{{$teacher->tel}}"/>
                </div>
                <div class="form-group row">
                    <label for="gender1" style="margin-left: 30px" >جنسیت</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="gender1" name="sex" class="custom-control-input"  value="1" @if($teacher->sex==1) checked @endif />
                        <label class="custom-control-label  text-dark" for="gender1" >مرد</label>
                    </div>
                    <div class="custom-control custom-radio ">
                        <input type="radio" id="gender2" name="sex" class="custom-control-input" value="0" @if($teacher->sex==0) checked @endif/>
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
                        <option value="زیردیپلم" @if($teacher->education=="زیردیپلم") selected @endif>زیردیپلم</option>
                        <option value="دیپلم" @if($teacher->education=="دیپلم") selected @endif>دیپلم</option>
                        <option value="لیسانس" @if($teacher->education=="لیسانس") selected @endif >لیسانس</option>
                        <option value="فوق لیسانس" @if($teacher->education=="فوق لیسانس") selected @endif>فوق لیسانس</option>
                        <option value="دکتری و بالاتر" @if($teacher->education=="دکتری و بالاتر") selected @endif >دکتری و بالاتر</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">دسته بندی</label>
                    <select id="type" class="form-control p-0 @error('type') is-invalid @enderror" name="type">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="کوچ حرفه ای" @if($teacher->type=="کوچ حرفه ای") selected @endif>کوچ حرفه ای</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">شهر</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{$teacher->city}}"/>
                </div>
                <div class="form-group">
                    <label>عکس</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" />
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ckeditor">بیوگرافی</label>
                    <textarea id="ckeditor" name="biography">{{$teacher->biography}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
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
