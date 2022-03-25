
$("#loginBtn").on('click', (function (e) {
    e.preventDefault();
    var frm = $('#loginFrm');
    var btn = $('#loginBtn');
   
    if (frm.valid()) {
        var showLoader = 'Processing...';
        showButtonLoader(btn, showLoader, 'disabled');
        $.ajax({
            url: process.env.MIX_APP_URL+"/loginAction",
            type: "POST",
            data: frm.serialize(),
            success: function (data)
            {
                showButtonLoader(btn, showLoader, 'enable');
                toastr.success(data.message, 'Login', {timeOut: 2000});
                setTimeout(() => {
                    
                   window.location.href = data.data;
                }, 3000);
                
            },
            error: function (data) {
                var obj = jQuery.parseJSON(data.responseText);
                toastr.error(obj.message, 'Login', {timeOut: 2000});
                showButtonLoader(btn, 'Sign in', 'enable');
            },
        });
    }
}));