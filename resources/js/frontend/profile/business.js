$(window).ready(function () {
    $("#submitbtn").on('click', (function (e) {
        var frm = $('#businessFrm');
        var btn = $('#submitbtn');
        if (frm.valid()) {
            btn.prop('disabled', true);
            $.ajax({
                url: process.env.MIX_APP_URL + "/add-business",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                success: function (response) {
                    if (response.success) {
                        toastr.clear();
                        btn.html('Update');
                        toastr.success(response.message, 'Added Business Information', {timeOut: 2000});
                        setTimeout(function () {
                            window.location.href = process.env.MIX_APP_URL + "/business-address";
                        }, 2000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Update');
                        toastr.clear();
                        toastr.error(response.message, 'Update profile', {timeOut: 2000});
                    }
                },
                error: function (data) {
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


    $("#updateSubmitbtn").on('click', (function (e) {
        var frm = $('#businessUpdate');
        var btn = $('#updateSubmitbtn');
        if (frm.valid()) {
            btn.prop('disabled', true);
            console.log("businessUpdate ----")
            $.ajax({
                url: process.env.MIX_APP_URL + "/add-business",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                success: function (response) {
                    if (response.success) {
                        toastr.clear();
                        btn.html('Update');
                        toastr.success(response.message, 'Updated Business Information', {timeOut: 2000});
                        setTimeout(function () {
                            window.location.href = process.env.MIX_APP_URL + "/business-address";
                        }, 2000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Update');
                        toastr.clear();
                        toastr.error(response.message, 'Update profile', {timeOut: 2000});
                    }
                },
                error: function (data) {
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
