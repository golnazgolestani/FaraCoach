@extends('user.master.index')

@section('content')
    <div class="col-12 table-responsive">
        <table class="table table-striped text-center">
            <tr>
                <th>دوره</th>
                <th>تاریخ ثبت نام</th>
                <th>نمایش</th>
            </tr>

            @foreach($warrany as $item)

                <tr>
                    <td>
                        <a href="/panel/warrany/{{$item->course->shortlink}}">
                            {{($item->course->course)}}
                        </a>
                    </td>
                    <td>{{$item->created_at}}</td>
                    <td>

                        @if(is_null(Auth::user()->students->where('course_id','=',$item->course->id)->first()['warrany_id']))
                            <a class="btn btn-primary" href="/panel/warrany/{{$item->course->shortlink}}/create">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        @else
                            <a class="btn btn-primary" href="/panel/warrany/{{Auth::user()->students->where('course_id','=',$item->course->id)->first()->warrany_id}}/show">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
