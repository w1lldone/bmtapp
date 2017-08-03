<?php

namespace App\Firebase;

use App\Firebase\Push;
use App\Firebase\Firebase;

class Notification
{
    public static function test()
    {
        return 'test';
    }
    public static function sendto($title, $message, $data, $to){

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
        $response = $firebase->send($to, $json);
        return $response;
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
        return [
            'status' => $response,
            'isi' => $json,
        ];
    }
}