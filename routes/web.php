<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\iphone;
use App\Http\Controllers\transaction;
use Illuminate\Support\Facades\Route;

Route::get('/', [iphone::class, 'home'])->name('home');
// Route::get('/', function(){return view('home');})->name('home');

// Route::get('/product', function () {
//     return view('product');
// });

Route::get('/product', [iphone::class, 'index'])->name('product');
Route::get('/product/detail/{id}', [iphone::class, 'productDetail'])->name('productDetail');

Route::get('/contact', function () {return view('contact');});

Route::middleware('auth')->group(function () {

    Route::get('/product/detail', function () {return view('product_detail');});

    //user profile
    Route::get('/user/profile', [AuthController::class, 'userProfile'])->name('userProfile');
    Route::post('/user/edit/save/{id}', [AuthController::class, 'userEditSave'])->name('userEditSave');

    //manage users
    Route::get('manage/user', [AuthController::class, 'manageUser'])->name('manageUser');
    Route::post('manage/user/edit/{id}', [AuthController::class, 'manageUserEdit'])->name('manageUserEdit');
    Route::post('manage/user/delete/{id}', [AuthController::class, 'manageUserDelete'])->name('manageUserDelete');
    Route::delete('manage/user/delete/selected', [AuthController::class, 'manageUserDeleteSelected'])->name('manageUserDeleteSelected');
    Route::post('manage/user/add', [AuthController::class, 'manageUserAdd'])->name('manageUserAdd');
    
    //manage models
    Route::get('manage/model', [iphone::class, 'manageModel'])->name('manageModel');
    Route::get('manage/model/edit/{id}', [iphone::class, 'manageModelEdit'])->name('manageModelEdit');
    Route::post('manage/model/edit/save/{id}', [iphone::class, 'manageModelEditSave'])->name('manageModelEditSave');
    Route::post('manage/model/delete/{id}', [iphone::class, 'manageModelDelete'])->name('manageModelDelete');
    Route::delete('manage/model/delete/selected', [iphone::class, 'manageModelDeleteSelected'])->name('manageModelDeleteSelected');
    Route::post('manage/model/add/{id}', [iphone::class, 'manageModelAdd'])->name('manageModelAdd');
    Route::post('manage/model/variant/color/add/{id}', [iphone::class, 'manageModelVariantColorAdd'])->name('manageModelVariantColorAdd');
    Route::post('manage/model/variant/color/delete/{id}', [iphone::class, 'manageModelVariantColorDelete'])->name('manageModelVariantColorDelete');
    Route::post('manage/model/variant/storage/add/{id}', [iphone::class, 'manageModelVariantStorageAdd'])->name('manageModelVariantStorageAdd');
    Route::post('manage/model/variant/storage/delete/{id}', [iphone::class, 'manageModelVariantStorageDelete'])->name('manageModelVariantStorageDelete');
    
    //manage variants
    Route::get('manage/variant', [iphone::class, 'manageVariant'])->name('manageVariant');
    Route::post('manage/variant/color/edit/{id}', [iphone::class, 'manageVariantColorEdit'])->name('manageVariantColorEdit');
    Route::post('manage/variant/color/delete/{id}', [iphone::class, 'manageVariantColorDelete'])->name('manageVariantColorDelete');
    Route::post('manage/variant/color/add/', [iphone::class, 'manageVariantColorAdd'])->name('manageVariantColorAdd');
    Route::post('manage/variant/storage/edit/{id}', [iphone::class, 'manageVariantStorageEdit'])->name('manageVariantStorageEdit');
    Route::post('manage/variant/storage/delete/{id}', [iphone::class, 'manageVariantStorageDelete'])->name('manageVariantStorageDelete');
    Route::post('manage/variant/storage/add/', [iphone::class, 'manageVariantStorageAdd'])->name('manageVariantStorageAdd');

    //manage unit
    Route::get('manage/unit', [iphone::class, 'manageUnit'])->name('manageUnit');
    Route::get('manage/unit/edit/{id}', [iphone::class, 'manageUnitEdit'])->name('manageUnitEdit');
    Route::post('manage/unit/edit/save/{id}', [iphone::class, 'manageUnitEditSave'])->name('manageUnitEditSave');
    Route::post('manage/unit/delete/{id}', [iphone::class, 'manageUnitDelete'])->name('manageUnitDelete');
    Route::delete('manage/unit/delete/selected', [iphone::class, 'manageUnitDeleteSelected'])->name('manageUnitDeleteSelected');
    Route::post('manage/unit/add/{id}', [iphone::class, 'manageUnitAdd'])->name('manageUnitAdd');
    Route::post('manage/unit/code/delete/{id}', [iphone::class, 'manageUnitCodeDelete'])->name('manageUnitCodeDelete');
    Route::post('manage/unit/code/add/{id}', [iphone::class, 'manageUnitCodeAdd'])->name('manageUnitCodeAdd');

    //transaction
    Route::get('/wishlist', [transaction::class, 'index']);
    Route::get('/booked', [transaction::class, 'booked'])->name('booked');
    Route::get('/bookedReturned', [transaction::class, 'bookedReturned'])->name('bookedReturned');
    Route::post('product/transaction/start', [transaction::class, 'productTransactionStart'])->name('productTransactionStart');
    Route::post('product/transaction/end{id}', [transaction::class, 'productTransactionEnd'])->name('productTransactionEnd');

    //confirmation
    Route::get('/return/request', [transaction::class, 'returnRequest'])->name('returnRequest');
    Route::post('/return/request/send{id}', [transaction::class, 'returnRequestSend'])->name('returnRequestSend');
    Route::post('/return/request/send/cancel{id}', [transaction::class, 'returnRequestSendCancel'])->name('returnRequestSendCancel');
    Route::post('/return/request/acc{id}', [transaction::class, 'returnRequestAcc'])->name('returnRequestAcc');

    //report
    Route::get('/report/rent/history', [iphone::class, 'reportRentHistory'])->name('reportRentHistory');
    Route::post('/report/rent/history/search/date', [iphone::class, 'reportRentHistorySearchDate'])->name('reportRentHistorySearchDate');
    Route::post('/report/rent/history/search/name', [iphone::class, 'reportRentHistorySearchName'])->name('reportRentHistorySearchName');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function (){
    Route::get('/login', function () {return view('login');})->name('login');
    Route::get('/register', function () {return view('register');})->name('register');

    

    Route::post('/login/submit-reg', [AuthController::class,'submitRegistration'])->name('registration.submit');

    Route::post('/login/submit-login', [AuthController::class,'submitLogin'])->name('login.submit');
});



// Route::get('/login', [
// AuthController::class,'showRegistration'
// ])->name('registration.show');





