@extends('layouts.layout')

@section('content')

    <h2>Register new user:</h2>
    <form action="{{ route('check.register') }}" method="post">
        <div class="form-group">
            @csrf
            <div class="row">
                <label for="login" class="col-sm-2">Enter login:</label>
                <input type="text" class="form-control col-sm-2" name="login" placeholder="Login"/><br>
            </div>
            @if ($errors->get('login'))
                @foreach ($errors->get('login') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            <div class="row">
                <label for="Password" class="col-sm-2">Password:</label>
                <input type="password" class="form-control col-sm-2" name="password" placeholder="password"/><br>
            </div>
            @if ($errors->get('password'))
                @foreach ($errors->get('password') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            <div class="row">
                <label for="password_confirmation" class="col-sm-2">Confirm password:</label>
                <input type="password" class="form-control col-sm-2" name="password_confirmation"/><br>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary offset-sm-2">
                    Register
                </button>
            </div>
        </div>
    </form>

@endsection
