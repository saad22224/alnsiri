<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
    // تحقق إذا كان المستخدم مسجلاً باستخدام الحماية "admin" الخاصة بالـ Admin
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin')->with('error', 'You must be an admin to access this page.');
    }

    return $next($request);
}

}
