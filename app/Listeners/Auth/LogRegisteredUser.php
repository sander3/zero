<?php

namespace App\Listeners\Auth;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;

class LogRegisteredUser
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Log::info('User registered.', ['id' => $event->user->id]);
    }
}
