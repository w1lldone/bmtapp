<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KatLayanan extends Model
{
    public function produkLayanan(){
    	return $this->hasMany('App\ProdukLayanan');
    }

    protected $guarded = ['id'];
}
