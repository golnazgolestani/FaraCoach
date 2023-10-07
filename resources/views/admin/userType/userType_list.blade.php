@extends('admin.master.index')

@section('content')
    <div class="col-12 p-1">
        <a href="/admin/settings/user_type/create" class="btn btn-primary mb-1">اضافه کردن دسته<i class="fas fa-plus"></i></a>
        <table class="table table-striped table-bordered ">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">دسته</th>
                <th scope="col">کد</th>

            </tr>
            </thead>
            <tbody>
                @foreach($types as $item)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <a href="/admin/settings/user_type/{{$item->id}}/edit">{{$item->type}}</a>
                        </td>
                        <td>{{$item->code}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
