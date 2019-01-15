<?php

namespace App\Http\Middleware;

use App;
use Closure;

class SetPreferredLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(
        $request,
        Closure $next
    ) {
        $availableLocales = array_keys(__('settings.locales'));

        $locale = optional($request->user())->locale ?? $request->getPreferredLanguage($availableLocales);

        App::setLocale($locale);

        return $next($request);
    }
}
