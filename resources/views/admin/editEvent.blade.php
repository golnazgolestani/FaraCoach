@extends('admin.master.index')
@section('headerScript')

    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/timepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/trumbowyg-2.25.1/dist/ui/trumbowyg.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/trumbowyg-2.25.1/dist/plugins/colors/ui/trumbowyg.colors.min.css')}}">

    <style>
        form
        {
            display: contents;
        }
    </style>
@endsection


@section('content')
    <div class="container bg-secondary-light shadow-lg">
        <div class="row p-1">
            <div class="col-12 border-bottom">
                <h4 class="font-weight-bold">ویرایش رویداد {{$event->event}}</h4>
            </div>
            <form method="post" action="/admin/event/{{$event->shortlink}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="col-12 col-sm-6 col-md-6 col-xl-6 col-lg-6 ">
                    <div class="form-group">
                        <label for="event">موضوع رویداد<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="event" name="event" value="{{old('event',$event->event)}}"  autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label for="shortlink">لینک اختصاصی<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="shortlink" name="shortlink" value="{{old('shortlink',$event->shortlink)}}" autocomplete="off" />
                        <small>لینک اختصاصی نباید تکراری باشد</small>
                        <small>لینک اختصاصی باید انگلیسی باشد</small>
                    </div>
                    <div class="form-group">
                        <label for="description">توضیح کوتاه:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="description" name="description" value="{{old('description',$event->description)}}" />
                        <small>حداکثر 150 کارکتر</small>
                    </div>
                    <div class="form-group">
                        <label for="capacity">ظرفیت:<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="capacity" name="capacity" value="{{old('capacity',$event->capacity)}}"  />
                        <small class="text-muted">در صورت نامحدود بودن عدد 1- را وارد کنید</small>
                    </div>
                    <div class="form-group">
                        <label for="fi">قیمت (تومان):<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="fi" name="fi" value="{{old('fi',$event->fi)}}"  />
                        <small class="text-muted">در صورت رایگان بودن عدد 0 را وارد و یا هیچ عددی وارد نکنید</small>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="capacity">نوع رویداد <span class="text-danger">*</span></label>
                            <div class="form-check  form-check-inline" >
                                <input class="form-check-input ml-3 type" type="radio" name="type" id="type1" value="1" @if(old('type',$event->type)==1) checked @endif   />
                                <label class="form-check-label p-0" for="type1">
                                    حضوری
                                </label>

                                <input class="form-check-input ml-3 type" type="radio" name="type" id="type2" value="2" @if(old('type',$event->type)==2) checked @endif />
                                <label class="form-check-label p-0" for="type2">
                                    آنلاین
                                </label>
                            </div>
                        </div>
                        <div class="col-6"></div>
                    </div>
                    <div class="form-group" id="address1">
                        <label for="address">آدرس/لینک<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address',$event->address)}}" />
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">عکس شاخص<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image" name="image" value="{{old('image',$event->image)}}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-file">
                                <label for="video">آدرس ویدئو</label>
                                <input type="text" class="form-control" id="video" name="video" value="{{old('video',$event->video)}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">تاریخ شروع رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="start_date" name="start_date"  autocomplete="off"  value="{{old('start_date',$event->start_date)}}"/>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="start_date">ساعت شروع رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="form-control time" id="start_time" name="start_time"  autocomplete="off" value="{{old('start_time',$event->start_time)}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">تاریخ پایان رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="end_date" name="end_date"  autocomplete="off" value="{{old('end_date',$event->end_date)}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_time">ساعت پایان رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="form-control time" id="end_time" name="end_time"  autocomplete="off" value="{{old('end_time',$event->end_time)}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="duration">مدت رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="duration" name="duration"  autocomplete="off" value="{{old('duration',$event->duration)}}" />
                                <small class="text-muted">مدت زمان رویداد به عنوان مثال: یک ساعت و نیم</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="expire_date">تاریخ پایان ثبت نام<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="expire_date" name="expire_date"  autocomplete="off" value="{{old('expire_date',$event->expire_date)}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-6 col-lg-6 ">
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapseEventText" role="button" aria-expanded="false" aria-controls="collapseEventText">
                            توضیحات رویداد <span class="text-danger">*</span>
                        </a>
                        <div class="collapse" id="collapseEventText">
                            <div class="card card-body">
                                <textarea class="form-control" id="event_text" name="event_text">{{old('event_text',$event->event_text)}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapseheading" role="button" aria-expanded="false" aria-controls="collapseheading">
                            سرفصلها
                        </a>
                        <div class="collapse" id="collapseheading">
                            <div class="card card-body">
                                <textarea class="form-control" id="heading" name="heading">{{old('heading',$event->heading)}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapsecontacts" role="button" aria-expanded="false" aria-controls="collapsecontacts">
                            مخاطبین
                        </a>
                        <div class="collapse" id="collapsecontacts">
                            <div class="card card-body">
                                <textarea class="form-control" id="contacts" name="contacts">{{old('contacts',$event->contacts)}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapsefaq" role="button" aria-expanded="false" aria-controls="collapsefaq">
                            سوالات متداول
                        </a>
                        <div class="collapse" id="collapsefaq">
                            <div class="card card-body">
                                <textarea class="form-control" id="faq" name="faq">{{old('faq',$event->faq)}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapselinks" role="button" aria-expanded="false" aria-controls="collapselinks">
                            راه های ارتباطی
                        </a>
                        <div class="collapse" id="collapselinks">
                            <div class="card card-body">
                                <textarea class="form-control" id="links" name="links">{{old('links',$event->links)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">بروزرسانی رویداد</button>
            </form>
        </div>
    </div>

@endsection

@section('footerScript')

    <!--  DATE SHAMSI PICKER  --->
    <script src="{{asset('js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('js/kamadatepicker.holidays.js')}}"></script>

    <script>
        $('#end_date').change(function(){
            if($(this).val()<$('#start_date').val())
            {
                alert('تاریخ درج شده با شروع دوره مطابقت ندارد');
                $(this).val('');
            }
        });
        $('#expire_date').change(function(){
            if($(this).val()>$('#start_date').val())
            {
                alert('تاریخ درج شده با شروع دوره مطابقت ندارد');
                $(this).val('');
            }
        });
    </script>

    <script>
        kamaDatepicker('start_date',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });

        kamaDatepicker('end_date',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });

        kamaDatepicker('expire_date',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });


    </script>


    <script src="{{asset('/trumbowyg-2.25.1/dist/trumbowyg.min.js')}}"></script>
    <script src="{{asset('/trumbowyg-2.25.1/dist/plugins/colors/trumbowyg.colors.min.js')}}"></script>
    <script src="{{asset('/trumbowyg-2.25.1/dist/langs/fa.js')}}"></script>
    <script>
        $('textarea').trumbowyg({
            lang:'fa',
            btns: [
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['foreColor', 'backColor'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ]
        })
    </script>

    <script src="{{asset('js/timepicker.js')}}"></script>
    <script>
        jQuery.noConflict();
        jQuery('#start_time').timepicker();
        jQuery('#end_time').timepicker();
    </script>
@endsection
