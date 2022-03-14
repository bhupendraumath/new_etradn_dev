$(window).load(function() {
    getRfqList();

    var pageno = 1;
    var records = 4;

    function getRfqList(pageno, records) {
        console.log("reords -- ", records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/rfq-list-list",
            type: "POST",
            data: {
                filter_by: filter_by,
                page: pageno,
                record: 10
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
                $('#rfq-list').html('');
                $('#rfq-list').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#rfq-list').html('');
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
        getRfqList(newurl);
    });

});


$("#rfq-page").change(function() {
    var number_records = $("#rfq-page").val();
    var page = 1;
    getRfqList(page, number_records);
});


function getRfqList(pageno, records) {
    console.log("reords -- ", records)
    var filter_by = 'desc';
    $.ajax({
        url: process.env.MIX_APP_URL + "/rfq-list-list",
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
            console.log("response ", response.data.completeSessionView);
            $('#rfq-list').html('');
            $('#rfq-list').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#rfq-list').html('');
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