<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Uploader;

class Lapak extends Model
{
    public function nasabah(){
    	return $this->belongsTo('App\Nasabah');
    }

    public function orderDetail(){
        return $this->hasManyThrough('App\OrderDetail', 'App\Produk');
    }

    public function review(){
        return $this->hasManyThrough('App\Review', 'App\Produk');
    }

    public function produk(){
    	return $this->hasMany('App\Produk');
    }

    public function addProduk(){
    	$produk = $this->produk()->create([
    		'name' => request('name'), 
    		'kategori_produk_id' => request('kategori_produk_id'), 
    		'satuan_id' => request('satuan_id'), 
    		'harga' => request('harga'),
    		'deskripsi' => request('deskripsi'),
    		'stok' => request('stok'),
    		'view' => 0,
    		'aktif' => 1,
            'rating' => 4.0,
            'antar' => request('antar'),
		]);

		if(!empty(request()->file('foto1'))){
			$location = $this->nasabah->id;
			$path = Uploader::upload('foto1', "$location/produk");
			$produk->update(['foto1' => $path]);
		}

        if(!empty(request()->file('foto2'))){
            $location = $this->nasabah->id;
            $path = Uploader::upload('foto2', "$location/produk");
            $produk->update(['foto2' => $path]);
        }

        if(!empty(request()->file('foto3'))){
            $location = $this->nasabah->id;
            $path = Uploader::upload('foto3', "$location/produk");
            $produk->update(['foto3' => $path]);
        }

        return $produk;

    }

    /*
    * method for make sql where LIKE query from each words of sentence
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

    public function penjualan($keyword = '*')
    {
        $key = $this->keyword('name', $keyword);

        // KEYWORDING
        $penjualan = $this->orderDetail()
        ->where(function($q) use ($keyword, $key)
        {
            $q->whereHas('produk', function($query) use ($key)
            {
                $query->whereRaw($key);
            })
            ->orWhereHas('order.nasabah', function($query) use ($key)
            {
               $query->whereRaw($key);
            })
        ->orWhereRaw($this->keyword('catatan', $keyword));
        });

        // FILTERING
        switch (request('filter')) {

            case 'butuh-tindakan':
                $penjualan = $penjualan->where('sedia', null)
                ->orWhere(function($query)
                {
                    $query->whereHas('order', function($q)
                    {
                        $q->where('status_kode', 3);
                    })
                    ->where('dikirim_at', null);
                });
                break;

            case 'selesai':
                $penjualan = $penjualan->whereHas('order', function($query)
                {
                    $query->where('status_kode', 5);
                });
                break;

            case 'batal':
                $penjualan = $penjualan->whereHas('order', function($query)
                {
                    $query->where('status_kode', 6);
                });
                break;

            case 'diproses':
                $penjualan = $penjualan->whereHas('order', function($query)
                {
                    $query->where('status_kode', 1);
                })
                ->where('sedia', '<>', null);
                break;
            
            default:
                # code...
                break;
        }

        // SORTING
        switch (request('sort')) {
            case 'terlama':
                $penjualan = $penjualan->oldest();
                break;
            
            default:
               $penjualan = $penjualan->latest();
                break;
        }
                    
        $penjualan = $penjualan->get()->load('produk', 'order.nasabah');

        return $penjualan;
    }

    /*CUSTOM ATTRIBUTE*/
    public function getPendapatanHariIniAttribute()
    {
        return $this->orderDetail()->whereDate('diterima_at', date("Y-m-d"))->get()->sum('total');
    }

    public function getBarangTerjualAttribute()
    {
        return $this->orderDetail()->count();
    }

    public function getRatingAttribute()
    {
        return number_format($this->produk()->avg('rating'), 1);
    }

    public function getReviewTotalAttribute()
    {
        return $this->review()->count();
    }

    public function getLastUpdateAttribute()
    {
        if ($this->produk()->count() == 0) return $this->updated_at->toDateString();
        return $this->produk()->latest()->first()->updated_at->toDateString();
    }

    public function getSedangDikirimAttribute()
    {
        return $this->orderDetail()->where('dikirim_at', '<>', null)->where('diterima_at', null)->count();
    }

    public function getBarangTerjualHariIniAttribute()
    {
        // return $this->orderDetail()->whereDate('created_at', date('Y-m-d'))->count();
        return $this->produk()->whereHas('orderDetail', function($q)
        {
            $q->whereDate('created_at', date('Y-m-d'));
        })->count();
    }

    public function getPesananBatalAttribute()
    {
        return $this->orderDetail()->where('sedia', 0)->count();
    }

    public function getTotalPesananAttribute()
    {
        return $this->orderDetail()->count();
    }



    protected $guarded = ['id'];
    protected $fillable = ['name', 'alamat', 'foto'];
    protected $appends = ['pendapatan_hari_ini', 'barang_terjual', 'barang_terjual_hari_ini', 'rating', 'review_total', 'last_update', 'sedang_dikirim', 'pesanan_batal', 'total_pesanan'];
}
