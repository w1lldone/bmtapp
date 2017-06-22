<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Uploader;

class Lapak extends Model
{
    public function nasabah(){
    	return $this->belongsTo('App\Nasabah');
    }

    public function orderDetail(){
        return $this->hasManyThrough('App\OrderDetail', 'App\Produk');
    }

    public function produk(){
    	return $this->hasMany('App\Produk');
    }

    public function addProduk(){
    	$produk = $this->produk()->create([
    		'name' => request('name'), 
    		'kategori_produk_id' => request('kategori_produk_id'), 
    		'unit' => request('unit'), 
    		'harga' => request('harga'),
    		'deskripsi' => request('deskripsi'),
    		'stok' => request('stok'),
    		'view' => 0,
    		'aktif' => 1,
            'rating' => 4,
            'antar' => request('antar'),
		]);

		if(!empty(request()->file('foto1'))){
			$location = $this->nasabah->id;
			$path = Uploader::upload('foto1', "$location/produk");
			$produk->update(['foto1' => $path]);
		}

        if(!empty(request()->file('foto2'))){
            $location = $this->nasabah->id;
            $path = Uploader::upload('foto2', "$location/produk");
            $produk->update(['foto2' => $path]);
        }

        if(!empty(request()->file('foto3'))){
            $location = $this->nasabah->id;
            $path = Uploader::upload('foto3', "$location/produk");
            $produk->update(['foto3' => $path]);
        }

        return $produk;

    }

    protected $guarded=['id'];
    protected $fillable=['name', 'alamat', 'foto'];
}
