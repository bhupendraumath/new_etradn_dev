$(window).load(function() {


    homelistshow();
    // top_posts();

    var pageno = 1;
    var records = 4;




    function homelistshow(pageno, records) {
        console.log("reords -- ", records)
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/home-listing",
            type: "POST",
            data: {
                filter_by: filter_by,
                page: pageno,
                record: 6
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
                $('#hot-items-row').html('');
                $('#hot-items-row').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#hot-items-row').html('');
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
        homelistshow(newurl);
    });

});


$("#uploaded_product_page").change(function() {
    var number_records = $("#uploaded_product_page").val();
    var page = 1;
    homelistshow(page, number_records);
});


function homelistshow(pageno, records) {
    console.log("reords -- ", records)
    var filter_by = 'desc';
    $.ajax({
        url: process.env.MIX_APP_URL + "/home-listing",
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
            $('#hot-items-row').html('');
            $('#hot-items-row').html(response.data.completeSessionView)

        },
        error: function error(data) {
            $('#hot-items-row').html('');
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




window.filtering = function filtering(category_id) {

    $('.top-posts-slider').slick("unslick")
    console.log("inside here", category_id);
    top_posts(category_id);
    $('.top-posts-slider').slick("slickAdd")
}

window.filteringLetest = function filtering(category_id) {

    $('.product-latest-slider').slick("unslick")
    console.log("inside special_item", category_id);
    special_item(category_id);
    $('.product-latest-slider').slick("slickAdd")
}

$('.hot-item-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    dots: false,
    pauseOnHover: true,
    prevArrow: '<i class="slick-prev fa fa-chevron-circle-left hot-left"></i>',
    nextArrow: '<i class="slick-next fa fa-chevron-circle-right hot-right"></i>',
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: false,
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }

    ]
});

/*
$('.top-latest-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    dots: false,
    pauseOnHover: true,
    prevArrow: '<i class="slick-prev fa fa-chevron-circle-left hot-left"></i>',
    nextArrow: '<i class="slick-next fa fa-chevron-circle-right hot-right"></i>',
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 3,
                infinite: false,
                dots: false
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }

    ]
});*/

$('document').ready(function() {

    var cat_id = "all"
    top_posts(cat_id);
    special_item(cat_id);
})

function top_posts(cat_id) {
    var el = $('.top-posts-slider');

    var reqUrl = process.env.MIX_APP_URL + "/home-product-listing";
    el.html('<i class="fa fa-circle-o-notch fa-spin fa-fw loader-product" style="padding: 0;"></i>');
    $.ajax({
        url: reqUrl,
        type: "POST",
        data: {
            id: cat_id,
        },
        dataType: 'json'
    }).done(function(response) {
        el.empty();
        el.html(response.data.completeSessionView);

    }).fail(function(jqXHR, textStatus) {
        el.children("#home-product-popular-product").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>');
        console.log("Request failed: " + textStatus);
    });
    return false;



    /*
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/home-product-listing",
            type: "POST",
            data: {
                filter_by: filter_by,
                id: 'all',
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
                $('#home-product-popular-product').html('');
                $('#home-product-popular-product').html(response.data.completeSessionView)
                top_slider_init();
            },
            error: function error(data) {
                $('#home-product-popular-product').html('');
                if (data.status === 422) {
                    var responseText = $.parseJSON(data.responseText);
                    toastr.error(responseText.error.message);
                }
                if (data.status === 400) {
                    var responseText = $.parseJSON(data.responseText);
                    toastr.error(responseText.message);
                }
            }
        });*/

}


function special_item(cat_id) {
    var el = $('.product-latest-slider');

    var reqUrl = process.env.MIX_APP_URL + "/home-latest-product-listing";
    el.html('<i class="fa fa-circle-o-notch fa-spin fa-fw loader-product" style="padding: 0;"></i>');
    $.ajax({
        url: reqUrl,
        type: "POST",
        data: {
            id: cat_id,
        },
        dataType: 'json'
    }).done(function(response) {
        el.empty();
        el.html(response.data.completeSessionView);

    }).fail(function(jqXHR, textStatus) {
        el.children("#home-product-latest-product").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>');
        console.log("Request failed: " + textStatus);
    });
    return false;



    /*
        var filter_by = 'desc';
        $.ajax({
            url: process.env.MIX_APP_URL + "/home-product-listing",
            type: "POST",
            data: {
                filter_by: filter_by,
                id: 'all',
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
                $('#home-product-popular-product').html('');
                $('#home-product-popular-product').html(response.data.completeSessionView)
                top_slider_init();
            },
            error: function error(data) {
                $('#home-product-popular-product').html('');
                if (data.status === 422) {
                    var responseText = $.parseJSON(data.responseText);
                    toastr.error(responseText.error.message);
                }
                if (data.status === 400) {
                    var responseText = $.parseJSON(data.responseText);
                    toastr.error(responseText.message);
                }
            }
        });*/

}


window.addedFav = function addedFav(product_id, quantity_id, fav_id, user_exists) {

    if (user_exists == 'auth_required') {

        swal({
            title: "Your Favorite List is Empty",
            text: "Add in your favorite list",
            icon: "warning",
            buttons: {
                cancel: true,
                confirm: "Sign in Your Account",
            }
        }).then(
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = "{{url('sign-in')}}";
                } else {
                    return false;
                }
            },
        );

    } else {


        $.ajax({

            url: process.env.MIX_APP_URL + '/add-in-fav-list/' + product_id + '/' + quantity_id + '/' + fav_id,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    toastr.clear();
                    toastr.success(response.message, { timeOut: 2000 });
                    homelistshow(pageno, records)
                } else {
                    toastr.clear();
                    toastr.error(response.message, { timeOut: 2000 });
                }
            },

        });

    }


}