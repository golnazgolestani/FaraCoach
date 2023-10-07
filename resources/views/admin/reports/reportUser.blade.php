@extends('admin.master.index')

@section('headerScript')
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
    <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center ">
        @if(is_null($user->personal_image))
            <img src="{{asset('/documents/users/default-avatar.png')}}" width="100px" height="100px"  class="rounded-circle border border-3"/>
        @else
            <img src="{{asset('/documents/users/'.$user->personal_image)}}" width="100px" height="100px" class="rounded-circle border border-3 " />
        @endif
        <p>{{$user->fname." ".$user->lname}}</p>
    </div>

    <div class="col-12 col-sm-12 col-md-3 col-lg-3 pt-2" id="app">
        <form method="GET" action="/admin/reports/statistic/{{$user->id}}">
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
    <div class="col-12 border border-bottom mt-2 mb-2"></div>
    <div class="col-12 mb-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card-counter primary">
                    <span class="count-numbers text-dark">{{$user->get_insertUsers->wherebetween('created_at',$date_en)->count()}} نفر </span>
                    <span class="count-name text-dark"> تعداد ورودی ها</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter primary">

                        <span class="count-numbers text-dark">{{$user->followupsAdmin->wherebetween('date_fa',$date_fa)->count()}} پیگیری </span>
                        <span class="count-name text-dark"> تعداد پیگیری ها
                            <a href="#" data-toggle="modal" data-target="#detailFollowupModal">جزئیات</a>
                        </span>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="detailFollowupModal" tabindex="-1" aria-labelledby="detailFollowupModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <th>دوره</th>
                                        <th>تعداد</th>
                                    </tr>
                                    @foreach($user->followupsAdmin->wherebetween('date_fa',$date_fa)->groupby('course_id') as $item)
                                        <tr>
                                            <td>
                                                @if(!is_null($item[0]->course))
                                                    {{$item[0]->course->course}}
                                                @else
                                                    نامشخص
                                                @endif
                                            </td>
                                            <td>{{count($item)}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter primary">
                    <span class="count-numbers text-dark">{{$user->followupsAdmin->wherebetween('date_fa',$date_fa)->groupby('user_id')->count()}} نفر </span>
                    <span class="count-name text-dark"> تعداد نفر</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter primary">
                    <span class="count-numbers text-dark">{{round($user->followupsAdmin->wherebetween('date_fa',$date_fa)->sum('talktime')/60)}} ساعت </span>
                    <span class="count-name text-dark"> مدت مکالمه</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter primary">
                    <span class="count-numbers text-dark">{{$user->followupsAdmin->wherebetween('date_fa',$date_fa)->where('status_followups','=',20)->count()}} نفر </span>
                    <span class="count-name text-dark"> تعداد مشتری</span>
                </div>
            </div>



            <div class="collapse" id="collapseGroupFollowup">
                <div class="card card-body">
                    {{csrf_field()}}
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">ورودی ها <span class="badge badge-secondary">{{number_format($user->get_insertUsers->wherebetween('created_at',$date_en)->count())}} نفر</span></a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-expireFaktor" role="tab" aria-controls="nav-expireFaktor" aria-selected="false">پیگیری ها <span class="badge badge-danger">{{number_format($user->followupsAdmin->wherebetween('date_fa',$date_fa)->count())}} نفر</span></a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                <table class="dataTable table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>مشخصات</th>
                        <th>آخرین محصول پیگیری</th>
                        <th>تعداد پیگیری</th>
                        <th>تاریخ پیگیری </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->get_insertUsers->wherebetween('created_at',$date_en) as $item)
                        <tr class="" >
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="{{route('showUserForAdmin',[$item->id])}}" target="_blank">
                                    {{$item->fname." ".$item->lname}}
                                </a>
                            </td>
                            <td>
                                @if(!is_null($item->last_followupUser['course_id']))
                                    {{$item->last_followupUser->course->course}}
                                @endif
                            </td>
                            <td>
                                @if(!is_null($item->followups))
                                    {{$item->followups->count()}}
                                @endif
                            </td>
                            <td>
                                @if(!is_null($item->last_followupUser['date_fa']))
                                    {{$item->last_followupUser['date_fa']}}
                                @endif
                            </td>


                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <div class="tab-pane fade" id="nav-expireFaktor" role="tabpanel" aria-labelledby="nav-expireFaktor-tab">
                <div class="row">
                    @foreach($user->followupsAdmin->wherebetween('date_fa',$date_fa)->groupby('course_id') as $item)
                        <div class="col-4">
                            <div class="card text-white border border-3 border-danger  p-1" style="min-height: 100px">
                                        <span class="text-dark text-center">
                                            {{$item[0]->course['course']}}
                                        </span>
                                <span class="text-dark"><i class="ficon bx bx-transfer-alt"></i>{{$item->count()}} پیگیری</span>
                                <span class="text-dark"><i class="ficon bx bx-time"></i>{{$item->sum('talktime')}} دقیقه مکالمه</span>

                            </div>
                        </div>
                    @endforeach
                </div>
                <table class="dataTable table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>مشخصات</th>
                            <th>آخرین محصول پیگیری</th>
                            <th>تعداد پیگیری</th>
                            <th>تاریخ پیگیری </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($user->followupsAdmin->wherebetween('date_fa',$date_fa) as $item)
                        <tr class="" >
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="{{route('showUserForAdmin',[$item->user->id])}}" target="_blank">
                                    {{$item->user['fname']." ".$item->user['lname']}}
                                </a>
                            </td>
                            <td>

                                @if(!is_null($item->user->last_followupUser['course_id']))
                                    {{$item->user->last_followupUser->course['course']}}
                                @endif
                            </td>
                            <td>
                                @if(!is_null($item->user->followups))
                                    {{$item->user->followups->count()}}
                                @endif
                            </td>
                            <td>
                                @if(!is_null($item->user->last_followupUser['date_fa']))
                                    {{$item->user->last_followupUser['date_fa']}}
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


