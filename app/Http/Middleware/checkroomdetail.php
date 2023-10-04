<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class checkroomdetail
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
            if (route('roomdetail')){
                echo "";
            }else {
                return redirect()->route('roomdetail');
            }
        }else {
            return redirect()->route('unregisroomdetail');
        }
        return $next($request);
    }
}
