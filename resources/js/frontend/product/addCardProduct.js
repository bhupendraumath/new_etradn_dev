$(window).ready(function() {
    $("#addCartProduct").on('click', (function(e) {

        var frm = $('#addCartProductFrm');
        var btn = $('#addCartProduct');



        if (frm.valid()) {

            btn.prop('disabled', true);

            $.ajax({
                url: process.env.MIX_APP_URL + "/cart-add",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        toastr.clear();
                        btn.html('Save');
                        toastr.success('Added in cart', { timeOut: 2000 });
                        setTimeout(function() {
                            window.location.href = process.env.MIX_APP_URL + "/shopping-cart";
                        }, 2000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Save');
                        toastr.clear();
                        toastr.error('Added in cart', { timeOut: 2000 });
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