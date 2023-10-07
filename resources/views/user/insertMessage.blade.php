@extends('user.master.index')
@section('content')
    <div class="col-12">
        <form method="POST" action="/panel/message" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="type" value="ticket" />
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <div class="controls">
                            <label>موضوع</label>
                            <input type="text" id="subject" name="subject" class="form-control text-left" required placeholder="موضوع " value="" dir="ltr" />
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>بخش <span class="text-danger">*</span></label>
                        <select class="form-control" name="user_id_recieve">
                            <option value="3">فروش</option>
                            <option value="6">پشتیبانی سایت</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>متن پیام، انتقاد یا پیشنهاد</label>
                        <textarea class="form-control" id="comment" name="comment" required rows="3" placeholder="توضیح خود را وارد کنید ..."></textarea>
                    </div>
                </div>
                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">ثبت نظر</button>
                    <button type="reset" class="btn btn-light mb-1">انصراف</button>
                </div>
            </div>
        </form>
    </div>
@endsection
