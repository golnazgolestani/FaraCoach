@extends('admin.master.index')

@section('headerScript')


@endsection
@section('content')
    <div class="container shadow pt-3">
        <div class="row">
            <div class="col-12 col-md-3">
                <form method="get" action="/admin/education/students/search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="در جستجوی دانشجو"  name="q" />
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <small class="text-muted">نام یا نام خانوادگی و یا شماره همراه دانشجو را وارد کنید</small>
                    </div>
                </form>
            </div>


            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border" >
                <!-- <form method="GET" action="/admin/users/categorybyAdmin/"> -->
                <form method="GET" action="/admin/education/students/advancesearch">
                    <div class="row  mb-1">
                        <div class="col-xs-12 col-md-2 col-lg-2 col-xl-2">
                            <small>نمایش براساس دوره</small>
                            <!-- <form method="get" action="/admin/users/list_user_gettingknow"> -->
                            <div class="input-group">
                                <div class="input-group">
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
                            <div class="input-group">
                                <div class="input-group">
                                    <select class="custom-select" id="list_$problem" name="problem" >
                                        <option selected disabled>انتخاب کنید</option>

                                    </select>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 col-xl-2">
                            <small class="btn-block">نمایش</small>
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
                <div class="col-12 table-responsive">
                    <table class="dataTable table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عکس</th>
                                <th>نام و نام خانوادگی</th>
                                <th>تلفن</th>
                                <th>گروه</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $item)

                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if($item->user->getOriginal('personal_image'))
                                            <img alt="" src="{{asset('documents/users/'.$item->user->personal_image)}}" class="rounded-circle" width="50px" height="50px">
                                        @else
                                            <img alt="" src="{{asset('documents/users/default-avatar.png')}}" class="rounded-circle" width="50px" height="50px">
                                        @endif
                                    </td>
                                    <td>
                                        {{$item->user->fname}} {{$item->user->lname}}
                                    </td>
                                    <td dir="ltr" class="text-center">
                                        {{$item->user->tel}}
                                    </td>
                                    <td >
                                        {{$item->course->course}}
                                    </td>
                                    <td>
                                        {{$item->course->status}}
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable();
        } );
    </script>
@endsection
