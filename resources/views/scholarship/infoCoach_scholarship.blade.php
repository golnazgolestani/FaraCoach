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
                        <form method="POST" action="/scholarship/register/final" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$user->id}}" name="user_id"/>
                            <div class="form-group row">
                                <label for="target" class="col-md-4 col-form-label text-md-right">هدف شما از شرکت در دوره آموزش کوچینگ: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select id="target" class="form-control p-0  @error('target') is-invalid @enderror" name="target">
                                            <option selected disabled>انتخاب کنید</option>
                                            <option {{ old('target')=="زیردیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}   >برای توسعه مهارت فردی در زندگی و کسب و کار (اثرگذار باشم)</option>
                                            <option {{ old('target')=="دیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}>میخواهم کوچ حرفه ای شوم (بعنوان شغل دوم و یا اصلی)</option>
                                            <option {{ old('target')=="فوق دیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}>در شغل و کسب و کار خودم از این مهارت استفاده کنم</option>
                                            <option {{ old('target')=="لیسانس" ? 'selected='.'"'.'selected'.'"' : '' }}>مایلم بعد از گذراندن دوره آموزشی با موسسه همکاری کنم</option>
                                        </select>
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
                                            <option {{ old('gettingknow')=="زیردیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}   >اطلاعات کامل دارم </option>
                                            <option {{ old('gettingknow')=="دیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}>آگاهی محتصری دارم</option>
                                            <option {{ old('gettingknow')=="فوق دیپلم" ? 'selected='.'"'.'selected'.'"' : '' }}>آشنایی ندارم</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">جهت افزایش کیفیت خدمات، توضیح بیشتری درباره خودتان و ویژگیها و توانمندی و علاقمندی خود مرقوم بفرمایید: </label>
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
                                <label for="introduce" class="col-md-4 col-form-label text-md-right">نام فردی را  که عضو هیئت علمی و یا دانشپذیر موسسه  فراکوچ است، به عنوان معرف درج کنید: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="introduce" type="text" class="form-control @error('introduce') is-invalid @enderror"  name="introduce"  required autocomplete="introduce" autofocus  />

                                    @error('introduce')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="resume" class="col-md-4 col-form-label text-md-right">رزومه  خورد را بارگزاری نمایید: <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="resume">
                                    @error('resume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>







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
