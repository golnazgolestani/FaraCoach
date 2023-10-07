@extends('user.master.index')
@section('headerScript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <style>


        :root {
            --white: #ffffff;
            --black: #000000;
            --blue:#0288d1;
            --gray:#ebebeb;
            --box-shadow1:0px 0px 18px 2px rgba(10, 55, 90, 0.15);
        }
        body{
            font-family: 'Roboto', sans-serif;
            font-weight: lighter;
            color: #637280;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
        }
        :focus{
            outline: 0px solid transparent !important;
        }
        .timeline {
            padding: 50px 0;
            position: relative;
        }
        .timeline-nodes {
            padding-bottom: 25px;
            position: relative;
        }
        .timeline-nodes:nth-child(even) {
            flex-direction: row-reverse;
        }
        .timeline p {
            padding: 5px;
        }

        .timeline::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 50%;
            width: 0;
            border-left: 1px solid #A3AFBD;
            height: 100%;
            z-index: 1;
            transform: translateX(-50%);
        }
        .timeline-content {
            border: 1px solid #a3afbd;
            position: relative;
            border-radius: 0 0 10px 10px;
        }
        .timeline-nodes:nth-child(odd) h3,
        .timeline-nodes:nth-child(odd) p {
            text-align: right;
        }
        .timeline-nodes:nth-child(odd) .timeline-date {
            text-align: left;
        }

        .timeline-nodes:nth-child(even) .timeline-date {
            text-align: right;
        }
        .timeline-nodes:nth-child(odd) .timeline-content::after {
            content: "";
            position: absolute;
            top: 5%;
            right: 100%;
            width: 0;
            border-right: 10px solid  #A3AFBD;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
        }
        .timeline-nodes:nth-child(even) .timeline-content::after {
            content: "";
            position: absolute;
            top: 5%;
            left: 100%;
            width: 0;
            border-left: 10px solid  #a3afbd;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
        }
        .timeline-image {
            position: relative;
            z-index: 100;
        }
        .timeline-image::before {
            content: "";
            width: 20px;
            height: 20px;
            border: 1px solid #ffc107;
            border-radius: 50%;
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #ffc107;
            z-index: 1;

        }
        .timeline-image img {
            position: relative;
            z-index: 100;
        }
        .rounded-circle{
            width:80px;
            height:80px;
        }
        .bi-person{
            font-size: 50px;

        }
        .btn{
            background-color:#ffc107!important;
        }
        .bi-hand-thumbs-up, .bi-hand-thumbs-down{
            font-size: 20px;
        }
        .container{
            background-image: url('images/supporter.png');
            background-repeat: no-repeat;

        }
        /*small device style*/

        @media (max-width: 767px) {
            .timeline-nodes:nth-child(odd) h3,
            .timeline-nodes:nth-child(odd) p {
                text-align: left
            }
            .timeline-nodes:nth-child(even) {
                flex-direction: row;
            }
            .timeline::before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 4%;
                width: 0;
                border-left: 1px solid #A3AFBD ;
                height: 100%;
                z-index: 1;
                transform: translateX(-50%);
            }
            .timeline h3 {
                font-size: 1.7rem;
            }
            .timeline p {
                font-size: 14px;
            }

            .timeline-nodes:nth-child(odd) .timeline-content::after {
                content: "";
                position: absolute;
                top: 5%;
                left: auto;
                right: 100%;
                width: 0;
                border-left: 0;
                border-right: 10px solid  #A3AFBD;
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
            }
            .timeline-nodes:nth-child(even) .timeline-content::after {
                content: "";
                position: absolute;
                top: 5%;
                right: 100%;
                width: 0;
                border-right: 10px solid #a3afbd;
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
            }
            .timeline-nodes:nth-child(even) .timeline-date {
                text-align: left;
            }
        }

        /*extra small device style */
        @media (max-width: 575px) {
            .timeline::before {
                content: "";
                display: block;
                position: absolute;
                top: 3%;
                left: -3%;
            }
            .timeline-image {
                position: absolute;
                left: -5%;
            }
            .timeline-image::before {
                width: 15px;
                height: 15px;
                left: 25%;
                top:3%;
            }
            .rounded-circle {
                width: 60px;
                height: 60px;
            }
            .bi-person {
                font-size: 40px;
            }
            .numberTickt{
                display:none;
            }
        }

    </style>
