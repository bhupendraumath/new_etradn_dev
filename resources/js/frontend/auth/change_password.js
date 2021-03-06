$(window).ready(function () {
    $("#submit-btn").on('click', (function (e) {
        var frm = $('#change-password-form');
        var btn = $('#submit-btn');
        if (frm.valid()) {
            btn.prop('disabled', true);
            $.ajax({
                url: process.env.MIX_APP_URL + "/save-change-password",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                success: function (response) {
                    if (response.success) {
                       
                        toastr.success(response.message, {timeOut: 2000});
                        setTimeout(function () {
                            window.location.href = process.env.MIX_APP_URL + "/account-setting";
                        }, 2000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Update');
                        toastr.clear();
                        toastr.error(response.message, {timeOut: 2000});
                    }
                },
                error: function (data) {
                    var obj = jQuery.parseJSON(data.responseText);
                    for (var x in obj) {
                        btn.prop('disabled', false);
                        btn.html('Update');
                        var errors = obj[x].length
                        $('#' + x + '-error').html(obj[x]);
                        $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                    }
                },
            });
        }
    }));
});
