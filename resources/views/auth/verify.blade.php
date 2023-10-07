@extends('panelUser.master.index')

@section('rowcontent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ایمیل خود را تایید کنید') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('یک نامه تأیید جدید به آدرس ایمیل شما ارسال شده است.') }}
                        </div>
                    @endif

                    <p>{{ __('برای ادامه فعالیت نیاز است که پست الکترونیکی خود را تایید کنید.') }}</p>
                    <p>{{ __('با کلیک کردن در نامه ارسال شده پست الکترونیکی خود را تایید کنید.در صورت عدم مشاهده لطفا پوشه SPAM خود را چک کنید') }}</p>
                    {{ __('برای ارسال مجدد کلیک کنید') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('برای ارسال مجدد اینجا کلیک کنید') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
