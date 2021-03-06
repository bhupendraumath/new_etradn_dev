
$(window).load(function () {
    getProductlList();
    // $('#filterData').on('submit', function(e) {
    //     e.preventDefault();
    //     getCompleteGroupSession();
    // });
    var pageno = 1;
    var records = 4;
    function getProductlList(pageno,records) {
        console.log("reords -- ",records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/product-list-render",
            type: "POST",
            data: {
                filter_by: filter_by,
                page:pageno,
                record:4
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
                $('#listing').html('');
                $('#listing').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#listing').html('');
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

    $("body").on('click', '.page-link', function () {
        var url = $(this).data('url');
       let newurl= url.substring(url.lastIndexOf('=') + 1);
        getProductlList(newurl);
    });

});


$("#uploaded_product_page").change(function(){
    var number_records=$("#uploaded_product_page").val();
    var page=1;
    getProductlList(page,number_records);
  });


  function getProductlList(pageno,records) {
    console.log("reords -- ",records)
    var filter_by = 'desc';
    $.ajax({
        url: process.env.MIX_APP_URL + "/my-upload-product-list",
        type: "POST",
        data: {
            filter_by: filter_by,
            page:pageno,
            record:records
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
            $('#listing').html('');
            $('#listing').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#listing').html('');
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