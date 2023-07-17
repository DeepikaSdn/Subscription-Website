<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubscriptionTypeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Customer\LandingPageController;

use App\Http\Controllers\StoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend/landingpage');

//    // return view('welcome');
// });

Route::get('/',[App\Http\Controllers\Customer\LandingPageController::class,'index']);
Route::get('register-customer', [App\Http\Controllers\Customer\Auth\RegisterController::class, 'showRegisterForm'])->name('register-customer');
Route::post('stripe', [StripeController::class, 'stripe'])->name('stripe');
Route::get('success', [StripeController::class, 'success'])->name('success');
Route::get('cancel', [StripeController::class, 'cancel'])->name('cancel');
Route::any('webhook', [StripeController::class, 'webhook'])->name('webhook');
Route::get('customer-login', [App\Http\Controllers\Customer\Auth\LoginController::class, 'showLoginForm'])->name('customer-login');
Route::post('loginSubmit', [App\Http\Controllers\Customer\Auth\LoginController::class, 'login'])->name('loginsubmit');
Route::get('stories', [StoriesController::class, 'liststories'])->name('stories');
Route::get('customer-logout', [App\Http\Controllers\Customer\Auth\LoginController::class, 'logout'])->name('customer-logout');

Auth::routes(['verify'=>true]);

Route::get('/admin-login',function(){
        return view('welcome');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('subscription_type', SubscriptionTypeController::class);
});