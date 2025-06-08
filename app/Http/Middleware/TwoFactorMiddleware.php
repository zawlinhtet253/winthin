<?php

// app/Http/Middleware/TwoFactorMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class TwoFactorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->google2fa_secret && !Session::get('2fa_verified')) {
            return redirect()->route('2fa.verify');
        }

        return $next($request);
    }
}

