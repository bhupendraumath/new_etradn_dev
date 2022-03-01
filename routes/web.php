<?php


use App\Http\Controllers\Frontend\{
    HomeController,
    UserController,
    ProductController,
    SellerController,
    CommonController
};
use App\Http\Controllers\Auth\{
    LoginController,
    ForgotPasswordController,
};

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
        dd();
    }
);

// Auth::routes();
Route::group(
    ['middleware' => ['web']],
    function () {
        Route::get(
            '/',
            [CommonController::class, 'home']
        )->name('home');
        Route::get(
            '/sign-in',
            [LoginController::class, 'loginForm']
        )->name('login');
        Route::post(
            '/loginAction',
            [LoginController::class, 'loginAction']
        )->name('loginAction');

        Route::get(
            '/sign-up',
            [UserController::class, 'index']
        )->name('registration');

        Route::post(
            '/registrationAction',
            [UserController::class, 'registrationAction']
        )->name('registrationAction');

        Route::get(
            '/about-us',
            [HomeController::class, 'about']
        )->name('about');

        Route::get(
            '/contact-us',
            [HomeController::class, 'contactUs']
        )->name('contact');

        Route::get(
            '/product-details',
            [ProductController::class, 'show']
        )->name('product.details');

        Route::group(
            ['middleware' => 'user:web'],
            function () {
                Route::get(
                    '/dashboard',
                    [SellerController::class, 'dashboard']
                )->name('seller.dashboard');
                Route::get(
                    '/person-information',
                    [CommonController::class, 'personInformation']
                )->name('personInformation');
                Route::get(
                    '/business-information',
                    [SellerController::class, 'businessInformation']
                )->name('businessInformation');
                Route::get(
                    '/add-product',
                    [ProductController::class, 'index']
                )->name('add-product');
                Route::get(
                    '/my-upload-product',
                    [ProductController::class, 'myUploadProduct']
                )->name('myUploadProduct');
                Route::get(
                    '/bids-placed',
                    [ProductController::class, 'bidsPlaced']
                )->name('bidsPlaced');
                Route::get(
                    '/account-setting',
                    [CommonController::class, 'accountSetting']
                )->name('accountSetting');
                Route::get(
                    '/logout',
                    [LoginController::class, 'logout']
                )->name('logout');
            }
        );
    }
);
