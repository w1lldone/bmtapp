<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KretransBU extends Model
{
    
    protected $connection = 'bmtbu';
    protected $table = 'kretrans';
    protected $visible = ['NO_REKENING', 'ANGSURAN_KE', 'POKOK', 'BUNGA', 'NASABAH'];

    public function __construct($cabang = 'bmtbu')
	{
		$this->connection = $cabang;
	}
}
