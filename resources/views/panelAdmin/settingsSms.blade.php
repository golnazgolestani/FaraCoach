@extends('admin.master.index')
@section('content')
    <div class="col-xs-12 col-md-12 col-xl-12 col-lg-12">
        <div class="card card-chart">
            <div class="card-header">
                <a type="button" href="#">
                    <h5 class="card-title border-bottom pb-2">بخش پیامکها</h5>
                </a>
            </div>
            <?php
            $i=1;
            ?>

            <div class="card-body" id="settings_sms">
                <table class="table">
                    <thead class=" text-dark">
                    <th>ردیف </th>
                    <th>متن</th>
                    <th>جایگاه</th>
                    <th>ویرایش </th>
                    <th>حذف </th>
                    </thead>
                    <tbody>
                        @foreach($settingsms as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->comment}}</td>
                                <td>{{$item->type}}</td>
                                <td>
                                    <a href="/admin/settingsms/{{$item->id}}/edit" class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="post" action="/admin/settingsms/{{$item->id}}" onsubmit="return confirm('آیا از حذف استاد اطمینان دارید؟(در صورت حذف تمام سوابق دوره های استاد و اطلاعات آن از بانک حذف می شود)');">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button  class="btn btn-danger" type="submit">
                                            <i class="bi bi-trash-fill"></i>

                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                <div class="card-stats">
                    <a class="btn btn-primary" href="/admin/settingsms/create" role="button">اضافه کردن</a>
                </div>
            </div>
        </div>
    </div>
@endsection
