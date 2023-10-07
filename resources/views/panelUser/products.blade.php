@extends('panelUser.master.index')
@section('rowcontent')
    <div class="col-12">
        <div class="row">
            <div class="col-12 border-bottom mb-4">
                <strong>محصولات</strong>
            </div>
            @foreach($contents_api as $item)
                <div class="col-xs-12 col-sm-4 col-lg-3 col-xl-3  box-products">
                    <div class="card p-1">
                        <img src="{{$item->images[0]->src}}" class="card-img-top" alt="...">
                        <div class="card-body  text-center">
                            <h5 class="card-title text-justify">{{$item->name}}</h5>
                            <del class="float-right ">قیمت {{$item->prices->regular_price}}</del>
                            <strong class="float-left">قیمت {{($item->prices->price)}}</strong>
                            <a href="{{$item->permalink}}" class="btn btn-primary btn-sm" target="_blank">مشاهده محصول</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
