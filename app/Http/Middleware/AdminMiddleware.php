<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
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
        if (!Auth::check()) {
            if ($request) {
                Session::put('previousURL', $request->path());

                return redirect()->route('login');
            }
        } else {
            if (auth()->user()->hasRole('admin')) {
                return $next($request);
            } else {
                return redirect('/')->with('info', 'You are "Staff". So, you cannot access "Admin Section".');
            }
        }
    }
}