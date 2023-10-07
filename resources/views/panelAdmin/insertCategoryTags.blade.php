@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form method="post" action="/admin/settings/categorytags/store">
            {{csrf_field()}}
            <div class="form-group">
                <label for="problem">دسته بندی تگ</label>
                <input type="text" class="form-control" id="problem" lang="fa" name="category" />
            </div>
            <div class="form-group">
                <label for="statusProblem" >دسته والد</label>
                <select class="form-control  p-0" id="statusProblem" name="parent_id">
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    <option value="NULL">هیچکدام</option>
                    @foreach($categoryTags as $item)
                        <option value="{{$item->id}}" >{{$item->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="statusProblem" >وضعیت</label>
                <select class="form-control  p-0" id="statusProblem" name="status">
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
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
