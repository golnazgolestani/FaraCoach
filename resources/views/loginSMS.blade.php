@extends('master.index')


@section('row1')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src="{{asset('/images/logo-colored.png')}}" class="mb-4"/>
            <div class="card text-left">
                <div class="card-header">{{ __('ورود بدون رمز') }}</div>
                <div class="card-body">
                    @if(session('msg') && (session('errorStatus')))
                        <div class="alert alert-{{session('errorStatus')}}">
                                {{session('msg')}}
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $item)
                            <div class="alert alert-danger" role="alert">
                            {{$item}}
                            </div>
                        @endforeach
                    @endif

                    @if ((session('status')==true))
                    <form method="POST" action="/panel/checkCodewithoutPass">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('رمز یکبار مصرف') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
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
                                    {{ __('ورود') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                        <form method="POST" action="/panel/storeCodewithoutPass">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('شماره همراه') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" id="tel_org_login" value="{{ old('tel') }}" name="tel"/>
                                    <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror"  value="{{ old('tel') }}" required autocomplete="tel" autofocus>
                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <a class="btn btn-link" href="/login">
                                        {{ __('ورود با رمز') }}
                                    </a>
                                    <a class="btn btn-link" href="/register">
                                        {{ __('ثبت نام') }}
                                    </a>
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ارسال کد') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('رمز را فراموش کردید؟') }}
                                        </a>
                                    @endif
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
    <script>
        var input = document.querySelector("#tel");
        var intl=intlTelInput(input,{
            formatOnDisplay:false,
            separateDialCode:true,
            autoPlaceholder:'off',
            preferredCountries:["ir", "gb"]
        });

        input.addEventListener("countrychange", function() {
            document.querySelector("#tel_org_login").value=intl.getNumber();
        });

        $('#tel').change(function()
        {

            document.querySelectorAll("#tel_org_login")[1].value=intl.getNumber();

            console.log(document.querySelectorAll("#tel_org_login")[1]);

        });


    </script>
@endsection
