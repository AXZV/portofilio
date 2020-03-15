<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Session;
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
        if (Auth::user()->role == 'Admin' && Auth::user()->deleted_at == NULL) {
            return $redirectTo = '/dasboard_admin';
        }
        elseif (Auth::user()->role == 'Guru'&& Auth::user()->deleted_at == NULL) {
            return $redirectTo = '/dasboard_guru';
        }
        elseif (Auth::user()->role == 'Siswa' && Auth::user()->deleted_at == NULL) {
            return $redirectTo = '/dasboard_siswa';
        }
        else
        {
            Auth::logout();
            Session::flash('gagal_login', True);
            return $redirectTo = '/login';
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
