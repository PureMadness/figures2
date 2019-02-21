@extends('layouts.signin')

@section('content')
    <form class="form-signin m-auto" action="{{ route('check.login') }}" method="post">
        @csrf
        <h1 class="font-weight-normal text-center">Please log in</h1>
        <div class="form-group mb-0">
            <label class="mb-0 sr-only" for="login">Login</label>
            <input type="text" class="form-control form-control-lg
                @if(session('errorMessage'))
                            is-invalid
                @endif" name="login" id="login" placeholder="Login"/>
            <label class="sr-only" for="password">Password</label>
            <input type="password" class="form-control form-control-lg
                @if(session('errorMessage'))
                    is-invalid
                @endif" name="password" id="password" placeholder="Password"/>
            @if (session('errorMessage'))
                <div class="invalid-feedback">
                    {{ session('errorMessage') }}
                </div>
            @endif
        </div>
        <div class="form-group mt-0">
            <a href="text">Forgot password?</a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block">
                Log in
            </button>
        </div>
        <div class="form-group text-center">
            <a href="{{ route('register') }}">Don't have an account?</a>
        </div>
    </form>
@endsection
