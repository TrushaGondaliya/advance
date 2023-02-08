<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->user()->isAdmin());
        if($request->user() != null && $request->user()->isAdmin()){
            return $next($request);
        }

        return redirect()->back()->withErrors('you are not admin user, only admin user can access');
    }
}
