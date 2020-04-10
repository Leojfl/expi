<?php

namespace App\Http\Middleware;

use App\Models\Rol;
use App\Providers\RouteServiceProvider;
use Closure;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->fk_id_rol != Rol::ADMIN) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
