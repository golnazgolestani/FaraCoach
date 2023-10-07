@extends('master.index')
@section('row1')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1 ">
                <div class="card mb-3 table-responsive ">
                    <div class="card-header font-weight-bold">انتخاب شیوه پرداخت</div>

                    @if($cart->count()>0)
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>محصول</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">درصد تخفیف</th>
                                <th class="text-center">قیمت نهایی</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $sum_fi=0;
                                $sum_final_off=0;
                            @endphp
                            @foreach($cart as $item)
                                <tr>
                                    <td class="col-sm-8 col-md-6">
                                        {{$item->product}}
                                    </td>


                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong>{{number_format($item->fi) }}</strong>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong>{{$item->off}}%</strong>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong>{{number_format($item->final_off)}}</strong>
                                    </td>
                                    @php
                                        $sum_fi=$sum_fi+$item->fi;
                                        $sum_final_off=$sum_final_off+$item->final_off;
                                    @endphp
                                    <td class="col-sm-1 col-md-1">
                                        <form method="get" action="/cart/{{$item->id}}" onsubmit="return confirm('آیا از حذف زمان مطمئن هستید؟');">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-x-lg"></i> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="3">   </td>
                                <td><span>جمع قیمت</span></td>
                                <td class="text-right"><h5><strong> {{number_format($sum_fi)}}</strong></h5></td>
                            </tr>
                            <tr>
                                <td colspan="3">   </td>
                                <td><span>قیمت نهایی</span></td>
                                <td class="text-right">
                                    <h5>
                                        <strong>{{number_format($sum_final_off)}}</strong>
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">کد تخفیف</td>
                                <td colspan="3">
                                    <form method="POST" action="/coupon/checkCoupon" class="d-inline-block">
                                        {{csrf_field()}}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">اعمال</button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="کد تخفیف" aria-label="Example text with button addon" aria-describedby="button-addon1" name="coupon" />
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">  </td>
                                <td colspan="2">
                                    <!--
                                    <form method="post" action="/cart/payment">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-success btn-block">
                                            مرحله بعد<i class="bi bi-arrow-left-circle"></i>
                                        </button>
                                    </form>
                                    -->
                                </td>
                            </tr>
                            </tbody>
                        </table>


                    @else
                        <div class="alert alert-warning">
                            سبد خرید شما خالی است
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <div class="card mb-3">
                    <div class="card-header font-weight-bold">انتخاب شیوه پرداخت</div>
                    <div class="card-body pl-5">
                        <form method="post" action="/panel/order">
                            {{csrf_field()}}
                            <div class="form-check mb-3">
                                <input class="form-check-input payment" type="radio" name="payment_type" id="payment1" value="نقدی" checked  />
                                <label class="form-check-label font-weight-bold" for="payment1" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >
                                    <img src="{{asset('/images/payment1.png')}}" width="50px" />
                                    پرداخت نقدی
                                </label>
                                <div class="collapse show" id="collapseExample">
                                    <p>در صورت پرداخت نقدی میزان {{$cart[0]->peymant_off}}% تخفیف اعمال خواهد شد </p>
                                </div>

                            </div>
                            <div class="form-check mb-5">
                                <input class="form-check-input payment" type="radio" name="payment_type"  id="payment2" value="اقساط" />
                                <label class="form-check-label font-weight-bold" for="payment2" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                    <img src="{{asset('/images/payment2.png')}}" width="50px" />
                                    پرداخت اقساط
                                </label>

                                <div class="collapse" id="collapseExample2">
                                    <p>در صورت پرداخت نقدی میزان {{$cart[0]->peymant_off}}% تخفیف اعمال خواهد شد </p>
                                </div>
                            </div>
                            <div class="form-check mb-5">
                                <input class="form-check-input payment" type="radio" name="payment_type"  id="payment3" value="wallet" />
                                <label class="form-check-label font-weight-bold" for="payment3" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                                    <img src="{{asset('/images/wallet.png')}}" width="50px" />
                                    کیف پول
                                </label>

                                <div class="collapse" id="collapseExample3">
                                    <p>در صورت پرداخت نقدی میزان {{$cart[0]->peymant_off}}% تخفیف اعمال خواهد شد </p>
                                </div>
                            </div>

                            <div class="collapse" id="payment_ghest">


                            </div>
                            <input type="submit" class="btn btn-success" id="btn_payment" value="ثبت و پرداخت نهایی">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('footerScript')
    <script>
        $(".payment").change(function()
        {
            if($(this).val()=='اقساط')
            {
                $("#btn_payment").val('مرحله بعد');
            }
            else
            {
                $("#btn_payment").val('ثبت و پرداخت نهایی');
            }
        });
    </script>
@endsection
