@extends('master.index')
@section('row1')
    <div class="container" id="form_signup_crm">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                    <p class="mr-5"><small>توضیحات</small></p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p><small>اطلاعات شخصی</small></p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p><small>اطلاعات کاربری</small></p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p><small>تائید</small></p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-lg-6">
            @if(session('msg') && (session('errorStatus')))
               <div class="alert alert-{{session('errorStatus')}}">
                    <p>{{session('msg')}}</p>
               </div>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $item)
                    <div class="alert alert-danger">
                        <li>{{$item}}</li>
                    </div>
                @endforeach
            @endif
            <form role="form" method="POST" action="/crm/user/insert" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-heading">
                        <h3 class="panel-title">توضیحات</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <p>توضیحات مربوط به فرم در این مکان درج خواهد شد</p>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="button">مرحله بعد</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-heading">
                        <h3 class="panel-title">اطلاعات شخصی</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">نام:*</label>
                            <input maxlength="20" type="text" class="form-control" placeholder="لطفا نام را وارد کنید" name="fname"   value="{{old('fname')}}" lang="fa"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">نام خانوادگی:*</label>
                            <input maxlength="50" type="text"  class="form-control" placeholder="نام خانوادگی را وارد کنید"  name="lname"  value="{{old('lname')}}" lang="fa" />
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="button">مرحله بعد</button>
                    </div>
                </div>
                <div class="panel panel-primary setup-content" id="step-3">
                    <div class="panel-heading">
                        <h3 class="panel-title">اطلاعات کاربری</h3>
                    </div>
                    <div class="panel-body">
                        <div class="input-group m-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">شماره همراه</span>
                            </div>
                            <input maxlength="20" type="text"  class="form-control" placeholder="تلفن همراه را وارد کنید"  name="tel" id="tel"  value="{{old('tel')}}"  />
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary btn-info text-light" type="button" id="activeMobile" data-toggle="modal" data-target="#ModalMobile">فعال سازی</button>
                            </div>
                        </div>
                        <div class="input-group m-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">پست الکترونیکی</span>
                            </div>
                            <input  type="email" class="form-control" placeholder="لطفا پست الکترونیکی را وارد کنید" name="email"  value="{{old('user_email')}}" />
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary btn-info text-light" type="button">فعال سازی</button>
                            </div>
                        </div>
                        <div class="input-group m-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">رمز عبور</span>
                            </div>
                            <input type="password" class="form-control" placeholder="رمز عبور را وارد کنید"  name="password"   />
                        </div>
                        <div class="input-group m-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">تکرار رمز عبور </span>
                            </div>
                            <input type="password" class="form-control" placeholder="رمز عبور را تکرار کنید" name="repassword" />
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="button">مرحله بعد</button>
                    </div>
                </div>
                <div class="panel panel-primary setup-content" id="step-4">
                    <div class="panel-heading">
                        <h3 class="panel-title">قوانین و موافقت نامه</h3>
                    </div>
                    <div class="panel-body">
                        <p>قوانین و موافقت نامه</p>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="rules" />
                            <label class="form-check-label" for="inlineCheckbox1">قوانین را کامل و با دقت مطالعه کردم و موافقم</label>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary nextBtn pull-right" type="submit">ثبت نام</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalMobile" tabindex="-1" aria-labelledby="ModalMobile" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" id="modal_body">


                </div>
            </div>
        </div>
    </div>
@endsection


