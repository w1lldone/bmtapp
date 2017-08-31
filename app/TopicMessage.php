<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicMessage extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    public function topic_room(){
    	return $this->belongsTo('App\TopicRoom');
    }

    public function nasabah(){
    	return $this->belongsTo('App\Nasabah');
    }

}
