@extends('admin.master.index')
@section('content')
    <div class="col-12 p-1">

        <table class="table table-striped table-bordered ">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">نام و نام خانوادگی</th>
                <th scope="col">تلفن همراه</th>
                <th scope="col">محتوی</th>
                <th scope="col">تاریخ و ساعت</th>
            </tr>
            </thead>
            <tbody>


            @foreach($response as $item)
                <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <a href="/admin/user/{{$item->id}}" target="_blank">{{$item->fname.' '.$item->lname}}</a>

                    </td>
                    <td>
                        <a href="/admin/user/{{$item->id}}" target="_blank">{{$item->sender}}</a>
                    </td>
                    <td>{{$item->message}}</td>
                    <td>{{ $item->jalaliDate}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
