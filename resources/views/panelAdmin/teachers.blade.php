@extends('panelAdmin.master.index')
@section('rowcontent')
    <a href="/admin/teachers/create" class="btn btn-primary mb-5">اضافه کردن<i class="fas fa-plus"></i></a>
    <table class="table .table-striped .table-bordered ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">نام خانوادگی</th>
            <th scope="col">تلفن همراه</th>
            <th scope="col">تحصیلات</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;  ?>
        @foreach($teachers as $item)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>
                    <a href="/admin/teachers/{{$item->shortlink}}" class="d-block" target="_blank" >{{$item->fname}}</a>
                </td>
                <td>
                    <a href="/admin/teachers/{{$item->shortlink}}" class="d-block" target="_blank" >{{$item->lname}}</a>
                </td>
                <td>{{$item->tel}}</td>
                <td>{{$item->education}}</td>
                <td>
                    <a href="/admin/teachers/{{$item->shortlink}}/edit" class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="/admin/teachers/{{$item->shortlink}}" onsubmit="return confirm('آیا از حذف استاد اطمینان دارید؟(در صورت حذف تمام سوابق دوره های استاد و اطلاعات آن از بانک حذف می شود)');">
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
