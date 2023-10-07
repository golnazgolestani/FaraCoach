@extends('admin.master.index')

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

        #users_tags a
        {
            font-size: 12px;
        }

        #example
        {
            font-size:12px;
        }
    </style>
@endsection

@section('content')
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
                                    <button class="btn btn-outline-secondary text-light" type="submit">
                                        <i class="bi bi-search"></i>
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

                    <div class="col-12">
                        <label class="text-dark">دسترسی سریع</label>
                        <ul class="list-group list-group-horizontal" id="users_tags">
                            <a href="/admin/users/category/?categoryUsers=0" class="mr-1 list-group-item p-0 border-0  @if(request()->is('admin/users')) bg-info  @endif ">نمایش همه</a>
                            @if(Auth::user()->type==5)
                                <a href="/admin/users/category/?categoryUsers=lead" class="mr-1  list-group-item p-0 border-0 ">لید خام <span class="text-danger"> {{$statics['lead']}}</a>
                            @else
                                <a href="/admin/users/category/?categoryUsers=todayFollowup" class="mr-1  list-group-item p-0 border-0 ">پیگیری روز<span class="text-danger"> {{$statics['todayFollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=expireFollowup" class="mr-1  list-group-item p-0 border-0 ">پیگیری تاریخ گذشته<span class="text-danger"> {{$statics['expireFollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=notfollowup" class="mr-1  list-group-item p-0 border-0   ">پیگیری نشده<span class="text-danger"> {{$statics['notfollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=continuefollowup" class="mr-1  list-group-item p-0 border-0 ">تور پیگیری<span class="text-danger"> {{$statics['continuefollowup']}} </span></a>
                                <a href="/admin/users/category?categoryUsers=waiting" class="mr-1  list-group-item p-0 border-0 ">در انتظار تصمیم<span class="text-danger"> {{$statics['waiting']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=cancelfollowup" class="mr-1  list-group-item p-0 border-0 ">انصراف<span class="text-danger"> {{$statics['cancelfollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=students" class="mr-1  list-group-item p-0 border-0  ">مشتری<span class="text-danger"> {{$statics['students']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=noanswering" class="mr-1  list-group-item p-0 border-0 ">عدم پاسخ<span class="text-danger"> {{$statics['noanswering']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=myfollowup" class="mr-1  list-group-item  p-0 border-0 "> پیگیری های خودم<span class="text-danger"> {{$statics['myfollowup']}} </span></a>
                                <a href="/admin/users/category/?categoryUsers=followedToday" class="mr-1  list-group-item  p-0 border-0 "> پیگیری شده های امروز<span class="text-danger"> {{$statics['followedToday']}} </span></a>
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
                            <th>تعداد جلسات</th>

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
                            <tr style="background-color: {{$item->quality_color}}" >
                                <td class="p-0">
                                    <a href="/admin/user/{{$item->id}}">
                                        <img src="{{asset('/documents/users/'.$item->personal_image)}}" class="rounded-circle "  width="50px" height="50px" />
                                    </a>
                                </td>
                                <td class="p-0">
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->fname}}
                                    </a>
                                </td>
                                <td class="p-0">
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->lname}}
                                    </a>
                                </td>
                                <td class="p-0" dir="ltr">
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->tel}}
                                    </a>
                                </td>
                                <td class="p-0">{{$item['insert_user']}}</td>
                                <td class="p-0" dir="ltr">{{$item->introduced}}</td>


                                <td class="p-0">
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->resource}}
                                    </a>
                                </td>
                                <td class="p-0">
                                    {{$item->followby_expert}}
                                </td>
                                <td class="p-0">
                                    {{$item->countFollowup}}
                                </td>

                                <td class="p-0">
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">

                                        {{$item->nextfollowup_date_fa}}
                                    </a>
                                </td>
                                <td class="p-0">
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->status_followups}}
                                    </a>
                                </td>
                                <td class="p-0">
                                    <a href="/admin/user/{{$item->id}}" class="text-dark d-block">
                                        {{$item->last_login_at}}
                                    </a>
                                </td>

                                @if(Auth::user()->type==2)

                                    <td class="p-0">
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

