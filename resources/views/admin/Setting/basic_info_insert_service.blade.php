@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info border-info">
                    <h4 class="card-title m-0">افزودن خدمت جدید </h4>
                </div>
                <div class="card-body" >
                    <form method="post" action="/admin/clinic_basic_info" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">عنوان خدمت</label>
                            <input type="text" class="form-control" id="title" name="title" >
                        </div>
                        <div class="form-group">
                            <label for="pic">عکس شاخص</label>
                            <input type="file" class="form-control" id="pic" name="pic"  >
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select class="form-control" id="status" name="status">
                                <option class="disabled" selected>انتخاب کنید</option>
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">توضیحات</label>
                            <input type="text" class="form-control" id="description" name="description" >
                        </div>
                        <button type="submit" class="btn btn-primary">افزودن</button>
                    </form>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <tr class="text-center">
                    <th >عنوان خدمت </th>
                    <th>وضعیت</th>
                    <th>ویرایش</th>
                </tr>
                @foreach($services as $item)
                    <tr class="text-center">
                        <td>{{$item->title}}</td>
                        <td>
                            @if($item->status==1)
                                فعال
                            @else
                                غیرفعال
                            @endif
                        </td>
                        <td>
                            <a href="/admin/clinic_basic_info/{{$item->id}}/edit" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>






@endsection
