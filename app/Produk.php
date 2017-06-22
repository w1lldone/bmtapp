<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    public function lapak(){
    	return $this->belongsTo('App\Lapak');
    }

    public function kategori_produk(){
    	return $this->belongsTo('App\KategoriProduk');
    }

    public function review(){
    	return $this->hasMany('App\Review');
    }

    public function keranjang(){
        return $this->hasMany('App\Keranjang');
    }

    public function orderDetail(){
        return $this->hasMany('App\OrderDetail');
    }

    public function terjual(){
        return $this->terjual = $this->orderDetail()->count();
    }

    public function addReview(){
        return $this->review()
            ->create(request([
                'nasabah_id',
                'rating',
                'review',
            ]));
    }

    // protected $hidden=['nasabah_id'];
    protected $guarded=['id'];
}
