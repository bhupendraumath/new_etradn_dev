$(window).load(function() {
    getRefundRequest();
    // console.log("jgfghdjfghdkf");
    var pageno = 1;
    var records = 4;

    function getRefundRequest(pageno, records) {
        console.log("reords -- ", records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/refund_request_list_post",
            type: "POST",
            data: {
                filter_by: filter_by,
                page: pageno,
                record: 4
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


                $('#listing-refund').html('');
                $('#listing-refund').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#listing-refund').html('');
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
        getRefundRequest(newurl);
    });

});


$("#bids_product_page").change(function() {
    var number_records = $("#bids_product_page").val();
    var searching = $("#searching_bid").val();

    var page = 1;
    getRefundRequest(page, number_records, searching);
});


$("#searching_bid").keypress(function() {
    var searching = $("#searching_bid").val();
    var number_records = $("#bids_product_page").val();
    var page = 1;

    searching == null ? getRefundRequest(page, number_records) : getRefundRequest(page, number_records, searching);
});

function getRefundRequest(pageno, records, searching) {
    console.log("reords -- ", records)
    var filter_by = 'desc';
    $.ajax({
        url: process.env.MIX_APP_URL + "/refund_request_list_post",
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
            $('#listing-refund').html('');
            $('#listing-refund').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#listing-refund').html('');
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


// $(document).on('change', "#seller_approve", function(e) {
$('#seller_approve').change(function() {

    var selected = this.value;
    var ref_id = $(this).find(':selected').attr('data-rid')


    console.log("----->", this.value, 'ref_id  ', ref_id)

    $.ajax({
        url: process.env.MIX_APP_URL + "/change-request",
        type: "POST",
        data: {
            id: ref_id,
            status: selected,
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

            toastr.clear();
            toastr.success(response.message, { timeOut: 1000 });
            getRefundRequest(pageno, records);

        },
        error: function error(data) {
            toastr.clear();
            toastr.error(data.message, { timeOut: 1000 });
        }
    });
    // change-request

})