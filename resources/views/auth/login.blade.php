@extends('layouts.layout')

@section('content')

    <form action="{{ route('check.login') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <label for="login" class="col-sm-2">Login:</label>
                <input type="text" class="form-control col-sm-2" name="login" placeholder="Login"/><br>
            </div>
            <div class="row">
                <label for="password" class="col-sm-2">Password:</label>
                <input type="password" class="form-control col-sm-2" name="password" placeholder="Password"/>
            </div>
            @if (session('errorMessage'))
                {{ session('errorMessage') }}
            @endif
            <div class="row">
                <button type="submit" class="btn btn-primary offset-sm-2">
                    Log in
                </button>
            </div>
        </div>
    </form>
@endsection
