@extends('panelUser.master.index')
@section('rowcontent')

    <div class="col-md-4">
        @include('panelUser.boxProfile')
        @include('panelUser.boxMadarak')

    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-12 alert alert-warning">
                <i class="bi bi-exclamation-triangle-fill"></i>
                فیلدهای ستاره دار اجباریست
            </div>
        </div>
        <form method="post" action="/panel/profile/update/{{$user->id}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="card card-user">
                <div class="card-header bg-info">
                    <h5 class="card-title m-0 p-0">اطلاعات شخصی</h5>
                </div>
                <div class="card-body" id="infoProfile">
                    <div class="row">
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>نام*</label>
                                <input type="text" class="form-control @if(strlen($user->fname)<>0) is-valid @endif" placeholder="نام را وارد کنید" @if(old('fname')) value='{{old('fname')}}' @else value="{{$user->fname}}" @endif name="fname"  autocomplete="autocomplete"  />
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>نام خانوادگی*</label>
                                <input type="text" class="form-control @if(strlen($user->lname)<>0) is-valid @endif" placeholder="نام خانوادگی را وارد کنید" @if(old('lname')) value='{{old('lname')}}' @else value="{{$user->lname}}" @endif name="lname"   autocomplete="autocomplete" />
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label for="codemelli">کد ملی*</label>
                                <input type="text" class="form-control  @if(strlen($user->codemelli)<>0) is-valid @endif" placeholder="کد ملی را وارد کنید" @if(strlen($user->codemelli)>0) value="{{$user->codemelli}}" disabled @endif id="codemelli" name="codemelli"  autocomplete="autocomplete" />
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>شماره شناسنامه</label>
                                <input type="text" class="form-control  @if(strlen($user->shenasname)<>0) is-valid @endif" placeholder="شماره شناسنامه را وارد کنید" @if(old('shenasname')) value='{{old('shenasname')}}' @else value="{{$user->shenasname}}" @endif name="shenasname"  autocomplete="autocomplete" />
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>تاریخ تولد*</label>
                                <input type="text" class="form-control @if(strlen($user->datebirth)<>0) is-valid @endif" placeholder="تاریخ تولد را وارد کنید" @if(old('datebirth')) value='{{old('datebirth')}}' @else value="{{$user->datebirth}}" @endif name="datebirth" id="datebirth" autocomplete="autocomplete" />
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>عکس پروفایل</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @if(is_null($user->getOriginal('personal_image'))) is-valid @endif" id="inputpersonal_image" aria-describedby="inputpersonal_image" name="personal_image"/>
                                    <label class="custom-file-label" for="inputpersonal_image">Choose file</label>
                                </div>
                                <small class="text-muted">فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>نام کاربری</label>
                                <label class="text-danger" data-toggle="tooltip" data-placement="top" title="نام کاربری باید انگلیسی و غیرقابل تغییر می باشد">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </label>
                                <input type="text" class="form-control @if(strlen($user->username)<>0) is-valid @endif" placeholder="نام کاربری خود را وارد کنید" @if(old('username')) value='{{old('username')}}' @else value="{{$user->username}}" @endif name="username" @if(strlen($user->username)>0) disabled @endif/>
                                <small class="text-muted " dir="ltr">نام کاربری به صورت انگلیسی و تنها کارکترهای مجاز . و _ میباشد
                                    <label class="text-danger" data-toggle="tooltip" data-placement="top" title="فقط مجاز به استفاده از . و _ هستید">
                                        <i class="bi bi-info-circle-fill"></i>
                                    </label>
                                </small>

                            </div>
                        </div>
                        <div class="col-md-12 px-1">
                            <div class="form-group">
                                <label>درباره من</label>
                                <textarea class="form-control @if(strlen($user->aboutme)<>0) is-valid @endif" id="aboutme" name="aboutme" rows="3">@if(old('aboutme')) {{old('aboutme')}} @else {{$user->aboutme}} @endif</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-user">
                <div class="card-header bg-info">
                    <h5 class="card-title m-0 p-0">اطلاعات تماس</h5>
                </div>
                <div class="card-body" id="infoProfile">
                    <div class="row">
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>تلفن تماس</label>
                                <input type="text" class="form-control @if(strlen($user->tel)<>0) is-valid @endif" placeholder="تلفن تماس را وارد کنید" @if(strlen($user->tel)>0) value="{{$user->tel}}" disabled @endif name="tel"  />
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="email">پست الکترونیکی</label>
                                <input type="email" class="form-control @if(strlen($user->email)<>0) is-valid @endif" placeholder="پست الکترونیکی را وارد کنید" @if(strlen($user->email)>0) value="{{$user->email}}" disabled @endif name="email"  id="email"  />
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>استان</label>
                                <select class="custom-select @if(strlen($user->state)<>0) is-valid @endif"  name="state" id="state">
                                     <option selected disabled>استان را انتخاب کنید</option>
                                     @foreach ($states as $item)
                                         <option value="{{$item->id}}" @if($item->id==$user->state) selected @endif>{{$item->name}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>شهر</label>
                                <select class="custom-select @if(strlen($user->city)<>0) is-valid @endif" name="city" id="city">
                                    <option value="{{$user->city}}">@if(!is_null($city))  {{$city->name}}  @endif </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 px-1">
                            <div class="form-group">
                                <label>آدرس</label>
                                <input type="text" class="form-control @if(strlen($user->address)<>0) is-valid  @endif" placeholder="آدرس را وارد کنید"  @if(old('address')) value='{{old('address')}}' @else value="{{$user->address}}" @endif name="address"  lang="fa" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>اینستاگرام</label>
                                <input type="text" class="form-control @if(strlen($user->instagram)<>0) is-valid  @endif" placeholder="صفحه اینستاگرام خود را وارد کنید" @if(old('instagram')) value='{{old('instagram')}}' @else value="{{$user->instagram}}" @endif name="instagram"  />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>تلگرام</label>
                                <input type="text" class="form-control @if(strlen($user->telegram)<>0) is-valid  @endif" placeholder="آیدی تلگرام خود را وارد کنید" @if(old('telegram')) value='{{old('telegram')}}' @else value="{{$user->telegram}}" @endif name="telegram"  />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>لینکدین</label>
                                <input type="text" class="form-control @if(strlen($user->linkedin)<>0) is-valid  @endif" placeholder="آیدی لینکدین خود را وارد کنید" @if(old('linkedin')) value='{{old('linkedin')}}' @else value="{{$user->linkedin}}" @endif name="linkedin"  />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-user " id="infogettingKnow">
                <div class="card-header bg-info">
                    <h5 class="card-title p-0 m-0">نحوه آشنایی</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>نحوه آشنایی</label>

                                <select id="gettingknow_parent" class="form-control p-0 @if(strlen($user->gettingknow)<>0) is-valid  @endif  @error('gettingknow') is-invalid @enderror" name="gettingKnow_parent">
                                    <option selected disabled>انتخاب کنید</option>
                                    @foreach($gettingKnow_parent_list as $item)
                                        <option value="{{$item->id}}"  {{ $user->gettingknow_parent_user ==$item->id ? 'selected='.'"'.'selected'.'"' : '' }} >{{$item->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        @if(!is_null($user->gettingknow))
                            <div class="col-md-6 px-1" id="gettingknow2" >
                                <div class="form-group">
                                    <label>عنوان آشنایی</label>
                                    <select id="gettingknow" class="form-control p-0 @if(strlen($user->gettingknow)<>0) is-valid  @endif  @error('gettingknow') is-invalid @enderror" name="gettingknow">
                                        <option selected disabled>انتخاب کنید</option>
                                        @foreach($gettingKnow_child_list as $item)
                                            <option value="{{$item->id}}"  {{$user->gettingknow==$item->id ? 'selected='.'"'.'selected'.'"' : '' }}>{{$item->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6 px-1" id="gettingknow2">
                                <div class="form-group">
                                    <label>عنوان آشنایی</label>
                                    <select id="gettingknow" class="form-control p-0 @if(strlen($user->gettingknow)<>0) is-valid  @endif  @error('gettingknow') is-invalid @enderror" name="gettingknow">
                                        <option selected disabled>انتخاب کنید</option>

                                    </select>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>معرف</label>
                                <input type="text" class="form-control @if(strlen($user->introduced)<>0) is-valid  @endif" @if(old('introduced')) value='{{old('introduced')}}' @else value="{{$user->introduced}}" @endif id="introduced" @if(strlen($user->introduced)>0) disabled @endif />
                                <small class="text-muted">لطفا تلفن همراه معرف خود را وارد کنید</small>
                                <span id="feedback_introduced" ></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-user">
                <div class="card-header bg-info">
                    <h5 class="card-title m-0 p-0">اطلاعات قرارداد</h5>
                </div>
                <div class="card-body" id="infoProfile">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                <small>این اطلاعات صرفاجهت عقد قراردادهای آموزشی و ارائه خدمات کوچینگ مورد نیاز است</small>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>نام پدر</label>
                                <input type="text" class="form-control @if(strlen($user->father)<>0) is-valid  @endif" placeholder=" نام پدر را وارد کنید" @if(old('father')) value='{{old('father')}}' @else value="{{$user->father}}" @endif name="father"  lang="fa" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">جنسیت</label>
                                <div class="form-group">
                                    <select class="form-control p-0 @if(strlen($user->sex)<>0) is-valid  @endif" id="exampleFormControlSelect1" name="sex" >
                                        <option selected disabled>انتخاب کنید</option>
                                        <option value="0"  {{ $user->sex =="0" ? 'selected='.'"'.'selected'.'"' : '' }}>زن</option>
                                        <option value="1" {{ $user->sex =="1" ? 'selected='.'"'.'selected'.'"' : '' }}>مرد</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>تاهل</label>
                                <div class="form-group">
                                    <select class="form-control p-0 @if(strlen($user->married)<>0) is-valid  @endif" id="exampleFormControlSelect1" name="married" >
                                        <option selected disabled>انتخاب کنید</option>
                                        <option value="0" {{ $user->married =="0" ? 'selected='.'"'.'selected'.'"' : '' }}>مجرد</option>
                                        <option value="1" {{ $user->married =="1" ? 'selected='.'"'.'selected'.'"' : '' }}>متاهل</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>شهر تولد</label>
                                <input type="text" class="form-control @if(strlen($user->born)<>0) is-valid  @endif" placeholder="شهر تولد را وارد کنید" @if(old('born')) value='{{old('born')}}' @else value="{{$user->born}}" @endif name="born"   lang="fa"/>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>تحصیلات</label>
                                <select class="custom-select @if(strlen($user->education)<>0) is-valid  @endif" name="education" id="education">
                                    <option selected disabled>انتخاب کنید</option>
                                    <option @if($user->education=='سیکل') selected   @endif>سیکل</option>
                                    <option @if($user->education=='دیپلم') selected   @endif>دیپلم</option>
                                    <option @if($user->education=='فوق دیپلم') selected   @endif>فوق دیپلم</option>
                                    <option @if($user->education=='لیسانس') selected   @endif>لیسانس</option>
                                    <option @if($user->education=='فوق لیسانس') selected   @endif>فوق لیسانس</option>
                                    <option @if($user->education=='دکتری و بالاتر') selected   @endif>دکتری و بالاتر</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>رشته</label>
                                <div class="form-group">
                                    <input type="text" class="form-control @if(strlen($user->reshteh)<>0) is-valid  @endif" placeholder="رشته را وارد کنید" @if(old('reshteh')) value='{{old('reshteh')}}' @else value="{{$user->reshteh}}" @endif name="reshteh"   lang="fa"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>شغل*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control @if(strlen($user->job)<>0) is-valid  @endif" placeholder="شغل را وارد کنید" @if(old('job')) value='{{old('job')}}' @else value="{{$user->job}}" @endif name="job" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>عکس شناسنامه</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @if(strlen($user->shenasnameh_image)<>0) is-valid  @endif" id="inputshenasnameh_image" aria-describedby="inputshenasnameh_image" name="shenasnameh_image" />
                                    <label class="custom-file-label" for="inputshenasnameh_image">Choose file</label>
                                </div>
                                <small class="text-muted"> فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>عکس کارت ملی</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @if(strlen($user->cartmelli_image)<>0) is-valid  @endif" id="inputcartmelli_image" aria-describedby="inputcartmelli_image" name="cartmelli_image">
                                    <label class="custom-file-label" for="inputcartmelli_image">Choose file</label>
                                </div>
                                <small class="text-muted"> فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>عکس مدرک تحصیلی</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @if(strlen($user->education_image)<>0) is-valid  @endif" id="inputeducation_image" aria-describedby="inputeducation_image" name="education_image" />
                                    <label class="custom-file-label" for="inputeducation_image">Choose file</label>
                                </div>
                                <small class="text-muted"> فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>رزومه</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @if(strlen($user->resume)<>0) is-valid  @endif" id="resume" aria-describedby="resume" name="resume" />
                                    <label class="custom-file-label" for="resume">Choose file</label>
                                </div>
                                <small class="text-muted"> فایل های مجاز: JPG , DOC و PDF و حداکثر اندازه مجاز: 600KB</small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mb-5">بروزرسانی</button>

        </form>
    </div>
@endsection




@section('footerScript')

    <script>
        $("#gettingknow_parent").change(function()
        {
            var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
            //$("#gettingknow2").html(loading);
            var content=$(this).val();
            $.ajax({
                type:'GET',
                url:"/showListChildGettingKnow/"+content,
                success:function(data)
                {
                    $("#gettingknow2").css('display','flex');
                    $("#gettingknow").html(data);
                }
            });
        })
    </script>

    <!--  DATE SHAMSI PICKER  --->
    <script src="{{asset('js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('js/kamadatepicker.holidays.js')}}"></script>
    <script>
        kamaDatepicker('datebirth',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });


        var customOptions={
            gotoToday: true,
            markHolidays:true,
            markToday:true,
            twodigit:true,
            closeAfterSelect:true,
            highlightSelectedDay:true,
            nextButtonIcon: "fa fa-arrow-circle-right",
            previousButtonIcon: "fa fa-arrow-circle-left",
            sync:true,
        }
        kamaDatepicker('dateFollow',customOptions);

        kamaDatepicker('nextfollowup_date_fa',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });

        kamaDatepicker('start',
            {
                gotoToday: true,
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                highlightSelectedDay:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left",
                sync:true,
            });
        kamaDatepicker('end',
            {
                gotoToday: true,
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                highlightSelectedDay:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left",
                sync:true,
            });
        kamaDatepicker('exam',
            {
                gotoToday: true,
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                highlightSelectedDay:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left",
                sync:true,
            });




    </script>

@endsection
