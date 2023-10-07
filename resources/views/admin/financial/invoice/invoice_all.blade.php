@extends('admin.master.index')

@section('content')
    <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered text-center">
            <tr>
                <th>مشخصات</th>
                <th>محصول</th>
                <th>قیمت</th>
                <th>تخفیف</th>
                <th>بورسیه</th>
                <th>قیمت نهایی</th>
                <th>پیش پرداخت</th>
                <th>باقیمانده</th>
                <th>تعداد قسط</th>
                <th>قیمت قسط</th>
                <th>حذف</th>
            </tr>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{($invoice->user->fname.' '.$invoice->user->lname)}}</td>
                    <td>{{($invoice->course->course)}}</td>
                    <td>{{number_format($invoice->fi)}}</td>
                    <td>{{($invoice->off)}}</td>
                    <td>{{($invoice->score)}}</td>
                    <td>{{number_format($invoice->fi_final)}}</td>
                    <td>{{number_format($invoice->pre_payment)}}</td>
                    <td>{{number_format($invoice->remaining)}}</td>
                    <td>{{($invoice->count_installment)}}</td>
                    <td>{{number_format($invoice->fi_installment)}}</td>
                    <td>
                        <form method="post" action="/admin/invoice/{{$invoice->id}}" onsubmit="return window.confirm('ایا از حذف پیش فاکتور اطمینان دارید؟')">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
