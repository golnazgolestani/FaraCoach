@extends('user.master.index')
@section('headerScript')
    <style>
        .card-user form .form-group {
            margin-bottom: 20px; }

        .card-user .image
        {
            height: 70px;
        }

        .card-user .image img
        {
            border-radius: 12px;
        }

        .card-user .author {
            text-align: center;
            text-transform: none;
            margin-top: -77px; }
        .card-user .author a + p.description {
            margin-top: -7px; }

        .card-user .avatar {
            width: 124px;
            height: 124px;
            border: 1px solid #FFFFFF;
            position: relative;
            border-radius: 50%;
        }

        .card-user .card-body {
            min-height: 240px; }

        .card-user hr {
            margin: 5px 15px 15px; }

        .card-user .card-body + .card-footer {
            padding-top: 0; }

        .card-user .card-footer h5 {
            font-size: 1.25em;
            margin-bottom: 0; }

        .card-user .button-container {
            margin-bottom: 6px;
            text-align: center; }


        .card-title
        {
            float:right !important;
        }
    </style>
@endsection

@section('content')

    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">
        @include('user.boxProfile')
    </div>
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="row">
            @include('user.cardBox')
        </div>
    </div>
@endsection
