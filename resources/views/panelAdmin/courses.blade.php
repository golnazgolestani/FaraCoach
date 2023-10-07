@extends('panelAdmin.master.index')
@section('rowcontent')
    <a href="/admin/courses/create" class="btn btn-primary mb-5">اضافه کردن<i class="fas fa-plus"></i></a>
    <table class="table .table-striped .table-bordered ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">دوره</th>
            <th scope="col">زمان شروع</th>
            <th scope="col">تعداد ساعت</th>
            <th scope="col">استاد</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;  ?>
        @foreach($courses as $item)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>
                    <a href="/admin/courses/{{$item->shortlink}}" class="d-block" target="_blank" >{{$item->course}}</a>
                </td>
                <td>
                    <a href="/admin/courses/{{$item->shortlink}}" class="d-block" target="_blank" >{{$item->start}}</a>
                </td>
                <td>
                    <a href="/admin/courses/{{$item->shortlink}}" class="d-block" target="_blank" >{{$item->duration}}</a>
                </td>
                <td>{{$item->teacher_id}}</td>
                <td>
                    <a href="/admin/courses/{{$item->shortlink}}/edit" class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="/admin/teachers/{{$item->shortlink}}" onsubmit="return confirm('آیا از حذف دوره اطمینان دارید؟(در صورت حذف تمام اطلاعات مربوط به آن از بانک حذف می شود)')">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button  class="btn btn-danger" type="submit">
                            <i class="fas fa-user-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
