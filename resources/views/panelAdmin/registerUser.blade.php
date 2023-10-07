@extends('panelAdmin.master.index')

@section('navbarTop')
    @include('master.navbarTop')
@endsection


@section('headerScript')
    <style>
        #gettingknow2
        {
            display: none;
        }

    </style>
@endsection

@section('rowcontent')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-bottom pb-3 bg-light">{{ __('ثبت نام کاربر جدید') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/admin/register">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="fname" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('نام:') }}</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" lang="fa"  autocomplete="fname" autofocus>

                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" value="0" name="tel_verified" id="tel_verified"/>
                            <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('نام خانوادگی:') }}</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"  lang="fa" name="lname" value="{{ old('lname') }}"  autocomplete="lname" autofocus>

                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right text-dark">{{ __('جنسیت: *') }}</label>

                                <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="gender1" name="sex" class="custom-control-input"  value="1">
                                        <label class="custom-control-label  text-dark" for="gender1" >مرد</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="gender2" name="sex" class="custom-control-input" value="0">
                                        <label class="custom-control-label  text-dark" for="gender2" >زن</label>
                                    </div>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('پست الکترونیکی:') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('تلفن همراه: *') }}</label>
                                <div class="col-md-6">
                                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel">

                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="p_introduced">
                                <label for="tel" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('معرف:') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="introduced_registerAdmin" type="text" class="form-control @error('introduced') is-invalid @enderror" value="{{ old('introduced') }}" autocomplete="introduced">

                                        @error('introduced')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right  text-dark"></label>
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
                                <label for="gettingknow" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('نحوه آشنایی با فراکوچ:') }}</label>

                                <div class="col-md-6">
                                    <select id="gettingknow_parent" name="gettingknow_parent"   class="form-control p-0" @error('gettingknow_parent') is-invalid @enderror >
                                        <option selected disabled>انتخاب کنید</option>
                                        @foreach($gettingKnow_parent as $item)
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
                                <label for="password" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('رمز عبور: *') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="1234">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right  text-dark">{{ __('تکرار رمز عبور: *') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="1234">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type1" class="col-md-4 col-form-label text-md-right text-dark">{{ __('دسته بندی: *') }}</label>

                                <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type1" name="type" class="custom-control-input"  value="-1">
                                        <label class="custom-control-label  text-dark" for="type1" title="مربوط به دسته بندی مارکتنیگ و تبلیغات" >سرد</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type2" name="type" class="custom-control-input" value="1">
                                        <label class="custom-control-label  text-dark" for="type2"  >گرم</label>
                                    </div>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="sendSMS" class="col-md-4 col-form-label text-md-right  text-dark">ارسال پیامک</label>
                                <div class="col-md-6 mr-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sendsms" id="sendsms1" value="0" checked>
                                        <label class="form-check-label  text-dark" for="sendsms1">
                                            ارسال نشود
                                        </label>
                                    </div>
                                    @foreach($settingsms as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sendsms" id="sendsms{{$item->id}}"  value="{{$item->comment}}">
                                            <label class="form-check-label  text-dark" for="sendsms{{$item->id}}">
                                                {{$item->comment}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ثبت نام') }}
                                    </button>
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

        });

        $("#gettingknow_child").change(function()
        {
            // var a=$('#gettingknow_child').val();
            // alert(a);
            //
            // $("#p_introduced").css('display','flex');
        });
    </script>
@endsection
