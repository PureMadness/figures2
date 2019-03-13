<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\Figure;
use App\Models\User;
use http\Exception\BadMethodCallException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ViewErrorBag;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'login', 'role', 'blocked')->paginate(10);
        return view('users', ['users' => $users]);
    }

    public function save(User $user, EditUserRequest $request)
    {
        if ($request->login !== $user->login && count(User::where('login', $request->login)->get()) === 1) {
            return Redirect::route('user.edit', ['user' => $user])
                ->with('uniqueError', 'login must be unique');
        }
        $user->login = $request->login;
        switch ($request->role) {
            case 'user':
                $user->role = 0;
                break;
            case 'admin':
                $user->role = 1;
                break;
            default:
                throw new BadRequestHttpException('Unknown role ' . $request->role);
        }
        $user->blocked = $request->blocked === 'yes' ? true : false;
        $user->save();
        return Redirect::route('users')
            ->with('actionMessage', 'Edited user with id = ' . $user->id);
    }

    public function edit(User $user)
    {
        /** @var ViewErrorBag $errors */

        $errors = Session::pull('errors', new ViewErrorBag());
        return view('users.edit', [
            'user' => $user,
            'errors' => $errors,
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
        return Redirect::route('users')
            ->with('actionMessage', $user->login . ' was deleted!!!');
    }

    public function favorites()
    {
        $figures = Auth::user()->favorites()->paginate(15);
        return view('users.favorites', ['figures' => $figures]);
    }

    public function addFavorite(Figure $figure){
        if (Gate::denies('canAddFav', $figure)) {
            return Redirect::route('index')
                ->with('errorMessage', 'U can\'t add to favorites your figures !!!');
        }
        Auth::user()->favorites()->attach($figure);
        return Redirect::to(session()->get('_previous')['url'])
            ->with('actionMessage', $figure->id . ' figure was added to your favorite!!!');
    }

    public function deleteFavorite(Figure $figure){
        Auth::user()->favorites()->detach($figure);
        return Redirect::to(session()->get('_previous')['url'])
            ->with('actionMessage', $figure->id . ' figure was deleted from your favorite!!!');
    }
}
