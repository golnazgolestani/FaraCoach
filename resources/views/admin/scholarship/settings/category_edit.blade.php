@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info border-info">
                    <h4 class="card-title m-0">ویرایش زمینه های همکاری بورسیه</h4>
                </div>
                <div class="card-body" >
                    <form method="post" action="/admin/collabration_category/{{$collabration_category->id}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="form-group">
                            <label for="category">زمینه همکاری</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{$collabration_category->category}}">
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select class="form-control" id="status" name="status">
                                <option class="disabled" selected>انتخاب کنید</option>
                                <option value="1" @if($collabration_category->status==1) selected @endif>فعال</option>
                                <option value="0" @if($collabration_category->status==0) selected @endif>غیرفعال</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">اضافه کردن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



