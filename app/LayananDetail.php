<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananDetail extends Model
{
    public function produkLayanan(){
    	return $this->belongsTo('App\ProdukLayanan');
    }

    public function Layanan(){
    	return $this->belongsTo('App\Layanan');
    }

    protected $guarded = ['id'];
}
