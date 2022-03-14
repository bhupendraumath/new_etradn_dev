<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    HomeController,
    UserController,
    ProductController,
    SellerController,
    CommonController,
    BuyerController,
    ReviewController,
    OrderController,
    RfqController,
    WalletController
};
use App\Http\Controllers\Auth\{
    LoginController,
    ForgotPasswordController,
};
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/clear-cache',
    function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        echo "Cache clear successfully";
        // dd();
    }
);

Route::get(
    '/blog',
    [HomeController::class, 'blog']
)->name('blog');

Route::get(
    '/blog-details',
    [HomeController::class, 'blogDetails']
)->name('blog-details');

Route::get(
    '/request',
    [RfqController::class, 'request']
)->name('request');

Route::post(
    '/request-action',
    [RfqController::class, 'request_action']
)->name('request_action');

Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');

Route::post(
    '/product-list',
    [ProductController::class, 'detailedlist']
)->name('product.detailedlist');


Route::post(
    '/product-list-render',
    [ProductController::class, 'detailedlistRender']
)->name('product.detailedlistrender');



Route::get(
    '/product-details/{id}',
    [ProductController::class, 'productDetails']
)->name('product.productDetails');

Route::post(
    '/checking_order_existing',
    [ReviewController::class, 'checking_order_existing']
)->name('checking_order_existing');

Route::post(
    '/submit_rating',
    [ReviewController::class, 'submit_rating']
)->name('submit_rating');


Route::post(
    '/submit_rating_load',
    [ReviewController::class, 'submit_rating_load']
)->name('submit_rating_load');


Route::group(
    ['middleware' => 'checkLogin:web'],
    function () {
        Route::get(
            'sign-in',
            [LoginController::class, 'loginForm']
        )->name('login');
        Route::post(
            'loginAction',
            [LoginController::class, 'loginAction']
        )->name('loginAction');
        Route::get(
            'sign-up',
            [UserController::class, 'index']
        )->name('registration');

        Route::post(
            'registrationAction',
            [UserController::class, 'registrationAction']
        )->name('registrationAction');
    }
);
Route::get(
    'about-us',
    [HomeController::class, 'about']
)->name('about');

Route::get(
    'contact-us',
    [HomeController::class, 'contactUs']
)->name('contact');

Route::get(
    'product-details',
    [ProductController::class, 'show']
)->name('product.details');


Route::get(
    'review-rating',
    [ReviewController::class, 'review_rating']
)->name('review-rating');
//list of product
Route::get(
    '/product-list/{id}',
    [ProductController::class, 'list']
)->name('product.list');    
//list of product
Route::post(
    '/getsubCategroy',
    [CommonController::class, 'getsubCategroy']
)->name('getsubCategroy');

Route::get(
    '/logout',
    [LoginController::class, 'logout']
)->name('logout');



Route::post(
    'rfq-action',
    [RfqController::class, 'rfqListAction']
)->name('rfqListAction');


Route::group(
    ['middleware' => 'user:web'],
    function () {
       
        // Seller panel start
        Route::get(
            'dashboard',
            [SellerController::class, 'dashboard']
        )->name('seller.dashboard');

        Route::get(
            'person-information',
            [CommonController::class, 'personInformation']
        )->name('personInformation');

        Route::get(
            'business-information',
            [SellerController::class, 'businessInformation']
        )->name('businessInformation');


        Route::get(
            'business-address',
            [SellerController::class, 'businessAddress']
        )->name('business-address');


        Route::get(
            'my-order',
            [OrderController::class, 'myorder']
        )->name('my-order');

        Route::get(
            'business-address-edit/{id}',
            [SellerController::class, 'businessAddressEdit']
        )->name('business-address-edit');

        Route::get(
            'business-address-delete/{id}',
            [SellerController::class, 'businessAddressDelete']
        )->name('business-address-delete');

        // Route::any ( '/search-address',  
        // [SellerController::class, 'searchAddress']
        // )->name('search-address');

        Route::get(
            'add-product',
            [ProductController::class, 'index']
        )->name('add-product');
        Route::get(
            'my-upload-product',
            [ProductController::class, 'myUploadProduct']
        )->name('myUploadProduct');
        Route::post(
            'my-upload-product-list',
            [ProductController::class, 'myUploadProductPost']
        )->name('myUploadProduct.post');
        Route::get(
            'bids-placed',
            [ProductController::class, 'bidsPlaced']
        )->name('bidsPlaced');
        Route::get(
            'account-setting',
            [CommonController::class, 'accountSetting']
        )->name('accountSetting');

        Route::post(
            '/save-change-password',
            [
                CommonController::class,
                'saveChangePassword'
            ]
        )->name('save/password');

        Route::post(
            '/update-profile',
            [
                UserController::class,
                'updateProfile'
            ]
        )->name('updateProfile');

        Route::post(
            'add-business',
            [CommonController::class, 'addBusiness']
        )->name('addBusiness');

        Route::post(
            'add-product',
            [ProductController::class, 'addProduct']
        )->name('addProduct');


        Route::get(
            'rfq-list',
            [RfqController::class, 'rfq_list']
        )->name('rfq_list');

        Route::post(
            'rfq-list-list',
            [RfqController::class, 'rfq_list_post']
        )->name('rfq_list_post');

        Route::get(
            'wallet',
            [WalletController::class, 'wallet']
        )->name('wallet');


        Route::get(
            'refund_request',
            [ProductController::class, 'refund_request']
        )->name('refund-request');



        // Seller panel End 

        // Buyer panel start


        Route::get(
            'buyer-dashboard',
            [BuyerController::class, 'dashboard']
        )->name('buyer.dashboard');

        Route::get(
            'buyer_personal_details',
            [BuyerController::class, 'buyer_personal_details']
        )->name('buyerPersonalDetails');

        Route::get(
            'favorite_product',
            [BuyerController::class, 'favorite_product']
        )->name('favoriteProduct');

        Route::get(
            'buyer_bids_placed',
            [BuyerController::class, 'buyer_bids_placed']
        )->name('buyer.bidsPlaced');


        Route::get(
            'purchase_history',
            [BuyerController::class, 'purchase_history']
        )->name('buyer.purchaseHistory');

        Route::get(
            'delivery-area',
            [BuyerController::class, 'delivery_area']
        )->name('buyer.deliveryArea');

        Route::get(
            'buyer-account-setting',
            [BuyerController::class, 'buyer_account_setting']
        )->name('buyer.buyerAccountSetting');

        // Buyer panel end

    }
);
