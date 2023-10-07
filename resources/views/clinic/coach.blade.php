;@extends('clinic.master.index')


@section('headerscript')

<div class="container">
    <div class="row mb-5">
        <div class="shadow col-12 mt-5 text-left pt-5" id="coach_profile_details">
            <div class="row>">
                <div class="avatar col-xl-3 col-lg-3 col-md-3 col-sm-12 text-center ">
                        <img src="{{asset('/documents/users/default-avatar.png')}}" />

                </div>
            </div>
        </div>
    </div>
</div>


@endsection




@section('footerScript')
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-jalaali@0.7.4/build/moment-jalaali.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-persian-datetime-picker/dist/vue-persian-datetime-picker-browser.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            components: {
                DatePicker: VuePersianDatetimePicker
            },
            data: {
                time:"{{old('time')}}",
                dateMoment: moment('1396/05/03', 'jYYYY/jMM/jDD'),
                dates: [],
                date:[],
                message:'asdasdasd',
                coach:'',
            },
            methods: {
                highlight(formatted, dateMoment, checkingFor) {
                    let attributes = {'title': 'در ' + formatted+" فاقد ساعت خالی می باشد. "};

                    @foreach($bookings as $item)
                        if ((checkingFor === 'day') && (formatted === '{{$item->start_date}}')){
                            attributes['class'] = 'highlighted-1';
                            attributes['title'] = 'رزرو جلسه';
                        }
                    @endforeach
                    return attributes;
                },
                changeDate()
                {

                    this.coach=$("#coach_id").val();
                    if((this.coach==0) &&(this.dateMoment=='') )
                    {
                        var loading = '<div class="alert alert-warning" role="alert">خطا در انتخاب رزروها</div>';
                    }
                    else {

                        var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
                        $("#show_bookings").html(loading);
                        $.ajax({
                            type: 'GET',
                            url: "/booking/createajax?coach=" + this.coach + "&calenderSelector=" + this.date,
                            success: function (data) {
                                $("#show_bookings").html(data);
                            },
                            error : function(data)
                            {
                                $('#show_bookings').text(data.responseJSON.errors);
                                errorsHtml='<div class="alert alert-danger text-left"><ul>';
                                $.each( data.responseJSON.errors, function( key, value ) {
                                    errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                                });
                                errorsHtml += '</ul></div>';

                                $( '#show_bookings' ).html( errorsHtml );
                            }
                        });
                    }
                }
            }
        });
    </script>



    <script src="{{asset('/dashboard/assets/js/datepicker.js')}}"> </script>
    <script>
        $(".calender").datepicker({
            {{--altField : "#calenderSelector",--}}
            {{--//altSecondaryField : "#calenderSecondarySelector",--}}
            {{--format : "short",--}}
            {{--today    :true,--}}
            {{--date:'{{$date_Miladi}}',--}}
            {{--minDate  :'{{$dateNow}}',--}}
            {{--view:'day',--}}
            {{--methods: {--}}
            {{--    highlight(formatted, dateMoment, checkingFor) {--}}
            {{--        let attributes = {'title': 'Today is ' + formatted};--}}
            {{--        if (checkingFor === 'day' && formatted === '1400/07/28'){--}}
            {{--            attributes['class'] = 'highlighted-1';--}}
            {{--            attributes['title'] = 'جشن چهارشنبه سوری';--}}
            {{--        }--}}
            {{--        if (checkingFor === 'day' && formatted === '1400/7/29'){--}}
            {{--            attributes['class'] = 'highlighted-2';--}}
            {{--            attributes['title'] = 'روز ملی شدن صنعت نفت';--}}
            {{--        }--}}
            {{--        return attributes;--}}
            {{--    }--}}
            {{--}--}}

        });
        function changes_datepicker(){

            // var coach=$("#coach_id").val();
            // var calenderSelector=$("#calenderSelector").val();
            // if((coach==0) &&(calenderSelector==0) )
            // {
            //     var loading = '<div class="alert alert-warning" role="alert">خطا در انتخاب رزروها</div>';
            // }
            // else {
            //     var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
            //     $("#show_bookings").html(loading);
            //     $.ajax({
            //         type: 'GET',
            //         url: "/booking/createajax?coach=" + coach + "&calenderSelector=" + calenderSelector,
            //         success: function (data) {
            //             $("#show_bookings").html(data);
            //         }
            //     });
            // }

        }
        function toggleIcon(e) {
            $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('glyphicon-plus glyphicon-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);





        $('.vpd-day').click(function()
        {


        });

    </script>



@endsection
