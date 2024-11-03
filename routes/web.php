<?php

use App\Http\Controllers\AuthController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/product', function () {
    return view('product');
});



Route::get('/contact', function () {
    return view('contact');
});

Route::middleware('auth')->group(function () {

    Route::get('/wishlist', function () {
        return view('wishlist');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function (){
    Route::get('/login', function () {return view('login');})->name('login');

    Route::post('/login/submit-reg', [AuthController::class,'submitRegistration'])->name('registration.submit');

    Route::post('/login/submit-login', [AuthController::class,'submitLogin'])->name('login.submit');
});



// Route::get('/login', [
// AuthController::class,'showRegistration'
// ])->name('registration.show');





