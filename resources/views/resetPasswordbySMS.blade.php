@extends('master.index')

@section('row1')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('فراموشی رمز') }}</div>

                    <div class="card-body">
                        @if(isset($msg) && (isset($errorStatus)))
                            <div class="alert alert-{{$errorStatus}}">
                                {{$msg}}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $item)
                                <div class="alert alert-danger" role="alert">
                                    {{$item}}
                                </div>
                            @endforeach
                        @endif
                            <form method="POST" action="/password/reset/update">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$tel}}" name="tel" />
                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('کد ارسال شده:') }}</label>
                                    <div class="col-md-6">
                                        <input id="code" type="text" class="form-control" name="code" required autocomplete="/password/sendcode">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور:') }}</label>

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
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار رمز عبور:') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('بروزرسانی') }}
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

