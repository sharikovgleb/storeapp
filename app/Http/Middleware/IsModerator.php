<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class IsModerator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && ( Auth::user()->checkRole('admin') || Auth::user()->checkRole('moderator'))) {
            return $next($request);
        }

        return redirect('/');
    }
}
