@extends('panelUser.master.index')
@section('rowcontent')
    <div class="col-12 table-responsive">
        <a href="/panel/coupon/create" class="btn btn-primary">کوپن جدید <i class="fas fa-plus-circle"></i></a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">کوپن</th>
                <th scope="col">تاریخ انقضا</th>
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
                    <td>{{$item->count}}</td>
                    <td>
                        <a class="btn btn-warning" href="/panel/coupon/{{$item->id}}/edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/panel/coupon/{{$item->id}}" onsubmit="return confirm('آیا از حذف کوپن تخفیف مطمئن هستید؟');">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button  class="btn btn-danger" type="submit">
                                <i class="fas fa-trash"></i>
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
