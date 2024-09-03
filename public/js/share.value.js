
    $("#share_value, #field_value, #admission_fee, #form_fee").keyup(function () {
        if ($("#share_value").val() == "") {
            var share = 0
        } else {
            var share = parseInt($("#share_value").val());
        }
        if ($("#field_value").val() == "") {
            var field = 0
        } else {
            var field = parseInt($("#field_value").val());
        }
        if ($("#admission_fee").val() == "") {
            var admission = 0
        } else {
            var admission = parseInt($("#admission_fee").val());
        }
        if ($("#form_fee").val() == "") {
            var form = 0
        } else {
            var form = parseInt($("#form_fee").val());
        }
        $("#total").val(share + field + admission + form);
    })



    
    $("#share_value").keyup(function () {
        $("#share").val(parseInt($(this).val() / $(this).attr('step')));
    });
    $("#share").keyup(function () {
        $("#share_value").val(parseInt($(this).val() * $(this).attr('step')));
    });
    $("#field_value").change(function () {
        if ($(this).val() != '') {
            $("#field_name").attr('required', true);
        } else {
            $("#field_name").attr('required', false);
        }
    })
