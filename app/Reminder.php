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

    public function addDetail($nasabahId)
    {
        return $this->detail()->create(['nasabah_id' => $nasabahId]);
    }
    
    protected $guarded = ['id'];
    protected $dates = ['tanggal'];
}
