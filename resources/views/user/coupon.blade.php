@extends('user.master.index')
@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12 table-responsive">
        <a href="/panel/coupon/create" class="btn btn-primary mb-2">کوپن جدید <i class="fas fa-plus-circle"></i></a>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th scope="col">کوپن</th>
                <th scope="col">تاریخ انقضا</th>
                <th scope="col">تعداد</th>
                <th scope="col">وضعیت</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>

                @foreach($coupons as $item)

                    <tr class="text-center">
                        <td>
                            {{$item->coupon}}
                        </td>
                        <td>
                            {{$item->expire_date}}
                        </td>
                        <td>{{$item->count}}</td>
                        <td>
                            @if($item->expire_date<$dateNow)
                                منقضی شده
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning" href="/panel/coupon/{{$item->id}}/edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="/panel/coupon/{{$item->id}}" onsubmit="return confirm('آیا از حذف کوپن تخفیف مطمئن هستید؟');">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button  class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
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
            $('#example').DataTable();
        } );
    </script>
@endsection
