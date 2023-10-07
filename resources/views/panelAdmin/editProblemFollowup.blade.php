@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form method="post" action="/admin/settings/problemfollowup/update/{{$problemfollowup->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="problem">نتیجه پیگیری</label>
                <input type="text" class="form-control" id="problem" lang="fa" name="problem"  value="{{$problemfollowup->problem}}"/>
            </div>
            <div class="form-group">
                <label for="color">رنگبندی</label>
                <input type="color" class="form-control" id="color" lang="fa" name="color"  value="{{$problemfollowup->color}}"/>
            </div>
            <div class="form-group">
                <label for="statusProblem" >وضعیت</label>
                <select class="form-control" id="statusProblem" name="status">
                    <option disabled="disabled" selected>انتخاب کنید</option>
                    <option value="1" @if($problemfollowup->status==1) selected @endif >انتشار</option>
                    <option value="0" @if($problemfollowup->status==0) selected @endif >عدم انتشار</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">ذخیره</button>
            </div>

        </form>
    </div>
@endsection
