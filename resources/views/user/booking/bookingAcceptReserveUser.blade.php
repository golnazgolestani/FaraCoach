@extends('user.master.index')
@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <style>
        #colors span
        {
            width: 25px;
            height: 25px;
        }
        .bg-success2
        {
            background-color:  #c6ffb3 !important;
        }

        .bg-warning2
        {
            background-color: #fff0b3 !important;
        }
    </style>
@endsection

@section('content')
    <div class="col-12" id="colors">
        <div class="row">
            <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                <span class="d-inline-block bg-success2 rounded-circle" ></span>
            </div>
            <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                <p class=" p-0 m-0">  برگزار شده</p>
            </div>
            <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                <span class="d-inline-block bg-warning2 rounded-circle" ></span>
            </div>
            <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                <p class=" p-0 m-0">  رزرو شده بلاتکلیف</p>
            </div>
            <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                <span class="d-inline-block bg-danger rounded-circle" ></span>
            </div>
            <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                <p class=" p-0 m-0"> کنسل شده</p>
            </div>
            <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                <span class="d-inline-block bg-info rounded-circle" ></span>
            </div>
            <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                <p class=" p-0 m-0"> غیبت مراجع</p>
            </div>
            <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                <span class="d-inline-block bg-secondary rounded-circle" ></span>
            </div>
            <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                <p class=" p-0 m-0"> غیبت کوچ</p>
            </div>



        </div>

    </div>
    <div class="col-md-12 mt-3 table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>کد جلسه</th>
                    <th scope="col">مشخصات</th>
                    <th scope="col">تاریخ شروع</th>
                    <th scope="col">ساعت شروع</th>
                    <th scope="col">ساعت پایان</th>
                    <th scope="col">مدت جلسه</th>
                    @if(Auth::user()->status_coach==1)
                        <th scope="col">وضعیت</th>
                    @endif
                    @if(Auth::user()->status_coach==1)
                        <th scope="col">حذف</th>
                    @else
                        <th>لغو جلسه</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($reserves as $item)
                    @switch($item['status'])
                        @case('1')   <tr class="bg-warning2 clickable-row "  data-href='/panel/reserve/{{$item->id}}'>
                        @break
                        @case('3')   <tr class="bg-success2 clickable-row"  data-href='/panel/reserve/{{$item->id}}'>
                        @break
                        @case('4')   <tr class="table-danger">
                        @break
                        @case('41')   <tr class="table-danger">
                        @break
                        @case('42')   <tr class="table-danger">
                        @break
                        @case('5')   <tr class="table-info">
                        @break
                        @case('6')   <tr class="table-secondary">
                        @break
                        @default     <tr>
                        @break
                    @endswitch


                            <td class="text-center">
                                @if(($item->status==4)||($item->status==41)||($item->status==42))
                                    {{$item->id}}
                                @else
                                    <a href="/panel/reserve/{{$item->id}}">{{$item->id}}</a>
                                @endif

                            </td>
                            <td>
                                @if(($item->status==4)||($item->status==41)||($item->status==42))
                                    {{$item->booking->coach->user->fname.' '.$item->booking->coach->user->lname}}
                                @else
                                    <a href="/panel/reserve/{{$item->id}}">{{$item->booking->coach->user->fname.' '.$item->booking->coach->user->lname}}</a>
                                @endif
                            </td>
                            <td class="text-center">
                                    @if(($item->status==4)||($item->status==41)||($item->status==42))
                                        {{$item->booking->start_date}}
                                    @else
                                        <a href="/panel/booking/{{$item->id}}">{{$item->booking->start_date}}</a>
                                    @endif
                            </td>
                            <td class="text-center">{{$item->booking->start_time}}</td>
                            <td class="text-center">{{$item->booking->end_time}}</td>
                            <td class="text-center">{{$item->duration_booking}}</td>
                            @if(Auth::user()->status_coach==1)
                                <td>{{$item->caption_status}}</td>
                            @endif

                            <td>
                                @if((($item->booking->start_date>$dateNow && Auth::user()->status_coach==1) && (($item['status'])!=0)&&($item['status']!=4)))
                                        <form method="post" action="/panel/booking/{{$item->id}}" onsubmit="return confirm('آیا از حذف زمان رزرو اطمینان دارید؟');">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button  class="btn btn-danger" type="submit">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                @elseif($item->booking->start_date>$dateNow && (($item['status']!=4)&&($item['status']!=41)&&($item['status']!=42)))
                                        <form method="POST" action="/panel/booking/{{$item->booking_id}}" onsubmit="return confirm('آیا از لغو جلسه اطمینان دارید؟')">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <input type="hidden" name="status" value="41" />
                                            <button type="submit" class="btn btn-danger">لغو جلسه
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </form>
                                @elseif($item->status==41)
                                    <p class="text-dark">کنسل توسط مراجع</p>
                                @elseif($item->status==42)
                                    <p class="text-dark">کنسل توسط کوچ</p>
                                @endif
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('footerScript')
    <script>
        // jQuery(document).ready(function($) {
        //     $(".clickable-row").click(function() {
        //         window.location = $(this).data("href");
        //     });
        // });
    </script>



    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                order: [[2, 'desc']],
            });
        } );
    </script>
@endsection
