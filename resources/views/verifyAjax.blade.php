<div class="class-12 text-center">
    <p> لطفا کد ارسال شده به تلفن همراه {{$tel}} را وارد کنید </p>
    <div class="col-12" id="resultVerify"></div>
    <div class="form-group " id="bodyActiveSms">
    <input type="text" class="form-control" id="code"  max="6" />
    <input type="hidden" name="tel" value="{{$tel}}" id="tel"/>
    </div>
    <button type="button" class="btn btn-success btn-block" id="submitVerifySMS" >ثبت</button>
</div>

<script src={{asset("js/jquery-3.5.1.slim.min.js")}} ></script>
<script type="text/javascript" src={{asset("slick-1.8.1/slick-1.8.1/slick/jquery-1.11.0.min.js")}}></script>
<script>
    $("#submitVerifySMS").click(function()
    {
        var data=$("#code").val();
        var tel=$("#tel").val();
        if(data.length==6)
        {
            $.ajax({
                type:'get',
                url:"/verify/active/tel/check/"+data,
                success:function(data)
                {
                    $("#resultVerify").html(data);
                }
            });
        }
        else
        {
            $("#resultVerify").html('<div  class="alert alert-danger">لطفا کد را درست وارد کنید</div>')
        }
    });
</script>
