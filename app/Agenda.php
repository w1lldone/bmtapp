<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
	/*
	* Relation section
	*/

	public function mku(){
		return $this->belongsTo('App\Mku');
	}
	
    protected $dates = ['tanggal'];
    protected $guarded = ['id'];
}
