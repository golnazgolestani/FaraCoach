@extends('admin.master.index')
@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">همه درخواست ها <span class="badge badge-secondary">{{$scholarships->count()}}</span></a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                <div class="col-12 table-responsive">
                    <table  class="table_data table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>ردیف</th>
                                <th>نام و نام خانوادگی</th>
                                <th>تلفن همراه</th>
                                <th>تحصیلات</th>
                                <th>امتیاز پروفایل</th>
                                <th>امتیاز معرف</th>
                                <th>امتیاز آموزش</th>
                                <th>امتیاز آزمون</th>
                                <th>امتیاز معرفی نامه</th>
                                <th>امتیاز مصاحبه</th>
                                <th>امتیاز کل</th>
                                <th>وضعیت نمایش امتیاز</th>
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
                                <td class="text-center" dir="ltr">{{$item->user->education}}</td>
                                <td class="text-center" dir="ltr">
                                    {{$item->score['score_profile']}}
                                </td>
                                <td class="text-center">
                                    {{$item->score['count_scholarshipIntroduce']}}
                                </td>
                                <td class="text-center">
                                    {{$item->score['confirm_webinar']}}
                                </td>
                                <td class="text-center">
                                    {{$item->score['scholarshipexam']}}
                                </td>
                                <td class="text-center">
                                    {{$item->score['score_introductionletter']}}
                                </td>
                                <td class="text-center">
                                    {{($item->user->get_scholarshipInterview['score'])}}
                                </td>
                                <td class="text-center">{{$item->score['result_final']}}</td>
                                <td class="text-center">
                                    @if($item->view_score==1)
                                        در حال نمایش
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
