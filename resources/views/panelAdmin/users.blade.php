@extends('panelAdmin.master.index')

@section('headerScript')
<link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <style>
        .img_profile
        {
            animation: images_effect 2s infinite;
            animation-direction: alternate;

        }

        @keyframes images_effect {
            from{
                border:5px solid red;
                transition: 1s;
            }

            to{
                border:0px solid red;
            }
        }
    </style>
@endsection

@section('rowcontent')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info border-info">
                <h4 class="card-title m-0">اعضا</h4>
            </div>
            <div class="card-body" id="frmSearchUserAdmin">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3" >
                        <small>جستجو اعضا</small>
                        <form method="GET" action="/admin/users/search/">
                            {{csrf_field()}}
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="جستجو..." name="q" lang="fa"/>
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary text-light bg-secondary" type="submit">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2" >
                        <small class="d-block">عضو جدید</small>
                        <a href="/admin/add" class="btn btn-primary m-0">
                            <i class="bi bi-person-plus-fill"></i>
                            ثبت عضو جدید
                        </a>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border" >
                        <!-- <form method="GET" action="/admin/users/categorybyAdmin/"> -->
                        <form method="GET" action="/admin/users/advancesearch">
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
                                    <small>نمایش براساس کاربر</small>
                                    <div class="input-group mb-5">
                                        <select class="form-control p-0 mr-4 " name="user">
                                            <option disabled="disabled" selected="selected">انتخاب کنید</option>
                                            @foreach($usersAdmin  as $item)
                                                <option value="{{$item->id}}"  @if(isset($_GET['user'])&&($_GET['user']==$item->id)) selected @endif   >{{$item->fname}} {{$item->lname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
                                    <small class="d-block mb-3">نوع ثبت</small>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="categorypeygiri1" name="categorypeygiri" class="custom-control-input" value="0" @if(isset($_GET['categorypeygiri'])&&($_GET['categorypeygiri']==0)) checked @endif  />
                                        <label class="custom-control-label" for="categorypeygiri1">پیگیری ها</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="categorypeygiri2" name="categorypeygiri" class="custom-control-input" value="1" @if(isset($_GET['categorypeygiri'])&&($_GET['categorypeygiri']==1)) checked @endif />
                                        <label class="custom-control-label" for="categorypeygiri2">ثبت شده ها</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-2 col-lg-2 col-xl-2">
                                    <small>نمایش بر اساس نحوه آشنایی</small>
                                    <!-- <form method="get" action="/admin/users/list_user_gettingknow"> -->
                                        <div class="input-group mb-3">
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="list_gettingknow" name="gettingknow" >
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='اینستاگرام')) selected @endif >اینستاگرام</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='تلگرام')) selected @endif>تلگرام</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='تبلیغاتی محیطی')) selected @endif>تبلیغاتی محیطی</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='تبلیغات فضای مجازی')) selected @endif>تبلیغات فضای مجازی</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='پکیج رایگان')) selected @endif>پکیج رایگان</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='واتساپ')) selected @endif>واتساپ</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='دوستان')) selected @endif>دوستان</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='موتورهای جستجو')) selected @endif>موتورهای جستجو</option>
                                                    <option @if(isset($_GET['gettingknow'])&&($_GET['gettingknow']=='رویداد')) selected @endif>رویداد</option>
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
                                                @foreach($problem as $item)
                                                    <option @if(isset($_GET['problem'])&&($_GET['problem']==$item->id)) selected @endif value="{{$item->id}}" >{{$item->problem}}</option>
                                                @endforeach
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



                    <div class="col-12">
                        <small class="m-0">انتخاب تگ ها</small>
                        <form method="GET" action="/admin/users/categoryTags/">
                            {{csrf_field()}}
                            @foreach($parentCategory as $item)
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$item->id}}">
                                    {{$item->category}}
                                </a>
                                <div class="collapse" id="collapseExample{{$item->id}}">
                                    <div class="card card-body">
                                        {{csrf_field()}}
                                        <div class="form row">
                                            @foreach($tags as $tag)
                                                @if($tag->category_tags_id==$item->id)
                                                   <div class="col-xs-6 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="form-check-label m-0 pr-0" for="tag{{$tag->id}}">{{$tag->tag}}</label>
                                                        <input class="form-check-input text-dark mr-2" type="checkbox" value="{{$tag->id}}" id="tag{{$tag->id}}" name="tags[]">
                                                   </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="col-12">
                        <label class="text-dark">دسترسی سریع</label>
                        <ul class="list-group list-group-horizontal" id="users_tags">
                            <a href="/admin/users/category/?categoryUsers=0" class="list-group-item p-0 border-0 mr-3 p-1 @if(request()->is('admin/users')) bg-info  @endif ">نمایش همه</a>
                            @if(Auth::user()->type==5)
                                <a href="/admin/users/category/?categoryUsers=lead" class="list-group-item p-0 border-0 mr-3 p-1 ">لید خام <span class="text-danger"> {{$statics['lead']}}</a>
                            @else
                                <a href="/admin/users/category/?categoryUsers=todayFollowup" class="list-group-item p-0 border-0 mr-3 p-1 ">پیگیری روز<span class="text-danger"> {{$statics['todayFollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=expireFollowup" class="list-group-item p-0 border-0 mr-3 p-1 ">پیگیری تاریخ گذشته<span class="text-danger"> {{$statics['expireFollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=notfollowup" class="list-group-item p-0 border-0 mr-3 p-1 ">پیگیری نشده<span class="text-danger"> {{$statics['notfollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=continuefollowup" class="list-group-item p-0 border-0 mr-2 p-1">تور پیگیری<span class="text-danger"> {{$statics['continuefollowup']}} </span></a>
                                <a href="/admin/users/category?categoryUsers=waiting" class="list-group-item p-0 border-0 mr-3 p-1">در انتظار تصمیم<span class="text-danger"> {{$statics['waiting']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=cancelfollowup" class="list-group-item p-0 border-0 mr-3 p-1">انصراف<span class="text-danger"> {{$statics['cancelfollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=students" class="list-group-item p-0 border-0 mr-3 p-1">مشتری<span class="text-danger"> {{$statics['students']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=noanswering" class="list-group-item p-0 border-0 mr-3 p-1">عدم پاسخ<span class="text-danger"> {{$statics['noanswering']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=myfollowup" class="list-group-item  p-0 border-0 mr-3 p-1"> پیگیری های خودم<span class="text-danger"> {{$statics['myfollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=followedToday" class="list-group-item  p-0 border-0 mr-3 p-1"> پیگیری شده های امروز<span class="text-danger"> {{$statics['followedToday']}} </span></a>
                            @endif
                        </ul>
                    </div>

                </div>

                <div class="table-responsive overflow-auto">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>شماره همراه</th>
                            <th>ثبت کننده</th>
                            <th>معرف</th>
                            <th> ورود</th>
                            <th>مسئول پیگیری</th>
                            <th>تعداد پیگیری</th>
                            <th>آخرین محصول پیگیری شده</th>
                            <th>آخرین پیگیری</th>
                            <th> پیگیری بعد</th>
                            <th>وضعیت</th>
                            <th>اخرین ورود</th>

                            @if(Auth::user()->type==2)
                                <th>حذف</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)

                            <tr style="background-color: {{$item->quality_color}}">
                                <td>
                                    <a href="/admin/user/{{$item->id}}">
                                        <img src="{{asset('/documents/users/'.$item->personal_image)}}" class="img-circle "  width="50px" height="50px" />
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->fname}}
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->lname}}
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->tel}}
                                    </a>
                                </td>
                                <td>{{$item['insert_user']}}</td>
                                <td>{{$item->introduced}}</td>


                                <td>
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->resource}}
                                    </a>
                                </td>
                                <td>
                                    {{$item->followby_expert}}
                                </td>
                                <td>
                                    {{$item->countFollowup}}
                                </td>
                                <td>
                                    {{$item['lastFollowupCourse']}}
                                </td>
                                <td>{{$item->lastDateFollowup}}</td>
                                <td>
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">

                                        {{$item->nextfollowup_date_fa}}
                                    </a>
                                </td>


                                <td>
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->status_followups}}
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->last_login_at}}
                                    </a>
                                </td>

                                @if(Auth::user()->type==2)

                                    <td>
                                        <a href="/admin/user/{{$item->id}}/delete" class="text-dark del">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>شماره همراه	</th>
                            <th>ثبت کننده</th>
                            <th>معرف</th>
                            <th> آشنایی</th>
                            <th>ورود</th>
                            <th>مسئول پیگیری</th>
                            <th>تعداد پیگیری</th>
                            <th>آخرین محصول پیگیری شده</th>
                            <th>آخرین پیگیری</th>
                            <th>وضعیت</th>
                            <th>اخرین ورود</th>

                            @if(Auth::user()->type==2)
                                <th>حذف</th>
                            @endif
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('footerScript')
<script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection

