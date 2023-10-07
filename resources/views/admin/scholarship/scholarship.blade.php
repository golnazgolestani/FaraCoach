@extends('admin.master.index')
@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/timepicker.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

    <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center ">
        @if(is_null($scholarship->user->personal_image))
            <img src="{{asset('/documents/users/default-avatar.png')}}" width="100px" height="100px"  class="rounded-circle border border-3"/>
        @else
            <img src="{{asset('/documents/users/'.$scholarship->user->personal_image)}}" width="100px" height="100px" class="rounded-circle border border-3 " />
        @endif
        <p>
            <a href="/admin/user/{{$scholarship->user_id}}">
                {{$scholarship->user->fname." ".$scholarship->user->lname}}
            </a>
        </p>
        <p>وضعیت:
            @switch($scholarship->status)
                @case(0)بررسی نشده
                    @break
                @case(1)قبول درخواست
                    @break
                @case(2)رد درخواست
                    @break
                @case(3)در حال بررسی
                    @break
                @case(4)اصلاح درخواست
                    @break
                @default خطا
            @endswitch
        </p>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">فرم اولیه بورسیه</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">اطلاعات کاربر</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="introduce-tab" data-toggle="tab" data-target="#introduce" type="button" role="tab" aria-controls="introduce" aria-selected="false">معرفی دوستان</button>
                    </li>
                    <li class="nav-item" role="learn">
                        <button class="nav-link @if($scholarship->confirm_webinar)==1) bg-success @else  bg-danger  @endif" id="learn-tab" data-toggle="tab" data-target="#learn" type="button" role="tab" aria-controls="learn" aria-selected="false">آموزش</button>
                    </li>
                    <li class="nav-item" role="exam">
                        <button class="nav-link @if(count($scholarship->user->get_scholarshipexam)==0) bg-warning @elseif($scholarship->confirm_exam==1) bg-success @elseif($scholarship->confirm_exam==0) bg-danger @endif" id="exam-tab" data-toggle="tab" data-target="#exam" type="button" role="tab" aria-controls="exam" aria-selected="false">آزمون</button>
                    </li>
                    @if($scholarship->confirm_webinar==1 && $scholarship->confirm_exam==1)
                        <li class="nav-item" role="certificate">
                            <button class="nav-link" id="certificate-tab" data-toggle="tab" data-target="#certificate" type="button" role="tab" aria-controls="certificate" aria-selected="false">گواهینامه</button>
                        </li>
                    @endif
                    <li class="nav-item" role="introductionLetter">
                        <button class="nav-link @if(!is_null($scholarship->introductionletter)) bg-success @endif " id="introductionLetter-tab" data-toggle="tab" data-target="#introductionLetter" type="button" role="tab" aria-controls="introductionLetter" aria-selected="false">معرفی نامه</button>
                    </li>
                    <li class="nav-item" role="interview">
                        <button class="nav-link" id="interview-tab" data-toggle="tab" data-target="#interview" type="button" role="tab" aria-controls="interview" aria-selected="false">مصاحبه</button>
                    </li>
                    <li class="nav-item" role="result">
                        <button class="nav-link" id="result-tab" data-toggle="tab" data-target="#result" type="button" role="tab" aria-controls="result" aria-selected="false">نتیجه</button>
                    </li>
                    <li class="nav-item" role="payment">
                        <button class="nav-link @if(!is_null($scholarship->financial)) bg-success @endif" id="payment-tab" data-toggle="tab" data-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">ثبت نام</button>
                    </li>
                    <li class="nav-item " role="collabration">
                        <button class="nav-link" id="collabration-tab" data-toggle="tab" data-target="#collabration" type="button" role="tab" aria-controls="collabration" aria-selected="false">همکاری</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        @include('admin.scholarship.contact')
                        <button class="btn btn-primary" id="contact-tab2" onclick="document.getElementById('contact-tab').click()">مرحله بعد</button>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @include('admin.scholarship.profile')
                    </div>
                    <div class="tab-pane fade show" id="introduce" role="tabpanel" aria-labelledby="introduce-tab">
                        @include('admin.scholarship.introduce')
                    </div>
                    <div class="tab-pane fade " id="learn" role="tabpanel" aria-labelledby="learn-tab">
                        @include('admin.scholarship.learn')
                    </div>
                    <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="exam-tab">
                        @if(count($scholarship->user->get_scholarshipexam)==0)
                            <div class="alert alert-warning">در آزمون شرکت نکرده است</div>
                            <div class="row">
                                <div class="mx-auto col-12 col-md-4 text-center">
                                        <p>امتیاز از آزمون :  0 امتیاز</p>
                                </div>
                            </div>
                        @elseif($scholarship->user->get_scholarshipexam->last()->score>50)
                            <div class="alert alert-success">
                                در آزمون با نتیجه {{$scholarship->user->get_scholarshipexam->last()->score}} قبول شده است
                            </div>
                            <div class="row">
                                <div class="mx-auto col-12 col-md-4 text-center">
                                    @if(($scholarship->user->get_scholarshipexam->last()->score) >= 50 && ($scholarship->user->get_scholarshipexam->last()->score) <= 70)
                                        <p>امتیاز از آزمون :  5 امتیاز</p>
                                    @elseif(($scholarship->user->get_scholarshipexam->last()->score) > 70)
                                        <p>امتیاز از آزمون :  5 امتیاز</p>
                                    @endif
                                </div>
                            </div>
                        @elseif($scholarship->user->get_scholarshipexam->last()->score<50)
                            @foreach($scholarship->user->get_scholarshipExam as $item)
                                <div class="alert alert-warning">آزمون {{$loop->iteration}} نمره =  {{$item->score}}</div>
                            @endforeach
                            <div class="row">
                                <div class="mx-auto col-12 col-md-4 text-center">
                                    <p>امتیاز از آزمون :  5 امتیاز</p>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="tab-pane fade " id="certificate" role="tabpanel" aria-labelledby="certificate-tab">
                        <a href="{{asset('/admin/scholarship/certificate/'.$scholarship->user->id.'/download')}}" class="btn btn-primary">دانلود رزومه</a>
                    </div>

                    <div class="tab-pane fade " id="introductionLetter" role="tabpanel" aria-labelledby="introductionLetter-tab">
                        @include('admin.scholarship.introductionLetter')
                    </div>

                    <div class="tab-pane fade " id="interview" role="tabpanel" aria-labelledby="interview-tab">
                        @include('admin.scholarship.interview')
                    </div>
                    <div class="tab-pane fade " id="result" role="tabpanel" aria-labelledby="result-tab">
                        @include('admin.scholarship.result')
                    </div>
                    <div class="tab-pane fade " id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        @include('admin.scholarship.payment')
                    </div>
                    <div class="tab-pane fade" id="collabration" role="tabpanel" aria-labelledby="collabration-tab">
                        @include('admin.scholarship.collabration')
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection


