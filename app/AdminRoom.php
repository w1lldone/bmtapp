<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRoom extends Model
{
	public function admin_chat(){
		return $this->hasMany('App\AdminChat');
	}

	public function nasabah(){
		return $this->belongsTo('App\Nasabah');
	}
    
    protected $guarded = ['id'];
}
