<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KretransBU extends Model
{
    
    protected $connection = 'bmtbu';
    protected $table = 'kretrans';

    public function __construct($cabang = 'bmtbu')
	{
		$this->connection = $cabang;
	}
}
