@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

    @foreach($checkouts->groupby('product_id') as $item)
        <div class="col-md-3">
            <div class="card text-dark border border-3 border-danger  p-1">
                ثبت نام دوره :{{($item[0]->course->course)}}
                <p>{{$item->count()}} نفر</p>
            </div>
        </div>
    @endforeach
        <div class="col-12 table-responsive">
            <p>مبلغ کل واریزی: {{number_format($checkouts->sum('price'))}} تومان </p>
            <table  class="table_data table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>ردیف</th>
                        <th>نام و نام خانوادگی</th>
                        <th>تلفن</th>
                        <th>مسئول پیگیری</th>
                        <th >دوره ثبت نامی</th>
                        <th>مبلغ دوره</th>
                        <th>امتیاز اعمال شده</th>
                        <th>تخفیف فراکوچ</th>
                        <th>قیمت نهایی</th>
                        <th>پیش پرداخت</th>
                        <th>باقیمانده</th>
                        <th>تاریخ ثبت نام</th>
                        <th >کد رهگیری</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($scholarships as $item)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">
                            <a href="/admin/scholarship/{{$item->id}}" target="_blank">{{$item->user->fname.' '.$item->user->lname}}</a>
                        </td>
                        <td class="text-center" dir="ltr">{{$item->user->tel}}</td>
                        <td class="text-center" dir="ltr">
                            @if(!is_null($item->user->get_followbyExpert))
                                {{$item->user->get_followbyExpert->fname.' '.$item->user->get_followbyExpert->lname}}
                            @endif
                        </td>
                        <td class="text-center" dir="ltr" >

                            @if(!is_null($item->get_financial))
                                {{$item->get_financial->scholarship_course->course}}
                            @endif
                        </td>
                        <td class="text-center" >
                            @if(!is_null($item->get_financial))
                                {{number_format($item->get_financial->schoalrshipPayment->fi)}}
                            @endif
                        </td>
                        <td class="text-center" >
                            @if(!is_null($item->get_financial))
                                {{($item->get_financial->schoalrshipPayment->score)}}
                            @endif
                        </td>
                        <td class="text-center" >
                            @if(!is_null($item->get_financial))
                                {{($item->get_financial->schoalrshipPayment->loan)}}
                            @endif
                        </td>

                        <td class="text-center">
                            @if(!is_null($item->get_financial))
                                {{number_format($item->get_financial->schoalrshipPayment->fi_final)}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if(!is_null($item->get_financial))
                                {{($item->get_financial->schoalrshipPayment->pre_payment)}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if(!is_null($item->get_financial))
                                {{number_format($item->get_financial->schoalrshipPayment->remaining)}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if(!is_null($item->get_financial))
                                {{($item->get_financial->schoalrshipPayment->date_fa)}}
                            @endif
                        </td>
                        <td class="text-center" >
                            {{$item->financial}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
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
            $('.table_data').DataTable({
                // columnDefs: [
                //     {
                //         target: 6,
                //         visible: false,
                //         searchable: false,
                //     }
                // ],
                dom: 'Bfrltip',
                buttons: [
                    'excel',
                ]
            } );
        } );
    </script>
@endsection
