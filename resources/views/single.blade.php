@extends('blogMaster.index')
@section('rowcontent')
    <div class="card mb-5">
        <img class="card-img-top" src="{{$posts->image}}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$posts->title}}</h2>
            <small class="text-muted">دسته بندی: {{$posts->category}}</small>
            <p class="card-text">{!!  $posts->content !!}</p>
        </div>
        <div class="card-footer text-muted">نوشته شده در ساعت {{$posts->time_fa}} در تاریخ {{$posts->date_fa}}
            <div class="d-inline float-left">
                <!-- <span>پسندیده 1</span> -->
                <span>نظرات {{count($comments)}}</span>
            </div>
        </div>
    </div>


    <div class="container mb-5 " id="show_comments_blog">
        @if($errors->any())
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            </div>
        @endif
        @if(session('msg') && (session('errorStatus')))
            <div class="col-12">
                <div class="alert alert-{{session('errorStatus')}}">
                    <p class="p-0 m-0">{{session('msg')}}</p>
                </div>
            </div>
        @endif
        @if(Auth::check())
            @if($posts->status_comment==1)
                <form method="post" action="/post/addcomment/{{$posts->id}}"class="mb-5">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            @if(is_null(Auth::user()->personal_image))
                                <img src="{{asset('/documents/users/default-avatar.png')}}"  width="50px" height="50px" />
                            @else
                                <img src="{{asset('/documents/users/'.Auth::user()->personal_image)}}" width="50px" height="50px"/>
                            @endif
                            <span>{{Auth::user()->fname}} {{Auth::user()->lname}}</span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="comment">ارسال دیدگاه:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
                        </div>
                        <button class="btn btn-success">ارسال</button>
                    </div>
                </form>
            @endif
        @else
            <div class="alert alert-warning" role="alert">
                برای ارسال دیدگاه لطفا <a href="/login">وارد</a> شوید
            </div>
        @endif
        <div class="row">
            <div class="panel panel-default widget" >
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span>
                    <h5 class="panel-title">تعداد نظرات {{count($comments)}}</h5>
                    <span class="label label-info"></span>
                </div>
                <div class="panel-body">
                    <ul class="list-group pl-0">
                        @foreach($comments as $item)
                            <li class="list-group-item border-bottom text-justify" >
                                <div class="row">
                                    <div class="col-xs-2 col-md-1">
                                        <img src="{{asset('/documents/users/'.$item->personal_image)}}" class="img-circle img-responsive" width="50px" height="50px" /></div>
                                    <div class="col-xs-10 col-md-11">
                                        <div>
                                            <a href="/{{$item->username}}">{{$item->user}}</a>
                                            <div class="mic-info ">
                                                {{$item->date_fa}}
                                            </div>
                                        </div>
                                        <div class="comment-text">
                                            {{$item->comment}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{$comments->links()}}
                </div>
            </div>
        </div>

    </div>
@endsection
