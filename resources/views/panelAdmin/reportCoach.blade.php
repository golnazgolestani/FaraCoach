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
    <?php
    //$roozha="'Sunday','Friday'";
    $roozha="";
    ?>

    <div id="app" class="col-md-4">
        <p>انتخاب بازه زمانی</p>
        <form method="get" action="/admin/booking/{{$coach->id}}/report" id="formBooking">
            {{csrf_field()}}
            <date-picker
                type="date"
                v-model="dates"
                range
                format="jYYYY-jMM-jDD"
                display-format="jYYYY/jMM/jDD"
                name="start_date"
                id="start_date"
            ></date-picker>
            <button type="submit" class="btn btn-success">نمایش</button>
        </form>
    </div>


    <div class="col-md-12 mt-3 table-responsive">
        <p>گزارش عملکرد {{$coach->fname}} {{$coach->lname}}</p>
        <table class="table border table-hover table-striped">
            <tr>
                <th scope="col">#</th>
                <th scope="col">تعداد جلسات کوچینگ در انتظار رزرو</th>
                <th scope="col">تعداد جلسات معارفه در انتظار رزرو</th>
                <th scope="col">تعداد جلسات کوچینگ رزرو شده</th>
                <th scope="col">تعداد جلسات معارفه رزرو شده</th>
                <th scope="col">تعداد جلسات کوچینگ برگزار شده</th>
                <th scope="col">تعداد جلسات معارفه برگزار شده</th>
                <th scope="col">تعداد جلسات کوچینگ کنسل شده</th>
                <th scope="col">تعداد جلسات معارفه کنسل شده</th>
            </tr>
            <tr>
                <td>#</td>
                <td>{{$reserveCoaching->count()}}</td>
                <td>{{$reserveMoarefeh->count()}}</td>
                <td>{{$waitingCoaching->count()}}</td>
                <td>{{$waitingMoarefeh->count()}}</td>
                <td>{{$heldCoaching->count()}}</td>
                <td>{{$heldMoarefeh->count()}}</td>
                <td>{{$cancelCoaching->count()}}</td>
                <td>{{$cancelMoarefeh->count()}}</td>
            </tr>
        </table>
    </div>

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
                        <p class=" p-0 m-0"> جلسات کوچینگ</p>
                    </div>
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-warning rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0"> جلسات معارفه</p>
                    </div>
                </div>

            </div>
            <div class="col-12 border-bottom  mt-3 mb-3">
                <h4>جلسات کوچینگ</h4>
            </div>
            @foreach($heldCoaching as $item)
                <div class="col-lg-3 col-sm-6" id="listFriends">
                    <div class="card hovercard  shadow-sm @if($item->caption_status=='رزرو شده') bg-warning @elseif($item->caption_status=='برگزار شد') bg-success @endif">
                        <div class="cardheader">

                        </div>
                        <div class="avatar">
                            <img alt="" src="{{asset('documents/users/'.$item->personal_image)}}">
                        </div>
                        <div class="info">
                            <div class="title">
                                <a class="btn-modal-introduced" href="{{$item->id}}" >{{$item->fname}} {{$item->lname}}</a>
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
            <div class="col-12 border-bottom  mt-3 mb-3">
                <h4>جلسات معارفه</h4>
            </div>
            @foreach($heldMoarefeh as $item)
                <div class="col-lg-3 col-sm-6" id="listFriends">
                    <div class="card hovercard  shadow-sm bg-warning ">
                        <div class="cardheader">

                        </div>
                        <div class="avatar">
                            <img alt="" src="{{asset('documents/users/'.$item->personal_image)}}">
                        </div>
                        <div class="info">
                            <div class="title">
                                <a class="btn-modal-introduced" href="{{$item->id}}" >{{$item->fname}} {{$item->lname}}</a>
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
                            <p>{{$item->caption_status}}</p>

                            <a class="btn btn-primary btn-sm" href="/panel/booking/{{$item->id}}" title="نمایش" >
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('footerScript')

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-jalaali@0.7.4/build/moment-jalaali.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-persian-datetime-picker/dist/vue-persian-datetime-picker-browser.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            components: {
                DatePicker: VuePersianDatetimePicker
            },
            data: {
                time:"{{old('time')}}",
                dates: [],
                message:'asdasdasd'
            }

        });


    </script>



@endsection
