@extends('user.master.index')

@section('headerScript')
    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />





    <style>
        .card-counter{
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover{
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary{
            background-color: #99caff;
            color: #000000;
        }

        .card-counter.danger{
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success{
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info{
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter.warning{
            background-color: #ffff99;
            color: #FFF;
        }

        .card-counter i{
            font-size: 5em;
            opacity: 0.2;
        }

        .card-counter .count-numbers{
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 25px;
            display: block;
        }

        .card-counter .count-name{
            position: absolute;
            right: 35px;
            top: 65px;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 18px;
        }
    </style>
@endsection
@section('content')

    <div class="col-md-3 mb-3">
        <div class="card-counter primary">
            <span class="count-numbers text-dark">
                @if(is_null(Auth::user()->wallet))
                    0
                @else
                    {{number_format(Auth::user()->wallet->amount)}}
                @endif
                تومان
            </span>
            <span class="count-name text-dark"> موجودی کیف</span>
        </div>
        <form method="post" action="/panel/order">
            {{csrf_field()}}
            <input type="hidden" value="کیف پول" name="payment_type" />
            <div class="form-group">
                <label for="amount">مبلغ شارژ:</label>
                <input type="number" class="form-control" id="amount" name="amount" />
                <small class="text-muted">به تومان وارد کنید</small>
            </div>
            <button type="submit" class="btn btn-primary">شارژ کیف پول</button>
        </form>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered table-striped table-hover text-center" id="dataTable">
            <thead>
                <tr>
                    <td>نوع تراکنش</td>
                    <td>مبلغ</td>
                    <td>مانده کیف پول</td>
                    <td>محصول مرتبط</td>
                    <td>توضیحات</td>
                    <td>تاریخ</td>
                    <td>ساعت</td>
                    <td>شماره تراکنش</td>
                    <td>کد تراکنش</td>
                </tr>
            </thead>
            <tbody>
                @if(!is_null(Auth::user()->wallet))
                    @foreach( Auth::user()->wallet->wallet_transactions as $transaction)
                        <tr>
                            <td>{{$transaction->status()}}</td>
                            <td>{{number_format($transaction->amount) }} تومان </td>
                            <td>{{number_format($transaction->inventory) }}</td>
                            <td>{{$transaction->product_id}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->date_fa}}</td>
                            <td>{{$transaction->time_fa}}</td>
                            <td>{{$transaction->authority}}</td>
                            <td>{{$transaction->checkout_id}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection


@section('footerScript')
    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('/panel_assets/js/scripts/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/buttons.print.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        } );
    </script>
@endsection
