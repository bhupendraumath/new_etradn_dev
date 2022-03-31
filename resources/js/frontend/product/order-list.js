$(window).load(function() {


    var pageno = 1;
    var records = 4;

    orderListbySeller();


    function orderListbySeller(pageno, records) {
        console.log("reords -- ", records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/my-order-post",
            type: "POST",
            data: {
                filter_by: filter_by,
                page: pageno,
                record: 3
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
                $('#seller-my-order-listing').html('');
                $('#seller-my-order-listing').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#seller-my-order-listing').html('');
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
        orderListbySeller(newurl);
    });

});


$("#order-list_records").change(function() {
    console.log("in order listing")
    var number_records = $("#order-list_records").val();
    var page = 1;

    orderListbySeller(page, number_records);
});


// var pageno = 1;
// var records = 4;

function orderListbySeller(pageno, records) {
    console.log("reords -- ", records)
    var filter_by = 'desc';
    $.ajax({
        url: process.env.MIX_APP_URL + "/my-order-post",
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
            $('#seller-my-order-listing').html('');
            $('#seller-my-order-listing').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#seller-my-order-listing').html('');
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