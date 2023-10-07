@extends('user.master.index')
@section('content')

    <div class="col-12">
        <div class="card  border border-2">
            <div class="card-header bg-secondary text-light">
                فایل های آموزشی
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($category_documents as $item)
                        <div class="col-12 col-md-2">
                            <div class="card" >
                                <a href="/panel/category_document/{{$item->id}}/show">
                                    <img src="{{asset('/images/folder.png')}}" class="card-img-top" >
                                    <div class="card-body text-center">
                                        <p class="card-text">{{$item->category}}</p>
                                        <span class="badge badge-success badge-pill">{{$item->document->count()}} فایل</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
