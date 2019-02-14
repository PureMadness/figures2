@extends('layouts.layout')

@section('content')

    <h2>Register new user:</h2>
    <form action="{{ route('check.register') }}" method="post">
        @csrf
        <input type="text" name="login" placeholder="Login"/><br>
        @if ($errors->get('login'))
            @foreach ($errors->get('login') as $error)
                {{ $error }}<br/>
            @endforeach
        @endif
        <input type="password" name="password" placeholder="password"/><br>
        @if ($errors->get('password'))
            @foreach ($errors->get('password') as $error)
                {{ $error }}<br/>
            @endforeach
        @endif
        <input type="password" name="password_confirmation" placeholder="confirmed"/><br>
        <button type="submit">
            Register
        </button>
    </form>
@endsection
