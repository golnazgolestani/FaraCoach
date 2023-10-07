<table class="table table-bordered table-striped table-hover text-center" style="line-height: 2">
    <tr>
        <th>اطلاعات بورسیه</th>
        <th>مبلغ (تومان)</th>
    </tr>
    <tr class="text-center">
        <td>مبلغ بورسیه</td>
        <td>
            @if(!is_null($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                <span id="collabration_fi">{{number_format(
                                            ($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*
                                            ($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)
                                            }}</span>
            @endif
        </td>
    </tr>
    <tr class="text-center">
        <td>وام صندوق شکوفایی</td>
        <td>

            @if(!is_null($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                %{{($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)}}
            @endif
        </td>
    </tr>
    <tr class="text-center">
        <td>کل (مانده بورسیه)</td>
        <td>
            @if(!is_null($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                <span id="collabration_fi">{{number_format((($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)-(($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*(($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)* ($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)/100))}}</span>
            @endif
        </td>
    </tr>
    <tr class="text-center">
        <td>حداقل اعلام همکاری</td>
        <td>
            @if(!is_null($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()))
                <span id="collabration_fi">{{number_format(((($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)-(($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*(($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)*       ($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)/100))+(((($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)-(($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*(($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)*       ($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)/100))/2))}}</span>
            @endif
        </td>
    </tr>
    <tr class="text bg-success">
        <td>مبلغ تسویه شده</td>
        <td>

            @if(is_null($scholarship->user->faktors->where('status','=',2)))
                0 تومان
            @else
                {{number_format($scholarship->user->faktors->where('status','=',2)->sum('fi'))}}
            @endif
        </td>
    </tr>
    <tr class="text bg-warning">
        <td>باقیمانده</td>
        <td>
            @if(is_null($scholarship->user->faktors->where('status','=',2)))
            {{$scholarship->user->collabration_accept->sum('calculate')}} تومان
            @else
                {{number_format(((($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)-(($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->fi)*(($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->score)/100)* ($scholarship->user->checkouts->where('status','=',1)->where('type','=','scholarship_payment')->last()->schoalrshipPayment->loan)/100))-$scholarship->user->faktors->where('status','=',2)->sum('fi'))}}
            @endif
        </td>
    </tr>
</table>




