@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/pizza_chart/css/pizza.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 mb-3" id="app">
                <form method="GET" action="/admin/reports/allreport">
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



                <a class="btn btn-primary" href="/admin/reports/allreport/exportexcel{{ request()->has('start_date') ? "?start_date=".request()->get('start_date')[0]."&end_date=".request()->get('start_date')[1]."&range=" : '' }}">
                    <i class="bi bi-file-earmark-excel-fill"></i>
                    خروجی اکسل
                </a>
            </div>
            <div class="col-12">
                <p>بازه تاریخی آمار: {{$date_fa[0]}} تا {{$date_fa[1]}}</p>
            </div>
        </div>
    </div>
    <div class="col-12 border-top">
        <p>تفکیک مسئول ثبت کننده</p>
    </div>
    <div class="col-12 table-responsive mb-2 border border-bottom border-1">
        <table class="table table-striped">
            <tr>
                <th>ثبت کننده</th>
                <th>  تعداد</th>

            </tr>
            @foreach($users->groupby('insert_user_id') as $item)
                <tr>
                    <td>
                        @if(is_null($item[0]->get_insertuserInfo))
                            <img src="{{asset('/documents/users/default-avatar.png')}}" width="50px" height="50px" class="rounded-circle" />
                            نامشخص
                        @else
                            <img src="{{asset('/documents/users/'.$item[0]->get_insertuserInfo->personal_image)}}" width="50px" height="50px" class="rounded-circle" />
                            {{$item[0]->get_insertuserInfo->fname.' '.$item[0]->get_insertuserInfo->lname}}
                        @endif
                    </td>
                    <td>
                        {{count($item)}}
                    </td>

                </tr>
            @endforeach
            <tr>
                <td>جمع کل</td>
                <td>
                    {{$users->count()}}
                </td>
            </tr>
        </table>
    </div>
    <div class="col-12 border-top">
        <p>تفکیک استان ها </p>
    </div>
    <div class="col-12 table-responsive mb-2 border border-bottom border-1">
        <table class="table table-striped">
           <tr>
               <th>استان</th>
               <th>  تعداد (نفر)</th>
               <th>  دانشجو (نفر)</th>
           </tr>
            @foreach($users->groupby('state') as $item)
                <tr>
                    <td>
                        @if(!is_null($item[0]->get_state))
                            {{$item[0]->get_state['name']}}
                        @endif

                    </td>

                    <td>
                        {{count($item)}}
                    </td>
                    <td>
                        {{$item->where('type','=',20)->count()}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-12">
        <p>گزارش پیگیری ها</p>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-striped">
            <tr>
                <th class="text-center">دوره پیگیری شده</th>
                <th class="text-center">  تعداد پیگیری </th>
                <th class="text-center">  مکالمات (ساعت)</th>
                <th class="text-center"> دانشجو</th>
                <th class="text-center"> تور پیگیری</th>
                <th class="text-center"> انصراف</th>
                <th class="text-center"> در انتظار تصمیم</th>
                <th class="text-center"> عدم پاسخگویی</th>
                <th class="text-center"> مارکتینگ</th>
                <th class="text-center"> جلسات</th>
                <th class="text-center"> رویداد</th>
            </tr>
            @foreach($followups->groupby('course_id') as $item)
                <tr>
                    <td class="text-center">
                        @if(!is_null($item[0]->course))
                            {{$item[0]->course['course']}}
                        @endif

                    </td>

                    <td class="text-center">
                        {{count($item)}}
                    </td>
                    <td class="text-center">
                        {{(round($item->sum('talktime')/60))  }}
                    </td>
                    <td class="text-center">
                        {{$item->where('status_followups','=',20) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('status_followups','=',11) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('status_followups','=',12) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('status_followups','=',13) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('status_followups','=',14) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->wherein('status_followups',[-1,-2,-3])->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('status_followups','=',30)->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('status_followups','=',40)->count() }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="col-12">
        <p>گزارش نحوه آشنایی </p>
    </div>
    <div class="col-12 table-responsive mb-2">
        <table class="table table-striped">
            <tr>
                <th class="text-center">نحوه آشنایی </th>
                <th class="text-center">  تعداد </th>
                <th class="text-center"> دانشجو</th>
                <th class="text-center"> پیگیری نشده</th>
                <th class="text-center"> تور پیگیری</th>
                <th class="text-center"> انصراف</th>
                <th class="text-center"> در انتظار تصمیم</th>
                <th class="text-center"> عدم پاسخگویی</th>
                <th class="text-center"> مارکتینگ</th>
                <th class="text-center"> جلسات</th>
                <th class="text-center"> رویداد</th>
                <th class="text-center"> لیست سیاه</th>
            </tr>
            @foreach($users->groupby('gettingknow') as $item)

                <tr>
                    <td class="text-center">
                        @if(!is_null($item[0]->get_gettingknow))
                            {{$item[0]->get_gettingknow['category']}}
                        @endif

                    </td>

                    <td class="text-center">
                        {{count($item)}}
                    </td>

                    <td class="text-center">
                        {{$item->where('type','=',20) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',1) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',11) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',12) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',13) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',14) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->wherein('type',[-1,-2,-3])->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',30)->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',40)->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',0)->count() }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


    <div class="col-12">
        <p>گزارش کمپین ها </p>
    </div>
    <div class="col-12 table-responsive mb-2">
        <table class="table table-striped">
            <tr>
                <th class="text-center">نام کمپین </th>
                <th class="text-center">  تعداد نفر </th>
                <th class="text-center">  تعداد پیگیری </th>
                <th class="text-center"> دانشجو</th>
                <th class="text-center"> پیگیری نشده</th>
                <th class="text-center"> تور پیگیری</th>
                <th class="text-center"> انصراف</th>
                <th class="text-center"> در انتظار تصمیم</th>
                <th class="text-center"> عدم پاسخگویی</th>
                <th class="text-center"> مارکتینگ</th>
                <th class="text-center"> جلسات</th>
                <th class="text-center"> رویداد</th>
                <th class="text-center"> لیست سیاه</th>
            </tr>



            @foreach($campaign as $item)

                <tr class="text-center">
                    <td class="text-center">
                        @if(is_null($item[0]->resource))
                            نامشخص
                        @else
                            {{$item[0]->resource}}
                        @endif
                    </td>
                    <td>
                        {{$item->count()}}
                    </td>

                    <td class="text-center">
                        {{$item->count_followups}}
                    </td>

                    <td class="text-center">

                        {{$item->where('type','=',20) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',1) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',11) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',12) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',13) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',14) ->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->wherein('type',[-1,-2,-3])->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',30)->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',40)->count() }}
                    </td>
                    <td class="text-center">
                        {{$item->where('type','=',0)->count() }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


    <div class="col-12 border-top">
        <p>تفکیک جنسیت </p>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-4 " >
                <ul data-pie-id="svg">

                    @foreach($users->groupby('sex') as $item)

                        @switch($item[0]->sex)
                            @case ("1")
                                <li data-value="{{count($item)}}"> مرد ({{count($item)}})</li>
                            @break
                            @case ("0")
                                <li data-value="{{count($item)}}"> زن ({{count($item)}})</li>
                            @break
                            @default
                                <li data-value="{{count($item)}}"> نامشخص ({{count($item)}})</li>
                            @break
                        @endswitch
                    @endforeach
                </ul>
            </div>
            <div class="col-4">
                <div id="svg"></div>
            </div>
        </div>
    </div>
    <div class="col-12 border-top">
        <p>تفکیک تحصیلات </p>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-4 " >
                <ul data-pie-id="svgEducation">
                    @foreach($users->groupby('education') as $item)
                            <li data-value="{{count($item)}}"> @if(is_null($item[0]->education)) {{"نامشخص (".count($item).")"}} @else {{$item[0]->education."(".count($item).")"}} @endif </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-4">
                <div id="svgEducation"></div>
            </div>
        </div>
    </div>
    <div class="col-12 border-top">
        <p>تفکیک تاهل </p>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-4 " >
                <ul data-pie-id="svgMarried">
                    @foreach($users->groupby('married') as $item)
                        @switch($item[0]->married)
                            @case ("1") <li data-value="{{count($item)}}"> {{" متاهل (".count($item).")"}}  </li>
                                        @break
                            @case ("0") <li data-value="{{count($item)}}"> {{" مجرد (".count($item).")"}}  </li>
                                        @break
                            @default <li data-value="{{count($item)}}"> {{" نامشخص (".count($item).")"}}  </li>
                        @endswitch

                    @endforeach
                </ul>
            </div>
            <div class="col-4">
                <div id="svgMarried"></div>
            </div>
        </div>
    </div>
    <div class="col-12 border-top">
        <p>تفکیک سن </p>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-4 " >
                <ul data-pie-id="svgAges">
                    <li data-value="{{$ages['ageTo20']}}">تا 20 سال:  {{$ages['ageTo20']}}  نفر</li>
                    <li data-value="{{$ages['age21to30']}}">بین 21 تا 30 سال:  {{$ages['age21to30']}} نفر </li>
                    <li data-value="{{$ages['age31to40']}}">بین 31 تا 40 سال:  {{$ages['age31to40']}} نفر </li>
                    <li data-value="{{$ages['age41to50']}}">بین 41 تا 50 سال:  {{$ages['age41to50']}} نفر </li>
                    <li data-value="{{$ages['age51to60']}}">بین 51 تا 60 سال:  {{$ages['age51to60']}} نفر </li>
                    <li data-value="{{$ages['age61to70']}}">بین 61 تا 70 سال:  {{$ages['age61to70']}} نفر </li>
                    <li data-value="{{$ages['age71to80']}}">بین 71 تا 80 سال:  {{$ages['age71to80']}} نفر </li>
                    <!--
                    <li data-value="{{$users->whereNULL('datebirth')->count()}}">نامشخص:  {{$users->whereNULL('datebirth')->count()}} نفر </li>
                    -->




                </ul>
            </div>
            <div class="col-4">
                <div id="svgAges"></div>
            </div>
        </div>
    </div>




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
