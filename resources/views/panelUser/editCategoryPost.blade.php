@extends('panelUser.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">ویرایش دسته بندی</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/panel/categoryposts/{{$category_post->id}}" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="category">عنوان</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category"  value="{{$category_post->category}}"/>
                </div>
                <div class="form-group">
                    <label for="shortlink">لینک اختصاصی</label>
                    <input type="text" class="form-control @error('shortlink') is-invalid @enderror" id="shortlink" name="shortlink" value="{{$category_post->shortlink}}"/>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت انتشار</label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1" @if($category_post->status==1) selected @endif>انتشار</option>
                        <option value="0" @if($category_post->status==0) selected @endif>عدم انتشار</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">انتشار</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
