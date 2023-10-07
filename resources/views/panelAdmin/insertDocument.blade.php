@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">اضافه کردن فایل</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/documents" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" />
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک</label>
                    <input type="text" class="form-control @error('shortlink') is-invalid @enderror" id="shortlink" name="shortlink" />
                </div>
                <div class="form-group">
                    <label for="ckeditor">توضیحات</label>
                    <textarea id="ckeditor" name="content" class="@error('content') is-invalid @enderror"></textarea>
                </div>
                <div class="form-group">
                    <label>فایل</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" name="file" />
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="permission">سطح دسترسی</label>
                    <select id="permission" class="form-control p-0 @error('permission') is-invalid @enderror" name="permission">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="0">همه کاربرها</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">افزودن</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
