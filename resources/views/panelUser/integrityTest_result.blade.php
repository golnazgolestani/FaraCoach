@extends('panelUser.master.index')
@section('headerScript')
    <link src="{{asset('/css/bar.chart.min.css')}}" rel="stylesheet" ></link>

@endsection

@section('rowcontent')
    <div class="col-12 mt-5">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-center"> نتیجه آزمون تمامیت شما  </h2>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 text-center">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">امور شخصی</div>
                    <div class="card-body ">
                        <h3 class="card-title">{{$personality_percent}} %</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 text-center">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">تعهدات</div>
                    <div class="card-body ">
                        <h3 class="card-title">{{$tahodat_percent}} %</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 text-center">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">روابط</div>
                    <div class="card-body ">
                        <h3 class="card-title">{{$relation_percent}} %</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 text-center">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">سلامتی و بهداشت</div>
                    <div class="card-body ">
                        <h3 class="card-title">{{$health_percent}} %</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 text-center">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">عرف و مقررات</div>
                    <div class="card-body ">
                        <h3 class="card-title">{{$ghavanin_percent}} %</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 text-center">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">امور مالی</div>
                    <div class="card-body ">
                        <h3 class="card-title">{{$mali_percent}} %</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- <div id="chtAnimatedBarChart" class="container mt-5 ">
        <div class="col-12 mb-5">



        </div>
    </div> -->

@endsection
@section('footerScript')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="{{asset('/js/jquery.bar.chart.min.js')}}"></script>

    <script>
        const myData = [
            { "group_name": "تمامیت", "name": "مالی", "value": {{$mali_percent}} },
            { "group_name": "تمامیت", "name": "امور شخصی", "value": {{$personality_percent}} },
            { "group_name": "تمامیت", "name": "تعهدات", "value": {{$tahodat_percent}} },
            { "group_name": "تمامیت", "name": "روابط", "value": {{$relation_percent}} },
            { "group_name": "تمامیت", "name": "سلامتی", "value": {{$health_percent}} },
            { "group_name": "تمامیت", "name": "قوانین ، عرف و اخلاقیات", "value": {{$ghavanin_percent}} },
        ]
    </script>
    <!--<script>
        $('#chtAnimatedBarChart').animatedBarChart({
            data: myData
        });
    </script>
    <script>
        $('#chtAnimatedBarChart').animatedBarChart({
      data: myData,
      params: {
        group_name: 'group_name', // title for group name to be shown in legend
        name: 'name', // name for xaxis
        value: 'value' // value for yaxis
       }
    });
    </script> -->
    <script>
        $('#chtAnimatedBarChart').animatedBarChart({
            data: myData,
            number_format: {
                format:'',// default number format
                decimal:'.',// decimal symbol
                thousands :',',// thousand separator symbol
                grouping: [3],// thousand separator grouping
                currency: ['%']// currency symbol
            },

                format: "%",
                y: "↑ Frequency",


            // default chart height in px
            //chart_height: 100,

            // enables horizontal bars
            horizontal_bars: false,

            // colors for chart
            colors: null,
            max:100,
            // show chart legend
            show_legend: false,

            // show x grid lines
            x_grid_lines: false,

            // show y grid lines
            y_grid_lines: false,

            // speed for tranistions
            tweenDuration: 300,

            // default bar settings
            bars: {
                padding: 0.075, // padding between bars
                opacity: 0.7, // default bar opacity
                opacity_hover: 0.45, // default bar opacity on mouse hover
                disable_hover: false, // disable animation and legend on hover
                hover_name_text: '', // text for name column for label displayed on bar hover
                hover_value_text: ' از 100%', // text for value column for label displayed on bar hover
            },

            // margins for chart rendering
            margin: {
                top: 0, // top margin
                right: 0, // right margin
                bottom: 50, // bottom margin
                left: 0 // left margin
            },



        });
    </script>
    <!-- <script>
        $('#chtAnimatedBarChart').animatedBarChart({
      data: myData,

      legend: {
        position: LegendPosition.bottom, // legend position (bottom/top/right/left)
        width: 200 // legend width in pixels for left/right
      }
    });
    </script> -->
    <!-- <script>
        instance.updateChart({
            data: new_chart_data
        });
    </script> -->

@endsection
