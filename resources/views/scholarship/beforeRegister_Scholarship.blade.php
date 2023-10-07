@extends('master.index')
@section('row1')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h6 class="d-block text-dark" style="line-height: 2">فرم ورود به دوره آمــوزش رایــگان کوچیــنگ</h6>
                <h6 class="d-block text-dark" style="line-height: 3">(طرح اعطای بورسیه کوچینگ آکادمی بین المللی فراکوچ)</h6>
                <!-- <h6 class="text-dark mb-3">برای ورود به پورتال شماره تماس خود را وارد کنید</h6> -->
                <div class="card text-left">
                    <!--
                    <div class="card-header bg-info text-light">{{ __('ثبت نام') }}</div>
                    -->

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

                        <!--
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            فیلدهای ستاره دار اجباریست
                        </div>
                        -->

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
                        @elseif(session('scholarshipStatus')=='infoUser')
                                <form method="POST" action="/scholarship/update/user">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label for="fname" class="col-md-4 col-form-label text-md-right">نام: <span class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="@if(Auth::check()){{old('fname',Auth::user()->fname)}}@endif" required autocomplete="fname" autofocus  @if(!is_null(Auth::user()->fname) ) readonly @endif />

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
                                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"  name="lname" value="@if(Auth::check()){{old('lname',Auth::user()->lname)}}@endif" required autocomplete="lname" autofocus  @if(!is_null(Auth::user()->lname)) readonly @endif/>

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
                                                <input type="radio" id="gender1" name="sex" class="custom-control-input"  value="1" @if(Auth::user()->sex==1) checked  @endif>
                                                <label class="custom-control-label" for="gender1" >مرد</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="gender2" name="sex" class="custom-control-input" value="0" @if(Auth::user()->sex==0) checked   @endif>
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
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(Auth::check()){{old('email',Auth::user()->email)}}@endif" required autocomplete="email" @if(!is_null(Auth::user()->email)) readonly @endif />

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
                                                <input type="hidden" id="tel_org" value="@if(!is_null(Auth::user()->tel)){{old('tel',Auth::user()->tel)}}@endif" name="tel"/>
                                                <input id="tel" dir="ltr" type="tel" class="form-control"  value="@if(!is_null(Auth::user()->tel)){{old('tel',Auth::user()->tel)}}@endif" required autocomplete="tel" @if(!is_null(Auth::user()->tel)) readonly @endif>
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
                                                <select id="education" class="form-control p-0  @error('education') is-invalid @enderror" name="education" @if(strlen(Auth::user()->education)>0 )) readonly @endif>
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
                                            <input id="reshteh" type="text" class="form-control @error('reshteh') is-invalid @enderror" name="reshteh" value="@if((Auth::check())){{old('reshteh',Auth::user()->reshteh)}}@endif" required  @if(strlen(Auth::user()->reshteh)>0) readonly @endif />

                                            @error('reshteh')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    @if(!strlen(Auth::user()->password))

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
                                            <a href="/scholarship/cleartel">ویرایش تلفن</a>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('مرحله بعد') }}
                                            </button>


                                        </div>
                                    </div>
                                </form>
                        @elseif(session('scholarshipStatus')=='infoScholarship')

                                <form method="POST" action="/scholarship/register/final" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id"/>
                                    <div class="form-group row">
                                        <label for="target" class="col-md-4 col-form-label text-md-right">هدف شما از شرکت در دوره آموزش کوچینگ: <span class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="target1" name="target[]" />
                                                    <label class="form-check-label" for="target1">
                                                        برای توسعه مهارت فردی در زندگی و کسب و کار (اثرگذار باشم)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="2" id="target2" name="target[]" />
                                                    <label class="form-check-label" for="target2">
                                                        میخواهم کوچ حرفه ای شوم (بعنوان شغل دوم و یا اصلی)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="3" id="target3" name="target[]" />
                                                    <label class="form-check-label" for="target3">
                                                        در شغل و کسب و کار خودم از این مهارت استفاده کنم
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="4" id="target4" name="target[]" />
                                                    <label class="form-check-label" for="target4">
                                                        مایلم بعد از گذراندن دوره آموزشی با موسسه همکاری کنم
                                                    </label>
                                                </div>
                                                <!--
                                                <select id="target" class="form-control p-0  @error('target') is-invalid @enderror" name="target[]" multiple>
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option {{ old('target')==1 ? 'selected='.'"'.'selected'.'"' : '' }} value="1" >برای توسعه مهارت فردی در زندگی و کسب و کار (اثرگذار باشم)</option>
                                                    <option {{ old('target')==2 ? 'selected='.'"'.'selected'.'"' : '' }} value="2">میخواهم کوچ حرفه ای شوم (بعنوان شغل دوم و یا اصلی)</option>
                                                    <option {{ old('target')==3 ? 'selected='.'"'.'selected'.'"' : '' }} value="3">در شغل و کسب و کار خودم از این مهارت استفاده کنم</option>
                                                    <option {{ old('target')==4 ? 'selected='.'"'.'selected'.'"' : '' }} value="4">مایلم بعد از گذراندن دوره آموزشی با موسسه همکاری کنم</option>
                                                </select>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="types" class="col-md-4 col-form-label text-md-right">به  کدام  حوزه اصلی کوچینگ علاقمندید: <span class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="types[]">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    لایف کوچینگ
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="types[]" />
                                                <label class="form-check-label" for="defaultCheck2">
                                                    بیزنس کوچینگ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gettingknow" class="col-md-4 col-form-label text-md-right">میزان آشنایی شما با کوچینگ: <span class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <select id="gettingknow" class="form-control p-0  @error('gettingknow') is-invalid @enderror" name="gettingknow">
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option {{ old('gettingknow')==1 ? 'selected='.'"'.'selected'.'"' : ''}} value="1"  >اطلاعات کامل دارم </option>
                                                    <option {{ old('gettingknow')==2 ? 'selected='.'"'.'selected'.'"' : ''}} value="2">آگاهی مختصری دارم</option>
                                                    <option {{ old('gettingknow')==3 ? 'selected='.'"'.'selected'.'"' : ''}} value="3">آشنایی ندارم</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group row">
                                        <label for="description" class="col-md-4 col-form-label text-md-right"> توضیح بیشتری درباره  ویژگیها و توانمندی و علاقمندی خود مرقوم بفرمایید: </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="scientific" class="col-md-4 col-form-label text-md-right">سوابق علمی خود را مرقوم فرمایید: <span class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="scientific" type="text" class="form-control @error('scientific') is-invalid @enderror"  name="scientific"  required autocomplete="scientific" autofocus  />

                                            @error('scientific')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="executive" class="col-md-4 col-form-label text-md-right">سوابق اجرایی خود را مرقوم فرمایید: <span class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="executive" type="text" class="form-control @error('executive') is-invalid @enderror"  name="executive"  required autocomplete="executive" autofocus  />

                                            @error('executive')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="introduce" class="col-md-4 col-form-label text-md-right">نام فردی را  که عضو هیئت علمی و یا دانشپذیر موسسه  فراکوچ است، به عنوان معرف درج کنید: </label>

                                        <div class="col-md-6">
                                            <input id="introduce" type="text" class="form-control @error('introduce') is-invalid @enderror"  name="introduce"    />

                                            @error('introduce')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    -->
                                    <div class="form-group row">
                                        <label for="cooperation" class="col-md-4 col-form-label text-md-right"> چه علاقمندی  و یا  توانمندی  ویژه ای جهت  همکاری  با  آکادمی فراکوچ دارید ؟ (حین و بعد از اتمام دوره آموزشی):<span class="text-danger">*</span>    </label>

                                        <div class="col-md-6">
                                            <!-- <input id="cooperation" type="text" class="form-control @error('cooperation') is-invalid @enderror"  name="cooperation"  required autocomplete="cooperation" autofocus  /> -->
                                            <textarea class="form-control" id="cooperation" rows="3" name="cooperation">{{old('cooperation')}}</textarea>

                                            @error('cooperation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="applicant" class="col-md-4 col-form-label text-md-right">متقاضی کدام سطح اموزش هستید؟<span class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="gender1" name="applicant" class="custom-control-input"  value="1"  @if(old('applicant')==1) checked @endif/>
                                                <label class="custom-control-label" for="gender1" >سطح 1</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="gender2" name="applicant" class="custom-control-input" value="2" @if(old('applicant')==2) checked @endif />
                                                <label class="custom-control-label" for="gender2" >سطح 2(ویژه کوچها و دانشپذیران سطح1)</label>
                                            </div>

                                            @error('applicant')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="resume" class="col-md-4 col-form-label text-md-right">رزومه  خورد را بارگزاری نمایید: </label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="resume">
                                            <small class="text-muted ">فایل های قابل قبول: PDF , JPG , JPEG , DOC , PNG</small>
                                            <small class="text-muted d-block">حداکثر حجم فایل: 600 کیلوبایت</small>
                                            @error('resume')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>







                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <a href="/scholarship/cleartel">ویرایش تلفن</a>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('مرحله بعد') }}
                                            </button>


                                        </div>
                                    </div>
                                </form>

                        @else
                            <form method="POST" action="/scholarship/checkCode_Scholarship" >
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
