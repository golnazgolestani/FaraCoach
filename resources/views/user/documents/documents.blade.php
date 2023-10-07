@extends('user.master.index')
@section('content')
    <div class="col-12 table-responsive">
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
            @foreach($documents as $document)

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
            @endforeach
        </table>
    </div>
@endsection
