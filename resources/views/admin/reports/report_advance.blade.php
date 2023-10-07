
@extends('admin.master.index')

@section('headerScript')
    <link rel="stylesheet" href="{{asset('/css/bootstrap-multiselect.min.css')}}" type="text/css"/>
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/pizza_chart/css/pizza.css')}}" rel="stylesheet" />

    <style>
        .clickable-row
        {
            cursor: pointer;
        }



@endsection
@section('content')

    <div class="col-12">
        <form method="get" action="/admin/reports/advance" id="advance_form">
            {{csrf_field()}}
            <div class="row">
                <div class="col-3 mb-1" id="app">
                    <div class="form-group">
                        <date-picker
                            type="date"
                            v-model="range"
                            range
                            format="jYYYY-jMM-jDD"
                            display-format="jYYYY/jMM/jDD"
                            name="range_date"
                            max="{{$dateNow}}"
                            id="start_date"
                        ></date-picker>

                    </div>
                </div>
                <div class="col-3 mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="gender">دسته </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kind" id="kind1" value="پیگیری">
                            <label class="form-check-label" for="kind1">پیگیری شده</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kind" id="kind2" value="ثبت">
                            <label class="form-check-label" for="kind2">ثبت شده</label>
                        </div>
                    </div>

                </div>
                <div class="col-3 mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="gender">جنسیت</label>
                        </div>
                        <select class="custom-select selectpicker" id="gender" name="gender[]" multiple>
                            <option value="NULL">نامشخص</option>
                            <option value="1">مرد</option>
                            <option value="0">زن</option>
                        </select>
                    </div>
                </div>
                <div class="col-3 mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="married">تاهل</label>
                        </div>
                        <select class="custom-select selectpicker" id="married" name="married[]" multiple>
                            <option value="NULL">نامشخص</option>
                            <option value="0">مجرد</option>
                            <option value="1">متاهل</option>
                        </select>
                    </div>
                </div>
                <div class="col-3  mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="state">استان</label>
                        </div>
                        <select class="custom-select selectpicker"  id="state" name="state[]" multiple>
                            <option value="NULL">نامشخص</option>
                            @foreach($states as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3  mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="education">تحصیلات</label>
                        </div>
                        <select class="custom-select selectpicker" multiple="multiple" id="education" name="education[]" >
                            <option value="NULL">نامشخص</option>
                            <option>زیردیپلم</option>
                            <option>دیپلم</option>
                            <option>فوق دیپلم</option>
                            <option>لیسانس</option>
                            <option>فوق لیسانس</option>
                            <option>دکتری و بالاتر</option>
                        </select>
                    </div>
                </div>

                <!--
                <div class="col-3  mb-1">

                    <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                    </div>
                </div>
                -->
                <div class="col-3  mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="social">شبکه های مجازی</label>
                        </div>
                        <select class="custom-select selectpicker" id="social" name="social[]" multiple>
                            <option value="NULL">نامشخص</option>
                            <option value="instagram">اینستاگرام داشته باشد</option>
                            <option value="telegram">تلگرام داشته باشد</option>
                            <option value="linkedin">لینکدین داشته باشد</option>
                        </select>
                    </div>
                </div>
                <div class="col-3  mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="types">دسته بندی</label>
                        </div>
                        <select class="custom-select selectpicker" id="types" name="types[]" multiple>
                            @foreach($userType as $item)
                                <option value="{{$item->code}}">{{$item->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3  mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="gettingKnow">نحوه ورود</label>
                        </div>
                        <select class="custom-select selectpicker"  id="gettingKnow" name="gettingKnow[]" multiple>
                            <option value="NULL">نامشخص</option>
                            @foreach($gettingKnow as $item)
                                <option value="{{$item->id}}">{{$item->category}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3  mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="resource">مبدا ورود</label>
                        </div>
                        <select class="custom-select selectpicker"  id="resource" name="resource[]" multiple>
                            <option value="NULL">نامشخص</option>
                            @foreach($resources as $resource)
                                @if(!is_null($resource->resource))
                                    <option value="{{$resource->resource}}">{{$resource->resource}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                @foreach($tagsParent as $item)
                <div class="col-3  mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="types">تگ {{$item->category}}</label>
                        </div>
                        <select class="custom-select selectpicker" id="types" name="tags[]" multiple>
                                @foreach($item->tags as $item_tags)
                                    <option value="{{$item_tags->id}}">{{$item_tags->tag}}</option>
                                @endforeach

                        </select>

                    </div>
                </div>
                @endforeach

                <div class="col-3  mb-1">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="insert_user">ثبت کننده</label>
                        </div>
                        <select class="custom-select selectpicker"  id="insert_user" name="insert_user[]" multiple>
                            @foreach($insert_user as $item)
                                <option value="{{$item->id}}">{{$item->fname.' '.$item->lname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-3  mb-1">
                    <input type="submit" class="btn btn-success" value="جستجو" id="btn_search">
                </div>
                <div class="col-12 mt-2 border border-top" id="result_search">
                    <table class="dataTable table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>شماره تماس</th>
                            <th>پست الکترونیکی</th>
                            <th>تاریخ ثبت نام</th>
                        </tr>
                        </thead>
                        <tbody>
                            @isset($users)
                                @foreach($users as $item)
                                    <tr class='clickable-row' data-href='{{asset('/admin/user/'.$item->id)}}'>
                                        <td class="text-center">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{asset('/admin/user/'.$item->id)}}">{{$item->fname}}</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{asset('/admin/user/'.$item->id)}}">{{$item->lname}}</a>
                                        </td>
                                        <td dir="ltr" class="text-center">
                                            <a href="{{asset('/admin/user/'.$item->id)}}">{{$item->tel}}</a>
                                        </td>
                                        <td dir="ltr" class="text-center">
                                            <a href="{{asset('/admin/user/'.$item->id)}}">{{$item->email}}</a>
                                        </td>
                                        <td dir="ltr" class="text-center">
                                            <a href="{{asset('/admin/user/'.$item->id)}}">{{$item->created_at}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
                <div class="col-12 table-responsive mb-2 border border-bottom border-1">
                    <table class="dataTable table table-striped">
                        <thead>
                            <tr>
                                <th>استان</th>
                                <th>  تعداد (نفر)</th>
                                <th>  دانشجو (نفر)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users->groupby('state') as $item)
                            <tr>
                                <td>
                                    @if(!is_null($item[0]->get_state))
                                        {{$item[0]->get_state['name']}}
                                    @endif

                                </td>

                                <td>
                                    {{count($item)}}
                                </td>
                                <td>
                                    {{$item->where('type','=',20)->count()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <p>گزارش نحوه آشنایی </p>
                </div>
                <div class="col-12 table-responsive mb-2">
                    <table class="dataTable  table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">نحوه آشنایی </th>
                                <th class="text-center">  تعداد </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users->groupby('gettingknow') as $item)
                                <tr>
                                    <td class="text-center">
                                        @if(!is_null($item[0]->get_gettingknow))
                                            {{$item[0]->get_gettingknow['category']}}
                                        @endif

                                    </td>

                                    <td class="text-center">
                                        {{count($item)}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 border-top">
                    <p>تفکیک تحصیلات </p>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4 " >
                            <ul data-pie-id="svgEducation">
                                @foreach($users->groupby('education') as $item)
                                    <li data-value="{{count($item)}}"> @if(is_null($item[0]->education)) {{"نامشخص (".count($item).")"}} @else {{$item[0]->education."(".count($item).")"}} @endif </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-4">
                            <div id="svgEducation"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 border-top">
                    <p>تفکیک جنسیت </p>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4 " >
                            <ul data-pie-id="svg">
                                @foreach($users->groupby('sex') as $item)

                                    @switch($item[0]->sex)
                                        @case ("1")
                                        <li data-value="{{count($item)}}"> مرد ({{count($item)}})</li>
                                        @break
                                        @case ("0")
                                        <li data-value="{{count($item)}}"> زن ({{count($item)}})</li>
                                        @break
                                        @default
                                        <li data-value="{{count($item)}}"> نامشخص ({{count($item)}})</li>
                                        @break
                                    @endswitch
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-4">
                            <div id="svg"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 border-top">
                    <p>تفکیک سن </p>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4 " >
                            <ul data-pie-id="svgAges">
                                <li data-value="{{$ages['ageTo20']}}">تا 20 سال:  {{$ages['ageTo20']}}  نفر</li>
                                <li data-value="{{$ages['age21to30']}}">بین 21 تا 30 سال:  {{$ages['age21to30']}} نفر </li>
                                <li data-value="{{$ages['age31to40']}}">بین 31 تا 40 سال:  {{$ages['age31to40']}} نفر </li>
                                <li data-value="{{$ages['age41to50']}}">بین 41 تا 50 سال:  {{$ages['age41to50']}} نفر </li>
                                <li data-value="{{$ages['age51to60']}}">بین 51 تا 60 سال:  {{$ages['age51to60']}} نفر </li>
                                <li data-value="{{$ages['age61to70']}}">بین 61 تا 70 سال:  {{$ages['age61to70']}} نفر </li>
                                <li data-value="{{$ages['age71to80']}}">بین 71 تا 80 سال:  {{$ages['age71to80']}} نفر </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <div id="svgAges"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                range:[],
            }

        });


    </script>


    <script src="{{asset('/js/bootstrap-multiselect.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('.selectpicker').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true,
                maxHeight: 150
            });
        });
    </script>



    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('/panel_assets/js/scripts/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/buttons.print.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                dom: 'Bfrltip',
                buttons: [
                    'excel'
                ]
            } );
        } );
    </script>


    <script>
            $(document).ready(function() {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                    console.log($(this).data("href"));
                });
            });




            // $('#btn_search').click(function (e)
            // {
            //     e.preventDefault();
            //     $.ajax({
            //         type:'POST',
            //         url:'/admin/reports/advance/',
            //         data:$("#advance_form").serialize(),
            //         success:function(data)
            //         {
            //             var i=1;
            //             //errorsHtml='<tr>';
            //             errorsHtml='';
            //             $.each( data, function( key, value ) {
            //                 console.log(value['fname']);
            //                 errorsHtml += '<tr><td>'+ value['fname'] + '</td><td>'+(i++)+'</td></tr>'; //showing only the first error.
            //             });
            //             //errorsHtml += '</tr>';
            //             $( '#result_search tbody' ).html(errorsHtml);
            //
            //         },
            //         error:function(data)
            //         {
            //             $('#error_div').text(data.responseJSON.errors);
            //             errorsHtml='<div class="alert alert-danger text-left"><ul>';
            //             $.each( data.responseJSON.errors, function( key, value ) {
            //                 errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
            //             });
            //             errorsHtml += '</ul></div>';
            //
            //             $( '#error_div' ).html( errorsHtml );
            //         }
            //     },
            //     )
            //
            // });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{asset('/pizza_chart/js/vendor/snap.svg.js')}}" ></script>
    <script src="{{asset('/pizza_chart/js/pizza.js')}}" ></script>
    <script>
        var t=$.noConflict();
        t(window).load(function() {
            Pizza.init( );
        })
    </script>

@endsection
