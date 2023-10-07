@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="col-12 table-responsive">

        <table  class="table_data table table-striped table-bordered" style="width:100%">
            <thead>
            <tr class="text-center">
                <th>ردیف</th>
                <th>نام و نام خانوادگی</th>
                <th>تلفن</th>
                <th>تحصیلات</th>
                <th>وضعیت</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
                @foreach($scientific_supports as $scientific_support)
                    <tr >
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">
                            <a href="/admin/scientific_support/{{$scientific_support->id}}" target="_blank">{{$scientific_support->user->fname.' '.$scientific_support->user->lname}}</a>
                        </td>
                        <td class="text-center" dir="ltr">{{$scientific_support->user->tel}}</td>

                        <td class="text-center" dir="ltr">{{$scientific_support->user->education}}</td>
                        <td class="text-center" dir="ltr">{{$scientific_support->get_status()}}</td>
                        <td class="text-center" dir="ltr">
                            <a href="/admin/scientific_support/{{$scientific_support->id}}" class="btn btn-warning" target="_blank">
                                <i class="bi bi-eye-fill"></i>
                            </a>
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
                dom: 'Bfrltip',
                buttons: [
                    'excel',
                ]
            } );
        } );
    </script>
@endsection

