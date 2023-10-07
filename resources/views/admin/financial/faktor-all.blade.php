@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12">
        <div id="app" class="col-md-4">
            <form method="get" action="/admin/faktor/all" id="formBooking">
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
    <div class="col-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">همه فاکتورها <span class="badge badge-secondary">{{$faktors->count()}}</span></a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-expireFaktor" role="tab" aria-controls="nav-expireFaktor" aria-selected="false">پرداخت نشده ها <span class="badge badge-danger">{{$faktorsExpire->count()}}</span></a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-acceptFaktor" role="tab" aria-controls="nav-acceptFaktor" aria-selected="false">پرداخت شده ها<span class="badge badge-success">{{$faktorsSuccess->count()}}</span></a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                <p>جمع مبالغ: {{number_format($faktors->sum('fi'))}} تومان</p>
                <div class="col-12 table-responsive">
                    <table class="dataTable table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>فاکتور</th>
                            <th>مشخصات</th>
                            <th>محصول</th>
                            <th>تلفن</th>
                            <th>تاریخ ایجاد </th>
                            <th>موعد پرداخت</th>
                            <th>قیمت(تومان)</th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faktors as $item)
                            <tr class="text-center @if(($dateNow>$item->date_faktor)&&($item->status==0)) table-danger @elseif($item->status==1) table-success @endif" >
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{route('showUserForAdmin',[$item->user->id])}}" target="_blank">
                                    {{$item->id}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('showUserForAdmin',[$item->user->id])}}" target="_blank">
                                        {{$item->user->fname." ".$item->user->lname}}
                                    </a>
                                </td>
                                <td>
                                    @if($item->type=='course')
                                        {{($item->course['course'])}}
                                    @endif
                                </td>
                                <td>{{$item->user->tel}}</td>
                                <td>{{$item->date_createfaktor}}</td>
                                <td>{{$item->date_faktor}}</td>
                                <td>{{number_format($item->fi)}}</td>
                                <td>
                                    @if($item->status==0)
                                        پرداخت نشده
                                    @else
                                        تسویه شد
                                    @endif
                                </td>
                                <td>
                                    @if(($item->status==0))
                                        <a href="/admin/faktor/{{$item->id}}/edit" class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if(($item->status==0))
                                        <form action="/admin/faktor/{{$item->id}}" method="post" onsubmit="return window.confirm('آیا از حذف فاکتور اطمینان دارید؟')">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger" type="submit">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status==0)
                                        <form method="post" action="/panel/faktor/checkout/pardakhtaghsat">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$item->id}}" name="faktor_id" />
                                            <input type="submit" class="btn btn-primary btn-sm" value="پرداخت نشده" />
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-expireFaktor" role="tabpanel" aria-labelledby="nav-expireFaktor-tab">
                <p>جمع مبالغ: {{number_format($faktorsExpire->sum('fi'))}} تومان</p>
                <div class="col-12 table-responsive">
                    <table class="dataTable table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>مشخصات</th>
                            <th>محصول</th>
                            <th>تلفن</th>
                            <th>تاریخ ایجاد </th>
                            <th>موعد پرداخت</th>
                            <th>قیمت(تومان)</th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faktorsExpire as $item)
                            <tr class="text-center @if(($dateNow>$item->date_faktor)&&($item->status==0)) table-danger @elseif($item->status==1) table-success @endif" >
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{route('showUserForAdmin',[$item->user->id])}}" target="_blank">
                                        {{$item->user->fname." ".$item->user->lname}}
                                    </a>
                                </td>
                                <td>
                                    @if($item->type=='course')
                                        {{($item->course['course'])}}
                                    @endif
                                </td>
                                <td>
                                    {{$item->user->tel}}
                                </td>
                                <td>{{$item->date_createfaktor}}</td>
                                <td>{{$item->date_faktor}}</td>
                                <td>{{number_format($item->fi)}}</td>
                                <td>
                                    @if($item->status==0)
                                        پرداخت نشده
                                    @else
                                        تسویه شد
                                    @endif
                                </td>
                                <td>
                                    @if(($item->status==0))
                                        <a href="/admin/faktor/{{$item->id}}/edit" class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if(($item->status==0))
                                        <form action="/admin/faktor/{{$item->id}}" method="post" onsubmit="return window.confirm('آیا از حذف فاکتور اطمینان دارید؟')">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger" type="submit">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status==0)
                                        <form method="post" action="/panel/faktor/checkout/pardakhtaghsat" >
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$item->id}}" name="faktor_id" />
                                            <input type="submit" class="btn btn-primary btn-sm" value="پرداخت نشده" />
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-acceptFaktor" role="tabpanel" aria-labelledby="nav-acceptFaktor-tab">
                <p>جمع مبالغ: {{number_format($faktorsSuccess->sum('fi'))}} تومان</p>
                <div class="col-12 table-responsive">
                    <table class="dataTable table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>مشخصات</th>
                            <th>محصول</th>
                            <th>تلفن</th>
                            <th>تاریخ ایجاد </th>
                            <th>موعد پرداخت</th>
                            <th>قیمت(تومان)</th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faktorsSuccess as $item)
                            <tr class="@if(($dateNow>$item->date_faktor)&&($item->status==0)) table-danger @elseif($item->status==1) table-success @endif" >
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{route('showUserForAdmin',[$item->user->id])}}" target="_blank">
                                        {{$item->user->fname." ".$item->user->lname}}
                                    </a>
                                </td>
                                <td>
                                    @if($item->type=='course')
                                        {{($item->course['course'])}}
                                    @endif
                                </td>
                                <td>{{$item->user->tel}}</td>
                                <td>{{$item->date_createfaktor}}</td>
                                <td>{{$item->date_faktor}}</td>
                                <td>{{number_format($item->fi)}}</td>
                                <td>
                                    @if($item->status==0)
                                        پرداخت نشده
                                    @else
                                        تسویه شد
                                    @endif
                                </td>
                                <td>
                                    @if(($item->status==0))
                                        <a href="/admin/faktor/{{$item->id}}/edit" class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if(($item->status==0))
                                        <form action="/admin/faktor/{{$item->id}}" method="post" onsubmit="return window.confirm('آیا از حذف فاکتور اطمینان دارید؟')">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger" type="submit">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status==0)
                                        <form method="post" action="/panel/faktor/checkout/pardakhtaghsat">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$item->id}}" name="faktor_id" />
                                            <input type="submit" class="btn btn-primary btn-sm" value="پرداخت نشده" />
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
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
            $('.dataTable').DataTable({
                dom: 'Bfrltip',
                buttons: [
                    'excel',
                ],

            } );
        } );
    </script>


    <script src="{{asset('/js/vue@2.js')}}"></script>
    <script src="{{asset('/js/moment.js')}}"></script>
    <script src="{{asset('/js/moment-jalaali.js')}}"></script>
    <script src="{{asset('/js/vue-persian-datetime-picker-browser.js')}}"></script><script src="{{asset('/js/vue@2.js')}}"></script>
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
