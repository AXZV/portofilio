<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function username()
    {
        return 'username';
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    // protected $redirectTo;
    protected $redirectTo;
    public function redirectTo()
    {
        if (Auth::user()->role == 'Admin' ) {
            return $redirectTo = '/dasboard_admin';
        }
        elseif (Auth::user()->role == 'Guru') {
            return $redirectTo = '/dasboard_guru';
        }
        elseif (Auth::user()->role == 'Siswa') {
            return $redirectTo = '/dasboard_siswa';
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
