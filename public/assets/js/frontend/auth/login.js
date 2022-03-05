/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/frontend/auth/login.js ***!
  \*********************************************/
$("#loginBtn").on('click', function (e) {
  e.preventDefault();
  var frm = $('#loginFrm');
  var btn = $('#loginBtn');

  if (frm.valid()) {
    var showLoader = 'Processing...';
    showButtonLoader(btn, showLoader, 'disabled');
    $.ajax({
      url: "http://localhost/indepking/new_etradn_dev" + "/loginAction",
      type: "POST",
      data: frm.serialize(),
      success: function success(data) {
        showButtonLoader(btn, showLoader, 'enable');
        toastr.success(data.message, 'Login', {
          timeOut: 2000
        });
        setTimeout(function () {
          console.log(data.data);
          window.location.href = data.data;
        }, 3000);
      },
      error: function error(data) {
        var obj = jQuery.parseJSON(data.responseText);
        toastr.error(obj.message, 'Login', {
          timeOut: 2000
        });
        showButtonLoader(btn, 'Sign in', 'enable');
      }
    });
  }
});
/******/ })()
;