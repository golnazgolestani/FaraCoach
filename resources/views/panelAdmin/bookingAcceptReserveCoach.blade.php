@extends('panelUser.master.index')
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
    <div class="container">
        <div class="row shadow-lg">
            <div class="col-12 m-5 border-bottom">
                <h3>لیست جلسات رزرو شده</h3>
            </div>
            <div class="col-12" id="colors">
                <div class="row">
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-success rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0"> جلسات برگزار شده</p>
                    </div>
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-warning rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0"> جلسات رزرو شده بلاتکلیف</p>
                    </div>

                </div>

            </div>
            @foreach($booking as $item)
                <div class="col-lg-3 col-sm-6" id="listFriends">

                    <div class="card hovercard  shadow-sm @if($item->caption_status=='رزرو شد') bg-warning @elseif($item->caption_status=='برگزارشد') bg-success @endif">
                        <div class="cardheader">

                        </div>
                        <div class="avatar">
                            <img alt="" src="{{asset('documents/users/'.$item->personal_image)}}">
                        </div>
                        <div class="info">
                            <div class="title">
                                <a class="btn-modal-introduced" href="{{$item->id}}"   >{{$item->fname}} {{$item->lname}}</a>
                            </div>
                            <div class="desc">{{$item->tel}}</div>
                        </div>
                        <div class="bottom">
                            <p class="border-bottom pb-4">
                                <span class="float-right">
                                    <i class="bi bi-calendar-date-fill"></i>
                                    {{$item->start_date}}
                                </span>
                                <span class="float-left">
                                    <i class="bi bi-clock-fill"></i>
                                    {{$item->start_time}}
                                </span>
                            </p>
                            <p class="border-bottom">
                                {{$item->duration_booking}}
                            </p>
                            <p class="border-bottom pb-4">
                                <span class="float-right">ارزیابی  @if(is_null($item->feedback_coachings_id))<i class="bi bi-x-lg" ></i>@else <i class="bi bi-check-lg" ></i> @endif</span>
                                <span class="float-left">پیش جلسه  @if(is_null($item->presession))<i class="bi bi-x-lg"></i>@else <i class="bi bi-check-lg"></i> @endif</span>
                            </p>

                            <p>{{$item->caption_status}}</p>

                            <a class="btn btn-primary btn-sm" href="/panel/booking/{{$item->id}}" title="نمایش" >
                                <i class="bi bi-eye-fill"></i>
                            </a>


                            @if($item->start_date>$dateNow)
                                <form class="d-inline-block" method="POST" action="/booking/{{$item->booking_id}}" onsubmit="return confirm('آیا از لغو جلسه اطمینان دارید؟')">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <input type="hidden" name="status" value="4" />
                                    <button type="submit" class="btn btn-danger">
                                        لغو جلسه
                                    </button>
                                </form>

                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
