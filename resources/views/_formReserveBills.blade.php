<div class="input-group mb-3">
    <div class="input-group-prepend">
        <button class="btn btn-primary" type="button" id="off">اعمال</button>
    </div>
    <input type="text" class="form-control" placeholder=""  aria-describedby="button-addon1" name="coupon" />
</div>
<small class="text-muted">در صورت داشتن کد تخفیف آن را وارد کنید</small>

<div class="card">

    @if(session('msg') && (session('errorStatus')))
        <div class="col-12">
            <div class="alert alert-{{session('errorStatus')}}">
                <p class="p-0 m-0">{{session('msg')}}</p>
            </div>
        </div>
    @endif

    <div class="card-body" id="div_show_fi">
        <span class="float-right">قیمت </span>
        <span class="float-left">{{number_format($reserve->fi) }} تومان</span>
        <br/>
        <span class="float-right">کوپن تخفیف </span>
        <span class="float-left">{{$reserve->coupon}} </span>
        <br/>
        <span class="float-right">کد تخفیف </span>
        <span class="float-left">{{$reserve->off}} %</span>
        <br/>
        <span class="float-right">قیمت نهایی</span>
        <span class="float-left">{{number_format($reserve->final_off) }} تومان</span>

    </div>
</div>
<button type="button" class="btn btn-success btn-lg btn-block" id="btn_reserve">رزرو</button>





<script>
    $('#off').click(function()
    {
        var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
        $("#div_show_fi").html(loading);
        var data=$('#reserveForm').serialize();
        console.log(data);
        $.ajax({
            type: 'POST',
            url: "/coupon/check" ,
            data:data,
            statusCode: {
                422: function() {
                    $("#div_show_fi").html('<div class="alert alert-danger" role="alert">لطفا تمامی فیلدها رو پر کنید</div>');
                },
                500:function()
                {
                    $("#div_show_fi").html("<div class='alert alert-danger'>لطفا کوپن تخفیف را وارد کنید</div>");
                }
            },
            success: function (data) {
                $("#div_show_fi").html(data);
            },
            error:function(data)
            {
                $("#div_show_fi").html(data);
            }
        });


    });


    $('#btn_reserve').click(function()
    {
        var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
        $("#div_show_fi").html(loading);
        var data=$('#reserveForm').serialize();
        console.log(data);
        $.ajax({
            type: 'POST',
            url: "/reserve/insert" ,
            data:data,
            statusCode: {
                422: function() {
                    $("#div_show_fi").html('<div class="alert alert-danger" role="alert">لطفا تمامی فیلدها رو پر کنید</div>');
                },
                500:function()
                {
                    $("#div_show_fi").html("<div class='alert alert-danger'>لطفا کوپن تخفیف را وارد کنید</div>");
                }
            },
            success: function (data) {
                $("#div_show_fi").html(data);
            },
            error:function(data)
            {
                $("#div_show_fi").html(data);
            }
        });


    });
</script>
