$(document).ready(function() {

    $('#category').on('change', function() {
        var category_id = this.value;
        $("#subcategory").html('');

        filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange);

        $.ajax({
            url: process.env.MIX_APP_URL + "/getsubCategroy",
            type: "POST",
            data: {
                category_id: category_id,
                // _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {

                $('#subcategory').html('<option value="">Select sub category</option>');
                console.log(result.data);
                var template;
                for (var i = 0; i < result.data.length; i++) {
                    template += '<option value="' + result.data[i].id + '">' + result.data[i].subCategoryName + '</option>';
                }


                $("#subcategory").append(template);

                // $.each(result.data, function(key, value) {
                //     $("#subcategory").append('<option value="' + value
                //         .id + '">' + value.subCategoryName + '</option>');
                // });
                // $('#subcategory').html('<option value="">--Select Sub category--</option>');
            }
        });
    });
});



var brandArr = [];
var conditionArr = [];
var discountArr = [];
var priceRange = 15000;
var price_order;
var show_records;
var category;
var sub_category;
var pageno = 1;

window.priceOrder = function priceOrder() {
    var price_order = $('#order').val();
    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)
}

window.showRecords = function showRecords() {
    show_records = $('#page_limit').val();
    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)
}


window.selectedSubCategory = function selectedSubCategory() {
    var sub_category = $('#subcategory').val();
    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)
}

$('.myBoxBrand  input:checkbox').change(function() {

    var tempValue = '';
    var arr = [];

    tempValue = $('.myBoxBrand  input:checkbox').map(function(n) {
        if (this.checked) {
            arr.push(Number(this.value));
            //   return  this.value;
        };
    }).get().join(',');

    brandArr = arr;
    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)

})


$('.condition  input:checkbox').change(function() {
    var arr = [];
    tempValue = $('.condition  input:checkbox').map(function(n) {
        if (this.checked) {
            arr.push(this.value);
        };
    });

    conditionArr = arr;
    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)

})


$('.discount  input:checkbox').change(function() {
    var arr = [];
    tempValue = $('.discount  input:checkbox').map(function(n) {
        if (this.checked) {
            arr.push(this.value);
        };
    });

    discountArr = arr;
    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)

})

$('#price-range').change(function() {
    var price_range = $('#price-range').val();
    document.getElementById("min-price").innerHTML = '$' + price_range;
    priceRange = price_range;
    console.log("---------------------", priceRange, discountArr, conditionArr, brandArr)
    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)

})


$(document).ready(function() {

    // filter(pageno);

    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)
})


function filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange) {

    var category_value = $('#category').val();
    var subcategory_value = $('#subcategory').val();
    var order = $('#order').val();


    $.ajax({
        url: process.env.MIX_APP_URL + "/product-list",
        type: "POST",
        data: {
            'order': order,
            'page_limit': show_records,
            'category': category_value,
            'sub_category': subcategory_value,
            'brand': brandArr,
            'conditionArr': conditionArr,
            'discountArr': discountArr,
            'priceRange': priceRange,
            'page': pageno,
            // _token: '{{csrf_token()}}'
        },
        success: function success(response) {
            $('#listing').html('');
            $('#listing').html(response.data.completeSessionView)
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 350;
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

window.addedFav = function addedFav(product_id, quantity_id, fav_id, user_exists) {

    console.log("hello.....", user_exists)
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
            url: process.env.MIX_APP_URL + "/add-in-fav-list" + '/' + product_id + '/' + quantity_id + '/' + fav_id,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    toastr.clear();
                    toastr.success(response.message, { timeOut: 1000 });
                    // location.reload();
                    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)
                } else {
                    toastr.clear();
                    toastr.error(response.message, { timeOut: 1000 });
                    filtersByValue(pageno, price_order, show_records, category, sub_category, brandArr, conditionArr, discountArr, priceRange)
                }
            },

        });

    }


}

/*dfunction filter(pageno) {
    var order = $('#order').val();
    var page_limit = $('#page_limit').val();
    var brand = $('#brand').val();
    var category = $('#category').val();
    var path = $('#pathimage').val();
    var url_file = $('#url').val();

    $.ajax({
        url: "{{url('product-list')}}",
        type: "POST",
        data: {
            'order': order,
            'page_limit': page_limit,
            'brand': brand,
            'category': category,
            'page': pageno,
            _token: '{{csrf_token()}}'
        },
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



}*/

$("body").on('click', '.page-link', function() {
    var url = $(this).data('url');
    let newurl = url.substring(url.lastIndexOf('=') + 1);
    filter(newurl);
});


window.myFilterlist = function myFilterlist() {
    var x = document.getElementById("filterListCat");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}