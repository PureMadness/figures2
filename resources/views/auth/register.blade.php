@extends('layouts.signin')

@section('content')

    <form class="form-register m-auto" action="{{ route('check.register') }}" method="post">
        @csrf
        <h2 class="mb-3 text-center">Register new user</h2>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="login">Login</label>
                <input type="text" class="form-control form-control-lg
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
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="email">Email</label>
                <input type="text" class="form-control form-control-lg
                 @if($errors->get('email'))
                    is-invalid
                    @endif" name="email" id="email" placeholder="Email address"/>
                @if ($errors->get('email'))
                    @foreach ($errors->get('email') as $error)
                        <div class="invalid-feedback">
                            {{ $error }}<br/>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="password">Password</label>
                <input type="password" class="form-control form-control-lg
                        @if($errors->get('password'))
                            is-invalid
                        @endif" name="password" id="password" placeholder="*************"/>
                @if ($errors->get('password'))
                    @foreach ($errors->get('password') as $error)
                        <div class="invalid-feedback">
                        {{ $error }}<br/>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="form-group col-6">
                <label for="confirmation">Retype pass</label>
                <input type="password" class="form-control form-control-lg mb-1" name="password_confirmation" id="confirmation" placeholder="*************"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Register
        </button>
    </form>

@endsection
