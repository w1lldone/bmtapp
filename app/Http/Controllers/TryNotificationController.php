<?php

namespace App\Http\Controllers;

use App\Nasabah;
use App\Firebase\Notification;
use Illuminate\Http\Request;

class TryNotificationController extends Controller
{
    public function all()
    {
        $data = [
            'kode' => 2,
            'object' => [
                'id' => 1,
                'action' => 'test',
            ],
        ];

        $notif = Notification::send('Ini judul', 'ini pesan', $data);
        return $notif;
    }

    public function sendto()
    {
        $data = [
            'kode' => 2,
            'id' => 21,
        ];
        $device = Nasabah::find(11)->device->first();
        $notif = Notification::sendto('Ini judul', 'ini pesan', $data, $device->device_id);
        return $notif;
    }
}
