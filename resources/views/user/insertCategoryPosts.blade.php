@extends('user.master.index')
@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header bg-secondary">
            <h5 class="card-title text-light">اضافه کردن دسته بندی</h5>
        </div>
        <div class="card-body bg-secondary-light">
            <form method="post" action="/panel/categoryposts" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="category">عنوان</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" />
                </div>
                <div class="form-group">
                    <label for="shortlink">لینک اختصاصی</label>
                    <input type="text" class="form-control @error('shortlink') is-invalid @enderror" id="shortlink" name="shortlink" />
                </div>
                <div class="form-group">
                    <label for="status">وضعیت انتشار</label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1">انتشار</option>
                        <option value="0">عدم انتشار</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">انتشار</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
