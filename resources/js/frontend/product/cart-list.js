$(window).load(function() {
    getProductlList();


    function getProductlList() {

        $.ajax({
            url: process.env.MIX_APP_URL + "/cart-listing",
            type: "POST",
            data: {

            },
            processData: true,
            contentType: false,
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            dataType: 'JSON',
            cache: false,
            success: function success(response) {
                // console.log("inside-1")
                $('#cart-listing').html('');
                $('#cart-listing').html(response.data.completeSessionView)

                if (response.data.total_amount != undefined) {
                    $('#total_header_cart').empty('');
                    $('#total_header_cart').html('$' + response.data.total_amount)
                }



            },
            error: function error(data) {
                $('#cart-listing').html('');
                if (data.status === 422) {
                    var responseText = $.parseJSON(data.responseText);
                    toastr.error(responseText.error.message);
                }
                if (data.status === 400) {
                    var responseText = $.parseJSON(data.responseText);
                    toastr.error(responseText.message);
                }
            }
        });
    }

});


var value_quantity;


$("[id^='get_value_minus-']").click(function() {

    // getProductlList();
    var num = this.id.split('-')[1];
    var value = $("#value_quantity-" + num).val();
    value_quantity = value > 1 ? value - 1 : value //minus one also

    var id = $("#value_id-" + num).val();
    var max = $("#value_quantity-" + num).attr('max');

    if (value_quantity <= max) {
        console.log("max limit ", max)
        update(id, value_quantity);

    }
});


$("[id^='get_value_plus-']").click(function() {
    var num = this.id.split('-')[1];
    var value = $("#value_quantity-" + num).val(); //Add one also here
    value_quantity = parseInt(value) + 1

    var id = $("#value_id-" + num).val();

    var max = $("#value_quantity-" + num).attr('max');

    if (value_quantity <= max) {
        console.log("max limit ", max)
        update(id, value_quantity);

    }



});


function update(id, quantity_value) {

    $.ajax({
        url: process.env.MIX_APP_URL + "/cart-edit",
        type: "POST",
        data: {
            id: id,
            quantity: quantity_value,
        },
        processData: true,
        contentType: false,
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        dataType: 'JSON',
        cache: false,
        success: function success(response) {
            // console.log(response.data.completeSessionView);
            return aftercheckout();

        },
        error: function error(data) {
            $('#cart-listing').html('');
            if (data.status === 422) {
                var responseText = $.parseJSON(data.responseText);
                toastr.error(responseText.error.message);
            }
            if (data.status === 400) {
                var responseText = $.parseJSON(data.responseText);
                toastr.error(responseText.message);
            }
        }
    });
}

function return_values(num, value_plus_or_minus) {

    var value = $("#value_quantity-" + num).val(); //Add one also here
    value_quantity = value_plus_or_minus;

    var price_per_product = $("#price_per_product-" + num).val();
    var price_value = value_quantity * price_per_product;

    var price_value_with_doller = '$' + price_value;

    $("#price_with_respect_quantity-" + num).empty();
    $("#price_with_respect_quantity-" + num).html(price_value_with_doller);

    $amount = document.getElementById("price_with_quantity-" + num);
    $amount.value = price_value;
    var including_shipping_price = $("#shipping_price-" + num).val();

    var total_value = including_shipping_price + price_value;

    var including_shipping_price_dollor = "$" + parseFloat(total_value);

    $("#including_shipping-" + num).empty();
    $("#including_shipping-" + num).html(including_shipping_price_dollor);


}


window.aftercheckout = function getProductlList() {

    $.ajax({
        url: process.env.MIX_APP_URL + "/cart-listing",
        type: "POST",
        data: {

        },
        processData: true,
        contentType: false,
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        dataType: 'JSON',
        cache: false,
        success: function success(response) {

            $('#cart-listing').html('');
            $('#cart-listing').html(response.data.completeSessionView);
            if (response.data.total_amount != undefined) {
                $('#total_header_cart').empty('');
                $('#total_header_cart').html('$' + response.data.total_amount)
            }

        },
        error: function error(data) {
            $('#cart-listing').html('');
            if (data.status === 422) {
                var responseText = $.parseJSON(data.responseText);
                toastr.error(responseText.error.message);
            }
            if (data.status === 400) {
                var responseText = $.parseJSON(data.responseText);
                toastr.error(responseText.message);
            }
        }
    });
}


window.deleteCartProduct = function deleteCartProduct(id) {

    // cart-delete

    swal({
        title: "Delete",
        text: "Are you sure, want to delete it?",
        icon: "warning",
        buttons: {
            cancel: true,
            confirm: "Delete",
        }
    }).then(
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: process.env.MIX_APP_URL + "/cart-delete",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    processData: true,
                    contentType: false,
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    },
                    dataType: 'JSON',
                    cache: false,
                    success: function success(response) {
                        toastr.success('Removed', { timeOut: 1000 });
                        setTimeout(function() {
                            return aftercheckout();
                        }, 1000);

                    },
                    error: function error(data) {
                        $('#cart-listing').html('');
                        if (data.status === 422) {
                            var responseText = $.parseJSON(data.responseText);
                            toastr.error(responseText.error.message);
                        }
                        if (data.status === 400) {
                            var responseText = $.parseJSON(data.responseText);
                            toastr.error(responseText.message);
                        }
                    }
                });
            } else {
                return false;
            }
        },
    );

    // if (confirm('Are you sure,want to remove?')) {
    //     console.log("yes", id);

    //     $.ajax({
    //         url: process.env.MIX_APP_URL + "/cart-delete",
    //         type: "POST",
    //         data: {
    //             id: id,
    //         },
    //         processData: true,
    //         contentType: false,
    //         headers: {
    //             'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    //             'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    //         },
    //         dataType: 'JSON',
    //         cache: false,
    //         success: function success(response) {
    //             toastr.success('Removed', { timeOut: 1000 });
    //             setTimeout(function() {
    //                 return aftercheckout();
    //             }, 1000);



    //         },
    //         error: function error(data) {
    //             $('#cart-listing').html('');
    //             if (data.status === 422) {
    //                 var responseText = $.parseJSON(data.responseText);
    //                 toastr.error(responseText.error.message);
    //             }
    //             if (data.status === 400) {
    //                 var responseText = $.parseJSON(data.responseText);
    //                 toastr.error(responseText.message);
    //             }
    //         }
    //     });
    // }
}



window.addCartProduct = function addCartProduct(id) {

    console.log("addto card")
        /* // cart-delete
         if (confirm('Are you sure,want to remove?')) {
             console.log("yes", id);

             $.ajax({
                 url: process.env.MIX_APP_URL + "/cart-delete",
                 type: "POST",
                 data: {
                     id: id,
                 },
                 processData: true,
                 contentType: false,
                 headers: {
                     'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
                     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                 },
                 dataType: 'JSON',
                 cache: false,
                 success: function success(response) {
                     toastr.success('Removed', { timeOut: 1000 });
                     setTimeout(function() {
                         return getProductlList();
                     }, 1000);



                 },
                 error: function error(data) {
                     $('#cart-listing').html('');
                     if (data.status === 422) {
                         var responseText = $.parseJSON(data.responseText);
                         toastr.error(responseText.error.message);
                     }
                     if (data.status === 400) {
                         var responseText = $.parseJSON(data.responseText);
                         toastr.error(responseText.message);
                     }
                 }
             });
         }*/
}