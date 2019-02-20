@extends('layouts.layout')

@section('content')

    <form class="form-signin" action="{{ route('check.register') }}" method="post">
        @csrf
        <h3 class="mb-3">Register new user</h3>
        <label class="mb-0" for="login">Login</label>
        <input type="text" class="form-control
            @if($errors->get('login'))
            is-invalid
            @endif" name="login" id="login" placeholder="Login"/>
        @if ($errors->get('login'))
            @foreach ($errors->get('login') as $error)
                <div class="invalid-feedback">
                    {{ $error }}<br/>
                </div>
            @endforeach
        @endif
        <label class="mb-0" for="password">Password</label>
        <input type="password" class="form-control
                @if($errors->get('password'))
                    is-invalid
                @endif" name="password" id="password" placeholder="Password"/>
        @if ($errors->get('password'))
            @foreach ($errors->get('password') as $error)
                <div class="invalid-feedback">
                {{ $error }}<br/>
                </div>
            @endforeach
        @endif
        <label class="mb-0" for="confirmation">Password confirmation</label>
        <input type="password" class="form-control mb-1" name="password_confirmation" id="confirmation" placeholder="Confirm password"/>
        <button type="submit" class="btn btn-primary btn-block">
            Register
        </button>
        </div>
        </div>
    </form>

@endsection
