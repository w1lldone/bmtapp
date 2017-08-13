<?php

use Illuminate\Http\Request;

Route::get('test', function () {
    event(new App\Events\StatusLiked('Guest'));
    return "Event has been sent!";
});

Route::resource('nasabah', 'Api\NasabahController');

Route::group(['prefix' => 'lapak'], function(){
	Route::get('/{nasabah}', 'Api\LapakController@view');
	Route::put('/{nasabah}', 'Api\LapakController@update');
	Route::post('/foto/{nasabah}', 'Api\LapakController@updatefoto');
});

Route::get('/saldo/{tabung}', 'Api\SaldoController@view');

Route::post('foto/{nasabah}', 'Api\NasabahFotoController@update');
Route::post('/link', 'Api\NasabahFotoController@link');


Route::post('login', 'Api\LoginController@store');
Route::post('logout', 'Api\LoginController@destroy');

Route::group(['prefix' => 'produk'], function(){
	Route::get('/{lapak}', 'Api\ProdukController@index');
	Route::post('/{lapak}', 'Api\ProdukController@store');
	Route::get('/{produk}/edit', 'Api\ProdukController@edit');
	Route::post('/{produk}/edit', 'Api\ProdukController@update');
	Route::get('/view/{produk}', 'Api\ProdukController@view');
	Route::put('/{produk}/aktif', 'Api\ProdukAktifController@update');
});

Route::group(['prefix' => 'order'], function(){
	Route::post('/{nasabah}', 'Api\OrderController@store');
	Route::get('/{order}', 'Api\OrderController@view');
	Route::delete('/{orderDetail}/delete', 'Api\OrderDetailController@destroy');
	Route::put('/{order}', 'Api\OrderController@update');
});

Route::group(['prefix' => 'kategori'], function(){
	Route::get('/', 'Api\KategoriController@index');
	Route::get('/produk', 'Api\KategoriController@view');
});

Route::group(['prefix' => 'keranjang'], function(){
	Route::post('/{nasabah}', 'Api\KeranjangController@store');
	Route::put('/{keranjang}/edit', 'Api\KeranjangController@update');
	Route::get('/{nasabah}', 'Api\KeranjangController@view');
	Route::delete('/{keranjang}', 'Api\KeranjangController@destroy');
});

Route::group(['prefix' => 'pembelian'], function(){
	Route::get('/{nasabah}', 'Api\PembelianController@index');
	Route::get('/{order}/view', 'Api\PembelianController@view');
	Route::put('/terima/{orderDetail}', 'Api\PembelianController@terima');
});

Route::group(['prefix' => 'penjualan'], function(){
	Route::get('/{lapak}', 'Api\PenjualanController@index');
	Route::get('/{orderDetail}/view', 'Api\PenjualanController@show');
	Route::put('/sedia/{orderDetail}', 'Api\PenjualanController@update');
	Route::put('/siap/{orderDetail}', 'Api\PenjualanController@siap');
});

Route::group(['prefix' => 'layanan'], function(){
	Route::get('/{nasabah}', 'Api\LayananController@index');
	Route::get('/{layanan}/view', 'Api\LayananController@view');
	Route::get('/produk/{katLayanan}', 'Api\ProdukLayananController@index');
});

Route::group(['prefix' => 'bayar'], function(){
	Route::post('/{nasabah}', 'Api\BayarLayananController@store');
});

Route::group(['prefix' => 'agenda'], function(){
	Route::get('/', 'Api\AgendaController@index');
});

Route::group(['prefix' => 'review'], function(){
	Route::get('/{produk}', 'Api\ReviewController@view');
	Route::post('/{produk}', 'Api\ReviewController@store');
});

Route::group(['prefix' => 'news'], function(){
	Route::get('/', 'Api\NewsController@index');
});

Route::group(['prefix' => 'search'], function(){
	Route::get('/produk', 'Api\SearchProdukController@index');
});

Route::post('/notification', 'Api\NotificationController@view');