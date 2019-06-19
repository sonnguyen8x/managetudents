<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get data in Session, if null get default in config
        $language = Session::get('website_language', config('app.locale'));

        // Set language for APP
        App::setLocale($language, config('app.locale'));


        return $next($request);
    }
}
