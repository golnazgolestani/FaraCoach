@extends('clinic.master.index')

@section('content')

    <div class="row mb-5">
        <div class="col-12 p-0">
            <div id="carouselClinic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselClinic" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselClinic" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/images/whatiscoaching.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/What-is-Coaching.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto mb-5">
                <div class="row mb-3">
                    @foreach($clinic_basic_infos as $clinic_basic_info)
                        @foreach($clinic_basic_info->children as $item)
                            <div class="col-12 col-md-3 p-3">
                                <a href="/coaches/category/{{$item->title}}">
                                    <div class="col-12 text-center rounded-lg border border-1 p-2">
                                        <img src="/images/clinic/tel.png" width="80px" class="d-inline mb-3" />
                                        <strong class="d-block">{{$item->title}}</strong>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 ">
                        <style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/hCXpg/vt/frame"  allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

