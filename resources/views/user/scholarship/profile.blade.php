@extends('user.master.index')

@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/timepicker.min.css')}}" rel="stylesheet" />
    <link src="{{asset('/css/jquery-book.css')}}"></link>
    <link href="{{asset('/css/slick.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/slick-theme.css')}}" rel="stylesheet" />
    <style>
        #fff{
            border: 2px solid rgba(2,1,19,.81);
            border-radius:20px;
        }
        .progress
        {
            position:relative;
        }

        .progress span {
            position:absolute;
            left:0;
            width:100%;
            text-align:center;
            z-index:2;
            font-weigh:bold;
        }

        .progress{
            height: 25px;
            background: #262626;
            padding: 5px;
            overflow: visible;
            border-radius: 20px;
            border-top: 1px solid #000;
            border-bottom: 1px solid #7992a8;
            margin-top: 50px;
        }

        .progress .progress-bar{
            border-radius: 20px;
            position: relative;
            animation: animate-positive 2s;
        }

        .progress .progress-value{
            display: block;
            padding: 3px 7px;
            font-size: 13px;
            color: #fff;
            border-radius: 4px;
            background: #191919;
            border: 1px solid #000;
            position: absolute;
            top: -40px;
            right: -10px;
        }

        .progress .progress-value:after{
            content: "";
            border-top: 10px solid #191919;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            position: absolute;
            bottom: -6px;
            left: 26%;
        }

        .progress-bar.active{
            animation: reverse progress-bar-stripes 0.40s linear infinite, animate-positive 2s;
        }

        @-webkit-keyframes animate-positive{
            0% { width: 0; }
        }

        @keyframes animate-positive{
            0% { width: 0; }
        }

        #bd-root-tarikh_zemanat
        {
            display: inline !important;
        }
    </style>
@endsection

