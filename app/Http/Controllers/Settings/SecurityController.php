<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecurityController extends Controller
{
    /**
     * Show the user's log.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('settings.security', [
            'logs' => $request
                ->user()
                ->logs()
                ->latest()
                ->take(10)
                ->get(),
        ]);
    }
}
