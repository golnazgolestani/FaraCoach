
@if(isset($msg) && (isset($errorStatus)))
    <div class="col-12">
        <div class="alert alert-{{$errorStatus}}">
            <p class="p-0 m-0">{{$msg}}</p>
        </div>
    </div>
@endif


    <span class="float-right">قیمت </span>
    <span class="float-left">{{number_format($reserve->fi) }} تومان</span>
    <br/>
    <span class="float-right">کوپن تخفیف </span>
    <span class="float-left">{{$reserve->coupon}} </span>
    <br/>
    <span class="float-right">کد تخفیف </span>
    <span class="float-left">{{$reserve->off}} %</span>
    <br/>
    <span class="float-right">قیمت نهایی</span>
    <span class="float-left">{{number_format($reserve->final_off) }} تومان</span>
