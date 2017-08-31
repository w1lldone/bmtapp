<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicRoom extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    public function topic_message(){
    	return $this->hasMany('App\TopicMessage');
    }

}