@section('footerScript')
    <!--  DATE SHAMSI PICKER  --->
<script>
    import Lockscreen from "../../../../public/dashboard/pages/examples/lockscreen.html";
    export default {
        components: {Lockscreen}
    }
</script>
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

        kamaDatepicker('date_payment',
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


    <script>
        $('#scholarship_motivation,#scholarship_ability,#scholarship_obligation,#scholarship_impact,#scholarship_validity').change(function()
        {

            if(isNaN(parseInt($("#scholarship_motivation").val())))
            {
                var motivation=0;
            }
            else
            {
                var motivation=parseInt($("#scholarship_motivation").val());
            }

            if(isNaN(parseInt($("#scholarship_ability").val())))
            {
                var  ability=0;
            }
            else
            {
                var ability=parseInt($("#scholarship_ability").val());
            }

            if(isNaN(parseInt($("#scholarship_obligation").val())))
            {
                obligation=0;
            }
            else
            {
                var obligation=parseInt($("#scholarship_obligation").val());
            }


            if(isNaN(parseInt($("#scholarship_impact").val())))
            {
                var impact=0;
            }
            else
            {
                var impact=parseInt($("#scholarship_impact").val());
            }

            if(isNaN(parseInt($("#scholarship_validity").val())))
            {
                var validity=0;
            }
            else
            {
                var validity=parseInt($("#scholarship_validity").val());
            }

            var score=motivation+ability+obligation+impact+validity;
            $("#scholarship_score").val(score);
        });


        $('#collabrationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) ;
            var recipient = button.data('whatever');
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient);
            // modal.find('.modal-body input').val(recipient);
            $.ajax({
                url:'/admin/collabration_accept/'+recipient,
                success:function(data)
                {
                    $('#modal_collabration_value').val(data.value);
                    $('#modal_collabration_id').val(data.id);
                    $('#modal_collabration_count').val(data.count);
                    $('#modal_collabration_calculate').val(data.calculate);
                    $('#modal_collabration_description').val(data.description);
                    $('#modal_collabration_expire').val(data.expire);
                    $('#modal_collabration_form').attr("action","/admin/scholarship/"+data.id+"/update");
                    $("#modal_collabration_status option[value="+data.status+"]").prop('selected',true);
                }

            })

        });

       function details_calculate(vals)
        {
            console.log(vals);
            var check=parseInt($("#modal_collabration_value").val().replace(/\,/g,''));

            vals=parseInt(vals);
            if($("#modal_collabration_value").val().indexOf('%')!=-1)
            {
                $('#modal_collabration_calculate').val(new Intl.NumberFormat().format((vals*check)/100));
            }
            else if(isNaN(check))
            {
                $('#modal_collabration_calculate').val(new Intl.NumberFormat().format(vals));
            }
            else
            {
                if(isNaN(vals*check))
                {
                    $('#modal_collabration_calculate').val(new Intl.NumberFormat().format(vals));
                }
                else
                {
                    $('#modal_collabration_calculate').val(new Intl.NumberFormat().format(vals*check));
                }

            }


        }
    </script>

    <script>
        $('#score_payment').change(function()
        {
            $('#fi_final_payment').val(($('#fi_payment').val())-((parseInt($('#fi_payment').val())* parseInt($(this).val()))/100));
        });
    </script>

    <script src="{{asset('js/timepicker.js')}}"></script>
    <script>
        $(document).ready(function()
        {
            jQuery.noConflict();
            jQuery('#time_payment').timepicker();
        });
    </script>


@endsection
