@extends('admin.master.index')
@section('content')
    <div class="col-12 table-responsive">
        <a href="/admin/coupon/create" class="btn btn-primary mb-1">کوپن جدید <i class="fas fa-plus-circle"></i></a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">کوپن</th>
                <th scope="col">تاریخ انقضا</th>
                <th scope="col">نوع محصول</th>
                <th scope="col">تعداد</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>

            @foreach($coupons as $item)
                <tr>
                    <td>
                        {{$item->coupon}}
                    </td>
                    <td>
                        {{$item->expire_date}}
                    </td>
                    <td>{{$item->product}}</td>
                    <td>{{$item->count}}</td>
                    <td>
                        <a class="btn btn-warning" href="/panel/coupon/{{$item->id}}/edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/panel/coupon/{{$item->id}}" onsubmit="return confirm('آیا از حذف کوپن تخفیف مطمئن هستید؟');">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button  class="btn btn-danger" type="submit">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$coupons->links()}}
    </div>
@endsection
