<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Firebase\Notification;

class NotificationController extends Controller
{
    public function index(){
    	$title = 'test new class';
    	$message = 'test new class for notification';
    	$notification = Notification::send($title, $message);
    	return $notification;
    	
    }
}
