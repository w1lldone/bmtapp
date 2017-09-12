<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminChat extends Model
{
	/*RELATION METHOD*/
	public function admin_room(){
		return $this->belongsTo('App\AdminRoom');
	}

	public function nasabah(){
		return $this->belongsTo('App\Nasabah');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	/*CUSTOM METHOD*/
	public function indent()
	{
		if (empty($this->user_id)) {
			return 'left-top left-side';
		} else {
			return 'right-top right-side bg-admin';
		}
		
	}
	    
    protected $guarded = ['id'];
    protected $touches = ['admin_room'];
}
