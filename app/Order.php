<?php

namespace App;

use Log;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\ProdukOrderNotification;
use App\Keranjang;
use App\Produk;
use Carbon\Carbon;
use App\Jobs\SendFirebaseNotification;

class Order extends Model
{
    public function orderDetail(){
    	return $this->hasMany('App\OrderDetail');
    }

    public function nasabah(){
        return $this->belongsTo('App\Nasabah');
    }

    public function addOrderDetail($keranjang_id){
        $keranjang = Keranjang::find($keranjang_id);
    	$produk = $keranjang->produk;

        // dispatch(new ProdukOrderNotification());

    	return $this->orderDetail()->create([
    		'produk_id' => $keranjang->produk_id,
    		'quantity' => $keranjang->quantity,
    		'total' => $keranjang->quantity*$produk->harga,
    		'sedia' => null,
            'catatan' => $keranjang->catatan,
    		'antar' => $keranjang->antar,
            'kadaluarsa_at' => Carbon::now()->addHours(36),
		]);
    }

    public function statusPending(){
        return $this->update(['status' => 'pending', 'status_kode' => 1]);
    }

    public function statusConfirmed(){
        event(new \App\Events\OrderNotification($this, 'Pembayaran produk baru'));
        return $this->update(['status' => 'confirmed', 'status_kode' => 2]);
    }

    public function statusPaid(){
        return $this->update([
            'status' => 'paid', 
            'status_kode' => 3,
            'tgl_bayar' => Carbon::now(),
        ]);
    }

    public function statusDelivered(){
        event(new \App\Events\OrderNotification($this, 'Produk diterima'));
        return $this->update(['status' => 'delivered', 'status_kode' => 4]);
    }

    public function statusFinished(){
        return $this->update(['status' => 'finished', 'status_kode' => 5]);
    }

    public function statusCanceled($pesan = ''){
        return $this->update([
            'status' => 'canceled', 
            'status_kode' => 6,
            'pesan' => $pesan,
        ]);
    }

    public static function unpaid(){
        return static::where('status', 'pending')->orWhere('status', 'confirmed')->orderBy('status_kode', 'desc')->with('nasabah');
        // return static::where('status', 'pending')->orWhere('status', 'confirmed');
    }

    public static function paid(){
        return static::where('status', 'paid')->orWhere('status', 'delivered')->orderBy('status_kode', 'desc')->with('nasabah');
    }

    public static function finished(){
        return static::where('status', 'finished')->with('nasabah');
    }

    public static function actCount(){
        return static::where('status', 'confirmed')->orWhere('status', 'delivered')->count();
    }

    public function cekSedia(){
        foreach ($this->orderDetail as $orderDetail) {
           if ($orderDetail->sedia == null) {
               return false;
           }
        }

        if ($this->orderDetail->count() == 0) {
            $this->statusCanceled();
            return false;
        }

        $this->statusConfirmed();
        return true;
    }

    public function cekDiterima(){

        foreach ($this->orderDetail as $orderDetail) {
           if ($orderDetail->diterima_at == null) {
               return false;
           }
        }

        $this->statusDelivered();
        return true;
    }

    public static function filter($request)
    {
        if ($request->urutkan == 'terbaru') {
            $col = 'updated_at';
            $sort = 'desc';
        }
        if ($request->urutkan == 'terlama') {
            $col = 'updated_at';
            $sort = 'asc';
        }
        if ($request->urutkan == 'butuh tindakan') {
            $col = 'status_kode';
            $sort = 'asc';
        }


        // FILTER SIAP BAYAR
        if ($request->filter == 'semua-s') {
            $query = "(status = 'pending' or status = 'confirmed')";
        }

        if ($request->filter == 'butuh tindakan') {
            $query = "status = 'confirmed'";
        }

        if ($request->filter == 'pending') {
            $query = "status = 'pending'";
        }

        // FILTER DIPROSES
        if ($request->filter == 'semua-p') {
            $query = "(status = 'paid' or status = 'delivered')";
        }

        if ($request->filter == 'diterima') {
            $query = "status = 'delivered'";
        }

        if ($request->filter == 'diproses') {
            $query = "status = 'paid'";
        }

        // FILTER SELESAI
        if ($request->filter == 'selesai') {
            $query = "status = 'finished'";
        }

        if ($request->filter == 'semua-f') {
            $query = "(status = 'finished' or status = 'canceled')";
        }        

        if ($request->filter == 'batal') {
            $query = "status = 'canceled'";
        }

        if ($request->has('keyword') && !empty($request->keyword)) {
            $query .= " and (kode LIKE '%$request->keyword%')";
        }

        return static::whereRaw($query)->orderBy($col, $sort);
    }

    public function sendNotification()
    {
        foreach ($this->orderDetail as $orderDetail) {
            foreach ($orderDetail->produk->lapak->nasabah->device as $device) {
                $data = [
                    'kode' => 1,
                    'object' => $orderDetail,
                ];
                dispatch(new SendFirebaseNotification('BMT Mobile App', 'Barang anda dipesan!', $data, $device->device_id));
            }
        }
    }

    protected $guarded=['id'];
    protected $dates = ['tgl_bayar'];
}
