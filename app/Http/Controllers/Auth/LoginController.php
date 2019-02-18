<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    public function username()
    {
        return 'login';
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

    public function auth()
    {
        return view('auth/login');
    }

    public function check(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['login' => $data['login'], 'password' => $data['password']]))
        {
            return Redirect::route('index');
        };
        return Redirect::route('login')->with('errorMessage', 'Login or password isnt correct!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::route('index');
    }
}
