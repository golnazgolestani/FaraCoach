@extends('master.index')

@section('row1')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <a href="/">
                    <img src="{{asset('/images/logo-colored.png')}}" class="mb-4"/>
                </a>
                <div class="card text-left">
                    <div class="card-header bg-info text-light">{{ __('ثبت نام') }}</div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            فیلدهای ستاره دار اجباریست
                        </div>
                        <form method="POST" action="/scholarship/register/user">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="fname" class="col-md-4 col-form-label text-md-right">نام: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="@if(Auth::check()){{Auth::user()->fname}}@else{{old('fname')}}@endif" required autocomplete="fname" autofocus  @if(Auth::check()) disabled @endif />

                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" value="0" name="tel_verified" id="tel_verified"/>
                            <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-right">نام خانوادگی: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"  name="lname" value="@if(Auth::check()){{Auth::user()->lname}}@else{{old('lname')}}@endif" required autocomplete="lname" autofocus  @if(Auth::check()) disabled @endif/>

                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">جنسیت: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="gender1" name="sex" class="custom-control-input"  value="1" @if(Auth::check() && Auth::user()->sex==1) checked @endif>
                                        <label class="custom-control-label" for="gender1" >مرد</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="gender2" name="sex" class="custom-control-input" value="0" @if(Auth::check() && Auth::user()->sex==0) checked @endif>
                                        <label class="custom-control-label" for="gender2" >زن</label>
                                    </div>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">پست الکترونیکی: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(Auth::check()){{Auth::user()->email}}@else{{old('email')}}@endif" required autocomplete="email" @if(Auth::check()) disabled @endif />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right">تلفن همراه: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="hidden" id="tel_org" value="@if(Auth::check()){{Auth::user()->tel}}@else{{old('tel')}}@endif" name="tel"/>
                                        <input id="tel" dir="ltr" type="tel" class="form-control"  value="@if(Auth::check()){{Auth::user()->tel}}@else{{old('tel')}}@endif" required autocomplete="tel" @if(Auth::check()) disabled @endif>
                                        @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right">تحصیلات: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select id="education" class="form-control p-0  @error('education') is-invalid @enderror" name="education" @if(Auth::check()) disabled @endif>
                                            <option selected disabled>انتخاب کنید</option>
                                            <option {{ old('education',Auth::user()->education)=="زیردیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}   >زیردیپلم</option>
                                            <option {{ old('education',Auth::user()->education)=="دیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}>دیپلم</option>
                                            <option {{ old('education',Auth::user()->education)=="فوق دیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}>فوق دیپلم</option>
                                            <option {{ old('education',Auth::user()->education)=="لیسانس" ? 'selected='.'"'.'selected'.'"' : '' }}>لیسانس</option>
                                            <option {{ old('education',Auth::user()->education)=="فوق لیسانس" ? 'selected='.'"'.'selected'.'"' : '' }}>فوق لیسانس</option>
                                            <option {{ old('education',Auth::user()->education)=="دکتری و بالاتر" ? 'selected='.'"'.'selected'.'"' : '' }}>دکتری و بالاتر</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reshteh" class="col-md-4 col-form-label text-md-right">رشته تحصیلی: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="reshteh" type="text" class="form-control @error('reshteh') is-invalid @enderror" name="reshteh" value="@if(Auth::check()){{Auth::user()->reshteh}}@else{{old('reshteh')}}@endif" required autocomplete="email" @if(Auth::check()) disabled @endif />

                                    @error('reshteh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            @if(!Auth::check())

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تکرار رمز عبور: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('مرحله بعد') }}
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
