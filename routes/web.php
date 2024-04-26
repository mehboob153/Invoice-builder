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
    if (Auth::check()) {
        return redirect()->route('invoices');
    } else {
        return redirect('/login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/store-user-information', [App\Http\Controllers\HomeController::class, 'storeUserInfo'])->name('store_user_information');

Route::post('/store-recipient', [App\Http\Controllers\HomeController::class, 'storeRecipient'])->name('store_recipient');

Route::post('/save-invoice', [App\Http\Controllers\InvoiceController::class, 'storeInvoice'])->name('store_invoice');

Route::post('/save-invoice-detail', [App\Http\Controllers\InvoiceController::class, 'storeInvoiceDetail'])->name('store_invoice_detail');

Route::post('/download-invoice', [App\Http\Controllers\InvoiceController::class,'downloadInvoice'])->name('download_invoice');

Route::get('/account-settings', [App\Http\Controllers\HomeController::class, 'accountSettings'])->name('account_settings');

Route::get('/invoice-builder/invoices', [App\Http\Controllers\HomeController::class, 'invoices'])->name('invoices');

Route::get('/invoice-builder/invoice-details', [App\Http\Controllers\InvoiceController::class, 'invoiceDetails'])->name('invoice-details');

Route::get('/invoice-builder/clients', [App\Http\Controllers\HomeController::class, 'clients'])->name('clients');

Route::get('/invoice-builder/add-client', [App\Http\Controllers\HomeController::class, 'addClient'])->name('add-client');

Route::post('/duplicate-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'duplicateInvoice'])->name('duplicate_invoice');

Route::delete('/delete-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'deleteInvoice'])->name('delete_invoice');

Route::post('/update-user-information', [App\Http\Controllers\InvoiceController::class, 'updateUserInfo'])->name('update_user_information');

Route::get('/view-client-invoices/{id}', [App\Http\Controllers\HomeController::class, 'viewClientInvoices'])->name('view-client-invoices');

Route::delete('/delete-client/{id}', [App\Http\Controllers\InvoiceController::class, 'deleteClient'])->name('delete_client');








