<?php

namespace App\Listeners\Auth;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Authenticated;

class LogAuthenticated
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
     * @param  Authenticated  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        Log::channel('daily')
            ->debug('User authenticated.', ['id' => $event->user->id]);
    }
}
