<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukLayanan extends Model
{
    public function katLayanan(){
    	return $this->belongsTo('App\KatLayanan');
    }

    public function layananDetail(){
    	return $this->hasMany('App\LayananDetail');
    }

    protected $guarded = ['id'];
}
