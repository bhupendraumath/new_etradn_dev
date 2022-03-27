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
    WalletController,
    BidController,
    RefundController,
    AddressController,
    FavProductController,
    PurchaseController,
    CartController
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

Route::get(
    'shopping-cart',
    [CartController::class, 'shoppingcart']
)->name('shopping-cart');

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


route::get('acept-rfq-request/{id}',[RfqController::class, 'requestAcept']
)->name('acept-rfq-request');

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
            'delivery-areas',
            [AddressController::class, 'delivery_areas']
        )->name('delivery-areas');

        Route::post(
            'delivery-areas-post',
            [AddressController::class, 'delivery_areas_post']
        )->name('delivery-areas-post');


        Route::post(
            'delivery-areas-post-buyer',
            [AddressController::class, 'delivery_areas_post_buyer']
        )->name('delivery-areas-post-buyer');

        Route::get(
            'business-information',
            [SellerController::class, 'businessInformation']
        )->name('businessInformation');

        Route::get(
            'add-delivery-area',
            [AddressController::class, 'addDeliveryArea']
        )->name('add-delivery-area');

        Route::get(
            'add-delivery-area-buyer',
            [AddressController::class, 'addDeliveryAreaBuyer']
        )->name('add-delivery-area-buyer');


        Route::get(
            'business-address',
            [SellerController::class, 'businessAddress']
        )->name('business-address');

        Route::get(
            'edit-address/{id}',
            [SellerController::class, 'editBusinessAddress']
        )->name('edit-address');

        Route::get(
            'my-order',
            [OrderController::class, 'myorder']
        )->name('my-order');

        Route::get(
            'my-parchase-history',
            [PurchaseController::class, 'parchaseHistory']
        )->name('parchaseHistory');

        Route::get(
            'business-address-edit/{id}',
            [SellerController::class, 'businessAddressEdit']
        );


        Route::get(
            'delivery-address-edit/{id}',
            [addressController::class, 'businessAddressEdit']
        );


        Route::get(
            'delivery-address-edit-buyer/{id}',
            [addressController::class, 'businessAddressEditBuyer']
        );
        
        Route::get(
            'business-address-delete/{id}',
            [SellerController::class, 'businessAddressDelete']
        )->name('business-address-delete');

        Route::post(
            'refund_request_list_post',
            [RefundController::class, 'refund_request_list_post']
        )->name('refund_request_list_post');

        Route::post(
            'create-refund-request',
            [RefundController::class, 'createRequest']
        )->name('createRequest');


        Route::get(
            'edit-details-refund/{id}',
            [RefundController::class, 'edit_details_refund']
        )->name('edit_details_refund');



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

        Route::POST(
            'cart-listing',
            [CartController::class, 'cartListing']
        )->name('cartListing');


        Route::POST(
            'cart-edit',
            [CartController::class, 'cartEdit']
        )->name('cartEdit');

        Route::POST(
            'cart-delete',
            [CartController::class, 'cartDelete']
        )->name('cartDelete');

        Route::POST(
            'cart-add',
            [CartController::class, 'cartAdd']
        )->name('cartAdd');

        Route::post(
            'my-fav-product-list',
            [FavProductController::class, 'myUploadProductPost']
        )->name('myFavProductList.post');
        
        Route::get(
            'add-in-fav-list/{product_id}/{paqid}/{favid}',
            [FavProductController::class, 'addInFavList']
        )->name('addInFavList');

        Route::post(
            'purchase-history-list-post',
            [PurchaseController::class, 'purchaseHistoryListPost']
        )->name('purchaseHistoryList');


        Route::get(
            'delete-favorite/{fav_id}',
            [FavProductController::class, 'deleteFavorite']
        )->name('deleteFavorite');

        Route::get(
            'all-delete-favorite',
            [FavProductController::class, 'allDeleteFavorite']
        )->name('allDeleteFavorite');

        Route::post(
            'BidPlacePost',
            [BidController::class, 'BidPlacePost']
        )->name('BidPlacePost');

        Route::get(
            'view-details-bids/{id}',
            [BidController::class, 'view_details_bids']
        )->name('view_details_bids');


        Route::get(
            'bids-placed',
            [BidController::class, 'bidsPlaced']
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
            'uploadedEdit/{id}',
            [ProductController::class, 'uploadedEdit']
        )->name('uploadedEdit');

        Route::get(
            'uploadedDelete/{id}',
            [ProductController::class, 'uploadedDelete']
        )->name('uploadedDelete');



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
