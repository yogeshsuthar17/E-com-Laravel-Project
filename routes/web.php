<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\CustomerRegistrationController;
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
    return view('login.create');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('dashboard'); // This middleware will responible to send the email verification.


// Registration
Route::get('registration', 'AdminRegistrationController@create')->name('registration.create');
Route::post('registration', 'AdminRegistrationController@store')->name('registration.store');


// Login
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

// Subcategories
Route::get('/get-subcategories', 'ProductController@getSubcategories')->name('getSubcategories');

// Product
Route::resource('product', 'ProductController');

// Category
Route::resource('category', 'CategoryController');

//Sub-category
Route::resource('subcategory', 'SubcategoryController');