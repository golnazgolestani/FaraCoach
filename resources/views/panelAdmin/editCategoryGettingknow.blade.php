@extends('panelAdmin.master.index')
@section('rowcontent')

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form method="post" action="/admin/category_gettingknow/{{$category_gettingknow->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="category">دسته بندی </label>
                <input type="text" class="form-control" id="category" name="category" value="{{$category_gettingknow->category}}" />
            </div>
            <div class="form-group">
                <label for="parent" >سرگروه</label>
                <select class="form-control  p-0" id="parent" name="parent_id">
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    <option value="NULL" >والد</option>
                    @foreach($categoryGettingknow as $item)
                        <option value="{{$item->id}}" @if($category_gettingknow->parent_id==$item->id) selected @endif >{{$item->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="statusProblem" >وضعیت</label>
                <select class="form-control  p-0" id="statusProblem" name="status">
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    <option value="1" @if($category_gettingknow->status==1) selected @endif>انتشار</option>
                    <option value="0" @if($category_gettingknow->status==0) selected @endif>عدم انتشار</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">ذخیره</button>
            </div>

        </form>
    </div>
@endsection
