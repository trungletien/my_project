<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
   return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.pages.dashboard.index');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin/'], function (){
    Route::resource('categories', admin\CategoryController::class);

    Route::resource('products', admin\ProductController::class);
});
