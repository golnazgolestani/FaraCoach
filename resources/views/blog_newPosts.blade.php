@extends('master.index')
@section('row1')
    <!-- Blog Post -->
    <div class="row mt-5">
        <div class="col-xs-12 col-md-4 col-xl-4 col-lg-4">
        </div>
        <div class="col-xs-12 col-md-8 col-xl-8 col-lg-8">
            <div class="row">
                <div class="col-12 border-bottom mb-3">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                        </svg>
                        جدیدترین پست ها
                    </p>
                </div>
                @foreach($posts as $item)
                    <div class="col-xs-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                        <div class="card shadow-sm" >
                            <img src="{{$item->image}}" class="card-img-top" alt="{{$item->title}}" height="189px">
                            <div class="card-body">
                                <h5 class="card-title text-justify">
                                    <a href="/{{$item->username}}/post/{{$item->shortlink}}">{{$item->title}}</a>
                                </h5>
                                <p class="card-text text-justify">{!!  \Illuminate\Support\Str::limit($item->content, $limit = 100, $end = '...') !!}</p>
                                <a href="/{{$item->username}}/post/{{$item->shortlink}}" class="btn btn-primary btn-sm">ادامه مطلب</a>
                            </div>
                            <div class="card-footer">
                                <a href="/{{$item->username}}">
                                    <small>{{$item->username}}</small>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Pagination -->

@endsection
