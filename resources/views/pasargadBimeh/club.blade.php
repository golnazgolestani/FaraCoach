@extends('master.index')

@section('headerscript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <style>
        .back{
            width:100%;
        }
        #human{
            width: 65%;
        }
        .club-text{
            z-index: 2;
        }
        .club{
            width: 100%;
            height: 90px;
            background: rgba(2,1,19,0.81);
            z-index: 100;
        }
        .sosial{
            margin-left: 120px!important;
        }
        .slim{
            width: 141%;
            height:141%;
            border-radius: 50%;
            text-align: center;
            margin-top: -6px;
            margin-right: -6px;
        }
        .round{
            margin-top: 22px;
            z-index: 1000;
            left: -70px;
        }
        .insta img{
            width: 45%;
            float: right;
            margin: -240px 20px 0;
        }
        .rounded-circle{
            width:50px;
            height:50px;
            background: rgb(227 227 227);
            float:left;
            margin: 4px;
            padding: 9px;
            text-align:center;
        }
        .custommers{
            margin: 0px 0px 0px -12px;
        }
        .text h1, p, small{
            margin: 20px 100px;
        }
        .bi, h3{
            color: #0043a4;;
            font-size: 26px;
        }
        .bi:hover{
            color:orange;
        }
        .club-services{
            background-color: #f5f5f5;
            transition: 1.5s;
        }
        .club-services:hover {
            background-color: #f6d9fde0;
            bottom:10%;
        }
        .service-font i{
            font-size:70px;
        }
        @media only screen and (max-width: 321px){
            .custommers, .insta{
                display:none;
            }
            .text h1, p, small {
                margin: 0px;
            }
            .h1, h1{
                font-size: 1.3rem;
            }
            .club {
                height: 50px;
            }
            .club-text p{
                display:none;
            }
            .rounded-circle {
                width: 39px;
                height: 39px;
                background: rgb(222 222 222 / 97%);
                float: left;
                margin: -17px 4px 0;
                padding: 11px;
            }
            .bi{
                font-size: 16px;
                text-align:center;
                color:#31303f;
            }
        }
    </style>
@endsection

@section('row1')
    <div class="row" id="">
        <div class="col-12 mt-5 position-absolute club-text">

            <div class="float-left mt-5 col-xl-8 col-lg-8 col-md-8 col-sm-8 ">
                <h1> باشگاه مشتریان فراکوچ
                </h1>
                <p>باشگاه مشتریان فراکوچباشگاه مشتریان فراکوچباشگاه مشتریان فراکوچ
                    باشگاه مشتریان فراکوچباشگاه مشتریان فراکوچباشگاه مشتریان فراکوچ
                    باشگاه مشتریان فراکوچباشگاه مشتریان فراکوچباشگاه مشتریان فراکوچ
                </p>
                <small>باشگاه مشتریان فراکوچباشگاه مشتریان فراکوچباشگاه مشتریان چ
                </small>
                <a  href="#services" class="btn btn-outline-primary px-5 mt-5 "> شـروع کنیـد</a>
                <div class=" sosial mt-4 float-left col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class=" rounded-circle">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <div class="rounded-circle">
                        <i class="bi bi-telegram"></i>
                    </div>
                    <div class="rounded-circle">
                        <i class="bi bi-youtube"></i>
                    </div>
                    <div class="rounded-circle">
                        <i class="bi bi-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="text-right mt-1 float-left col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <img id="human" src="{{asset('/images/man.png')}}"/>
            </div>
        </div>
    </div>
    <div class="row" id="">
        <div class="col-12 px-0 ">
            <img class="back position-reletive" src="{{asset('/images/back.png')}}" alt=""/>
        </div>
        <div class="col-12 club d-flex justify-content-md-center">
            <div class=" round col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class= "rounded-circle custommers ">
                    <img class=" position-reletive slim" src="{{asset('/images/woman_smiling.jpg')}}" alt=""/>
                </div>
                <div class=" rounded-circle custommers">
                    <img class=" position-reletive slim" src="{{asset('/images/man-slim.jpg')}}" alt=""/>
                </div>
                <div class="rounded-circle custommers">
                    <img class=" position-reletive slim" src="{{asset('/images/woman_smiling.jpg')}}" alt=""/>

                </div>
                <div class="rounded-circle custommers">
                    <img class=" position-reletive slim" src="{{asset('/images/man-slim.jpg')}}" alt=""/>

                </div>
                <div class="rounded-circle custommers">
                    <img class=" position-reletive slim" src="{{asset('/images/woman_smiling.jpg')}}" alt=""/>
                </div>
                <div class="rounded insta"  >
                    <img src="{{asset('/images/lapppp.png')}}" alt="">
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-0 ">
            </diV>
        </div>
    </div>
    <div class="row">
        <div class="container rounded border text-justify mh-100 mt-5" >
            <h3 class="text-center mt-3"> باشگاه مشتریان فراکوچ راه اندازی شد </h3>
            <p>موسسه فراکوچ از بدو تاسیس همواره به دنبال رشد و توسعه همه جانبه مخاطبین و همراهان خود بوده است. تا آن جا که از طریق برگزاری دوره های تربیت کوچ حرفه ای و جلسات کوچینگ، آموزش های توسعه فردی و توسعه کسب و کار و سایر خدماتی که از طریق باشگاه مشتریان فراکوچ عرضه می شود، بتواند چشم انداز«زندگی بهتر و درآمد بیشتر» را تحقق بخشیده و به رشد و تعالی مخاطبین در سطح زندگی و کسب و کار کمک نماید. </p>
            <h3 class="text-center ">ما در ابعاد مختلف زندگی و کسب و کار همراه شما هستیم</h3>
            <p>در راستای راه اندازی و توسعه فعالیت های «باشگاه مشتریان فراکوچ»، خدمات مختلف رفاهی، علمی و آموزشی و توسعه کسب و کار مخاطبین تدارد دیده شده است. شما می توانید از طریق صفحات زیر توضیحات مربوط به هر خدمت را مطالعه کرده واز این خدمات بهره مند شوید. همچنین از طریق ارسال نظر در پایین همین صفحه، ما را از نظرات، پیشنهادات و درخواست اضافه شدن خدمات مورد نظر خود، مطلع نمایید.</p>
        </div>
    </div>
    <div class="row" id="services">
        <div class="container rounded mh-100 mt-5" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 club-services position-relative rounded border float-left"  >
                <div class="mt-3 text-center service-font">
                    <i class="bi bi-laptop"></i>
                    <p>خدمات طراحی سایت </p>
                    <button type="button" class="btn btn-outline-primary px-5 my-2 "> شـروع کنیـد</button>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 club-services position-relative rounded border float-left"  >
                <div class="mt-3 text-center service-font">
                    <i class="bi bi-book"></i>
                    <p>خدمات ویژه آموزشی  </p>
                    <button type="button" class="btn btn-outline-primary px-5 my-2 "> شـروع کنیـد</button>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 club-services position-relative rounded border float-left"  >
                <div class="mt-3 text-center service-font">
                    <i class="bi bi-laptop"></i>
                    <p>خدمات بیمه عمر </p>
                    <a href="/club/bimeh"  class="btn btn-outline-primary px-5 my-2 "> شـروع کنیـد</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container rounded  mt-5" >

        </div>
    </div>

@endsection
