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

Route::post('/save-invoice', [App\Http\Controllers\InvoiceController::class, 'storeInvoice'])->name('store_invoice');

Route::post('/save-invoice-detail', [App\Http\Controllers\InvoiceController::class, 'storeInvoiceDetail'])->name('store_invoice_detail');

Route::post('/download-invoice', [App\Http\Controllers\InvoiceController::class,'downloadInvoice'])->name('download_invoice');

Route::get('/invoice-builder', [App\Http\Controllers\Controller::class, 'guestPage'])->name('guest_page');

Route::get('/account-settings', [App\Http\Controllers\HomeController::class, 'accountSettings'])->name('account_settings');

Route::get('/InvoiceBuilder/Invoices', [App\Http\Controllers\HomeController::class, 'invoices'])->name('invoices');

Route::get('/InvoiceBuilder/InvoiceDetails', [App\Http\Controllers\HomeController::class, 'invoiceDetails'])->name('invoice-details');

Route::get('/InvoiceBuilder/Clients', [App\Http\Controllers\HomeController::class, 'clients'])->name('clients');

Route::get('/InvoiceBuilder/addClient', [App\Http\Controllers\HomeController::class, 'addClient'])->name('add-client');



