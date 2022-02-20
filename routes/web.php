<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    HomeController
};
use App\Http\Controllers\Auth\{
    LoginController,
    ForgotPasswordController
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
        dd();
    }
);

// Auth::routes();
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');
Route::get(
    'sign-in',
    [LoginController::class, 'loginForm']
)->name('login');