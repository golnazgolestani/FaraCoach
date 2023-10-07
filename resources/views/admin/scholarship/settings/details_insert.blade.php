@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info border-info">
                    <h4 class="card-title m-0">اضافه کردن عناوین همکاری</h4>
                </div>
                <div class="card-body" >
                    <form method="post" action="/admin/collabration_details">
                        {{csrf_field()}}
                        <div class="form-group mb-2">
                            <label for="title" >عنوان همکاری</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="collabration_categories_id">زمینه همکاری:</label>
                            <select class="form-control" id="collabration_categories_id" name="collabration_categories_id">
                                <option class="disabled" selected>انتخاب کنید</option>
                                @foreach($collabration_category as $item)
                                    <option value="{{$item->id}}" name="collabration_categories_id">{{$item->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit">واحد :</label>
                            <select class="form-control" id="unit" name="unit">
                                <option class="disabled" selected>انتخاب کنید</option>
                                <option value="صفحه استاندارد">صفحه استاندارد</option>
                                <option value="پروژه">پروژه</option>
                                <option value="ساعت">ساعت</option>
                                <option value="نفر">نفر</option>
                                <option value="رویداد/ساعت">رویداد/ساعت</option>
                                <option value="ساعت">ساعت</option>
                                <option value="ارزش ریالی">ارزش ریالی</option>
                                <option value="توافقی">توافقی</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="value" >ارزش واحد</label>
                            <input type="text" class="form-control" id="value" name="value" value="{{old('value')}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="max" >سقف همکاری</label>
                            <input type="text" class="form-control" id="max" name="max" value="{{old('max')}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="max_faracoach" >سقف فراکوچ</label>
                            <input type="text" class="form-control" id="max_faracoach" name="max_faracoach" value="{{old('max_faracoach')}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="description" >توضیحات</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت:</label>
                            <select class="form-control" id="status" name="status">
                                <option class="disabled" selected>انتخاب کنید</option>
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                        <input type="submit" value="اضافه کردن" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
