<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateRoom extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    protected $appends = ['last_message'];

    public function private_message(){
    	return $this->hasMany('App\PrivateMessage');
    }

    public function private_room_detail(){
        return $this->hasMany('App\PrivateRoomDetail');
    }

    public static function addRoom($request)
    {
        $room = PrivateRoom::create();

        $room->private_room_detail()->create([
            'nasabah_id' => $request->nasabah_id,
            'reciever_id' => $request->reciever_id,
        ]);

        $room->private_room_detail()->create([
            'nasabah_id' => $request->reciever_id,
            'reciever_id' => $request->nasabah_id,
        ]);

        return $room;
    }

    /*CUSTOM ATTRIBUTE*/
    public function getLastMessageAttribute()
    {
        return $this->private_message()->latest()->take(1)->with('nasabah')->get();
    }


}
