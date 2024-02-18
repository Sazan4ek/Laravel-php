<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('AdminToken');
        if($token === "secretToken") 
        {
            if(!$request->is('api/admin/*')) return redirect('api/admin/'.substr($request->path(), 4));
            else return $next($request);
        }

        if($request->is('api/admin/*')) return back(302);

        return $next($request);
    }
}
