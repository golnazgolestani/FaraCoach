@extends('panelAdmin.master.index')
@section('headerScript')
    <style>
        a
        {
            color:#000000;
        }
        #listFriends .btn
        {
            border-radius: 5px;
        }

        #listFriends .btn
        {
            width: auto;
            height: auto;
        }

        #colors span
        {
            width: 25px;
            height: 25px;
        }
    </style>
@endsection
@section('rowcontent')
    <div class="container bg-light shadow-lg">
        <div class="row p-5">
            <div class="col-12 mb-3 border-bottom">
                <h4>لیست افراد شرکت کننده در دوره {{$event->event}}</h4>
            </div>
            <div class="col-12">
                <div class="row">
                    @if($users->count()>0)
                        @foreach($users as $item)
                            <div class="col-lg-3 col-sm-6" id="listFriends">
                                <div class="card hovercard  shadow-sm ">
                                    <div class="cardheader">

                                    </div>
                                    <div class="avatar">
                                        <img alt="" src="{{asset('documents/users/'.$item->personal_image)}}">
                                    </div>
                                    <div class="info">
                                        <div class="title">
                                            <p   >{{$item->fname}} {{$item->lname}}</p>
                                        </div>
                                        <div class="desc">{{$item->tel}}</div>
                                    </div>
                                    <div class="bottom">
                                        <p class="border-bottom pb-4">
                                            <span class="float-right" title="تاریخ ثبت نام">
                                                <i class="bi bi-calendar-date-fill"></i>
                                                {{$item->date_fa}}
                                            </span>
                                                <span class="float-left" title="ساعت ثبت نام">
                                                <i class="bi bi-clock-fill"></i>
                                                {{$item->time_fa}}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 alert alert-warning">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            تاکنون کسی در رویداد مورد نظر شرکت نکرده است
                        </div>
                    @endif
                </div>
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
