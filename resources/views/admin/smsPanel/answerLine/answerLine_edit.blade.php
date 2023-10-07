@extends('admin.master.index')

@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header bg-secondary">
            <h5 class="card-title m-0 p-0 text-light">اضافه کردن کلید</h5>
        </div>
        <div class="card-body bg-secondary-light">
            <form method="post" action="/admin/settings/answerline/{{$answerline->id}}" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="keyword">کلید<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" value="{{old('keyword',$answerline->keyword)}}"/>
                </div>
                <div class="form-group">
                    <label for="user_type">دسته بندی <span class="text-danger">*</span></label>
                    <select id="user_type" class="form-control p-0 @error('user_type') is-invalid @enderror" name="user_type">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($userTypes as $item)
                            <option value="{{$item->code}}" @if(old('user_type',$answerline->user_type)==$item->code) selected @endif  >{{$item->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="problemfollowup_id">کیفیت <span class="text-danger">*</span></label>
                    <select id="problemfollowup_id" class="form-control p-0 @error('problemfollowup_id') is-invalid @enderror" name="problemfollowup_id">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($problemFollowup as $item)
                            <option value="{{$item->id}}" @if(old('problemfollowup_id',$answerline->problemfollowup_id)==$item->id) selected @endif >{{$item->problem}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="followup_comment">متن پیگیری<span class="text-danger">*</span></label>
                    <textarea class="form-control @error('followup_comment') is-invalid @enderror" id="followup_comment" name="followup_comment" rows="3">{{old('followup_comment',$answerline->followup_comment)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="text_message">پیامک ارسالی</label>
                    <textarea class="form-control @error('text_message') is-invalid @enderror" id="text_message" name="text_message" rows="3">{{old('text_message',$answerline->text_message)}}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">وضعیت <span class="text-danger">*</span></label>
                    <select id="status" class="form-control p-0 @error('status') is-invalid @enderror" name="status">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="0" @if(old('status',$answerline->status)==0) selected @endif>غیرفعال</option>
                        <option value="1" @if(old('status',$answerline->status)==1) selected @endif>فعال</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
@endsection
