<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderDetail;
use App\Order;

class OrderDetailController extends Controller
{
	/*
	/ -----------------------
	/ Tambah produk ke order
	/ -----------------------
	/ produk_id
	/ quantity
	/ antar = 0/1
	*/
    public function store(Order $order){
    	$order->addOrderDetail();
    	$order->jumlah_produk = $order->orderDetail()->count();

    	return response()->json([
    		'error' => false,
    		'status' => "success",
    		'order' => $order,
		]);
    }

    public function destroy(OrderDetail $orderDetail){
        $order = $orderDetail->order;
    	$orderDetail->delete();
        $order->jumlah_produk = $order->orderDetail()->count();

    	return response()->json([
    		'error' => false,
    		'status' => 'success',
            'order' => $order,
		]);
    }

}
