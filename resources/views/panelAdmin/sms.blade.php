@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">ارسال کننده</th>
                <th scope="col">شماره های دریافت کننده</th>
                <th scope="col">متن</th>
                <th scope="col">تاریخ</th>
                <th scope="col">زمان</th>
                <th scope="col">وضعیت</th>
                <th scope="col">شناسه</th>
            </tr>
            </thead>
            <tbody>
                @foreach($sms as $item)
                    <tr>
                        <td scope="col">{{$item->insert_user_id}}</td>
                        <td scope="col">{{$item->recieve_user}}</td>
                        <td scope="col">{{$item->comment}}</td>
                        <td scope="col">{{$item->date_fa}}</td>
                        <td scope="col">{{$item->time_fa}}</td>
                        <td scope="col">{{$item->type}}</td>
                        <td scope="col">{{$item->code}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$sms->links()}}
    </div>
@endsection
