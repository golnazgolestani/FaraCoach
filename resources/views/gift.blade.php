@extends('master.index')

@section('headerscript')
    <style>
        .back{
            width:100%;
            height:auto;
        }
        .gift{
            width:50%;
        }
        @media screen and (max-width: 321px) {
            .btn img, button {
                text-align: center!important;
            }
        }
    </style>
@endsection

@section('row1')
    <div class="row" id="">
        <div class="col-md-12 back p-0">
            <div id="9946827867"><script type="text/JavaScript" src="https://www.aparat.com/embed/B6oQu?data[rnddiv]=9946827867&data[responsive]=yes&data[title]=%D8%AF%D9%88%D8%B1%D9%87%D9%85%DB%8C%201400&&recom=self"></script></div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 justify-content-md-center ">
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 text-center mt-5">
            <h1> هدیه ویژه فراکوچ </h1>
            <p> در باره کوچینگ
            </p>
            <p> اگر شما اینجایید به این معنی است که یکی از محصولات ویژه فراکوچ را تهیه کرده اید برای شما هدیه ویژه ای در نظر گرفته ایم .
            </p>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 justify-content-md-center ">
        </div>
    </div>

    <div class="container">
        <div class="row mt-5" id="">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center ">
                <img class="gift" src="{{asset('/images/gift.png')}}" alt=""/>
                <br>
                <input class="form-check-input gifts" type="checkbox" id="webinar" value="وبینار تمامیت" name="options" />
                <label  class="btn btn-outline-warning mt-4 d-block "  for="webinar">دریافت وبینار تمامیت</label>

            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center ">
                <img class="gift" src="{{asset('/images/gift.png')}}" alt=""/>
                <br>
                <input class="form-check-input gifts" type="checkbox" id="test" value="تست تمامیت" name="options" />
                <label  class="btn btn-outline-warning mt-4 d-block" for="test">  دریافت آزمون تمامیت</label>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center  ">
                <img class="gift" src="{{asset('/images/gift.png')}}" alt=""/>
                <br>
                <input class="form-check-input gifts" type="checkbox" value="رزرو جلسه" id="reserve" name="options" />
                <label  class="btn btn-outline-warning mt-4 d-block" for="reserve"> رزرو جلسه کوچینگ رایگان </label>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-5">
                <p> برای دریافت این هدایا اطلاعات زیر را تکمیل کنید .
                </p>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="form-group row pt-3" id="tel_landing">
                        <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('تلفن همراه:') }}</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" />
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary btn-info text-light" type="button" id="activeMobile" data-toggle="modal" data-target="#ModalMobile">فعال سازی</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="post" id="frm_tel_landing" class="mt-4" onsubmit="return insert()" action="/landing/store" >
                        {{csrf_field()}}
                        <input id="tel_verified" name="tel" type="hidden" class="form-control" />
                        <div class="form-group row" id="info_landing">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('نام:') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('tel') }}" required autocomplete="fname" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوادگی:') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="" id="options" name="options"/>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-success" value="ثبت اطلاعات" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalMobile" tabindex="-1" aria-labelledby="ModalMobile" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_body">
                    asd
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footerScript')
    <script>
        $("#frm_tel_landing").hide();

        $('#ModalMobile').on('show.bs.modal', function () {
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + $('#tel').val());
            // modal.find('.modal-body input').val(recipient);
            var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';

            $("#modal_body").html(loading);
            $.ajax({
                type: 'GET',
                url: "/verify/active/tel?tel=" + $('#tel').val(),
                success: function (data) {
                    $("#modal_body").html(data);
                },
                statusCode: {
                    422: function() {
                        $("#modal_body").html("<div class='alert alert-danger'><i class=\"bi bi-exclamation-triangle-fill\"></i> لطفا شماره همراه خود را درست وارد کنید </div>");
                    },
                    500:function()
                    {
                        $("#modal_body").html("<div class='alert alert-danger'><i class=\"bi bi-exclamation-triangle-fill\"></i> خطا در شماره همراه </div>");
                    }
                },
            });
        })


        $(".gifts").change(function()
        {
            var c=($('.gifts').length);
            var options=[];
            for (i=0;i<c;i++)
            {
                if($(".gifts")[i].checked==true)
                {
                    options.push($(".gifts")[i].value);
                    sw=true;
                }
            }

            $("#options").val(options);
        });

        function insert()
        {
            var fname=$('#fname').val();
            var lname=$('#lname').val();
            var options=[];
            var c=($('.gifts').length);
            for (i=0;i<c;i++)
            {
                if($(".gifts")[i].checked==true)
                {
                    options.push($(".gifts")[i].value);
                }
            }
            console.log(options);

            if(fname.length>0 && lname.length>0)
            {
                $.ajax({
                    type: 'GET',
                    url: "/landing/store" + $('#tel').val(),
                    success: function (data) {
                        $("#modal_body").html(data);
                    },
                    statusCode: {
                        422: function() {
                            $("#modal_body").html("<div class='alert alert-danger'><i class=\"bi bi-exclamation-triangle-fill\"></i> لطفا شماره همراه خود را درست وارد کنید </div>");
                        },
                        500:function()
                        {
                            $("#modal_body").html("<div class='alert alert-danger'><i class=\"bi bi-exclamation-triangle-fill\"></i> خطا در شماره همراه </div>");
                        }
                    },
                });
            }
            else
            {
                alert('لطفا نام و نام ونام خانوادگی خود را وارد کنید');
            }
        }
    </script>

@endsection
