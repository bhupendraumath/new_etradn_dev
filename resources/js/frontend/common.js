window.showButtonLoader = function (button, text = '', action) {
    if (action === 'disabled') {
        button.append('<span class="buttonLoader spinner-border spinner-border-sm ml-2"></span>');
        button.prop('disabled', true);
    } else {
        $(button).find('.spinner-border').remove();
        button.prop('disabled', false);
    }
}