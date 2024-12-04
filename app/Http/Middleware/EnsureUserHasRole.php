<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            // Kiểm tra vai trò của người dùng
            if ($userRole === 'admin') {
                // Người dùng là admin
                return redirect()->route('admin.index');
            } elseif ($userRole === 'member') {
                // Người dùng là client
                return redirect()->route('Client.home');
            } else {
                // Không phải admin hoặc client
                return redirect()->route('login')->with(['message' => 'Bạn không có quyền truy cập']);
            }
        }

        // Người dùng chưa đăng nhập
        return redirect()->route('login')->with(['message' => 'Bạn phải đăng nhập trước']);
    }
}
