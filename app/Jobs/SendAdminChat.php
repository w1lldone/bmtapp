<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Firebase\Push;
use App\Firebase\Firebase;

class SendAdminChat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    
    protected $title;
    protected $message;
    protected $data;
    protected $to;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $to)
    {
        $this->title = 'Pesan dari Administrator';
        $this->message = $message->message;
        $this->data = $message;
        $this->to = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $payload = [
            'kode' => 9,
            'data' => $this->data->load('user'),
        ];

        $push = new Push;
        
        $push->setTitle($this->title);
        $push->setMessage($this->message);
        $push->setImage('');
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);

        $json = '';
        $response = '';

        $firebase = new Firebase;

        $json = $push->getPush();

        $response = $firebase->send($this->to, $json);

        return $response;
    }
}
