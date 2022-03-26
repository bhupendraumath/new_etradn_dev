$(window).ready(function() {
    $("#submitbtn").on('click', (function(e) {
        var frm = $('#businessFrm');
        var btn = $('#submitbtn');
        if (frm.valid()) {
            btn.prop('disabled', true);
            $.ajax({
                url: process.env.MIX_APP_URL + "/add-business",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        toastr.clear();
                        btn.html('Update');
                        toastr.success('Added Address', { timeOut: 2000 });
                        btn.prop('disabled', false);

                        setTimeout(function() {
                            window.location.reload();
                        }, 2000)
                    } else {
                        // btn.prop('disabled', false);
                        btn.html('Update');
                        toastr.clear();
                        toastr.error('Update Address', { timeOut: 2000 });
                        btn.prop('disabled', false);

                    }
                },
                error: function(data) {
                    var obj = jQuery.parseJSON(data.responseText);
                    for (var x in obj) {
                        // btn.prop('disabled', false);
                        btn.html('Update');

                        $('#' + x + '-error').html(obj[x]);
                        $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                    }
                },
            });
        }

    }));


    $("#updateSubmitbtn").on('click', (function(e) {
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
                success: function(response) {
                    if (response.success) {
                        toastr.clear();
                        btn.html('Update');
                        toastr.success('Updated Address Details', { timeOut: 2000 });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000)
                        btn.prop('disabled', false);

                    } else {
                        // btn.prop('disabled', false);
                        btn.html('Update');
                        toastr.clear();
                        toastr.error('Update profile', { timeOut: 2000 });
                    }
                },
                error: function(data) {
                    var obj = jQuery.parseJSON(data.responseText);
                    for (var x in obj) {
                        // btn.prop('disabled', false);
                        btn.html('Update');
                        btn.prop('disabled', false);

                        $('#' + x + '-error').html(obj[x]);
                        $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                    }
                },
            });
        }

    }));



    window.business_address_delete = function business_address_delete(id, path_page) {
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
                        console.log("product_id  ", id);
                        $.ajax({
                            url: process.env.MIX_APP_URL + "/business-address-delete/" + id,
                            type: "GET",
                            dataType: 'JSON',
                            success: function(response) {
                                if (response.success) {
                                    toastr.clear();
                                    toastr.success(response.message, { timeOut: 2000 });
                                    setTimeout(function() {
                                        if (path_page == "business-address")
                                            window.location.href = process.env.MIX_APP_URL + "/business-address";
                                        else {
                                            window.location.href = process.env.MIX_APP_URL + "/delivery-areas";

                                        }
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
});