@extends('master.index')

@section('headerscript')
    <link href="{{asset('/dashboard/assets/css/datepicker.css')}}"  rel="stylesheet"/>
    <style>
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

        *,
        *:after,
        *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .clearfix:before,
        .clearfix:after {
            content: " ";
            display: table;
        }

        .clearfix:after {
            clear: both;
        }

        body {
            font-family: sans-serif;
            background: #f6f9fa;
        }

        h1 {
            color: #ccc;
            text-align: center;
        }

        a {
            color: #ccc;
            text-decoration: none;
            outline: none;
        }

        #coach_profile_details ,.card ,.hovercard {
            background-color: #FFFFFF!important;
            text-align: right!important;
            margin-bottom: 50px!important;
        }

        #coach_profile_details .social
        {
            width: auto;
            height: auto;
        }

        .checked {
            color: orange;
        }
        #coach_profile_details .circle {
            display:inline;
            font-size: 20px ;
            color:  #183153;
        }
        /*Fun begins*/
        .tab_container {
            margin: 0 auto;
            padding-top: 42px;
            position: relative;
        }

        #tabs input, section {
            clear: both;
            padding-top: 10px;
            display: none;
        }

        #tabs label {
            font-weight: 700;
            font-size: 18px;
            display: block;
            float: right;
            width: 20%;
            padding: 1em;
            color: #757575;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            background: #f0f0f0;
        }

        #tab1:checked ~ #content1,
        #tab2:checked ~ #content2,
        #tab3:checked ~ #content3,
        #tab4:checked ~ #content4,
        #tab5:checked ~ #content5 {
            display: block;
            padding: 20px;
            background: #fff;
            color: #999;
            border-bottom: 2px solid #f0f0f0;
        }

        .tab_container .tab-content p,
        .tab_container .tab-content h3 {
            -webkit-animation: fadeInScale 0.7s ease-in-out;
            -moz-animation: fadeInScale 0.7s ease-in-out;
            animation: fadeInScale 0.7s ease-in-out;
        }
        .tab_container .tab-content h3 {
            text-align: right;
            color: #183153;
        }

        #tabs.tab_container [id^="tab"]:checked + label {
            background: #fff;
            box-shadow: inset 0 1px #183153;
        }

        .tab_container [id^="tab"]:checked + label .fa {
            color: #183153;
        }

        label .fa {
            font-size: 1.3em;
            margin: 0 0.4em 0 0;
        }
        .bg-info{
            background-color: #183153!important;
        }
        .alert-warning{
            /*color:  #183153!important;*/
            /*background-color: #FFFFFF;*/
            /*border-color: #F5F5F5;*/
        }
        /*Media query*/
        @media only screen and (max-width: 900px) {

            .tab_container {
                width: 98%;
            }
        }

        /*Content Animation*/
        @keyframes fadeInScale {
            0% {
                transform: scale(0.9);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        .no_wrap {
            text-align:center;
            color: #183153;
        }
        .link {
            text-align:center;
        }


        @media only screen and (max-width:425px)
        {
            #coach_profile_details .card.hovercard .info
            {
                text-align: center;
                padding: 13px;
            }
        }




        .highlighted-1 > span
        {
            color: #EF6C00 !important;
        }

        .vpd-day-effect {
            background-color: transparent !important;
            border: solid 2px #EF6C00;

        }

        .vpd-day:not([disabled]):hover
        {
            color:#000000 !important;
        }

        .vpd-addon-list-item {
            color: #ef6c00 !important;
        }

        .vpd-selected {
             background-color: transparent;
        }

        .highlighted-2 {
            color: #E91E63;
        }

        .vpd-day-effect {
            background-color: transparent !important;
        }

        .vpd-addon-list-item {
            color: #e91e63 !important;
        }
        .vpd-selected {
            background-color: transparent;
            color:#000000 !important;
        }

        .vpd-header,.vpd-actions
        {
            display: none;
        }

        .faracoach
        {
            position:relative;
        }

        .confirm_faracoach::after
        {
            background-image:url("{{asset('/images/tick.png')}}");
            content: '';
            width: 20px;
            height: 20px;
            display: inline-block;
            background-size: 100% 100%;
        }

    </style>

@endsection

@section('row1')
    <div class="container" >
        <div class="row mb-5">
            <div class="shadow col-12 mt-5 text-left pt-5" id="coach_profile_details">
                <div class="card hovercard mb-3">
                    <div class="cardheader">

                    </div>
                    <div class="row">
                        <div class="avatar col-xl-3 col-lg-3 col-md-3 col-sm-12 text-center ">

                            @if(strlen($coach->personal_image)>0)
                                <img src="{{asset('/documents/users/'.$coach->personal_image)}}" />
                            @else
                                <img src="{{asset('/documents/users/default-avatar.png')}}" />
                            @endif
                        </div>
                        <div class="info col-sm-12 col-md-6 col-xs-6 col-lg-6">

                            <div class="title ">
                                <a href="#" class="@if($coach->confirm_faracoach==1) confirm_faracoach @endif">{{$coach->fname}} {{$coach->lname}}</a>
                            </div>
                            <div class="desc">درباره من:</div>
                            <div class="desc">
                                <p>{{$coach->aboutme}}</p>
                            </div>

                        </div>

                        <div class="social info col-sm-12 col-md-3 col-xs-3 col-lg-3">
                            @if(strlen($coach->instagram)>0)
                                <a class="circle p-2 " href="https://www.instagram.com/{{$coach->instagram}}" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            @endif

                            @if(strlen($coach->telegram)>0)
                                <a class="circle" href="https://www.t.me/{{$coach->telegram}}" target="_blank">
                                    <i class="fa fa-paper-plane"></i>
                                </a>
                            @endif
                            @if(strlen($coach->email)>0)
                                <a class="circle" href="mailto:{{$coach->email}}" title="پست الکترونیکی">
                                    <i class="fa fa-mail-bulk"></i>
                                </a>
                            @endif
                            <a class="circle" href="tel:02191091121" title="شماره همراه">
                                <i class="fa fa-phone"></i>
                            </a>

                            <div class="mt-3">
                                <span class="fa fa-star checked p-1"></span>
                                <span class="fa fa-star checked p-1"></span>
                                <span class="fa fa-star checked p-1"></span>
                                <span class="fa fa-star p-1"></span>
                                <span class="fa fa-star p-1"></span>
                            </div>
                            <div>
                                <div class=" mt-3"> قیمت هر جلسه:
                                    @if($coach->fi==0 || $coach->fi=='')
                                        رایگان می باشد
                                    @else
                                        {{number_format($coach->fi)}} تومان
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-xs-8 col-lg-8 pb-3" >
                <div class="tab_container" id="tabs">
                    <input id="tab1" type="radio" name="tabs" checked>
                    <label for="tab1"><i class="fa fa-graduation-cap"></i><br><span>سوابق تحصیلی </span></label>

                    <input id="tab2" type="radio" name="tabs">
                    <label for="tab2"><i class="fa fa-briefcase"></i><br><span>سوابق شغلی</span></label>

                    <input id="tab3" type="radio" name="tabs">
                    <label for="tab3"><i class="fa fa-pencil-square-o"></i><br><span>مهارت ها</span></label>

                    <input id="tab4" type="radio" name="tabs">
                    <label for="tab4"><i class="fa fa-certificate"></i><br><span>مدارک</span></label>

                    @if(!is_null($coach->researches))
                        <input id="tab5" type="radio" name="tabs" >
                        <label for="tab5"><i class="fa fa-book"></i><br><span>مقالات </span></label>
                    @endif

                    @if(!is_null($coach->researches))
                        <section id="content5" class="tab-content">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xl-8">
                                    <h3>مقالات</h3><hr>
                                    <p>{!! $coach->researches !!} </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-xl-4">
                                    <img src="{{asset('/images/researches.jpg')}}" alt="" width="100%" >
                                </div>
                            </div>

                        </section>
                    @endif

                    <section id="content4" class="tab-content">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xl-8">
                                <h3>مدارک</h3><hr>
                                <p>
                                {!! $coach->certificates !!}</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xl-4">
                                <img src="{{asset('/images/certificate.png')}}" alt="" width="100%">
                            </div>
                        </div>
                    </section>

                    <section id="content3" class="tab-content">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xl-8">
                                <h3>مهارت ها</h3><hr>

                                {!! $coach->skills !!}
                            </div>
                            <div class="col-lg-4 col-md-4 col-xl-4">
                                <img src="{{asset('/images/20943948.png')}}" alt="" width="100%">
                            </div>
                        </div>
                    </section>

                    <section id="content2" class="tab-content">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xl-8">
                                <h3>سوابق شغلی</h3><hr>
                                <p>{!! $coach->experience !!}   </p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xl-4">
                                <img src="{{asset('/images/job.png')}}" alt="" width="100%">
                            </div>
                        </div>
                    </section>

                    <section id="content1" class="tab-content">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xl-8">
                                <h3>سوابق تحصیلی</h3><hr>
                                <p>{!! $coach->education_background !!}</p>

                            </div>
                            <div class="col-lg-4 col-md-4 col-xl-4">
                                <img src="{{asset('/images/edu.jpg')}}" alt="" width="100%">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class=" col-xs-12 col-md-4 col-lg-4 col-xl-4 mt-5" id="coach_profile">
                <div class="card shadow">
                    <div class="card-header  bg-info text-light">
                        رزرو جلسه کوچینگ
                    </div>
                    <div class="card-body" id="app" >
                        @if(Auth::check())
                            @if(((is_null(Auth::user()->fname))||(is_null(Auth::user()->lname))))
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        لطفا اطلاعات پروفایل خود را کامل کنید <a href="/panel/profile" class="btn btn-primary">اینجا</a>
                                    </div>
                                </div>
                            @else
                                <p class="text-bold border-bottom mb-2 pb-2">انتخاب روز</p>

                                <date-picker
                                    :highlight="highlight"
                                    v-model="date"
                                    inline
                                    name="start_date"
                                    min="{{$dateNow}}"
                                    id="start_date"
                                    @change="changeDate"
                                ></date-picker>

                                <input type="hidden" id="coach_id" value="{{$coach->id}}" />
                                <p class="text-bold mb-2 mt-3 pb-2 border-bottom">انتخاب ساعت</p>
                                <div class="col-12 p-0" id="show_bookings">
                                    <div class="alert alert-warning" role="alert">لطفا یک تاریخ را انتخاب کنید</div>
                                </div>
                                <div class="row" id="reserve">

                                </div>
                            @endif

                        @else
                            <div class="alert alert-warning text-center">
                                <p>برای رزرو جلسه باید وارد سایت شوید</p>
                                @include('loginAjax')
                            </div>
                        @endif
                    </div>
                </div>
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
                        <input type="hidden" name="post_id" value="{{$coach->id}}">
                        <input type="hidden" name="type" value="coach">
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
                    <div class="alert alert-warning" role="alert">
                        برای ارسال دیدگاه لطفا <a href="/login">وارد</a> شوید
                    </div>
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
                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">بازخورد جلسات</a>
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

                            <!-- TAB FEEDBACKS -->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @if(count($feedbacks)>0)
                                    <ul class="list-group pl-0">
                                        @foreach($feedbacks as $item)
                                            <li class="list-group-item border-bottom text-justify" >
                                                <div class="row">
                                                    <div class="col-xs-2 col-md-1">
                                                        <img src="{{asset('/documents/users/'.$item->personal_image)}}" class="img-circle img-responsive" width="50px" height="50px" /></div>
                                                    <div class="col-xs-10 col-md-11">
                                                        <div>
                                                            <a href="#">{{$item->fname}} {{$item->lname}}</a>
                                                            <div class="mic-info mb-2">
                                                                @if($item->satisfaction==1)
                                                                    <strong class="text-success">
                                                                        این کوچ را توصیه میکنم
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                                                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                                                        </svg>
                                                                    </strong>
                                                                @elseif($item->satisfaction==0)
                                                                    <strong class="text-danger">
                                                                        این کوچ را توصیه نمیکنم
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                                                                            <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                                                        </svg>
                                                                    </strong>
                                                                @endif
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
                                @else
                                    <div class="alert alert-warning">هیچ بازخوردی ثبت نشده است</div>
                                @endif
                                {{$feedbacks->links()}}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-jalaali@0.7.4/build/moment-jalaali.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-persian-datetime-picker/dist/vue-persian-datetime-picker-browser.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            components: {
                DatePicker: VuePersianDatetimePicker
            },
            data: {
                time:"{{old('time')}}",
                dateMoment: moment('1396/05/03', 'jYYYY/jMM/jDD'),
                dates: [],
                date:[],
                message:'asdasdasd',
                coach:'',
            },
            methods: {
                highlight(formatted, dateMoment, checkingFor) {
                    let attributes = {'title': 'در ' + formatted+" فاقد ساعت خالی می باشد. "};

                    @foreach($bookings as $item)
                        if ((checkingFor === 'day') && (formatted === '{{$item->start_date}}')){
                            attributes['class'] = 'highlighted-1';
                            attributes['title'] = 'رزرو جلسه';
                        }
                    @endforeach
                    return attributes;
                },
                changeDate()
                {

                    this.coach=$("#coach_id").val();
                    if((this.coach==0) &&(this.dateMoment=='') )
                    {
                        var loading = '<div class="alert alert-warning" role="alert">خطا در انتخاب رزروها</div>';
                    }
                    else {

                        var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
                        $("#show_bookings").html(loading);
                        $.ajax({
                            type: 'GET',
                            url: "/booking/createajax?coach=" + this.coach + "&calenderSelector=" + this.date,
                            success: function (data) {
                                $("#show_bookings").html(data);
                            },
                            error : function(data)
                            {
                                $('#show_bookings').text(data.responseJSON.errors);
                                errorsHtml='<div class="alert alert-danger text-left"><ul>';
                                $.each( data.responseJSON.errors, function( key, value ) {
                                    errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                                });
                                errorsHtml += '</ul></div>';

                                $( '#show_bookings' ).html( errorsHtml );
                            }
                        });
                    }
                }
            }
        });
    </script>



    <script src="{{asset('/dashboard/assets/js/datepicker.js')}}"> </script>
    <script>
        $(".calender").datepicker({
            {{--altField : "#calenderSelector",--}}
            {{--//altSecondaryField : "#calenderSecondarySelector",--}}
            {{--format : "short",--}}
            {{--today    :true,--}}
            {{--date:'{{$date_Miladi}}',--}}
            {{--minDate  :'{{$dateNow}}',--}}
            {{--view:'day',--}}
            {{--methods: {--}}
            {{--    highlight(formatted, dateMoment, checkingFor) {--}}
            {{--        let attributes = {'title': 'Today is ' + formatted};--}}
            {{--        if (checkingFor === 'day' && formatted === '1400/07/28'){--}}
            {{--            attributes['class'] = 'highlighted-1';--}}
            {{--            attributes['title'] = 'جشن چهارشنبه سوری';--}}
            {{--        }--}}
            {{--        if (checkingFor === 'day' && formatted === '1400/7/29'){--}}
            {{--            attributes['class'] = 'highlighted-2';--}}
            {{--            attributes['title'] = 'روز ملی شدن صنعت نفت';--}}
            {{--        }--}}
            {{--        return attributes;--}}
            {{--    }--}}
            {{--}--}}

        });
        function changes_datepicker(){

            // var coach=$("#coach_id").val();
            // var calenderSelector=$("#calenderSelector").val();
            // if((coach==0) &&(calenderSelector==0) )
            // {
            //     var loading = '<div class="alert alert-warning" role="alert">خطا در انتخاب رزروها</div>';
            // }
            // else {
            //     var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
            //     $("#show_bookings").html(loading);
            //     $.ajax({
            //         type: 'GET',
            //         url: "/booking/createajax?coach=" + coach + "&calenderSelector=" + calenderSelector,
            //         success: function (data) {
            //             $("#show_bookings").html(data);
            //         }
            //     });
            // }

        }
        function toggleIcon(e) {
            $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('glyphicon-plus glyphicon-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);





        $('.vpd-day').click(function()
        {


        });

    </script>



@endsection
