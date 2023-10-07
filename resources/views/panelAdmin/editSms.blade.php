@extends('admin.master.index')
@section('content')
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form method="post" action="/admin/settingsms/{{$settingsms->id}}" >
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="type" >موقعیت</label>
                <select class="form-control  p-0" id="type" name="type">
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    <option value="1" @if($settingsms->type==1) selected @endif >پیگیری</option>
                    <option value="2" @if($settingsms->type==2) selected @endif>ثبت نام مدیران</option>
                </select>
            </div>
            <div class="form-group">
                <label for="statusProblem" >وضعیت</label>
                <select class="form-control  p-0" id="statusProblem" name="status">
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    <option value="1" @if($settingsms->status==1) selected @endif>انتشار</option>
                    <option value="0" @if($settingsms->status==0) selected @endif>عدم انتشار</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment" >متن پیامک</label>
                <button type="button" class="btn btn-primary btn-sm" id="tel_btn" onclick="add_parametersSMS('{tel}')" >تلفن همراه</button>
                <button type="button" class="btn btn-primary btn-sm" id="fname_btn" onclick="add_parametersSMS('{fname}')">نام</button>
                <button type="button" class="btn btn-primary btn-sm" id="lname_btn" onclick="add_parametersSMS('{lname}')">نام خانوادگی</button>
                <button type="button" class="btn btn-primary btn-sm" id="dateBirth_btn" onclick="add_parametersSMS('{datebirth}')">تاریخ تولد</button>
                <button type="button" class="btn btn-primary btn-sm" id="sex_btn" onclick="add_parametersSMS('{sex}')">جنسیت</button>
                <button type="button" class="btn btn-primary btn-sm" id="nextDate_btn" onclick="add_parametersSMS('{nextDate}')">تاریخ پیگیری بعد</button>
                <button type="button" class="btn btn-primary btn-sm" id="expert_btn" onclick="add_parametersSMS('{followby_expert}')">مسئول پیگیری</button>
                <button type="button" class="btn btn-primary btn-sm" id="expert_btn" onclick="add_parametersSMS('{telegram}')">تلگرام مسئول پیگیری</button>
                <button type="button" class="btn btn-primary btn-sm" id="expert_btn" onclick="add_parametersSMS('{admin_tel}')">تلفن مسئول پیگیری</button>
                <textarea class="form-control" id="commentSMS" rows="3" name="comment">{{$settingsms->comment}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">ذخیره</button>
            </div>

        </form>
    </div>
@endsection
