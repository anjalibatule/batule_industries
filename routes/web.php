<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CompanyController;


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
       Route::get('search_name',[ViewController::class,'search_name'])->name('search_name');

       //company page
        Route::get('/company_details',[CompanyController::class,'getCompanyDetails'])->name('company');
        Route::get('search_company_name',[ViewController::class,'search_company_name'])->name('search_company_name');
        Route::get('/add_company',[CompanyController::class,'add_company'])->name('add_company');
        Route::get('/update_company/{id}',[CompanyController::class,'update_company'])->name('update_company');
        Route::delete('company_details/delete_company/{id}',[CompanyController::class,'delete_company'])->name('delete_company');
        Route::post('/add_company/store_company_details',[CompanyController::class,'store_company_details'])->name('store_company_details');
        Route::post('/update_company/{id}/update_company_details',[CompanyController::class,'update_company_details'])->name('update_company_details');

//      


});




