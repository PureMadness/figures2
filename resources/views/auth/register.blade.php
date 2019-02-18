@extends('layouts.layout')

@section('content')

    <form class="form-signin" action="{{ route('check.register') }}" method="post">
        @csrf
        <h3 class="mb-3">Register new user</h3>
        <input type="text" class="form-control" name="login" placeholder="Login"/>
        @if ($errors->get('login'))
            @foreach ($errors->get('login') as $error)
                {{ $error }}<br/>
            @endforeach
        @endif
        <input type="password" class="form-control" name="password" placeholder="Password"/>
        @if ($errors->get('password'))
            @foreach ($errors->get('password') as $error)
                {{ $error }}<br/>
            @endforeach
        @endif
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password"/>
        <button type="submit" class="btn btn-primary btn-block">
            Register
        </button>
        </div>
        </div>
    </form>

@endsection
