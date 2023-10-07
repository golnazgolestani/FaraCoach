@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header bg-info">
            <h5 class="card-title m-0 p-0">اضافه کردن موضوع</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/category_coach" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="course">موضوع *</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{old('category')}}"/>
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک *</label>
                    <input type="text" class="form-control @error('shortlink') is-invalid @enderror" id="shortlink" name="shortlink" value="{{old('shortlink')}}" />
                </div>

                <div class="form-group">
                    <label for="status">وضعیت *</label>
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
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
