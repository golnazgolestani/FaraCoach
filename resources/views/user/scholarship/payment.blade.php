@if(!is_null($scholarship->financial))
    <div class="col-12 mx-auto table-responsive">
        <div class="alert alert-success">
            {{Auth::user()->fname.' '.Auth::user()->lname}} عزیز شما با کد رهگیری {{$scholarship->financial}} پیش پرداخت دوره را انجام داده اید.
        </div>
        <table class="table  table-striped table-hover table-bordered">
            <tr class="text-center">
                <th>دوره</th>
                <th>قیمت دوره</th>
                <th>وام</th>
                <th>امتیاز بورسیه</th>
                <th>واریزی (تومان) </th>
                <th>پرداخت نقدی</th>
                <th>مبلغ همکاری</th>
                <th>تاریخ ثبت نام</th>
                <th>ساعت ثبت نام</th>
                <th>پیگیری</th>
            </tr>
            <tr class="text-center">
                <td>{{$scholarship->get_financial->scholarship_course->course}}</td>
                <td>{{number_format($scholarship->get_financial->schoalrshipPayment->fi)}}</td>
                <td>%{{$scholarship->get_financial->schoalrshipPayment->loan}}</td>
                <td>%{{$scholarship->get_financial->schoalrshipPayment->score}}</td>
                <td>{{number_format($scholarship->get_financial->schoalrshipPayment->pre_payment)}}</td>
                <td>{{number_format($scholarship->get_financial->schoalrshipPayment->remaining)}}</td>
                <td>{{number_format(($scholarship->get_financial->schoalrshipPayment->fi*$scholarship->get_financial->schoalrshipPayment->score)/100) }}</td>
                <td>{{$scholarship->get_financial->schoalrshipPayment->date_fa}}</td>
                <td>{{$scholarship->get_financial->schoalrshipPayment->time_fa}}</td>
                <td>{{$scholarship->financial}}</td>
            </tr>
        </table>

    </div>
