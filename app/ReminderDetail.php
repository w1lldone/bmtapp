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

    /*CUSTOM METHOD SECTION*/
    public function read()
    {
        if ($this->read_at == null) {
            $this->update([
                'read_at' => \Carbon\Carbon::now()
            ]);
        }

        return true;
    }

    protected $guarded = ['id'];
}
