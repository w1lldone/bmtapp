<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\PrivateRoom;
use App\AdminRoom;
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
        $rooms = RoomDetail::where('nasabah_id', $nasabah)->with(['nasabah', 'reciever', 'private_room'])->get();

        // return $rooms;

        // Append admin chat to private message
        $data = AdminRoom::where('nasabah_id', $nasabah)->first();
        $lastMessage = count($data->admin_chat) ? [array('message' => $data->admin_chat()->latest()->first()->message, 'created_at' => $data->admin_chat()->latest()->first()->created_at->toDateTimeString())] : [];
        $adminRoom = [
            'private_room_id' => $data->id,
            'admin_chat' => true,
            'reciever' => [
                'name' => 'Administrator',
                'foto' => '/assets/img/logo/logo.png'
            ],
            'private_room' => [
                'created_at' => $data->created_at->toDateTimeString(),
                'last_message' => $lastMessage,
            ],
        ];

        return $rooms->push($adminRoom);

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
