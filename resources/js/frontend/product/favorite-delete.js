window.favorite_delete_product = function favorite_delete_product(product_id) {


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

                    $.ajax({
                        url: process.env.MIX_APP_URL + "/delete-favorite/" + product_id,
                        type: "GET",
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                toastr.clear();
                                toastr.success(response.message, { timeOut: 2000 });
                                setTimeout(function() {
                                    window.location.href = process.env.MIX_APP_URL + "/favorite_product";
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


window.allremove = function allremove() {

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

                    $.ajax({
                        url: process.env.MIX_APP_URL + "/all-delete-favorite",
                        type: "GET",
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                toastr.clear();
                                toastr.success(response.message, { timeOut: 2000 });
                                setTimeout(function() {
                                    window.location.href = process.env.MIX_APP_URL + "/favorite_product";
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