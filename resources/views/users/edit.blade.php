@extends('layouts.layout')

@section('content')
    <div class="container">
        <h3>Edit user: {{ $user->login }}</h3>
        <form enctype="multipart/form-data" action="{{ route('user.save', $user->id)  }}" method="post">
            @csrf
            <div class="form-row mb-2">
                <div class="col">
                    <label for="login">Login</label>
                    <input type="text" class="form-control form-control-lg @if($errors->get('login') || session('uniqueError')) is-invalid @endif"
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
                <div class="col">
                    <label for="role">Role</label>
                    <select class="custom-select" name="role" id="role" size="2">
                        <option value="admin" @if($user->role) selected @endif>Admin</option>
                        <option value="user" @unless($user->role) selected @endunless>User</option>
                    </select>
                </div>
                <div class="col">
                    <label for="blocked">Blocked:</label>
                    <select class="custom-select " name="blocked" id="blocked" size="2">
                        <option value="yes" @if($user->blocked) selected @endif>Yes</option>
                        <option value="no" @unless($user->blocked) selected @endunless>No</option>
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
