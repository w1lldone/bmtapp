<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mku extends Model
{
	public function nasabah(){
		return $this->hasMany('App\Nasabah');
	}
	
    protected $guarded = ['id'];
}
