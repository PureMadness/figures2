<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Mail\RestoreLinkShipped;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ViewErrorBag;

class MailController extends Controller
{
    //public static $restoreMessage = '';

    public function restore()
    {
        return view('password.restore');
    }

    public function send(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!isset($user)) {
            return Redirect::route('restore')
                ->with('errorMessage', 'No match user with this email');
        } else {
            Mail::to($user)->send(new RestoreLinkShipped($user));
            return Redirect::route('restore')
                ->with('returnMessage', 'We send mail on u\'r email. Go check out!');
        }
    }

    public function change(User $user)
    {
        $errors = Session::pull('errors', new ViewErrorBag());

        return view('password/changePassword', [
            'errors' => $errors,
            'user' => $user,
        ]);
    }


    public function check(User $user, ChangePasswordRequest $request)
    {
        $user->password = bcrypt($request->password);
        //dd($user);
        $user->save();
        return Redirect::route('login');
    }
}
