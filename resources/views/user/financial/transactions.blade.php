@extends('user.master.index')

@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12 table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>محصول</th>
                    <th>مشخصات</th>
                    <th>تاریخ</th>
                    <th>قیمت(تومان)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($checkouts as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if($item->type=='event')
                                {{$item->event->event}}
                            @elseif($item->type=='reserve')
                                جلسه کوچینگ
                            @elseif($item->type=='course')
                                {{$item->course->course}}
                            @endif
                        </td>
                        <td>{{$item->user->fname.' '.$item->user->lname}}</td>
                        <td>{{$item->user->fname.' '.$item->user->lname}}</td>
                        <td>{{number_format($item->price)}}</td>

                    </tr>
                @endforeach
            </tbody>
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
