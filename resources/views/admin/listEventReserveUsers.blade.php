@extends('admin.master.index')
@section('headerScript')
    <style>
        a
        {
            color:#000000;
        }

        #colors span
        {
            width: 25px;
            height: 25px;
        }
    </style>
@endsection
@section('content')
    <div class="container bg-secondary-light">
        <div class="row p-1">
            <div class="col-12 mb-3 border-bottom">

                <h4>لیست افراد شرکت کننده در دوره {{$event->event}}</h4>
            </div>
            <div class="col-12">
                <div class="row table-responsive">
                    @if($event->eventreserves->count()>0)
                        <table class="table">
                            <tr>
                                <th></th>
                                <th>مشخصات</th>
                                <th>شماره تماس</th>
                                <th>تاریخ</th>
                                <th>ساعت</th>
                            </tr>
                            @foreach($eventreserves as $item)

                                <tr>
                                    <td>
                                        <img class="rounded-circle" src="{{asset('documents/users/'.$item->user->personal_image)}}" width="50px" height="50px">
                                    </td>
                                    <td>{{$item->user->fname}} {{$item->user->lname}}</td>
                                    <td>{{$item->user->tel}}</td>
                                    <td>{{$item->date_fa}}</td>
                                    <td>{{$item->time_fa}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="col-12 alert alert-warning">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            تاکنون کسی در رویداد مورد نظر شرکت نکرده است
                        </div>
                    @endif
                </div>
                {{$eventreserves->links()}}
            </div>
        </div>
    </div>
@endsection
