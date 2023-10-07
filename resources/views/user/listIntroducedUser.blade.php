@extends('user.master.index')
@section('headerScript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>
    <link href="{{asset('/trumbowyg-2.25.1/dist/ui/trumbowyg.min.css')}}" rel="stylesheet" />    <style>
        .tab-content{
            background-color: #fdfdfd;
            padding: 30px;
        }
        ::placeholder {
            color: #d6d6d6!important;
            font-weight:100;
        }

        .btn {
            background-color: #ffc107!important;
        }
        h3{
            color:#1e448b;
        }
        .btn-send{
            direction:ltr;
        }
        .trumbowyg-button-pane{
            display:none;
        }
        .trumbowyg-box, .trumbowyg-editor{
            min-height:2.5rem;
            background-color:#fff;
        }
        .btn-icon{
            background-color:rgba(0, 0, 0, 0.05)!important ;
        }
        #viwe{
            display:none;
        }
        #follow{
            background-color:#fff;
        }

        .tabs{
            border: 1px solid #ddd;

        }
        nav > .nav.nav-tabs{
            border: none;
            color:#fff;
            background:#f5f5f5;
            border-radius:0;

        }
        nav > div a.nav-item.nav-link,
        nav > div a.nav-item.nav-link.active
        {
            border: none;
            padding: 18px 25px;
            color:#2b343e;
            background:#f5f5f5;
            border-radius:0;
        }

        nav > div a.nav-item.nav-link.active:after
        {
            content: "";
            position: relative;
            bottom: -60px;
            left: -10%;
        }
        .tab-content{
            background: #fdfdfd;
            line-height: 25px;
            padding:30px 25px;
        }

        nav > div a.nav-item.nav-link:hover,
        nav > div a.nav-item.nav-link:focus
        {
            border: none;
            background: #fff;
            color:#2b343e;
            border-radius:0;
            transition:background 0.20s linear;
            border-bottom: 3px solid #ffc107;
        }
        .nav.nav-tabs .nav-item{
            margin-left:0px!important;
        }
        td > img{
            width:3.5rem;
        }
        tr th, tr td {
            text-align:center;
        }
    </style>
@endsection