@else
<div class="row">
    <div class="col-12 border shadow shadow-sm mb-3">
        <p>{{Auth::user()->fname.' عزیز '}} ،  بابت رسیدن  به این  مرحله از بورسیه  بهت  تبریک  میگیم .</p>
        <p class="text-justify">هر کدوم از مراحل بورسیه شامل یک امتیاز مشخص هست که با تکمیل پروفایل ، حضور در دوره آموزشی ، انجام آزمون ، ارسال معرفی نامه و معرفی دوستان به بورسیه و در نهایت مصاحبه، امتیاز مد نظر رو کسب کردی . </p>
        <p class="text-justify">جدول زیر نشون دهنده امتیازی هست که تو از بورسیه بدست آوردی و مطابق با اون از تخفیف ویژه دوره برخوردار شدی . </p>
        <ul>
            <li>در جدول، مبلغ پایه دوره قیمت اولیه ست .</li>
            <li>ستون امتیاز بورسیه شامل مجموع امتیازاتی ست که از تمام مراحل بورسیه کسب کردین .</li>
            <li>مبلغ نهایی شامل هزینه ای است که شما برای ثبت نام دوره متناسب با درصد کسب شده از بورسیه ، پرداخت میکنین .</li>
        </ul>
        <p class="text-justify">و نهایتا ستون پیش پرداخت که پرداخت اولیه شماست و پرداخت دوم که یک ماه بعد از پرداخت اولیه انجام میشه .</p>
        <p class="text-justify font-weight-bold">توجه : وام بلاعوض صندوق شکوفایی موسسه به افرادی تعلق میگیره که امتیاز بورسیه بالای 50 درصد رو کسب کردن و معادل 10 درصد ، از تعهد همکاری کسر میشه .</p>
        <p>برای تکمیل این مرحله و ثبت نام قطعی در دوره ، با انتخاب گزینه پیش پرداخت ، واریز اولیه رو انجام بده تا به عنوان یکی از پذیرفته شدگان طرح بورسیه رزروت قطعی بشه .</p>
        <p>به دلیل مشکلات ناشی از قطعی اینترنت  برنامه هامون کمی با  تاخیر مواجه شد  که  مطمئنا درک میکنی ،  اما صمیمانه و با افتخار در کنارت هستیم.</p>


    </div>
    <div class="col-12 col-md-6  mx-auto text-center">
        <div class="alert alert-success">
            تبریک وام بلاعوض صندوق فراکوچ به شما تعلق گرفته است . جهت اطلاع، این مبلغ از میزان تعهد همکاری شما کسر میگردد.برای اطلاعات بیشتر بر روی جزئیات پرداخت کلیک کنید.
        </div>
    </div>
    <div class="col-12 table-responsive">

        @if(Auth::user()->scholarship->type_payment==0)
            <table class="table table-striped  table-bordered text-center">
                <tr>
                    <td colspan="3" class="p-2">اطلاعات دوره</td>
                    <td colspan="7" class="p-2">محاسبه بورسیه</td>
                </tr>
                <tr>
                    <th>عنوان دوره</th>
                    <th>نحوه برگزاری</th>
                    <th>مدرس</th>
                    <th >مبلغ پایه</th>
                    <th >امتیاز بورسیه</th>
                    <th>ارزش بورسیه</th>
                    <th>سهم پرداخت نقدی</th>
                    <th>پیش پرداخت</th>
                    <th>قسط دوم</th>
                    <th>موعد قسط دوم</th>
                    <th>جزئیات</th>
                </tr>

                @if(!is_null($courses))
                    @foreach($courses as $item)
                        <tr @if($item->type_course==2) class="text-primary" @endif >
                            <td class="text-center">
                                <a href="#"  data-toggle="modal" data-target="#ModalPaymentCourseScholarship{{$item->id}}">
                                {{$item->course}}
                                </a>
                                <!-- Modal courses -->
                                <div class="modal fade" id="ModalPaymentCourseScholarship{{$item->id}}" tabindex="-1" aria-labelledby="ModalPaymentCourseScholarship{{$item->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">اطلاعات دوره</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{(asset('/documents/'.$item->image))}}" class="img-fluid" />
                                                            <table class="table table-bordered">
                                                                <tr class="">
                                                                    <td>دوره</td>
                                                                    <td>
                                                                        {{$item->course}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>مدرس</td>
                                                                    <td>{{$item->teacher->fname.' '.$item->teacher->lname}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>نحوه برگزاری</td>
                                                                    <td>
                                                                        @if($item->type_course==1)
                                                                            انلاین
                                                                        @elseif($item->type_course==2)
                                                                            حضوری
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>طول دوره</td>
                                                                    <td>{{$item->duration_date}} ساعت </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>تاریخ شروع دوره</td>
                                                                    <td>
                                                                        {{$item->start}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ساعت کلاس</td>
                                                                    <td>
                                                                        {{$item->course_days}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ساعت برگزاری</td>
                                                                    <td>{{$item->course_times}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">
                                @if($item->type_course==1)
                                    انلاین
                                @elseif($item->type_course==2)
                                    حضوری
                                @endif

                            </td>
                            <td>
                                {{$item->teacher->fname.' '.$item->teacher->lname}}
                            </td>
                            <td class ="text-center" >
                                {{number_format($item->fi_off)}}
                            </td>
                            <td class="text-center" style="background-color:  #9fff80;">
                                {{$result_final}}%
                            </td>
                            <td style="background-color:  #9fff80;">
                                {{number_format(($item->fi_off*$result_final)/100) }}
                            </td>
                            <td>
                                @php
                                    $gheymat_nahaei=($item->fi_off-(($item->fi_off*$result_final)/100));
                                @endphp

                                {{number_format($gheymat_nahaei)}}
                            </td>
                            <td class="text-center">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">روش پرداخت</label>
                                    <select class="form-control frm_pardakht_select" id="exampleFormControlSelect1" onchange="frm_pardakht_select(this.value)">
                                        <option selected disabled>انتخاب کنید</option>
                                        <option value="frm_pardakht{{$item->id}}"> پرداخت از درگاه</option>
                                        <option value="frm_wallet{{$item->id}}">پرداخت با کیف پول</option>
                                    </select>
                                </div>

                                <form class="collapse pardakht"  method="post" action="/panel/scholarship_payment" id="frm_pardakht{{$item->id}}" >
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$item->id}}" name="course_id" />
                                    <button class="btn btn-success btn-block">{{number_format(5000000)}} <br/>هدایت به درگاه  </button>
                                </form>

                                <form class="collapse wallet" method="post" action="/panel/scholarship_payment" id="frm_wallet{{$item->id}}">
                                    {{csrf_field()}}
                                    <input type="hidden" value="wallet" name="wallet" />
                                    <input type="hidden" value="{{$item->id}}" name="course_id" />
                                    @if(is_null(Auth::user()->wallet))
                                        <input type="submit" class="btn btn-primary btn-sm" value="0 تومان پرداخت با کیف پول" />
                                    @else

                                        <input type="submit" class="btn btn-primary btn-sm" value="{{number_format(Auth::user()->wallet->amount)}} تومان پرداخت با کیف پول" />
                                    @endif


                                </form>

                            </td>
                            <td class="text-center">
                                @php
                                    $pardakht_dovom=$gheymat_nahaei-5000000
                                @endphp
                                @if($pardakht_dovom<=0)
                                    @php
                                        $pardakht_dovom=0;
                                    @endphp
                                @endif
                                {{number_format($pardakht_dovom) }}
                            </td>
                            <td>
                                {{$nextMonth}}
                            </td>
                            <td>
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalPaymentCourse{{$item->id}}">جزئیات پرداخت</a>
                                <!-- Modal -->
                                <div class="modal fade" id="ModalPaymentCourse{{$item->id}}" tabindex="-1" aria-labelledby="ModalPaymentCourse{{$item->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">اطلاعات صندوق شکوفایی</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{(asset('/documents/'.$item->image))}}" class="img-fluid" />
                                                            @php
                                                                $boorsieh=($item->fi_off*$result_final)/100;
                                                            @endphp
                                                            <table class="table table-bordered">
                                                                <tr >
                                                                    <td class="p-2">مبلغ تعهد همکاری</td>
                                                                    <td class="p-2">{{number_format($boorsieh)}} تومان </td>
                                                                </tr>
                                                                <tr>
                                                                    @if($result_final<50)
                                                                        <td class="p-2" >کسر 0% وام صندوق شکوفایی فراکوچ به ارزش</td>
                                                                        <td class="p-2" >{{number_format(($item->fi_off*0)/100)  }} تومان </td>
                                                                    @else
                                                                        <td class="p-2" >کسر 10% وام صندوق شکوفایی فراکوچ به ارزش</td>
                                                                        <td class="p-2" >{{number_format(($item->fi_off*10)/100)  }} تومان </td>
                                                                    @endif

                                                                </tr>
                                                                <tr>
                                                                    <td class="p-2" >مبلغ نهایی تعهد همکاری</td>
                                                                    @if($result_final<50)
                                                                        <td class="p-2" >{{number_format($boorsieh-(($item->fi_off*0)/100))}} تومان</td>
                                                                    @else
                                                                        <td class="p-2" >{{number_format($boorsieh-(($item->fi_off*10)/100))}} تومان</td>
                                                                    @endif
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        @elseif(Auth::user()->scholarship->type_payment==1)
            <table class="table table-striped  table-bordered text-center">
                <tr>
                    <td colspan="3" class="p-2">اطلاعات دوره</td>
                    <td colspan="7" class="p-2">محاسبه بورسیه</td>
                </tr>
                <tr>
                    <th>عنوان دوره</th>
                    <th>نحوه برگزاری</th>
                    <th>مدرس</th>
                    <th>مبلغ پایه</th>
                    <th>امتیاز بورسیه</th>
                    <th>ارزش بورسیه</th>
                    <th>سهم پرداخت نقدی</th>
                    <th>پیش پرداخت</th>
                    <th>قسط دوم</th>
                    <th>موعد قسط دوم</th>
                    <th>قسط سوم</th>
                    <th>موعد قسط سوم</th>
                    <th>جزئیات</th>
                </tr>
                @if(!is_null($courses))
                    @foreach($courses as $item)
                        <tr>
                            <td class="text-center">
                                {{$item->course}}
                            </td>
                            <td class="text-center">
                                @if($item->type_course==1)
                                    انلاین
                                @elseif($item->type_course==2)
                                    حضوری
                                @endif

                            </td>
                            <td>
                                {{$item->teacher->fname.' '.$item->teacher->lname}}
                            </td>
                            <td class="text-center">
                                {{number_format($item->fi_off)}}
                            </td>
                            <td class="text-center">
                                {{$result_final}}%
                            </td>
                            <td>
                                {{number_format(($item->fi_off*$result_final)/100) }}
                            </td>
                            <td>
                                @php
                                    $gheymat_nahaei=($item->fi_off-(($item->fi_off*$result_final)/100));
                                @endphp

                                {{number_format($gheymat_nahaei)}}
                            </td>
                            <td class="text-center">
                                <form method="post" action="/panel/scholarship_payment">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$item->id}}" name="course_id" />
                                    <input type="hidden" value="1" name="type_payment" />
                                    <button class="btn btn-success btn-block">{{number_format(3500000)}} <br/>پرداخت کنید  </button>
                                </form>
                            </td>
                            <td class="text-center">
                                @php
                                    $pardakht_dovom=($gheymat_nahaei-3500000)/2
                                @endphp
                                @if($pardakht_dovom<=0)
                                    @php
                                        $pardakht_dovom=0;
                                    @endphp
                                @endif
                                {{number_format($pardakht_dovom) }}
                            </td>
                            <td>
                                {{$nextMonth}}
                            </td>
                            <td class="text-center">
                                @php
                                    $pardakht_dovom=($gheymat_nahaei-3500000)/2
                                @endphp
                                @if($pardakht_dovom<=0)
                                    @php
                                        $pardakht_dovom=0;
                                    @endphp
                                @endif
                                {{number_format($pardakht_dovom) }}
                            </td>
                            <td>
                                {{$secondMonth}}
                            </td>
                            <td>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#ModalPaymentCourse{{$item->id}}">جزئیات پرداخت</a>
                                <!-- Modal -->
                                <div class="modal fade" id="ModalPaymentCourse{{$item->id}}" tabindex="-1" aria-labelledby="ModalPaymentCourse{{$item->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">اطلاعات صندوق شکوفایی</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{(asset('/images/'.$item->image))}}" class="img-fluid" />
                                                            @php
                                                                $boorsieh=($item->fi_off*$result_final)/100;
                                                            @endphp
                                                            <table class="table table-bordered">
                                                                <tr >
                                                                    <td class="p-2">مبلغ تعهد همکاری</td>
                                                                    <td class="p-2">{{number_format($boorsieh)}} تومان </td>
                                                                </tr>
                                                                <tr>
                                                                    @if($result_final<50)
                                                                        <td class="p-2" >کسر 0% وام صندوق شکوفایی فراکوچ به ارزش</td>
                                                                        <td class="p-2" >{{number_format(($item->fi_off*0)/100)  }} تومان </td>
                                                                    @else
                                                                        <td class="p-2" >کسر 10% وام صندوق شکوفایی فراکوچ به ارزش</td>
                                                                        <td class="p-2" >{{number_format(($item->fi_off*10)/100)  }} تومان </td>
                                                                    @endif

                                                                </tr>
                                                                <tr>
                                                                    <td class="p-2" >مبلغ نهایی تعهد همکاری</td>
                                                                    @if($result_final<50)
                                                                        <td class="p-2" >{{number_format($boorsieh-(($item->fi_off*0)/100))}} تومان</td>
                                                                    @else
                                                                        <td class="p-2" >{{number_format($boorsieh-(($item->fi_off*10)/100))}} تومان</td>
                                                                    @endif
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>

        @elseif(Auth::user()->scholarship->type_payment==2)

            <table class="table table-striped  table-bordered text-center">
                <tr>
                    <td colspan="3" class="p-2">اطلاعات دوره</td>
                    <td colspan="7" class="p-2">محاسبه بورسیه</td>
                </tr>
                <tr>
                    <th>عنوان دوره</th>
                    <th>نحوه برگزاری</th>
                    <th>مدرس</th>
                    <th>مبلغ پایه</th>
                    <th>امتیاز بورسیه</th>
                    <th>ارزش بورسیه</th>
                    <th>سهم پرداخت نقدی</th>
                    <th>پیش پرداخت</th>
                    <th>مبلغ اقساط</th>
                    <th>موعد قسط اول</th>
                    <th>موعد قسط دوم</th>
                    <th>موعد قسط سوم</th>
                    <th>موعد قسط چهارم</th>
                    <th>موعد قسط پنجم</th>
                    <th>جزئیات</th>
                </tr>
                @if(!is_null($courses))
                    @foreach($courses as $item)
                        <tr>
                            <td class="text-center">
                                {{$item->course}}
                            </td>
                            <td class="text-center">
                                @if($item->type_course==1)
                                    انلاین
                                @elseif($item->type_course==2)
                                    حضوری
                                @endif

                            </td>
                            <td>
                                {{$item->teacher->fname.' '.$item->teacher->lname}}
                            </td>
                            <td class="text-center">
                                {{number_format($item->fi_off)}}
                            </td>
                            <td class="text-center">
                                {{$result_final}}%
                            </td>
                            <td>
                                {{number_format(($item->fi_off*$result_final)/100) }}
                            </td>
                            <td>
                                @php
                                    $gheymat_nahaei=($item->fi_off-(($item->fi_off*$result_final)/100));
                                @endphp
                                {{number_format($gheymat_nahaei)}}
                            </td>
                            <td class="text-center">
                                <form method="post" action="/panel/scholarship_payment">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$item->id}}" name="course_id" />
                                    <input type="hidden" value="2" name="type_payment" />
                                    <button class="btn btn-success btn-block">{{number_format(2000000)}} <br/>پرداخت کنید  </button>
                                </form>
                            </td>
                            <td class="text-center">
                                @php
                                    $pardakht_dovom=($gheymat_nahaei-2000000)/5
                                @endphp
                                @if($pardakht_dovom<=0)
                                    @php
                                        $pardakht_dovom=0;
                                    @endphp
                                @endif
                                {{number_format($pardakht_dovom) }}
                            </td>
                            @foreach($secondMonth as $itemMonth)
                                <td>
                                    {{$itemMonth}}
                                </td>
                            @endforeach




                            <td>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#ModalPaymentCourse{{$item->id}}">جزئیات پرداخت</a>
                                <!-- Modal -->
                                <div class="modal fade" id="ModalPaymentCourse{{$item->id}}" tabindex="-1" aria-labelledby="ModalPaymentCourse{{$item->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">اطلاعات صندوق شکوفایی</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{(asset('/images/'.$item->image))}}" class="img-fluid" />
                                                            @php
                                                                $boorsieh=($item->fi_off*$result_final)/100;
                                                            @endphp
                                                            <table class="table table-bordered">
                                                                <tr >
                                                                    <td class="p-2">مبلغ تعهد همکاری</td>
                                                                    <td class="p-2">{{number_format($boorsieh)}} تومان </td>
                                                                </tr>
                                                                <tr>
                                                                    @if($result_final<50)
                                                                        <td class="p-2" >کسر 0% وام صندوق شکوفایی فراکوچ به ارزش</td>
                                                                        <td class="p-2" >{{number_format(($item->fi_off*0)/100)  }} تومان </td>
                                                                    @else
                                                                        <td class="p-2" >کسر 10% وام صندوق شکوفایی فراکوچ به ارزش</td>
                                                                        <td class="p-2" >{{number_format(($item->fi_off*10)/100)  }} تومان </td>
                                                                    @endif

                                                                </tr>
                                                                <tr>
                                                                    <td class="p-2" >مبلغ نهایی تعهد همکاری</td>
                                                                    @if($result_final<50)
                                                                        <td class="p-2" >{{number_format($boorsieh-(($item->fi_off*0)/100))}} تومان</td>
                                                                    @else
                                                                        <td class="p-2" >{{number_format($boorsieh-(($item->fi_off*10)/100))}} تومان</td>
                                                                    @endif
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        @endif

    </div>


</div>
@endif



