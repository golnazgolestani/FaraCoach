@extends('master.index')
@section('headerscript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <style>
        #main{
            background-image: url("{{asset('/images/back3.jpg')}}");
            height:auto;
            background-size:100%;
        }
        .back{
            background-image: url("{{asset('/images/bac6.jpg')}}");
            height:500px;
            background-size:100% 100%;
        }
        .back h1{
            color:rgb(250 85 50);
            font-weight:600;
        }
        .back h2{
            font-size:40px;
            font-weight:700;
            margin-top: 65px;
        }
        .back p{
            color: rgb(166 177 202);
            font-size:20px;
        }
        #btn-id{
            width:200px;
            height:60px;
            border-radius:50px;
        }
        #btn-play {
            background-color:rgb(250 85 50);
            width:60px;
            height:60px;
            border-radius:50px;
        }
        .btn-font{
            font-size:30px
        }
        #hot-event h2{
            font-size:50px;
            font-weight:700;
            display:inline;
        }
        #hot{
            width: 60px;
            margin-top: -44px;
        }
        #all-event{
            background-color:rgba(2,1,19,.81);
            border-radius: 20px;
            min-height:400px;
        }

        #all-event .row > div
        {
            position: relative;
            top: -80px;
        }

        @media only screen and (max-width: 376px){
            . back {
                display:none;
            }
            #banner{
                background-image: url("{{asset('/images/back7.jpg')}}");
                background-size:100% 100%;
            }
            #row2{
                margin-top: 80px;
            }
            #hot-event h2 {
                font-size: 25px;
            }
            #hot {
                width: 43px;
                margin-top: -12px;
            }
        }

    </style>
@endsection
@section('row1')
    <div class="row" id="main">
        <div class="col-12 back">
            <div class="row">
                <div class="col-12">
                    <div class="col-xl-6 col-md-6 col-sm-12 col-sx-12 mt-5">
                        <h1> رویدادهای فراکوچ</h1>
                        <h2>جدید ترین رویدادهای فراکوچ را اینجا ببینید</h2>
                        <p>وبینار یه کلاسِ آنلاین با حضور استاده!</p>
                        <p>این فرصت رو از دست نده و شرکت کن ...</p>
                        <!--
                        <button type="button" class="btn btn-info btn-lg shadow-lg mt-5" id="btn-id"> همین الان ببین <i class="bi bi-arrow-left p-2 btn-font"></i></button>
                        <button type="button" class="btn btn-circle btn-lg shadow-lg mt-5 ml-4" id="btn-play"><i class="bi bi-caret-right-fill text-white btn-font"  ></i></button>
                        -->
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-sx-12 float-left " id="banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" id="row2">
                <div class="col-12 text-center mt-5 mb-5" id="hot-event">
                    <h2> رویدادهای داغ </h2>
                    <img src="{{asset ('/images/shole.png')}}" id="hot"></div>

            </div>
            <div class="col-12 mt-5 mb-5 " id="all-event">
                <div class="container">
                    <div class="row pt-3">
                        @foreach($events as $item)
                            <div class="col-xs-6 col-md-3 col-lg-3 col-xl-3 mb-4  ">
                                <div class="card h-100">
                                    <div class="h-50 mb-2">
                                        <a href="{{asset('/event/'.$item->shortlink)}}">
                                            <img src="{{asset('/documents/events/'.$item->image)}}" style="height: 220px !important;" class="img-fluid card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <a href="{{asset('/event/'.$item->shortlink)}}">
                                            <h5 class="card-title text-center">
                                                {{$item->event}}
                                            </h5>
                                        </a>
                                        <div class="col-12 p-0 text-center font-weight-bold">
                                            <p>قیمت {{ number_format($item->fi) }} تومان</p>
                                        </div>
                                        <div class="col-12 p-0">
                                            <p class="p-0  float-right  font-weight-bold d-inline">
                                                <i class="bi bi-calendar-event-fill"></i> {{$item->eventDate}}
                                            </p>
                                            <p class="p-0  float-left font-weight-bold d-inline">
                                                <i class="bi bi-alarm-fill"></i> {{$item->start_time}}
                                            </p>
                                        </div>

                                        <div class="col-12 text-center">
                                            @if($item->status_event=='در حال ثبت نام')
                                                <a href="{{asset('/event/'.$item->shortlink)}}" class=" btn btn-outline-primary">{{$item->status_event}}</a>
                                            @elseif($item->status_event=='تکمیل ظرفیت')
                                                <a href="{{asset('/event/'.$item->shortlink)}}" class=" btn btn-outline-warning">{{$item->status_event}}</a>
                                            @elseif($item->status_event=='برگزار شد')
                                                <a href="{{asset('/event/'.$item->shortlink)}}" class=" btn btn-outline-danger">{{$item->status_event}}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>
@endsection
