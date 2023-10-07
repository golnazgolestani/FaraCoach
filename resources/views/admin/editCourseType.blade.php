@extends('admin.master.index')
@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">ویرایش اطلاعات نوع دوره</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/coursetype/{{$courseType->shortlink}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="type">نوع دوره</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{$courseType->type}}"/>
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک</label>
                    <input type="text" class="form-control" id="shortlink" name="shortlink" value="{{$courseType->shortlink}}"/>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1" @if($courseType->status==1) selected @endif>نمایش</option>
                        <option value="0" @if($courseType->status==0) selected @endif>عدم نمایش</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
