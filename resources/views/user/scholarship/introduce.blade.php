<div class="card-body ">
    <div class="card">
        <div class="card-body border border-1 shadow-sm shadow ">
            <p>یکی از مهمترین اهداف طرح بورسیه کوچینگ، شناسایی افراد اثرگذار، مستعد و نخبه جامعه و تسهیل فضای آموزش حرفه ای برای این افراد است. </p>
            <p>لذا با توجه به اینکه ظرفیت اطلاع رسانی ما محدود است، از شما درخواست میکنیم که دوستان واجد شرایط خود را به این برنامه دعوت کنید و طبعا ما نیز از این اقدام شما قدردانی مینماییم.</p>

            <p>چنانچه  فردی که معرفی میکنید و یا از طریق لینک شما  ثبت نام نموده است، تمام مراحل را با  موفقیت  طی کند (مثلا 50 امتیاز کسب کند) ،<span class="text-danger">10 درصد از امتیاز بورسیه آنها به امتیاز بورسیه  شما اضافه میگردد.</span> </p>
        </div>
    </div>
    <p>استفاده از امتیاز معرفی دو روش دارد:</p>



    <ol>
        <li>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 ol-lg-8 col-xl-8">
                    انتشار پوستر و ویدئو در یک پست 2 اسلایدی (اسلاید  اول عکس و اسلاید دوم ویدئوی معرفی) در صفحه اینستاگرام  شما  و  تگ  کردن  ایدی پیج آکادمی faracoach
                    <div class="row mt-2 mb-2 ">
                        <div class="col-12 text-center">
                            <a href="{{asset('/videos/بورسیه.mp4')}}" class="btn btn-success mb" target="_blank">دانلود فیلم</a>
                            <a href="{{asset('/images/بورسیه-کاور-ویدئو.jpg')}}" class="btn btn-success" target="_blank">دانلود پوستر</a>
                            <a href="{{asset('/images/بورسیه-اینستاگرام.jpg')}}" class="btn btn-success" target="_blank">استوری بورسیه</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 ol-lg-4 col-xl-4">
                    <div class="row">
                        <div class="col-12 col-md-4 pb-sm-2 p-0">
                            <video controls class="img-fluid img-thumbnail"  height="">
                                <source src="{{asset('/videos/بورسیه.mp4')}}" >
                            </video>
                        </div>
                        <div class="col-12 col-md-4 pb-sm-2">
                            <img src="{{asset('/images/بورسیه-کاور-ویدئو.jpg')}}" class="img-fluid img-thumbnail" height="164px"/>
                        </div>
                        <div class="col-12 col-md-4 pb-sm-2">
                            <img src="{{asset('/images/بورسیه-اینستاگرام.jpg')}}" class="img-fluid img-thumbnail" height="164px" />
                        </div>
                    </div>

                </div>
                <div class="card-body border border-1 shadow-sm shadow ">
                    <p>با  توجه به  محدودیت  ظرفیت، فقط افرادی را بطور مستقیم دعوت کنید که یکی از شرایط زیر را داشته باشند:</p>
                    <ol>
                        <li> شناخت نسبی نسبت  به  رزومه  و توانمندی انها داشته باشید</li>
                        <li>جزو اساتید شما  بوده  و یا  در حوزه های مرتبط، نخبه، مستعد  و یا بسیار علاقمند باشند.</li>
                        <li>به  کوچینگ یا مباحث توسعه فردی و کسب و کار علاقمند باشند.</li>
                        <li>زمینه فعالیت به  عنوان کوچ فردی و سازمانی و یا  بیزینس کوچینگ را داشته باشند و ...</li>
                    </ol>
                    <p>تا دعوت شما اثر بحش باشد و همچنین احتمال پذیرش و قبولی آنها در ساختار بورسیه زیاد باشد. 👌</p>
                </div>
            </div>
            <div class="row  bg-warning ">
                <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                    <h6 class="mt-2">لینک دعوت اختصاصی شما جهت اشتراک گذاری با دوستان:</h6>
                </div>
                <div class="col-12 col-sm-7 col-md-55 col-lg-7 col-xl-7">
                    @if($scholarship->resource=='knot')
                        <p class=" p-2 dir-rtl text-center"  id="personal_link">{{asset('/knot/register?introduce='.Auth::user()->id)}}</p>
                    @else
                        <p class=" p-2 dir-rtl text-center"  id="personal_link">{{asset('/scholarship/register?introduce='.Auth::user()->id)}}</p>
                    @endif
                </div>
            </div>
        </li>

        <li class="mt-1">معرفی بصورت مستقیم
            <form method="post" action="/panel/scholarship/addintroduced" class=" border-bottom mb-3">
                <div class="row pt-1 mt-1" id="formAddIntroduce">
                    {{csrf_field()}}
                    <input type="hidden" value="بورسیه تحصیلی" name="resource" />
                    <div class="col-xs-12 col-md-2 col-lg-2 col-xl-2 mt-1">
                        <small>جنسیت:<span class="text-danger">*</span></small>
                        <div class="input-group mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="sex1" name="sex_introduced" class="custom-control-input" value="1" {{ old('sex_introduced')=="1" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                <label class="custom-control-label" for="sex1">آقا</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="sex0" name="sex_introduced" class="custom-control-input" value="0" {{ old('sex_introduced')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                <label class="custom-control-label  ml-1" for="sex0">خانم</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 ">
                        <small>نام:<span class="text-danger">*</span></small>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="مثلا :علی" name="fname_introduced" value="{{old('fname_introduced')}}"/>
                            <div class="input-group-prepend">

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 ">
                        <small>نام خانوادگی:<span class="text-danger">*</span></small>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="مثلا: محمدی" name="lname_introduced" value="{{old('lname_introduced')}}" />
                            <div class="input-group-prepend">

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 ">
                        <small>تلفن همراه:<span class="text-danger">*</span></small>
                        <div class="input-group mb-1">
                            <input type="hidden" id="tel_org_introduce"  name="tel_introduced"/>
                            <input type="tel" dir="ltr" class="form-control" placeholder="تلفن تماس را وارد کنید" id="tel_introduce" />
                            <div class="input-group-prepend">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 mt-1 d-none">
                        <small>پیگیری توسط:<span class="text-danger">*</span></small>
                        <div class="input-group mb-1">
                            @foreach($getFollowbyCategory as $item)
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio{{$item->id}}" name="followby_id" class="custom-control-input" value="{{$item->id}}" @if($item->id==1) checked  @endif  >
                                    <label class="custom-control-label  ml-1" for="customRadio{{$item->id}}">{{$item->followby}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 mt-1 d-none">
                        <small> ارسال پیامک دعوت</small>
                        <div class="input-group mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="sms0" name="sms" class="custom-control-input" value="0" checked >
                                <label class="custom-control-label" for="sms0">ارسال شود</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="sms1" name="sms" class="custom-control-input" value="1" >
                                <label class="custom-control-label ml-1" for="sms1">ارسال نشود</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 ">
                        <div class="input-group mb-2 btn-send text-center">
                            <!-- <button type="button" class="btn btn-primary" id="addFormIntroduce" title="اضافه کردن فرم جدید">+</button>-->
                            <button type="submit" class="btn btn-secondary d-block">ارسال دعوتنامه </button>
                        </div>
                    </div>
                </div>
            </form>

        </li>
    </ol>
</div>



<b >لیست افرادی که شما معرفی کرده اید:</b>
<form method="post" action="/panel/scholarship/me/sendSMSIntroduce">
    {{csrf_field()}}
    <table class="table text-center mt-1">
        <tr>
            <td>ردیف</td>
            <td></td>
            <td>نام و نام خانوادگی</td>
            <td>تلفن</td>
            <td>آخرین ورود</td>
            <td>امتیاز شما</td>

        </tr>
        @foreach($scholarship->user->get_invitations->wherein('resource',['بورسیه تحصیلی','کمپین گره']) as $item)
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="sendSMS{{$loop->iteration}}" name="sendSMSIntroduce[]">
                        <label class="form-check-label" for="sendSMS{{$loop->iteration}}">{{$loop->iteration}}</label>
                    </div>

                </td>
                <td>
                    @if(is_null($item->personal_image))
                        <img class="rounded" src="{{asset('/documents/users/default-avatar.png')}}" width="50px" height="50px" for="sendSMS{{$loop->iteration}}" />
                    @else
                        <img class="rounded" src="{{asset('/documnts/users/'.$item->personal_image)}}" width="50px" height="50px" for="sendSMS{{$loop->iteration}}"  />
                    @endif
                </td>
                <td>{{$item->fname.' '.$item->lname }}</td>
                <td dir="ltr">{{$item->tel}}</td>
                <td dir="ltr">{{$item->last_login_at}}</td>
                <td dir="ltr">
                    @if(is_null($item->scholarship))
                        0
                    @else
                        {{floor(($item->scholarship->get_score()*10)/100)}}
                    @endif
                </td>
            </tr>
        @endforeach
        @for($i=(count($scholarship->user->get_invitations->where('resource','=','بورسیه تحصیلی'))+1);$i<=5;$i++)
            <tr>
                <td>{{$i}}</td>
                <td>
                    <img class="rounded" src="{{asset('/documents/users/default-avatar.png')}}" width="50px" height="50px" />
                </td>
                <td></td>
                <td dir="ltr"></td>
                <td dir="ltr">-</td>
                <td dir="ltr">-</td>
            </tr>
        @endfor
    </table>


    <div class="col-md-4 mx-auto">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleSendSms" id="exampleSendSMS1" value="1" checked>
                <label class="form-check-label" for="exampleSendSMS1">
                    {نام و نام خانوادگی} عزیز<br/>
                    من {{Auth::user()->fname.' '.Auth::user()->lname}} شما را واجد شرایط دانسته، برای بورسیه کوچینگ آکادمی فراکوچ معرفی نمودم
                    پیشنهاد میکنم این فرصت بینظیر را از دست ندهید.
                    faracoach.com/scholaship
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleSendSms" id="exampleSendSMS2" value="2" checked>
                <label class="form-check-label" for="exampleSendSMS2">
                    {نام و نام خانودگی} عزیز<br/>
                    من {{Auth::user()->fname.' '.Auth::user()->lname}} ، شما را واجدشرایط دانسته و برای بورسیه کوچینگ آکادمی فراکوچ معرفی نمودم
                    <br/>
                    برای اطلاعات بیشتر با من تماس بگیرید <br/>
                    {{Auth::user()->tel}}<br/>
                    faracoach.com/scholarship
                </label>
            </div>

            <input type="submit" class="btn btn-success" value="ارسال پیامک" />

    </div>
</form>
