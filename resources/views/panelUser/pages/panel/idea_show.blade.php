@extends('acckt_master.master.panel')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1">ثبت ایده</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/portal"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item active">ثبت ایده</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body"><!-- Form wizard with icon tabs section start -->
                <section id="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ثبت ایده</h4>
                                </div>
                                <div class="card-content mt-2">
                                    <div class="card-body">
                                        @if($errors->any())
                                            <div class="col-12">
                                                <div class="alert alert-danger" role="alert">
                                                    @foreach($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        <form  id="new_wizard_form"  data-request-validate class="wizard-validation" >

                                        <!-- Step 1 -->
                                            <h6>
                                                <i class="step-icon"></i>
                                                <span class="fonticon-wrap">
                                              <i class="livicon-evo" data-options="name:morph-doc.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                                            </span>
                                            </h6>
                                            <!-- Step 1 end-->
                                            <!-- body content step 1 -->
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="py-50">سرپرست تیم</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>باتوجه به گروه های تخصصی شتابدهنده اندیشه خوارزم ، ایده شما در کدام گروه قرار می گیرد؟</label>
                                                            <select class="form-control" id="group" name="group" disabled readonly="">
                                                                <option disabled selected>انتخاب کنید</option>
                                                                <option value="1" @if($idea->group==1) selected @endif>تجارت الکترونیک</option>
                                                                <option value="2" @if($idea->group==2) selected @endif>سلامت</option>
                                                                <option value="3" @if($idea->group==3) selected @endif>گردشگری</option>
                                                                <option value="4" @if($idea->group==4) selected @endif>سایر حوزه های مرتبط با IT</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>ایده شما درکدام دسته بندی رایج ایده ها واقع شده است؟</label>
                                                            <select class="form-control" id="category" name="category" disabled readonly="">
                                                                <option value="1" @if($idea->category==1) selected @endif>کاملا جدید</option>
                                                                <option value="2" @if($idea->category==2) selected @endif>بازتولید با نگاه نوآورانه</option>
                                                                <option value="3" @if($idea->category==3) selected @endif>مهندس معکوس</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>وضعیت</label>
                                                            <select class="form-control" id="status" name="status" disabled readonly="">
                                                                <option value="1" @if($idea->status==1) selected @endif>فعال</option>
                                                                <option value="2" @if($idea->status==2) selected @endif>مسدود شده</option>
                                                                <option value="3" @if($idea->group==3) selected @endif>بستن</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- body content step 1 end-->
                                            <!-- Step 2 -->
                                            <h6>
                                                <i class="step-icon"></i>
                                                <span class="fonticon-wrap">
                                              <i class="livicon-evo" data-options="name:users.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                                            </span>
                                            </h6>
                                            <!-- Step 2 end-->
                                            <!-- body content of step 2 -->
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="py-50">مشخصات گروه کاری</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>نام گروه</label>
                                                            <input type="text" id="group_name" name="group_name" class="form-control required"  value="{{$idea->group_name}}" disabled readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">اعضای گروه</h4>
                                                                </div>
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <div data-repeater-list="contact">
                                                                            <div class="row">
                                                                                <!--<div class="col-12 mb-2">
                                                                                    <button class="btn btn-icon rounded-circle btn-primary" type="button" data-repeater-create="">
                                                                                        <i class="bx bx-plus"></i>
                                                                                    </button>
                                                                                    <span class="ml-1 font-weight-bold text-primary">افزودن جدید</span>
                                                                                </div>-->
                                                                                <div class="col-md-2 col-2 mb-50">
                                                                                    <label class="text-nowrap">نام و نام خانوادگی</label>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 mb-50">
                                                                                    <label class="text-nowrap">تاریخ تولد</label>
                                                                                </div>
                                                                                <div class="col-md-1 col-1 mb-50">
                                                                                    <label class="text-nowrap">تلفن همراه</label>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 mb-50">
                                                                                    <label class="text-nowrap">پست الکترونیکی</label>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 mb-50">
                                                                                    <label class="text-nowrap">مدرک تحصیلی و رشته تحصیلی</label>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 mb-50">
                                                                                    <label class="text-nowrap">تخصص در تیم</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-between" data-repeater-item="">
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="full_name[]" class="form-control required" placeholder="نام و نام خانوادگی" value="{{$idea->full_name[0]}}" disabled readonly>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="birth_date[]" class="form-control birthdate-picker required" placeholder="تاریخ تولد" value="{{$idea->birth_date[0]}}" disabled readonly>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="mobile[]" class="form-control text-left required" placeholder="تلفن همراه" dir="ltr" value="{{$idea->mobile[0]}}" disabled readonly>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="email[]" class="form-control text-left required" placeholder="پست الکترونیکی" dir="ltr" value="{{$idea->email[0]}}" disabled readonly>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="degree_and_field_of_study[]" class="form-control text-left required" placeholder="مدرک تحصیلی و رشته تحصیلی" dir="ltr" value="{{$idea->degree_and_field_of_study[0]}}" disabled readonly>
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="specialty[]" class="form-control text-left" placeholder="تخصص در تیم" dir="ltr" value="{{$idea->specialty[0]}}" disabled readonly>
                                                                                </div>
                                                                                <!--<div class="col-md-1 col-1 form-group">
                                                                                    <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete="">
                                                                                        <i class="bx bx-x"></i>
                                                                                    </button>
                                                                                </div>-->
                                                                            </div>
                                                                            <div class="row justify-content-between" data-repeater-item="">
                                                                                <div class="col-md-2 col-2 form-group d-flex align-items-center">
                                                                                    <input type="text" name="full_name[]" class="form-control" placeholder="نام و نام خانوادگی">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="birth_date[]" class="form-control birthdate-picker" placeholder="تاریخ تولد">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="mobile[]" class="form-control text-left" placeholder="تلفن همراه" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="email[]" class="form-control text-left" placeholder="پست الکترونیکی" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="degree_and_field_of_study[]" class="form-control text-left" placeholder="مدرک تحصیلی و رشته تحصیلی" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="specialty[]" class="form-control text-left" placeholder="تخصص در تیم" dir="ltr">
                                                                                </div>
                                                                                <!--<div class="col-md-1 col-1 form-group">
                                                                                    <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete="">
                                                                                        <i class="bx bx-x"></i>
                                                                                    </button>
                                                                                </div>-->
                                                                            </div>
                                                                            <div class="row justify-content-between" data-repeater-item="">
                                                                                <div class="col-md-2 col-2 form-group d-flex align-items-center">
                                                                                    <input type="text" name="full_name[]" class="form-control" placeholder="نام و نام خانوادگی">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="birth_date[]" class="form-control birthdate-picker" placeholder="تاریخ تولد">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="mobile[]" class="form-control text-left" placeholder="تلفن همراه" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="email[]" class="form-control text-left" placeholder="پست الکترونیکی" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="degree_and_field_of_study[]" class="form-control text-left" placeholder="مدرک تحصیلی و رشته تحصیلی" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="specialty[]" class="form-control text-left" placeholder="تخصص در تیم" dir="ltr">
                                                                                </div>
                                                                                <!--<div class="col-md-1 col-1 form-group">
                                                                                    <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete="">
                                                                                        <i class="bx bx-x"></i>
                                                                                    </button>
                                                                                </div>-->
                                                                            </div>
                                                                            <div class="row justify-content-between" data-repeater-item="">
                                                                                <div class="col-md-2 col-2 form-group d-flex align-items-center">
                                                                                    <input type="text" name="full_name[]" class="form-control" placeholder="نام و نام خانوادگی">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="birth_date[]" class="form-control birthdate-picker" placeholder="تاریخ تولد">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="mobile[]" class="form-control text-left" placeholder="تلفن همراه" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="email[]" class="form-control text-left" placeholder="پست الکترونیکی" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="degree_and_field_of_study[]" class="form-control text-left" placeholder="مدرک تحصیلی و رشته تحصیلی" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="specialty[]" class="form-control text-left" placeholder="تخصص در تیم" dir="ltr">
                                                                                </div>
                                                                                <!--<div class="col-md-1 col-1 form-group">
                                                                                    <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete="">
                                                                                        <i class="bx bx-x"></i>
                                                                                    </button>
                                                                                </div>-->
                                                                            </div>
                                                                            <div class="row justify-content-between" data-repeater-item="">
                                                                                <div class="col-md-2 col-2 form-group d-flex align-items-center">
                                                                                    <input type="text" name="full_name[]" class="form-control" placeholder="نام و نام خانوادگی">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="birth_date[]" class="form-control birthdate-picker" placeholder="تاریخ تولد">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="mobile[]" class="form-control text-left" placeholder="تلفن همراه" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="email[]" class="form-control text-left" placeholder="پست الکترونیکی" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="degree_and_field_of_study[]" class="form-control text-left" placeholder="مدرک تحصیلی و رشته تحصیلی" dir="ltr">
                                                                                </div>
                                                                                <div class="col-md-2 col-2 form-group">
                                                                                    <input type="text" name="specialty[]" class="form-control text-left" placeholder="تخصص در تیم" dir="ltr">
                                                                                </div>
                                                                                <!--<div class="col-md-1 col-1 form-group">
                                                                                    <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete="">
                                                                                        <i class="bx bx-x"></i>
                                                                                    </button>
                                                                                </div>-->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- body content of step 2 end-->
                                            <!-- Step 3 -->
                                            <h6>
                                                <i class="step-icon"></i>
                                                <span class="fonticon-wrap">
                                              <i class="livicon-evo" data-options="name:home.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                                            </span>
                                            </h6>
                                            <!-- Step 3 end-->
                                            <!-- body content of Step 3 -->
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="py-50">مشخصات ایده</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>عنوان ایده</label>
                                                                <input type="text" id="title" name="title" class="form-control text-left required" placeholder="عنوان ایده" value="{{$idea->title}}" disabled readonly dir="ltr">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>شرح ایده ( مختصر ، دقیق ، صریح):</label>
                                                            <textarea rows="4" id="description" name="description" class="form-control required" disabled readonly>{{$idea->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>آیا ایده شما بر گرفته از موارد مشابهی است ؟ (در صورت وجود نام ببرید)</label>
                                                            <input type="text" id="similar_idea" name="similar_idea" class="form-control text-left required" placeholder="" value="{{$idea->similar_idea}}" disabled readonly dir="ltr">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>ایده شما در چه مرحله است؟</label>
                                                                <select class="form-control" id="level" name="level" disabled readonly>
                                                                    <option value="1" @if($idea->level==1) selected @endif>ظهور</option>
                                                                    <option value="2" @if($idea->level==2) selected @endif>پردازش اولیه</option>
                                                                    <option value="3" @if($idea->level==3) selected @endif>رشد یافته (بلوغ)</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>میزان سرمایه ای مورد نیاز برای شروع ایده چقدر است؟</label>
                                                                <select class="form-control" id="amountcapitals" name="amountcapitals_id" disabled readonly>
                                                                    <option selected disabled>انتخاب کنید</option>
                                                                    <option value="1" @if($idea->amountcapitals_id==1) selected @endif>کمتر از یک میلیارد تومان</option>
                                                                    <option value="2" @if($idea->amountcapitals_id==2) selected @endif >بین یک تا دو میلیارد تومان</option>
                                                                    <option value="3" @if($idea->amountcapitals_id==3) selected @endif>بیش از دو میلیارد تومان</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>ویژگی مشخص ایده شما چیست ؟ (چه چیزی شما را از رقبا متمایز می کند؟)</label>
                                                            <textarea rows="4" id="idea_property" name="idea_property" class="form-control required" readonly disabled>{{$idea->property}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>درخواست شما از شتابدهنده چیست؟</label>
                                                            <textarea rows="4" id="your_request" name="your_request" class="form-control" disabled readonly>{{$idea->your_request}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- body content of Step 3 end-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Vertically Centered modal Modal -->
    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">ثبت ایده</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        با ثبت ایده در پرتال شتابدهنده به فروشگاه ایده وارد شوید
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">بعدا یاداوری کن</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">ثبت ایده</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#ModalCenter').modal('show');
        });
    </script>
@endsection
