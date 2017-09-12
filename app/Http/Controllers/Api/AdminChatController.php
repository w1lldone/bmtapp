<?php

namespace App\Http\Controllers\Api;

use App\AdminChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\AdminChatSent;

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
        //
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
            'nasabah_id' => $request->nasabah_id,
            'admin_room_id' => $request->admin_room_id,
            'message' => $request->message,
        ]);

        event(new AdminChatSent($chat));

        return [$chat];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminChat  $adminChat
     * @return \Illuminate\Http\Response
     */
    public function show($room)
    {
        $chats = AdminChat::where('admin_room_id', $room)->latest()->get();
        return $chats->load('nasabah', 'user');
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
