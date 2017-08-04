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

    /*
    * NOTIFICATION METHOD SECTION
    */
    public function sediaNotification()
    {
        return $this->nasabahNotification('Pesanan Anda tersedia');
    }

    public function habisNotification()
    {
        return $this->nasabahNotification('Maaf, pesanan Anda tidak tersedia');
    }

    public function dikirimNotification()
    {
        $kirim = $this->antar == true ? 'dikirim' : 'siap diambil';
        return $this->nasabahNotification("Pesanan Anda sudah $kirim", 1);
    }

    public function nasabahNotification($message = 'Notifikasi pesanan', $kode = 2)
    {
        $data = [
            'kode' => $kode,
            'id' => $this->id,
        ];

        $this->order->nasabah->sendNotification($message, $data);

    }

    protected $guarded=['id'];
    protected $dates = ['deleted_at', 'dikirim_at', 'diterima_at'];
}
