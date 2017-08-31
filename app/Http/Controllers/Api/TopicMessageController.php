<?php

namespace App\Http\Controllers\Api;

use App\TopicMessage;
use Illuminate\Http\Request;
use App\Jobs\SendTopicChat;

class TopicMessageController extends Controller
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

    public function index($topicRoom)
    {
        return TopicMessage::where('topic_room_id', $topicRoom)->latest()->get()->load('nasabah');
    }

    public function store(Request $request)
    {
        $message = TopicMessage::create([
            'topic_room_id' => $request->topic_room_id,
            'nasabah_id' => $request->nasabah_id,
            'message' => $request->message,
        ]);

        dispatch(new SendTopicChat($message->load('nasabah')));

        return [
            'error' => false,
            'message' => $message,
        ];
    }
}
