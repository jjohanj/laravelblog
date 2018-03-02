<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Localization
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
        if (Session::has('locale') AND array_key_exists(Session::get('locale'), Config::get('languages'))) {
            App::setLocale(Session::get('locale'));
        }

        return $next($request);

    }

    //
    //   if ($request->session()->has('locale')) {
    //       \App::setLocale($request->session()->has('locale'));
    //
    //       // You also can set the Carbon locale
    //       //Carbon::setLocale(\Session::get('locale'));
    //   }
    //   $locale = \App::getLocale();
    //   dd($request);
    //   return $next($request);
    // }
}
