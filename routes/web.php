<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    HomeController,
    UserController,
    ProductController,
    SellerController,
    CommonController,
    BuyerController
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

// view('fontend/blog-details');
// blog-details

// Auth::routes();
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');

Route::post(
    '/product-list',
    [ProductController::class, 'detailedlist']
)->name('product.detailedlist');


Route::get(
    'sign-in',
    [LoginController::class, 'loginForm']
)->name('login');


Route::post(
    'loginAction',
    [LoginController::class, 'loginAction']
)->name('loginAction');

Route::post(
    '/logout',
    [LoginController::class, 'logout']
)->name('logout');
Route::get(
    'sign-up',
    [UserController::class, 'index']
)->name('registration');

Route::post(
    'registrationAction',
    [UserController::class, 'registrationAction']
)->name('registrationAction');

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
            'add-product',
            [ProductController::class, 'index']
        )->name('add-product');
        Route::get(
            'my-upload-product',
            [ProductController::class, 'myUploadProduct']
        )->name('myUploadProduct');
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
