@extends('admin.master.index')
@section('content')
    <div class="col-12 p-2">
        <a href="/admin/category_coach/create" class="btn btn-primary">اضافه کردن<i class="fas fa-plus"></i></a>
        <table class="table .table-striped .table-bordered ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">موضوعات</th>
                <th scope="col">وضعیت</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody class="bg-secondary-light">
            <?php $i=1;  ?>
            @foreach($categorycoaches as $item)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>
                        {{$item->category}}
                    </td>
                    <td>
                       {{$item->status}}
                    </td>
                    <td>
                        <a href="/admin/category_coach/{{$item->id}}/edit" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/admin/category_coach/{{$item->id}}" onsubmit="return confirm('آیا از حذف دسته اطمینان دارید؟')">
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
