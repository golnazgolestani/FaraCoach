@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form method="post" action="/admin/user/{{$tel}}/updatePassword">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="pass">رمز عبور جدید</label>
                <input type="password" class="form-control" id="pass" lang="fa" name="password" />
            </div>
            <div class="form-group">
                <label for="password-confirm">تکرار رمز عبور جدید</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">ذخیره</button>
            </div>

        </form>
    </div>
@endsection
