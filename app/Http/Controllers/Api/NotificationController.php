<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Firebase\Notification;

class NotificationController extends Controller
{
    public function view(){
    	$notification = Notification::SendTo();
    	// $notification = Notification::send($request->title, $request->message, $request->to);
    	return $notification;
    }
}
