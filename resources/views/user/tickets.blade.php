@extends('user.master.index')
@section('headerScript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>

        .tiketType{
            height:200px!important;
        }
        /*.tiketType :hover{
            box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.1), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
        }*/
        .bi-ticket-perforated{
            font-size:50px;
        }
        .btn {
            background-color: #ffc107!important;
        }
        .tiketType > div{
            transform: rotate(-45deg);
        }
        .tabs{
            border: 1px solid #ddd;

        }
        nav > .nav.nav-tabs{
            border: none;
            color:#fff;
            background:#f5f5f5;
            border-radius:0;

        }
        nav > div a.nav-item.nav-link,
        nav > div a.nav-item.nav-link.active
        {
            border: none;
            padding: 18px 25px;
            color:#2b343e;
            background:#f5f5f5;
            border-radius:0;
        }

        nav > div a.nav-item.nav-link.active:after
        {
            content: "";
            position: relative;
            bottom: -60px;
            left: -10%;
        }
        .tab-content{
            background: #fdfdfd;
            line-height: 25px;
            padding:30px 25px;
        }

        nav > div a.nav-item.nav-link:hover,
        nav > div a.nav-item.nav-link:focus
        {
            border: none;
            background: #fff;
            color:#2b343e;
            border-radius:0;
            transition:background 0.20s linear;
            border-bottom: 3px solid #ffc107;
        }
        .nav.nav-tabs .nav-item{
            margin-left:0px!important;
        }
    </style>
@endsection
@section('content')
    <!----------------------------------- TICKETS --------------------->

    <section class="col-xl-12 col-md-12 col-sm-6 col-6 text-center mt-3">
        <div class="col-12">
            <h4 class="text-left">وضعیت تیکت ها </h4>
        </div>
        <div class="col-xl-2 col-md-2 col-xs-6 col-sm-4 text-center float-right p-1 ">
            <div class="tiketType p-2 border">
                <div class="p-2">
                    <i class="bi bi-ticket-perforated "></i>
                </div>
                <p> همه تیکت ها </p>
            </div>
        </div>
        <div class="col-xl-2 col-md-2 col-xs-6 col-sm-4 text-center float-right p-1 ">
            <div class="tiketType p-2 border">
                <div class="p-2">
                    <i class="bi bi-ticket-perforated "></i>
                </div>
                <p> </p>
            </div>
        </div>
        <div class="col-xl-2 col-md-2 col-xs-6 col-sm-4 text-center float-right p-1 ">
            <div class="tiketType p-2 border">
                <div class="p-2">
                    <i class="bi bi-ticket-perforated "></i>
                </div>
                <p> تیکت های بسته </p>
            </div>
        </div>
        <div class="col-xl-2 col-md-2 col-xs-6 col-sm-4 text-center float-right p-1 ">
            <div class="tiketType p-2 border">
                <div class="p-2">
                    <i class="bi bi-ticket-perforated "></i>
                </div>
                <p> در حال انجام </p>
            </div>
        </div>
        <div class="col-xl-2 col-md-2 col-xs-6 col-sm-4 text-center float-right p-1 ">
            <div class="tiketType p-2 border">
                <div class="p-2">
                    <i class="bi bi-ticket-perforated "></i>
                </div>
                <p>  تیکت های باز </p>
            </div>
        </div>
        <div class="col-xl-2 col-md-2 col-xs-6 col-sm-4 text-center float-right p-1 ">
            <div class="tiketType p-2 border">
                <div class="p-2">
                    <i class="bi bi-ticket-perforated "></i>
                </div>
                <p>پاسخ داده شده </p>
            </div>
        </div>
    </section>
    <!----------------------------------- TABS --------------------->
    <section class="col-12 mt-5">
        <div class="col-6 float-left">
            <h4 class="text-left">فهرست تیکت ها </h4>
        </div>
        <div class="col-6 float-left">
            <!--
            <a href="/panel/message/create" class="btn btn-secondary btn-lg">ارسال تیکت جدید</a>
            -->
        </div>
    </section>
    <section class="col-12">
        <div class="mt-1" id="accordion-select" role="tablist">
            <div class="col-xl-6 col-md-6 col-sm-12 col-12 text-left float-left my-2">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected>وضعیت تیکت</option>
                    <option value="1">همه تیکت ها </option>
                    <option value="2">تیکت های باز </option>
                    <option value="3">تیکت های بسته </option>
                    <option value="4">در حال انجام </option>
                    <option value="5">پاسخ داده شده </option>
                    <option value="6">پایان یافته</option>
                    <option value="7">بسته شده سیستمی</option>
                </select>
            </div>

            <div class="col-xl-6 col-md-6 col-sm-12 col-12 text-left float-left my-2">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected>10</option>
                    <option value="1">20</option>
                    <option value="2">30</option>
                    <option value="3">40</option>
                </select>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row px-2">
                <div class="col-12 tabs p-0">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">همه تیکت ها </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">تیکت های پاسخ داده شده </a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">تیکت های من (مشتریان)</a>
                            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">تیکت های ویژه فراکوچ</a>
                        </div>
                    </nav>
                    <div class="tab-content py-2 px-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">شماره</th>
                                    <th scope="col">موضوع تیکت</th>
                                    <th scope="col">ارسال کننده</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages As $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>
                                        <a href="/panel/message/{{$item->id}}">
                                            {{$item->subject}}
                                        </a>
                                    </td>
                                    <td>{{$item->user_id_send}}</td>
                                    <td>
                                        @if($item->status==1)
                                            خوانده نشده
                                        @else
                                            خوانده شده
                                        @endif
                                    <td>{{$item->date_fa}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">موضوع تیکت</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td> </td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">موضوع تیکت</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">موضوع تیکت</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td>   </td>
                                    <td>  </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
