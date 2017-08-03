<?php

namespace App\Firebase;

use App\Firebase\Push;
use App\Firebase\Firebase;


/**
* 
*/
class Notification
{
    function __construct($foo = null)
    {
        $this->foo = $foo;
    }
	public static function send($title, $message, $data = array()){

        $push = new Push;

        $push->setTitle($title);
        $push->setMessage($message);
        $push->setImage('');
        $push->setIsBackground(FALSE);
        $push->setPayload($data);

        $json = '';
        $response = '';

        $firebase = new Firebase;

        $json = $push->getPush();
        $response = $firebase->sendAll($json);
        return $response;
    }

    public static function sendTo($title, $message, $data = array(), $to){
        $push = new Push;

        $push->setTitle($title);
        $push->setMessage($message);
        $push->setImage('');
        $push->setIsBackground(FALSE);
        $push->setPayload($data);

        $json = '';
        $response = '';

        $firebase = new Firebase;

        $json = $push->getPush();
        $response = $firebase->sendAll($json, $to);
        return $response;
    }
}