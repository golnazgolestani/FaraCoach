@extends('blogMaster.index')
@section('rowcontent')
        <!-- Blog Post -->
        <div class="row">
            @foreach($posts as $item)
            <div class="col-xs-6 col-md-4 col-lg-4 col-xl-4 ">
                <div class="card shadow-sm" >
                    <img src="{{$item->image}}" class="card-img-top" alt="{{$item->title}}" height="189px">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/{{$user->username}}/post/{{$item->shortlink}}">{{$item->title}}</a>
                        </h5>
                        <p class="card-text">{!!  \Illuminate\Support\Str::limit($item->content, $limit = 100, $end = '...') !!}</p>
                        <a href="/{{$user->username}}/post/{{$item->shortlink}}" class="btn btn-primary btn-sm">ادامه مطلب</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        {{$posts->links()}}
@endsection

