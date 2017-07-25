<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nasabah;
use App\OrderDetail;
use App\Order;

class PembelianController extends Controller
{
    public function index(Nasabah $nasabah){
        return $nasabah->pembelian(request('keyword'));
    }

    public function view(Order $order){
        return $order->load('orderDetail.produk.lapak');
    }

    public function terima(OrderDetail $orderDetail){

        if ($orderDetail->dikirim_at == null) {
            return [
                'error' => true,
                'message' => 'Pesanan Belum dikirim',
            ];
        }

        $orderDetail->update(['diterima_at' => \Carbon\Carbon::now()]);

        $orderDetail->order->cekDiterima();

        return [
            'error' => false,
            'status' => 'success',
        ];
    }
}
