<?php

use App\Http\Controllers\FirstController;
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
/* Login */
Route::get('/', function () {
    return view('login');
});

Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');
/*Table typeproduct */
Route::get('/typeproduct','TypeproductController@index');
Route::post('/instypeproduct','TypeproductController@store' );
Route::post('/edittypeproduct/{id}','TypeproductController@update' );
Route::post('/deltypeproduct/{id}',  'TypeproductController@destroy');
/*Table product */
Route::get('/product','ProductController@index');
Route::post('/insproduct','ProductController@store' );
Route::post('/editproduct/{id}','ProductController@update' );
Route::post('/delproduct/{id}',  'ProductController@destroy');
/*index */
Route::get('/index','IndexController@index');

/*user*/
Route::get('/user','UserController@index');
Route::post('/insuser','UserController@store');
Route::post('/edituser/{id}','UserController@update' );
Route::post('/deluser/{id}','UserController@destroy' );

Route::get('/stockin','StockinController@index');
Route::post('/insstockin','StockinController@store');
Route::post('/editstockin/{id}','StockinController@update');
Route::post('/delstockin/{id}','StockinController@destroy' );

Route::get('/stockout','StockoutController@index');
Route::post('/insstockout','StockoutController@store');
Route::post('/editstockout/{id}','StockoutController@update');
Route::post('/delstockout/{id}','StockoutController@destroy' );



