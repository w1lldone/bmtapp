<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NasabahBU extends Model
{

	public function tabungbu(){
		return $this->hasMany('App\TabungBU', 'nasabah_id', 'nasabah_id');
	}	

    protected $connection = 'bmtbu';
    protected $table = 'nasabah';
}
