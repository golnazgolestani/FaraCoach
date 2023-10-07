@extends('panelUser.master.index')
@section('rowcontent')
    <div class="col-12 table-responsive">
        @foreach($documents as $item)
            <div class="col-xs-12 col-sm-4 col-lg-3 col-xl-3  box-products">
                <div class="card p-1 text-center d-block">
                    <div class="card-body  text-center">
                        <p class="text-bold">{{$item->title}}</p>
                        <p class="text-bold">{{$item->clicks}}</p>
                        <p class="text-bold">{{$item->date_fa}}</p>
                        <a href="/panel/documents/{{$item->shortlink}}" class="btn btn-primary btn-sm" target="_blank">مشاهده</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
