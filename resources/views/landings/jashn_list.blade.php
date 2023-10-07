@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12">
        <a href="/admin/jashn/list/exportexcel" class="btn btn-primary">خروجی اکسل</a>
    </div>
    <div class="col-12 table-responsive overflow-auto">
        <p >تعداد کل ثبت نام
            <b class="font-weight-bold">{{$count}}</b>
             نفر
        </p>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">نام و نام وخانوادگی</th>
                    <th class="text-center">شماره همراه</th>
                    <th class="text-center">تاریخ ثبت نام</th>
                    <th class="text-center">معرف</th>
                    <th class="text-center">تعداد معرفی شده</th>
                    <th class="text-center">تعداد منشن های پیشنهادی</th>
                    <th class="text-center">وضعیت نهایی</th>
                </tr>
                </thead>
            <tbody>

            @foreach ($users as $item)
                <tr>
                    <td class="text-center">
                        <a href="/admin/jashn/user/options/{{$item->id}}">
                            {{$item->fname." ".$item->lname}}
                        </a>
                    </td>
                    <td class="text-center" dir="ltr">
                        <a href="/admin/jashn/user/options/{{$item->id}}" target="_blank">
                            {{$item->tel}}
                        </a>
                    </td>

                    <td class="text-center">
                        {{$item->date_fa}}
                    </td>
                    <td class="text-center">
                        {{$item->introduce['fname']." ".$item->introduce['lname']}}
                    </td>
                    <td class="text-center">
                        {{$item->introducedUser->count()}}
                    </td>
                    <td class="text-center">
                        {{$item->mention}}
                    </td>
                    <td class="text-center">
                        @if($item->resultoptions=='1,1')
                            <i class="bi bi-check-square-fill text-success"></i>
                        @else
                            <i class="bi bi-x-square-fill text-danger"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>




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
