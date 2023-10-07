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
                            <h5 class="content-header-title float-left pr-1">تنظیمات حساب کاربری</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/portal"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item"> تنظیمات حساب کاربری</li>
                                    <li class="breadcrumb-item active">اطلاعات تکمیلی</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body"><!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                        @if($errors->any())
                                                            <div class="col-12">
                                                                <div class="alert alert-danger" role="alert">
                                                                    @foreach($errors->all() as $error)
                                                                        <li>{{$error}}</li>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <form method="POST" action="/portal_idea/user/{{Auth::user()->id}}" >
                                                            {{csrf_field()}}
                                                            {{method_field('PATCH')}}
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>تاریخ تولد</label>
                                                                            <input type="text" id="birth_date" name="birth_date" value="{{old('birth_date',Auth::user())->birth_date}}" class="form-control birthdate-picker" required placeholder="تاریخ تولد" data-validation-required-message="وارد کردن تاریخ تولد الزامی است">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>آدرس</label>
                                                                            <input type="text" id="address" name="address" class="form-control" placeholder="آدرس" value="{{old('address',Auth::user())->address}}" required data-validation-required-message="وارد کردن آدرس الزامی است">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>تلفن ثابت</label>
                                                                            <input type="text" id="phone" name="phone" class="form-control text-left" required placeholder="شماره تلفن" value="{{old('phone',Auth::user())->phone}}" data-validation-required-message="وارد کردن شماره تلفن الزامی است" dir="ltr">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>وب‌سایت</label>
                                                                        <input type="text" id="site" name="site" class="form-control text-left" placeholder="آدرس وب سایت" value="{{old('site',Auth::user())->site}}" dir="ltr">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>دانشگاه</label>
                                                                            <input type="text" id="university" name="university" class="form-control" placeholder="دانشگاه" value="{{old('university',Auth::user())->university}}" required data-validation-required-message="وارد کردن دانشگاه الزامی است">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>دانشکده</label>
                                                                            <input type="text" id="faculty" name="faculty" class="form-control" placeholder="دانشکده" value="{{old('faculty',Auth::user())->faculty}}" required data-validation-required-message="وارد کردن دانشکده الزامی است">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>رشته تحصیلی</label>
                                                                            <input type="text" id="study_field" name="study_field" class="form-control" placeholder="رشته تحصیلی" value="{{old('study_field',Auth::user())->study_field}}" required data-validation-required-message="وارد کردن رشته تحصیلی الزامی است">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>گرایش</label>
                                                                            <input type="text" id="major" name="major" class="form-control" placeholder="گرایش" value="{{old('major',Auth::user())->major}}" required data-validation-required-message="وارد کردن گرایش الزامی است">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">ذخیره تغییرات</button>
                                                                    <button type="reset" class="btn btn-light mb-1">انصراف</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Vertically Centered modal Modal -->
    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">اطلاعات تکمیلی</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        با تکمیل اطلاعات به امکانات بیشتر پرتال دسترسی داشته باشید و امتیاز کسب کنید
                    </p>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">بستن</span>
                    </button>-->
                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">قبول</span>
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
