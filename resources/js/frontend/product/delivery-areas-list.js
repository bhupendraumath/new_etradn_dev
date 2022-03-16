$(window).load(function() {
    getRefundRequest();
    console.log("jgfghdjfghdkf");
    var pageno = 1;
    var records = 4;

    function getRefundRequest(pageno, records) {
        // console.log("reords -- ", records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/delivery-areas-post",
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


                $('#listing-deivery-areas').html('');
                $('#listing-deivery-areas').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#listing-deivery-areas').html('');
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
    var page = 1;
    getRefundRequest(page, number_records);
});


function getRefundRequest(pageno, records) {
    console.log("reords -- ", records)
    var filter_by = 'desc';
    $.ajax({
        url: process.env.MIX_APP_URL + "/delivery-areas-post",
        type: "POST",
        data: {
            filter_by: filter_by,
            page: pageno,
            record: records
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
            $('#listing-deivery-areas').html('');
            $('#listing-deivery-areas').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#listing-deivery-areas').html('');
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