<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Firebase\Push;
use App\Firebase\Firebase;

class SendFirebaseNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $tries = 5;
    
    protected $title;
    protected $message;
    protected $data;
    protected $to;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title = '', $message = '', $data = array(), $to = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->data = $data;
        $this->to = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $push = new Push;

        $push->setTitle($this->title);
        $push->setMessage($this->message);
        $push->setImage('');
        $push->setIsBackground(FALSE);
        $push->setPayload($this->data);

        $json = '';
        $response = '';

        $firebase = new Firebase;

        $json = $push->getPush();

        $response = $firebase->sendAll($json, $this->to);

        return $response;
    }
}
