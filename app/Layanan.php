<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
	public function nasabah(){
		return $this->belongsTo('App\Nasabah');
	}

    public function layananDetail(){
    	return $this->hasOne('App\LayananDetail');
    }

    public static function pending(){
    	return static::where('status', 'pending')->latest()->with('nasabah');
    }

    public static function finished(){
    	return static::where('status', 'finished')->orWhere('status', 'canceled')->latest()->with('nasabah');
    }

    public function statusFinished(){
        $this->selesaiNotification();
        return $this->update(['status' => 'finished', 'status_kode' => 5]);
    }

    public function statusCanceled($pesan = ''){
        return $this->update([
            'status' => 'canceled', 
            'status_kode' => 6,
            'pesan' => $pesan,
        ]);
    }

    public function addLayananDetail(){
        $produk = \App\ProdukLayanan::find(request('produk_id'));
        return $this->layananDetail()->create([
            'produk_layanan_id' => request('produk_id'),
            'total' => $produk->harga,
            'nomer' => request('nomer'),
            'atas_nama' => request('atas_nama'),
        ]);
    }

    public function addKreditLayananDetail($kredit = ''){
        return $this->layananDetail()->create([
            'produk_layanan_id' => request('produk_id'),
            'nomer' => $kredit,
        ]);
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

        if (is_numeric($request->filter)) {

            $query = "(status = 'pending')";

            $id = $request->filter;

            if ($request->has('keyword') && !empty($request->keyword)) {
                $query .= " and (kode LIKE '%$request->keyword%')";
            }

            return static::whereRaw($query)->whereHas('layananDetail.produkLayanan', function ($q) use ($id)
            {
                $q->where('kat_layanan_id', '=', $id);
            })->orderBy($col, $sort);
        }

        if ($request->filter == 'semua') {
            $query = "(status = 'pending')";
        }

        if ($request->filter == 'semua-f') {
            $query = "(status = 'canceled' or status = 'finished')";
        }

        if ($request->filter == 'batal') {
            $query = "(status = 'canceled')";
        }

        if ($request->filter == 'selesai') {
            $query = "(status = 'finished')";
        }


        if ($request->has('keyword') && !empty($request->keyword)) {
            $query .= " and (kode LIKE '%$request->keyword%')";
        }

        return static::whereRaw($query)->orderBy($col, $sort);
    }

    public function selesaiNotification()
    {
        $data = [
            'kode' => 3,
            'id' => $this->id,
        ];
        return $this->nasabah->sendNotification('Transaksi layanan sudah dibayar', $data);
    }

    protected $dates = ['dibayar_at'];
    protected $guarded = ['id'];
}
