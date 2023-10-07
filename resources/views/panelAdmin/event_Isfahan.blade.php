@extends('panelUser.master.index')
@section('rowcontent')
    <div class="container bg-light">
        <div class="row  ">
            <div class="col-md-12 table-responsive">
                {{ "تعداد ".$users->count()." نفر "}}
                <table class="table table-striped">
                    <tr>
                        <th>ردیف</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>تلفن</th>
                    </tr>
                    @foreach($users as $item)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{$item->fname}}</td>
                            <td>{{$item->lname}}</td>
                            <td>{{$item->tel}}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
