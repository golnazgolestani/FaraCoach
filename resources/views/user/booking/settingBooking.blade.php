@extends('user.master.index')
@section('content')
    <div class="col-12 col-md-6">
        <form method="post" action="/panel/settings/booking/{{Auth::user()->coach->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="fi">قیمت هر جلسه:</label>
                <input type="text" class="form-control" id="fi" name="fi" value="{{old('fi',$settings->fi)}}" @if(!is_null(Auth::user()->coach->expire_date_fi)) disabled @endif />
                <small>در صورت رایگان بودن هر جلسه مقدار صفر وارد کنید</small>
            </div>
            <div class="form-group">
                <label for="type_holding">نوع برگزاری جلسه:  <span class="text-danger">*</span></label>
                <select class="form-control" id="type_holding" name="type_holding">
                    <option disabled selected>انتخاب کنید</option>
                    <option value="1" @if(old('type_holding',$settings->type_holding)==1) selected @endif>حضوری</option>
                    <option value="2" @if(old('type_holding',$settings->type_holding)==2) selected @endif>آنلاین</option>
                    <option value="0" @if(old('type_holding',$settings->type_holding)==0) selected @endif>هر دو</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">آدرس حضوری:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{old('address',$settings->address)}}" />
            </div>
            <div class="form-group">
                <label for="online_platform">پلتفرم جلسه آنلاین:</label>
                <input type="text" class="form-control" id="online_platform" name="online_platform" value="{{old('online_platform',$settings->online_platform)}}" />
            </div>
            <div class="form-group">
                <label for="tel">شماره تماس نمایشی جهت هماهنگی های مراجع:</label>
                <input type="text" class="form-control" id="online_platform" name="tel" value="{{old('tel',$settings->tel)   }}" />
                <small class="text-muted">در صورت وارد نکردن شماره همراه شماره ای که با آن ثبت نام کرده اید نمایش داده خواهد شد</small>
            </div>
            <div class="form-group">
                <label for="today_meeting">جلسات روز جاری: <span class="text-danger">*</span></label>
                <small class="text-muted">روزهای جاری قابلیت رزرو برای مراجع را داشته باشد</small>
                <select class="form-control" id="today_meeting" name="today_meeting">
                    <option disabled selected>انتخاب کنید</option>
                    <option value="0" @if(old('today_meeting',$settings->today_meeting)==0) selected @endif>خیر رزرو نشود</option>
                    <option value="1" @if(old('today_meeting',$settings->today_meeting)==1) selected @endif>بلی رزرو شود</option>
                </select>
            </div>
            <label for="introduction_discount">تخفیف جلسات معارفه:<span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="number" class="form-control" id="introduction_discount" name="introduction_discount" min="0" max="100" value="{{old('introduction_discount',$settings->introduction_discount)}}"/>
                <div class="input-group-prepend">
                    <span class="input-group-text" >%</span>
                </div>
            </div>
            <label for="extra_presence">میزان افزایش  جلسات حضوری:<span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="number" class="form-control" id="extra_presence" name="extra_presence" min="0" max="100" value="{{old('extra_presence',$settings->extra_presence)}}"/>
                <div class="input-group-prepend">
                    <span class="input-group-text" >%</span>
                </div>
            </div>
            <div class="form-group">
                <label for="student_meeting">جلسات دانشجویی : </label>
                <select class="form-control" id="student_meeting" name="student_meeting">
                    <option disabled selected>انتخاب کنید</option>
                    <option value="0" @if($settings->student_meeting==0) selected @endif>برگزار نمی کنم</option>
                    <option value="1" @if($settings->student_meeting==1) selected @endif>برگزار می کنم</option>
                </select>
            </div>

            <input type="submit" value="بروزرسانی" class="btn btn-success">
        </form>
    </div>
@endsection
