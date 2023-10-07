@extends('master.index')
@section('headerscript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <style>
        .back{
            width:100%;
            height: 550px;
            background-color: rgba(2,1,19,.81);
        }
        #title{
            color:#fff;
        }
        .btn-i{
            color:rgb(253 192 7);
        }
        .name, .fallow{
            border: 5px solid #fff;
            border-radius: 5px;
        }
        .fallow{
            background-color: #fff;
            height:300px
        }
        .name{
            background-image: url("{{asset('images/esfahan1.png')}}");
            background-size:100% 100%;
        }
        .fallow2{
            background-color: antiquewhite;
        }
        #date{
            background-color:#f5f5f5;
            min-height:100px;
            border-radius: 10px;
        }
        .rectangle{
            background-color: #ffc107;
            position: absolute;
            width: 6px;
            height: 55px;
            margin-right: -18px;
            margin-top: -6px;
        }

        #personal_link
        {
            direction: ltr;
            cursor: pointer;
        }

        #link_webinar
        {
            white-space: nowrap;
            overflow: auto;
        }


        @media only screen and (min-width:320px)
        {
            .name
            {
                height: auto;
            }
        }

    </style>
@endsection

@section('row1')
    <div class="row" id="">
        <div class="col-12 back">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 col-sx-12 align-right mt-5" id="title">
                        <h1> {{$event->event}} </h1>
                        <p>  {{$event->description}} </p>
                        <p class="float-left mr-5"> <i class="bi bi-geo-alt-fill"></i>@if($event->type==2) به صورت آنلاین  @else  {{$event->address}}  @endif </p>
                        <p class="float-left mr-5"> <i class="bi bi-clock-fill"></i>  ساعت {{$event->start_time}}  الی {{$event->end_time}}   </p>
                        <p> <i class="bi bi-calendar-check-fill"></i>  {{$event->eventDate}} </p>
                        <p> <i class="bi bi-tags-fill"></i> دسته بندی:  </p>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-sx-12 align-right mt-5 " >
                        <!--
                            <button type="button" class="btn btn-outline-warning btn-lg mt-5 "> <i class="bi bi-calendar-check-fill btn-i mr-2"></i>افزودن به تقویم </button>
                            <button type="button" class="btn btn-outline-warning btn-lg mt-5 "> <i class="bi bi-bookmark-check-fill btn-i"></i> ذخیره </button>
                        -->
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-xl-4 col-md-4 col-sm-12 col-sx-12 ">
                        <!--
                        <div class="card fallow text-center">
                            <div class="card-body ">

                                <button type="button" class="btn btn-success mt-5 ">
                                    <i class="bi bi-hand-thumbs-up-fill"></i>دنبال کردن
                                </button>
                            </div>
                        </div>
                        -->
                        <div class="card">
                            <div class="card-body  ">
                                <div class="col-12 ">
                                    <h5 class="float-left mr-5"> زمان</h5>
                                    <h5 class="float-right mr-5"> موضوع</h5>
                                </div>
                                <div class="col-12 mt-5" id="date">
                                    <div class="row text-center ">
                                        <div class="col-6 pt-3 font-weight-bold">
                                            {{$event->event}}
                                        </div>
                                        <div class="col-6 pt-3 font-weight-bold">
                                            {{$event->start_time}}
                                            <p class="p-0 m-1">&darr;</p>
                                            {{$event->end_time}}
                                        </div>
                                        <div class="col-6 pt-3 font-weight-bold">
                                            قیمت
                                        </div>
                                        <div class="col-6 pt-3 font-weight-bold">
                                            <p>{{number_format($event->fi)}} تومان</p>
                                        </div>
                                    </div>
                                </div>

                                @if(!Auth::check())
                                    <div class="col-12 pt-1 text-center">
                                        <div class="alert alert-warning">
                                            برای شرکت در دوره باید وارد سایت شوید
                                            @include('loginAjax')
                                        </div>

                                    </div>
                                @else
                                    @if(($eventReserve->count()==0) && ($event->status_event=='در حال ثبت نام'))
                                        <div class="col-12 text-center">
                                            <form method="POST" action="/panel/eventreserve">
                                                {{csrf_field()}}
                                                <input type="hidden" value="{{$event->id}}" name="event_id" />
                                                <input type="submit" class="btn btn-primary " value="شرکت در دوره" >
                                            </form>
                                        </div>
                                    @elseif($event->status_event=='تکمیل ظرفیت')
                                        <div class="col-12 text-center">
                                            <input type="button"  class="btn btn-warning mt-3" value="تکمیل ظرفیت شد"  />
                                        </div>
                                    @elseif($event->status_event=='برگزار شد')
                                        <div class="col-12 text-center">
                                            <input type="button"  class="btn btn-danger mt-3" value="برگزار شد"  />
                                        </div>
                                    @elseif($eventReserve->count()!=0)
                                        <div class="col-12 text-center">
                                            <input type="button"  class="btn btn-primary mt-3" value="شما در این دوره ثبت نام کرده اید"  />
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        @if(Auth::check())
                            <div class="card mt-4" >
                                <div class="card-body text-center">
                                    <h5>لینک دعوت اختصاصی شما</h5>
                                    <p class="text-light bg-secondary p-2 dir-rtl text-center"  id="personal_link">{{asset('/event/'.$event->shortlink)."?q=".Auth::user()->id}}</p>
                                </div>
                            </div>

                            @if($eventReserve->count()>0 && ($event->type==2))
                                <div class="card mt-4" >
                                    <div class="card-body overflow-auto text-center">
                                        <h5>لینک حضور در دوره</h5>
                                        <p class="bg-secondary p-2" id="link_webinar">
                                            <a href="{{$event->address}}" class=" text-center dir-rtl text-light " target="_blank">
                                            {{$event->address}}}}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <!--
                        <div class="card mt-4 ">
                            <div class="card-body text-center">
                                <img src="{{asset('/images/Yaser-Motahedin.png')}}" class="d-block "/>
                                <h4> برگزارکننده: </h4>
                                <button type="button" class="btn btn-success mt-5 "> <i class="bi bi-hand-thumbs-up-fill"></i>دنبال کردن</button>

                            </div>
                        </div>
                        -->
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-12 col-sx-12 mb-5 ">
                        <div class="card name">
                            <div class="card-body ">
                                <img src="{{asset('/documents/events/'.$event->image)}}" class="img-fluid" />
                            </div>
                        </div>
                        @if(!is_null($event->video))
                            <div class="card mt-4">
                                <div class="card-body ">
                                    <div class="rounded-rectangle rectangle" >
                                    </div>
                                    <h2>
                                        ویدئوی معرفی وبینار
                                    </h2>
                                    {!! $event->video !!}
                                </div>
                            </div>
                        @endif

                        @if(!is_null($event->event_text))
                            <div class="card mt-4">
                                <div class="card-body ">
                                    <div class="rounded-rectangle rectangle" >
                                    </div>
                                    <h2>
                                        توضیحات وبینار
                                    </h2>
                                    {!! $event->event_text !!}
                                </div>
                            </div>
                        @endif

                        @if(! is_null($event->heading))
                            <div class="card mt-4">
                                <div class="card-body ">
                                    <div class="rounded-rectangle rectangle " >
                                    </div>
                                    <h2>
                                        سرفصل‌های وبینار
                                    </h2>
                                    {!! $event->heading !!}
                                </div>
                            </div>
                        @endif

                        @if(!is_null($event->contacts))
                            <div class="card mt-4">
                                <div class="card-body ">
                                    <div class="rounded-rectangle rectangle" >
                                    </div>
                                    <h2>
                                        مخاطبین وبینار
                                    </h2>
                                    {!! $event->contacts !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="container mb-5 " id="show_comments_blog">
                        @if($errors->any())
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if(session('msg') && (session('errorStatus')))
                            <div class="col-12">
                                <div class="alert alert-{{session('errorStatus')}}">
                                    <p class="p-0 m-0">{{session('msg')}}</p>
                                </div>
                            </div>
                        @endif
                        @if(Auth::check())
                            <form method="post" action="/panel/comments"class="pb-2 border-bottom">
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$event->id}}">
                                <input type="hidden" name="type" value="event">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        @if(is_null(Auth::user()->personal_image))
                                            <img src="{{asset('/documents/users/default-avatar.png')}}"  width="50px" height="50px" />
                                        @else
                                            <img src="{{asset('/documents/users/'.Auth::user()->personal_image)}}" width="50px" height="50px"/>
                                        @endif
                                        <span>{{Auth::user()->fname}} {{Auth::user()->lname}}</span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="comment">ارسال دیدگاه:</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
                                    </div>
                                    <button class="btn btn-success">ارسال</button>
                                </div>
                            </form>
                        @else
                            <div class="col-12">
                                <p class="p-0 m-0">برای درج دیدگاه باید وارد سایت شوید</p>
                            </div>

                            @include('loginAjax')

                        @endif
                        <div class="row mt-2">
                            <div class="panel panel-default widget" >
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-comment"></span>
                                    <h5 class="panel-title">تعداد نظرات </h5>
                                    <span class="label label-info"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments" aria-selected="true">دیدگاه ها</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- TAB COMMENTS -->
                                    <div class="tab-pane fade show active" id="nav-comments" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <ul class="list-group pl-0">
                                            @foreach($comments as $item)
                                                <li class="list-group-item border-bottom text-justify" >
                                                    <div class="row">
                                                        <div class="col-xs-2 col-md-1">
                                                            <img src="{{asset('/documents/users/'.$item->personal_image)}}" class="img-circle img-responsive" width="50px" height="50px" />
                                                        </div>
                                                        <div class="col-xs-10 col-md-11">
                                                            <div  class="mb-2">
                                                                <a href="#">{{$item->fname.' '.$item->lname}}</a>
                                                                <div class="mic-info ">
                                                                </div>
                                                            </div>
                                                            <div class="comment-text">
                                                                {{$item->comment}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('footerScript')

   <script>
       $("#personal_link").click(function()
       {
           navigator.clipboard.writeText($('#personal_link').text());
           alert('لینک دعوت اختصاصی شما کپی شد');
       });


       //بررسی کد فعال سازی
       $("#btn-checkCode").click(function()
       {
           $('#result_reserve').html('<div class="spinner-border text-primary mb-3" role="status"> <span class="sr-only">لطفا صبر کنید...</span> </div>');
           var data=$('#frm_checkCode').serialize();
           $.ajax(
               {
                   data:data,
                   url:'/verifyCode',
                   type:'POST',
                   success: function (data) {
                       // $('#result_reserve').html(data);
                       if(typeof(data)!='object')
                       {
                           $('#result_reserve').html("<div class='alert alert-danger'>کد اشتباه است</div>");
                       }
                       else
                       {
                           $('#result_reserve').html("<div class='alert alert-success'>کد صحیح وارد شد</div>");
                           $.post('/panel/eventreserve', {"_token": "{{ csrf_token() }}",  event_id: '{{$event->id}}'},
                               function(returnedData){
                                   if(typeof(data)=='object')
                                   {
                                       $('#result_reserve').html("<div class='alert alert-success'>رزرو دوره با موفقیت انجام شد</div>");
                                       location.reload();
                                   }
                                   else
                                   {
                                       $('#result_reserve').html("<div class='alert alert-danger'>خطا در رزرو</div>");
                                   }
                               });
                       }
                       console.log(typeof (data));
                   },
                   error : function(data)
                   {
                       $('#result_reserve').text(data.responseJSON.errors);
                       console.log(data.responseJSON.errors);
                       errorsHtml='<div class="alert alert-danger text-left"><ul>';
                       $.each( data.responseJSON.errors, function( key, value ) {
                           errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                       });
                       errorsHtml += '</ul></div>';
                       $( '#result_reserve' ).html( errorsHtml );
                   }
               }
           )
       });



       //ارسال کد فعال سازی
       $('#eventreserve').on('show.bs.modal', function (event) {
            $.ajax(
                {
                    type:'post',
                    url:'/verify',
                    data:{
                        "_token"    : "{{ csrf_token() }}",
                        type:'event',
                        event:'{{$event->event}}',
                    },
                    success:function(data)
                    {
                        $( '#result_reserve' ).html( data );
                    },
                    error : function(data)
                    {
                        $('#result_reserve').text(data.responseJSON.errors);
                        console.log(data.responseJSON.errors);
                        errorsHtml='<div class="alert alert-danger text-left"><ul>';
                        $.each( data.responseJSON.errors, function( key, value ) {
                            errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></div>';

                        $( '#result_reserve' ).html( errorsHtml );
                    }

                }
            );
       });



        //لاگین ایجکس
        $("#btn_submit").click(function()
        {
            $('#result_login').html('<div class="spinner-border text-primary mb-3" role="status"> <span class="sr-only">لطفا صبر کنید...</span> </div>');
            var data=$('#loginAjax').serialize();
            $.ajax(
                {
                    type:"POST",
                    url:'/login',
                    data:data,

                    success: function (data) {
                        $('#result_login').html("<div class='alert alert-success'>ورود با موفقیت انجام شد</div>");
                        alert('شما با موفقیت وارد سایت شده اید برای ادامه ثبت نام در رویداد اقدام نمایید');
                        location.reload();
                    },
                    error : function(data)
                    {

                        $('#result_login').text(data.responseJSON.errors);
                        console.log(data.responseJSON.errors);
                        errorsHtml='<div class="alert alert-danger text-left"><ul>';
                        $.each( data.responseJSON.errors, function( key, value ) {
                            errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></div>';
                        $( '#result_login' ).html( errorsHtml );
                    }
                }
            )
        });

        $("#btn_signup").click(function()
        {
            var data=$('#frm_signup').serialize();
            $('#result_signup').html('<div class="spinner-border text-primary mb-3" role="status"> <span class="sr-only">لطفا صبر کنید...</span> </div>');
            $.ajax({
                    type:'POST',
                    url:'/signupAjax',
                    data:data,
                    success:function (data)
                    {
                        $("#result_signup").html(data);
                    },
                    error : function(data)
                    {

                        $('#result_signup').text(data.responseJSON.errors);
                        console.log(data.responseJSON.errors);
                        errorsHtml='<div class="alert alert-danger text-left"><ul>';
                        $.each( data.responseJSON.errors, function( key, value ) {
                            errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></div>';

                        $( '#result_signup' ).html( errorsHtml );
                    }
                })
        });
   </script>


@endsection
