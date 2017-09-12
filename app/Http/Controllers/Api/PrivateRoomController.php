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
        $rooms = RoomDetail::where('nasabah_id', $nasabah)->get()->load(['nasabah', 'reciever', 'private_room.private_message' => function($query)
        {
            $query->latest()->with('nasabah')->first();
        }]);

        // return $rooms;

        // Append admin chat to private message
        $data = AdminRoom::where('nasabah_id', $nasabah)->first();
        $adminRoom = [
            'private_room_id' => $data->id,
            'admin_chat' => true,
            'reciever' => [
                'name' => 'Administrator',
                'foto' => '/uploads/images/logo/logo.svg'
            ],
            'private_room' => [
                'private_message' => [
                    'message' => $data->admin_chat()->latest()->first()->message,
                    'created_at' => $data->admin_chat()->latest()->first()->created_at->toDateTimeString(),
                ],
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
