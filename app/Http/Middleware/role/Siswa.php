<?php

namespace App\Http\Middleware\role;
use Auth;
use Closure;

class Siswa
{

    public function handle($request, Closure $next)
    {

        if(Auth::user()->role == 'Admin'){
            return redirect('/');
            }
        elseif (Auth::user()->role == 'Guru'){
            return redirect('/');
        }
        elseif (Auth::user()->role == 'Siswa'){
            return $next($request);
        }
    }
}
