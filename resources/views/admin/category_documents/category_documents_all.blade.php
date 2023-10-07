@extends('admin.master.index')
@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="col-12 table-responsive">
        <a href="/admin/category_document/create" class="btn btn-primary mb-3">افزودن</a>
        <table class="dataTable table table-striped table-bordered text-center">
            <tr>
                <th>#</th>
                <th>دسته بندی</th>
                <th>زیر مجموعه</th>
                <th>وضعیت</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            @foreach($category_documents as $category_document)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category_document->category}}</td>
                    <td>{{$category_document->document->count()}}</td>
                    <td>{{$category_document->status}}</td>
                    <td>
                        <a href="/admin/category_document/{{$category_document->id}}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/admin/category_document/{{$category_document->id}}" onsubmit="return window.confirm('ایا از حذف دسته بندی اطمینان دارید؟')">
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

@section('footerScript')
    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable();
        } );
    </script>

@endsection
