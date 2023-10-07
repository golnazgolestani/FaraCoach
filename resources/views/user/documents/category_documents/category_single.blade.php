@extends('user.master.index')
@section('content')

    <div class="col-12 table-responsive">
        <div class="card border border-1">
            <div class="card-header bg-secondary text-light">
                فایل های {{$category_document->category}}
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered text-center">
                    <tr>
                        <th>#</th>
                        <th>عنوان</th>
                        <th>توضیحات</th>
                        <th>دسته بندی</th>
                        <th>نوع فایل</th>
                        <th>حجم فایل</th>
                        <th>تعداد دانلود</th>
                        <th>حذف</th>
                    </tr>
                    @foreach($category_document->document as $document)
                        @if(($document->permission==1) && (Auth::user()->students->count()>0))
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$document->title}}</td>
                                <td>
                                    {{$document->content}}
                                </td>
                                <td>{{$document->category_document['category']}}</td>
                                <td>
                                    {{$document->extension}}
                                </td>
                                <td>
                                    @if(($document->size/1024)<1024)
                                        {{substr((string)$document->size,0,3)}}   KB

                                    @else
                                        {{ceil(number_format($document->size/1024))}} MB
                                    @endif
                                </td>
                                <td>{{$document->clicks}}</td>
                                <td>
                                    <a href="/panel/documents/{{$document->id}}" class="btn btn-primary"target="_blank" >
                                        دانلود
                                    </a>
                                </td>
                            </tr>
                        @elseif($document->permission==0)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$document->title}}</td>
                                <td>
                                    {{$document->content}}
                                </td>
                                <td>{{$document->category_document['category']}}</td>
                                <td>
                                    {{$document->extension}}
                                </td>
                                <td>
                                    @if(($document->size/1024)<1024)
                                        {{substr((string)$document->size,0,3)}}   KB

                                    @else
                                        {{ceil(number_format($document->size/1024))}} MB
                                    @endif
                                </td>
                                <td>{{$document->clicks}}</td>
                                <td>
                                    <a href="/panel/documents/{{$document->id}}" class="btn btn-primary"target="_blank" >
                                        دانلود
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>



    </div>
@endsection
