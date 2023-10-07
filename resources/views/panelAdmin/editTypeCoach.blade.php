@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header bg-info">
            <h5 class="card-title">ویرایش سطح کوچ</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/type_coach/{{$type_coach->id}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="type">دسته بندی</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{$type_coach->type}}"/>
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک</label>
                    <input type="text" class="form-control" id="shortlink" name="shortlink" value="{{$type_coach->shortlink}}"/>
                </div>
                <div class="form-group">
                    <label for="coefficient">ضریب *</label>
                    <input type="text" class="form-control @error('coefficient') is-invalid @enderror" id="coefficient" name="coefficient" value="{{old('coefficient')}}" />
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1" @if($type_coach->status==1) selected @endif>فعال</option>
                        <option value="0" @if($type_coach->status==0) selected @endif>غیرفعال</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
