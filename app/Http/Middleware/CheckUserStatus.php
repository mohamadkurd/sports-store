<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // اگر لاگین نیست
        if (!Auth::check()) {
            return redirect('/login2');
        }

        // اگر ادمین باشد
        if (Auth::user()->status == 1) {
            return $next($request);
        }

        // اگر کاربر عادی باشد
        return redirect('/'); // انتقال به صفحه اصلی سایت
    }
        
    }

