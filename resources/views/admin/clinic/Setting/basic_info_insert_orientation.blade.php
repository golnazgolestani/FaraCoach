@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info border-info">
                    <h4 class="card-title m-0">افزودن گرایش جدید </h4>
                </div>
                <div class="card-body" >
                    <form method="post" action="/admin/clinic_basic_info/store_speciality" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <p id="service_title">

                            </p>
                            <label for="service">انتخاب تخصص :</label>

                            <select class="form-control" id="service" name="parent_id">
                                <option class="disabled" selected>انتخاب کنید</option>
                                @foreach($services_all as $item_service)
                                    @foreach($item_service->speciality_infos as $item)
                                        <option value="{{$item->id}}" >{{$item->title}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">عنوان گرایش</label>
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
                    <th > گرایش </th>
                    <th>تخصص</th>
                    <th>وضعیت</th>
                    <th>ویرایش</th>
                </tr>
                @foreach($speciality as $item_speciality)
                    <tr class="text-center">
                        <td>{{$item_speciality->title}}</td>
                        @foreach($services_all as $item_service)
                            @foreach($item_service->speciality_infos as $item)
                                @if($item->id==$item_speciality->parent_id)
                                <td>{{$item->title}}</td>
                                @endif
                            @endforeach
                        @endforeach
                        <td>
                            @if($item_speciality->status==1)
                                فعال
                            @else
                                غیرفعال
                            @endif
                        </td>
                        <td>
                            <a href="/admin/clinic_basic_info/edit_orientation/{{$item_speciality->id}}/edit" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection
@section('footerScript')

    <script>


        $("#service").change(function()
            {
                let clinic_basic_info = $("#service").val();


                $.ajax(
                    {
                        type : 'GET',
                        url : '/admin/clinic_basic_info/create_orientations',
                        success:function(data)
                        {
                           $('#service_title').html(data);
                        }
                    }
                )
            }
        );
    </script>
@endsection


