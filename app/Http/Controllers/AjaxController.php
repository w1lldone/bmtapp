<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AjaxController extends Controller
{
    public function order(){
    	$order = Order::where('status', 'pending')->with('nasabah');
    	$count = $order->count();

    	return ['count' => $count, 'order' => $order->get()];
    }
}
