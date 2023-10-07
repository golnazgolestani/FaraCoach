@extends('admin.master.index')

@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header bg-secondary">
            <h5 class="card-title m-0 p-0 text-light">اضافه کردن کلید</h5>
        </div>
        <div class="card-body bg-secondary-light">
            <form method="post" action="/admin/settings/answerline" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="keyword">کلید<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" value="{{old('keyword')}}"/>
                </div>
                <div class="form-group">
                    <label for="user_type">دسته بندی <span class="text-danger">*</span></label>
                    <select id="user_type" class="form-control p-0 @error('user_type') is-invalid @enderror" name="user_type">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($userTypes as $item)
                            <option value="{{$item->code}}">{{$item->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="problemfollowup_id">کیفیت <span class="text-danger">*</span></label>
                    <select id="problemfollowup_id" class="form-control p-0 @error('problemfollowup_id') is-invalid @enderror" name="problemfollowup_id">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($problemFollowup as $item)
                            <option value="{{$item->id}}">{{$item->problem}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="followup_comment">متن پیگیری<span class="text-danger">*</span></label>
                    <textarea class="form-control @error('followup_comment') is-invalid @enderror" id="followup_comment" name="followup_comment" rows="3">{{old('followup_comment')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="text_message">پیامک ارسالی</label>
                    <textarea class="form-control @error('text_message') is-invalid @enderror" id="text_message" name="text_message" rows="3">{{old('text_message')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">وضعیت <span class="text-danger">*</span></label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="0" >غیرفعال</option>
                        <option value="1" >فعال</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">افزودن</button>
            </form>
        </div>
    </div>
@endsection
