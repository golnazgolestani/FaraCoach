@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info border-info">
                    <h4 class="card-title m-0">ویرایش گرایش ها</h4>
                </div>
                <div class="card-body" >

                    <form method="post" action="/admin/clinic_basic_info/update_orientation/{{$clinic_Basic_info->id}}" enctype="multipart/form-data">

                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <label for="service"> تخصص :</label>
                        <select class="form-control" id="service" name="parent_id">
                            <option class="disabled" selected>انتخاب کنید</option>
                            @foreach($speciality as $item_speciality)
                                    <option value="{{$item_speciality->id}}" @if($item_speciality->id==$clinic_Basic_info->parent_id) selected @endif>{{$item_speciality->title}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="title">عنوان گرایش</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$clinic_Basic_info->title}}" >
                        </div>

                        <div class="form-group">
                            <label for="pic">عکس شاخص</label>
                            <input type="file" class="form-control" id="pic" name="pic"   >
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select class="form-control" id="status" name="status">
                                <option class="disabled" selected>انتخاب کنید</option>
                                <option value="1" @if($clinic_Basic_info->status==1) selected @endif>فعال</option>
                                <option value="0" @if($clinic_Basic_info->status==0) selected @endif>غیرفعال</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">توضیحات</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$clinic_Basic_info->description}}" >
                        </div>



                        <button type="submit" class="btn btn-primary">اعمال تغییرات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



