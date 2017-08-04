<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
	use SoftDeletes;

    public function nasabah(){
        return $this->hasManyThrough('App\Nasabah', 'App\Order');
    }

    public function produk(){
    	return $this->belongsTo('App\Produk');
    }

    public function order(){
    	return $this->belongsTo('App\Order');
    }

    public function reduceStock()
    {
        $stok = $this->produk->stok <= $this->quantity ? 0 : $this->produk->stok - $this->quantity ;
        return $this->produk->update(['stok' => $stok]);
    }

    public function ada(){
        $this->sediaNotification();
    	return $this->update(['sedia' => 1]);
    }

    public function habis(){
    	$this->update(['sedia' => 0]);
    	$this->delete();
        $this->habisNotification();
    	// $this->order->cekSedia();
    	return true;
    }

    public function sediaNotification()
    {
        $data = [
            'kode' => 2,
            'id' => $this->id,
        ];
        foreach ($this->nasabah as $nasabah) {
            $nasabah->sendNotification('Pesanan pesanan anda tersedia', $data);
        }
    }

    public function habisNotification()
    {
        $data = [
            'kode' => 2,
            'id' => $this->id,
        ];
        foreach ($this->nasabah as $nasabah) {
            $nasabah->sendNotification('Maaf, produk tidak tersedia', $data);
        }
    }

    protected $guarded=['id'];
    protected $dates = ['deleted_at', 'dikirim_at', 'diterima_at'];
}
