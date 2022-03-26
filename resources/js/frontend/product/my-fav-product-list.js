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


var pageno = 1;
var records = 4;

window.favorite_delete_product = function favorite_delete_product(product_id) {


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

                    $.ajax({
                        url: process.env.MIX_APP_URL + "/delete-favorite/" + product_id,
                        type: "GET",
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                toastr.clear();
                                toastr.success(response.message, { timeOut: 2000 });
                                // setTimeout(function() {
                                //     window.location.href = process.env.MIX_APP_URL + "/favorite_product";
                                // }, 2000);
                                getMyFavProductlList(pageno, records);

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


window.allremove = function allremove() {

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

                    $.ajax({
                        url: process.env.MIX_APP_URL + "/all-delete-favorite",
                        type: "GET",
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                toastr.clear();
                                toastr.success(response.message, { timeOut: 2000 });
                                // setTimeout(function() {
                                //     window.location.href = process.env.MIX_APP_URL + "/favorite_product";
                                // }, 2000);
                                getMyFavProductlList(pageno, records);
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