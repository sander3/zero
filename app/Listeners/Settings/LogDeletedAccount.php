<?php

namespace App\Listeners\Settings;

use Illuminate\Support\Facades\Log;
use App\Events\Settings\AccountDeleted;

class LogDeletedAccount
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
     * @param  AccountDeleted  $event
     * @return void
     */
    public function handle(AccountDeleted $event)
    {
        Log::info('User account deleted.', ['id' => $event->user->id]);
    }
}
