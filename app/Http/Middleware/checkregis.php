<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class checkregis
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $client = DB::table('clients')->where('role', 'tenant')->where('id', Auth::user()->id)->first();

        if($client != null){
            if (route('dashboard')){
                echo "";
            }else {
                return redirect()->route('dashboard');
            }
        }else {
            return redirect()->route('newdashboard');
        }
        return $next($request);
    }
}
