<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
	/*
	* Relation section
	*/
    public function detail()
    {
        return $this->hasMany('App\ReminderDetail', 'reminder_id', 'id');
    }

    /*
	* Custom method section
    */
    public static function cekTanggal($tanggal)
    {
    	return static::where('tanggal', $tanggal)->get()->isEmpty();
    }
    
}
