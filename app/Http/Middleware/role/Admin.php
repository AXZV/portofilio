<?php

namespace App\Http\Middleware\role;
use Auth;
use Closure;

class Admin
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
        // if (Auth::check() && Auth::user()->role == 'user' ) {
        //     return redirect()->route('/home');
        // }
        // elseif (Auth::check() && Auth::user()->role == 5) {
        //     return redirect()->route('/admin/admin_dasboard');
        // }
        // else {
        //     return redirect()->route('login');
        // }

        if(Auth::user()->role == 'admin'){
            return $next($request);
            }
        elseif (Auth::user()->role == 'user'){
            return redirect('/home');
        }

        
    }
}
