@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-12">
        <div class="card mb-3">

            <div class="card-body">
                <h5 class="card-title">{{$document->title}}</h5>
                <p class="card-text">{!! $document->content !!}</p>
                <a href="/documents/files/{{$document->file}}" class="btn btn-success" target="_blank"> دانلود
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg>
                </a>
                <p class="card-text mt-5"><small class="text-muted">تاریخ انتشار {{$document->date_fa}}</small></p>
            </div>
        </div>
    </div>
@endsection
