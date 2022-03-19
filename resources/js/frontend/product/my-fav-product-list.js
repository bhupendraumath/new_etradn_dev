$(window).load(function() {
    getMyFavProductlList();
    var pageno = 1;
    var records = 4;

    function getMyFavProductlList(pageno, records) {
        console.log("reords -- ", records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/my-fav-product-list",
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
                $('#fav-product').html('');
                $('#fav-product').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#fav-product').html('');
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
        getMyFavProductlList(newurl);
    });

});


$("#uploaded_product_page").change(function() {
    var number_records = $("#uploaded_product_page").val();
    var page = 1;
    getMyFavProductlList(page, number_records);
});


function getMyFavProductlList(pageno, records) {
    console.log("reords -- ", records)
    var filter_by = 'desc';
    $.ajax({
        url: process.env.MIX_APP_URL + "/my-fav-product-list",
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
            $('#fav-product').html('');
            $('#fav-product').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#fav-product').html('');
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


function addedFav(product_id, quantity_id) {
    // console.log(process.env.MIX_APP_URL + "/add-in-fav-list/"+product_id+'/'+quantity_id);

    // return false;
    // var path="/add-in-fav-list/"+product_id+'/'+quantity_id;

    $.ajax({
        url: "{{url('add-in-fav-list')}}" + '/' + product_id + '/' + quantity_id,
        type: "GET",
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                toastr.clear();
                toastr.success(response.message, { timeOut: 2000 });
                location.reload();
            } else {
                toastr.clear();
                toastr.error(response.message, { timeOut: 2000 });
            }
        },

    });

}