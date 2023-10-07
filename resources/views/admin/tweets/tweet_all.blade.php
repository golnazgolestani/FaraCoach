@extends('admin.master.index')
@section('content')
    <div class="col-12 table-responsive">
        <table class="table table-striped">
            <tr>
                <th>متن</th>
                <th>نویسنده</th>
                <th>حذف</th>
            </tr>
            @foreach($tweets as $item)
                <tr>
                    <td>{!! $item->tweet !!}</td>
                    <td>{{$item->user->fname.' '.$item->user->lname }}</td>
                    <td>
                        <form method="post" action="/admin/tweet/{{$item->id}}" onsubmit="return window.confirm('آیا از حذف اطلاعات اطمینان دارید؟')">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
    <div class="col-12">
        {{$tweets->links()}}
    </div>
@endsection
