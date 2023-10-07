@extends('panelAdmin.master.index')

@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection

@section('rowcontent')
    <div class="container shadow-lg p-5">
        <div class="table-responsive overflow-auto p-3">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">نام خانوادگی</th>
                    <th scope="col">مشاهده</th>
                    <th scope="col">خروجی</th>
                </tr>
                </thead>
                <tbody>
                @foreach($psychological as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->fname}}</td>
                        <td>{{$item->lname}}</td>
                        <td>
                            <a href="/admin/psychological/{{$item->id}}" class="btn btn-success">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/psychological/export/{{$item->id}}" class="btn btn-info">
                                <i class="bi bi-file-earmark-excel-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
