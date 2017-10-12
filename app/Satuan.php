<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
	protected $fillable = ['name'];
    /*REALTIONS*/

    public function produk(){
    	return $this->hasMany('App\Produk');
    }
}
