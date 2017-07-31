<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabungBU extends Model
{

	protected $connection;
	protected $table = 'tabung';

	public function __construct($cabang = 'bmtbu')
	{
		$this->connection = $cabang;
	}
    
	public function nasabahbu(){
		return $this->belongsTo('App\NasabahBU', 'nasabah_id', 'nasabah_id');
	}

    
}
