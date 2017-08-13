<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KreditBU extends Model
{
    protected $connection = 'bmtbu';
    protected $table = 'kredit';

    public function __construct($cabang = 'bmtbu')
	{
		$this->connection = $cabang;
	}
}
