@extends('panelUser.master.index')
@section('rowcontent')
    <style>
        .fali{
            margin-top: 100px;
            line-height: 2.4em;
        }
        div h1{
            color:red;
            text-align:center;
        }
        div p{
            line-height: 2.4em;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center font-weight-bold">
                <img src="{{asset('/images/int.png')}}" class="img-fluid mb-3" />
                <div class=" mt-4 mb-4  text-justify">
                    <h1> وبینار تمامیت </h1>
                    <p>وبینار با موضوع تمامیت در تاریخ 1400/07/01 با حضور جناب آقای یاسر متحدین ، سرکار خانم دکتر ندا مفاخری و سرکارخانم دکتر لیلا عزیزی برگزار شد.</p>
                </div>

            </div>

                <div class="col-12 ">
                    <iframe src="https://www.aparat.com/video/video/embed/videohash/1UofG/vt/frame" width="100%" height="600px"></iframe>

                </div>

        </div>
    </div>





@endsection