@section('content')
    <div class="col-md-12">
        <ul class="nav nav-tabs d-none d-sm-flex " id="myTab" role="tablist">
            @if($scholarship->resource=='knot')
                <li class="nav-item" role="learn">
                    <button class="nav-link active @if($scholarship->confirm_webinar==1) bg-success @endif" id="learn-tab" data-toggle="tab" data-target="#learn" type="button" role="tab" aria-controls="learn" aria-selected="false">دوره آموزشی</button>
                </li>
                <li class="nav-item" role="exam">
                    <button class="nav-link @if($scholarship->confirm_exam==1) bg-success @endif " id="exam-tab" data-toggle="tab" data-target="#exam" type="button" role="tab" aria-controls="exam" aria-selected="false">آزمون و گواهینامه</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link  " id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">توضیحات بورسیه</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-success" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">فرم ثبت نام</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if(strlen($scholarship->user->fname)>0 && strlen($scholarship->user->lname)>0 && strlen($scholarship->user->sex)>0&&strlen($scholarship->user->codemelli)>0&&strlen($scholarship->user->shenasname)>0&&strlen($scholarship->user->datebirth)>0&&strlen($scholarship->user->personal_image)>0 && strlen($scholarship->user->tel)>0 && strlen($scholarship->user->email)>0 && strlen($scholarship->user->state)>0&&strlen($scholarship->user->city)>0&&strlen($scholarship->user->address)>0 && strlen($scholarship->user->father)>0 && strlen($scholarship->user->married)>0 && strlen($scholarship->user->born)>0 && strlen($scholarship->user->education)>0&&strlen($scholarship->user->reshteh)>0&&strlen($scholarship->user->job)>0&&strlen($scholarship->user->resume)>0 ) btn-success  @endif" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">اطلاعات کاربر</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="introduce-tab" data-toggle="tab" data-target="#introduce" type="button" role="tab" aria-controls="introduce" aria-selected="false">معرفی دوستان</button>
                </li>
                <li class="nav-item" role="introductionLetter">
                    <button class="nav-link @if(!is_null($scholarship->introductionletter)&&($scholarship->confirm_introductionletter!=0)&&($scholarship->confirm_introductionletter==2)&&($scholarship->confirm_introductionletter==4)) bg-success @endif " id="introductionLetter-tab" data-toggle="tab" data-target="#introductionLetter" type="button" role="tab" aria-controls="introductionLetter" aria-selected="false">معرفی نامه</button>
                </li>
                <li class="nav-item" role="interview">
                    <button class="nav-link @if(!is_null($scholarship->user->get_scholarshipInterview)) bg-success  @endif " id="interview-tab" data-toggle="tab" data-target="#interview" type="button" role="tab" aria-controls="interview" aria-selected="false">مصاحبه</button>
                </li>
                <li class="nav-item" role="result">
                    <button class="nav-link  @if(($scholarship->view_score==1)) bg-success @endif " id="result-tab" data-toggle="tab" data-target="#result" type="button" role="tab" aria-controls="result" aria-selected="false">نتیجه</button>
                </li>
                <li class="nav-item" role="payment">
                    <button class="nav-link @if(!is_null($scholarship->financial)) bg-success @endif " id="payment-tab" data-toggle="tab" data-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">ثبت نام</button>
                </li>
                <li class="nav-item " role="collabration">
                    <button class="nav-link" id="collabration-tab" data-toggle="tab" data-target="#collabration" type="button" role="tab" aria-controls="collabration" aria-selected="false">همکاری</button>
                </li>
                <li class="nav-item " role="contract">
                    <button class="nav-link" id="contract-tab" data-toggle="tab" data-target="#contract" type="button" role="tab" aria-controls="contract" aria-selected="false">تعهدنامه</button>
                </li>
                <li class="nav-item" role="support">
                    <button class="nav-link" id="support-tab" data-toggle="tab" data-target="#support" type="button" role="tab" aria-controls="support" aria-selected="false">پشتیبان</button>
                </li>
            @elseif($scholarship->resource=='scholarship')
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">توضیحات بورسیه</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-success" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">فرم ثبت نام</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if(strlen($scholarship->user->fname)>0 && strlen($scholarship->user->lname)>0 && strlen($scholarship->user->sex)>0&&strlen($scholarship->user->codemelli)>0&&strlen($scholarship->user->shenasname)>0&&strlen($scholarship->user->datebirth)>0&&strlen($scholarship->user->personal_image)>0 && strlen($scholarship->user->tel)>0 && strlen($scholarship->user->email)>0 && strlen($scholarship->user->state)>0&&strlen($scholarship->user->city)>0&&strlen($scholarship->user->address)>0 && strlen($scholarship->user->father)>0 && strlen($scholarship->user->married)>0 && strlen($scholarship->user->born)>0 && strlen($scholarship->user->education)>0&&strlen($scholarship->user->reshteh)>0&&strlen($scholarship->user->job)>0&&strlen($scholarship->user->resume)>0 ) btn-success  @endif" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">اطلاعات کاربر</button>
                </li>
                <li class="nav-item" role="learn">
                    <button class="nav-link @if($scholarship->confirm_webinar==1) bg-success @endif" id="learn-tab" data-toggle="tab" data-target="#learn" type="button" role="tab" aria-controls="learn" aria-selected="false">دوره آموزشی</button>
                </li>
                <li class="nav-item" role="exam">
                    <button class="nav-link @if($scholarship->confirm_exam==1) bg-success @endif " id="exam-tab" data-toggle="tab" data-target="#exam" type="button" role="tab" aria-controls="exam" aria-selected="false">آزمون و گواهینامه</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="introduce-tab" data-toggle="tab" data-target="#introduce" type="button" role="tab" aria-controls="introduce" aria-selected="false">معرفی دوستان</button>
                </li>
                <li class="nav-item" role="introductionLetter">
                    <button class="nav-link @if(!is_null($scholarship->introductionletter)&&($scholarship->confirm_introductionletter!=0)&&($scholarship->confirm_introductionletter==2)&&($scholarship->confirm_introductionletter==4)) bg-success @endif " id="introductionLetter-tab" data-toggle="tab" data-target="#introductionLetter" type="button" role="tab" aria-controls="introductionLetter" aria-selected="false">معرفی نامه</button>
                </li>
                <li class="nav-item" role="interview">
                    <button class="nav-link @if(!is_null($scholarship->user->get_scholarshipInterview)) bg-success  @endif " id="interview-tab" data-toggle="tab" data-target="#interview" type="button" role="tab" aria-controls="interview" aria-selected="false">مصاحبه</button>
                </li>
                <li class="nav-item" role="result">
                    <button class="nav-link  @if(($scholarship->view_score==1)) bg-success @endif " id="result-tab" data-toggle="tab" data-target="#result" type="button" role="tab" aria-controls="result" aria-selected="false">نتیجه</button>
                </li>
                <li class="nav-item" role="payment">
                    <button class="nav-link @if(!is_null($scholarship->financial)) bg-success @endif  " id="payment-tab" data-toggle="tab" data-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">ثبت نام</button>
                </li>
                <li class="nav-item " role="collabration">
                    <button class="nav-link" id="collabration-tab" data-toggle="tab" data-target="#collabration" type="button" role="tab" aria-controls="collabration" aria-selected="false">همکاری</button>
                </li>
                <li class="nav-item " role="contract">
                    <button class="nav-link" id="contract-tab" data-toggle="tab" data-target="#contract" type="button" role="tab" aria-controls="contract" aria-selected="false">تعهدنامه</button>
                </li>

                <li class="nav-item" role="support">
                    <button class="nav-link" id="support-tab" data-toggle="tab" data-target="#support" type="button" role="tab" aria-controls="support" aria-selected="false">پشتیبان</button>
                </li>
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade @if($scholarship->resource=='scholarship') show active     @endif" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="d-block text-dark text-center" style="line-height: 2">طرح اعطای بورسیه کوچینگ آکادمی بین المللی فراکوچ</h3>
                <div class="card">
                    <div class="card-body shadow shadow-sm text-center">
                        <img src="{{asset('/images/info_boursieh_01.jpg')}}" class="img-fluid" />
                        <p style="line-height: 2" class="text-center">شناسایی و دعوت از افراد نخبه و با استعداد جهت حضور ویژه</p>
                        <p style="line-height: 2;text-align: justify">آکادمی بین المللی فراکوچ فرصت بی نظیری را به منظور ورود و پیوستن جمع بیشتری از افراد مستعد ، نخبه و فرهیخته جامعه - به ویژه اساتید ،  پژوهشگران، اندیشمندان، مدیران و دانشجویان برتر - به دنیای حرفه ای کوچینگ از طریق ایجاد شرایط ویژه حضور آنان در دوره های آموزش و تربیت کوچ حرفه ای ، فراهم کرده است.</p>
                        <b class="d-block mb-2">نمونه مدرک </b>
                        <img src="{{asset('/images/ICF_scholarship_example.jpg')}}" class="img-fluid text-center" />
                    </div>
                </div>
                <button class="btn btn-primary" id="contact-tab2" onclick="document.getElementById('contact-tab').click()">مرحله بعد</button>

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                @if($scholarship->resource=='knot')
                    @include('user.knot.contact')
                @elseif($scholarship->resource=='scholarship')
                    @include('user.scholarship.contact')
                @endif
                <button class="btn btn-primary" id="contact-tab2" onclick="document.getElementById('profile-tab').click()">مرحله بعد</button>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @include('user.scholarship.profile_schoalrship')
                <button class="btn btn-primary" id="contact-tab2" onclick="document.getElementById('introduce-tab').click()">مرحله بعد</button>
            </div>
            <div class="tab-pane fade" id="introduce" role="tabpanel" aria-labelledby="introduce-tab">
                @include('user.scholarship.introduce')
            </div>
            <div class="tab-pane fade @if($scholarship->resource=='knot') show active  @endif" id="learn" role="tabpanel" aria-labelledby="learn-tab">
                @include('user.scholarship.learn')
            </div>
            <div class="tab-pane fade " id="introductionLetter" role="tabpanel" aria-labelledby="introductionLetter-tab">
                @include('user.scholarship.introductionLetter')
            </div>

            <div class="tab-pane fade " id="exam" role="tabpanel" aria-labelledby="exam-tab">
                @include('user.scholarship.exam')

            </div>
            <div class="tab-pane fade " id="interview" role="tabpanel" aria-labelledby="interview-tab">
                <div class="card-body" >
                    @if($scholarship->view_score==1)
                        @if(is_null($scholarship->user->get_scholarshipInterview))
                            <div class="alert alert-warning">شما هنوز در مصاحبه شرکت نکرده اید</div>
                        @else
                            <div class="alert alert-primary">شما در مصاحبه بورسیه کوچینگ {{$scholarship->user->get_scholarshipInterview->score}} امتیاز کسب کرده اید</div>
                        @endif
                    @else
                        <div class="alert alert-warning">
                            امتیاز بورسیه شما در سیستم ثبت شد
                        </div>
                    @endif
                </div>
            </div>
            <div class="tab-pane fade " id="result" role="tabpanel" aria-labelledby="result-tab">
                <div class="card-body" >
                    @include('user.scholarship.result')
                </div>

            </div>
            <div class="tab-pane fade " id="rante" role="tabpanel" aria-labelledby="rante-tab">
                <div class="card-body" >

                </div>

            </div>
            <div class="tab-pane fade " id="payment" role="tabpanel" aria-labelledby="payment-tab">
                @include('user.scholarship.payment')
            </div>
            <div class="tab-pane fade " id="contract" role="tabpanel" aria-labelledby="contract-tab">
                @include('user.scholarship.contract')
            </div>
            <div class="tab-pane fade " id="support" role="tabpanel" aria-labelledby="support-tab">
                @include('user.scholarship.support')
            </div>
            <div class="tab-pane fade " id="collabration" role="tabpanel" aria-labelledby="collabration-tab">
                @include('user.scholarship.collabration')
            </div>


            <div class="tab-pane fade " id="contract" role="tabpanel" aria-labelledby="contract-tab">
                @include('user.scholarship.contract')
            </div>
        </div>
    </div>

    <div class="col-12 nav_position_bottom d-block d-sm-none " dir="ltr" style="position: fixed;bottom: 0px;background-color: #F2F4F4">
        <div role="presentation" role="home">
            <button class="btn btn-primary" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">توضیحات</button>
        </div>
        <div role="presentation">
            <button class="btn btn-primary" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">فرم اولیه بورسیه</button>
        </div>
        <div role="profile">
            <button class="btn btn-primary" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">اطلاعات کاربر</button>
        </div>
        <div  role="presentation">
            <button class="btn btn-primary" id="introduce-tab" data-toggle="tab" data-target="#introduce" type="button" role="tab" aria-controls="introduce" aria-selected="false">معرفی دوستان</button>
        </div>
        <div  role="learn">
            <button class="btn btn-primary" id="learn-tab" data-toggle="tab" data-target="#learn" type="button" role="tab" aria-controls="learn" aria-selected="false">دوره آموزشی</button>
        </div>
        <div  role="exam">
            <button class="btn btn-primary" id="exam-tab" data-toggle="tab" data-target="#exam" type="button" role="tab" aria-controls="exam" aria-selected="false">آزمون و گواهینامه</button>
        </div>
        <div  role="introductionLetter">
            <button class="btn btn-primary" id="introductionLetter-tab" data-toggle="tab" data-target="#introductionLetter" type="button" role="tab" aria-controls="introductionLetter" aria-selected="false">معرفی نامه</button>
        </div>
        <div  role="interview">
            <button class="btn btn-primary" id="interview-tab" data-toggle="tab" data-target="#interview" type="button" role="tab" aria-controls="interview" aria-selected="false">مصاحبه</button>
        </div>
        <div  role="result">
            <button class="btn btn-primary" id="result-tab" data-toggle="tab" data-target="#result" type="button" role="tab" aria-controls="result" aria-selected="false">نتیجه</button>
        </div>
        <div role="payment">
            <button class="btn btn-primary @if(is_null($scholarship->user->get_scholarshipInterview)) disabled @endif" id="payment-tab" data-toggle="tab" data-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">ثبت نام</button>
        </div>
        <div role="collabration">
            <button class="btn btn-primary" id="collabration-tab" data-toggle="tab" data-target="#collabration" type="button" role="tab" aria-controls="collabration" aria-selected="false">همکاری</button>
        </div>
        <div role="contract">
            <button class="btn btn-primary" id="contract-tab" data-toggle="tab" data-target="#contract" type="button" role="tab" aria-controls="contract" aria-selected="false">تعهدنامه</button>
        </div>

        <div role="support">
            <button class="btn btn-primary" id="support-tab" data-toggle="tab" data-target="#support" type="button" role="tab" aria-controls="support" aria-selected="false">پشتیبان</button>
        </div>
    </div>
