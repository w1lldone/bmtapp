<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Firebase\Push;
use App\Firebase\Firebase;

class SendPrivateChat implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    
    protected $title;
    protected $message;
    protected $data;
    protected $to;
    protected $kode;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $to, $kode = 4)
    {
        $this->title = 'Pesan dari '.$message->nasabah->name;
        $this->message = $message->message;
        $this->data = $message;
        $this->to = $to;
        $this->kode = $kode;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $payload = [
            'kode' => $this->kode,
            'data' => $this->data->load('nasabah'),
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

        $response = $firebase->sendTo($this->to, $json);

        return $response;
    }
}
