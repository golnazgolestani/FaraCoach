<div class="card card-user rounded">
    <div class="card-header bg-info">
        <h5 class="card-title">پیگیری جدید</h5>
    </div>
    <div class="card-body bg-secondary-light border-1 border-secondary">
        <form method="POST" action="/admin/followup/create" >
            {{csrf_field()}}
                <div class="row">
                    <input type="hidden" name="insert_user_id" value="{{$userAdmin->id}}" />
                    <input type="hidden" name="user_id" value="{{$user->id}}"/>
                    <div class="col-md-4 px-1">
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
                    <div class="col-12" >
                        @foreach($parentCategory as $item)
                            <a class="d-inline" data-toggle="collaps"  role="button" aria-expanded="false" aria-controls="collapseExample{{$item->id}}">
                                {{$item->category}}
                            </a>
                            <div id="collapseExample{{$item->id}}">
                                <div class="card card-body">
                                    <div class="form row">
                                        @foreach($tags as $tag)
                                            @if($tag->category_tags_id==$item->id)
                                                <div class="col-3 text-right">
                                                    <label class="form-check-label m-0 pr-0 float-left" for="tag{{$tag->id}}">{{$tag->tag}}</label>
                                                    <input class="form-check-input text-dark mr-2 " type="checkbox" value="{{$tag->id}}" id="tag{{$tag->id}}" name="tags[]" @if(is_array(old('tags')) && in_array($tag->id, old('tags'))) checked @endif  >
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                            <textarea class="form-control textarea"  lang="fa" name="comment">{{old('comment')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>نتیجه پیگیری</label>
                            <select class="form-control p-0" id="exampleFormControlSelect1" name="status_followups" >
                                <option disabled="disabled" selected >وضعیت را انتخاب کنید</option>
                                <option  value="11" @if (old('status_followups') == '11') selected @endif>تور پیگیری</option>
                                <option  value="12" @if (old('status_followups') == '12') selected @endif> کنسل شد</option>
                                <option  value="13" @if (old('status_followups') == '13') selected @endif>در انتظار تصمیم</option>
                                <option  value="14" @if (old('status_followups') == '14') selected @endif>عدم پاسخگویی</option>
                                <option  value="20" @if (old('status_followups') == '15') selected @endif>مشتری</option>
                                <option  value="-1" @if (old('status_followups') == '-1') selected @endif>مارکتینگ 1</option>
                                <option  value="-2" @if (old('status_followups') == '-2') selected @endif>مارکتینگ 2</option>
                                <option  value="-3" @if (old('status_followups') == '-3') selected @endif>مارکتینگ 3</option>
                                <option  value="30" @if (old('status_followups') == '30') selected @endif>جلسات</option>
                                <option  value="40" @if (old('status_followups') == '40') selected @endif>رویداد</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
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
                            <label>ارجاع پیگیری</label>
                            <select class="form-control p-0"  name="followby_expert" >
                                <option disabled="disabled" selected >نتیجه را مشخص کنید</option>
                                @foreach($expert_followup as $item)
                                    <option value="{{$item->id}}" @if($item->id==Auth::user()->id) selected @endif >@if((strlen($item->fname))||(strlen($item->lname))>0) {{$item->fname}} {{$item->lname}}@else{{$item->tel}}@endif</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>تاریخ پیگیری</label>
                            <input type="text" class="form-control"  id="dateFollow"  name="date_fa" value="{{$today}}" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>ساعت پیگیری</label>
                            <input type="text" class="form-control" value="{{$timeNow}}" name="time_fa" id="time_fa" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>تاریخ پیگیری بعد</label>
                            <input type="text" class="form-control"  value="{{$nextDayFollow}}" name="nextfollowup_date_fa" id="nextfollowup_date_fa" />
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

                                        @foreach($settingsms as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sms" id="sendsms{{$item->id}}" value="{{$item->comment}}" >
                                                <label class="form-check-label  text-dark" for="sendsms{{$item->id}}">{!! $item->comment !!}</label>
                                            </div>
                                        @endforeach

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
