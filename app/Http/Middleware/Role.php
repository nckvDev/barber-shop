<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
//        return $next($request);
      if (!Auth::check()) // This is not necessary, it should be part of your 'auth' middleware
        return redirect('/');

      $user = Auth::user();
      if($user->role == $role)
        return $next($request);

      return redirect('/');
    }
}
