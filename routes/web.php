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
    Route::get('changeStatus','ProductController@changeStatus')->name('change.status');

});







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/merchant','Auth\LoginController@showMerchantLoginForm');
Route::post('/login/merchant','Auth\LoginController@merchantLogin');

Route::view('/merchant','merchant');
