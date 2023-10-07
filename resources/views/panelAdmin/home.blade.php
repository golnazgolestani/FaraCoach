@extends('admin.master.index')
@section('rowcontent')

        <div class="col-12">
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 mb-3" id="app">
                    <form method="GET" action="/panel">
                        <div class="form-group">
                            <label for="start_date">بازه نمایش را وارد کنید</label>
                            <date-picker
                                type="date"
                                v-model="dates"
                                range
                                format="jYYYY-jMM-jDD"
                                display-format="jYYYY/jMM/jDD"
                                name="start_date"
                                max="{{$dateNow}}"
                                id="start_date"
                            ></date-picker>
                            <button type="submit" class="btn btn-success btn-sm" name="range">نمایش بده</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام و نام خانوادگی</th>
                    <th scope="col">ورودی ها</th>
                    <th scope="col">پیگیری ها</th>
                    <th scope="col">پیگیری های امروز </th>
                    <th scope="col">پیگیری های انجام شده امروز </th>
                    <th scope="col">تور پیگیری</th>
                    <th scope="col">در انتظار تصمیم</th>
                    <th scope="col">مشتری</th>
                    <th scope="col">عدم پاسخ</th>
                    <th scope="col">انصرافی ها</th>
                    <th scope="col">مدت مکالمه روز</th>
                    <th scope="col">مدت مکالمه</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;

                ?>
                @foreach($usersEducation as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td scope="row">{{$item->fname}} {{$item->lname}}</td>
                        <td scope="row">{{number_format($item->insertuser)}}</td>
                        <td scope="row">{{number_format($item->allFollowups)}}</td>
                        <td scope="row">{{number_format($item->todayFollowups)}}</td>
                        <td scope="row">{{number_format($item->followedTodaybyID)}}</td>
                        <td scope="row">{{number_format($item->continuefollowup)}}</td>
                        <td scope="row">{{number_format($item->waiting)}}</td>
                        <td scope="row">{{number_format($item->students)}}</td>
                        <td scope="row">{{number_format($item->noanswering)}}</td>
                        <td scope="row">{{number_format($item->cancelfollowup)}}</td>
                        <td scope="row">{{number_format($item->talktimeToday)}}</td>
                        <td scope="row">{{number_format($item->talktime)}}</td>
                    </tr>
                @endforeach
                    <tr class="text-bold">
                        <td>{{$i++}}</td>
                        <td>جمع کل</td>
                        <td>{{number_format($suminsertuser)}}</td>
                        <td>{{number_format($sumallFollowups)}}</td>
                        <td>{{number_format($sumtodayFollowups)}}</td>
                        <td>{{number_format($sumfollowedTodaybyID)}}</td>
                        <td>{{number_format($sumcontinuefollowup)}}</td>
                        <td>{{number_format($sumwaiting)}}</td>
                        <td>{{number_format($sumstudents)}}</td>
                        <td>{{number_format($sumnoanswering)}}</td>
                        <td>{{number_format($sumcancelfollowup)}}</td>
                        <td>{{number_format($sumtalktimeToday)}}</td>
                        <td>{{number_format($sumtalktime)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    @include('panelAdmin._cardBox')


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
