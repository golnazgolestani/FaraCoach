@extends('master.index')

@section('headerscript')
    <style>
        #gettingknow2
        {
            display: none;
        }
    </style>
@endsection

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
                    <form method="POST" action="{{ route('register') }}">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">نام: <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" lang="fa" required autocomplete="fname" autofocus>

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
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"  lang="fa" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

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
                                    <input type="radio" id="gender1" name="sex" class="custom-control-input"  value="1">
                                    <label class="custom-control-label" for="gender1" >مرد</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="gender2" name="sex" class="custom-control-input" value="0">
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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

                        <div class="form-group row">
                            <label for="gettingknow_parent" class="col-md-4 col-form-label text-md-right">{{ __('نحوه آشنایی با فراکوچ:') }}</label>
                            <div class="col-md-6">
                                <select id="gettingknow_parent" class="form-control @error('gettingknow_parent') is-invalid @enderror" name="gettingknow_parent">
                                <option selected disabled>انتخاب کنید</option>
                                @foreach($gettingknow_parent as $item)
                                    <option value="{{$item->id}}">{{$item->category}}</option>
                                @endforeach
                                </select>
                                @error('gettingknow_parent')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" id="gettingknow2">
                            <label for="gettingknow" class="col-md-4 col-form-label text-md-right">{{ __('عنوان آشنایی:') }}</label>
                            <div class="col-md-6">
                                <select id="gettingknow" class="form-control @error('gettingknow') is-invalid @enderror" name="gettingknow">
                                    <option selected disabled>انتخاب کنید</option>
                                </select>
                                @error('gettingknow')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('معرف:') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="hidden" id="introduced_registerAdmin_org" value="{{ old('introduced') }}"  />
                                    <input id="introduced_registerAdmin" type="text" class="form-control @error('introduced') is-invalid @enderror" value="{{ old('introduced') }}" autocomplete="introduced" dir="ltr"/>
                                    @error('introduced')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="text-muted">لطفا تلفن همراه معرف خود را وارد کنید</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <span id="feedback_introduced" ></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-right" >
                                <a class="btn btn-primary" data-toggle="collapse" href="#Organization" role="button" class="text-md-right  text-dark">{{ __('اطلاعات سازمان:') }}</a>
                            </div>
                            <div class="col-md-6">
                                <div class="collapse" id="Organization">
                                    <div class="card card-body border-0">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="organization">ارگان</label>
                                                <input id="organization" type="text" name="organization" class="form-control @error('organization') is-invalid @enderror" value="{{ old('organization') }}" autocomplete="organization">
                                                @error('organization')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="jobside">سمت</label>
                                                <input id="jobside" type="text"  name="jobside" class="form-control @error('jobside') is-invalid @enderror" value="{{ old('jobside') }}" autocomplete="jobside">
                                                @error('jobside')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type1" class="col-md-4 col-form-label text-md-right">متقاضی: <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="type1" name="types" class="custom-control-input"  value="1">
                                    <label class="custom-control-label" for="type1" >دوره های آموزشی</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="type2" name="types" class="custom-control-input" value="30">
                                    <label class="custom-control-label" for="type2" >جلسه کوچینگ</label>
                                </div>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ثبت نام') }}
                                </button>

                                <a class="btn btn-link" href="/login">
                                    {{ __('ورود') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="ModalMobile" tabindex="-1" aria-labelledby="ModalMobile" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" id="modal_body">
            </div>
        </div>
    </div>
</div>


@endsection

@section('footerScript')
    <script>
        $("#gettingknow_parent").change(function()
        {
            var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
            //$("#gettingknow2").html(loading);
            var content=$(this).val();
            $.ajax({
                type:'GET',
                url:"/showListChildGettingKnow/"+content,
                success:function(data)
                {
                    $("#gettingknow2").css('display','flex');
                    $("#gettingknow").html(data);
                }
            });

        })
    </script>
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




        //
        var input = document.querySelector("#introduced_registerAdmin");
        var intl1=intlTelInput(input,{
            formatOnDisplay:false,
            separateDialCode:true,
            autoPlaceholder:'off',
            preferredCountries:["ir", "gb"]
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


