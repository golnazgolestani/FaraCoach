@extends('master.index')

@section('row1')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('فراموشی رمز') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <!--
                    <form method="POST" action="{{ route('password.email') }}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('پست الکترونیکی') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ارسال لینک فعال سازی') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    -->

                    @if($errors->any())
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(session('msg') && (session('errorStatus')))
                        <div class="col-12">
                            <div class="alert alert-{{session('errorStatus')}}">
                                <p>{{session('msg')}}</p>
                            </div>
                        </div>
                    @endif
                    <form method="GET" action="/password/sendcode">
                        {{csrf_field()}}
                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('تلفن همراه:') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" id="tel_org" value="{{ old('tel') }}" name="tel"/>
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel') }}" required autocomplete="email" autofocus>

                                @error('tel')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $tel }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ارسال کد') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScript')
    <script src="{{asset('/panel_assets/intl_tel/js/intlTelInput.js')}}"></script>
    <script src="{{asset('/panel_assets/intl_tel/js/utils.js')}}"></script>
    <script>
        var input = document.querySelector("#tel");
        var intl=intlTelInput(input,{
            formatOnDisplay:false,
            separateDialCode:true,
            autoPlaceholder:'off',
            preferredCountries:["ir", "gb"]
        });



        input.addEventListener("countrychange", function() {
            document.querySelector("#tel_org").value=intl.getNumber();
        });

        $('#tel').change(function()
        {
            document.querySelector("#tel_org").value=intl.getNumber();
        });
    </script>
@endsection
