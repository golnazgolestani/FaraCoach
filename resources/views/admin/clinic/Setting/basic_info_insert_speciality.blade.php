@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info border-info">
                    <h4 class="card-title m-0">افزودن تخصص جدید </h4>
                </div>
                <div class="card-body" >
                    <form method="post" action="/admin/clinic_basic_info/store_speciality" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="service">انتخاب خدمت :</label>
                            <select class="form-control" id="service" name="parent_id">
                                <option class="disabled" selected>انتخاب کنید</option>
                                @foreach($services_all as $item)
                                    <option value="{{$item->id}}" >{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">عنوان تخصص</label>
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
                    <th >عنوان تخصص </th>
                    <th>خدمت</th>
                    <th>وضعیت</th>
                    <th>ویرایش</th>
                </tr>
                @foreach($speciality as $item_speciality)
                    <tr class="text-center">
                        <td>{{$item_speciality->title}}</td>
                        @foreach($services_all as $item)
                            @if($item->id==$item_speciality->parent_id)
                                <td>{{$item->title }}</td>
                            @endif
                        @endforeach
                        <td>
                            @if($item_speciality->status==1)
                                فعال
                            @else
                                غیرفعال
                            @endif
                        </td>
                        <td>
                            <a href="/admin/clinic_basic_info/edit_speciality/{{$item_speciality->id}}/edit" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection

