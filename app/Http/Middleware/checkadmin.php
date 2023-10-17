<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Staff;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class checkadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => 
        $request->password], $request->remember)) {
        return redirect()->intended(route('admin.dashboard'));
    }
        return $next($request);
    }
}
