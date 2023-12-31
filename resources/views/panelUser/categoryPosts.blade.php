@extends('panelUser.master.index')
@section('rowcontent')
    <div class="col-12 table-responsive">
        <a href="/panel/categoryposts/create" class="btn btn-primary">دسته جدید <i class="fas fa-plus-circle"></i></a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">عنوان</th>
                <th scope="col">تعداد پست</th>
                <th scope="col">تاریخ ثبت</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category_post as $item)
                <tr>

                    <td>
                        <a href="/{{Auth::user()->username}}/category/{{$item->shortlink}}" target="_blank">
                            {{$item->category}}
                        </a>
                    </td>
                    <td>
                        {{$item->posts}}
                    </td>
                    <td>{{$item->date_fa}}</td>
                    <td>
                        <a class="btn btn-warning" href="/panel/categoryposts/{{$item->id}}/edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/panel/categoryposts/{{$item->id}}" onsubmit="return confirm('آیا از حذف استاد اطمینان دارید؟(در صورت حذف تمام سوابق دوره های استاد و اطلاعات آن از بانک حذف می شود)');">
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
        {{$category_post->links()}}
    </div>
@endsection
