$(window).ready(function() {
    $("#createRefundRequest").on('click', (function(e) {

        console.log("Hello refund request")
        var frm = $('#refundProductRequest');
        var btn = $('#createRefundRequest');
        if (frm.valid()) {

            console.log("frm.serialize()---   ", frm.serialize());
            // return false;
            btn.prop('disabled', true);
            $.ajax({
                url: process.env.MIX_APP_URL + "/create-refund-request",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        toastr.clear();
                        btn.html('Save');
                        toastr.success(response.message, { timeOut: 2000 });
                        setTimeout(function() {
                            window.location.href = process.env.MIX_APP_URL + "/my-upload-product";
                        }, 2000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Save');
                        toastr.clear();
                        toastr.error(response.message, { timeOut: 2000 });
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