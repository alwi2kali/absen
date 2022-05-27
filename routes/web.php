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

//Route::get('/', function () {
//    return view('welcome');
//});
//
    Route::middleware('admin_check')->group(function (){
    Route::get('/staf','StafController@index')->name('staf');
    Route::get('/staf/absen','StafController@absen')->name('absen');
    Route::get('/staf/lokasi','StafController@lokasi')->name('staf.lokasi');
    Route::get('/staf/shift','StafController@shift')->name('staf.shift');
    Route::post('/staf/lokasi/store','StafController@store_lokasi')->name('store.lokasi');
    Route::post('/staf/lokasi/update','StafController@update_lokasi')->name('update.lokasi');
    Route::get('/staf/lokasi/delete{id}','StafController@delete_lokasi')->name('delete.lokasi');

    Route::post('/staf/shift/store','StafController@store_shift')->name('store.shift');
    Route::get('/staf/shift/update','StafController@update_shift')->name('update.shift');
    Route::get('/staf/shift/delete{id}','StafController@delete_shift')->name('delete.shift');


});
Route::middleware('user_check')->group(function (){

    Route::get('/user','UserController@index')->name('user');
    Route::post('/user/absen_masuk','UserController@absen_masuk')->name('user.absen_masuk');
    Route::post('/user/absen_pulang','UserController@absen_pulang')->name('user.absen_pulang');
});


Route::get('/login','LoginController@index')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');
Route::get('/register','RegisterController@index')->name('register');
Route::post('/store_register','RegisterController@register')->name('store_register');
Route::post('/verify','LoginController@verify')->name('verify');

Route::post('/store_register','RegisterController@register')->name('store_register');
Route::get('/register_dummy','LoginController@register_dummy')->name('register_dummy');
