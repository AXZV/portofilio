<?php

namespace App\Http\Middleware\role;
use Auth;
use Closure;

class Guru
{

    public function handle($request, Closure $next)
    {

        if(Auth::user()->role == 'Admin'){
            return redirect('/');
            }
        elseif (Auth::user()->role == 'Guru'){
            return $next($request);
        }
        elseif (Auth::user()->role == 'Siswa'){
            return redirect('/');
        }
    }
}
