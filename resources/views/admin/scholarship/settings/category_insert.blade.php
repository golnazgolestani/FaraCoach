@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info border-info">
                    <h4 class="card-title m-0">اضافه کردن زمینه های همکاری بورسیه</h4>
                </div>
                <div class="card-body" >
                    <form method="post" action="/admin/collabration_category">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="category">زمینه همکاری</label>
                            <input type="text" class="form-control" id="category" name="category" >
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select class="form-control" id="status" name="status">
                                <option class="disabled" selected>انتخاب کنید</option>
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">اضافه کردن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



