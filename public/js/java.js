$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');


    //َAjax Confirm Mobile
    $("#activeMobile").click(function()
    {
        var loading='<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
        $("#modal_body").html(loading);
        var data=$("#tel").val();
        if(data.length>0)
        {
            $.ajax({
                type:'GET',
                url:"/active/mobile/"+data,
                success:function(data)
                {
                    $("#modal_body").html(data);
                }
            });
        }
        else
        {
            var loading='<p>لطفا تلفن همراه را جهت تایید وارد کنید</p>';
            $("#modal_body").html(loading);
        }
    });

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
});



