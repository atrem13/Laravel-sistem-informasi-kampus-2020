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

Route::get('/template', function () {
    return view('layout.template');
})->name('testOI');
Route::get('/', 'DashboardController@index')->name('dashboard');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('dosen', 'DosenController')->middleware('auth');
Route::resource('mahasiswa','MahasiswaController')->middleware('auth');
Route::resource('prodi', 'ProdiController')->middleware('auth');
Route::resource('matakuliah', 'MatakuliahController')->middleware('auth');
Route::resource('ruangan', 'RuanganController')->middleware('auth');
Route::resource('hari', 'HariController')->middleware('auth');
Route::resource('jadwal-kuliah', 'JadwalKuliahController')->middleware('auth');
Route::resource('krs', 'KrsController')->middleware('auth');
Route::group(['prefix' => 'krs-detail', 'middleware'=>'auth'], function() {
    Route::get('/{id}', 'KrsDetailController@create')->name('krs-detail.create');
    Route::post('/store', 'KrsDetailController@store')->name('krs-detail.store');
    Route::delete('/cancel/{id}', 'KrsDetailController@cancel')->name('krs-detail.cancel');
});

Route::group(['prefix' => 'khs', 'middleware'=>'auth'], function() {
    Route::get('/', 'KhsController@index')->name('khs.index');
    Route::get('/create','KhsController@create')->name('khs.create');
    Route::post('/store', 'KhsController@store')->name('khs.store');
    Route::get('/show-detail/{id}', 'KhsController@showDetail')->name('khs.showDetail');
    Route::put('/update-detail/{id}', 'KhsController@updateDetail')->name('khs.updateDetail');
    Route::delete('/destroy/{id}', 'KhsController@destroy')->name('khs.destroy');
});

