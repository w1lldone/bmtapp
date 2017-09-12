<?php

namespace App\Http\Controllers;

use App\AdminChat;
use App\AdminRoom;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = AdminRoom::getData();

        return view('chat.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chat = AdminChat::create([
            'user_id' => auth()->id(),
            'admin_room_id' => $request->admin_room_id,
            'message' => $request->message,
            'read_at' => \Carbon\Carbon::now(),
        ]);

        return response()->json(array('chat' => $chat), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminChat  $adminChat
     * @return \Illuminate\Http\Response
     */
    public function show(AdminRoom $room)
    {
        return view('chat.view', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminChat  $adminChat
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminChat $adminChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminChat  $adminChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminChat $adminChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminChat  $adminChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminChat $adminChat)
    {
        //
    }
}
