    <div class="col-12 mt-3 border-top pt-3">
    <p>برای رزرو زمان مشخص شده لطفا فرم زیر را پر کنید</p>
    <form method="post" action="/{{$booking->id}}" id="reserveForm">
        {{csrf_field()}}
        <div class="alert alert-info text-center" role="alert">
            تاریخ {{$booking->start_date}} در ساعت {{$booking->start_time}} تا {{$booking->end_time}}
        </div>

        <input type="hidden" value="{{$booking->id}}" name="booking_id">

        <div class="form-group">
            <label for="subject">موضوع جلسه درخواستی:<span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control" id="subject"  name="subject" placeholder="لطفا در مورد هر موضوع خلاصه ای یک سطری بنویسید"  autocomplete="subject" />
            <small>لطفا در مورد هر موضوع خلاصه ای یک سطری بنویسید</small>
        </div>

        <div class="form-group">
            <label for="type_coach">نوع جلسه<span class="text-danger">*</span></label>
            <select class="form-control form-control" id="type_coach" name="type_booking"  >
                <option disabled selected>انتخاب کنید</option>
                @switch($booking->coach->type_holding)
                    @case('1'): <option value="1">حضوری</option>
                             @break
                    @case('2'):<option value="2">آنلاین</option>
                            @break
                    @case('0'):
                                <option value="1">حضوری</option>
                                <option value="2">آنلاین</option>
                                <option value="0">فرقی ندارد</option>
                            @break
                @endswitch
            </select>
        </div>
        <div class="form-group">
            <label for="details">توضیحات</label>
            <textarea class="form-control form-control" id="details" rows="3" name="details"></textarea>
        </div>
        <button type="button" class="btn btn-primary btn-lg btn-block " id="mohasebe">اضافه به سبد</button>
        <div class="card" >
            <div class="card-body" id="div_mohasebe">

            </div>
        </div>
    </form>
</div>
<script>
    $('#mohasebe').click(function()
    {
        var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
            $("#div_mohasebe").html(loading);
            var data=$('#reserveForm').serialize();
            $.ajax({
                type: 'POST',
                url: "/booking/mohasebe" ,
                data:data,

                success: function (data) {
                        $("#div_mohasebe").html(data);
                },
                error : function(data)
                {
                    $('#div_mohasebe').text(data.responseJSON.errors);
                    errorsHtml='<div class="alert alert-danger text-left"><ul>';
                    $.each( data.responseJSON.errors, function( key, value ) {
                        errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></div>';

                    $( '#div_mohasebe' ).html( errorsHtml );
                }
            });


    });
</script>
