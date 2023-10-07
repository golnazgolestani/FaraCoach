@extends('admin.master.index')
@section('content')
        <div class="col-12">
            <div class="row">
                <div class="col-6 mx-auto mb-3">
                    <form method="post" action="/admin/documents" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="type" value="scholarship" />
                        <div class="form-group">
                            <label for="title">عنوان فایل</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="shortlink">شورت لینک</label>
                            <input type="text" class="form-control" id="shortlink" name="shortlink">
                        </div>
                        <div class="form-group">
                            <label for="content">توضیحات:</label>
                            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_document_id">دسته بندی</label>
                            <select id="permission" class="form-control p-0 @error('category_document_id') is-invalid @enderror" name="category_document_id">
                                <option selected disabled>انتخاب کنید</option>
                                @foreach($category_documents as $category_document )
                                    <option value="{{$category_document->id}}" >{{$category_document->category}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="permission">سطح دسترسی</label>
                            <select id="permission" class="form-control p-0 @error('permission') is-invalid @enderror" name="permission">
                                <option selected disabled>انتخاب کنید</option>
                                <option value="0" >همه کاربرها</option>
                                <option value="1" >دانشجویان</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">فایل ضمیمه:</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                        <input type="submit" class="btn btn-success" value="بارگذاری">

                    </form>

                </div>
            </div>
            <table class="table table-striped table-bordered text-center">
                <tr>
                    <th>#</th>
                    <th>عنوان</th>
                    <th>نوع فایل</th>
                    <th>دسته بندی</th>
                    <th>تعداد دانلود</th>
                    <th>حجم فایل</th>
                    <th>سطح دسترسی</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                @foreach($documents as $document)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$document->title}}</td>
                        <td>{{$document->extension}}</td>
                        <td>
                            {{$document->category_document['category']}}
                        </td>
                        <td>{{$document->clicks}}</td>

                        <td>
                            @if(($document->size/1024)<1024)
                                {{substr((string)$document->size,0,3)}}   KB
                            @else
                                {{ceil(number_format($document->size/1024))}}  MB
                            @endif
                        </td>
                        <td>
                            {{$document->get_permission()}}
                        </td>
                        <td>
                            <a href="/admin/documents/{{$document->id}}/edit" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="/admin/documents/{{$document->id}}" onsubmit="return window.confirm('ایا از حذف فایل اطمینان دارید؟')">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>


        </div>
@endsection
