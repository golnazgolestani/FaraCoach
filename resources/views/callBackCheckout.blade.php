@extends('master.index')
@section('row1')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <img src="{{asset('/images/logo.png')}}" class="img-fluid" />
            </div>
            <div class="col-12 alert alert-{{$alert}}">
                {!! $msg !!}
            </div>
        </div>
    </div>
@endsection
