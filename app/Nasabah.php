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

	public function reminder_detail(){
		return $this->hasMany('App\ReminderDetail');
	}

	public function mku(){
		return $this->belongsTo('App\Mku');
	}

	public function private_room(){
        return $this->hasMany('App\PrivateRoom');
    }

    public function private_room_detail(){
        return $this->hasMany('App\PrivateRoomDetail');
    }

    public function private_message(){
        return $this->hasMany('App\PrivateMessage');
    }

    public function getDeviceId()
    {
        return $this->device()->pluck('device_id')->all();
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

		// QUERY KEYWORDS
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
		});

		// FILTERING
		switch (request('filter')) {
			case 'butuh-tindakan':
				$orders = $orders->whereHas('orderDetail', function($q)
				{
					$q->where('dikirim_at', '<>', null)->where('diterima_at', null);
				});
				break;

			case 'selesai':
				$orders = $orders->where('status_kode', 5);
				break;

			case 'batal':
				$orders = $orders->where('status_kode', 6);
				break;

			case 'diproses':
				$orders = $orders->where('status_kode', 1)->orWhere('status_kode', 2)->orWhere('status_kode', 3);
				break;
			
			default:
				# code...
				break;
		}

		$orders = $orders->orderBy('status_kode')
		->latest()
		->get()
		->load(['orderDetail' => function($q)
		{
			$q->withTrashed();
		}, 'orderDetail.produk.kategori_produk', 'orderDetail.produk.lapak']);

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
		$status = request()->has('status_kode') ? "status_kode = ".request('status_kode') : 'status_kode';
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
					->whereRaw($status)
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
    protected $hidden = [
        'password', 'cabang_id', 'device_token', 'remember_token', 'mku_id'
    ];
}
