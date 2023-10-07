@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-12 table-responsive">
        <a href="/admin/documents/create" class="btn btn-primary">اضافه کردن فایل ها<i class="fas fa-file-medical"></i></a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان</th>
                <th scope="col">سطح دسترسی</th>
                <th scope="col">تعداد کلیک</th>
                <th scope="col">تاریخ ثبت</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $item)
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <a href="/admin/documents/{{$item->shortlink}}" target="_blank">
                            {{$item->title}}
                        </a>
                    </td>
                    <td>{{$item->permission}}</td>
                    <td>{{$item->clicks}}</td>
                    <td>{{$item->date_fa}}</td>
                    <td>
                        <a class="btn btn-warning" href="/admin/documents/{{$item->id}}/edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/admin/documents/{{$item->id}}" onsubmit="return confirm('آیا از حذف استاد اطمینان دارید؟(در صورت حذف تمام سوابق دوره های استاد و اطلاعات آن از بانک حذف می شود)');">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button  class="btn btn-danger" type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
