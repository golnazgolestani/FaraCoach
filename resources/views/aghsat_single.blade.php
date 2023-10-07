@extends('master.index')

@section('row1')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center" >
                <img src="{{asset('/images/logo.png')}}" width="100px" />
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card mb-3">
                    <div class="card-header font-weight-bold">شرایط پرداخت</div>
                    <div class="card-body p-1">
                        <form method="post" action="/panel/order/aghsat">
                            {{csrf_field()}}
                            <table class="table">
                                <tr>
                                    <th>محصول</th>
                                    <th>قیمت</th>
                                </tr>

                                <tr>
                                    <td>{{($cart->product)}}</td>
                                    <td>{{(number_format($cart->final_off)).' تومان '}}</td>
                                </tr>

                            </table>
                            <input type="hidden" value="{{$cart->product_id}}" name="product_id" />
                            <input type="hidden" value="course" name="type" />
                            <input type="hidden" value="{{$cart->tedadGhest}}" name="tedadGhest" />
                            <input type="hidden" value="اقساط" name="payment_type" />
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="prepayment">مبلغ نقدی (تومان)</label>
                                        <small>حداقل مبلغ پرداختی {{number_format($cart->prepayment)}} تومان</small>
                                        <input type="number" class="form-control" id="prepayment" name="prepayment">
                                        <small class="">میزان {{$cart->peymant_off}}% تخفیف در میزان پرداخت نقدی</small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                    <div class="form-group ">
                                        <label for="ghest">تعداد اقساط باقیمانده</label>
                                        <select class="custom-select" id="ghest" name="tedadGhest">
                                            <option selected disabled>انتخاب کنید</option>
                                                @for($i=1;$i<=$cart->tedadGhest;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="button" value="محاسبه"  onclick="mohasebe()"/>
                            </div>
                            <div class="col-12 " id="faktor">

                            </div>

                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold" >
                        محصولات اقساط
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>محصول</th>
                                <th class="text-center">قیمت</th>
                            </tr>

                            <tr>
                                <td>{{$cart->product}}</td>
                                <td class="text-center">{{number_format($cart->final_off)}} تومان</td>
                            </tr>

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
                        <p>مجموع مبلغ اقساط خرید شما {{number_format($cart->final_off) }} تومان می باشد</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footerScript')
    <script>
        const prepayment={{$cart->prepayment}};
        const peymant_off={{$cart->peymant_off}};
        const fi={{$cart->fi}};
        const tedadGhest={{$cart->tedadGhest}};
        function mohasebe()
        {
            var ghest=$("#ghest").val();
            var payment=$("#prepayment").val();
            var data={
                prepayment:prepayment,
                peymant_off:peymant_off,
                fi:fi,
                tedadGhest:tedadGhest,
                payment:payment,
                ghest:ghest,
                _token: $('meta[name="csrf-token"]').attr('content'),
            }

            $.ajax({
               type:'post',
               data:data,
               url:'/cart/mohasebeAghsat',
               success:function(data)
                   {
                       $("#faktor").html(data);
                   },
               error:function(data)
                   {
                       $("#faktor").html(data.responseJSON.errors);
                       errorsHtml='<div class="alert alert-danger text-left"><ul>';
                       $.each( data.responseJSON.errors, function( key, value ) {
                           errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                       });
                       errorsHtml += '</ul></div>';
                       $( '#faktor' ).attr('css','col-12');
                       $( '#faktor' ).html( errorsHtml );

                   }

            });

            // if(payment>=prepayment && payment<=fi)
            // {
            //     var ghest=$("#ghest").val();
            //     if(ghest>=1 && ghest<=tedadGhest)
            //     {
            //         $('#faktor').attr('class','col-12');
            //         $("#prepaymant_faktor").val(payment);
            //         var baghimandeh=fi-payment;
            //         var takhfif_naghdi=((baghimandeh*peymant_off)/100);
            //         $("#takhfif_naghdi").val(takhfif_naghdi);
            //         baghimandeh=baghimandeh-((baghimandeh*peymant_off)/100);
            //         $("#baghimandeh_faktor").val(baghimandeh.toFixed(2));
            //         var ghestha=(baghimandeh/ghest).toFixed(2);
            //         $("#tedad_ghest").val(ghest);
            //         $("#fi_ghest").val(ghestha);
            //         return true;
            //
            //     }
            //     else
            //     {
            //         alert('تعداد اقساط را وارد کنید');
            //         $('#faktor').attr('class','col-12 d-none');
            //     }
            //
            //
            // }
            // else
            // {
            //     alert('قیمت وارد شده صحیح نمی باشد');
            //     $('#faktor').attr('class','col-12 d-none');
            // }
        };


        $("#btn_pardakht").click(function()
        {
            alert("AAAAAAA");
            if(mohasebe())
            {
                $.ajax({

                })
            }
        });
    </script>
@endsection
