<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NasabahBU extends Model
{
    protected $connection;

	public function __construct($cabang = 'bmtbu')
	{
		$this->connection = $cabang;
	}

	public function tabungbu(){
		return $this->hasMany('App\TabungBU', 'nasabah_id', 'nasabah_id');
	}	

    protected $table = 'nasabah';
}
