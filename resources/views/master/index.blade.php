<!doctype html>
<html lang="fa">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link href={{asset("css/bootstrap.min.css")}} rel="stylesheet" />
    <link href={{asset("css/bootstrap_cerulean.min.css")}} rel="stylesheet" />
    <link href={{asset("css/bootstrap-rtl.min.css")}} rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap-icons.css')}}">
    <link href={{asset("css/style.css")}} rel="stylesheet" />
    <link href={{asset("css/landing.css")}} rel="stylesheet" />
    <link href={{asset("css/stepwizard.css")}} rel="stylesheet" />
    <link href={{asset("slick-1.8.1/slick-1.8.1/slick/slick.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("slick-1.8.1/slick-1.8.1/slick/slick-theme.css")}} rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('images/logo.png')}}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('/panel_assets/intl_tel/css/intlTelInput.css') }}" />
    <script src="{{asset('/js/sweetalert.min.js')}}"></script>

    @yield('headerscript')
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="05ea1956-7561-4af6-a7ab-1c599909f103";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    <title>فراکوچ | آموزش کوچینگ</title>
</head>
<body >
@include('master.navbarTop')
<main class="container-fluid" dir="rtl">
@include('sweet::alert')
<!--************* SLIDESHOW ***************-->
    @yield('header')

    @yield('row1')

    @yield('row2')


    @yield('row3')

    @yield('row4')

    @yield('row5')

    @yield('row6')

    @yield('row7')

    @yield('row8')

    @yield('row9')

    @yield('footer')
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
<script src={{asset("/js/popper.min.js")}} ></script>
<script src={{asset("/js/bootstrap.min.js")}} ></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src={{asset("/dashboard/assets/js/java.js")}}></script>
<script>
    $(document).ready(function(){
        //send SMS by Tel
        $("#btn_loginbytel").click(function(){
            $( '#resultLoginTel' ).html( '<div class="spinner-border text-primary" role="status">\n' +
                '  <span class="sr-only">Loading...</span>\n' +
                '</div>' );
            var data=$('#frm_loginbytel').serialize();
            $.ajax({
                type:'POST',
                url:'/loginOrStoreUser',
                data:data,
                success:function (data) {
                    $('#resultLoginTel').html(data);
                    $(".code-reg").show(500);
                },
                error : function(data)
                {

                    $('#resultLoginTel').text(data.responseJSON.errors);
                    errorsHtml='<div class="alert alert-danger text-left"><ul>';
                    $.each( data.responseJSON.errors, function( key, value ) {
                        errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></div>';

                    $( '#resultLoginTel' ).html( errorsHtml );
                }
            });

        });

        //send Code by Email
        $("#newCodeEmail").click(function(){
            $( '#resultLoginTel' ).html( '<div class="spinner-border text-primary" role="status">\n' +
                '  <span class="sr-only">Loading...</span>\n' +
                '</div>' );
            var data=$('#frm_loginbyemail').serialize();
            $.ajax({
                type:'POST',
                url:'/loginOrStoreUser',
                data:data,
                success:function (data) {
                    $('#resultLoginTel').html(data);
                    $(".code-reg").show(500);
                },
                error : function(data)
                {

                    $('#resultLoginTel').text(data.responseJSON.errors);
                    errorsHtml='<div class="alert alert-danger text-left"><ul>';
                    $.each( data.responseJSON.errors, function( key, value ) {
                        errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></div>';

                    $( '#resultLoginTel' ).html( errorsHtml );
                }
            });

        });






        $(document).ready(function() {
            $(window).keydown(function(event){
                if( (event.keyCode == 13)) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    });
</script>
<script src="{{asset('/panel_assets/intl_tel/js/intlTelInput.js')}}"></script>
<script src="{{asset('/panel_assets/intl_tel/js/utils.js')}}"></script>
<script>

    var input = document.querySelector("#tel_login");
    var intl=intlTelInput(input,{
        formatOnDisplay:false,
        separateDialCode:true,
        preferredCountries:["ir", "gb"]
    });

    $('#tel_login').change(function()
    {
        document.querySelector("#tel_org_login").value=intl.getNumber();
    });
</script>
<script>
    //لاگین ایجکس
    $("#btn_submit").click(function()
    {
        $('#result_login').html('<div class="spinner-border text-primary mb-3" role="status"> <span class="sr-only">لطفا صبر کنید...</span> </div>');
        var data=$('#loginAjax').serialize();
        $.ajax(
            {

                type:"POST",
                url:'/login',
                data:data,

                success: function (data) {
                    $('#result_login').html("<div class='alert alert-success'>ورود با موفقیت انجام شد</div>");
                    location.reload();
                },
                error : function(data)
                {

                    $('#result_login').text(data.responseJSON.errors);
                    errorsHtml='<div class="alert alert-danger text-left"><ul>';
                    $.each( data.responseJSON.errors, function( key, value ) {
                        errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></div>';

                    $( '#result_login' ).html( errorsHtml );
                }
            }
        )
    });

    $("#btn_signup").click(function()
    {
        var data=$('#frm_signup').serialize();
        $('#result_signup').html('<div class="spinner-border text-primary mb-3" role="status"> <span class="sr-only">لطفا صبر کنید...</span> </div>');
        $.ajax({
            type:'POST',
            url:'/signupAjax',
            data:data,
            success:function (data)
            {
                $("#result_signup").html(data);
            },
            error : function(data)
            {

                $('#result_signup').text(data.responseJSON.errors);
                errorsHtml='<div class="alert alert-danger text-left"><ul>';
                $.each( data.responseJSON.errors, function( key, value ) {
                    errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></div>';

                $( '#result_signup' ).html( errorsHtml );
            }
        })
    });
</script>
<script src="{{asset("/js/jquery.inputLettering.js")}}"></script>
<script>
    $('.phoneInput').letteringInput({
        inputClass: 'letter',
        onLetterKeyup: function() {
            var data='';
            $('.letter').each(function(){
                data=data+($(this).val());
            });
            if(data.length==6)
            {
                data={
                    code:data,
                    "_token": "{{ csrf_token() }}",
                };
                $.ajax({

                    data:data,
                    url:'/checkLoginOrStoreUser',
                    type:'POST',
                    success:function(data)
                    {
                        $('#resultLoginTel').html(data);
                    },
                    error : function(data)
                    {
                        $('#resultLoginTel').text(data.responseJSON.errors);
                        errorsHtml='<div class="alert alert-danger text-left"><ul>';
                        $.each( data.responseJSON.errors, function( key, value ) {
                            errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></div>';

                        $( '#resultLoginTel' ).html( errorsHtml );
                    }


                })
            }
        },
    }).val;
</script>


@yield('footerScript')
</body>
</html>
