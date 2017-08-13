<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Keranjang;
use Carbon\Carbon;
use App\Jobs\SendFirebaseNotification;
use App\ProdukLayanan;

class Nasabah extends Authenticatable
{

	public function cabang()
	{
		return $this->belongsTo('App\Cabang');
	}

	public function lapak(){
		return $this->hasOne('App\Lapak');
	}

	public function keranjang(){
		return $this->hasMany('App\Keranjang');
	}

	public function Order(){
		return $this->hasMany('App\Order');
	}

	public function orderDetail(){
		return $this->hasManyThrough('App\OrderDetail', 'App\Order');
	}

	public function tabung(){
		return $this->hasMany('App\TabungBU', 'nasabah_id', 'NASABAH_ID');
	}

	public function layanan(){
		return $this->hasMany('App\Layanan');
	}

	public function device()
	{
		return $this->hasMany('App\Device');
	}

	public function mku(){
		return $this->belongsTo('App\Mku');
	}

	public function addLapak($id){
		return $this->lapak()->create([
			'name' => 'Toko saya',
			'alamat' => 'Alamat toko',
			'foto' => "/storage/$id/tokoDefault.jpg",
		]);
	}

	public function addDevice($device_id)
	{
		return $this->device()->create([
			'device_id' => $device_id,
		]);
	}

	public function addKeranjang(){
		$produk = \App\Produk::find(request('produk_id'));

		// cek produk sudah ada di keranjang
		
		
		// tambahkan produk ke keranjang
		return $this->keranjang()->create([
			'produk_id' => request('produk_id'),
    		'quantity' => request('quantity'),
    		'total' => request('quantity')*$produk->harga,
    		'antar' => request('antar'),
    		'catatan' => request('catatan'),
		]);
	}

	public function addOrder(){
		$order = $this->order()->create([
			'status' => 'pending',
			'status_kode' => 1,
			'biaya' => \App\Biaya::latest()->first()->nominal,
		]);

		 $date = \Carbon\Carbon::now();

		 $kode = substr($date->year, 2).$date->month.$date->day."BMT".$order->nasabah->id.$order->id;

		 $order->update(['kode' => $kode]);

		 return $order;
	}

	/*
	* method for make sql whereRaw LIKE query from each words of sentence
	*/
	public function keyword($coloumn, $sentence)
    {
        $query = '';
        $i = 0;
        $keywords = explode(' ', $sentence);
        foreach ($keywords as $keyword) {
            $query .= "$coloumn LIKE '%$keyword%'";

            $i++;

            if ($i != count($keywords)) {
                $query .= " OR ";
            }
        }

        return $query;
    }

	public function pembelian($keyword = '*'){
		// make sql whereRaw LIKE query form each words of keyword
		$key = $this->keyword('name', $keyword);

		$orders = $this->order()
					->where(function($query) use ($keyword, $key)
					{
						$query->whereRaw($this->keyword('kode', $keyword))
							->orWhereHas('orderDetail.produk', function($query) use ($key)
							{
								$query->whereRaw($key);
							})
							->orWhereHas('orderDetail.produk.lapak', function($query) use ($key)
							{
								$query->whereRaw($key);
							});
					})
					->orderBy('status_kode')
					->latest()
					->get();
		foreach ($orders as $order) {
			$order->order_detail = $order->orderDetail()->withTrashed()->with('produk.kategori_produk', 'produk.lapak')->get();
			$order->jumlah = $order->orderDetail()->sum('total');
		}
		return $orders;
	}

	public function review(){
		$this->hasMany('App\Review');
	}

	public function addLayanan(){
		$layanan = $this->layanan()->create([
			'status' => 'pending',
			'status_kode' => 1,
			'biaya' => \App\Biaya::latest()->first()->nominal,
		]);

		$date = \Carbon\Carbon::now();

		$kode = substr($date->year, 2).$date->month.$date->day."PAY".$layanan->nasabah->id.$layanan->id;

		$layanan->update(['kode' => $kode]);

		event(new \App\Events\LayananNotification($layanan));

		return $layanan;
	}

	public function layananList($keyword = '*')
	{
		$key = $this->keyword('name', $keyword);
		return $this->layanan()
					->where(function($q) use ($key, $keyword)
					{
						$q->whereRaw($this->keyword('kode', $keyword))
							->orWhereHas('layananDetail.produkLayanan', function($query) use($key)
							{
								$query->whereRaw($key);
							})
							->orWhereHas('layananDetail', function($query) use($keyword)
							{
								$query->whereRaw($this->keyword('nomer', $keyword));
							});
					})
					->orderBy('status_kode')
					->latest()
					->with('layananDetail.produkLayanan.katLayanan')
					->get();
	}

	public function sendNotification($message = 'notifikasi', $data = array())
	{
		foreach ($this->device as $device) {
			dispatch(new SendFirebaseNotification('BMT Mobile App', $message, $data, $device->device_id));
		}
	}

    protected $guarded=['id'];
    protected $hidden=['password'];
}
