<?php

namespace App\Http\Controllers\Api;

use App\TopicRoom;
use Illuminate\Http\Request;

class TopicRoomController extends Controller
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

    public function index()
    {
        return TopicRoom::latest()->get()
            ->load(['topic_message' => function($query)
            {
                $query->latest()->with('nasabah')->first();
            }]);
    }
}
