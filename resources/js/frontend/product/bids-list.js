$(window).load(function() {
    getBidsList();
    var pageno = 1;
    var records = 6;

    function getBidsList(pageno, records) {
        console.log("reords -- ", records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/BidPlacePost",
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


                $('#listing-bids').html('');
                $('#listing-bids').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#listing-bids').html('');
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
        getBidsList(newurl);
    });

});


$("#bids_product_page").change(function() {
    var number_records = $("#bids_product_page").val();
    var searching = $("#bids_product_searching_seller").val();

    var page = 1;
    getBidsList(page, number_records, searching);
});


$("#bids_product_searching_seller").keypress(function() {
    var searching = $("#bids_product_searching_seller").val();
    var page = 1;
    var records = 6;
    getBidsList(page, records, searching);
});


function getBidsList(pageno, records, searching) {
    console.log("reords -- ", records)
    var filter_by = 'desc';
    $.ajax({
        url: process.env.MIX_APP_URL + "/BidPlacePost",
        type: "POST",
        data: {
            filter_by: filter_by,
            page: pageno,
            record: records,
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
            $('#listing-bids').html('');
            $('#listing-bids').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#listing-bids').html('');
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