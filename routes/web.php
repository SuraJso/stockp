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

Route::get('/', function () {
    return view('login');
});
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
