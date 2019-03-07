@extends('layouts.layout')

@section('content')
    <div class="container">
        <h3>Edit user: {{ $user->login }}</h3>
        <form enctype="multipart/form-data" action="{{ route('user.save', $user->id)  }}" method="post">
            @csrf
            <div class="form-row mb-2">
                <div class="col-4">
                    <label for="login">Login</label>
                    <input type="text"
                           class="form-control form-control-lg @if($errors->get('login') || session('uniqueError')) is-invalid @endif"
                           name="login" id="login" placeholder="Login" value="{{ $user->login }}"/>
                    @if ($errors->get('login'))
                        @foreach ($errors->get('login') as $error)
                            <div class="invalid-feedback">
                                {{ $error }}<br/>
                            </div>
                        @endforeach
                    @endif
                    @if (session('uniqueError'))
                        <div class="invalid-feedback">
                            {{ session('uniqueError') }}
                        </div>
                    @endif
                </div>
                <div class="col-auto">
                    <label for="role">Role:</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="role" name="role" value="admin" @if($user->role) checked @endif>Admin</input>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="role" name="role" value="user" @unless($user->role) checked @endunless>User</input>
                    </div>
                </div>
                <div class="col-auto">
                    <label for="blocked">Blocked</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="blocked" name="blocked" value="yes" @if($user->blocked) checked @endif>Yes</input>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="blocked" name="blocked" value="no" @unless($user->blocked) checked @endunless>No</input>
                    </div>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <button class="col-3 btn btn-primary btn-block" type="submit">
                    Edit
                </button>
            </div>
        </form>
    </div>
@endsection
