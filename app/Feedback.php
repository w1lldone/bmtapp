<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	/*RELATION METHOD*/
	public function nasabah(){
		return $this->belongsTo('App\Nasabah');
	}

	public function feedback_kategori(){
		return $this->belongsTo('App\FeedbackKategori');
	}
    
    protected $guarded = ['id'];
}
