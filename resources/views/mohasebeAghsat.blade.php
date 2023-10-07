<div class="row">
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">قیمت</span>
            </div>
            <input type="text" class="form-control" readonly value="{{$fi_asli}}">
            <div class="input-group-append">
                <span class="input-group-text">تومان</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">پرداخت نقدی</span>
            </div>
            <input type="text" class="form-control" readonly id="prepaymant_faktor" name="prepaymant" value="{{$payment_pardakhti}}"/>
            <div class="input-group-append">
                <span class="input-group-text">تومان</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">درصد تخفیف نقدی</span>
            </div>
            <input type="text" class="form-control" readonly value="{{$darsadTakhkfif}}" id="prepaymant_faktor" name="darsadTakhkfif" />
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">مبلغ تخفیف نقدی</span>
            </div>
            <input type="text" class="form-control" readonly value="{{$mablagheTakhfifDadeshode}}" id="takhfif_naghdi" name="takhfif_naghdi" />
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">باقیمانده</span>
            </div>
            <input type="text" class="form-control" readonly   id="baghimandeh_faktor"  value="{{$baghimandeh_batakhfif}}" name="baghimandeh_batakhfif" />
            <div class="input-group-append">
                <span class="input-group-text">تومان</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">تعداد اقساط</span>
            </div>
            <input type="text" class="form-control" readonly   id="tedad_ghest"  value="{{$ghest}}" name="tedad_ghest" />
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">مبلغ هر قسط</span>
            </div>
            <input type="text" class="form-control" readonly id="fi_ghest" name="fi_ghest" value="{{$aghsat}}" />
            <div class="input-group-append">
                <span class="input-group-text">تومان</span>
            </div>
        </div>
    </div>


    @foreach($tarikhAghsat as $item)
            <p> {{$loop->iteration." - "}} تاریخ موعد اقساط <span>{{$item}}</span> به مبلغ {{number_format($aghsat) }} تومان </p>
    @endforeach

    <input type="submit" class="btn btn-success"  value="ثبت و پرداخت نهایی">

</div>
