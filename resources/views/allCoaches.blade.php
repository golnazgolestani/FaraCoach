@extends('master.index')

@section('headerscript')
    <style>
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        #team {
            background: #eee !important;
        }


        .listFriends .box {
            padding: 10px 0px;
            background:#FFF;
            text-align: center;
        }

        .listFriends .box-title {
            color: #428bca;
        }

        .listFriends  img {
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
        }

        .listFriends  .fa {
            padding: 15px;
            font-size: 30px;
        }

        .confirm_faracoach::before
        {
            background-image:url("{{asset('/images/tick.png')}}");
            content: '';
            width: 20px;
            height: 20px;
            display: inline-block;
            background-size: 100% 100%;
        }

        .student_meeting::before
        {
            background-image:url("{{asset('/images/green-tik.png')}}");
            content: '';
            width: 20px;
            height: 20px;
            display: inline-block;
            background-size: 100% 100%;
        }

        .boxDisable img
        {
            filter:grayscale(1);
        }

    </style>
@endsection
@section('row1')
    <div class="col-12 mt-5">
        <div class="row">
            <div class="col-12 border-bottom mb-4">
                <h3>لیست کوچ های فراکوچ</h3>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 border-left">
                <div class="card mb-3" >
                    <div class="card-body">
                        <form method="get" action="/coaches/all/">
                            <div class="form-group">
                                <label for="search">جستجوی کوچ:</label>
                                <input type="text" class="form-control" id="search" placeholder="نام خانوادگی را وارد کنید" name="q">
                            </div>
                            <button class="btn btn-success btn-block" type="submit" name="search">بگرد</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-3" >

                    <div class="card-header bg-info text-light">فیلترها</div>
                    <div class="card-body">
                        <form method="get" action="/coaches/all/">
                            <div class="form-group">
                                <label for="categoryCoaches">دسته بندی کوچ ها</label>
                                <select class="form-control" id="categoryCoaches" name="categoryCoaches">
                                    <option disabled selected>انتخاب کنید</option>
                                    @foreach($category_coaches as $item)
                                        <option value="{{$item->id}}">{{$item->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label>جنسیت:</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="customRadioInline1">آقا</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="customRadioInline2">خانم</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="filterCoach">فیلتر کن</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-3" >
                    <div class="card-header bg-info text-light">تماس با پشتیبان</div>
                    <div class="card-body">
                        <p> شماره تماس با پشتیبان <a href="tel:09198000747">09198000747</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row">
                    @if($coaches->count()==0)
                        <div class="alert alert-warning col-12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            موردی برای نمایش پیدا نشد
                        </div>
                    @else
                        <section id="team" class="pb-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <!--
                                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                                            فیلتر <i class="bi bi-filter"></i>
                                        </a>
                                        -->
                                        <div class="collapse" id="collapseFilter">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <a href=#" class="btn btn-primary btn-sm col-6 col-sm-1 col-md-1 col-lg-1 colxl-1" >گران ترین</a>
                                                    <a href=#" class="btn btn-primary btn-sm col-6  col-sm-1 col-md-1 col-lg-1 colxl-1" >ارزان ترین</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Team member -->
                                    @foreach($coaches as $item)
                                            <div class="col-lg-3 col-sm-6 listFriends mt-3  @if($item->bookings->wherebetween('start_date',$month)->count()==0) boxDisable @endif" id="">
                                                <div class="box shadow-lg p-1">
                                                    <a href="/coach/{{$item->username}}" >
                                                        @if(strlen($item->personal_image)>0)
                                                            <img src="{{asset('/documents/users/'.$item->personal_image)}}" class=" rounded-circle profile"  />
                                                        @else
                                                            <img src="{{asset('/documents/users/default-avatar.png')}}" class=" rounded-circle profile" />
                                                        @endif
                                                    </a>


                                                    <div class="box-title mt-2">
                                                        <a href="/coach/{{$item->username}}" class="font-weight-bold  @if($item->student_meeting==1) student_meeting  @elseif($item->confirm_faracoach==1) confirm_faracoach @endif">
                                                            {{$item->fname.' '.$item->lname}}
                                                        </a>

                                                    </div>

                                                    <div class="box-text mt-1" dir="ltr">
                                                        <span>
                                                            @if($item->fi==0 || $item->fi=='')
                                                                <p> هزینه هر جلسه رایگان </p>
                                                            @else
                                                                <p> هزینه هر جلسه {{number_format($item->fi)}} تومان </p>
                                                            @endif
                                                        </span>
                                                    </div>

                                                    <div class="icons">
                                                        <a class="btn @if($item->bookings->wherebetween('start_date',$month)->count()==0) btn-secondary text-dark   @else  btn-primary    @endif      btn-sm d-block " data-toggle="tooltip" data-placement="bottom" href="/coach/{{$item->username}}" >
                                                            مشاهده اطلاعات
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                    <!-- ./Team member -->

                                </div>
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection



@section('footerScript')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection

