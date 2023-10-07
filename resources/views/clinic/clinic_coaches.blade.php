@extends('clinic.master.index')

@section('headerScript')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #069a8e;
        }
        input:focus + .slider {
            box-shadow: 0 0 1px #069a8e;
        }
        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
    <section id="slider" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>فـــراکـوچ </h1>
                    <h2>اعتبار کوچینگ ایران</h2>
                </div>
            </div>
            <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">

            </div>
        </div>
    </section><!-- End Hero -->
    <div class="container mb-5 pt-5" >
        <div class="row">
            <div class="col-12 col-md-12 mx-auto p-5  border border-1" id="filter_coach" >
                <form method="get" action="">

                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control rounded-right" placeholder="نام یا نام خانوادگی وارد کنید" name="name"  @if(request()->get('name')) value="{{request()->get('name')}}"  @endif   />
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-3 text-right">
                            <label for="gender">جنسیت:</label>
                            <select class="form-control" id="gender" name="gender">
                                <option disabled selected>انتخاب کنید</option>
                                <option value="man" @if(request()->get('gender')=='man') selected @endif>مرد</option>
                                <option value="woman" @if(request()->get('gender')=='woman') selected @endif >زن</option>
                                <option value="2" @if(request()->get('gender')=='2') selected @endif >فرقی ندارد</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-3 text-right">
                            <label for="service"> خدمت:</label>
                            <select class="form-control" id="service" name="service">
                                <option disabled selected>انتخاب کنید</option>
                                @foreach($services as  $service)
                                    <option value="{{$service->id}}" @if(request()->get('service')==$service->id) selected @endif >{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3 text-right">
                            <label for="clinic_basic_info"> گرایش:</label>
                            <select class="form-control" id="clinic_basic_info" name="clinic_basic_info">
                                <option disabled selected>انتخاب کنید</option>
                                @foreach($clinic_basic_info->children as  $child)
                                    <option value="{{$child->id}}" @if(request()->get('clinic_basic_info')==$child->id) selected  @endif >{{$child->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-3 text-right">
                            <label for="state"> استان:</label>
                            <select class="form-control" id="state" name="state">
                                <option disabled selected>انتخاب کنید</option>
                                @foreach($states as  $state)
                                    <option value="{{$state->id}}" @if(request()->get('state')==$state->id) selected  @endif  >{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3 text-right">
                            <label for="student_coach"> کوچ دانشجویی:</label>
                            <label class="switch">
                                <input type="checkbox" name="student_coach" @if(request()->get('student_coach')) checked  @endif />
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="form-group col-12 col-md-3 text-right">
                            <label for="clinic_basic_info"> جلسه حضوری:</label>
                            <label class="switch">
                                <input type="checkbox" name="type_meeting" @if(request()->get('type_meeting')) checked  @endif />
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" >
                                فیلتر کن
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($coaches as $coach)
                <div class="col-12 col-md-3 text-center">
                    <div class="row p-2" id="coaches">
                        <div class="col-12 border rounded-lg pt-3 coach">
                            <img src="/documents/users/{{$coach->user->personal_image}}" width="120px" height="120px" class="rounded-lg mb-3" />
                            <a href="/coach/{{$coach->user->username}}" class="d-block">{{$coach->user->fname.' '.$coach->user->lname}}</a>
                            <p>قیمت هر جلسه: 550،000 تومان</p>
                        </div>
                    </div>4
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto pt-5" id="div_result">
                {{$coaches->links()}}
            </div>
        </div>
    </div>
@endsection
