@extends('layouts.signin')

@section('content')

    <form class="form-register m-auto" action="{{ route('check.register') }}" method="post">
        @csrf
        <h2 class="mb-3 text-center">Register new user</h2>
        <div class="from-row">
            <div class="form-group">
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
            </div>
        </div>
        <div class="from-row">
            <div class="form-group">
                <label class="mb-0" for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email address"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label class="mb-0" for="password">Password</label>
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
                <label class="mb-0" for="confirmation">Retype pass</label>
                <input type="password" class="form-control form-control-lg mb-1" name="password_confirmation" id="confirmation" placeholder="*************"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Register
        </button>
        </div>
        </div>
    </form>

@endsection
