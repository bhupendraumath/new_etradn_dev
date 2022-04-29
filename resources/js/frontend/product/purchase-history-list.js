$(window).load(function() {
    getProductlList();
    // $('#filterData').on('submit', function(e) {
    //     e.preventDefault();
    //     getCompleteGroupSession();
    // });

    var pageno = 1;
    var records = 2;

    function getProductlList(pageno, records) {
        console.log("reords -- ", records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/purchase-history-list-post",
            type: "POST",
            data: {
                filter_by: filter_by,
                page: pageno,
                record: 2
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
                $('#purchase-history').html('');
                $('#purchase-history').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#purchase-history').html('');
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

    $("body").on('click', '.page-link', function() {
        var url = $(this).data('url');
        let newurl = url.substring(url.lastIndexOf('=') + 1);
        getProductlList(newurl);
    });

});


$("#purchase_product_page").change(function() {
    var searching = $("#searching_purchase").val();
    var number_records = $("#purchase_product_page").val();
    var page = 1;
    getProductlList(page, number_records, searching);
});




$("#searching_purchase").change(function() {
    var searching = $("#searching_purchase").val();
    var number_records = $("#purchase_product_page").val();
    var page = 1;

    searching == null ? getProductlList(page, number_records) : getProductlList(page, number_records, searching);
});

function getProductlList(pageno, records, searching) {
    console.log("reords -- ", records)
    var filter_by = 'desc';

    // records==null?2:records;
    console.log("records --->", records);
    $.ajax({
        url: process.env.MIX_APP_URL + "/purchase-history-list-post",
        type: "POST",
        data: {
            filter_by: filter_by,
            page: pageno,
            record: records == null ? 2 : records,
            searching: searching
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
            $('#purchase-history').html('');
            $('#purchase-history').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#purchase-history').html('');
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


var pageno = 1;
var records = 4;

window.deleteOrder = function deleteOrder(order_id) {

    // console.log("here");
    swal({
            title: "Delete",
            text: "Are you sure, want to delete it?",
            type: "#danger",
            buttons: {
                cancel: true,
                confirm: "Delete",
            }
        })
        .then(
            function(isConfirm) {
                if (isConfirm) {
                    console.log("order_id  ", order_id);

                    return false;
                    $.ajax({
                        url: process.env.MIX_APP_URL + "/uploadedDelete/" + product_id,
                        type: "GET",
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                toastr.clear();
                                toastr.success(response.message, { timeOut: 2000 });
                                getProductlList(pageno, records);
                            } else {
                                btn.prop('disabled', false);
                                toastr.clear();
                                toastr.error(response.message, { timeOut: 2000 });
                            }
                        },
                        error: function(data) {
                            var obj = jQuery.parseJSON(data.responseText);
                            for (var x in obj) {
                                // btn.prop('disabled', false);
                                // btn.html('Update');

                                $('#' + x + '-error').html(obj[x]);
                                $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                            }
                        },
                    });

                } else {
                    return false;
                }
            },
        );
}

$("#refundProductRequest").on('submit', (function(e) {
    e.preventDefault();

    //  $("#createRefundRequest").on('click', (function(e) {

    console.log("Hello refund request")
    var frm = $('#refundProductRequest');
    var btn = $('#createRefundRequest');
    if (frm.valid()) {

        console.log("frm.serialize()---   ", frm.serialize());
        // return false;
        btn.prop('disabled', true);
        $.ajax({
            url: process.env.MIX_APP_URL + "/create-refund-request",
            type: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    toastr.clear();
                    // btn.html('Save');
                    toastr.success(response.message, { timeOut: 1000 });
                    getProductlList(pageno, records);
                } else {
                    btn.prop('disabled', false);
                    // btn.html('Save');
                    toastr.clear();
                    toastr.error(response.message, { timeOut: 1000 });
                }
            },
            error: function(data) {
                var obj = jQuery.parseJSON(data.responseText);
                for (var x in obj) {
                    btn.prop('disabled', false);
                    btn.html('Update');

                    $('#' + x + '-error').html(obj[x]);
                    $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                }
            },
        });
    }

}));