<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    
	public function produk(){
		$this->hasMany('App\Produk');
	}

    protected $guarded=['id'];
}
