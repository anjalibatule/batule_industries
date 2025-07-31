<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PDFController;




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });
// Auth::route();


Route::view('/register','auth.register')->name('register');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('register/store',[UserController::class,'store'])->name('store');
Route::post('login/custom_login',[UserController::class,'custom_login'])->name('custom_login');

 Route::view('/',[ViewController::class,'index'])->name('home');

Route::middleware(['auth'])->group(function () {
       Route::get('/dashboard',[ViewController::class,'dashboard'])->name('dashboard');
       Route::post('/logout',[UserController::class,'logout'])->name('logout');

      //user page
       Route::get('/user',[UserController::class,'getUser'])->name('user');
       Route::get('/add_user',[UserController::class,'add_user'])->name('add_user');
       Route::post('/add_user/store',[UserController::class,'store_user'])->name('store_user');
        Route::get('/user/update_image/{id}',[UserController::class,'update_image'])->name('update_image');
       Route::get('search_name',[SearchController::class,'search_name'])->name('search_name');

       //company page
        Route::get('/company_details',[CompanyController::class,'getCompanyDetails'])->name('company');
        Route::get('search_company_name',[SearchController::class,'search_company_name'])->name('search_company_name');
         Route::get('search_inactive_company_name',[SearchController::class,'search_inactive_company_name'])->name('search_inactive_company_name');
        Route::get('/add_company',[CompanyController::class,'add_company'])->name('add_company');
        Route::get('/update_company/{id}',[CompanyController::class,'update_company'])->name('update_company');
        Route::delete('company_details/delete_company/{id}',[CompanyController::class,'delete_company'])->name('delete_company');
        Route::post('/add_company/store_company_details',[CompanyController::class,'store_company_details'])->name('store_company_details');
        Route::post('/update_company/{id}/update_company_details',[CompanyController::class,'update_company_details'])->name('update_company_details');
        Route::put('/update_company_status/{id}', [CompanyController::class, 'update_company_status'])->name('update_company_status');
        Route::get('inactive_company',[CompanyController::class,'inactive_company'])->name('inactive_company');


       //contact detail      
        Route::get('contact_detail',[ViewController::class,'contact_detail'])->name('contact_detail');
       Route::put('contact_detail/{id}/contact_update',[ViewController::class,'contact_update'])->name('contact_update');

       //sale
       Route::get('sale',[ViewController::class,'sale'])->name('sale');
       Route::get('add_invoice',[ViewController::class,'add_invoice'])->name('add_invoice');
       Route::post('add_invoice/store_invoice',[InvoiceController::class,'store_invoice'])->name('store_invoice');
       Route::get('/get-company/{id}', [InvoiceController::class, 'getCompany'])->name('getCompany');
        Route::get('search_invoice_number',[SearchController::class,'search_invoice_number'])->name('search_invoice_number');
         Route::get('invoice_update/{id}',[ViewController::class,'invoice_update'])->name('invoice_update');
         Route::put('invoice_update/{id}/store_update_invoice',[InvoiceController::class,'store_update_invoice'])->name('store_update_invoice');

         Route::get('status',[ViewController::class,'status'])->name('status');
        Route::get('payment',[ViewController::class,'payment'])->name('payment');
        Route::put('/update_status/{id}', [InvoiceController::class, 'update_status'])->name('update_status');
        Route::put('/update_payment/{id}', [InvoiceController::class, 'update_payment'])->name('update_payment');

          Route::get('inactive_status',[ViewController::class,'inactive_status'])->name('inactive_status');
          Route::get('inactive_payment',[ViewController::class,'inactive_payment'])->name('inactive_payment');
           Route::get('search_status',[SearchController::class,'search_status'])->name('search_status');
            Route::get('search_inactive_status',[SearchController::class,'search_inactive_status'])->name('search_inactive_status');
           Route::get('search_payment',[SearchController::class,'search_payment'])->name('search_payment');
           Route::get('search_inactive_payment',[SearchController::class,'search_inactive_payment'])->name('search_inactive_payment');

        //  purchase order
         Route::get('purchase_order',[ViewController::class,'purchase_order'])->name('purchase_order');
         Route::get('add_purchase',[PurchaseController::class,'add_purchase'])->name('add_purchase');
       Route::post('add_purchase/store_purchase', [PurchaseController::class, 'store_purchase'])->name('store_purchase');
         Route::get('search_purchase_number',[SearchController::class,'search_purchase_number'])->name('search_purchase_number');
         Route::get('update_purchase/{id}',[PurchaseController::class,'update_purchase'])->name('update_purchase');
       Route::put('update_purchase/{id}/edit_purchase', [PurchaseController::class, 'edit_purchase'])->name('edit_purchase');
       Route::put('/update_purchase_status/{id}', [PurchaseController::class, 'update_purchase_status'])->name('update_purchase_status');



       Route::get('/pdf-view/{id}', [PDFController::class, 'viewPDF'])->name('pdf_view');
       Route::get('/pdf-download/{id}', [PDFController::class, 'downloadPDF'])->name('pdf_download');


      //Bank detail      
        Route::get('bank_detail',[ViewController::class,'bank_detail'])->name('bank_detail');
       Route::put('bank_detail/{id}/bank_update',[ViewController::class,'bank_update'])->name('bank_update');
});











