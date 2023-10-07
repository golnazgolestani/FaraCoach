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
                                    <li class="breadcrumb-item active">شبکه های اجتماعی</li>
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
                                                                <!--<div class="col-12">
                                                                  <div class="form-group">
                                                                    <label>توییتر</label>
                                                                    <input type="text" class="form-control text-left" placeholder="افزودن لینک" value="https://www.twitter.com" dir="ltr">
                                                                  </div>
                                                                </div>
                                                                <div class="col-12">
                                                                  <div class="form-group">
                                                                    <label>فیسبوک</label>
                                                                    <input type="text" class="form-control text-left" placeholder="افزودن لینک" dir="ltr">
                                                                  </div>
                                                                </div>
                                                                <div class="col-12">
                                                                  <div class="form-group">
                                                                    <label>واتساپ</label>
                                                                    <input type="text" class="form-control text-left" placeholder="افزودن لینک" dir="ltr">
                                                                  </div>
                                                                </div>-->
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>اینستاگرام</label>
                                                                        <input type="text" id="instagram" name="instagram" class="form-control text-left" required placeholder="افزودن لینک" value="{{old('instagram',Auth::user()->instagram)}}" dir="ltr" data-validation-required-message="وارد کردن آدرس اینستاگرام الزامی است">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>لینکدین</label>
                                                                        <input type="text" id="linkedin" name="linkedin" class="form-control text-left" placeholder="افزودن لینک" value="{{old('linkedin',Auth::user()->linkedin)}}" dir="ltr">
                                                                    </div>
                                                                </div>
                                                                <!--<div class="col-12">
                                                                  <div class="form-group">
                                                                    <label>تلگرام</label>
                                                                    <input type="text" class="form-control text-left" placeholder="افزودن لینک" dir="ltr">
                                                                  </div>
                                                                </div>-->
                                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">ذخیره تغییرات</button>
                                                                    <button type="reset" class="btn btn-light mb-1">انصراف</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                                        <div class="row">
                                                            <div class="col-12 my-2">
                                                                <a href="javascript:%20void(0);" class="btn btn-info">اتصال به
                                                                    <strong>توییتر</strong></a>
                                                            </div>
                                                            <hr>
                                                            <div class="col-12 my-2">
                                                                <button class=" btn btn-sm btn-light-secondary float-right">ویرایش</button>
                                                                <h6>شما به فیسبوک متصل هستید.</h6>
                                                                <p>Johndoe@gmail.com</p>
                                                            </div>
                                                            <hr>
                                                            <div class="col-12 my-2">
                                                                <a href="javascript:%20void(0);" class="btn btn-danger">اتصال به
                                                                    <strong>گوگل</strong>
                                                                </a>
                                                            </div>
                                                            <hr>
                                                            <div class="col-12 my-2">
                                                                <button class=" btn btn-sm btn-light-secondary float-right">ویرایش</button>
                                                                <h6>شما به اینستاگرام متصل هستید.</h6>
                                                                <p>Johndoe@gmail.com</p>
                                                            </div>
                                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">ذخیره تغییرات</button>
                                                                <button type="reset" class="btn btn-light mb-1">انصراف</button>
                                                            </div>
                                                        </div>
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
@endsection
