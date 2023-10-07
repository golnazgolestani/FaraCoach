@extends('admin.master.index')


@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12">
        <div id="app" class="col-md-4">
            <form method="get" action="/admin/checkout" id="formBooking">
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
                <button type="submit" class="btn btn-success">بگرد</button>
            </form>
        </div>
    </div>
    <div class="col-12 table-responsive">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">لاگ درگاه<span class="badge badge-secondary">{{$checkout->count()}}</span></a>
                <a class="nav-link" id="nav-checkoutAccess-tab" data-toggle="tab" href="#nav-checkoutAccess" role="tab" aria-controls="nav-checkoutAccess" aria-selected="false">پرداخت شده <span class="badge badge-success">{{$checkoutAccess->count()}}</span></a>
                <a class="nav-link" id="nav-checkoutCoach-tab" data-toggle="tab" href="#nav-checkoutCoach" role="tab" aria-controls="nav-checkoutCoach" aria-selected="false">پرداخت کلینیک <span class="badge badge-success">{{$checkoutAccess->where('type','=','reserve')->count()}}</span></a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>جمع مبالغ: {{number_format($checkout->sum('price'))}} تومان</p>
                <table class="dataTable table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>مشخصات</th>
                        <th>محصول</th>
                        <th>واریزی(تومان)</th>
                        <th>توضیحات</th>

                        <th>تاریخ</th>
                        <th>ساعت</th>
                        <th>کد</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($checkout as $item)

                            <tr class="@if($item->status==1) bg-success  @endif">
                                <td>

                                    <a href="{{route('showUserForAdmin',$item->user->id)}}" target="_blank">
                                        @if(is_null($item->user->fname)&&(is_null($item->user->lname)))
                                            {{$item->user->tel}}
                                        @else
                                            {{$item->user->fname.' '.$item->user->lname}}
                                        @endif
                                    </a>

                                </td>
                                <td>
                                    @if($item->type=='course')
                                        {{$item->course['course']}}
                                    @elseif($item->type=='event')
                                        {{$item->event['event']}}
                                    @elseif($item->type=='reserve')
                                        جلسه کوچینگ {{$item->reserve['booking']['coach']['user']['fname'].' '.$item->reserve['booking']['coach']['user']['lname'].' - '.$item->reserve['booking']['start_date']}}
                                    @elseif($item->type=='ghest')
                                        پرداخت قسط
                                    @endif
                                </td>
                                <td>{{number_format($item->price)}}</td>
                                <td>{{$item->description}}</td>

                                <td class="text-right">{{substr($item->dateTime,5)  }}</td>
                                <td class="text-right">{{substr($item->dateTime,0,5)  }}</td>
                                <td class="text-right">{{$item->authority}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-checkoutAccess" role="tabpanel" aria-labelledby="nav-checkoutAccess-tab">
                <p>جمع مبالغ: {{number_format($checkoutAccess->sum('price'))}} تومان</p>
                <table class="dataTable table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>مشخصات</th>
                        <th>محصول</th>
                        <th>واریزی(تومان)</th>
                        <th>توضیحات</th>
                        <th>تاریخ</th>
                        <th>ساعت</th>
                        <th>کد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($checkoutAccess as $item)
                        <tr class="@if($item->status==1) bg-success  @endif">
                            <td>
                                <a href="{{route('showUserForAdmin',$item->user->id)}}" target="_blank">
                                    @if(is_null($item->user->fname)&&(is_null($item->user->lname)))
                                        {{$item->user->tel}}
                                    @else
                                        {{$item->user->fname.' '.$item->user->lname}}
                                    @endif
                                </a>
                            </td>
                            <td>
                                @if($item->type=='course')
                                    {{$item->course->course}}
                                @elseif($item->type=='event')
                                    {{$item->event->event}}
                                @elseif($item->type=='reserve')
                                    جلسه کوچینگ {{$item->reserve['booking']['coach']['user']['fname'].' '.$item->reserve['booking']['coach']['user']['lname'].' - '.$item->reserve['booking']['start_date']}}
                                @elseif($item->type=='ghest')
                                    پرداخت قسط
                                @endif
                            </td>
                            <td>{{number_format($item->price)}}</td>
                            <td>{{$item->description}}</td>
                            <td class="text-right">{{substr($item->dateTime,5)  }}</td>
                            <td class="text-right">{{substr($item->dateTime,0,5)  }}</td>
                            <td class="text-right">{{$item->authority}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--***** پرداختی های جلسات رزرو ****** -->
            <div class="tab-pane fade show " id="nav-checkoutCoach" role="tabpanel" aria-labelledby="nav-checkoutCoach-tab">
                <p>جمع مبالغ: {{number_format($checkoutAccess->where('type','=','reserve')->sum('price'))}} تومان</p>
                <table class="dataTable table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>مشخصات</th>
                        <th>محصول</th>
                        <th>واریزی(تومان)</th>
                        <th>توضیحات</th>
                        <th>تاریخ</th>
                        <th>ساعت</th>

                        <th>کد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($checkoutAccess->where('type','=','reserve') as $item)

                        <tr >
                            <td>

                                <a href="{{route('showUserForAdmin',$item->user->id)}}" target="_blank">
                                    @if(is_null($item->user->fname)&&(is_null($item->user->lname)))
                                        {{$item->user->tel}}
                                    @else
                                        {{$item->user->fname.' '.$item->user->lname}}
                                    @endif
                                </a>

                            </td>
                            <td>
                                @if($item->type=='course')
                                    {{$item->course->course}}
                                @elseif($item->type=='event')
                                    {{$item->event->event}}
                                @elseif($item->type=='reserve')
                                    جلسه کوچینگ {{$item->reserve['booking']['coach']['user']['fname'].' '.$item->reserve['booking']['coach']['user']['lname'].' - '.$item->reserve['booking']['start_date']}}
                                @elseif($item->type=='ghest')
                                    پرداخت قسط
                                @endif
                            </td>
                            <td>{{number_format($item->price)}}</td>
                            <td>{{$item->description}}</td>

                            <td class="text-right">{{substr($item->dateTime,5)  }}</td>
                            <td class="text-right">{{substr($item->dateTime,0,5)  }}</td>
                            <td class="text-right">{{$item->authority}}</td>
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
            $('.dataTable').DataTable();
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

