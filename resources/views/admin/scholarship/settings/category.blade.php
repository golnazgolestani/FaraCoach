@extends('admin.master.index')
@section('content')
<div class="col-12">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info border-info">
                <h4 class="card-title m-0">زمینه های همکاری بورسیه</h4>
            </div>
            <div class="card-body " >
                <a href="/admin/collabration_category/create" class="btn btn-primary mb-1">اضافه کردن</a>
                <table class="table table-striped table-bordered table-hover">
                    <tr class="text-center">
                        <th >زمینه همکاری</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>

                    </tr>
                    @foreach($collabration_category as $item)
                        <tr class="text-center">
                            <td>{{$item->category}}</td>
                            <td>
                                @if($item->status==1)
                                    فعال
                                @else
                                    غیرفعال
                                @endif
                            </td>
                            <td>
                                <a href="/admin/collabration_category/{{$item->id}}/edit" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
