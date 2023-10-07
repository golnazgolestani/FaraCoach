@extends('admin.master.index')
@section('content')
    <!--
    <div class="col-12 mb-2">
        <p>وضعیت تیکت</p>
        <div class="btn-group" role="group" aria-label="Basic example">
            <form method="get" action="#1">
                <button type="submit" class="btn btn-info">در حال بررسی</button>
            </form>
            <form method="get" action="#2">
                <button type="submit" class="btn btn-danger">بسته شده</button>
            </form>
        </div>
    </div>
    -->
    <div class="col-12">
        @foreach($messages as $item)
            <div class="form-group @if($item->user_id_send==Auth::user()->type || $item->user_id_send==Auth::user()->id) bg-success @else bg-warning @endif  pb-1 ">

                @if($item->user_id_send==Auth::user()->type || $item->user_id_send==Auth::user()->id)
                    <label for="comment"> پیام ارسال شده شده:</label>
                @else
                    <label for="comment"> پیام دریافت شده:</label>
                @endif
                <textarea class="form-control bg-secondary-light" id="comment" name="comment" rows="10" disabled readonly>{{$item->comment }}</textarea>
                <small class="font-weight-bold float-right text-dark">{{$item->time_fa.' '.$item->date_fa}}</small>
            </div>
        @endforeach
        <form method="post" action="/admin/message/reply">
            {{csrf_field()}}
            <input type="hidden" value="ticket" name="type">
            <input type="hidden" value="{{($messages[0]->id)}}" name="message_id_answer">
            <div class="col-12">
                <label>متن پاسخ</label>
                <textarea class="form-control" id="comment" name="comment" required rows="3" placeholder="توضیح خود را وارد کنید ..."></textarea>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">ثبت نظر</button>
            </div>
        </form>
    </div>


@endsection
