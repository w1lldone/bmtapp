<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function nasabah(){
    	return $this->belongsTo('App\Nasabah');
    }

    public function lapak(){
    	return $this->belongsTo('App\Lapak');
    }

    protected $guarded = ['id'];
}
