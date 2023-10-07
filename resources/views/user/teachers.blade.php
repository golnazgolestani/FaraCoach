 @extends('user.master.index')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12 border-bottom mb-4">
                <strong>کوچ</strong>
            </div>
            @foreach($coaches as $item)
                <div class="col-xs-12 col-sm-4 col-lg-3 col-xl-3  box-products">
                    <div class="card p-1 text-center d-block">
                        <img src="{{asset('/documents/users/'.$item->image)}}" class="img-circle" alt="..." width="150px">
                        <div class="card-body  text-center">
                            <p class="text-bold">{{$item->fname}} {{$item->lname}}</p>
                            <p class="text-bold">{{$item->type}}</p>
                            <a href="/panel/teacher/{{$item->shortlink}}" class="btn btn-primary btn-sm" target="_blank">مشاهده رزومه</a>
                            <a href="/panel/teacher/{{$item->shortlink}}#reserve" class="btn btn-primary btn-sm" target="_blank">رزرو جلسه</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

