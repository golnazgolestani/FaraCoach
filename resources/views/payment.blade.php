@extends('master.index')

@section('row1')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center" >
                <img src="{{asset('/images/logo.png')}}" width="100px" />
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
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

                            <div class="collapse" id="payment_ghest">

                            </div>
                            <input type="submit" class="btn btn-success" id="btn_payment" value="ثبت و پرداخت نهایی">
                       </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold" >
                        خلاصه سفارش
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>محصول</th>
                                <th class="text-center">قیمت</th>
                            </tr>
                            @foreach($cart as $item)
                                <tr>
                                    <td>{{$item->product}}</td>
                                    <td class="text-center">{{number_format($item->final_off)}} تومان</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        قیمت سبد
                    </div>
                    <div class="card-body">
                        @php
                            $sum=0;
                        @endphp
                        @foreach ($cart as $item)
                            @php
                                $sum=$item->final_off+$sum;
                            @endphp
                            مجموع مبلغ سبد خرید شما {{number_format($sum)}} تومان می باشد
                        @endforeach
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
