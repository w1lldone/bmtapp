<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];
    protected $touches = ['private_room'];

    public function private_room(){
    	return $this->belongsTo('App\PrivateRoom');
    }

    public function nasabah(){
    	return $this->belongsTo('App\Nasabah');
    }

    public function reciever()
    {
        return $this->private_room->private_room_detail()->where('nasabah_id', $this->nasabah->id)->first()->reciever;
    }

}
