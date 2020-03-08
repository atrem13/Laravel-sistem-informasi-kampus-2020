<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('dosen', 'DosenController');
Route::resource('mahasiswa','MahasiswaController');
Route::resource('prodi', 'ProdiController');
Route::resource('matakuliah', 'MatakuliahController');
Route::resource('ruangan', 'RuanganController');
Route::resource('hari', 'HariController');
Route::resource('jadwal-kuliah', 'JadwalKuliahController');
Route::resource('krs', 'KrsController');
Route::group(['prefix' => 'krs-detail'], function() {
    Route::get('/{id}', 'KrsDetailController@create')->name('krs-detail.create');
    Route::post('/store', 'KrsDetailController@store')->name('krs-detail.store');
    Route::delete('/cancel/{id}', 'KrsDetailController@cancel')->name('krs-detail.cancel');
});

Route::group(['prefix' => 'khs'], function() {
    Route::get('/', 'KhsController@index')->name('khs.index');
    Route::get('/create','KhsController@create')->name('khs.create');
    Route::post('/store', 'KhsController@store')->name('khs.store');
    Route::get('/show-detail/{id}', 'KhsController@showDetail')->name('khs.showDetail');
    Route::put('/update-detail/{id}', 'KhsController@updateDetail')->name('khs.updateDetail');
    Route::delete('/destroy/{id}', 'KhsController@destroy')->name('khs.destroy');
});


