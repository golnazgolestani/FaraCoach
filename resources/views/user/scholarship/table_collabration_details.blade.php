<p class="text-center">اطلاعات زمینه همکاری شما تا زمان تایید نهایی قابل ویرایش و حذف شدن می باشد</p>
<table class="table caption-top table-bordered table-striped table-hover text-center" style="line-height: 2">
    <tr>
        <th>زمینه همکاری</th>
        <th>مبلغ (تومان)</th>
        <th>مهلت انجام</th>
        <th>ویرایش</th>
        <th>حذف</th>
        <th>وضعیت</th>
    </tr>

    @if(!is_null(Auth::user()->collabration_accept))
        @foreach(Auth::user()->collabration_accept as $item_collabration_accept)
            <tr>
                <td>
                    @if(Auth::user()->scholarship->collabration==0)
                        <button type='button' class="m-1 collabration_details_acceptEdit btn btn-outline-dark btn-sm" onclick="collabration_details_acceptEdit({{$item_collabration_accept->id}})"  >
                            @if(!is_null($item_collabration_accept->collabration_details))
                                {{($item_collabration_accept->collabration_details->title)}}
                            @else
                                نامشخص
                            @endif
                        </button>
                    @else
                        @if(!is_null($item_collabration_accept->collabration_details))
                            {{($item_collabration_accept->collabration_details->title)}}
                        @else
                            نامشخص
                        @endif
                    @endif
                </td>
                <td>{{number_format($item_collabration_accept->calculate)}}</td>
                <td>{{$item_collabration_accept->expire}}</td>
                <td>
                    @if($item_collabration_accept->status==0)
                        <button type='button' class="btn btn-warning " onclick="collabration_details_acceptEdit({{$item_collabration_accept->id}})" >
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    @endif
                </td>
                <td>
                    @if($item_collabration_accept->status==0)
                        <form method="post" action="/panel/collabration_accept/{{$item_collabration_accept->id}}" onsubmit="return (window.confirm('ایا از حذف زمینه همکاری اطمینان دارید؟'))">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger ">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    @endif
                </td>

                <td>
                    @if($item_collabration_accept->status==0)
                        در حال بررسی
                    @else
                        تائید
                    @endif
                </td>

            </tr>
        @endforeach
        <tr>
            <td>جمع مبلغ درخواست همکاری</td>
            <td>
                {{number_format(Auth::user()->collabration_accept->sum('calculate'))}}
            </td>
        </tr>

    @endif

</table>


<table class="table table-bordered table-striped table-hover text-center" style="line-height: 2">
    <tr>
        <th>اطلاعات بورسیه</th>
        <th>مبلغ (تومان)</th>
    </tr>
    <tr class="text-center">
        <td>مبلغ بورسیه</td>
        <td>
            @if(!is_null(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                <span id="collabration_fi">{{number_format(
                                            (Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*
                                            (Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)
                                            }}</span>
            @endif
        </td>
    </tr>
    <tr class="text-center">
        <td>وام صندوق شکوفایی</td>
        <td>

            @if(!is_null(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                %{{(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)}}
            @endif
        </td>
    </tr>
    <tr class="text-center">
        <td>مانده بورسیه</td>
        <td>
            @if(!is_null(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                <span id="collabration_fi">{{number_format(((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)-((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)*       (Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)/100))}}</span>
            @endif
        </td>
    </tr>
    <tr class="text-center">
        <td>حداقل اعلام همکاری</td>
        <td>
            @if(!is_null(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                <span id="collabration_fi">{{number_format((((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)-((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)*       (Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)/100))+((((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)-((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)*       (Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)/100))/2))}}</span>
            @endif
        </td>
    </tr>
    <tr class="text-center bg-success">
        <td>مبلغ تسویه شده</td>
        <td>
            @if(is_null(Auth::user()->faktors->where('status','=',2)))
                0 تومان
            @else

                {{number_format(Auth::user()->faktors->where('status','=',2)->sum('fi'))}} تومان
            @endif
        </td>
    </tr>
    <tr class="text-center bg-danger text-light">
        <td>مبلغ باقیمانده</td>
        <td>
            @if(is_null(Auth::user()->faktors->where('status','=',2)))
                0 تومان
            @else
                @if(!is_null(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                    {{number_format((((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*(Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)-((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*((Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)*       (Auth::user()->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)/100))-Auth::user()->faktors->where('status','=',2)->sum('fi'))}} تومان
                @else
                    0تومان
                @endif
            @endif
            
        </td>
    </tr>
</table>






