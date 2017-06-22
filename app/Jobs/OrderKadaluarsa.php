<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\OrderDetail;
use App\Order;

class OrderKadaluarsa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $count = 0;
        $order = Order::find($this->id);
        foreach ($order->orderDetail as $orderDetail) {
           if ($orderDetail->sedia == null) {
                $orderDetail->habis();
                $count++;
           }
        }

        if ($count!=0) Order::find($this->id)->cekSedia();

    }


}