@endsection


@section('footerScript')
    <!--  DATE SHAMSI PICKER  --->
    <script src="{{asset('/js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('/js/kamadatepicker.holidays.js')}}"></script>
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

        kamaDatepicker('tarikh_zemanat',
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

        kamaDatepicker('expire',
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

    <script>
        function collabration_category(id)
        {

            $.ajax({
                url:'/panel/scholarship/me/collabration_category/'+id,
                type:'GET',
                success:function(data)
                {
                    $('#collabration_category').html(data);
                }
            })
        }



        function collabration_details(id)
        {
            $.ajax({
                url:'/panel/scholarship/me/collabration_details/'+id,
                type:'GET',
                success:function(data)
                {
                    $('#collabration_category').html(data);
                }
            })
        }

        var input = document.querySelector("#tel_introduce");
        var intl=intlTelInput(input,{
            formatOnDisplay:false,
            separateDialCode:true,
            preferredCountries:["ir", "gb"]
        });

        input.addEventListener("countrychange", function() {
            document.querySelector("#tel_org_introduce").value=intl.getNumber();
        });

        $('#tel_introduce').change(function()
        {
            document.querySelector("#tel_org_introduce").value=intl.getNumber();
        });


        // تلفن معرف
        var input1 = document.querySelector("#introduced_profile");
        var intl1=intlTelInput(input1,{
            formatOnDisplay:false,
            separateDialCode:true,
            preferredCountries:["ir", "gb"]
        });

        input1.addEventListener("countrychange", function() {
            document.querySelector("#introduced").value=intl1.getNumber();
        });

        $('#introduced_profile').change(function()
        {
            document.querySelector("#introduced").value=intl1.getNumber();
            var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
            $("#feedback_introduced").html(loading);
            var data=$("#introduced").val();
            if(data.length>0)
            {
                $.ajax({
                    type:'GET',
                    url:"/check/user/"+data,
                    success:function(data)
                    {
                        $("#feedback_introduced").html(data);
                    }
                });
            }
            else
            {
                data="<input type='hidden' value='' name='introduced'/>";
                $("#feedback_introduced").html(data);
            }
        });


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
                    $("#gettingknow_profile").html(data);
                }
            });

        });


        $("#personal_link").click(function()
        {
            if (window.isSecureContext && navigator.clipboard) {
                navigator.clipboard.writeText($('#personal_link').text());
            } else {
                unsecuredCopyToClipboard($('#personal_link').text());
            }


            alert('لینک دعوت اختصاصی شما کپی شد');
        });


        function checkCodeWebinar()
        {
            $('#result_checkCodeWebinar').html('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
            var data=$('#frm_checkCodeWebinar').serialize();
            data=
                {
                    "_token": "{{ csrf_token() }}",
                    'code1':$('#code1').val(),
                    'code2':$('#code2').val(),
                    'code3':$('#code3').val(),
                };
           $.ajax(
               {
                   data:data,
                   url:'/panel/scholarship/store_webinarCode',
                   type:'POST',
                   success: function (data) {
                       $('#result_checkCodeWebinar').html(data);

                       // $('#result_checkCodeWebinar').html("<div class='alert alert-success'>کد صحیح وارد شد</div>");
                   },
                   error : function(data)
                   {
                       $('#result_checkCodeWebinar').text(data.responseJSON.errors);
                       errorsHtml='<div class="alert alert-danger text-left"><ul>';
                       $.each( data.responseJSON.errors, function( key, value ) {
                           errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                       });
                       errorsHtml += '</ul></div>';
                       $( '#result_checkCodeWebinar' ).html( errorsHtml );
                   }
               }
           );
        };

        //نمایش جدول پرداخت بورسیه

        /*
        $('[name="paymentCourse_radio"]').change(function()
        {

            var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
            $("#show_payment_scholarship").html(loading);
            var data=$(this).val();

                $.ajax({
                    type:'POST',
                    url:"/panel/scholarship/ajax_payment",
                     data:
                     {
                         'id':$(this).val(),
                         '_token':"{{ csrf_token() }}",
                     },
                    success:function(data)
                    {
                        $("#show_payment_scholarship").html(data);
                    }
                });
        });*/

    </script>

    <script src="{{asset('/js/jquery.autotab.min.js')}}"></script>
    <script>
        $(function () {
            $('.code').autotab();
        });
    </script>


    <script src="{{asset('/js/jquery-3.5.1.min.js')}}" ></script>
    <script src="{{asset('/js/jquery-ui.min.js')}}" ></script>
    <script src="{{asset('/js/jquery-book.js')}}" ></script>
    <script src="{{asset('/js/jquery.validate.min.js')}}"></script>

    <script>
        $thing = $('#demo').book({
            onPageChange: updateProgress,
            speed:200}
        ).validate();


        function updateProgress(prevPageIndex, currentPageIndex, pageCount, pageName){
            t = (currentPageIndex / (pageCount-1)) * 100;
            $('.progress-bar').attr('aria-valuenow', t);
            $('.progress-bar').css('width', t+'%');
            //$('.progress span').text('Completed: '+Math.trunc(t)+'%');
            $('.progress-value').text(Math.trunc(t)+'%');
        }
    </script>

    <script src="{{asset('/js/slick.js')}}"></script>
    <script>
        $('.nav_position_bottom').slick({
            autoplay:true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows:false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows:false,
                    }
                }

            ]
        });


        function details_calculate(vals)
        {
            var check=parseInt($("#value").val().replace(/\,/g,''));

            vals=parseInt(vals);
            if($("#value").val().indexOf('%')!=-1)
            {
                $('#collabration_details_calculate').val(new Intl.NumberFormat().format((vals*check)/100));
            }
            else if(isNaN(check))
            {
                $('#collabration_details_calculate').val(new Intl.NumberFormat().format(vals));
            }
            else
            {
                if(isNaN(vals*check))
                {
                    $('#collabration_details_calculate').val(new Intl.NumberFormat().format(vals));
                }
                else
                {
                    $('#collabration_details_calculate').val(new Intl.NumberFormat().format(vals*check));
                }

            }

        }

        function collabration_details_accept()
        {
            $.ajax(
                {
                    data:$('#collabration_details_accept').serialize(),
                    url:'/panel/collabration_accept',
                    type:'POST',
                    success: function (data) {
                        $('#collabration_category').html(data);
                    },
                    error : function(data)
                    {
                        $('#collabration_category').text(data.responseJSON.errors);
                        errorsHtml='<div class="col-6 col-md-4  mb-1"> <button type="button" class="collabration_category btn btn-primary btn-block" data="0" onclick="collabration_category(0)">بازگشت</button> </div>      <div class="alert alert-danger text-left"><ul>';
                        $.each( data.responseJSON.errors, function( key, value ) {
                            errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></div>';
                        $( '#collabration_category' ).html( errorsHtml );
                    }
                }
            );
            return false;
        };


        function collabration_details_acceptShow()
        {
            $.ajax(
                {
                    url:'/panel/scholarship/me/collabrationAccept_ajax',
                    type:'get',
                    success: function (data) {
                        $('#collabrationAccept_ajax').html(data);
                    },
                    error : function(data)
                    {
                        $('#collabrationAccept_ajax').text(data.responseJSON.errors);
                        errorsHtml='<div class="alert alert-danger text-left"><ul>';
                        $.each( data.responseJSON.errors, function( key, value ) {
                            errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></div>';
                        $( '#collabrationAccept_ajax' ).html( errorsHtml );
                    }
                }
            );
            return false;
        };



        function collabration_details_acceptEdit(e)
        {
            var load='<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
            $.ajax(
                {
                    url:'/panel/scholarship/me/collabrationAcceptEdit_ajax/'+e,
                    type:'get',
                    success: function (data) {
                        $('#collabration_category').html(data);
                    },
                    error : function(data)
                    {
                        $('#collabration_category').text(data.responseJSON.errors);
                        errorsHtml='<div class="alert alert-danger text-left"><ul>';
                        $.each( data.responseJSON.errors, function( key, value ) {
                            errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></div>';
                        $( '#collabration_category' ).html( errorsHtml );
                    }
                }
            );
            return false;
        };

        function collabration_details_accept_update(e)
        {
            var load='<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
            $('#collabration_category').html(load);
             // var x=(e.getElementsByTagName('input')[2]);
            x=document.getElementById('collabration_details_accept_update');
            $.ajax(
                {
                    url:'/panel/scholarship/me/collabrationAcceptUpdate_ajax/',
                    data:$('#collabration_details_accept_update').serialize(),
                    type:'patch',
                    success:function(data){
                        $('#collabration_category').html(data);
                    }
                });
            return false;
        }


        function frm_pardakht_select(val)
        {
            let pardakhts=document.querySelectorAll('.pardakht');
            pardakhts.forEach(function (item)
            {
                item.classList.remove('show');
            });

            let wallets=document.querySelectorAll('.wallet');
            wallets.forEach(function (item)
            {
                item.classList.remove('show');
            });
            let content=document.querySelector('#'+val);
            document.querySelector('#'+val).classList.add('show');
        }

    </script>


@endsection
