@extends('user.master.index')
@section('content')
    <div class="col-12 table-responsive">

        <table class="table table-striped table-bordered">
            <thead>
            <tr>

                <th scope="col">دیدگاه</th>
                <th scope="col">ثبت توسط</th>
                <th scope="col">پست موردنظر</th>
                <th scope="col">تاریخ ثبت</th>
                <th scope="col">وضعیت</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $item)
                <tr>
                    <td>
                       {{$item->comment}}
                    </td>
                    <td>
                        @if(!is_null($item->user->username))
                            {{$item->user->username}}
                        @elseif(!is_null($item->user->fname)||(!is_null($item->user->lnamew)))
                            {{$item->user->fname}} {{$item->user->lname}}
                        @endif
                    </td>
                    <td>
                        <a href="/{{Auth::user()->username}}/post/{{$item->post->shortlink}}" target="_blank">
                            {{$item->post->title}}
                        </a>
                    </td>
                    <td>{{$item->date_fa}}</td>
                    <td>
                        <a class="btn btn-warning" href="/panel/comments/{{$item->id_comment}}/edit" @if($item->status_comment==1) title="نمایش دیدگاه" @else title="عدم نمایش دیدگاه" @endif>
                            @if($item->status_comment==1)
                                <i class="fas fa-eye"></i>
                            @else
                                <i class="fas fa-eye-slash"></i>
                            @endif
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/panel/comments/{{$item->id_comment}}" onsubmit="return confirm('آیا از حذف اطلاعات اطمینان دارید؟');">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button  class="btn btn-danger" type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$comments->links()}}
    </div>
@endsection
