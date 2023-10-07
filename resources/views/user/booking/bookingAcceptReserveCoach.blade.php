@extends('user.master.index')
@section('headerScript')
    <style>
        a
        {
            color:#000000;
        }
        .listFriends .btn
        {
            border-radius: 5px;
        }

        .listFriends .btn
        {
            width: auto;
            height: auto;
        }

        .listFriends .card .avatar
        {
            width: auto;
            height: auto;
        }

        .listFriends .card {
            padding-top: 20px;
            margin: 10px 0 20px 0;
            background-color: rgba(214, 224, 226, 0.2);
            border-top-width: 0;
            border-bottom-width: 2px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .listFriends .card .card-heading {
            padding: 0 20px;
            margin: 0;
        }

        .listFriends .card .card-heading.simple {
            font-size: 20px;
            font-weight: 300;
            color: #777;
            border-bottom: 1px solid #e5e5e5;
        }

        .listFriends .card .card-heading.image img {
            display: inline-block;
            width: 46px;
            height: 46px;
            margin-right: 15px;
            vertical-align: top;
            border: 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .listFriends .card .card-heading.image .card-heading-header {
            display: inline-block;
            vertical-align: top;
        }

        .listFriends .card .card-heading.image .card-heading-header h3 {
            margin: 0;
            font-size: 14px;
            line-height: 16px;
            color: #262626;
        }

        .listFriends .card .card-heading.image .card-heading-header span {
            font-size: 12px;
            color: #999999;
        }

        .listFriends .card .card-body {
            padding: 0 20px;
            margin-top: 20px;
        }

        .listFriends .card .card-media {
            padding: 0 20px;
            margin: 0 -14px;
        }

        .listFriends .card .card-media img {
            max-width: 100%;
            max-height: 100%;
        }

        .listFriends .card .card-actions {
            min-height: 30px;
            padding: 0 20px 20px 20px;
            margin: 20px 0 0 0;
        }

        .listFriends .card .card-comments {
            padding: 20px;
            margin: 0;
            background-color: #f8f8f8;
        }

        .listFriends .card .card-comments .comments-collapse-toggle {
            padding: 0;
            margin: 0 20px 12px 20px;
        }

        .listFriends .card .card-comments .comments-collapse-toggle a,
        .listFriends .card .card-comments .comments-collapse-toggle span {
            padding-right: 5px;
            overflow: hidden;
            font-size: 12px;
            color: #999;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .listFriends .card-comments .media-heading {
            font-size: 13px;
            font-weight: bold;
        }

        .listFriends .card.people {
            position: relative;
            display: inline-block;
            width: 170px;
            height: 300px;
            padding-top: 0;
            margin-left: 20px;
            overflow: hidden;
            vertical-align: top;
        }

        .listFriends .card.people:first-child {
            margin-left: 0;
        }

        .listFriends .card.people .card-top {
            position: absolute;
            top: 0;
            left: 0;
            display: inline-block;
            width: 170px;
            height: 150px;
            background-color: #ffffff;
        }

        .listFriends .card.people .card-top.green {
            background-color: #53a93f;
        }

        .listFriends .card.people .card-top.blue {
            background-color: #427fed;
        }

        .listFriends .card.people .card-info {
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 100%;
            height: 101px;
            overflow: hidden;
            background: #ffffff;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .listFriends .card.people .card-info .title {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            color: #404040;
        }

        .listFriends .card.people .card-info .desc {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 12px;
            line-height: 16px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .listFriends .card.people .card-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            display: inline-block;
            width: 100%;
            padding: 10px 20px;
            line-height: 29px;
            text-align: center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .listFriends .card.hovercard {
            position: relative;
            padding-top: 0;
            overflow: hidden;
            text-align: center;
            background-color: rgba(214, 224, 226, 0.2);
        }

        .listFriends .card.hovercard .cardheader {
            background: url("http://lorempixel.com/850/280/nature/4/");
            background-size: cover;
            height: 135px;
        }

        .listFriends .card.hovercard .avatar {
            position: relative;
            top: -50px;
            margin-bottom: -50px;
        }

        .listFriends div.hovercard .avatar img {
            width: 100px !important;
            height: 100px;
            max-width: 100px;
            max-height: 100px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.5);
        }

        .listFriends .card.hovercard .info {
            padding: 4px 8px 10px;
        }

        .listFriends .card.hovercard .info .title {
            margin-bottom: 4px;
            font-size: 16px;
            line-height: 1;
            color: #262626;
            vertical-align: middle;
        }

        .listFriends .card.hovercard .info .desc {
            overflow: hidden;
            font-size: 12px;
            line-height: 20px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .listFriends .card.hovercard .bottom {
            padding: 0 20px;
            margin-bottom: 17px;
        }

        .listFriends .btn{
            border-radius: 50%;
            width:32px;
            height:32px;
            line-height:24px;
        }

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

        .bg-danger2
        {
            background-color:  #ff9999 !important;
        }
    </style>
@endsection
@section('content')
            <div class="col-12 m-5 border-bottom">
                <h3>لیست جلسات رزرو شده</h3>
            </div>
            <div class="col-12" id="colors">
                <div class="row">
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-success2 rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0"> جلسات برگزار شده</p>
                    </div>
                    <div class="col-6 col-sm-1 col-lg-1 col-md-1 col-xl-1 text-center p-0 m-0">
                        <span class="d-inline-block bg-warning2 rounded-circle" ></span>
                    </div>
                    <div class="col-6 col-sm-11 col-lg-2 col-md-2 col-xl-2 p-0 m-0">
                        <p class=" p-0 m-0"> جلسات رزرو شده بلاتکلیف</p>
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
            <div class="col-12 table-responsive">
                <table  class="table_data table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>کدجلسه</th>
                            <th>مشخصات</th>
                            <th>تاریخ</th>
                            <th>ساعت شروع</th>
                            <th>نوع جلسه</th>
                            <th>نمایش</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($reserve as $item)

                            <tr class="text-center @if($item->status==1) bg-warning2 @elseif($item->status==3) bg-success2   @elseif($item->status==4 ||$item->status==41 ||$item->status==42) bg-danger2 @elseif($item->status==5) bg-info @elseif($item->status==6) bg-secondary    @endif">
                                <td>
                                    {{$item->id}}
                                </td>

                                <td>
                                    @if(($item->status==4)||($item->status==41)||($item->status==42))
                                        {{$item->user->fname}} {{$item->user->lname}}
                                    @else
                                        <a class="btn-modal-introduced" href="/panel/reserve/{{$item->id}}" >{{$item->user->fname}} {{$item->user->lname}}</a>
                                    @endif

                                </td>

                                <td>
                                    <p class="text-dark">{{$item->booking->start_date}}</p>
                                </td>
                                <td>
                                    <p class="text-dark">{{$item->booking->start_time}}</p>
                                </td>
                                <td>
                                    <p class="text-dark">{{$item->duration_booking}}</p>
                                </td>
                                <td>
                                    @if(($item->status!=4)&&($item->status!=42)&&($item->status!=41))
                                        <a class="btn btn-primary btn-sm" href="/panel/reserve/{{$item->id}}" title="نمایش" >
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                    @endif
                                </td>

                                <td>
                                    @if(($item->booking->start_date>$dateNow) && (($item->status!=4)&&($dateNow && $item->status!=41)&&($dateNow && $item->status!=42)))
                                        <form class="d-inline-block" method="POST" action="/panel/booking/{{$item->booking_id}}" onsubmit="return confirm('آیا از لغو جلسه اطمینان دارید؟')">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <input type="hidden" name="status" value="42" />
                                            <button type="submit" class="btn btn-danger">
                                                لغو جلسه
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
                order: [[2, 'desc']],
            });
        } );
    </script>
@endsection
