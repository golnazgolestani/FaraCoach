<form method="POST" action="/panel/scholarship/answerstatus" enctype="multipart/form-data">
    {{csrf_field()}}
    @if(count($messages)>0)
        <input type="hidden" value="{{$messages[0]->user_id_send}}" name="user_id_send"/>
    @endif

    <div class="form-group row">
        <label for="target" class="col-md-4 col-form-label text-md-right">هدف شما از شرکت در دوره آموزش کوچینگ: </label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="target1" name="target[]" @if(in_array('1',$scholarship->target)) checked @endif @if(!$scholarship->confirm_target) disabled @endif/>
                    <label class="form-check-label" for="target1">
                        برای توسعه مهارت فردی در زندگی و کسب و کار (اثرگذار باشم)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="2" id="target2" name="target[]" @if(in_array('2',$scholarship->target)) checked @endif @if(!$scholarship->confirm_target) disabled @endif />
                    <label class="form-check-label" for="target2">
                        میخواهم کوچ حرفه ای شوم (بعنوان شغل دوم و یا اصلی)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="3" id="target3" name="target[]" @if(in_array('3',$scholarship->target)) checked @endif @if(!$scholarship->confirm_target) disabled @endif />
                    <label class="form-check-label" for="target3">
                        در شغل و کسب و کار خودم از این مهارت استفاده کنم
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="4" id="target4" name="target[]" @if(in_array('4',$scholarship->target)) checked @endif @if(!$scholarship->confirm_target) disabled @endif />
                    <label class="form-check-label" for="target4">
                        مایلم بعد از گذراندن دوره آموزشی با موسسه همکاری کنم
                    </label>
                </div>
            <!--
                                                <select id="target" class="form-control p-0  @error('target') is-invalid @enderror" name="target[]" multiple>
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option {{ old('target')==1 ? 'selected='.'"'.'selected'.'"' : '' }} value="1" >برای توسعه مهارت فردی در زندگی و کسب و کار (اثرگذار باشم)</option>
                                                    <option {{ old('target')==2 ? 'selected='.'"'.'selected'.'"' : '' }} value="2">میخواهم کوچ حرفه ای شوم (بعنوان شغل دوم و یا اصلی)</option>
                                                    <option {{ old('target')==3 ? 'selected='.'"'.'selected'.'"' : '' }} value="3">در شغل و کسب و کار خودم از این مهارت استفاده کنم</option>
                                                    <option {{ old('target')==4 ? 'selected='.'"'.'selected'.'"' : '' }} value="4">مایلم بعد از گذراندن دوره آموزشی با موسسه همکاری کنم</option>
                                                </select>
                                                -->
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="types" class="col-md-4 col-form-label text-md-right">به  کدام  حوزه اصلی کوچینگ علاقمندید: </label>

        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="types[]" @if(in_array('1',$scholarship->types)) checked @endif  @if(!$scholarship->confirm_types) disabled @endif   />
                <label class="form-check-label" for="defaultCheck1">
                    لایف کوچینگ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="types[]"  @if(in_array('2',$scholarship->target)) checked @endif  @if(!$scholarship->confirm_types) disabled @endif />
                <label class="form-check-label" for="defaultCheck2">
                    بیزنس کوچینگ
                </label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="gettingknow" class="col-md-4 col-form-label text-md-right">میزان آشنایی شما با کوچینگ: </label>

        <div class="col-md-6">
            <div class="input-group">
                <select id="gettingknow" class="form-control p-0" name="gettingknow" @if(!$scholarship->confirm_gettingknow) disabled @endif  >
                    <option selected disabled>انتخاب کنید</option>
                    <option {{ old('gettingknow',$scholarship->gettingknow)==1 ? 'selected='.'"'.'selected'.'"' : ''}} value="1"  >اطلاعات کامل دارم </option>
                    <option {{ old('gettingknow',$scholarship->gettingknow)==2 ? 'selected='.'"'.'selected'.'"' : ''}} value="2">آگاهی مختصری دارم</option>
                    <option {{ old('gettingknow',$scholarship->gettingknow)==3 ? 'selected='.'"'.'selected'.'"' : ''}} value="3">آشنایی ندارم</option>
                </select>
            </div>
        </div>
    </div>
<!--
                                    <div class="form-group row">
                                        <label for="description" class="col-md-4 col-form-label text-md-right"> توضیح بیشتری درباره  ویژگیها و توانمندی و علاقمندی خود مرقوم بفرمایید: </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="scientific" class="col-md-4 col-form-label text-md-right">سوابق علمی خود را مرقوم فرمایید: <span class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="scientific" type="text" class="form-control @error('scientific') is-invalid @enderror"  name="scientific"  required autocomplete="scientific" autofocus  />

                                            @error('scientific')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
    </div>
</div>





-->
    <div class="form-group row">
        <label for="cooperation" class="col-md-4 col-form-label text-md-right"> چه علاقمندی  و یا  توانمندی  ویژه ای جهت  همکاری  با  آکادمی فراکوچ دارید ؟ (حین و بعد از اتمام دوره آموزشی):</label>

        <div class="col-md-6">
        <!-- <input id="cooperation" type="text" class="form-control @error('cooperation') is-invalid @enderror"  name="cooperation"  required autocomplete="cooperation" autofocus  /> -->
            <textarea class="form-control" id="cooperation" rows="3" name="cooperation" @if(!$scholarship->confirm_cooperation) disabled @endif >{{old('cooperation',$scholarship->cooperation)}}</textarea>

            @error('cooperation')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="applicant" class="col-md-4 col-form-label text-md-right">متقاضی کدام سطح اموزش هستید؟</label>

        <div class="col-md-6" >
            <div class="custom-control custom-radio custom-control-inline">

                <input type="radio" id="gender1" name="applicant" class="custom-control-input"  value="1"  @if(old('applicant')==1) checked @endif  @if($scholarship->applicant==1) checked @endif  @if(!$scholarship->confirm_applicant) disabled @endif />
                <label class="custom-control-label" for="gender1" >سطح 1</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="gender2" name="applicant" class="custom-control-input" value="2" @if(old('applicant')==2) checked @endif @if($scholarship->applicant==2) checked @endif @if(!$scholarship->confirm_applicant) disabled @endif />
                <label class="custom-control-label" for="gender2" >سطح 2 (ویژه کوچها و دانشپذیران سطح1)</label>
            </div>

            @error('applicant')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="resume" class="col-md-4 col-form-label text-md-right">رزومه  خورد را بارگزاری نمایید: </label>
        <div class="col-md-6">
            @if($scholarship->confirm_resume)
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="resume">
            @else
                <a href="{{asset('')}}">نمایش رزومه</a>
            @endif
            <small class="text-muted ">فایل های قابل قبول: PDF , JPG , JPEG , DOC , PNG</small>
            <small class="text-muted d-block">حداکثر حجم فایل: 600 کیلوبایت</small>
            @error('resume')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>

    </div>

    @if(count($messages->where('type','=','scholarship'))>0)
        <div class="form-group">
            <label for="comment">توضیحات: <span class="text-danger">*</span></label>
            <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
        </div>

        <input type="submit" value="ارسال" class="btn btn-success" />
        @foreach($messages as $item)
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{$item->date_fa.' '.$item->time_fa}}</label>
                <textarea class="form-control"  rows="3" disabled>{{$item->comment}}</textarea>
            </div>
        @endforeach
    @endif
</form>
