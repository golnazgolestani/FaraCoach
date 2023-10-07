@extends('user.master.index')

@section('content')
    <div class="col-12">
        <table class="table-bordered table text-center">
            <tr>
                <th>#</th>
                <th>عنوان درخواست</th>
                <th>تاریخ درخواست</th>
                <th>وضعیت</th>
                <th>ویرایش</th>
            </tr>

            @foreach($coach_requests as $coac_request)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$coac_request->clinic_basic_info->title}}</td>
                    <td>{{$coac_request->create_date}}</td>
                    <td>{{$coac_request->status()}}</td>
                    <td>
                         @if($coac_request->status!=1 )
                            <a href="/panel/coach_request/requests/{{$coac_request->id}}/pending" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection


