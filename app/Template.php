<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{

	public function replaceDate($string)
	{
		$this->foot = str_replace('{tanggal}', $string, $this->foot);

		return $this; 
	}
    
    protected $guarded = ['id'];
}
