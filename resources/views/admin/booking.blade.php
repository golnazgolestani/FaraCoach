@extends('admin.master.index')
@section('content')
    <?php
    //$roozha="'Sunday','Friday'";
    $roozha="";
    ?>

    <div id="app" class="col-md-4">
       <!--  @{{message}}
        @{{dates}}
        @{{time}}-->

    <!-- <date-picker :disable="['1397/05/07', '1397/05/08', 'Friday']" /> -->
        <p>اختصاص وقت جدید</p>
        <form method="post" action="/admin/booking" id="formBooking">
            {{csrf_field()}}
            <date-picker
                type="date"
                v-model="dates"
                multiple
                format="jYYYY-jMM-jDD"
                display-format="jYYYY/jMM/jDD"
                :disable="[{{$roozha}}]"
                name="start_date"
                min="{{$dateNow}}"
            ></date-picker>

            <date-picker
                v-model="time"
                type="time"
                jump-minute="10"
                :round-minute=true
                name="start_time"
            ></date-picker>
            <div class="form-check form-check-inline pr-3">
                <input class="form-check-input" type="radio" name="duration_booking" id="duration_booking1" value="1">
                <label class="form-check-label" for="duration_booking1">معارفه 30 دقیقه ای</label>
            </div>
            <div class="form-check form-check-inline text-left">
                <input class="form-check-input" type="radio" name="duration_booking" id="duration_booking2" value="2">
                <label class="form-check-label" for="duration_booking2">کوچینگ 60 دقیقه ای</label>
            </div>
            <button type="submit" class="btn btn-success">ایجاد رزرو</button>
        </form>
    </div>


    <div class="col-md-12 mt-3 table-responsive">
        <table class="table border table-hover table-striped">
            <tr>
                <th scope="col">#</th>
                <th scope="col">تاریخ شروع</th>
                <th scope="col">ساعت شروع</th>
                <th scope="col">ساعت پایان</th>
                <th scope="col">مدت جلسه</th>
                <th scope="col">وضعیت</th>
                <th scope="col">حذف</th>
            </tr>
            @foreach($booking as $item)

                @switch($item->status)
                    @case('1')   <tr class="table-warning">
                        @break
                    @case('0')   <tr class="table-success">
                        @break
                    @case('3')   <tr class="table-danger">
                        @break
                    @default    <tr>
                        @break
                @endswitch

                    <td>#</td>
                    <td>
                        @if(Auth::user()->status_coach==1)
                            @if($item->status==0)
                                <a href="/panel/booking/{{$item->id}}">{{$item->start_date}}</a>
                            @else
                                {{$item->start_date}}
                            @endif
                        @else
                            <a href="/panel/reserve/{{$item->id_reserves}}">{{$item->start_date}}</a>
                        @endif
                    </td>
                    <td>{{$item->start_time}}</td>
                    <td>{{$item->end_time}}</td>
                    <td>{{$item->duration_booking}}</td>
                    @if($item->status==0)
                        <td>
                            <a href="/panel/booking/{{$item->id}}"> {{$item->caption_status}}</a>
                        </td>
                    @else
                            <td>{{$item->caption_status}}</td>
                    @endif

                    @if((Auth::user()->status_coach==1 && ($item['status'])!=0))
                        <td>
                            <form method="post" action="/panel/booking/{{$item->id}}" onsubmit="return confirm('آیا از حذف زمان رزرو اطمینان دارید؟');">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button  class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
        {{$booking->links()}}
    </div>

@endsection

@section('footerScript')



    <script src="{{asset('/js/vue@2.js')}}"></script>
    <script src="{{asset('/js/moment.js')}}"></script>
    <script src="{{asset('/js/moment-jalaali.js')}}"></script>
    <script src="{{asset('/js/vue-persian-datetime-picker-browser.js')}}"></script>
    <script>
        var app = new Vue({
            el: '#app',
            components: {
                DatePicker: VuePersianDatetimePicker
            },
            data: {
                time:"{{old('time')}}",
                dates: [],
                message:'asdasdasd'
            }

        });


    </script>



@endsection
