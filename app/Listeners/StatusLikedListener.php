<?php

namespace App\Listeners;

use App\Events\StatusLiked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusLikedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StatusLiked  $event
     * @return void
     */
    public function handle(StatusLiked $event)
    {
        //
    }
}
