$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function()
{
    $("#state").change(function()
    {
        var state=$(this).val();
        $.ajax({
            type:'GET',
            url:"/panel/state/"+state,
            success:function(data)
            {
                $("#city").html(data);
            }
        });
    });

    $(".btn-modal-introduced").click(function()
    {
        var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
        $("#modal_introduced_profile .modal-body").html(loading);
        var user=$(this).attr('href');
        $.ajax({
            type:'GET',
            url:"/panel/userAjax/"+user,
            success:function(data)
            {
                $("#modal_introduced_profile .modal-body").html(data);
            }
        });
    });

    $('.showDetailsMessage').click(function(e)
    {
        e.preventDefault();
        var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
        $("#showDetailsMessage").html(loading);
        var user=$(this).attr('href');
        if(user!="new")
        {
            $.ajax({
                type:'GET',
                url:"/panel/messages/show/"+user,
                success:function(data)
                {
                    jQuery("#showDetailsMessage").html(data);
                }
            });
        }
        else
        {
            $.ajax({
                type:'GET',
                url:"/panel/messages/new",
                success:function(data)
                {
                    $("#showDetailsMessage").html(data);
                }
            });
        }
    });

    $('.showDetailsMessageUser').click(function(e)
    {
        e.preventDefault();
        var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
        $("#showDetailsMessage").html(loading);
        var user=$(this).attr('href');
        if(user!="new")
        {
            $.ajax({
                type:'GET',
                url:"/admin/messages/show/"+user,
                success:function(data)
                {
                    jQuery("#showDetailsMessage").html(data);
                }
            });
        }
        else
        {
            $.ajax({
                type:'GET',
                url:"/admin/messages/new",
                success:function(data)
                {
                    $("#showDetailsMessage").html(data);
                }
            });
        }
    });

    $('#addFormIntroduce').click(function(e)
    {
        var data='<div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 "><small>نام:*</small><div class="input-group mb-3"><input type="text" class="form-control" placeholder="نام وارد کنید" name="fname[]" lang="fa"/><div class="input-group-prepend"></div></div></div><div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 "><small>نام خانوادگی:*</small><div class="input-group mb-3"><input type="text" class="form-control" placeholder="نام خانوادگی وارد کنید" name="lname[]" lang="fa" /><div class="input-group-prepend"></div></div></div><div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 "><small>تلفن همراه:*</small><div class="input-group mb-3"><input type="text" class="form-control" placeholder="شماره همراه وارد کنید" name="tel[]"/><div class="input-group-prepend"></div></div></div><div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 "><small>پیگیری توسط:*</small><div class="input-group mb-3"><select class="custom-select" name="followby_id[]"><option disabled="disabled" selected="selected">انتخاب کنید</option><option value="1">آموزش</option><option value="2">خودم</option></select></div></div>';
        $("#formAddIntroduce").append(data);
        console.log("ADD");
    });

});

function lengthComment(nod)
{
    var str=($("#"+nod).val());
    $("#lengthComment").text( str.length);
}

$("#introduced_registerAdmin").focusout(function()
{
    var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
    $("#feedback_introduced").html(loading);
    var data=$("#introduced_registerAdmin_org").val();
    if(data.length>0)
    {
        $.ajax({
            type:'GET',
            url:"/check/user/"+data,
            success:function(data)
            {
                $("#feedback_introduced").html(data);
            }
        });
    }
    else
    {
        data="<input type='hidden' value='' name='introduced'/>";
        $("#feedback_introduced").html(data);
    }

});

$("#category_tags_id").change(function()
{
    var data= $(this).val();
    if(data==0)
    {
        $("#sub_category_tags").html("<option disabled  selected>انتخاب کنید</option><option  value='0'>بدون دسته</option>");
    }
    else {
        if (data.length > 0) {
            $.ajax({
                type: 'GET',
                url: "/admin/settings/subcategorytags/" + data,
                success: function (data) {
                    $("#sub_category_tags").html(data);
                }
            });
        } else {
            data = "<input type='hidden' value='' name='introduced'/>";
            $("#feedback_introduced").html(data);
        }
    }
});

$("#sub_category_tags").change(function()
{
    var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
    $("#settings_subtags").html(loading);
    var data=$(this).val();
    if(data.length>0)
    {
        $.ajax({
            type:'GET',
            url:"/admin/settings/settingtags/"+data,
            success:function(data)
            {
                $("#settings_subtags").html(data);
            }
        });
    }
    else
    {
        data="";
        $("#settings_subtags").html(data);
    }
});

$(".del").click(function(e) {
    e.preventDefault();
    if (window.confirm('آیا از حذف اطلاعات اطمینان دارید؟'))
    {
        window.location=$(this).attr('href');
    }
});


$("#goBack").click(function(e)
{
    e.preventDefault();
    window.history.back();
});

$("#btn_fileds").click(function()
{
  var b=$("#filters").html();
  //var a="<div class='form-group'><label for='problem'>فیلد</label><input type='text' class='form-control' id='problem'  name='ategory' /><small class='text-muted'>به عنوان مثال: 09121234567,09151234567</small></div><div id='add_fileds'></div>";
  $("#add_fileds").append(b);
});

$("#btn_showCount").click(function()
{
  var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
  $("#showCount").html(loading);
  var data=$("#sendSMS").serialize();
  if(data.length>0)
  {
    $.ajax({
      type:'POST',
      data:data,
      url:"/admin/sms/createajax",
      success:function(data)
      {
        $("#showCount").html(data);
      }
    });
  }
  else
  {
    data="";
    $("#showCount").html(data);
  }
});

function add_parametersSMS(parameter)
{
  var a=$("#commentSMS").val();

  $("#commentSMS").val(a+parameter);
  console.log(a+parameter);
}

$("#introduced").focusout(function()
{
  var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
  $("#feedback_introduced").html(loading);
  var data=$(this).val();
  if(data.length>0)
  {
    $.ajax({
      type:'GET',
      url:"/check/user/"+data,
      success:function(data)
      {
        $("#feedback_introduced").html(data);
      }
    });
  }
  else
  {
    data="<input type='hidden' value='' name='introduced'/>";
    $("#feedback_introduced").html(data);
  }

});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
