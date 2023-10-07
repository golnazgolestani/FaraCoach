@extends('master.index')

@section('headerScript')

@endsection
@section('row1')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">دوره های در حال ثبت نام</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <!-- Section-->

        <div class="container-fluid px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">
                <!--
                <div class="col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2 bg-light mb-3 pt-3">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="نام دوره را وارد کنید" />
                        </div>
                        <button type="submit" class="btn btn-success btn-block">جستجو</button>
                    </form>
                </div>
                -->
                <div class="col-12 col-sm-12 col-lg-12 col-xl-12 col-lg-12">
                    <div class="row">

                        @foreach($courses as $item)
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="{{asset('/documents/'.$item->image)}}" alt="{{$item->shortlink}}" style="height: 300px"/>
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <a  href="/courses/{{$item->shortlink}}">
                                                <h5 class="fw-bolder">{{$item->course}}</h5>
                                            </a>
                                            <!-- Product price-->

                                            <span class="float-left font-weight-bold">{{number_format($item->fi_off)}} تومان</span>
                                            <del class="float-right text-muted">{{number_format($item->fi)}} تومان</del>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="/courses/{{$item->shortlink}}">مشاهده</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>






            </div>
        </div>

@endsection
