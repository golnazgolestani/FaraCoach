@extends('panelAdmin.master.index')
@section('rowcontent')
    <a href="/admin/coursetype/create" class="btn btn-primary mb-5">اضافه کردن نوع دوره<i class="fas fa-plus"></i></a>
    <table class="table .table-striped .table-bordered ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نوع دوره</th>
            <th scope="col">شورتکد</th>
            <th scope="col">وضعیت</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;  ?>
        @foreach($courseType as $item)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>
                    {{$item->type}}
                </td>
                <td>
                    {{$item->shortlink}}
                </td>
                <td>
                    {{$item->status}}
                </td>
                <td>
                    <a href="/admin/coursetype/{{$item->shortlink}}/edit" class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="/admin/coursetype/{{$item->shortlink}}" onsubmit="return confirm('آیا از حذف دسته اطمینان دارید؟(در صورت حذف تمام سوابق و اطلاعات آن از بانک حذف می شود)');">
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
