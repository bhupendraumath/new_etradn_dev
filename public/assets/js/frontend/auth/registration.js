/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/js/frontend/auth/registration.js ***!
  \****************************************************/
$("#registerBtn").on('click', function (e) {
  e.preventDefault();
  var frm = $('#registrationFrm');
  var btn = $('#registerBtn');

  if (frm.valid()) {
    var showLoader = 'Processing...';
    showButtonLoader(btn, showLoader, 'disabled');
    $.ajax({
      url: "http://localhost/indepking/new_etradn_dev" + "/registrationAction",
      type: "POST",
      data: frm.serialize(),
      success: function success(data) {
        showButtonLoader(btn, showLoader, 'enable');
        toastr.success(data.message, 'Registration', {
          timeOut: 2000
        });
        setTimeout(function () {
          window.location.href = "http://localhost/indepking/new_etradn_dev" + "/sign-in";
        }, 3000);
      },
      error: function error(data) {
        var obj = jQuery.parseJSON(data.responseText);
        toastr.error(obj.message, 'Login', {
          timeOut: 2000
        });
        showButtonLoader(btn, 'Registration', 'enable');
      }
    });
  }
});
/******/ })()
;