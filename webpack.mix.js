const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .scripts([

        'resources/js/frontend/jquery-2.1.4.min.js',
        // 'resources/js/frontend/jquery-ui.js',
        'resources/js/frontend/bootstrap.js',
        'resources/js/frontend/easy-responsive-tabs.js',
        'resources/js/frontend/imagezoom.js',
        'resources/js/frontend/jquery.countup.js',
        'resources/js/frontend/jquery.easing.min.js',
        'resources/js/frontend/jquery.flexslider.js',
        'resources/js/frontend/jquery.waypoints.min.js',
        'resources/js/frontend/minicart.min.js',
        'resources/js/frontend/modernizr.custom.js',
        'resources/js/frontend/move-top.js',
        'resources/js/frontend/responsiveslides.min.js',

        'resources/js/frontend/slick.js',
        'public/vendor/jsvalidation/js/jsvalidation.min.js',
        'resources/js/frontend/toastr.min.js',
        'resources/js/frontend/cropper.min.js',
        'resources/js/frontend/common.js',
    ], 'public/assets/js/frontend/main.js')
    .styles([
        'resources/css/frontend/bootstrap.css',
        'resources/css/frontend/style.css',
        'resources/css/frontend/jquery-ui.css',
        'resources/css/frontend/flexslider.css',
        'resources/css/frontend/easy-responsive-tabs.css',
        'resources/css/frontend/font-awesome.css',
        // 'resources/css/frontend/all.css',
        'resources/css/frontend/toastr.min.css',
        // 'resources/css/frontend/team.css',
        'resources/css/frontend/cropper.min.css',

    ], 'public/assets/css/frontend/style.css')

.js([
        'resources/js/frontend/auth/login.js'
    ], 'public/assets/js/frontend/auth/login.js')
    .js([
        'resources/js/frontend/auth/registration.js'
    ], 'public/assets/js/frontend/auth/registration.js')
    .js([
        'resources/js/frontend/w3.js'
    ], 'public/assets/js/frontend/w3.js')
    .js([
        'resources/js/frontend/auth/change_password.js'
    ], 'public/assets/js/frontend/auth/change_password.js')
    .js([
        'resources/js/frontend/profile/update-user.js'
    ], 'public/assets/js/frontend/profile/update-user.js')
    .js([
        'resources/js/frontend/profile/business.js'
    ], 'public/assets/js/frontend/profile/business.js')
    .js([
        'resources/js/frontend/product/product.js'
    ], 'public/assets/js/frontend/product/product.js')
    .js([
        'resources/js/frontend/product/product-list.js'
    ], 'public/assets/js/frontend/product/product-list.js')

.js([
        'resources/js/frontend/product/rfq-list.js'
    ], 'public/assets/js/frontend/product/rfq-list.js')
    .js([
        'resources/js/frontend/profile/rfq-form.js'
    ], 'public/assets/js/frontend/profile/rfq-form.js')

.js([
        'resources/js/frontend/product/bids-list.js'
    ], 'public/assets/js/frontend/product/bids-list.js')
    .js([
        'resources/js/frontend/product/refund-request-list.js'
    ], 'public/assets/js/frontend/product/refund-request-list.js')
    .js([
        'resources/js/frontend/product/delivery-areas-list.js'
    ], 'public/assets/js/frontend/product/delivery-areas-list.js')

.js([
        'resources/js/frontend/product/my-fav-product-list.js'
    ], 'public/assets/js/frontend/product/my-fav-product-list.js')
    .js([
        'resources/js/frontend/product/cart-list.js'
    ], 'public/assets/js/frontend/product/cart-list.js')
    .js([
        'resources/js/frontend/product/addCardProduct.js'
    ], 'public/assets/js/frontend/product/addCardProduct.js')
    .js([
        'resources/js/frontend/product/delivery-areas-list-buyer.js'
    ], 'public/assets/js/frontend/product/delivery-areas-list-buyer.js')

.js([
    'resources/js/frontend/product/product-delete.js'
], 'public/assets/js/frontend/product/product-delete.js')

.js([
    'resources/js/frontend/product/favorite-delete.js'
], 'public/assets/js/frontend/product/favorite-delete.js')

.js([
    'resources/js/frontend/product/cat-product-list.js'
], 'public/assets/js/frontend/product/cat-product-list.js')

.js([
    'resources/js/frontend/product/order-list.js'
], 'public/assets/js/frontend/product/order-list.js')

.js([
        'resources/js/frontend/product/purchase-history-list.js'
    ], 'public/assets/js/frontend/product/purchase-history-list.js')
    .js([
        'resources/js/frontend/product/add-bid-placed.js'
    ], 'public/assets/js/frontend/product/add-bid-placed.js')
    .js([
        'resources/js/frontend/product/buyer-bids-list.js'
    ], 'public/assets/js/frontend/product/buyer-bids-list.js')
    .js([
        'resources/js/frontend/sweetalert.min.js'
    ], 'public/assets/js/frontend/sweetalert.min.js')
    .js([
        'resources/js/frontend/product/home-page-listing.js'
    ], 'public/assets/js/frontend/product/home-page-listing.js');