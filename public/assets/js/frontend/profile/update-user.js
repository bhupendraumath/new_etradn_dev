/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/js/frontend/profile/update-user.js ***!
  \******************************************************/
$(window).ready(function () {
  $("#profile-btn").on('click', function (e) {
    var frm = $('#profile-update-form');
    var btn = $('#profile-btn');

    if (frm.valid()) {
      btn.prop('disabled', true);
      $.ajax({
        url: "http://localhost/indepking/new_etradn_dev" + "/update-profile",
        type: "POST",
        data: frm.serialize(),
        dataType: 'JSON',
        success: function success(response) {
          if (response.success) {
            toastr.clear();
            btn.html('Update');
            toastr.success(response.message, 'Update profile', {
              timeOut: 2000
            });
            setTimeout(function () {
              window.location.href = "http://localhost/indepking/new_etradn_dev" + "/dashboard";
            }, 2000);
          } else {
            btn.prop('disabled', false);
            btn.html('Update');
            toastr.clear();
            toastr.error(response.message, 'Update profile', {
              timeOut: 2000
            });
          }
        },
        error: function error(data) {
          var obj = jQuery.parseJSON(data.responseText);

          for (var x in obj) {
            btn.prop('disabled', false);
            btn.html('Update');
            $('#' + x + '-error').html(obj[x]);
            $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
          }
        }
      });
    }
  });
});
/******/ })()
;