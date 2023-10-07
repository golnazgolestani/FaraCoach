@extends('panelAdmin.master.index')
@section('rowcontent')
    <a href="/admin/type_coach/create" class="btn btn-primary mb-5">اضافه کردن<i class="fas fa-plus"></i></a>
    <table class="table .table-striped .table-bordered ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">سطح</th>
            <th scope="col">وضعیت</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;  ?>
        @foreach($typecoaches as $item)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>
                    {{$item->type}}
                </td>
                <td>
                    {{$item->status}}
                </td>
                <td>
                    <a href="/admin/type_coach/{{$item->id}}/edit" class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="/admin/type_coach/{{$item->id}}" onsubmit="return confirm('آیا از حذف سطح اطمینان دارید؟')">
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
