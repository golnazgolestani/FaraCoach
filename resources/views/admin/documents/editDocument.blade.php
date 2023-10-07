@extends('admin.master.index')

@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">ویرایش فایل</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/documents/{{$document->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$document->title}}"/>
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک</label>
                    <input type="text" class="form-control @error('shortlink') is-invalid @enderror" id="shortlink" name="shortlink" value="{{$document->shortlink}}" />
                </div>
                <div class="form-group">
                    <label for="content">توضیحات</label>
                    <textarea class="form-control" id="content" name="content" class="@error('content') is-invalid @enderror">{{$document->content}}</textarea>
                </div>
                <div class="form-group">
                    <label>فایل</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" name="file" />
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_document_id">دسته بندی</label>

                    <select id="permission" class="form-control p-0 @error('category_document_id') is-invalid @enderror" name="category_document_id">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($category_documents as $category_document)
                            <option value="{{$category_document->id}}" @if($category_document->id==$document->category_document_id)  selected @endif >{{$category_document->category}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="permission">سطح دسترسی</label>
                    <select id="permission" class="form-control p-0 @error('permission') is-invalid @enderror" name="permission">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($document->permissions() as $key=>$permission)
                            <option value="{{$key}}" @if($document->permission==$key) selected @endif>{{$permission}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1" @if($document->status==1) selected @endif>نمایش</option>
                        <option value="0" @if($document->status==0) selected @endif>عدم نمایش</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
