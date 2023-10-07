@extends('user.master.index')

@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12 table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>محصول</th>
                <th>تاریخ ایجاد </th>
                <th>موعد پرداخت</th>
                <th>قیمت(تومان)</th>
                <th>وضعیت</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($faktors as $item)
                <tr class="border @if(($dateNow>$item->date_faktor)&&($item->status==0)) table-danger @elseif($item->status==1) table-success @endif" >
                    <td>{{$loop->iteration}}</td>
                    <td>
                        @if($item->type=='course')
                            {{($item->course['course'])}}
                        @endif
                    </td>
                    <td>{{$item->date_createfaktor}}</td>
                    <td>{{$item->date_faktor}}</td>
                    <td>{{number_format($item->fi)}}</td>
                    <td>
                        @if($item->status==0)
                            پرداخت نشده
                        @else
                            تسویه شد
                        @endif
                    </td>
                    <td class="text-center">
                        @if($item->status==0)
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">روش پرداخت</label>
                                <select class="form-control frm_pardakht_select" id="exampleFormControlSelect1" onchange="frm_pardakht_select(this.value)">
                                    <option selected disabled>انتخاب کنید</option>
                                    <option value="frm_pardakht{{$item->id}}"> پرداخت از درگاه</option>
                                    <option value="frm_wallet{{$item->id}}">پرداخت با کیف پول</option>
                                </select>
                            </div>


                            <form class="collapse pardakht" method="post" action="/panel/faktor/checkout/pardakhtaghsat" id="frm_pardakht{{$item->id}}">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$item->id}}" name="faktor_id" />
                                <input type="submit" class="btn btn-primary btn-sm" value="هدایت به درگاه" />
                            </form>

                            <form class="collapse wallet" method="post" action="/panel/faktor/checkout/pardakhtaghsat" id="frm_wallet{{$item->id}}">
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
            </tbody>
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

    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
