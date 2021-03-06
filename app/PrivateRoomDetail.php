<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateRoomDetail extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    protected $appends = ['admin_chat', 'last_updated'];

    public function private_room(){
    	return $this->belongsTo('App\PrivateRoom');
    }

    public function nasabah(){
    	return $this->belongsTo('App\Nasabah');
    }

    public function reciever(){
        return $this->belongsTo('App\Nasabah', 'reciever_id');
    }

    /*CUSTOM ATTRIBUTE*/


    public function getAdminChatAttribute()
    {
        return false;
    }

    public function getlastUpdatedAttribute()
    {
        return $this->private_room->updated_at->toDateTimeString();
    }

}
