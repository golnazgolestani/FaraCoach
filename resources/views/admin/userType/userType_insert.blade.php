@extends('admin.master.index')

@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header bg-secondary">
            <h5 class="card-title m-0 p-0 text-light">اضافه کردن دسته</h5>
        </div>
        <div class="card-body bg-secondary-light">
            <form method="post" action="/admin/settings/user_type" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="type">دسته بندی <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type')}}"/>
                </div>
                <div class="form-group">
                    <label for="code">کد دسته <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{old('code')}}" />
                    <small>این کد در صورت ثبت به هیچ عنوان قابل تغییر نمی باشد</small>
                </div>

                <div class="form-group">
                    <label for="status">وضعیت <span class="text-danger">*</span></label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="0" >غیرفعال</option>
                        <option value="1" >فعال</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">افزودن</button>
            </form>
        </div>
    </div>
@endsection
