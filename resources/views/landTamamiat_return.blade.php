@extends('master.index')

@section('headerscript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        *
        {
            font-size:18px;
        }

        #link_copy
        {
            cursor: pointer;
        }

        #guest *
        {
            font-size: 15px;
        }
    </style>
@endsection
@section('row1')
    <div class="container mt-5" id="int">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5 mt-2">
                 <img src="{{asset('/images/int.png')}}" target="_blank" class="img-fluid img-thumbnail " id="banner" />
            </div>
            <div class="col-12">
                <p class="font-weight-bold text-center text-success mb-5">با تشکر،  مرحله اول رزرو در وبینار تمامیت با موفقیت انجام شد</p>
            </div>
            <div class="col-12 border bg-success p-3 text-light">
                <p class="font-weight-bold" >مسئولیت اجتماعی شما  :</p>
                <p class="d-inline">ما بدلیل ارزش بسیار بالای این موضوع و دسترسی عموم جامعه ،  این  دوره را به  شما <p class="d-inline" style="color: yellow">هدیه</p><p class="d-inline">  میدهیم. لطفا شما هم در آگاهی جامعه نسبت به مقوله مهم «تمامیت» یاری کننده باشید.</p>
                <p >شما هم وفادارانه در راستای مسئولیت اجتماعی خود، در حد توان نسبت به اطلاع رسانی این وبینار سهیم باشید. </p>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-6 mt-3" >
                <p>من داوطلبانه نسبت به :</p>
                @if($errors->any())
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    </div>
                @endif
                <form method="post" action="/landPage/{{$land->id}}" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <div class="form-check mb-3">
                            <input class="form-check-input border-danger items" type="checkbox" id="item1" name="options[]" value="انتشار پوستر وبینار در صفحه اینستاگرامم" />
                            <label class="form-check-label m-0 p-0" for="item1">
                                انتشار پوستر وبینار در صفحه اینستاگرامم
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input items" type="checkbox"  id="item2" name="options[]" value="ارسال لینک ثبت نام برای دوستان و عزیزانم اقدام خواهم کرد">
                            <label class="form-check-label m-0 p-0" for="item2">
                                ارسال لینک ثبت نام برای دوستان و عزیزانم
                            </label>
                        </div>
                        <div class="input-group mb-3" id="guest">
                            <div class="input-group-prepend">
                                <span class="input-group-text">تعداد میهمان همراه :</span>
                            </div>
                            <input type="number" class="form-control" name="count" min="0"/>
                            <div class="input-group-append">
                                <span class="input-group-text">نفر</span>
                            </div>
                        </div>
                        <p class="d-block pt-2">اقدام میکنم</p>


                        <input type="submit" id="send" class="btn btn-success mb-3 send" value="پایان مرحله دوم و رزرو وبینار" />
                        <br/>
                    </div>
                </form>
                <b>لینک اختصاصی معرفی دوستان: </b>
                <p class="p-3 bg-light rounded text-center" id="link_copy" >{{asset('/integrity?q='.$land->id)}}</p>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-6 text-center">
                <a href="{{asset('/images/story1-small.jpg')}}" class="btn btn-primary m-2" target="_blank">
                    دانلود پوستر سایز استوری
                    <i class="bi bi-download"></i>
                </a>

                <a href="{{asset('/images/integrity2.jpg')}}"  class="btn btn-primary" target="_blank" >
                    دانلود پوستر سایز پست
                    <i class="bi bi-download"></i>
                </a>

            </div>
        </div>
    </div>

@endsection

@section('footerScript')
    <script>

        $(document).ready(function()
        {
            $(".send ").hide();
        });

        $("#link_copy").click(function()
        {
            var links=this.innerHTML;
            navigator.clipboard.writeText(links);
            alert('لینک اختصاصی کپی شد');
        });



        $(".items").change(function()
        {
            var sw=false;
            var c=($('.items').length);
            for (i=0;i<c;i++)
            {
                if($('.items')[i].checked==true)
                {
                    console.log('AAAAA');

                    sw=true;

                }
                if (sw==true){
                    $(".send ").show();
                }
                else{
                    $(".send ").hide();
                }
            }

        });




    </script>

@endsection
