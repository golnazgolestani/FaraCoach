<div class="card">
    <div class="card-body shadow shadow-sm">
        <form method="post" action="/admin/scholarship/{{$scholarship->id}}/changestatus">
            {{csrf_field()}}
            <div class="card card-user">
                <div class="card-header bg-light">
                    <a class="row border-bottom" type="button" data-toggle="collapse" data-target="#infoScholarship" aria-expanded="false" aria-controls="infoScholarship">
                        <div class="col-md-8">
                            <h6 class="card-title m-0">اطلاعات بورسیه</h6>
                        </div>
                        <div class="col-md-4 text-right">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                            </svg>
                        </div>
                    </a>
                </div>

                <div class="card-body collapse bg-secondary-light border-1 border-secondary show" id="infoScholarship">
                    <div class="form-group row">
                        <label for="target" class="col-md-4 col-form-label text-md-right">
                            <input type="checkbox" name="confirm_target"  value="1" >
                            هدف شما از شرکت در دوره آموزش کوچینگ: </label>
                        <div class="col-md-6">
                            <div class="input-group">

                                <select id="target" class="form-control p-0 " name="target" disabled multiple>
                                    @foreach(explode(',',$scholarship->target) as $item_target)
                                        @switch($item_target)
                                            @case (1)<option >برای توسعه مهارت فردی در زندگی و کسب و کار (اثرگذار باشم)</option>
                                            @break
                                            @case(2)<option >میخواهم کوچ حرفه ای شوم (بعنوان شغل دوم و یا اصلی)</option>
                                            @break
                                            @case(3)<option >در شغل و کسب و کار خودم از این مهارت استفاده کنم</option>
                                            @break
                                            @case(4)<option >مایلم بعد از گذراندن دوره آموزشی با موسسه همکاری کنم</option>
                                            @break
                                        @endswitch
                                    @endforeach


                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="types" class="col-md-4 col-form-label text-md-right">
                            <input type="checkbox" name="confirm_types" value="1" >
                            به  کدام  حوزه اصلی کوچینگ علاقمندید:
                        </label>
                        <div class="col-md-6">
                            @foreach($scholarship->types as $item)
                                @switch($item)
                                    @case('1')
                                    لایف کوچینگ
                                    @break
                                    @case('2')
                                    بیزنس کوچینگ
                                    @break
                                @endswitch
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="gettingknow" class="col-md-4 col-form-label text-md-right">
                            <input type="checkbox" name="confirm_gettingknow"  value="1" >
                            میزان آشنایی شما با کوچینگ: </label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <select id="gettingknow" class="form-control p-0  " name="gettingknow" disabled>
                                    <option selected disabled>انتخاب کنید</option>
                                    <option {{ $scholarship->gettingknow==1 ? 'selected='.'"'.'selected'.'"' : '' }} >اطلاعات کامل دارم </option>
                                    <option {{ $scholarship->gettingknow==2 ? 'selected='.'"'.'selected'.'"' : '' }} >آگاهی محتصری دارم</option>
                                    <option {{ $scholarship->gettingknow==3 ? 'selected='.'"'.'selected'.'"' : '' }} >آشنایی ندارم</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="types" class="col-md-4 col-form-label text-md-right">
                            <input type="checkbox" name="confirm_applicant" value="1">
                            متقاضی کدام سطح اموزش هستید: </label>
                        <div class="col-md-6">

                            @switch($scholarship->applicant)
                                @case('1')
                                سطح 1
                                @break
                                @case('2')
                                سطح 2
                                @break
                            @endswitch

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cooperation" class="col-md-4 col-form-label text-md-right">
                            <input type="checkbox" name="confirm_cooperation" value="1" >
                            چه علاقمندی و یا توانمندی ویژه ای جهت همکاری با آکادمی فراکوچ دارید ؟ (حین و بعد از اتمام دوره آموزشی)</label>

                        <div class="col-md-6">
                            <textarea class="form-control" id="cooperation" name="cooperation" rows="3" disabled >{{$scholarship->cooperation}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="resume" class="col-md-4 col-form-label text-md-right">
                            <input type="checkbox" name="confirm_resume" value="1">
                            رزومه  خورد را بارگزاری نمایید: <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <a href="{{asset('/documents/scholarship/'.$scholarship->resume)}}">رزومه</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-6">
                <label for="status">وضعیت</label>
                <select class="form-control" id="status" name="status">
                    <option selected disabled>انتخاب کنید</option>
                    <option value="1" @if($scholarship->status==1) selected @endif>قبول درخواست</option>
                    <option value="2" @if($scholarship->status==2) selected @endif>رد درخواست</option>
                    <option value="3" @if($scholarship->status==3) selected @endif>در حال بررسی</option>
                    <option value="4" @if($scholarship->status==4) selected @endif>اصلاح درخواست</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">توضیحات:</label>
                <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
            </div>
            <input type="submit" value="ارسال" class="btn btn-success" />
        </form>

        @foreach($messages->where('type','=','scholarship') as $item)
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{$item->date_fa.' '.$item->time_fa}}</label>
                <textarea class="form-control"  rows="3" disabled>{{$item->comment}}</textarea>
            </div>
        @endforeach

    </div>
</div>
