<?php

namespace App\Http\Middleware;

use Closure;

class ParkplanMiddleware
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
        $parkplan = $request->user()->parkplans()->find($request->route('parkplan'));

        if ($request->route('parkplan') && !$parkplan) {
            return redirect('account');
        }

        return $next($request);
    }
}
