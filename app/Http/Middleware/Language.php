<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;
use App;

class Language
{
    /**
     * Handle an incoming request.
     * Set the locale according to the current session, or, if not already set,
     * to the browser language.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('locale')){
            $locale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            $locales = explode(',', Config::get('app.locales'));
            $language = (in_array($locale, $locales))? $locale : Config::get('app.locales_fallback');
            Session::put('locale', $language);
        }else{
            $language = Session::get('locale', Config::get('app.locale'));
        }
        App::setLocale($language);

        return $next($request);
    }
}
