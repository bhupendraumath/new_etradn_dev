
$("#registerBtn").on('click', (function (e) {
    e.preventDefault();
    var frm = $('#registrationFrm');
    var btn = $('#registerBtn');

    if (frm.valid()) {
        var showLoader = 'Processing...';
        showButtonLoader(btn, showLoader, 'disabled');
        $.ajax({
            url: process.env.MIX_APP_URL + "/registrationAction",
            type: "POST",
            data: frm.serialize(),
            success: function (data) {
                showButtonLoader(btn, showLoader, 'enable');
                toastr.success(data.message, 'Registration', { timeOut: 2000 });
                setTimeout(() => {
                    window.location.href = process.env.MIX_APP_URL + "/sign-in";
                }, 3000);

            },
            error: function (data) {
                var obj = jQuery.parseJSON(data.responseText);
                toastr.error(obj.message, 'Login', { timeOut: 2000 });
                showButtonLoader(btn, 'Registration', 'enable');
            },
        });
    }
}));