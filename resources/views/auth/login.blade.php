@extends('master.index')

@section('headerscript')

    <style>
        .btnContactSubmit
        {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
            margin-right: 6%;
            background-color: white;
            color: blue;
            margin-top: 4%;
        }
        .register .nav-tabs .nav-link:hover{
            border: none;
        }
        .text-align{
            margin-top: -3%;
            margin-bottom: -9%;

            padding: 2%;
            margin-left: 30%;
        }
        .form-new{
            margin-right: 22%;
            margin-left: 20%;
        }
        .register-heading{
            margin-left: 21%;
            margin-bottom: 10%;
            color: #e9ecef;
        }
        .register-heading h1{
            margin-left: 21%;
            margin-bottom: 10%;
            color: #e9ecef;
        }
        .btnLoginSubmit{
            border: none;
            padding: 2%;
            width: 25%;
            cursor: pointer;
            background: #29abe2;
            color: #fff;
        }
        .btnForgetPwd{
            cursor: pointer;
            margin-right: 5%;
            color: #f8f9fa;
        }
        .register{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            margin-top: 3%;
            padding: 3%;
            border-radius: 2.5rem;
        }
        .nav-tabs .nav-link{
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            color: white;
        }

        .login-container{
            margin-top: 5%;
            margin-bottom: 5%;
        }
        .login-form-1{
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }
        .login-form-1 h3{
            text-align: center;
            color: #333;
        }
        .login-form-2{
            padding: 5%;
            background: #0062cc;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }
        .login-form-2 h3{
            text-align: center;
            color: #fff;
        }
        .login-container form{
            padding: 10%;
        }
        .btnSubmit
        {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            border: none;
            cursor: pointer;
        }
        .login-form-1 .btnSubmit{
            font-weight: 600;
            color: #fff;
            background-color: #0062cc;
        }
        .login-form-2 .btnSubmit{
            font-weight: 600;
            color: #0062cc;
            background-color: #fff;
        }
        .login-form-2 .ForgetPwd{
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }
        .login-form-1 .ForgetPwd{
            color: #0062cc;
            font-weight: 600;
            text-decoration: none;
        }

    </style>

    <script src="{{asset('/panel_assets/intl_tel/js/intlTelInput.js')}}"></script>
    <script src="{{asset('/panel_assets/intl_tel/js/utils.js')}}"></script>
@endsection
@section('row1')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <a href="" class="">
                <img src="{{asset('/images/logo-colored.png')}}" class="mb-4"/>
            </a>
        </div>
    </div>
</div>



<div class="container login-container">
    <div class="row">
        @if($errors->any())
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="col-md-6 login-form-1">
            <h3>ورود با شماره همراه</h3>
            <form method="post" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="hidden" id="tel_org" value="{{ old('email') }}" name="email"/>
                    <input id="tel" type="tel" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="رمز عبور خود را وارد کنید" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="ورود" />
                </div>
                <div class="form-group">
                    <a href="{{asset('/register')}}" class="ForgetPwd">ثبت نام</a>
                </div>
                <div class="form-group">
                    <a href="{{ route('password.request') }}" class="ForgetPwd">فراموشی رمز؟</a>
                    <a class="btn btn-link  btn-primary text-light mb-1" href="/loginSMS">
                        {{ __('ورود با رمز یکبار مصرف') }}
                    </a>
                </div>
            </form>
        </div>
        <div class="col-md-6 login-form-2">
            <h3>ورود با ایمیل</h3>
            <form method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="form-group row">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="رمز عبور خود را وارد کنید" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="ورود" />
                </div>
                <div class="form-group">
                    <a href="{{asset('/register')}}" class="ForgetPwd">ثبت نام</a>
                </div>
                <div class="form-group">
                    <a href="{{ route('password.request') }}" class="ForgetPwd">فراموشی رمز؟</a>
                    <a class="btn btn-link  btn-light mb-1" href="/loginSMS">
                        {{ __('ورود با رمز یکبار مصرف') }}
                    </a>
                </div>
            </form>
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
            document.querySelector("#tel_org").value=intl.getNumber();
        });

        $('#tel').change(function()
        {
            document.querySelector("#tel_org").value=intl.getNumber();
        });
    </script>
@endsection

