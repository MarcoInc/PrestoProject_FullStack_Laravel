<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class setLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        $localeLanguage=session('locale','it'); //it -> lingua di default altrimenti mette locale
        App::setLocale($localeLanguage);
        // dd($localeLanguage);
        // dd(App::getLocale());

        return $next($request);
    }
}
