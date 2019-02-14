@extends('layouts.layout')

@section('content')

    <form action="{{ route('check.login') }}" method="post" >
        @csrf
        <input type="text" name="login" placeholder="Login"/><br>
        <input type="password"  name="password" placeholder="Password"/>
        @if (session('errorMessage'))
                {{ session('errorMessage') }}
        @endif
        <br>
        <button type="submit">
            Log in
        </button>
    </form>
@endsection
