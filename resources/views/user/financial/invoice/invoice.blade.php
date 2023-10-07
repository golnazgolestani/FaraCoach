@extends('user.master.index')
@section('content')
    <div class="col-12 table-responsive">
        <table class="table text-center">
            <tr>
                <th>#</th>
                <th>دوره</th>
                <th>قیمت دوره</th>
                <th>تخفیف</th>
                <th>امتیاز بورسیه</th>
                <th>قیمت نهایی</th>
                <th>پیش پرداخت</th>
                <th>تعداد قسط</th>
                <th>مبلغ هر قسط</th>
                <th></th>
            </tr>

            @foreach(Auth::user()->invoice as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{($item->course->course)}}</td>
                <td>{{number_format($item->fi)}}</td>
                <td>{{($item->off)}}%</td>
                <td>{{($item->score)}}</td>
                <td>{{number_format($item->fi_final)}}</td>
                <td>{{number_format($item->pre_payment)}} تومان</td>
                <td>{{$item->count_installment}}</td>
                <td>{{number_format($item->fi_installment)}} تومان</td>
                <td>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">روش پرداخت</label>
                        <select class="form-control frm_pardakht_select" id="exampleFormControlSelect1" onchange="frm_pardakht_select(this.value)">
                            <option selected disabled>انتخاب کنید</option>
                            <option value="frm_pardakht{{$item->id}}"> پرداخت از درگاه</option>
                            <option value="frm_wallet{{$item->id}}">پرداخت با کیف پول</option>
                        </select>
                    </div>
                    @if($item->status==0)
                        <form class="collapse pardakht"  method="post" action="/panel/invoice/checkout/{{$item->id}}"  id="frm_pardakht{{$item->id}}" >
                            {{csrf_field()}}
                            <input type="hidden" value="{{$item->id}}" name="faktor_id" />
                            <input type="submit" class="btn btn-primary btn-sm" value="هدایت به درگاه" />
                        </form>

                        <form class="collapse wallet" method="post" action="/panel/invoice/checkout/{{$item->id}}" id="frm_wallet{{$item->id}}">
                            {{csrf_field()}}
                            <input type="hidden" value="wallet" name="wallet" />
                            <input type="hidden" value="{{$item->id}}" name="faktor_id" />
                            @if(is_null(Auth::user()->wallet))
                                0
                            @else

                                <input type="submit" class="btn btn-primary btn-sm" value="{{number_format(Auth::user()->wallet->amount)}} تومان پرداخت با کیف پول" />
                            @endif

                        </form>

                    @endif


                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('footerScript')
    <script>
        function frm_pardakht_select(val)
        {
            let pardakhts=document.querySelectorAll('.pardakht');
            pardakhts.forEach(function (item)
            {
                item.classList.remove('show');
            });

            let wallets=document.querySelectorAll('.wallet');
            wallets.forEach(function (item)
            {
                item.classList.remove('show');
            });
            let content=document.querySelector('#'+val);
            document.querySelector('#'+val).classList.add('show');
        }

    </script>
@endsection
