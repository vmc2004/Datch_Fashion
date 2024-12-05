<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsMember
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'member') {
            return $next($request);
        }

        return redirect()->route('Client.account.login'); // Chuyển hướng nếu không phải Client
    }
}

?>