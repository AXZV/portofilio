<?php

namespace App\Http\Middleware\role;
use Auth;
use Closure;

class User
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
        if(Auth::user()->role == 'user'){
            return $next($request);
        }
        elseif (Auth::user()->role == 'admin'){
            return redirect('/admin_dasboard');
        }

        // if (Auth::user()->role == 'admin'){
        //     return redirect('/admin_dasboard');
        // }
    }
}
