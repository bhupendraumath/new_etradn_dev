$(window).ready(function() {
    $("#rfq-btn").on('click', (function(e) {
        var frm = $('#rfq-form');
        var btn = $('#rfq-btn');
        if (frm.valid()) {
            btn.prop('disabled', true);
            console.log("djfgdjgf fdghd success ", frm.serialize());
            // return false;
            $.ajax({
                url: process.env.MIX_APP_URL + "/rfq-list-post",
                type: "POST",
                data: frm.serialize(),
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    console.log(response);

                    if (response.success) {
                        // toastr.clear();
                        console.log(response);
                        return false;

                        toastr.success("RFQ Added successfully", { timeOut: 2000 });
                        setTimeout(function() {
                            window.location.href = process.env.MIX_APP_URL + "/dashboard";
                        }, 2000);
                    } else {
                        btn.prop('disabled', false);

                        toastr.clear();
                        toastr.error("Failed please try again leter", { timeOut: 2000 });
                    }
                },
                error: function(data) {
                    var obj = jQuery.parseJSON(data.responseText);
                    for (var x in obj) {
                        btn.prop('disabled', false);
                        // btn.html('Update');

                        $('#' + x + '-error').html(obj[x]);
                        $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                    }
                },
            });
        }

    }));
});