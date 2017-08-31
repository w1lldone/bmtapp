<?php

namespace App\Http\Controllers\Api;

use App\PrivateMessage;
use Illuminate\Http\Request;
use App\Jobs\SendPrivateChat;

class PrivateMessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($room)
    {
        return PrivateMessage::where('private_room_id', $room)->latest()->with('nasabah')->get();
    }

    public function store(Request $request)
    {

        $message = PrivateMessage::create([
            'private_room_id' => $request->private_room_id,
            'nasabah_id' => $request->nasabah_id,
            'message' => $request->message,
        ]);

        foreach ($message->reciever()->getDeviceId() as $device) {
            dispatch( new SendPrivateChat($message, $device));
        }

        return [
            'error' => false,
            'message' => $message,
            'receiver' => $message->reciever(),
        ];
    }
}
