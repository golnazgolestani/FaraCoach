@extends('panelUser.master.index')
@section('headerScript')
    <link rel="stylesheet" href="{{asset('/css/bootstrap-multiselect.min.css')}}" type="text/css"/>
    <link href="{{asset('/trumbowyg-2.25.1/dist/ui/trumbowyg.min.css')}}" rel="stylesheet" />
    <style>
        body{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .form-control{
            background-color: #fdfdff !important;
            border: #fdfdff !important;
        }
        .content-wrapper{
            background-color: #fdfdff !important;
        }
        .position-sticky{
            background-color: #0c2646;
            border-radius: 3px;
            height: 450px;
            width: auto;
            top: 130px;
            text-align:center;

        }
        #pic-coach{
            border-radius: 50%;
            width: 200px;
            height: 200px;
            text-align:center;
            margin: 40px;
        }
        .container{
            margin: 30px auto;
        }
        .line{
            padding: 70px 50px 5px 0px;
            border-right: 3px solid #5ACFD6;
        }
        .form-group{
            text-align: right;
            padding: 15px;
            border:1px solid #5ACFD6;
            color: #03254a;
            margin: 20px 0;
            position: relative;
        }
        .form-group:before{
            content: '';
            position: absolute;
            right: -80px;
            top: 7px;
            width: 20px;
            height: 20px;
            border: 5px solid #D2FAFB;
            border-radius: 50%;
            background-color: #5ACFD6;
        }
        .form-group:after{
            content: '';
            position: absolute;
            right: -18px;
            top: 7px;
            width: 0;
            height: 0;
            border-top: 8px solid transparent;
            border-left: 8px solid transparent;
            border-bottom: 8px solid transparent;
            border-left: 10px solid #5ACFD6;
        }
        #border{
            border: none!important;
            top:-18px;
        }
        #border:after , #border:before{
            content: '';
            border-top: none!important;
            border-left: none!important;
            border-bottom: none!important;
            border-left: none!important;
            width: 0!important;
            height: 0!important;
        }
        #btn{
            text-align:left;
        }
    </style>
@endsection
@section('rowcontent')
    <div class=" container col-xs-12 col-md-3 col-lg-3 col-xl-3">
        <div class="position-sticky " >
            <img src=" {{asset('/documents/users/'.Auth::user()->personal_image)}}" id="pic-coach" />
            <p style="color:#fff;" >{{Auth::user()->fname.' '.Auth::user()->lname}}</p>
        </div>
    </div>
    <!-----------------------------------ستون سمت چپ - رزومه کوچ --------------------------------->

    <div class=" container col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="line">
            <div class="card-body">
                <form method="post" action="/panel/coach" >
                    {{csrf_field()}}
                    <label for="education_background">سوابق تحصیلی *</label>
                    <div class="form-group">
                        <textarea class="form-control @error('education_background') is-invalid @enderror " name="education_background" id="education_background" rows="3">{{old('education_background')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="certificates">گواهینامه ها *</label>
                        <textarea class="form-control @error('certificates') is-invalid @enderror " name="certificates" id="certificates" rows="3">{{old('certificates')}}</textarea>
                        <div id="btn">
                            <button type=" " class="btn btn-primary btn-sm" >مشاهده گواهینامه</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="experience">سوابق کاری *</label>
                        <textarea class="form-control @error('experience') is-invalid @enderror " name="experience" id="experience" rows="3">{{old('experience')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="skills">مهارت ها *</label>
                        <textarea class="form-control @error('skills') is-invalid @enderror " name="skills" id="skills" rows="3">{{old('skills')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="researches">سوابق علمی </label>
                        <textarea class="form-control @error('researches') is-invalid @enderror " name="researches" id="researches" rows="3">{{old('researches')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="count_meeting">تجربه برگزاری جلسات رایگان *</label>
                        <small id="count_meetinglHelp" class="form-text text-muted"> تعداد ساعت جلساتی که تاکنون توسط شما ارائه شده است را وارد کنید</small>
                        <input type="number" class="form-control" id="count_meeting" name="count_meeting" aria-describedby="count_meetingHelp" min="0" max="10000" value="{{old('count_meeting')}} ساعت " />

                    </div>
                    <div class="form-group">
                        <label for="count_meeting">تجربه برگزاری جلسات قراردادی *</label>
                        <small id="count_meetinglHelp" class="form-text text-muted">تعداد ساعت جلساتی که تاکنون توسط شما ارائه شده است را وارد کنید</small>
                        <input type="number" class="form-control" id="count_meeting" name="count_meeting" aria-describedby="count_meetingHelp" min="0" max="10000" value="{{old('count_meeting')}}"/>
                    </div>
                    <div class="form-group">
                        <label for="customer_satisfaction">درصد رضایت مشتریان *</label>
                        <small id="customer_satisfactionHelp" class="form-text text-muted"> تعداد افرادی که رضایت کامل از جلسات مشاوره داشته اند وارد کنید</small>
                        <input type="number" class="form-control" id="customer_satisfaction" name="customer_satisfaction" aria-describedby="customer_satisfactiongHelp" min="0" max="1000" value="{{old('customer_satisfaction')}}"/>
                    </div>
                    <div class="form-group">
                        <label for="change_customer">درصد تبدیل مشتری *</label>
                        <small id="change_customerHelp" class="form-text text-muted"> تعداد افرادی که تبدیل به مشتری وفادارا شده اند را وارد کنید</small>
                        <input type="number" class="form-control" id="change_customer" name="change_customer" aria-describedby="change_customerHelp" min="0" max="1000" value="{{old('change_customer')}}"/>
                    </div>
                    <div class="form-group">
                        <label for="count_recommendation">تعداد توصیه نامه *</label>
                        <small id="count_recommendationHelp" class="form-text text-muted"> تعداد توصیه نامه هایی که تاکنون داشته اید را وارد کنید</small>
                        <input type="number" class="form-control" id="count_recommendation" name="count_recommendation" aria-describedby="count_recommendationHelp" min="0" max="1000" value="{{old('count_recommendation')}}"/>
                    </div>
                    <div class="form-group">
                        <label for="selectpicker">دسته بندی ها *</label>
                        <div class="form-group" id="border">
                            <select class="form-control selectpicker" multiple="multiple" name="category[]" id="selectpicker" >
                                @foreach($categoryCoaches as $item)
                                    <option value="{{$item->id}}" >{{$item->category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="typecoach_id">سطح *</label>
                        <div class="form-group" id="border">
                            <select class="form-control"  name="typecoach_id" id="typecoach_id" >
                                <option selected disabled>انتخاب کنید</option>
                                @foreach($typeCoaches as $item)
                                    <option value="{{$item->id}}" >{{$item->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="btn">
                        <button type="submit" class="col-4 mx-auto btn btn-primary" >انتشار</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{asset('/js/bootstrap-multiselect.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('#selectpicker').multiselect();
        });


    </script>


    <script src="{{asset('/trumbowyg-2.25.1/dist/trumbowyg.min.js')}}"></script>
    <script src="{{asset('/trumbowyg-2.25.1/dist/langs/fa.js')}}"></script>
    <script>
        $('textarea').trumbowyg({
            lang:'fa',
            btns: [
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                //['link'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ]
        })
    </script>
@endsection
