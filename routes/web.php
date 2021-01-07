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

Route::get('/index', 'CartController@index');
Route::get('/chitietsanpham/{id}', 'CartController@getChiTiet');
Route::get('/AddCart/{id}', 'CartController@AddCart');
Route::get('/DeleteCart/{id}', 'CartController@DeleteCart');
Route::get('/listCart', 'CartController@viewList');
Route::get('/DeleteCart-List/{id}', 'CartController@DeleteListCart');
Route::get('/SaveCart-List/{id}/{quanty}', 'CartController@SaveListCart');
Route::get('/Pay', 'CartController@Pay');

Route::get('dangnhap','UserController@getDangNhap');
Route::post('dangnhap','UserController@postDangNhap');

Route::post('register','UserController@postRegister');
Route::get('logout','UserController@getLogout');
Route::get('/dathang/{id}','CartController@getDatHang');
Route::get('/thongtindathang/{id}','CartController@getThongTin');
Route::get('/xacnhanthanhtoan/{id}','CartController@getXacNhan');
Route::get('/themthongtin/{id}','CartController@themThongTin');
Route::post('addthongtin','CartController@addThongTin');
Route::get('naptien','CartController@naptien');
Route::get('lichsunaptien','CartController@logNapTien');


