/* image cropper functions*/



window.setImage = function setImage(input, img_type) {

    var pathname = window.location.pathname,
        part = pathname.substr(pathname.lastIndexOf('/') + 1);
    if (part == 'sign-up') {
        document.getElementById('image-logo-uploaded').style.display = "block"
    }
    $('.validation').empty();
    var fileTypes = ['jpg', 'jpeg', 'png']; //acceptable file types
    $('#crop_image').attr('src', '');
    let defaultSrc = $('#defaultImagePreview').attr('src');
    $('#imagePreview').attr('src', defaultSrc);
    if (input.files && input.files[0]) {
        var extension = input.files[0].name.split('.').pop().toLowerCase(), //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1; //is extension in acceptable types
        if (!isSuccess) {
            $('#uploadImage').val('');
            $("#uploadImage").parent().after("<div class= 'validation help-block error-help-block  pl-2 pr-1' > Please add either a JPEG, JPG or a PNG file.</div > ");
        } else if (input.files[0].size >= 5120000) {
            $('#uploadImage').val('');
            var fileTxt = img_type == 'business_image' ? 'a logo' : 'image'; // for diff msg
            $("#uploadImage").parents('.upload_photo ').
            after("<div class='validation help-block error-help-block text-center' style='margin-top:2px;'>Please add " + fileTxt + " file not exceeding 5MBs.</div>");
        } else {
            openImageCropperModal(input, img_type);
        }
    }
}

$(document).on('hidden.bs.modal', '#imageCropperModal', function(e) {
    $('#crop_image').attr('src', '');
    var $image = $("#crop_image");
    var input = $("#cropImageInput");
    input.replaceWith(input.val('').clone(true));
    $image.cropper("destroy");
});

//cropper
window.loadCropper = function() {
    var $image = $("#crop_image");
    $image.cropper({
        viewMode: 1,
        dragMode: 'move',
        aspectRatio: 1,
        movable: false,
        zoomable: true,
        rotatable: true,
        center: true,
        responsive: true,
        cropBoxResizable: true,
        minContainerWidth: '100%',
        minContainerHeight: '100%',

    });
}

function openImageCropperModal(input, img_type) {
    var reader = new FileReader();
    reader.onload = function(e) {
        //Initiate the JavaScript Image object.
        var image = new Image();
        //Set the Base64 string return from FileReader as source.
        image.src = e.target.result;
        //Validate the File Height and Width.
        image.onload = function() {
            $("#imageCropperModal").modal("show");
            $('#crop_image').attr('src', e.target.result);
            $('#imageBaseCode').val(e.target.result);
            $('#image_type').val(img_type);
            setTimeout(function() {
                loadCropper();
            }, 150);
            $(input).val(null);
        };
    };
    reader.readAsDataURL(input.files[0]);
}


$(document).ready(function() {
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        prevArrow: '<i class="slick-prev fas fa-angle-left"></i>',
        nextArrow: '<i class="slick-next fas fa-angle-right"></i>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: false,
                    autoplay: true,
                    autoplaySpeed: 1500,
                    arrows: true,
                    dots: false,
                    pauseOnHover: true,

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


    $('.product-show-list').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        prevArrow: '<i class="slick-prev fa fa-chevron-circle-left  top-left"></i>',
        nextArrow: '<i class="slick-next fa fa-chevron-circle-right top-right"></i>',
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
    });




    $('.product-show-hot').slick({
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
    });



    $('.show-special-list').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        prevArrow: '<i class="slick-prev fa fa-chevron-circle-left special-left"></i>',
        nextArrow: '<i class="slick-next fa fa-chevron-circle-right special-right"></i>',
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
    });


    $('.product-latest_list').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        prevArrow: '<i class="slick-prev fa fa-chevron-circle-left latest-left"></i>',
        nextArrow: '<i class="slick-next fa fa-chevron-circle-right latest-right"></i>',
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
    });

    $('.product-feature_list').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        prevArrow: '<i class="slick-prev fa fa-chevron-circle-left latest-left"></i>',
        nextArrow: '<i class="slick-next fa fa-chevron-circle-right latest-right"></i>',
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
    });


    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });

    $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
    });








})



window.showButtonLoader = function(button, text = '', action) {
    if (action === 'disabled') {
        button.append('<span class="buttonLoader spinner-border spinner-border-sm ml-2"></span>');
        button.prop('disabled', true);
    } else {
        $(button).find('.spinner-border').remove();
        button.prop('disabled', false);
    }
}

jQuery(document).ready(function($) {
    function codeAddress() {
        document.getElementById('defaultOpen').click();
        document.getElementById('defaultOpen2').click();
        document.getElementById('defaultOpen3').click();
    }
    window.onload = codeAddress;
    $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
    });
});


function openCity(evt, tabName = "All") {

    // document.getElementById("all_id").innerHTML ="Hello rinky";
    $('.product-show-list').slick('refresh');
    $('.product-show-list').slick('refresh');
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


function open2(evt, tabName = "All2") {

    $('.product-latest_list').slick('refresh');
    $('.product-latest_list').slick('refresh');

    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent2");

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks2");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function open3(evt, tabName = "All3") {
    var i, tabcontent, tablinks;

    $('.product-feature_list').slick('refresh');
    $('.product-feature_list').slick('refresh');
    tabcontent = document.getElementsByClassName("tabcontent3");
    // console.log("jhdfj ",tabcontent)

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks3");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});



// Mini Cart
paypal.minicart.render({
    action: '#'
});

if (~window.location.search.indexOf('reset=true')) {
    paypal.minicart.reset();
}

$(document).ready(function() {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });
    $('#verticalTab').easyResponsiveTabs({
        type: 'vertical',
        width: 'auto',
        fit: true
    });
});



// For Filter
var $filterCheckboxes = $('input[type="checkbox"]');
var filterFunc = function() {

    var selectedFilters = {};

    $filterCheckboxes.filter(':checked').each(function() {

        if (!selectedFilters.hasOwnProperty(this.name)) {
            selectedFilters[this.name] = [];
        }

        selectedFilters[this.name].push(this.value);
    });

    // create a collection containing all of the filterable elements
    var $filteredResults = $('.product');

    // loop over the selected filter name -> (array) values pairs
    $.each(selectedFilters, function(name, filterValues) {

        // filter each .product element
        $filteredResults = $filteredResults.filter(function() {

            var matched = false,
                currentFilterValues = $(this).data('category').split(' ');

            // loop over each category value in the current .product's data-category
            $.each(currentFilterValues, function(_, currentFilterValue) {

                // if the current category exists in the selected filters array
                // set matched to true, and stop looping. as we're ORing in each
                // set of filters, we only need to match once

                if ($.inArray(currentFilterValue, filterValues) != -1) {
                    matched = true;
                    return false;
                }
            });

            // if matched is true the current .product element is returned
            return matched;

        });
    });

    $('.product').hide().filter($filteredResults).show();
}

$filterCheckboxes.on('change', filterFunc);


// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}