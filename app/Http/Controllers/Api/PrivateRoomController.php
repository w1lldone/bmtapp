<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\PrivateRoom;
use App\PrivateRoomDetail as RoomDetail;
use App\Http\Controllers\Controller;

class PrivateRoomController extends Controller
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

    public function validation()
    {
        
    }

    public function index($nasabah)
    {
        return RoomDetail::where('nasabah_id', $nasabah)->get()->load(['nasabah', 'reciever', 'private_room.private_message' => function($query)
        {
            $query->latest()->with('nasabah')->first();
        }]);
    }

    public function store(Request $request)
    {

    }

    public function show(Request $request)
    {

        $this->validation();
        
        $roomDetail = RoomDetail::where('nasabah_id', $request->nasabah_id)->where('reciever_id', $request->reciever_id)->first();

        $status = empty($roomDetail) ? 'new' : 'exist';

        $room = empty($roomDetail) ? PrivateRoom::addRoom($request) : $roomDetail->private_room;

        return [
            'error' => false,
            'status' => $status,
            'room' => $room,
            'receiver' => \App\Nasabah::find($request->reciever_id),
        ];
    }
}
