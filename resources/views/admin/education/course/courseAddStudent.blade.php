@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="col-6">

        <div class="form-group">
            <label for="user">جستجو کاربر:</label>
            <input id="user" type="text" class="form-control @error('user') is-invalid @enderror"  value="{{ old('user') }}" autocomplete="off"   />
        </div>
        <form method="post" action="/admin/education/students">
            {{csrf_field()}}
            <input type="hidden" value="{{$course->id}}" name="course_id" />
            <div id="show"></div>
            <div id="insertStudent" class="d-none">
                <div class="form-group">
                    <label for="date">تاریخ ثبت نام:</label>
                    <input type="text" class="form-control" id="date" name="date_fa" autocomplete="off"  />
                </div>
                <div class="form-group">
                    <label for="status">وضعیت
                        <span class="text-danger text-bold">*</span>
                    </label>
                    <select class="form-control" id="status" name="status">
                        <option disabled selected>انتخاب کنید</option>
                        <option value="1">دانشجو</option>
                        <option value="2">انصراف</option>
                        <option value="3">فارغ التحصیل</option>
                        <option value="4">مرخصی</option>
                        <option value="5">بلاتکلیف</option>
                        <option value="6">اخراج</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">اضافه</button>
            </div>
        </form>

    </div>
@endsection

@section('footerScript')
    <!--  DATE SHAMSI PICKER  --->
    <script src="{{asset('js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('js/kamadatepicker.holidays.js')}}"></script>

    <script>
        kamaDatepicker('date',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });



        $('#user').change(function()
        {
            $('#show').html("<div class=\"spinner-border text-primary\" role=\"status\">\n" +
                "  <span class=\"sr-only\">Loading...</span>\n" +
                "</div>");
            user=$('#user').val();
            var data={
                user:user,
                _token: $('meta[name="csrf-token"]').attr('content'),
            }

            $.ajax({
                data: data,
                type:'post',
                url:'/admin/user/ajax/search',
                success:function (data)
                {

                    if(data.length==0)
                    {
                        errorsHtml='<div class="alert alert-danger text-left"><ul><li>کاربری یافت نشد</li></ul></div>';
                        $('#show').html( errorsHtml );
                    }
                    else
                    {

                        for (i=0;i<data.length;i++)
                        {
                            users="<label for=\"exampleFormControlSelect1\">دانشجو را انتخاب کنید <span class=\"text-danger text-bold\">*</span></label>" +
                                "<select class=\"form-control\" id=\"exampleFormControlSelect1\" name='user_id'>" +
                                "<option selected disabled>انتخاب کنید</option>";
                            $.each( data, function( key, value ) {
                                // var item="{'fname':'"+value.fname+"', 'lname':'"+value.lname+"', 'id':'"+value.id+"'}";
                                var item=JSON.stringify('{"name":"John", "age":30, "city":"New York"}');

                                users += ''+
                                    '<option value="'+value.id+'">'+
                                        value.fname+' '+value.lname+' '+value.tel+
                                    '</option>';
                            });
                            users=users+"</select>"
                        }
                        $('#show').html(users);
                        $('#insertStudent').attr('class','');
                    }

                },
                error : function(data)
                {

                    $('#show').text(data.responseJSON.errors);
                    errorsHtml='<div class="alert alert-danger text-left"><ul>';
                    $.each( data.responseJSON.errors, function( key, value ) {
                        errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></div>';

                    $( '#show' ).html( errorsHtml );
                }
            })
        });

        // $('body').on('click','.students',function(){


    </script>
@endsection
