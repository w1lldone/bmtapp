<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    
    public function user()
    {
    	return $this->hasMany('App\User');
    }

    public function nasabah()
    {
    	return $this->hasMany('App\Nasabah');
    }

    public function order()
    {
    	return $this->hasManyThrough('App\Order', 'App\Nasabah');
    }

    protected $guarded = ['id'];
}
