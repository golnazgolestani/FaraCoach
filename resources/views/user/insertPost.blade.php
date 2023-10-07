@extends('user.master.index')
@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header bg-secondary">
            <h5 class="card-title text-light">اضافه کردن پست</h5>
        </div>
        <div class="card-body bg-secondary-light">
            <form method="post" action="/panel/post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" />
                </div>
                <div class="form-group">
                    <label for="image">آدرس عکس شاخص</label>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" />
                </div>
                <div class="form-group">
                    <label for="shortlink">لینک اختصاصی</label>
                    <input type="text" class="form-control @error('shortlink') is-invalid @enderror" id="shortlink" name="shortlink" />
                </div>
                <div class="form-group">
                    <label for="categorypost_id">دسته بندی</label>
                    <select id="categorypost_id" class="form-control p-0 @error('categorypost_id') is-invalid @enderror" name="categorypost_id">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($categoryposts as $item)
                            <option value="{{$item->id}}">{{$item->category}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="ckeditor">مطلب</label>
                    <textarea id="ckeditor" name="content" class="@error('content') is-invalid @enderror"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت انتشار</label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1">انتشار</option>
                        <option value="0">عدم انتشار</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_comment">وضعیت دیدگاه</label>
                    <select id="status_comment" class="form-control p-0 @error('status_comment') is-invalid @enderror" name="status_comment">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1">با دیدگاه</option>
                        <option value="0">بدون دیدگاه</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">انتشار</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection

@section('footerScript')
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection
