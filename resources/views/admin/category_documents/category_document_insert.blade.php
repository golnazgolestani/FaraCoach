@extends('admin.master.index')

@section('content')
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">ایجاد دسته بندی </h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/category_document" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="category">دسته بندی</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{old('category')}}"/>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1" >فعال</option>
                        <option value="0" >غیرفعال</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">ثبت</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
