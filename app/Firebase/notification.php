<?php

namespace App\Firebase;

use App\Firebase\Push;
use App\Firebase\Firebase;


/**
* 
*/
class Notification
{
	public static function send($title, $message, $to = '', $data = array()){
        $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';

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

    public static function sendTo($title, $message, $to = '', $data = array()){
    	$payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';

        $push = new Push;

        $push->setTitle(request('title'));
        $push->setMessage(request('message'));
        $push->setImage('');
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);

        $json = '';
        $response = '';

        $firebase = new Firebase;

        $json = $push->getPush();
        $response = $firebase->sendAll($json, request('to'));
        return $response;
    }
}