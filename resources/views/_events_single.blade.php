@extends('master.index')
@section('headerscript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <style>
        .back{
            width:100%;
            height: 550px;
            background-color: rgba(2,1,19,.81);
        }
        #title{
            color:#fff;
        }
        .btn-i{
            color:rgb(253 192 7);
        }
        .name, .fallow{
            border: 5px solid #fff;
            border-radius: 5px;
        }
        .fallow{
            background-color: #fff;
            height:300px
        }
        .name{
            background-image: url("{{asset('images/esfahan1.png')}}");
            height:400px;
            background-size:100% 100%;
        }
        .fallow2{
            height: 200px;
            background-color: antiquewhite;
        }
        #date{
            background-color:#f5f5f5;
            height:100px;
        }
        .rectangle{
            background-color: #ffc107;
            position: absolute;
            width: 6px;
            height: 55px;
            margin-right: -18px;
            margin-top: -6px;
        }
    </style>
@endsection

@section('row1')
    <div class="row" id="">
        <div class="col-12 back">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 col-sx-12 align-right mt-5" id="title">
                        <h1> همایش خانواده بزرگ فراکوچ </h1>
                        <p>  توضیحات </p>
                        <p class="float-left mr-5"> <i class="bi bi-geo-alt-fill"></i> سالن شهید آوینی -دانشگاه تهران   </p>
                        <p class="float-left mr-5"> <i class="bi bi-clock-fill"></i>  ساعت 16 الی 19  </p>
                        <p> <i class="bi bi-calendar-check-fill"></i>  پنجشنبه 13 آبان ماه </p>
                        <p> <i class="bi bi-tags-fill"></i> دسته بندی:  </p>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-sx-12 align-right mt-5 " >
                        <button type="button" class="btn btn-outline-warning btn-lg mt-5 "> <i class="bi bi-calendar-check-fill btn-i mr-2"></i>افزودن به تقویم </button>
                        <button type="button" class="btn btn-outline-warning btn-lg mt-5 "> <i class="bi bi-bookmark-check-fill btn-i"></i> ذخیره </button>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-xl-4 col-md-4 col-sm-12 col-sx-12 ">
                        <div class="card fallow text-center">
                            <div class="card-body ">
                                <button type="button" class="btn btn-success mt-5 "> <i class="bi bi-hand-thumbs-up-fill"></i>دنبال کردن</button>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body fallow2 ">
                                <div class="col-12 ">
                                    <h5 class="float-left mr-5"> جلسه وبینار</h5>
                                    <h5 class="float-left mr-5"> زمان</h5>
                                </div>
                                <div class="col-12 mt-5" id="date">

                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body text-center">
                                <h4>لینک کوتاه به این صفحه  </h4>

                            </div>
                        </div>
                        <div class="card mt-4 ">
                            <div class="card-body text-center">
                                <img src="{{asset('/images/Yaser-Motahedin.png')}}" class="d-block "/>
                                <h4> برگزارکننده: </h4>
                                <button type="button" class="btn btn-success mt-5 "> <i class="bi bi-hand-thumbs-up-fill"></i>دنبال کردن</button>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-12 col-sx-12 ">
                        <div class="card name">
                            <div class="card-body ">

                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body ">
                                <div class="rounded-rectangle rectangle" >
                                </div>
                                <h2>
                                    ویدئوی معرفی وبینار
                                </h2>
                                <video>
                                </video>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body ">
                                <div class="rounded-rectangle rectangle" >
                                </div>
                                <h2>
                                    توضیحات وبینار
                                </h2>
                                <p>
                                </p>
                                <img src="">
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body ">
                                <div class="rounded-rectangle rectangle " >
                                </div>
                                <h2>
                                    سرفصل‌های وبینار
                                </h2>
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body ">
                                <div class="rounded-rectangle rectangle" >
                                </div>
                                <h2>
                                    مخاطبین وبینار
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


