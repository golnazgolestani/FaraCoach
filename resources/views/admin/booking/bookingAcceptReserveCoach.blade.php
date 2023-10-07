@extends('admin.master.index')
@section('headerScript')

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

        .bg-warning2
        {
            background-color: #fff0b3 !important;
        }

        .bg-success2
        {
            background-color: #c6ffb3 !important;
        }

        .bg-danger2
        {
            background-color:  #ff9999 !important;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row shadow-lg">
            <div class="col-12 m-5 border-bottom">
                <h3>لیست جلسات رزرو شده</h3>
            </div>
            <div class="col-12">
                <div id="app" class="col-md-4">
                    <form method="get" action="/admin/booking/accept" id="formBooking">
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
                        <!--
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="رزرو شده">
                            <label class="form-check-label" for="inlineRadio1">رزرو شده</label>
                        </div>
                        -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="روز برگزاری">
                            <label class="form-check-label" for="inlineRadio2">روز برگزاری</label>
                        </div>
                        <button type="submit" class="btn btn-success">بگرد</button>
                    </form>
                </div>
            </div>


            <div class="col-12" id="colors">
                <div class="row">
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-success2 rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0">  برگزار شده</p>
                    </div>
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-warning2 rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0">  رزرو شده بلاتکلیف</p>
                    </div>
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-danger rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0"> کنسل شده</p>
                    </div>
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-info rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0"> غیبت مراجع</p>
                    </div>
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-secondary rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0"> غیبت کوچ</p>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <table class="dataTable table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>کد جلسه</th>
                            <th>کوچ</th>
                            <th>مراجع</th>
                            <th>نوع جلسه</th>
                            <th>تاریخ</th>
                            <th>ساعت</th>
                            <th>پیش جلسه</th>
                            <th>ارزیابی</th>
                            <th>وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reserve as $item)
                            <tr class="@if($item->status==1) bg-warning2 @elseif($item->status==3) bg-success2 @elseif($item->status==4 || $item->status==41 ||$item->status==42 ) bg-danger2 @elseif($item->status==5) bg-info @elseif($item->status==6) bg-secondary  @endif">
                                <td>
                                    @if(($item->status==4)||($item->status==41)||($item->status==42))
                                        {{$item->id}}
                                    @else
                                        <a href="/admin/booking/{{$item->id}}/showadminbooking">
                                            {{$item->id}}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if(($item->status==4)||($item->status==41)||($item->status==42))
                                        {{$item->booking->coach['user']['fname'].' '.$item->booking->coach->user['lname'] }}
                                    @else
                                        <a href="/admin/booking/{{$item->id}}/showadminbooking">
                                             {{$item->booking->coach['user']['fname'].' '.$item->booking->coach->user['lname'] }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if(($item->status==4)||($item->status==41)||($item->status==42))
                                        {{$item->user->fname.' '.$item->user->lname }}
                                    @else
                                        <a href="/admin/booking/{{$item->id}}/showadminbooking">
                                            {{$item->user->fname.' '.$item->user->lname }}
                                        </a>
                                    @endif


                                </td>
                                <td>
                                    {{$item->duration_booking}}
                                </td>
                                <td>{{$item->booking->start_date}}</td>
                                <td>{{$item->booking->start_time}}</td>
                                <td>
                                    @if(is_null($item->booking->feedback_coachings_id))
                                        <i class="bi bi-x-lg" ></i>
                                    @else
                                        <i class="bi bi-check-lg" ></i>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($item->presession))
                                        <i class="bi bi-x-lg"></i>
                                    @else
                                        <i class="bi bi-check-lg"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($item->booking->start_date>$dateNow && ($item->status!=4 && $item->status!=41 && $item->status!=42  ))
                                        <form class="d-inline-block" method="POST" action="/booking/{{$item->booking_id}}" onsubmit="return confirm('آیا از لغو جلسه اطمینان دارید؟')">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <input type="hidden" name="status" value="4" />
                                            <button type="submit" class="btn btn-danger  btn-sm">
                                                لغو جلسه
                                            </button>
                                        </form>
                                        <form class="d-inline-block" method="POST" action="/booking/{{$item->booking_id}}" onsubmit="return confirm('آیا از لغو جلسه اطمینان دارید؟')">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <input type="hidden" name="status" value="41" />
                                            <button type="submit" class="btn btn-danger  btn-sm">
                                                لغو مراجع
                                            </button>
                                        </form>
                                        <form class="d-inline-block" method="POST" action="/booking/{{$item->booking_id}}" onsubmit="return confirm('آیا از لغو جلسه اطمینان دارید؟')">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <input type="hidden" name="status" value="42" />
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                لغو کوچ
                                            </button>
                                        </form>
                                    @elseif($item->status==41)
                                        <p class="text-dark">کنسل توسط مراجع</p>
                                    @elseif($item->status==42)
                                        <p class="text-dark">کنسل توسط کوچ</p>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('footerScript')
    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                order: [[4, 'desc']],
            });
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
            }

        });


    </script>
@endsection
