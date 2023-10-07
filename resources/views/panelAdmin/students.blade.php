@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="container shadow bg-light pt-3">
        <div class="row">
            <div class="col-12 col-md-3">
                <form method="get" action="/admin/education/students/search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="در جستجوی دانشجو"  name="q" />
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <small class="text-muted">نام یا نام خانوادگی و یا شماره همراه دانشجو را وارد کنید</small>
                    </div>
                </form>
            </div>


            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border" >
                <!-- <form method="GET" action="/admin/users/categorybyAdmin/"> -->
                <form method="GET" action="/admin/education/students/advancesearch">
                    <div class="row">
                        <div class="col-xs-12 col-md-2 col-lg-2 col-xl-2">
                            <small>نمایش براساس دوره</small>
                            <!-- <form method="get" action="/admin/users/list_user_gettingknow"> -->
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="course" name="course" >
                                        <option selected disabled>انتخاب کنید</option>
                                        @foreach($course as $item)
                                            <option value="{{$item->id}}" >{{$item->course}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 col-xl-2">
                            <small>نمایش بر اساس کیفیت</small>
                            <!-- <form method="get" action="/admin/users/list_user_gettingknow"> -->
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="list_$problem" name="problem" >
                                        <option selected disabled>انتخاب کنید</option>

                                    </select>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 col-xl-2">
                            <small class="btn-block mb-1">نمایش</small>
                            <button class="btn btn-secondary ">
                                <i class="bi bi-binoculars-fill"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @if($students->count()==0)
                <div class="col-12 alert alert-warning">
                    <i class="bi bi-exclamation-diamond"></i>
                    اطلاعاتی یافت نشد
                </div>
            @else
                @foreach($students as $item)
                    <div class="col-lg-3 col-sm-6" id="listFriends">
                        <div class="card hovercard  shadow-sm">
                            <div class="cardheader">

                            </div>
                            <div class="avatar">
                                @if($item->getOriginal('personal_image'))
                                    <img alt="" src="{{asset('documents/users/'.$item->personal_image)}}">
                                @else
                                    <img alt="" src="{{asset('documents/users/default-avatar.png')}}">
                                @endif
                            </div>
                            <div class="info">
                                <div class="title">
                                    <a class="btn-modal-introduced" href="/admin/user/{{$item->id}}"   >{{$item->fname}} {{$item->lname}}</a>
                                </div>
                                <div class="desc">{{$item->tel}}</div>
                            </div>
                            <div class="bottom">
                                <p class="border-bottom pb-4">
                                    <span class="float-right">
                                        <i class="fas fa-book-reader"></i>
                                        {{$item->course}}
                                    </span>
                                    <span class="float-left">

                                    </span>
                                </p>
                                <p class="border-bottom">

                                </p>
                                <p>{{$item->caption_status}}</p>
                                <a class="btn btn-primary btn-sm" href="/admin/user/{{$item->id}}" title="نمایش" >
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    {{$students->links()}}
                </div>
            @endif
        </div>
    </div>
@endsection
