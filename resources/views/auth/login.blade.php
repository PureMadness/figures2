@extends('layouts.layout')

@section('content')
    <form class="form-signin" action="{{ route('check.login') }}" method="post">
        @csrf
        <h3 class="mb-3 font-weight-normal">Please log in</h3>
        <label class="mb-0" for="login">Login</label>
        <input type="text" class="form-control
            @if(session('errorMessage'))
                        is-invalid
            @endif" name="login" id="login" placeholder="Login"/>
        <label class="mb-0" for="password">Password</label>
        <input type="password" class="form-control mb-1
            @if(session('errorMessage'))
                is-invalid
            @endif" name="password" id="password" placeholder="Password"/>
        @if (session('errorMessage'))
            <div class="invalid-feedback">
                {{ session('errorMessage') }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary btn-block">
            Log in
        </button>
    </form>
@endsection
