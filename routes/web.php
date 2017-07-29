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
    return redirect()->route('login');
});

Route::get('test', function () {
    $order = App\Order::first();
    event(new App\Events\OrderNotification($order));
    return $order;
});

Route::get('test-layan', function () {
    $layanan = App\Layanan::first();
    event(new App\Events\LayananNotification($layanan));
    return $layanan;
});

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->middleware('auth');

Route::get('/login', function () {
    return view('admin.login');
})->name('login')->middleware('guest');

Route::post('/login', 'SessionController@store')->middleware('guest');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['prefix' => 'setting', 'middleware' => 'auth'], function(){
    Route::get('/', 'SettingController@index')->name('setting');
    Route::put('/update', 'SettingController@update');
    Route::put('/password', 'SettingController@password');
});

Route::group(['prefix' =>  'nasabah', 'middleware' => 'auth'], function(){
	Route::get('/', 'NasabahController@index')->name('nasabah');
	Route::post('/cek', 'TabungBUController@view');
    Route::get('/cek', 'NasabahController@create')->name('cek_rekening');
    Route::get('/create', 'NasabahController@create');
	Route::post('/create', 'NasabahController@store');
    Route::get('/{nasabah}/edit', 'NasabahController@edit');
    Route::put('/{nasabah}', 'NasabahController@update');
    Route::delete('/{nasabah}', 'NasabahController@destroy');
    Route::put('/username/{nasabah}', 'NasabahController@upUsername');
    Route::put('/password/{nasabah}', 'NasabahController@upPassword');
});

Route::group(['prefix' => 'transaksi', 'middleware' => 'auth'], function(){
    Route::get('/', 'TransaksiController@index')->name('transaksi');
    Route::get('/diproses', 'TransaksiProsesController@index')->name('transaksi.diproses');
    Route::get('/selesai', 'TransaksiSelesaiController@index')->name('transaksi.selesai');
    Route::get('/{kodetrans}', 'TransaksiController@view')->name('transaksi.detail');
    Route::post('/{transaksi}/bayar', 'TransaksiController@bayar');
    Route::put('/{transaksi}/batal', 'TransaksiController@batal');
    Route::post('/{transaksi}/selesai', 'TransaksiController@selesai');
});

Route::group(['prefix' => 'layanan', 'middleware' => 'auth'], function(){
    Route::get('/', 'LayananController@index')->name('layanan');
    Route::get('/selesai', 'LayananSelesaiController@index')->name('layanan.finished');
    Route::get('/{kodelayan}', 'LayananController@view')->name('layanan.detail');
    Route::post('/{layanan}/selesai', 'LayananController@selesai');
    Route::post('/{layanan}/bayar', 'LayananController@bayar');
    Route::post('/{layanan}/batal', 'LayananController@batal');
});

Route::group(['prefix' =>  'kategori', 'middleware' => 'auth'], function(){
    Route::get('/', 'KategoriProdukController@index')->name('kategori');
    Route::post('/produk', 'KategoriProdukController@store');
    Route::get('produk/{kategori}/edit', 'KategoriProdukController@edit');
    Route::post('produk/{kategori}', 'KategoriProdukController@update');
    Route::delete('produk/{kategori}', 'KategoriProdukController@destroy');

    Route::get('/layanan/create', 'KategoriLayananController@create');
    Route::post('/layanan', 'KategoriLayananController@store');
    Route::delete('/layanan/{produk}', 'KategoriLayananController@destroy');
    Route::get('/layanan/{produk}/edit', 'KategoriLayananController@edit');
    Route::put('/layanan/{produk}', 'KategoriLayananController@update');
});

Route::group(['prefix' => 'biaya', 'middleware' => 'auth'], function(){
    Route::get('/', 'BiayaController@create');
    Route::post('/', 'BiayaController@store');
});

Route::group(['prefix' => 'reminder', 'middleware' => 'auth'], function(){
    Route::get('/', 'ReminderController@index');
    Route::post('/', 'ReminderController@store');
    Route::get('/create', 'ReminderController@create');
});

Route::group(['prefix' => 'ajax'], function(){
	Route::get('/order', 'AjaxController@order');
});