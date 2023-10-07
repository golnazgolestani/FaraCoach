@extends('admin.master.index')
@section('headerScript')

    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />

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

        .card-counter{
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover{
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary{
            background-color: #99caff;
            color: #000000;
        }

        .card-counter.danger{
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success{
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info{
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter.warning{
            background-color: #e6e600;
            color: #000000 ;
        }

        .card-counter i{
            font-size: 5em;
            opacity: 0.2;
        }

        .card-counter .count-numbers{
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 25px;
            display: block;
        }

        .card-counter .count-name{
            position: absolute;
            right: 35px;
            top: 65px;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 14px;
        }
    </style>
@endsection

@section('content')
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
    </div>

    <div class="col-md-3">
        <div class="card-counter info">
            <span class="count-numbers text-white">{{$waitingCoaching->count()}}  جلسه </span>
            <span class="count-name text-white">جلسه کوچینگ در انتظار رزرو</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-counter info">
            <span class="count-numbers text-white">{{$waitingMoarefeh->count()}} جلسه </span>
            <span class="count-name text-white">جلسه معارفه در انتظار رزرو</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter warning">
            <span class="count-numbers text-white"> {{$reserveCoaching->count()}}جلسه </span>
            <span class="count-name text-white">جلسه کوچینگ رزرو شده</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter warning">
            <span class="count-numbers text-white">{{$reserveMoarefeh->count()}} جلسه </span>
            <span class="count-name text-white">جلسه معارفه رزرو شده</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter success">
            <span class="count-numbers text-white">{{$heldCoaching->count()}} جلسه </span>
            <span class="count-name text-white">جلسه کوچینگ برگزار شده</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter success">
            <span class="count-numbers text-white">{{$heldMoarefeh->count()}} جلسه </span>
            <span class="count-name text-white">جلسه  معارفه برگزار شده</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter danger">
            <span class="count-numbers text-white">{{$cancelCoaching->count()}} جلسه </span>
            <span class="count-name text-white">جلسه  کوچینگ کنسل شده</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter danger">
            <span class="count-numbers text-white">{{$cancelMoarefeh->count()}} جلسه </span>
            <span class="count-name text-white">جلسه معارفه کنسل شده</span>
        </div>
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



                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="reserveCoach">
                        <button class="nav-link" id="reserveCoach-tab" data-toggle="tab" data-target="#reserveCoach" type="button" role="tab" aria-controls="reserveCoach" aria-selected="false">جلسات کوچینگ
                            <span class="badge badge-success">{{$heldCoaching->count()}}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="reserveMoarefeh">
                        <button class="nav-link" id="reserveMoarefeh-tab" data-toggle="tab" data-target="#reserveMoarefeh" type="button" role="tab" aria-controls="reserveMoarefeh" aria-selected="false">جلسه معارفه
                            <span class="badge badge-success">{{$heldMoarefeh->count()}}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="cancelMoarefeh">
                        <button class="nav-link " id="cancelMoarefeh-tab" data-toggle="tab" data-target="#cancelMoarefeh" type="button" role="tab" aria-controls="cancelMoarefeh" aria-selected="false">جلسه معارفه کنسل شده
                            <span class="badge badge-danger">{{$cancelMoarefeh->count()}}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="cancelCoaching">
                        <button class="nav-link " id="cancelCoaching-tab" data-toggle="tab" data-target="#cancelCoaching" type="button" role="tab" aria-controls="learn" aria-selected="false">جلسه کوچینگ کنسل شده
                            <span class="badge badge-danger">{{$cancelCoaching->count()}}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="reserveCoaching">
                        <button class="nav-link " id="reserveCoaching-tab" data-toggle="tab" data-target="#reserveCoaching" type="button" role="tab" aria-controls="learn" aria-selected="false">جلسه کوچینگ بلاتکلیف
                            <span class="badge badge-warning">{{$reserveCoaching->count()}}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="reserveMoarefeh">
                        <button class="nav-link " id="reserveMoarefeh-tab" data-toggle="tab" data-target="#reserveMoarefeh" type="button" role="tab" aria-controls="learn" aria-selected="false">جلسه معارفه بلاتکلیف
                            <span class="badge badge-warning">{{$reserveMoarefeh->count()}}</span>
                        </button>
                    </li>
                </ul>
            </div>





            <div class="col-12 ">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="reserveCoach" role="tabpanel" aria-labelledby="reserveCoach-tab">
                        <p>جمع مبلغ واریز شده جهت جلسات: {{ number_format($heldCoaching->sum('final_off')) }} تومان</p>

                        <table class="datatable table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد جلسه</th>
                                <th>عکس</th>
                                <th>مراجع</th>
                                <th>تاریخ جلسه</th>
                                <th>ساعت جلسه</th>
                                <th>نوع جلسه</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach($heldCoaching as $item)
                                <tr class="@if($item->caption_status=='رزرو شده') bg-warning @elseif($item->caption_status=='برگزار شد') bg-success @endif">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="/admin/booking/{{$item->id}}/showadminbooking">
                                            {{$item->id}}
                                        </a>
                                    </td>
                                    <td class="p-0">
                                        <img src="{{asset('/documents/users/'.$item->user->personal_image)}}" class="rounded-circle "  width="50px" height="50px" />
                                    </td>
                                    <td>
                                        {{$item->user->fname.' '.$item->user->lname}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_date}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_time}}
                                    </td>
                                    <td>
                                        {{$item->duration_booking}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade" id="reserveMoarefeh" role="tabpanel" aria-labelledby="reserveMoarefeh-tab">
                        <p>جمع مبلغ واریز شده جهت جلسات: {{ number_format($heldMoarefeh->sum('final_off')) }} تومان</p>

                        <table class="datatable table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد جلسه</th>
                                <th>عکس</th>
                                <th>مراجع</th>
                                <th>تاریخ جلسه</th>
                                <th>ساعت جلسه</th>
                                <th>نوع جلسه</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($heldMoarefeh as $item)
                                <tr class="@if($item->caption_status=='رزرو شده') bg-warning @elseif($item->caption_status=='برگزار شد') bg-success @endif">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="/admin/booking/{{$item->id}}/showadminbooking">
                                            {{$item->id}}
                                        </a>
                                    </td>

                                    <td class="p-0">
                                        <img src="{{asset('/documents/users/'.$item->user->personal_image)}}" class="rounded-circle "  width="50px" height="50px" />
                                    </td>
                                    <td>
                                        {{$item->user->fname.' '.$item->user->lname}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_date}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_time}}
                                    </td>
                                    <td>
                                        {{$item->duration_booking}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="cancelMoarefeh" role="tabpanel" aria-labelledby="cancelMoarefeh-tab">
                        <p>جمع مبلغ واریز شده جهت جلسات: {{ number_format($cancelMoarefeh->sum('final_off')) }} تومان</p>
                        <table class="datatable table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد جلسه</th>
                                <th>عکس</th>
                                <th>مراجع</th>
                                <th>تاریخ جلسه</th>
                                <th>ساعت جلسه</th>
                                <th>نوع کنسل</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cancelMoarefeh as $item)
                                <tr class="@if($item->caption_status=='رزرو شده') bg-warning @elseif($item->caption_status=='برگزار شد') bg-success @endif">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="/admin/booking/{{$item->id}}/showadminbooking">
                                            {{$item->id}}
                                        </a>
                                    </td>
                                    <td class="p-0">
                                        <img src="{{asset('/documents/users/'.$item->user->personal_image)}}" class="rounded-circle "  width="50px" height="50px" />
                                    </td>
                                    <td>
                                        {{$item->user->fname.' '.$item->user->lname}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_date}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_time}}
                                    </td>
                                    <td>
                                        @if($item->status==4)
                                            کنسل شد
                                        @elseif($item->status==41)
                                            کنسل مراجع
                                        @elseif($item->status==42)
                                            کنسل کوچ
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="cancelCoaching" role="tabpanel" aria-labelledby="cancelCoaching-tab">
                        <p>جمع مبلغ واریز شده جهت جلسات: {{ number_format($cancelCoaching->sum('final_off')) }} تومان</p>
                        <table class="datatable table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد جلسه</th>
                                <th>عکس</th>
                                <th>مراجع</th>
                                <th>تاریخ جلسه</th>
                                <th>ساعت جلسه</th>
                                <th>نوع کنسل</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cancelCoaching as $item)
                                <tr class="@if($item->caption_status=='رزرو شده') bg-warning @elseif($item->caption_status=='برگزار شد') bg-success @endif">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="/admin/booking/{{$item->id}}/showadminbooking">
                                            {{$item->id}}
                                        </a>
                                    </td>
                                    <td class="p-0">
                                        <img src="{{asset('/documents/users/'.$item->user->personal_image)}}" class="rounded-circle "  width="50px" height="50px" />
                                    </td>
                                    <td>
                                        {{$item->user->fname.' '.$item->user->lname}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_date}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_time}}
                                    </td>
                                    <td>
                                        @if($item->status==4)
                                            کنسل شد
                                        @elseif($item->status==41)
                                            کنسل مراجع
                                        @elseif($item->status==42)
                                            کنسل کوچ
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="reserveCoaching" role="tabpanel" aria-labelledby="reserveCoaching-tab">
                        <p>جمع مبلغ واریز شده جهت جلسات: {{ number_format($reserveCoaching->sum('final_off')) }} تومان</p>
                        <table class="datatable table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد جلسه</th>
                                <th>عکس</th>
                                <th>مراجع</th>
                                <th>تاریخ جلسه</th>
                                <th>ساعت جلسه</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reserveCoaching as $item)
                                <tr class="@if($item->caption_status=='رزرو شده') bg-warning @elseif($item->caption_status=='برگزار شد') bg-success @endif">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="/panel/reserve/{{$item->id}}">
                                            {{$item->id}}
                                        </a>
                                    </td>
                                    <td class="p-0">
                                        <img src="{{asset('/documents/users/'.$item->user->personal_image)}}" class="rounded-circle "  width="50px" height="50px" />
                                    </td>
                                    <td>
                                        {{$item->user->fname.' '.$item->user->lname}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_date}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_time}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="reserveMoarefeh" role="tabpanel" aria-labelledby="reserveMoarefeh-tab">
                        <p>جمع مبلغ واریز شده جهت جلسات: {{ number_format($reserveMoarefeh->sum('final_off')) }} تومان</p>
                        <table class="datatable table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد جلسه</th>
                                <th>عکس</th>
                                <th>مراجع</th>
                                <th>تاریخ جلسه</th>
                                <th>ساعت جلسه</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reserveMoarefeh as $item)
                                <tr class="@if($item->caption_status=='رزرو شده') bg-warning @elseif($item->caption_status=='برگزار شد') bg-success @endif">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="/panel/reserve/{{$item->id}}">
                                            {{$item->id}}
                                        </a>
                                    </td>
                                    <td class="p-0">
                                        <img src="{{asset('/documents/users/'.$item->user->personal_image)}}" class="rounded-circle "  width="50px" height="50px" />
                                    </td>
                                    <td>
                                        {{$item->user->fname.' '.$item->user->lname}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_date}}
                                    </td>
                                    <td>
                                        {{$item->booking->start_time}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('footerScript')


    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/buttons.print.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                dom: 'Bfrltip',
                buttons: [
                   'excel'
                ]
            } );
        } );
    </script>



    <script src="{{asset('/js/vue@2.js')}}"></script>
    <script src="{{asset('/js/moment.js')}}"></script>
    <script src="{{asset('/js/moment-jalaali.js')}}"></script>
    <script src="{{asset('/js/vue-persian-datetime-picker-browser.js')}}"></script>
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
