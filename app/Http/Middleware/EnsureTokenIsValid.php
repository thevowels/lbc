<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $token='token', string $secret='secret'): Response
    {
        if($request->input('token') !== $token || $request->input('secret') !== $secret){
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
