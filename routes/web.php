<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/store-user-information', [App\Http\Controllers\HomeController::class, 'storeUserInfo'])->name('store_user_information');

Route::post('/store-recipient', [App\Http\Controllers\HomeController::class, 'storeRecipient'])->name('store_recipient');
