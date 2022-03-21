$(window).ready(function() {
    $("#profile-btn").on('click', (function(e) {
        var frm = $('#profile-update-form');
        var btn = $('#profile-btn');
        if (frm.valid()) {
            btn.prop('disabled', true);
            $.ajax({
                url: process.env.MIX_APP_URL + "/update-profile",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        toastr.clear();
                        btn.html('Update');
                        toastr.success(response.message, 'Update profile', { timeOut: 2000 });
                        setTimeout(function() {
                            if (response.data[0].user_type == 's') {
                                window.location.href = process.env.MIX_APP_URL + "/dashboard";
                            } else {
                                window.location.href = process.env.MIX_APP_URL + "/buyer-dashboard";
                            }
                        }, 2000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Update');
                        toastr.clear();
                        toastr.error(response.message, 'Update profile', { timeOut: 2000 });
                    }
                },
                error: function(data) {
                    var obj = jQuery.parseJSON(data.responseText);
                    for (var x in obj) {
                        btn.prop('disabled', false);
                        btn.html('Update');

                        $('#' + x + '-error').html(obj[x]);
                        $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                    }
                },
            });
        }

    }));
});