@extends('master.index')
@section('row1')
    {{dd()}}
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src="{{asset('/images/logo-colored.png')}}" class="mb-4"/>
            <div class="card text-left">
                <div class="card-header">{{ __('ورود بدون رمز') }}</div>
                <div class="card-body">
                    <form method="POST" action="/scholarship/checkCode_Scholarship">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('رمز یکبار مصرف') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
