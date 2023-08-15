<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ApiLogin
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
         /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        $secret=DB::table('oauth_clients')
        ->where('id',"935f9ee6-6fc9-4c9e-a2db-7d3b0ed98a2c")
        ->pluck('secret')
        ->first();

        $request->merge([
            'grant_type'=>'password',
            'client_id'=>'935f9ee6-6fc9-4c9e-a2db-7d3b0ed98a2c',
            'client_secret'=>$secret
        ]);
        return $next($request);
    }
   
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
}
