$(window).ready(function() {
    $("#newUserButton").on('click', (function(e) {

        var frm = $('#new_user_form');
        var btn = $('#newUserButton');


        console.log("add-placed-bid", frm.serialize())
            // return false;
        if (frm.valid()) {

            btn.prop('disabled', true);

            $.ajax({
                url: process.env.MIX_APP_URL + "/add-bid-placed",
                type: "POST",
                data: frm.serialize(),
                processData: true,
                contentType: false,
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        toastr.clear();
                        toastr.success('Bid Placed Successfully', { timeOut: 2000 });
                        window.location.reload();
                    } else {
                        btn.prop('disabled', false);
                        toastr.clear();
                        toastr.error('Bid Placed Successfully', { timeOut: 2000 });
                        window.location.reload();

                    }
                },
                error: function(data) {
                    var obj = jQuery.parseJSON(data.responseText);
                    for (var x in obj) {
                        btn.prop('disabled', false);

                        $('#' + x + '-error').html(obj[x]);
                        $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                    }
                },
            });
        }

    }));
});