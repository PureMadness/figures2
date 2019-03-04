<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\SaveUserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\ViewErrorBag;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /*return Validator::make($data, [
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);*/
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'login' => $data['login'],
            'password' => bcrypt($data['password']),
            'role' => 0,
            'blocked' => 0,
        ]);
    }

    public function register()
    {
        $errors = Session::pull('errors', new ViewErrorBag());
        //dd($errors);
        return view('auth/register', ['errors' => $errors]);
    }

    public function check(SaveUserRequest $request)
    {
        $data = $request->all();
        $this->create($data);
        return Redirect::route('login');
    }
}