@section('content')

    @if($countIntroducedUser<150)
        <!------------------------------- CAPTION ----------------------------->
        <section class="col-12">
            <div class="row">
                <div class="col-12 text-center ">
                    <h3>همکاری در فروش فراکوچ</h3>
                </div>
                <div class="col-12 mt-1">
                    <h4>
                        <i class="bi bi-check-square-fill"></i>
                        لینک اختصاصی : به اشتراک بگذار و درآمد کسب کن!
                    </h4>
                    <p>
                        توضیح مدل درآمدی ...
                    </p>
                    <p>

                    </p>
                    <br/>
                </div>
                <div class="btn-p-e">
                    <a href="/courses" class="btn btn-secondary btn-lg mr-2">ورود به صفحه محصولات</a>
                    <a href="/event" class="btn btn-secondary btn-lg mr-2">ورود به صفحه رویدادها </a>
                </div>
            </div>
        </section>
        <!------------------------------- Form ----------------------------->
        <section class="col-12 mt-5">
            <h4>
                <i class="bi bi-check-square-fill"></i>
                دعوت مستقیم از دوستان
            </h4>
            <p>
                با دعوت از دوستان .....
            </p>
            <div class="col-12 border mt-2">
                <h5 class="mt-2 mb-1">مشخصات دوستان خود را جهت دعوت به فراکوچ وارد کنید</h5>
                <form method="post" action="/panel/introduced/add">
                    <div class="row pt-1 mt-1" id="formAddIntroduce">
                        {{csrf_field()}}
                        <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 ">
                            <small>نام:<span class="text-danger">*</span></small>
                            <div class="input-group mb-1">
                                <input type="text" class="form-control" placeholder="مثلا :علی  " name="fname" value="{{old('fname')}}"/>
                                <div class="input-group-prepend">

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 ">
                            <small>نام خانوادگی:<span class="text-danger">*</span></small>
                            <div class="input-group mb-1">
                                <input type="text" class="form-control" placeholder="مثلا: محمدی" name="lname" value="{{old('lname')}}" />
                                <div class="input-group-prepend">

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 ">
                            <small>تلفن همراه:<span class="text-danger">*</span></small>
                            <div class="input-group mb-1">
                                <input type="hidden" id="tel_org" value="{{old('tel')}}" name="tel"/>
                                <input id="tel" dir="ltr" type="tel" class="form-control" placeholder="مثلا : 09123456789" value="{{old('tel')}}" />
                                <div class="input-group-prepend">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 mt-1">
                            <small>جنسیت:<span class="text-danger">*</span></small>
                            <div class="input-group mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="sex1" name="sex" class="custom-control-input" value="1" {{ old('sex')=="1" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                    <label class="custom-control-label" for="sex1">آقا</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="sex0" name="sex" class="custom-control-input" value="0" {{ old('sex')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                    <label class="custom-control-label  ml-1" for="sex0">خانم</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 mt-1">
                            <small>پیگیری توسط:<span class="text-danger">*</span></small>
                            <div class="input-group mb-1">
                                @foreach($getFollowbyCategory as $item)
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio{{$item->id}}" name="followby_id" class="custom-control-input" value="{{$item->id}}">
                                        <label class="custom-control-label  ml-1" for="customRadio{{$item->id}}">{{$item->followby}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div><div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 mt-1">
                            <small> ارسال پیامک دعوت</small>
                            <div class="input-group mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="sms0" name="sms" class="custom-control-input" value="0" checked>
                                    <label class="custom-control-label" for="sms0">ارسال شود</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="sms1" name="sms" class="custom-control-input" value="1" >
                                    <label class="custom-control-label ml-1" for="sms1">ارسال نشود</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-1 mt-1">
                            <label for="tweet mt-1">توضیحات</label>
                            <textarea class="col-12 mt-1 p-2" name="tweet" id="tweet" placeholder="درج توضیحات...."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <div class="input-group mb-2 btn-send">
                                <!-- <button type="button" class="btn btn-primary" id="addFormIntroduce" title="اضافه کردن فرم جدید">+</button>-->
                                <button type="submit" class="btn btn-lg btn-secondary px-3">ثبت کاربر </button>
                            </div>
                        </div>
                    </div>
                </form>
        </section>
        <!------------------------------- FOLLWO UP  ----------------------------->
        <section class="col-12">
            <div class="text-center mt-5">
                <a href="#viwe" class="btn btn-secondary btn-lg" onclick="show()">نمایش تعداد دعوت شده ها توسط من  </a>
            </div>
        </section>
        <!------------------------------- FOLLWO UP ----------------------------->
    @endif
    <section class="col-12 mt-5 " id="viwe">
        <div class="row">
            <div class="col-12 text-center mt-1 mb-2 ">
                <h5 class="border rounded p-1" id="follow" data-bs-toggle="tooltip" data-bs-placement="top" title="در صورت تبدیل حداقل 5 نفر از دعوت شدگان شما به دانشجو امکان ثبت بیشتر از 50 نفر فعال خواهد شد">تعداد دوستان دعوت شده: <b>{{$countIntroducedUser}}  نفر </b> از 50 نفر </h5>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mt-1">
                <p>نمایش کاربران دعوت شده:</p>
                <form method="GET" action="/panel/introduced">
                    <div class="input-group mb-1">
                        <select class="custom-select" name="category">
                            <option disabled="disabled" selected="selected">انتخاب کنید</option>
                            <option value="0">نمایش همه</option>
                            <option value="notfollowup">پیگیری نشده</option>
                            <option value="continuefollowup">در حال پیگیری</option>
                            <option value="cancelfollowup">انصراف</option>
                            <option value="students">دانشجو</option>
                        </select>
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary text-light m-0 btn-icon" type="submit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-binoculars-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mt-1">
                <p>جستجو:</p>
                <form method="GET" action="/panel/introduced/search">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" name="q" />
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary btn-icon text-light m-0" type="submit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!------------------------------- Form ----------------------------->
        <div class="container mt-4 col-12">
            <div class="row">
                    <div class="col-12 tabs p-0">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">همه دوستان من  </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> پیگیری شده </a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">  پیگیری نشده  </a>
                                <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false"> تبدیل به مشتری </a>
                            </div>
                        </nav>
                        <!------------------------------- ALL CUSTOMERS ----------------------------->
                        <div class="tab-content py-2 px-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ردیف</th>
                                        <th scope="col">  </th>
                                        <th scope="col">نام و نام خانوادگی </th>
                                        <th scope="col">شماره تماس</th>
                                        <th scope="col">وضعیت </th>
                                        <th scop="col"> مشاهده </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listIntroducedUser as $item)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                <img class="profile rounde" src="{{asset('documents/users/'.$item->personal_image)}}" alt=""/>
                                            </td>
                                            <td>
                                                <div class="box-title">{{$item->fname.' '.$item->lname}}</div>
                                            </td>
                                            <td>
                                            <span>
                                                <a href="tel:{{$item->tel}}">{{$item->tel}}</a>
                                            </span>
                                            </td>
                                            <td>
                                                <a class="btn-modal-introduced btn btn-primary btn-sm" href="{{$item->id}}" title="نمایش" data-toggle="modal" data-target="#modal_introduced_profile">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="icons">
                                                    <a class="btn-modal-introduced btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" href="/panel/followup/{{$item->id}}" title="پیگیری" >
                                                        <i class="bi bi-asterisk"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!------------------------------- FOLLOW ----------------------------->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ردیف</th>
                                        <th scope="col">  </th>
                                        <th scope="col">نام و نام خانوادگی </th>
                                        <th scope="col">شماره تماس</th>
                                        <th scope="col">وضعیت </th>
                                        <th scop="col"> مشاهده </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listIntroducedUser as $item)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                <img class="profile rounde" src="{{asset('documents/users/'.$item->personal_image)}}" alt=""/>
                                            </td>
                                            <td>
                                                <div class="box-title">{{$item->fname.' '.$item->lname}}</div>
                                            </td>
                                            <td>
                                            <span>
                                                <a href="tel:{{$item->tel}}">{{$item->tel}}</a>
                                            </span>
                                            </td>
                                            <td>

                                                <a class="btn-modal-introduced btn btn-primary btn-sm" href="{{$item->id}}" title="نمایش" data-toggle="modal" data-target="#modal_introduced_profile">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="icons">
                                                    <a class="btn-modal-introduced btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" href="/panel/followup/{{$item->id}}" title="پیگیری" >
                                                        <i class="bi bi-asterisk"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!------------------------------- NO FOLLOW ----------------------------->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ردیف</th>
                                        <th scope="col">  </th>
                                        <th scope="col">نام و نام خانوادگی </th>
                                        <th scope="col">شماره تماس</th>
                                        <th scope="col">وضعیت </th>
                                        <th scop="col"> مشاهده </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listIntroducedUser as $item)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                <img class="profile rounde" src="{{asset('documents/users/'.$item->personal_image)}}" alt=""/>
                                            </td>
                                            <td>
                                                <div class="box-title">{{$item->fname.' '.$item->lname}}</div>
                                            </td>
                                            <td>
                                                <span>
                                                    <a href="tel:{{$item->tel}}">{{$item->tel}}</a>
                                                </span>
                                            </td>
                                            <td>
                                                <a class="btn-modal-introduced btn btn-primary btn-sm" href="{{$item->id}}" title="نمایش" data-toggle="modal" data-target="#modal_introduced_profile">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="icons">
                                                    <a class="btn-modal-introduced btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" href="/panel/followup/{{$item->id}}" title="پیگیری" >
                                                        <i class="bi bi-asterisk"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!------------------------------- CUSTOMERS ----------------------------->
                            <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ردیف</th>
                                        <th scope="col">  </th>
                                        <th scope="col">نام و نام خانوادگی </th>
                                        <th scope="col">شماره تماس</th>
                                        <th scope="col">محصول خریداری شده </th>
                                        <th scop="col"> مشاهده </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listIntroducedUser as $item)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                <img class="profile rounde" src="{{asset('documents/users/'.$item->personal_image)}}" alt=""/>
                                            </td>
                                            <td>
                                                <div class="box-title">{{$item->fname.' '.$item->lname}}</div>
                                            </td>
                                            <td>
                                            <span>
                                                <a href="tel:{{$item->tel}}">{{$item->tel}}</a>
                                            </span>
                                            </td>
                                            <td>

                                                <a class="btn-modal-introduced btn btn-primary btn-sm" href="{{$item->id}}" title="نمایش" data-toggle="modal" data-target="#modal_introduced_profile">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="icons">
                                                    <a class="btn-modal-introduced btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" href="/panel/followup/{{$item->id}}" title="پیگیری" >
                                                        <i class="bi bi-asterisk"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <div class="col-12 text-center">
                    {{$listIntroducedUser->links()}}
                </div>
            </div>
        </div>
        <!-- ************* Modal User introduced -->
        <!------------------------------------------ Modal ------------------------->
        <div class="modal fade" id="modal_introduced_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">مشخصات دوستان</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 text-center">
                            <div class="spinner-border text-primary text-center" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('footerScript')
    <script src="{{asset('/panel_assets/intl_tel/js/intlTelInput.js')}}"></script>
    <script src="{{asset('/panel_assets/intl_tel/js/utils.js')}}"></script>
    <script>

        var input = document.querySelector("#tel");
        var intl=intlTelInput(input,{
            formatOnDisplay:false,
            separateDialCode:true,
            preferredCountries:["ir", "gb"]
        });



        input.addEventListener("countrychange", function() {
            document.querySelector("#tel_org").value=intl.getNumber();
        });

        $('#tel').change(function()
        {
            document.querySelector("#tel_org").value=intl.getNumber();
        });
    </script>
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
            document.getElementById("viwe").style.display="block";
        }

    </script>
@endsection
