<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;


        if (Auth::guard('admin')->check()) {
            return redirect("admin/dashboard"); // Menggunakan double quotes agar variabel $guard dievaluasi
        } else if (Auth::guard('cashier')->check()) {
            return redirect("cashier/medicines"); // Menggunakan double quotes agar variabel $guard dievaluasi

        }

        return $next($request);
    }
}
