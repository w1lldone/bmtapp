<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
	use SoftDeletes;

    public function produk(){
    	return $this->belongsTo('App\Produk');
    }

    public function order(){
    	return $this->belongsTo('App\Order');
    }

    public function ada(){
    	return $this->update(['sedia' => 1]);
    }

    public function habis(){
    	$this->update(['sedia' => 0]);
    	$this->delete();
    	// $this->order->cekSedia();
    	return true;
    }

    protected $guarded=['id'];
    protected $dates = ['deleted_at', 'dikirim_at', 'diterima_at'];
}
