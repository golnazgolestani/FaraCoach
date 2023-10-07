@extends('admin.master.index')
@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/timepicker.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">اضافه کردن پیگیری از طریق اکسل</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/followup/excel/store" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>فایل اکسل</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('excel') is-invalid @enderror" id="excel" name="excel" />
                        <label class="custom-file-label" for="excel">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="type">دسته بندی <span class="text-danger">*</span></label>
                    <select id="type" class="form-control p-0 @error('type') is-invalid @enderror" name="type">
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
                    <label for="course_id">دوره پیگیری شده <span class="text-danger">*</span></label>
                    <select id="course_id" class="form-control p-0 @error('course_id') is-invalid @enderror" name="course_id">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($course as $item)
                            <option value="{{$item->id}}">{{$item->course}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="followup_comment">توضیحات پیگیری<span class="text-danger">*</span></label>
                    <textarea class="form-control @error('followup_comment') is-invalid @enderror" id="followup_comment" name="comment" rows="3">{{old('followup_comment')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="date_fa">تاریخ پیگیری شده <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <input type="text" class="form-control  @error('date_fa') is-invalid @enderror" id="date_fa" name="date_fa" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="time_fa"> ساعت پیگیری شده<span class="text-danger">*</span></label>
                    <div class="form-group">
                        <input type="text" class="form-control  @error('time_fa') is-invalid @enderror" id="time_fa" name="time_fa" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="nextfollowup_date_fa"> تاریخ پیگیری بعد</label>
                    <div class="form-group">
                        <input type="text" class="form-control  @error('nextfollowup_date_fa') is-invalid @enderror" id="nextfollowup_date_fa" name="nextfollowup_date_fa" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">ارسال فایل</button>
            </form>
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="{{asset('/js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('/js/kamadatepicker.holidays.js')}}"></script>
    <script>
        var customOptions={
            gotoToday: true,
            markHolidays:true,
            markToday:true,
            twodigit:true,
            closeAfterSelect:true,
            highlightSelectedDay:true,
            nextButtonIcon: "fa fa-arrow-circle-right",
            previousButtonIcon: "fa fa-arrow-circle-left",
            sync:true,
        }
        kamaDatepicker('date_fa',customOptions);
        kamaDatepicker('nextfollowup_date_fa',customOptions);
    </script>
    <script src="{{asset('js/timepicker.js')}}"></script>
    <script>
        $(document).ready(function()
        {
            jQuery.noConflict();
            jQuery('#time_fa').timepicker();
        });
    </script>
@endsection
