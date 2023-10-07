@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <form method="post" action="/admin/jashn/user/options/{{$landPage->id}}/update">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <table class="table">
                <tr>
                    <th>گزینه</th>
                    <th>وضعیت</th>
                </tr>

                <tr>
                    <td>تگ کردن 5 نفر از دوستان</td>
                    <td>
                        <select class="custom-select" name="resultoptions[]">
                            <option value="0" selected >انجام نشده</option>
                            <option @if(isset($landPage['resultoptions'][0])&&($landPage['resultoptions'][0]==1)) selected  @endif value="1">انجام شده</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> استوری کردن 24 ساعته پست و منشن کردن پیج فراکوچ   تگ کردن 5 نفر از دوستان</td>
                    <td>
                        <select class="custom-select" name="resultoptions[]">
                            <option value="0" selected >انجام نشده</option>
                            <option @if(isset($landPage['resultoptions'][1])&&($landPage['resultoptions'][1]==1)) selected  @endif value="1">انجام شده</option>
                        </select>
                    </td>
                </tr>


            </table>
            <input type="submit" value="بروزرسانی" class="btn btn-success" />
        </form>

    </div>
@endsection
