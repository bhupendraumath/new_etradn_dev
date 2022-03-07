/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/js/frontend/product/product.js ***!
  \**************************************************/
$(window).ready(function () {
  $("#submitbtn").on('click', function (e) {
    var frm = $('#addProductFrm');
    var btn = $('#submitbtn');

    if (frm.valid()) {
      console.log("frm.serialize()---   ", frm.serialize());
      btn.prop('disabled', true);
      $.ajax({
        url: "http://localhost/indepking/new_etradn_dev" + "/add-product",
        type: "POST",
        data: frm.serialize(),
        dataType: 'JSON',
        success: function success(response) {
          if (response.success) {
            toastr.clear();
            btn.html('Save');
            toastr.success(response.message, 'Add Product', {
              timeOut: 2000
            });
            setTimeout(function () {
              window.location.href = "http://localhost/indepking/new_etradn_dev" + "/my-upload-product";
            }, 2000);
          } else {
            btn.prop('disabled', false);
            btn.html('Save');
            toastr.clear();
            toastr.error(response.message, 'Add Product', {
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