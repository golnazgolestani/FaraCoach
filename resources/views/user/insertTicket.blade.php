@extends('user.master.index')
@section('headerScript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>
    <link href="{{asset('/trumbowyg-2.25.1/dist/ui/trumbowyg.min.css')}}" rel="stylesheet" />
    <style>
        .btn{
            background-color:#ffc107!important;
        }
        [data-toggle="collapse"]:after {
            display: inline-block;
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            content: "\f054";
            transform: rotate(90deg) ;
            transition: all linear 0.25s;
            float: right;
        }
        [data-toggle="collapse"].collapsed:after {
            transform: rotate(0deg) ;
        }
        a {
            color: #75818f;
        }
        .card {
            margin-bottom: 0.5rem!important;
        }
        #newTicket{
            display:none;
        }
    </style>
@endsection

@section('content')
    <!----------------------------------- TAKHFIF --------------------->
    <section class="col-12">
        <!--<div class="col-xl-6 col-md-6 col-sm-12 col-12 text-left float-left my-2">
            <i class="bi bi-x-square-fill"></i>
            <a class="text-decoration-none"> اینجا فراکوچ همیشه برات کلی تخفیف جذاب داره، از دستشون نده </a>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12 col-12 text-right float-left my-2">
            <a href=" " class="btn btn-secondary"> استفاده از تخفیف ها </a>
        </div>-->
        <div class="col-12 text-right my-2">
            <i class="bi bi-arrow-bar-right"></i>
            <a href="/panel/tickets"> بازگشت </a>
            <div>
    </section>
    <!----------------------------------- RESPONSE --------------------->
    <section class="col-12 text-justify float-right my-2">
        <h3>ارسال تیکت جدید</h3>
        <p>
            لطفا پیش از ارسال تیکت، سوالات رایج را مطالعه کرده و برای ثبت تیکت نیز با دقت کافی موضوع تیکت را انتخاب کنید تا تیکت شما به واحد مربوطه ارسال شود.
        </p>
        <p>
            . از ثبت تیکت های متعدد خودداری کرده و برای دریافت پاسخ در سریع ترین زمان، کلیه مشکلات و سوالات خود را صرفا در یک تیکت ارسال نمایید.
        </p>
        <p>
            . در صورت نیاز به ارائه دسترسی بخش مدیریت نام کاربری و رمز عبور را به طور کامل ارسال فرمایید
        </p>
        <!----------------------------------- FAQ --------------------->
        <div class="col-12 mt-5">
            <div class="mt-1" id="accordion" role="tablist">
                <div class="card border">
                    <div class="card-header" role="tab" id="headingOne">
                        <p class="mb-0">
                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                سوال 1
                            </a>
                        </p>
                    </div>
                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                        <hr/>
                        <div class="card-body">
                            ...............................................................................پاسخ سوال 1
                        </div>
                    </div>
                </div>
                <div class="card border">
                    <div class="card-header" role="tab" id="headingTwo">
                        <p class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                سوال 2
                            </a>
                        </p>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                        <hr/>
                        <div class="card-body">
                            ...............................................................................پاسخ سوال 2
                        </div>
                    </div>
                </div>
                <div class="card border">
                    <div class="card-header" role="tab" id="headingThree">
                        <p class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                سوال 3
                            </a>
                        </p>
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                        <hr/>
                        <div class="card-body">
                            ...............................................................................پاسخ سوال 3
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----------------------------------- BUTTOM NEW --------------------->
        <div class="text-center mt-5">
            <a href="#newTicket" class="btn btn-secondary btn-lg" onclick="show()">پاسخ سوال خودر ا پیدا نکردم  </a>
        </div>
    </section>
    <!----------------------------------- NEW TICKET--------------------->
    <section id="newTicket" class="col-12 text-justify float-left my-2">
        <div class="col-12 mt-1">
            <div class="mt-1" id="accordion-select" role="tablist">
                <div class="col-xl-6 col-md-6 col-sm-12 col-12 text-left float-left my-2">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">.لطفا دپارتمان مورد نظر خود را انتخاب کنید </label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected>جستجو...</option>
                        <option value="1">دپارتمان آموزش</option>
                        <option value="2">دپارتمان ثبت نام </option>
                        <option value="3">امور مالی</option>
                        <option value="3">کلینیک کوچینگ</option>
                        <option value="3">پشتیبانی سایت</option>
                        <option value="3">مدیریت</option>
                    </select>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 col-12 text-left float-left my-2">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">.لطفا نوع تیکت خود را انتخاب کنید </label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected>جستجو...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="p-1">
                <label for="titleTicket">موضوع تیکت</label>
                <input name="title" class="form-control" id="titleTicket" />
            </div>
        </div>
        <!----------------------------------- WRITE TICKET--------------------->
        <div class="p-1 mt-1">
            <textarea class="col-12 mt-1 p-2" name="tweet" id="tweet"></textarea>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12 col-12 text-left float-left my-2">
            <label for="formFile" class="form-label">انتخاب فایل مورد نظر</label>
            <input class=" form-control" type="file" id="formFile">
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12 col-12 text-right float-left my-2">
            <button type="button" class="btn btn-secondary btn-lg px-3 mt-2" id="insert_tweet">انتشار</button>
        </div>
    </section>
@endsection


@section('footerScript')

    <script src="{{asset('/trumbowyg-2.25.1/dist/trumbowyg.min.js')}}"></script>
    <script src="{{asset('/trumbowyg-2.25.1/dist/langs/fa.js')}}"></script>
    <script>
        $('#tweet').trumbowyg({
            lang:'fa',
            btns: [
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ]
        })
    </script>

    <script>
        function show()
        {
            document.getElementById("newTicket").style.display="block";
        }

    </script>
@endsection
