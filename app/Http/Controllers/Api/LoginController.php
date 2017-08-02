<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Device;

class LoginController extends Controller
{
    public function store(){
        $auth = auth()->guard('nasabah'); // Atau \Auth::guard('doctor')
 
        $credentials = [
            'username' =>  request('username'), 
            'password' =>  request('password') ,
        ];
     
        if ($auth->attempt($credentials)) {
            $nasabah = Auth::guard('nasabah')->user();

            $device = \App\Device::where('device_id', request('device_id'))->get();
            if ($device->isEmpty()) {
                $device = $nasabah->addDevice(request('device_id'));
            }

            $keranjang = $nasabah->keranjang()->count();
            return response()->json([
                    'error' => false,
                    'user' => $nasabah->load(['lapak', 'cabang']),
                    'keranjang' => $keranjang,
            ]);
        }
     
        return response()->json([
                'error' => true,
                'status' => 'username password missmatch',
            ]);
    }

    public function destroy(Request $request)
    {
        Device::where('device_id', $request->device_id)->delete();

        return [
            'error' => false,
            'status' => 'success',
        ];
    }
}
