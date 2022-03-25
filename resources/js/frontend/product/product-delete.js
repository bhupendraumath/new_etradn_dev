$(window).ready(function() {
    $("#submitbtn").on('click', (function(e) {
        var frm = $('#addProductFrm');
        var btn = $('#submitbtn');
        if (frm.valid()) {

            console.log("frm.serialize()---   ", frm.serialize())
            btn.prop('disabled', true);
            $.ajax({
                url: process.env.MIX_APP_URL + "/add-product",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        toastr.clear();
                        btn.html('Save');
                        toastr.success(response.message, 'Add Product', { timeOut: 2000 });
                        setTimeout(function() {
                            window.location.href = process.env.MIX_APP_URL + "/my-upload-product";
                        }, 2000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Save');
                        toastr.clear();
                        toastr.error(response.message, 'Add Product', { timeOut: 2000 });
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


window.areyousure = function areyousure(product_id) {

    // console.log("here");
    swal({
            title: "Delete",
            text: "Are you sure, want to delete it?",
            type: "#danger",
            buttons: {
                cancel: true,
                confirm: "Delete",
            }
        })
        .then(
            function(isConfirm) {
                if (isConfirm) {
                    console.log("product_id  ", product_id);
                    $.ajax({
                        url: process.env.MIX_APP_URL + "/uploadedDelete/" + product_id,
                        type: "GET",
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                toastr.clear();
                                toastr.success(response.message, { timeOut: 2000 });
                                setTimeout(function() {
                                    window.location.href = process.env.MIX_APP_URL + "/my-upload-product";
                                }, 2000);
                            } else {
                                btn.prop('disabled', false);
                                toastr.clear();
                                toastr.error(response.message, { timeOut: 2000 });
                            }
                        },
                        error: function(data) {
                            var obj = jQuery.parseJSON(data.responseText);
                            for (var x in obj) {
                                // btn.prop('disabled', false);
                                // btn.html('Update');

                                $('#' + x + '-error').html(obj[x]);
                                $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                            }
                        },
                    });

                } else {
                    return false;
                }
            },
        );
}