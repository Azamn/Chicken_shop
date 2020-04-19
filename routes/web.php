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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin/dashboard','AdminController@dashboard');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/dashboard','AdminController@dashboard');
    Route::resource('/merchant','MerchantController');

    Route::resource('/product','ProductController');

});





