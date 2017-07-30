<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReminderDetail extends Model
{
    /*
	* Relation section
    */
    public function reminder()
    {
        return $this->belongsTo('App\Reminder');
    }

    public function nasabah()
    {
        return $this->belongsTo('App\Nasabah');
    }

    protected $guarded = ['id'];
}
