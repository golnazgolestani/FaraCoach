@extends('master.index')

@section('headerScript')
    <style>
        #invitation p
        {
            font-size: 20px;
            line-height: 2;
        }

        #invitation span *
        {
            font-size: 32px !important;
        }

        .custom-select
        {
            width: auto !important;
        }


        span.bg-danger
        {
            border-radius: 20px;
        }

    </style>
@endsection

@section('row1')
    <div class="container bg-light pt-3 pb-3">
        <div class="row mt-5 " >
            <div class="col-12 mt-1 text-center" id="banner">
                <img src="{{asset('/images/events-isfahan.jpeg')}}" id="des-banner" class="img-fluid">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5 text-center" id="inveite">
                        <h2>گردهمایی خانواده بزرگ فراکوچ - اصفهان </h2>
                        <p>زمان پنجشنبه .13 آبان ماه ساعت 16 الی 19</p>
                        <p>مکان:اصفهان - سیتی سنتر - پردیس سینمایی - سالن شماره 2</p>
                        <p>اگر افتخار میزبانی شما رو در این جشن داریم لطفا حتما در فرم زیر ما رو مطلع کنید.</p>
                        <p>با سپاس -  مشتاق دیدار شما هستیم<p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 col-xl-4"></div>
            <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                @if($errors->any())
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    </div>
                @endif
                <form method="POST" action="/events/isfahan/store">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="fname">نام:*</label>
                        <input type="text" class="form-control" id="fname" name="fname"/>
                    </div>
                    <div class="form-group">
                        <label for="lname">نام خانوادگی:*</label>
                        <input type="text" class="form-control" id="lname" name="lname"/>
                    </div>
                    <div class="form-group">
                        <label for="tel">شماره همراه:*</label>
                        <input type="text" class="form-control" id="tel" name="tel"/>
                    </div>
                    @if(is_null($user))
                    <div class="form-group">
                        <label for="introduced">شماره معرف:</label>
                        <input type="text" class="form-control" id="introduced" name="introduced"/>
                    </div>
                    @else
                        <input type="hidden" value="{{$user->id}}" id="introduced" name="introduced"/>
                    @endif
                    <p>درباره کوچینگ:*</p>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="options" id="coach" value="کوچ یا دانشپذیر کوچ هستم" />
                        <label class="form-check-label" for="coach">
                            کوچ یا دانشپذیر کوچ هستم
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="options" id="likes" value="بسیار علاقمند ولی هنوز شروع نکردم" />
                        <label class="form-check-label" for="likes">
                            بسیار علاقمند ولی هنوز شروع نکردم
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="options" id="searches" value="صرفا کنجکاو هستم" />
                        <label class="form-check-label" for="searches">
                            صرفا کنجکاو هستم
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary text-center mt-3">ثبت</button>
                </form>
            </div>
            <div class="col-12 col-md-4 col-lg-4 col-xl-4"></div>
        </div>
    </div>

@endsection
