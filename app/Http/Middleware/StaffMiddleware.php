<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StaffMiddleware
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
            dd(auth()->user()->hasRole('staff'));
            if (auth()->user()->hasRole('staff')) {
                return $next($request);
            } else {
                return redirect('/')->with('info', 'You are not "Admin". So, you cannot access "Admin Section".');
            }
        }
    }
}