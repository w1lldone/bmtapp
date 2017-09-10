<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRoom extends Model
{
	public function admin_chat(){
		return $this->hasMany('App\AdminChat');
	}
    
    protected $guarded = ['id'];
}
