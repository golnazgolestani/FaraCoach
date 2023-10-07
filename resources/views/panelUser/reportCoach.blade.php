@extends('panelUser.master.index')
@section('rowcontent')
    <?php
    //$roozha="'Sunday','Friday'";
    $roozha="";
    ?>

    <div id="app" class="col-md-4">
        <p>انتخاب بازه زمانی</p>
        <form method="get" action="/panel/booking/report" id="formBooking">
            {{csrf_field()}}
            <date-picker
                type="date"
                v-model="dates"
                range
                format="jYYYY-jMM-jDD"
                display-format="jYYYY/jMM/jDD"
                name="start_date"
                id="start_date"
            ></date-picker>
            <button type="submit" class="btn btn-success">نمایش</button>
        </form>
    </div>


    <div class="col-md-12 mt-3 table-responsive">
        <p>گزارش عملکرد {{$coach->fname}} {{$coach->lname}}</p>
        <table class="table border table-hover table-striped">
            <tr>
                <th scope="col">#</th>
                <th scope="col">تعداد جلسات کوچینگ در انتظار رزرو</th>
                <th scope="col">تعداد جلسات معارفه در انتظار رزرو</th>
                <th scope="col">تعداد جلسات کوچینگ رزرو شده</th>
                <th scope="col">تعداد جلسات معارفه رزرو شده</th>
                <th scope="col">تعداد جلسات کوچینگ برگزار شده</th>
                <th scope="col">تعداد جلسات معارفه برگزار شده</th>
                <th scope="col">تعداد جلسات کوچینگ کنسل شده</th>
                <th scope="col">تعداد جلسات معارفه کنسل شده</th>
            </tr>
            <tr>
                <td>#</td>
                <td>{{$reserveCoaching->count()}}</td>
                <td>{{$reserveMoarefeh->count()}}</td>
                <td>{{$waitingCoaching->count()}}</td>
                <td>{{$waitingMoarefeh->count()}}</td>
                <td>{{$heldCoaching->count()}}</td>
                <td>{{$heldMoarefeh->count()}}</td>
                <td>{{$cancelCoaching->count()}}</td>
                <td>{{$cancelMoarefeh->count()}}</td>
            </tr>
        </table>
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
                dates: [],
                message:'asdasdasd'
            }

        });


    </script>



@endsection
