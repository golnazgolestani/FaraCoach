@extends('panelUser.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">
        @include('panelUser.boxProfile')
    </div>
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="row">
            @include('panelUser.cardBox')
        </div>
    </div>
@endsection
