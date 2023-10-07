@extends('user.master.index')
@section('headerScript')
    <style>
        .card-user .card-body
        {
            min-height: auto;
        }
    </style>
@endsection

@section('content')

    <div class="col-md-6">
        @if(is_null($reserve->presession))
            <div class="alert alert-warning">اطلاعات پیش از جلسه توسط مراجع تکمیل نشده است</div>
        @else
            <div class="card card-user ">
                <div class="card-header  bg-secondary">
                    <a class="btn m-0 p-0" data-toggle="collapse" href="#preSession" role="button" aria-expanded="false" aria-controls="preSession">
                       <h5 class="card-title m-0 p-0  text-light">اطلاعات پیش از جلسه</h5>
                    </a>
                </div>
                <div class="card-body collapse show bg-secondary-light border-secondary" id="preSession">
                    <div class="form-group">
                        <label for="presession">توضیحی کوتاه درباره موضوع این جلسه و مباحث آن </label>
                        <textarea class="form-control" id="presession"   rows="3" disabled readonly>{{$reserve->presession}}</textarea>
                    </div>
                </div>
            </div>
        @endif
        @if($reserve->booking->start_date<$dateNow)
            <div class="card card-user">
                <div class="card-header bg-secondary">
                    <a class="btn m-0 p-0" data-toggle="collapse" href="#homework" role="button" aria-expanded="false" aria-controls="homework">
                        <h5 class="card-title m-0 p-0  text-light">تکلیف</h5>
                    </a>
                </div>
                <div class="card-body collapse show bg-secondary-light border-secondary" id="homework" >
                    @if($homework->count()>0)
                        @foreach($homework as $item)
                            <div class="form-group border-bottom">
                                @if($loop->iteration==1)
                                    <label for="text">محتوی تکلیف مراجع را در کادر زیر وارد کنید</label>
                                @else
                                    <label for="text">توضیحات</label>
                                @endif
                                <textarea class="form-control" id="text" rows="3" name="text" disabled >{{$item->text}}</textarea>
                                @if(!is_null($item->attach))
                                    <label for="attach">فایل ضمیمه</label>
                                    <a href="{{asset('/documents/homework/'.$item->attach)}}" class="">
                                        <i class="bi bi-paperclip font-weight-bold"></i>
                                    </a>
                                @endif
                                <small class="text-muted float-left">{{$item->time_fa." ".$item->date_fa}}</small>
                            </div>
                        @endforeach
                        <form method="post" action="/panel/homework" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$reserve->booking_id}}" name="booking_id"/>
                            <input type="hidden" value="{{$homework[0]->id}}" name="homework_id_answer"/>
                            <div class="form-group">
                                <label for="text">توضیحات:*</label>
                                <textarea class="form-control" id="text" rows="3" name="text" >{{old('text')}}</textarea>
                            </div>
                            <input type="file" class="form-control" name="attach" />
                            <button type="submit" class="btn btn-primary mt-3">ثبت</button>
                        </form>
                    @else
                        <form method="post" action="/panel/homework" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$reserve->booking_id}}" name="booking_id"/>
                            <div class="form-group">
                                <label for="text">محتوی تکلیف مراجع را در کادر زیر وارد کنید</label>
                                <textarea class="form-control" id="text" rows="3" name="text" >{{old('text')}}</textarea>
                            </div>
                            <input type="file" class="form-control" name="attach" />
                            <button type="submit" class="btn btn-primary mt-3">ثبت</button>
                        </form>
                    @endif
                </div>
            </div>
        @endif
        <div class="card card-user ">
            <div class="card-header  bg-secondary">
                <a class="btn m-0 p-0" data-toggle="collapse" href="#status_reserve" role="button" aria-expanded="false" aria-controls="status_reserve">
                    <h5 class="card-title m-0 p-0  text-light">گزارش  جلسه</h5>
                </a>
            </div>
            <div class="card-body collapse show bg-secondary-light border-secondary" id="status_reserve">
                @if($reserve->booking->start_date<=$dateNow)
                    <form method="post" action="/panel/reserve/{{$reserve->id}}/update" >
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="form-group">
                            <label for="status">وضعیت جلسه <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" @if(!is_null($reserve->result_coach)) disabled  @endif>
                                <option disabled selected>انتخاب کنید</option>
                                <option value="3" @if($reserve->status==3) selected  @endif >برگزار شد</option>
                                <option value="5" @if($reserve->status==5) selected  @endif >غیبت مراجع</option>
                                <option value="6" @if($reserve->status==6) selected  @endif >غیبت کوچ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>نتیجه جلسه <span class="text-danger">*</span></label>
                            <textarea class="form-control"rows="5" name="result_coach" @if(!is_null($reserve->result_coach)) disabled @endif >{{old('result_coach',$reserve->result_coach)}}</textarea>
                            <small class="text-muted">این گزارش فقط برای خود کوچ جهت ثبت سوابق جلسات ثبت می شود</small>
                        </div>
                        <div class="form-group">
                            <label>به جلسه کوچینگ خود امتیاز دهید <span class="text-danger">*</span></label>
                            @if(is_null($reserve->score))
                                @for($i=1;$i<=5;$i++)
                                    <input name="score" type="radio" class="star-demo" value="{{$i}}" />
                                @endfor
                            @else

                                @for($i=1;$i<=5;$i++)
                                    <input name="score" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->score) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        @if(is_null($reserve->result_coach) ||(is_null($reserve->score)))
                            <div class="form-group">
                                <button class="btn btn-success">ثبت</button>
                            </div>
                        @endif
                    </form>

                    @if(!is_null($reserve->booking->feedback))

                        <p>کوچ گرامی</p>
                        <p class="text-justify">یکی از مهم ترین مهارت های یک کوچ ارائه بازخورد سازنده است که توام با صداقت، صراحت و صمیمیت است.</p>
                        <p class="text-justify">فرم نظرسنجی شما توسط مراجعه کننده به شکل زیر پر شده است .</p>
                        <div class="form-group border-bottom">
                            <label>حس شما از شرکت در جلسه:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="sense" type="radio" class="star-demo" value="{{$i}}" disabled @if(old('sense')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="sense" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->sense) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>میزان برآورده شدن انتظارات شما و اثر بخشی جلسه:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="expectations" type="radio" class="star-demo" value="{{$i}}" disabled @if(old('expectations')==$i) checked @endif  />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->expectations) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>ایجاد اعتماد و فضای امن و مثبت توسط کوچ:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="trust" type="radio" class="star-demo" value="{{$i}}" disabled  @if(old('trust')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="trust" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->trust) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>گوش دادن موثر کوچ:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="listen" type="radio" class="star-demo" value="{{$i}}"  disabled @if(old('listen')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="listen" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->listen) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>درک احساسات و همدلی مناسب کوچ با شما:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="emotions" type="radio" class="star-demo" value="{{$i}}" disabled  @if(old('emotions')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="emotions" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->emotions) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>عدم ارائه راهکارهای مستقیم به شما:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="failure_provide" type="radio" class="star-demo" value="{{$i}}" disabled @if(old('failure_provide')==$i) checked @endif  />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="failure_provide" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->failure_provide) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>مدیریت زمان جلسه توسط کوچ (شروع و پایان به موقع):*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="time_management" type="radio" class="star-demo" value="{{$i}}" disabled @if(old('time_management')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="time_management" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->time_management) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>جمع بندی و ارائه بازخوردهای مناسب به شما:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="proper_feedback" type="radio" class="star-demo" value="{{$i}}" disabled @if(old('proper_feedback')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="proper_feedback" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->proper_feedback) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>کمک به ترسیم اهداف کلی شما:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="drawing_goals" type="radio" class="star-demo" value="{{$i}}" disabled @if(old('drawing_goals')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="drawing_goals" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->drawing_goals) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>کمک به بررسی ابعاد مختلف موضوع:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="check_dimensions" type="radio" class="star-demo" value="{{$i}}" disabled  @if(old('check_dimensions')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="check_dimensions" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->check_dimensions) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>کمک به ارزیابی راهکارهای موجود و یافته شده:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="solution_evaluation" type="radio" class="star-demo" value="{{$i}}" disabled @if(old('solution_evaluation')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="solution_evaluation" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->solution_evaluation) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>ارائه تکلیف و تمرین به شما:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="homework" type="radio" class="star-demo" value="{{$i}}" disabled  @if(old('homework')==$i) checked @endif />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="homework" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->homework) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label>جمع بندی نظرات شما در یک جمله:*</label>
                            @if(is_null($reserve->booking->feedback))
                                @for($i=1;$i<=5;$i++)
                                    <input name="summary_comments" type="radio" class="star-demo" value="{{$i}}" disabled @if(old('summary_comments')==$i) checked @endif  />
                                @endfor
                            @else
                                @for($i=1;$i<=5;$i++)
                                    <input name="summary_comments" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->summary_comments) checked @endif disabled/>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group border-bottom">
                            <label for="best_offer">بهترین پیشنهاد شما:</label>
                            <textarea class="form-control" id="best_offer" rows="3" name="best_offer" disabled >@if(old('best_offer')) {{old('best_offer')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->best_offer}} @endif</textarea>
                        </div>
                        <div class="form-group border-bottom">
                            <label for="effective_criticism">موثر ترین انتقاد شما؟</label>
                            <textarea class="form-control" id="effective_criticism" rows="3" name="effective_criticism" disabled >@if(old('effective_criticism')) {{old('effective_criticism')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->effective_criticism}} @endif</textarea>
                        </div>
                        <div class="form-group border-bottom">
                            <label for="achievement">از آخرین جلسه کوچینگ چه دستاوردی در راستای هدف خود به دست آورده اید؟</label>
                            <textarea class="form-control" id="achievement" rows="3" name="achievement"  disabled >@if(old('achievement')) {{old('achievement')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->achievement}} @endif</textarea>
                        </div>
                        <div class="form-group border-bottom">
                            <label for="self_awareness">از آخرین جلسه کوچینگ چه آگاهی نسبت به خود پیدا کرده اید؟</label>
                            <textarea class="form-control" id="self_awareness" rows="3" name="self_awareness" disabled >@if(old('self_awareness')) {{old('self_awareness')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->self_awareness}} @endif</textarea>
                        </div>
                        <div class="form-group border-bottom">
                            <label for="challenges">در حال حاضر با چه چالش ها و مشکلاتی رو به رو هستید؟</label>
                            <textarea class="form-control" id="challenges" rows="3" name="challenges" disabled >@if(old('challenges')) {{old('challenges')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->challenges}} @endif</textarea>
                        </div>
                        <div class="form-group border-bottom">
                            <label for="opportunities_you">در حال حاضر چه فرصت هایی برای شما فراهم است؟</label>
                            <textarea class="form-control" id="opportunities_you" rows="3" name="opportunities_you" disabled >@if(old('opportunities_you')) {{old('opportunities_you')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->opportunities_you}} @endif</textarea>
                        </div>
                        <div class="form-group border-bottom">
                            <label for="future_expectations">در جلسه آینده از کوچ خود چه انتظاراتی دارید؟</label>
                            <textarea class="form-control" id="future_expectations" rows="3" name="future_expectations" disabled >@if(old('future_expectations')) {{old('future_expectations')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->future_expectations}} @endif</textarea>
                        </div>
                        <div class="form-group border-bottom">
                            <label for="suggestions_progress">چه پیشنهادهایی برای پیشرفت جلسات کوچینگ خود دارید؟</label>
                            <textarea class="form-control" id="suggestions_progress" rows="3" name="suggestions_progress" disabled >@if(old('suggestions_progress')) {{old('suggestions_progress')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->suggestions_progress}} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="satisfaction">پیشنهاد این کوچ به دیگران *</label>

                            <select class="form-control" name="satisfaction" id="satisfaction" disabled>
                                <option disabled selected>انتخاب کنید</option>
                                <option class="bg-success" value="1" @if(old('satisfaction')==1) selected @elseif(!is_null($reserve->booking->feedback)&&($reserve->booking->feedback->satisfaction==1)) selected @endif>این کوچ را توصیه میکنم</option>
                                <option class="bg-danger" value="0" @if(!is_null($reserve->booking->feedback)&&($reserve->booking->feedback->satisfaction==0)) selected @endif>این کوچ را توصیه نمیکنم</option>
                            </select>
                            <small class="text-muted">این نظر در سوابق کوچ نمایش داده می شود</small>
                        </div>
                        <div class="form-group">
                            <label for="comment">توصیه نامه نوشته شده برای این کوچ:</label>
                            <textarea class="form-control" id="comment" rows="3" name="comment" disabled >@if(old('comment')) {{old('comment')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->comment}} @endif</textarea>
                            <small class="text-muted">این نظر در سوابق کوچ نمایش داده می شود</small>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            فرم ارزیابی شما توسط مراجع تکمیل نشده است
                        </div>
                    @endif
                @else
                    <div class="alert alert-warning">جلسه کوچینک هنوز انجام نشده است</div>

                @endif
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <div class="card card-user">
            <div class="card-header bg-secondary">
                <a class="btn p-0 m-0" data-toggle="collapse" href="#infoProfile" role="button" aria-expanded="false" aria-controls="infoProfile">
                    <h5 class="card-title p-0 m-0  text-light">اطلاعات شخصی</h5>
                </a>
            </div>
            <div class="card-body collapse show bg-secondary-light border-secondary" id="infoProfile">
                <div class="row">
                    <div class="col-12">
                        <div class="media">

                            <img src="{{asset('/documents/users/'.$reserve->user->personal_image)}}" class="mr-3" width="100px" >
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-sm-6 col-xl-6 col-lg-6">
                                        <h5 class="mt-0">{{$reserve->user->fname." ".$reserve->user->lname}}</h5>
                                        <p class="m-0 p-0">متولد: {{$reserve->user->datebirth}}</p>
                                        <p class="m-0 p-0">جنسیت: @if($reserve->user->sex==1) مرد @else زن @endif</p>
                                        <p class="m-0 p-0">تاهل: @if($reserve->user->married==0) مجرد@elseif($reserve->user->married==1) متاهل @endif</p>
                                        <p class="m-0 p-0">شغل: {{$reserve->user->job}}</p>

                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-xl-6 col-lg-6 pt-3" >
                                        <p class="m-0 p-0">
                                            <i class="bi bi-telephone-fill"></i>
                                            <a href="tel:{{$reserve->user->tel}}" dir="ltr">{{$reserve->user->tel}}</a>
                                        </p>
                                        <p class="m-0 p-0">
                                            <i class="bi bi-envelope-fill"></i>
                                            <a href="mail:{{$reserve->user->email}}">{{$reserve->user->email}}</a>
                                        </p>
                                        <p class="m-0 p-0">
                                            <i class="bi bi-instagram"></i>
                                            <a href="https://instagram/{{$reserve->user->instagram}}">{{$reserve->user->instagram}}</a>
                                        </p>
                                        <p class="m-0 p-0">
                                            <i class="bi bi-telegram"></i>
                                            <a href="https://telegram.org/{{$reserve->user->telegram}}">{{$reserve->user->telegram}}</a>
                                        </p>
                                        <p class="m-0 p-0">
                                            <i class="bi bi-linkedin"></i>
                                            <a href="https://www.linkedin.com/in/{{$reserve->user->linkedin}}">{{$reserve->user->linkedin}}</a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-user">
            <div class="card-header bg-secondary">
                <a class="btn p-0 m-0" data-toggle="collapse" href="#infoReserve" role="button" aria-expanded="true" aria-controls="infoReserve">
                    <h5 class="card-title m-0  text-light">اطلاعات جلسه</h5>
                </a>
            </div>
            <div class="card-body collapse bg-secondary-light border-secondary" id="infoReserve">
                <div class="row">
                    <div class="col-md-6 px-1">
                        <div class="form-group">
                            <span>موضوع رزرو:</span>
                            <span>{{$reserve->subject}}</span>
                        </div>
                    </div>
                    <div class="col-md-6 px-1">
                        <div class="form-group">
                            <span>نوع رزرو:</span>
                            <span>{{$reserve->type_booking}}</span>
                        </div>
                    </div>
                    @if(!is_null($reserve->details))
                        <div class="col-md-12 px-1">
                            <div class="form-group">
                                <span>توضیحات:</span>
                                <span>{{$reserve->details}}</span>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <i class="bi bi-calendar2-date-fill"></i>
                            <span>{{$reserve->booking->start_date}}</span>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <i class="bi bi-alarm"></i>
                            <span>{{$reserve->booking->start_time}}</span>
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <i class="bi bi-alarm-fill"></i>
                            <span>{{$reserve->booking->end_time}}</span>
                        </div>
                    </div>
                    <div class="col-md-12 px-1">
                        <div class="card">
                            <div class="card-body" id="div_show_fi">
                                <span class="float-right">قیمت </span>
                                <span class="float-left">{{number_format($reserve->fi)}} تومان</span>
                                <br/>
                                <span class="float-right">کوپن تخفیف </span>
                                <span class="float-left">{{$reserve->coupon}} </span>
                                <br/>
                                <span class="float-right">کد تخفیف </span>
                                <span class="float-left">{{$reserve->off}} %</span>
                                <br/>
                                <span class="float-right">قیمت نهایی</span>
                                <span class="float-left">{{number_format($reserve->final_off)}} تومان</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(count($history)!=0)
            <div class="card card-user">
                <div class="card-header  bg-secondary">
                    <a class="btn p-0 m-0  text-light" data-toggle="collapse" href="#history" role="button" aria-expanded="false" aria-controls="history">
                        <h5 class="card-title m-0 p-0  text-light">سوابق جلسات - {{$history->count()}} جلسه </h5>
                    </a>
                </div>
                <div class="card-body collapse  bg-secondary-light border-secondary" id="history">
                    @foreach($history as $item)
                        <div class="row border-bottom mb-2 border-secondary pt-3 pb-1 ">
                            <div class="col-md-6 px-1">
                                <div class="form-group">
                                    <span> موضوع جلسه {{$loop->iteration}} :</span>
                                    <span>{{$item->subject}}</span>
                                </div>
                            </div>
                            @if(!is_null($item->details))
                                <div class="col-md-12 px-1">
                                    <div class="form-group">
                                        <span>توضیحات</span>
                                        <span>{{$item->details}}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <i class="bi bi-calendar2-date-fill"></i>
                                    <span>{{$item->start_date}}</span>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <i class="bi bi-alarm"></i>
                                    <span>{{$item->start_time}}</span>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <span>وضعیت جلسه:</span>
                                    <span>{{$item->status}} </span>
                                </div>
                            </div>
                            <div class="col-md-12 px-1">
                                <div class="form-group">
                                    <span>نتیجه جلسه:</span>
                                    <span>{{$item->result_coach}}</span>
                                </div>
                            </div>

                            <a href="/panel/booking/{{$item->id}}" class="btn btn-primary btn-block text-center" target="_blank">مشاهده جلسه</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection

@section('footerScript')
    <link href="{{asset('/dashboard/assets/css/jquery.rating.css')}}" rel="stylesheet"/>
    <script src="{{asset('/dashboard/assets/js/jquery.rating.js')}}"></script>
    <script>
        $('.star-demo').rating({
            // configs here
        });
    </script>
@endsection