@endsection
@section('content')
    <!----------------------------------- TAKHFIF --------------------->
    <!--<section class="col-xl-6 col-md-6 col-sm-12 col-12 text-right float-right my-2">
        <i class="bi bi-x-square-fill"></i>
        <a class="text-decoration-none"> اینجا فراکوچ همیشه برات کلی تخفیف جذاب داره، از دستشون نده </a>
    </section>
    <section class="col-xl-6 col-md-6 col-sm-12 col-12 text-right my-2">
        <a href=" " class="btn btn-secondary"> استفاده از تخفیف ها </a>
    </section>
    -->

    <!----------------------------------- NUMBER TICKET --------------------->
    <section class="col-12 text-right my-2 numberTickt">
        <div class="user rounded-circle border border float-left col-2">
            <i class="bi bi-person"></i>
        </div>
        <div class="col-3 float-left">
            <div>شماره تیکت </div>
        </div>
        <div class="col-3 float-left">
            <i class="bi bi-eye"> نام پشتیبان </i><br/>
            <i class="bi bi-windows"> پشتیبان فراکوچ</i>
        </div>
    </section>
    <!----------------------------------- BACK --------------------->
    <section class="col-12 text-right mt-2">
        <i class="bi bi-arrow-bar-right">
            <a href="/panel/tickets" class=""> بازگشت </a>
        </i>
        <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">بستن تیکت</button>

    </section>
    <!----------------------------------- TICKET --------------------->
    <section class="container">
        <div class="timeline">
            <div class="row no-gutters justify-content-end justify-content-md-around align-items-start timeline-nodes">
                <div class="col-12 col-md-5 order-3 order-md-1 timeline-content">
                    <p class=" text-light float-right">نام پشتیبان</p>
                    <i class="bi bi-calendar4-week ml-1 mt-1"></i>
                    <time class="ml-1 mt-1 ">2018-02-23</time>
                    <hr/>
                    <p>متن پاسخ پشتیبان </p>
                    <hr/>
                    <i class="bi bi-hand-thumbs-up mx-1 float-right"></i>
                    <i class="bi bi-hand-thumbs-down mx-1 float-right"></i>
                </div>
                <div class="col-1 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                </div>
                <div class="col-12 col-md-5 order-1 order-md-3 timeline-date">

                </div>
            </div>
            <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                <div class="col-12 col-md-5 order-3 order-md-1 timeline-content">
                    <p class=" text-light float-right">نام کاربر</p>
                    <i class="bi bi-calendar4-week ml-1 mt-1"></i>
                    <time class="ml-1 mt-1 ">2018-02-23</time>
                    <hr/>
                    <p>متن پاسخ کاربر</p>
                </div>
                <div class="col-2 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                </div>
                <div class="col-12 col-md-5 order-1 order-md-3 timeline-date">

                </div>
            </div>
            <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                <div class="col-12 col-md-5 order-3 order-md-1 timeline-content">
                    <p class=" text-light float-right">نام پشتیبان</p>
                    <i class="bi bi-calendar4-week ml-1 mt-1"></i>
                    <time class="ml-1 mt-1 ">2018-02-23</time>
                    <hr/>
                    <p>متن پاسخ پشتیبان</p>
                    <hr/>
                    <i class="bi bi-hand-thumbs-up mx-1 float-right"></i>
                    <i class="bi bi-hand-thumbs-down mx-1 float-right"></i>
                </div>
                <div class="col-1 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                </div>
                <div class="col-12 col-md-5 order-1 order-md-3 timeline-date">

                </div>
            </div>
            <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                <div class="col-12 col-md-5 order-3 order-md-1 timeline-content">
                    <p class=" text-light float-right">نام کاربر</p>
                    <i class="bi bi-calendar4-week  ml-1 mt-1"></i>
                    <time class="ml-1 mt-1 ">2018-02-23</time>
                    <hr/>
                    <p>متن پاسخ کاربر</p>
                </div>
                <div class="col-2 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                </div>
                <div class="col-12 col-md-5 order-1 order-md-3 timeline-date">

                </div>
            </div>
        </div>
    </section>

@endsection
