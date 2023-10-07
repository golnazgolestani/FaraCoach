<div class="card card-user">
    <div class="card-header bg-info">
        <h5 class="card-title">پیگیری جدید</h5>
    </div>
    <div class="card-body">

        <form method="POST" action="/panel/followup/create" >
            {{csrf_field()}}
                <div class="row">
                    <input type="hidden" name="insert_user_id" value="{{$userInsert->id}}" />
                    <input type="hidden" name="user_id" value="{{$user->id}}"/>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label>محصول در حال پیگیری</label>
                            <select class="form-control p-0" id="course_id" name="course_id" >
                                <option disabled="disabled" selected >وضعیت را انتخاب کنید</option>
                                @foreach($courses as $item)
                                    <option  value="{{$item->id}}" @if (old('course_id') == $item->id) selected @endif>
                                        {{$item->course}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label>نتیجه پیگیری</label>
                            <select class="form-control p-0" id="exampleFormControlSelect1" name="status_followups" >
                                <option disabled="disabled" selected >وضعیت را انتخاب کنید</option>
                                <option  value="11" @if (old('status_followups') == '11') selected @endif>تور پیگیری</option>
                                <option  value="12" @if (old('status_followups') == '12') selected @endif> کنسل شد</option>
                                <option  value="13" @if (old('status_followups') == '13') selected @endif>در انتظار تصمیم</option>
                                <option  value="14" @if (old('status_followups') == '14') selected @endif>عدم پاسخگویی</option>
                                <option  value="20" @if (old('status_followups') == '15') selected @endif>مشتری</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label>کیفیت سنجی مشتری</label>
                            <select class="form-control p-0" id="exampleFormControlSelect1" name="followup" >
                                <option disabled="disabled" selected >نتیجه را مشخص کنید</option>
                                @foreach($problemFollowup as $item)
                                    <option value="{{$item->id}}"  @if (old('followup') == $item->id) selected @endif >{{$item->problem}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>مدت تماس (دقیقه)</label>
                            <input type="number" class="form-control"  id="talktime"  name="talktime" value="{{old('talktime')}}" />
                        </div>
                    </div>
                    <div class="col-md-8 px-1">
                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea class="form-control textarea"  lang="fa" name="comment"></textarea>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-4 pl-1">
                    <div class="form-group">
                        <label>تاریخ پیگیری</label>
                        <input type="text" class="form-control"  id="dateFollow"  name="date_fa" />
                    </div>
                </div>
                <div class="col-md-4 px-1">
                    <div class="form-group">
                        <label>ساعت پیگیری</label>
                        <input type="text" class="form-control" value="" name="time_fa" id="time_fa" />
                    </div>
                </div>
                <div class="col-md-4 pl-1">
                    <div class="form-group">
                        <label>تاریخ پیگیری بعد</label>
                        <input type="text" class="form-control"  value="" name="nextfollowup_date_fa" id="nextfollowup_date_fa" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-1">
                    <div class="form-group">
                        <div class="form-group row mb-0">
                            <label for="sendSMS" class="col-md-4 col-form-label text-md-right  text-dark">ارسال پیامک</label>
                            <div class="col-md-6 mr-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sms" id="sendsms1" value="0" checked>
                                    <label class="form-check-label  text-dark" for="sendsms1">
                                        ارسال نشود
                                    </label>
                                </div>
                                <div class="form-check">
                                    @foreach($settingsms as $item)
                                        <input class="form-check-input" type="radio" name="sms" id="sendsms{{$item->id}}" value="{{$item->comment}}" >
                                        <label class="form-check-label  text-dark" for="sendsms{{$item->id}}">{!! $item->comment !!}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="update m-auto m-auto">
                    <button type="submit" class="btn btn-primary btn-round">ثبت پیگیری</button>
                </div>
            </div>
        </form>
    </div>
</div>
