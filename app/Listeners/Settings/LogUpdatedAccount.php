<?php

namespace App\Listeners\Settings;

use Illuminate\Support\Facades\Log;
use App\Events\Settings\AccountUpdated;

class LogUpdatedAccount
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
     * @param  AccountUpdated  $event
     * @return void
     */
    public function handle(AccountUpdated $event)
    {
        Log::info('User account updated.', ['id' => $event->user->id]);
    }
}
