@extends('master.index')
@section('row1')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h6 class="d-block text-dark" style="line-height: 2">فرم ورود به دوره آمــوزش رایــگان کوچیــنگ</h6>
                <h6 class="d-block text-dark" style="line-height: 3">(طرح اعطای بورسیه کوچینگ آکادمی بین المللی فراکوچ)</h6>
                <div class="card text-left">

                    <div class="card-body" style="background-color: #eeeff0 !important">
                        @if($errors->any())
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if(session('scholarshipStatus')!=true)
                            <form method="POST" action="/scholarship/storeCodewithoutPass" target="_blank">
                                {{csrf_field()}}
                                <input type="hidden" value="0" name="tel_verified" id="tel_verified"/>

                                <div class="form-group row">
                                    <label for="tel" class="col-md-4 col-form-label text-md-right">تلفن همراه: <span class="text-danger">*</span></label>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="hidden" id="tel_org" value="{{old('tel')}}" name="tel"/>
                                            <input id="tel" dir="ltr" type="tel" class="form-control"  value="{{old('tel')}}" required autocomplete="tel">
                                            @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('شروع دوره آموزشی') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form method="POST" action="/knot/checkCode_knot" >
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('رمز یکبار مصرف:*') }}</label>

                                    <div class="col-md-6">
                                        <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
                                        <a href="/scholarship/cleartel">ویرایش تلفن</a>
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('چک کردن کد') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
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
            console.log(intl.getNumber());
        });




        input.addEventListener("countrychange", function() {
            document.querySelector("#introduced_registerAdmin_org").value=intl1.getNumber();
        });

        $('#introduced_registerAdmin').change(function()
        {
            document.querySelector("#introduced_registerAdmin_org").value=intl1.getNumber();
        });



    </script>
@endsection
