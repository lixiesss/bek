<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_logged_in')) {
            return redirect(env('FRONTEND_URL') . '/login');
        }

        return $next($request);
    }
}
