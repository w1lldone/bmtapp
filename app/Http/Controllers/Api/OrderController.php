<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\Nasabah;
use App\Keranjang;
use App\Jobs\OrderKadaluarsa;
use Carbon\Carbon;

class OrderController extends Controller
{

	/* 
	/ ---------------------
	/ request new Order :
	/ ---------------------
	/ Post : /api/order/new/{userid}
	/ produk_id
	/ quantity
	/ antar = 0/1
	*/
    public function store(Nasabah $nasabah, Request $request){
    	
    	if (!Hash::check($request->password, $nasabah->password)) {
    		return ['error' => true, 'message' => 'password salah'];
    	}

    	$order = $nasabah->addOrder();

    	// TAMBAH ORDER DARI KERANJANG
    	if ($request->has('keranjang_id')) {

    		foreach ($request->keranjang_id as $keranjang_id) {

				$order->addOrderDetail($keranjang_id);
				Keranjang::find($keranjang_id)->delete();
				
			}

    	}

    	// TAMBAH ORDER LANGSUNG BAYAR
    	if ($request->has('produk_id')) {
    		
    		$produk = \App\Produk::find($request->produk_id);
    		$order->orderDetail()->create([
    			'produk_id' => $request->produk_id,
    			'quantity' => $request->quantity,
	    		'total' => $request->quantity*$produk->harga,
	    		'antar' => $request->antar,
	    		'catatan' => $request->catatan,
	            'kadaluarsa_at' => Carbon::now()->addHours(12),
			]);

    	}

		// $job = (new OrderKadaluarsa($order->id))->delay(Carbon::now()->addHours(12));
		$job = (new OrderKadaluarsa($order->id))->delay(Carbon::now()->addMinutes(2));
		dispatch($job);

		$order->pesanNotification();

		return [
			'error' => false, 
			'status' => 'success', 
			'order' => $order,
			'jumlah' => $nasabah->keranjang()->count(),
		];
    }

    public function view($kodetrans){
    	$kodetrans->orderDetail->load('produk.lapak');
    	return $kodetrans;
    }

    public function update(Order $order, Request $request){
    	
    }
}
