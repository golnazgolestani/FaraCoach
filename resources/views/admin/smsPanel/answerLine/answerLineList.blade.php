@extends('admin.master.index')
@section('headerScript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
@endsection

@section('content')
    <div class="col-12 p-1">
        <a href="/admin/settings/answerline/create" class="btn btn-primary mb-1">اضافه کردن کلید<i class="fas fa-plus"></i></a>
        <table class="table table-striped table-bordered ">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">ثبت کننده</th>
                    <th scope="col">کلید</th>
                    <th scope="col">دسته تغییر</th>
                    <th scope="col">کیفیت</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">ویرایش</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
            @foreach($answerLine as $item)
                <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->fname.' '.$item->user->lname }}</td>
                    <td>
                        <a href="/admin/settings/answerline/{{$item->id}}/edit">{{$item->keyword}}</a>
                    </td>
                    <td>{{$item->userType->type}}</td>
                    <td>{{$item->problemFollowup['problem']}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="/admin/settings/answerline/{{$item->id}}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/admin/settings/answerline/{{$item->id}}" onsubmit="return confirm('آیا از حذف اطلاعات اطمینان دارد؟')">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger" >
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
