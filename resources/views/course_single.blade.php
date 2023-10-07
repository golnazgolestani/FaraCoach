@extends('master.index')

@section('headerscript')
    <style>
        h1
        {
            font-size: 2rem ;
            color:#003366 !important;
        }
    </style>
@endsection

@section('row1')
    <section class="py-5 bg-light ">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-7">
                    <img class="card-img-top mb-5 mb-md-0" src="{{asset('/documents/'.$course->image)}}" alt="..." height="600px"/>
                </div>
                <div class="col-md-5">
                    <div class="mb-2"></div>
                    <h1 class="font-weight-bold">{{$course->course}}</h1>
                    <div class="fs-5 mb-2 mt-4">
                        قیمت:
                        <!--
                        <span class="text-decoration-line-through mr-5">{{number_format($course->fi)}} تومان</span>
                        -->
                        <p class="font-weight-bold d-inline">{{number_format($course->fi_off)}} تومان</p>
                    </div>

                    <div>

                    </div>
                    <div>
                        <p>
                            مدت زمان دوره (ساعت):
                            <span class="font-weight-bold">{{$course->duration}}  ساعت</span>
                        </p>
                    </div>
                    <div>
                        <p>
                            مدت دوره (روز/هفته/ماه):
                            <span class="font-weight-bold">{{$course->duration_date}}</span>
                        </p>
                    </div>
                    <div>
                        <p>
                            تاریخ شروع دوره:
                            <span class="font-weight-bold">{{$course->start}}</span>
                        </p>
                    </div>
                    <div>
                        <p>
                            تاریخ اتمام دوره:
                            <span class="font-weight-bold">{{$course->end}}</span>
                        </p>
                    </div>
                    <div class="d-flex mt-5 mb-5">
                        <div class="row">
                            @if(!Auth::check())
                                @include('loginAjax')
                            @elseif($course->type_peymant_id==1 || $course->type_peymant_id==3)
                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <form method="post" action="/cart">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$course->id}}" name="product_id" />
                                            <input type="hidden" value="course" name="type" />
                                            <button class="btn btn-outline-primary" type="submit">
                                                <i class="bi-cart-fill me-1"></i>
                                                خرید / اقساط
                                            </button>
                                            <p class="font-weight-bold">میزان {{$course->peymant_off}}% تخفیف در صورت پرداخت نقدی </p>
                                        </form>
                                    </div>
                                </div>

                                <div class="card mt-4" >
                                    <div class="card-body">
                                        <h5>لینک دعوت اختصاصی شما</h5>
                                        <p class="text-light bg-secondary p-2 text-right"  id="personal_link" dir="ltr">{{asset('/courses/'.$course->shortlink)."?q=".Auth::user()->id}}</p>
                                    </div>
                                </div>
                            @endif


                            @if($course->type_peymant_id==2 || $course->type_peymant_id==3)
                                <div class="col-12">

                                </div>
                            @endif
                        </div>


                    </div>
                </div>
                <div class="col-12 mt-5">
                    <p class="font-weight-bold">توضیحات:</p>
                    {!! $course->infocourse !!}
                </div>
            </div>
        </div>
    </section>
@endsection


@section('footerScript')
    <script>
        const prepayment={{$course->prepayment}};
        const peymant_off={{$course->peymant_off}};
        const fi={{$course->fi_off}};
        const tedadGhest={{$tedadGhest}};

        function mohasebe()
        {

            var payment=$("#prepayment").val();
            if(payment>=prepayment && payment<=fi)
            {
                var ghest=$("#ghest").val();
                if(ghest>=1 && ghest<=tedadGhest)
                {
                    $('#faktor').attr('class','col-12');
                    $("#prepaymant_faktor").html(payment+" تومان ");
                    var fi_final_checkout=payment-((payment*peymant_off)/100);
                    var baghimandeh=fi-fi_final_checkout;
                    $("#baghimandeh_faktor").html(baghimandeh+" تومان ");
                    $("#fi_takhfif").html(fi_final_checkout + " تومان ");
                    var ghestha=(baghimandeh/ghest).toFixed(2);
                    $("#ghest_faktor").html("تعداد "+ghest+" قسط به مبلغ "+ghestha+" تومان ");
                    return true;

                }
                else
                {
                    alert('تعداد اقساط را وارد کنید');
                    $('#faktor').attr('class','col-12 d-none');
                }


            }
            else
            {
                alert('قیمت وارد شده صحیح نمی باشد');
                $('#faktor').attr('class','col-12 d-none');
            }
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




        $("#personal_link").click(function()
        {
            navigator.clipboard.writeText($('#personal_link').text());
            alert('لینک دعوت اختصاصی شما کپی شد');
        });
    </script>
@endsection
