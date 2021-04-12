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

Route::get('/login', 'LoginController@showFormLogin')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('register', 'LoginController@showFormRegister')->name('register');
Route::post('register', 'LoginController@register');

Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'LoginController@logout')->name('logout');
 
});

//Data Mobil
Route::get('/mobil',              'MobilController@index')->name('mobil.index');
Route::get('/mobil/create',       'MobilController@create')->name('mobil.create');
Route::post('/mobil/store',       'MobilController@store')->name('mobil.store');
Route::get('/mobil/{id}/edit',    'MobilController@edit')->name('mobil.edit');
Route::put('/mobil/{id}',         'MobilController@update')->name('mobil.update');
Route::get('/mobil/{id}',         'MobilController@show')->name('mobil.show');
Route::delete('/mobil/destroy',   'MobilController@destroy')->name('mobil.destroy');

//Data Penjualan
Route::get('/penjualan',              'PenjualanController@index')->name('penjualan.index');
Route::get('/penjualan/create',       'PenjualanController@create')->name('penjualan.create');
Route::post('/penjualan/store',       'PenjualanController@store')->name('penjualan.store');
Route::get('/penjualan/{id}/edit',    'PenjualanController@edit')->name('penjualan.edit');
Route::get('/penjualan/{id}/invoice',         'PenjualanController@invoice')->name('penjualan.invoice');
Route::put('/penjualan/{id}',         'PenjualanController@update')->name('penjualan.update');
Route::get('/penjualan/info',         'PenjualanController@info')->name('penjualan.info');
Route::delete('/penjualan/destroy',   'PenjualanController@destroy')->name('penjualan.destroy');