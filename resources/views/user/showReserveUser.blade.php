@extends('user.master.index')
@section('content')

    <div class="col-md-8">
        <div class="card card-user">
            <div class="card-header bg-info">
                <h5 class="card-title">فرم جلسه</h5>
            </div>
            <div class="card-body" >

                @if(!($reserve->start_date<$dateNow)&&!($reserve->status_reserve==3))
                    @if(is_null($reserve->presession))
                        <form method="POST" action="/panel/reserve/{{$reserve->id}}" class="border-bottom pb-3">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                <label for="presession">لطفا قبل از شروع جلسه درباره موضوع این جلسه و مباحث آن توضیحی کوتاه دهید<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="presession"  name="presession" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </form>
                    @else
                        <div class="form-group border-bottom pb-3">
                            <label for="presession">لطفا قبل از شروع جلسه درباره موضوع این جلسه و مباحث آن توضیحی کوتاه دهید<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="presession"  name="presession" rows="3" disabled readonly>{{$reserve->presession}}</textarea>
                        </div>
                    @endif
                @endif
                @if($reserve->booking->start_date<=$dateNow)
                    <div class="card card-user">
                        <div class="card-header bg-info">
                            <a class="btn m-0 p-0" data-toggle="collapse" href="#homework" role="button" aria-expanded="false" aria-controls="homework">
                                <h5 class="card-title m-0 p-0">تکلیف</h5>
                            </a>
                        </div>
                        <div class="card-body collapse show" id="homework" >
                            @if($homework->count()>0)
                                @foreach($homework as $item)
                                    <div class="form-group border-bottom">
                                        @if($loop->iteration==1)
                                            <label for="text">تکلیف ارائه شده توسط کوچ:</label>
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
                                        <label for="text">توضیحات:<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="text" rows="3" name="text" >{{old('text')}}</textarea>
                                    </div>
                                    <input type="file" class="form-control" name="attach" />
                                    <button type="submit" class="btn btn-primary mt-3">ثبت</button>
                                </form>
                            @else
                                <div class="alert alert-warning">
                                    تکلیفی توسط کوچ ارائه نشده است
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                @if(($reserve->start_date<$dateNow)&&($reserve->status==3))
                        <p>مراجع گرامی</p>
                        <p class="text-justify">یکی از مهم ترین مهارت های یک کوچ ارائه بازخورد سازنده است که توام با صداقت، صراحت و صمیمیت است.</p>
                        <p class="text-justify">لذا از اینکه با نظرات ارزشمند خودتان ما را در ارائه با کیفیت تر خدمات یاری می نمایید، بی نهایت سپاسگزاریم.</p>
                        <form method="post" action="/panel/feedbackcoach" >
                            @if(is_null($reserve->booking->feedback))
                                {{csrf_field()}}
                                <input type="hidden" name="booking_id" value="{{$reserve->booking_id}}"/>
                            @endif
                            <div class="form-group border-bottom pb-1">
                                <label for="sense">حس شما از شرکت در جلسه:<span class="text-danger">*</span></label>

                                @if(is_null($reserve->booking->feedback))
                                    <select name="sense" class="form-control" id="sense">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                                <option value="{{$i}}" @if(old('sense')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="sense" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->sense) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom pb-1">
                                <label for="expectations">میزان برآورده شدن انتظارات شما و اثر بخشی جلسه:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="expectations" class="form-control" id="expectations">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('expectations')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="expectations" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->expectations) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom pb-1">
                                <label for="trust">ایجاد اعتماد و فضای امن و مثبت توسط کوچ:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="trust" class="form-control" id="trust">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('trust')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="trust" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->trust) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom pb-1">
                                <label for="listen">گوش دادن موثر کوچ:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="listen" class="form-control" id="listen">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('listen')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="listen" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->listen) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom pb-1">
                                <label for="emotions">درک احساسات و همدلی مناسب کوچ با شما:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="emotions" class="form-control" id="emotions">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('emotions')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="emotions" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->emotions) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom pb-1">
                                <label for="failure_provide">عدم ارائه راهکارهای مستقیم به شما:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="failure_provide" class="form-control" id="failure_provide">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('failure_provide')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="failure_provide" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->failure_provide) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom">
                                <label for="time_management">مدیریت زمان جلسه توسط کوچ (شروع و پایان به موقع):<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="time_management" class="form-control" id="time_management">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('time_management')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="time_management" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->time_management) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom pb-1">
                                <label for="proper_feedback">جمع بندی و ارائه بازخوردهای مناسب به شما:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="proper_feedback" class="form-control" id="proper_feedback">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('proper_feedback')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="proper_feedback" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->proper_feedback) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom pb-1">
                                <label for="drawing_goals">کمک به ترسیم اهداف کلی شما:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="drawing_goals" class="form-control" id="drawing_goals">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('drawing_goals')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="drawing_goals" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->drawing_goals) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom">
                                <label for="check_dimensions">کمک به بررسی ابعاد مختلف موضوع:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="check_dimensions" class="form-control" id="check_dimensions">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('check_dimensions')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="check_dimensions" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->check_dimensions) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom">
                                <label for="solution_evaluation">کمک به ارزیابی راهکارهای موجود و یافته شده:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="solution_evaluation" class="form-control" id="solution_evaluation">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('solution_evaluation')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="solution_evaluation" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->solution_evaluation) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom">
                                <label for="homework">ارائه تکلیف و تمرین به شما:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="homework" class="form-control" id="homework">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('homework')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="homework" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->homework) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom">
                                <label for="summary_comments">جمع بندی نظرات شما در یک جمله:<span class="text-danger">*</span></label>
                                @if(is_null($reserve->booking->feedback))
                                    <select name="summary_comments" class="form-control" id="summary_comments">
                                        <option disabled selected>انتخاب کنید</option>
                                        @for($i=1;$i<=5;$i++)
                                            <option value="{{$i}}" @if(old('summary_comments')==$i) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <input name="summary_comments" type="radio" class="star-demo" value="{{$i}}" disabled @if($i==$reserve->booking->feedback->summary_comments) checked @endif disabled/>
                                    @endfor
                                @endif
                            </div>
                            <div class="form-group border-bottom">
                                <label for="best_offer">بهترین پیشنهاد شما:</label>
                                <textarea class="form-control" id="best_offer" rows="3" name="best_offer" @if(!is_null($reserve->booking->feedback))disabled @endif>@if(old('best_offer')) {{old('best_offer')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->best_offer}} @endif</textarea>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="effective_criticism">موثر ترین انتقاد شما؟</label>
                                <textarea class="form-control" id="effective_criticism" rows="3" name="effective_criticism" @if(!is_null($reserve->booking->feedback))disabled @endif>@if(old('effective_criticism')) {{old('effective_criticism')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->effective_criticism}} @endif</textarea>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="achievement">از آخرین جلسه کوچینگ چه دستاوردی در راستای هدف خود به دست آورده اید؟</label>
                                <textarea class="form-control" id="achievement" rows="3" name="achievement"  @if(!is_null($reserve->booking->feedback))disabled @endif>@if(old('achievement')) {{old('achievement')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->achievement}} @endif</textarea>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="self_awareness">از آخرین جلسه کوچینگ چه آگاهی نسبت به خود پیدا کرده اید؟</label>
                                <textarea class="form-control" id="self_awareness" rows="3" name="self_awareness" @if(!is_null($reserve->booking->feedback))disabled @endif >@if(old('self_awareness')) {{old('self_awareness')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->self_awareness}} @endif</textarea>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="challenges">در حال حاضر با چه چالش ها و مشکلاتی رو به رو هستید؟</label>
                                <textarea class="form-control" id="challenges" rows="3" name="challenges" @if(!is_null($reserve->booking->feedback))disabled @endif >@if(old('challenges')) {{old('challenges')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->challenges}} @endif</textarea>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="opportunities_you">در حال حاضر چه فرصت هایی برای شما فراهم است؟</label>
                                <textarea class="form-control" id="opportunities_you" rows="3" name="opportunities_you" @if(!is_null($reserve->booking->feedback))disabled @endif >@if(old('opportunities_you')) {{old('opportunities_you')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->opportunities_you}} @endif</textarea>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="future_expectations">در جلسه آینده از کوچ خود چه انتظاراتی دارید؟</label>
                                <textarea class="form-control" id="future_expectations" rows="3" name="future_expectations" @if(!is_null($reserve->booking->feedback))disabled @endif >@if(old('future_expectations')) {{old('future_expectations')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->future_expectations}} @endif</textarea>
                            </div>
                            <div class="form-group border-bottom">
                                <label for="suggestions_progress">چه پیشنهادهایی برای پیشرفت جلسات کوچینگ خود دارید؟</label>
                                <textarea class="form-control" id="suggestions_progress" rows="3" name="suggestions_progress" @if(!is_null($reserve->booking->feedback))disabled @endif >@if(old('suggestions_progress')) {{old('suggestions_progress')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->suggestions_progress}} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="satisfaction">پیشنهاد این کوچ به دیگران <span class="text-danger">*</span></label>
                                <select class="form-control" name="satisfaction" id="satisfaction" @if(!is_null($reserve->booking->feedback))disabled @endif>
                                    <option disabled selected>انتخاب کنید</option>
                                    <option style="background-color: #c6ffb3" value="1" @if(old('satisfaction')==1) selected @elseif(!is_null($reserve->booking->feedback)&&($reserve->booking->feedback->satisfaction==1)) selected @endif>این کوچ را توصیه میکنم</option>
                                    <option  style="background-color:#ffb3b3 " value="0" @if(!is_null($reserve->booking->feedback)&&($reserve->booking->feedback->satisfaction==0)) selected @endif>این کوچ را توصیه نمیکنم</option>
                                </select>
                                <small class="text-muted">این نظر در سوابق کوچ نمایش داده می شود</small>
                            </div>
                            <div class="form-group">
                                <label for="comment">توصیه نامه شما برای این کوچ:</label>
                                <textarea class="form-control" id="comment" rows="3" name="comment" @if(!is_null($reserve->booking->feedback))disabled @endif >@if(old('comment')) {{old('comment')}} @elseif(!is_null($reserve->booking->feedback)){{$reserve->booking->feedback->comment}} @endif</textarea>
                                <small class="text-muted">این نظر در سوابق کوچ نمایش داده می شود</small>
                            </div>

                        @if(is_null($reserve->booking->feedback))
                            <div class="form-group">
                                <button class="btn btn-success">ثبت</button>
                            </div>
                        @endif
                    </form>
                @elseif($reserve->status==4)
                    <div class="alert alert-warning">جلسه کوچینگ شما لغو شده است</div>
                @elseif($reserve->status==5)
                        <div class="alert alert-warning">جلسه به دلیل غیبت مراجع لغو شد</div>
                @elseif($reserve->status==6)
                        <div class="alert alert-warning">جلسه به دلیل غیبت مراجع لغو شد</div>
                @else
                    <div class="alert alert-warning">جلسه کوچینک هنوز انجام نشده است</div>
                @endif

                @if($reserve->start_date>$dateNow && ($reserve->status_reserve!=4))
                    <form method="POST" action="/booking/{{$reserve->booking_id}}" onsubmit="return confirm('آیا از لغو جلسه اطمینان دارید؟')">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" name="status" value="4" />
                        <button type="submit" class="btn btn-danger">لغو جلسه
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-header bg-info">
                <h5 class="card-title">اطلاعات جلسه</h5>
            </div>


            <div class="card-body" id="infoProfile">
                <div class="row">

                    <div class="col-12 text-center">
                        <img src="{{asset('/documents/users/'.$reserve->booking->coach->user->personal_image)}}" width="150px" height="150px" class="img-circle" />
                        <p>
                            <a href="{{asset('/coach/'.    $reserve->booking->coach->username)}}">{{$reserve->booking->coach->fname}} {{$reserve->booking->coach->lname}}</a>
                        </p>
                    </div>
                    <div class="col-12 px-1 ">
                        <div class="form-group">
                            <span>موضوع رزرو:</span>
                            <span>{{$reserve->subject}}</span>
                        </div>
                    </div>
                    <div class="col-12 px-1">
                        <div class="form-group">
                            <span>نوع رزرو:</span>
                            <span>{{$reserve->type_booking}}</span>
                        </div>
                    </div>

                    @if(!is_null($reserve->details))
                        <div class="col-12 px-1">
                            <div class="form-group">
                                <span>توضیحات</span>
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
