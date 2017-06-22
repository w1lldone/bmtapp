<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Layanan;
use App\Biaya;

class HomeController extends Controller
{
    public function index(){
    	$orders = Order::where('status', '<>', 'canceled')->orderBy('updated_at', 'desc')->paginate(5);
    	$layanans = Layanan::latest()->paginate(5);
    	$biaya = Biaya::latest()->first();

    	return view('admin.home', compact(['orders', 'layanans', 'biaya']));
    }
}
