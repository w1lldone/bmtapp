<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    /*REALTIONS*/

    public function produk(){
    	return $this->hasMany('App\Produk');
    }
}
