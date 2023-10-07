@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form method="post" action="/admin/settings/tags/update/{{$tag->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="tag">نتیجه پیگیری</label>
                <input type="text" class="form-control" id="tag" lang="fa" name="tag"  value="{{$tag->tag}}"/>
            </div>
            <div class="form-group">
                <label for="category_tags_id" >دسته بندی</label>
                <select class="form-control  p-0" id="category_tags_id" >
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    @foreach($categoryTags as $item)
                        <option value="{{$item->id}}"  @if($item->id==$tag->category_tags_id) selected @endif >{{$item->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_tags_id" >زیرمجموعه</label>
                <select class="form-control  p-0" id="sub_category_tags" name="category_tags_id">
                    <option disabled="disabled" selected>انتخاب کنید</option>
                </select>
            </div>
            <div class="form-group">
                <label for="statusProblem" >وضعیت</label>
                <select class="form-control p-0" id="statusProblem" name="status">
                    <option disabled="disabled" selected>انتخاب کنید</option>
                    <option value="1" @if($tag->status==1) selected @endif >انتشار</option>
                    <option value="0" @if($tag->status==0) selected @endif >عدم انتشار</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">ذخیره</button>
            </div>

        </form>
    </div>
@endsection
