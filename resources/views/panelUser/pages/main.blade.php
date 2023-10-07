<!DOCTYPE html>
<html lang="en">
<head>
    <title>شتابدهنده اندیشه خوارزم </title>

 <meta charset="utf-8">
 <meta name="samandehi" content="769422428"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/acckt/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lalezar">

    <style>
        body {
            font-family: Lalezar, sans-serif;
        }
        .myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }

        .centered-title {
            position: fixed;
            top: 22%;
            left: 50%;
            /* bring your own prefixes */
            transform: translate(-50%, -50%);
            font-size: 45px;
            color: #fff;
            animation: fade 6s;
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .centered-buttons {
            position: fixed;
            top: 90%;
            left: 50%;
            /* bring your own prefixes */
            transform: translate(-50%, -50%);
            animation: fade 2s;
        }

        /* Style the button used to pause/play the video */
        .portal-btn {
            width: 200px;
            font-size: 21px;
            padding: 10px;
            border: none;
            background: #fff;
            color: #6b6b6b;
            cursor: pointer;
            margin: 50px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }

        .portal-btn:hover {
            background: #000;
            color: #fff;
            text-decoration: none;
        }

        .video-1080, .video-720, .video-480, .video-360 {
            display: none;
        }

        @media only screen and (max-width: 600px) {
            .video-360 {
                display: block;
            }
            .video-720, .video-480, .video-1080 {
                display: none;
            }
            .centered-title {
                font-size: 34px;
            }
            .portal-btn {
                width: 145px;
      margin:10px !important;
      font-size: 16px;
            }
      .centered-buttons {
      width: 80% !important;
      top: 88%;
      }
        }

        @media only screen and (min-width: 600px) {
            .video-480 {
                display: block;
            }
            .video-1080, .video-720, .video-360 {
                display: none;
            }
            .centered-title {
                font-size: 34px;
            }
            .portal-btn {
                width: 145px;
            }
        }

        @media only screen and (min-width: 1199px) {
            .video-720 {
                display: block;
            }
            .video-1080, .video-480, .video-360 {
                display: none;
            }
            .portal-btn {
                width: 200px;
            }
            .centered-title {
                font-size: 4em;
            }
        }

        @media only screen and (min-width: 1400px) {
            .video-1080 {
                display: block;
            }
            .video-720, .video-480, .video-360 {
                display: none;
            }
            .portal-btn {
                width: 200px;
            }
            .centered-title {
                font-size: 4em;
            }
        }


    </style>
</head>
<body>
<div class="container-fluid">
    <div class="video-1080">
        <!-- The video -->
        <video autoplay muted class="myVideo">
            <source type="video/webm" src="{{ asset('/acckt/assets/video/parallex_1080.webm') }}">
            <source type="video/mp4" src="{{ asset('/acckt/video/parallex_1080.mp4')}}">
            <span class="desc-2">مرورگر شما از ویدئو پشتیبانی نمی کند</span>
        </video>
    </div>

    <div class="video-720">
        <!-- The video -->
        <video autoplay muted class="myVideo">
            <source type="video/webm" src="{{asset('/acckt/video/parallex_720.webm') }}">
            <source type="video/mp4" src="{{asset('/acckt/video/parallex_720.mp4')}}">
            <span class="desc-2">مرورگر شما از ویدئو پشتیبانی نمی کند</span>
        </video>
    </div>

    <div class="video-480">
        <!-- The video -->
        <video autoplay muted class="myVideo">
            <source type="video/webm" src="{{ asset('/acckt/video/parallex_480.webm') }}">
            <source type="video/mp4" src="{{ asset('/acckt/video/parallex_480.mp4')}}">
            <span class="desc-2">مرورگر شما از ویدئو پشتیبانی نمی کند</span>
        </video>
    </div>

    <div class="video-360">
        <!-- The video -->
        <video autoplay muted class="myVideo">
            <source type="video/webm" src="{{ asset('/acckt/video/parallex_360.webm')}}">
            <source type="video/mp4" src="{{ asset('/acckt/video/parallex_360.mp4')}}">
            <span class="desc-2">مرورگر شما از ویدئو پشتیبانی نمی کند</span>
        </video>
    </div>

    <div class="centered-title">
        <span>شتابدهنده اندیشه خوارزم </span>
    </div>
    <div class="centered-buttons row w-100 mx-auto">
        <a class="col portal-btn" href="/sarmaye">صاحبان سرمایه</a>
        <a class="col portal-btn" href="/startup">صاحبان ایده</a>
    </div>
</div>
<style>
    @media (min-width:768px) {
        .portal-btn {
            margin: 5px;
            max-width:170px;
        }
        .centered-buttons {
            justify-content: center;
        }
    }
    @media (max-width:766px) {
        .portal-btn {
            margin: 5px;
        }
   }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="{{asset('/acckt/js/bootstrap.min.js')}}"></script>
</body>
