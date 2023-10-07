@extends('admin.master.index')
@section('headerScript')
    <link href="{{asset('/pizza_chart/css/pizza.css')}}" rel="stylesheet" />
    <style>
        table th,table td
        {
            padding: 5px !important;
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
            background-color: #ffff99;
            color: #FFF;
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
            font-size: 18px;
        }
    </style>
@endsection

@section('content')

        <div class="col-12">
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 mb-3" id="app">
                    <form method="GET" action="/panel">
                        <div class="form-group">
                            <label for="start_date">بازه نمایش را وارد کنید</label>
                            <date-picker
                                type="date"
                                v-model="dates"
                                range
                                format="jYYYY-jMM-jDD"
                                display-format="jYYYY/jMM/jDD"
                                name="start_date"
                                max="{{$dateNow}}"
                                id="start_date"
                            ></date-picker>
                            <button type="submit" class="btn btn-success btn-sm" name="range">نمایش بده</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col" >#</th>
                    <th scope="col">نام و نام خانوادگی</th>
                    <th scope="col"  >پیگیری های امروز</th>
                    <th scope="col">پیگیری های انجام شده</th>
                    <th scope="col">تور پیگیری</th>
                    <th scope="col">در انتظار تصمیم</th>
                    <th scope="col">مشتری</th>
                    <th scope="col">عدم پاسخ</th>
                    <th scope="col">انصرافی ها</th>
                    <th scope="col">مارکتینگ 1</th>
                    <th scope="col">مارکتینگ 2</th>
                    <th scope="col">مارکتینگ 3</th>
                    <th scope="col">جلسات</th>

                    <th scope="col">مدت مکالمه</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;
                ?>
                @foreach($usersEducation as $item)
                    <tr>
                        <th >{{$i++}}</th>
                        <td >
                            <a href="/admin/reports/statistic/{{$item->id}}?start_date={{$rangeDate[0]}} ~ {{$rangeDate[1]}}&range=">{{$item->fname}} {{$item->lname}}</a>

                        </td>
                        <td class="bg-warning text-center">{{number_format($item->followupsAdmin->where('nextfollowup_date_fa','=',$dateNow)->where('flag','=',1)->count())}}</td>
                        <td class="bg-success text-center text-white">{{number_format($item->followupsAdmin->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',11)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',13)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',20)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',14)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',12)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',-1)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',-2)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',-3)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->followupsAdmin->where('status_followups','=',30)->wherebetween('date_fa',$rangeDate)->count())}}</td>
                        <td >{{number_format($item->talktime)}}</td>
                    </tr>
                @endforeach
                    <tr class="text-bold">
                        <td>{{$i++}}</td>
                        <td>جمع کل</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 border-bottom border-3 mb-3"></div>
        <div class="col-12 mb-1">
            <i class="ficon bx bx-user"></i>گزارش بانک اطلاعاتی
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->count()}} نفر </span>
                <span class="count-name text-dark"> کل کاربرها</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->where('type','=',1)->count()}} نفر </span>
                <span class="count-name text-dark">کاربرهای پیگیری نشده</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->where('type','=',11)->count()}} نفر </span>
                <span class="count-name text-dark">کاربرهای در حال پیگیری</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter danger">
                <span class="count-numbers text-white">{{$users->where('type','=',12)->count()}} نفر </span>
                <span class="count-name text-white">کاربرهای انصراف</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->where('type','=',13)->count()}} نفر </span>
                <span class="count-name text-dark">کاربرهای در انتظار تصمیم</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->where('type','=',14)->count()}} نفر </span>
                <span class="count-name text-dark">کاربرهای عدم پاسخگویی</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter success">
                <span class="count-numbers text-white">{{$users->where('type','=',20)->count()}} نفر </span>
                <span class="count-name text-white">دانشجو</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->where('type',30)->count()}} نفر </span>
                <span class="count-name text-dark">جلسات</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->where('type',40)->count()}} نفر </span>
                <span class="count-name text-dark">رویدادها</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->wherein('type',[-1,-2,-3])->count()}} نفر </span>
                <span class="count-name text-dark">مارکتینگ</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$users->where('type','=',0)->count()}} نفر </span>
                <span class="count-name text-dark">لیست سیاه</span>
            </div>
        </div>


        <div class="col-12">
            <div class="row">
                <div class="col-4" >
                    <ul data-pie-id="svg">
                        <li data-value="{{$users->where('type','=',1)->count()}}">پیگیری نشده ({{$users->where('type','=',1)->count()}})</li>
                        <li data-value="{{$users->where('type','=',11)->count()}}">در حال پیگیری ({{$users->where('type','=',11)->count()}})</li>
                        <li data-value="{{$users->where('type','=',12)->count()}}">انصرافی ({{$users->where('type','=',12)->count()}})</li>
                        <li data-value="{{$users->where('type','=',13)->count()}}">در انتظار تصمیم ({{$users->where('type','=',13)->count()}})</li>
                        <li data-value="{{$users->where('type','=',14)->count()}}">عدم پاسخگویی({{$users->where('type','=',14)->count()}})</li>
                        <li data-value="{{$users->where('type','=',20)->count()}}">دانشجو ({{$users->where('type','=',20)->count()}})</li>
                        <li data-value="{{$users->where('type','=',30)->count()}}">جلسات ({{$users->where('type','=',30)->count()}})</li>
                        <li data-value="{{$users->where('type','=',40)->count()}}">رویدادها ({{$users->where('type','=',40)->count()}})</li>
                        <li data-value="{{$users->wherein('type',[-1,-2,-3])->count()}}">مارکتینگ ({{$users->wherein('type',[-1,-2,-3])->count()}})</li>
                        <li data-value="{{$users->where('type','=',0)->count()}}">لیست سیاه({{$users->where('type','=',0)->count()}})</li>
                    </ul>
                </div>
                <div class="col-4">
                    <div id="svg"></div>
                </div>
            </div>


        </div>

        <div class="col-12 border-bottom border-3 mt-1 mb-1"></div>

        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers text-dark">{{$countBookingReserve->count()}} جلسه </span>
                <span class="count-name text-dark"> رزرو شده در امروز</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter warning text-dark">
                <span class="count-numbers text-dark">{{$bookingsToday->count()}} جلسه</span>
                <span class="count-name text-dark"> رزرو شده برای امروز</span>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card-counter success">
                <i class="fa fa-database"></i>
                <span class="count-numbers text-dark">{{ number_format($checkoutToday) }} تومان</span>
                <span class="count-name text-dark">واریزی امروز</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter primary">
                <i class="fa fa-database"></i>
                <span class="count-numbers text-dark">{{ number_format($insertUserToday) }} نفر </span>
                <span class="count-name text-dark">ثبت نام امروز</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter primary">
                <i class="fa fa-database"></i>
                <span class="count-numbers text-dark">{{ number_format($loginUserToday) }} نفر </span>
                <span class="count-name text-dark">تعداد ورود امروز</span>
            </div>
        </div>



        <!--

        <div class="col-md-3">
            <div class="card-counter info">
                <i class="fa fa-users"></i>
                <span class="count-numbers text-dark">35</span>
                <span class="count-name text-dark">Users</span>
            </div>
        </div>
        -->

@endsection


@section('footerScript')

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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{asset('/pizza_chart/js/vendor/snap.svg.js')}}" ></script>
    <script src="{{asset('/pizza_chart/js/pizza.js')}}" ></script>
    <script>
        $(window).load(function() {
            Pizza.init( );
        })
    </script>
@endsection
