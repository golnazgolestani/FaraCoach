@extends('admin.master.index')

@section('scripthead')
    <link href="{{asset('../css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('../css/timepicker.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">اضافه کردن دوره</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/courses/{{$course->shortlink}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="course">نام دوره</label>
                    <input type="text" class="form-control @error('course') is-invalid @enderror" id="course" name="course" value="{{$course->course}}"/>
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک</label>
                    <input type="text" class="form-control @error('shortlink') is-invalid @enderror" id="shortlink" name="shortlink" value="{{$course->shortlink}}" />
                </div>
                <div class="form-group">
                    <label>عکس</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" />
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="teacher">مدرس</label>
                    <select id="teacher" class="form-control p-0 @error('teacher') is-invalid @enderror" name="teacher">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($teachers as $item)
                            <option value="{{$item->id}}" @if($item->id==$course->teacher_id) selected @endif>{{$item->fname}} {{$item->lname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">نوع دوره</label>
                    <select id="type" class="form-control p-0 @error('type') is-invalid @enderror" name="type">
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($courseType as $item)
                            <option value="{{$item->id}}" @if($item->id==$course->type) selected @endif >{{$item->type}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="duration">مدت زمان دوره (ساعت)</label>
                    <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{$course->duration}}" />
                    <small>مدت دوره به ساعت باید وارد شود به عنوان مثال 120 </small>
                </div>
                <div class="form-group">
                    <label for="duration_date">مدت دوره (روز/هفته/ماه)</label>
                    <input type="text" class="form-control @error('duration_date') is-invalid @enderror" id="duration_date" name="duration_date" value="{{$course->duration_date}}" />
                    <small>طول مدت دوره باید وارد شود به عنوان مثال: 6 ماه </small>
                </div>
                <div class="form-group">
                    <label for="count_students">حداکثر ظرفیت دوره</label>
                    <input type="number" class="form-control @error('count_students') is-invalid @enderror" id="count_students" name="count_students" value="{{$course->count_students}}" />
                </div>
                <div class="form-group">
                    <label for="coaches">تعداد کوچ ها</label>
                    <input type="number" class="form-control @error('coaches') is-invalid @enderror" id="coaches" name="coaches" value="{{$course->coaches}}" />
                </div>
                <div class="form-group">
                    <label for="coachingbycoach">تعداد جلسات کوچینگ بعنوان کوچ </label>
                    <input type="number" class="form-control @error('coachingbycoach') is-invalid @enderror" id="coachingbycoach" name="coachingbycoach" value="{{$course->coachingbycoach}}" />
                </div>
                <div class="form-group">
                    <label for="coachingbyreference">تعداد جلسات کوچینگ بعنوان مراجع</label>
                    <input type="number" class="form-control @error('coachingbyreference') is-invalid @enderror" id="coachingbyreference" name="coachingbyreference" value="{{$course->coachingbyreference}}" />
                </div>
                <div class="form-group">
                    <label for="intership">تعداد جلسات کارورزی</label>
                    <input type="number" class="form-control @error('intership') is-invalid @enderror" id="intership" name="intership" value="{{$course->intership}}" />
                </div>
                <div class="form-group">
                    <label for="start">تاریخ شروع دوره</label>
                    <input type="text" class="form-control @error('start') is-invalid @enderror" id="start" name="start" value="{{$course->start}}" />
                </div>
                <div class="form-group">
                    <label for="end">تاریخ اتمام دوره</label>
                    <input type="text" class="form-control @error('end') is-invalid @enderror" id="end" name="end" value="{{$course->end}}" />
                </div>
                <div class="form-group">
                    <label for="course_days">روزهای برگزاری دوره</label>
                    <input type="text" class="form-control @error('course_days') is-invalid @enderror" id="course_days" name="course_days" value="{{$course->course_days}}" />
                </div>
                <div class="form-group">
                    <label for="time_fa">ساعت برگزاری دوره</label>
                    <input type="text" class="form-control @error('course_times') is-invalid @enderror" id="time_fa" name="course_times" value="{{$course->course_times}}"/>
                </div>
                <div class="form-group">
                    <label for="exam">تاریخ آزمون</label>
                    <input type="text" class="form-control @error('exam') is-invalid @enderror" id="exam" name="exam" value="{{$course->exam}}"/>
                </div>
                <div class="form-group">
                    <label for="certificate">اطلاعات گواهینامه</label>
                    <input type="text" class="form-control @error('certificate') is-invalid @enderror" id="certificate" name="certificate" value="{{$course->certificate}}"/>
                </div>
                <div class="form-group">
                    <label for="fi">هزینه دوره (تومان)</label>
                    <input type="text" class="form-control @error('fi') is-invalid @enderror" id="fi" name="fi" value="{{$course->fi}}" />
                </div>
                <div class="form-group">
                    <label for="fi_off"> هزینه دوره با تخفیف (تومان)</label>
                    <input type="text" class="form-control @error('fi_off') is-invalid @enderror" id="fi_off" name="fi_off" value="{{$course->fi_off}}" />
                </div>
                <div class="form-group">
                    <label for="type_peymant_id">شرایط پرداخت</label>
                    <select id="type_peymant_id" class="form-control p-0 @error('type_peymant_id') is-invalid @enderror" name="type_peymant_id">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1" @if($course->type_peymant_id==1) selected @endif>نقدی</option>
                        <option value="2" @if($course->type_peymant_id==2) selected @endif>قسطی</option>
                        <option value="3" @if($course->type_peymant_id==3) selected @endif>هر دو</option>
                    </select>
                </div>

                <div class="form-group d-none" id="collapseExample">
                    <label for="prepayment">حداقل پرداخت (تومان)</label>
                    <input type="number" class="form-control @error('prepayment') is-invalid @enderror" id="prepayment" name="prepayment" value="{{$course->prepayment}}" />
                    <small class="text-muted">حداقل مبلغ برای پرداخت اقساط</small>
                </div>

                <div class="form-group" >
                    <label for="peymant_off">درصد تخفیف نقدی</label>
                    <input type="number" class="form-control @error('peymant_off') is-invalid @enderror" id="peymant_off" name="peymant_off" value="{{$course->peymant_off}}" min="0" max="100" />
                    <small class="text-muted">میزان درصد تخفیف نقدی</small>
                </div>

                <div class="form-group">
                    <label for="ckeditor">مطالب دوره</label>
                    <textarea id="ckeditor" name="infocourse" class="@error('infocourse') is-invalid @enderror">{{$course->infocourse}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection

@section('footerScript')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>

    <script>
        $('#type_peymant_id').change(function()
        {
           if($('#type_peymant_id').val()!=1)
           {
               $('#collapseExample').attr('class','form-group');
           }
           else
           {
               $('#collapseExample').attr('class','form-group d-none');
           }

        });
    </script>
@endsection
