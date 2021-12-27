<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class AdminMiddleware
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
        if (auth()->user()->role != User::ADMIN_ROLE && auth()->user()->role != User::SUPPER_ADMIN_ROLE) {
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
