@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form method="post" action="/admin/settings/problemfollowup/store">
            {{csrf_field()}}
            <div class="form-group">
                <label for="problem">نتیجه پیگیری</label>
                <input type="text" class="form-control" id="problem" lang="fa" name="problem" />
            </div>
            <div class="form-group">
                <label for="color">رنگبندی</label>
                <input type="color" class="form-control" id="color" name="color" />
            </div>
            <div class="form-group">
                <label for="statusProblem" >وضعیت</label>
                <select class="form-control" id="statusProblem" name="status">
                    <option disabled="disabled" selected>انتخاب کنید</option>
                    <option value="1" >انتشار</option>
                    <option value="0">عدم انتشار</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">ذخیره</button>
            </div>

        </form>
    </div>
@endsection
