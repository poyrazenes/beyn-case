<?php

namespace App\Http\Middleware\Api\Mobile\V1;

use Illuminate\Http\Request;

use Closure;

class BeforeApp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // inject or setup required configs,
        // parameters or classes or packages.

        // Carbon::setLocale('');
        // App::setLocale('');

        // vs, vs...

        return $next($request);
    }
}
