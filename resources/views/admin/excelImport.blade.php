@extends('admin.master.index')
@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">اضافه کردن کاربر از طریق اکسل</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/users/storeExcel" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>فایل اکسل</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('excel') is-invalid @enderror" id="excel" name="excel" />
                        <label class="custom-file-label" for="excel">Choose file</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">ارسال فایل</button>
            </form>
        </div>
    </div>
@endsection
