<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class SupperAdminMiddleware
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
        if (auth()->user()->role != User::SUPPER_ADMIN_ROLE) {
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
