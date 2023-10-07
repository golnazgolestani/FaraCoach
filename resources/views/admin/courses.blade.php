@extends('admin.master.index')
@section('content')
    <div class="col-12 p-1 table-responsive">
        <a href="/admin/courses/create" class="btn btn-primary mb-1">اضافه کردن<i class="fas fa-plus"></i></a>

        <table class="dataTable table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">دوره</th>
                    <th scope="col">زمان شروع</th>
                    <th scope="col">تعداد ساعت</th>
                    <th scope="col">استاد</th>
                    <th scope="col">شرکت کننده ها</th>
                    <th scope="col">ویرایش</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $item)
                    <tr>
                        <th scope="row">
                            {{$loop->iteration}}
                        </th>
                        <td>
                            <a href="/admin/courses/{{$item->shortlink}}" class="d-block" target="_blank" >{{$item->course}}</a>
                        </td>
                        <td>
                            <a href="/admin/courses/{{$item->shortlink}}" class="d-block" target="_blank" >{{$item->start}}</a>
                        </td>
                        <td>
                            <a href="/admin/courses/{{$item->shortlink}}" class="d-block" target="_blank" >{{$item->duration}}</a>
                        </td>

                        <td>
                            @if(isset($item->teacher->user))
                                {{$item->teacher->user->fname." ".$item->teacher->user->lname}}
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/admin/courses/{{$item->shortlink}}/students" class="btn btn-success" target="_blank" >{{$item->students()->count()}} نفر</a>
                        </td>
                        <td>
                            <a href="/admin/courses/{{$item->shortlink}}/edit" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="/admin/courses/{{$item->shortlink}}" onsubmit="return confirm('آیا از حذف دوره اطمینان دارید؟(در صورت حذف تمام اطلاعات مربوط به آن از بانک حذف می شود)')">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button  class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
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
