@extends('layouts.signin')

@section('content')

    <form class="form-register m-auto" action="{{ route('check.password', $user) }}" method="post">
        @csrf
        <h1 class="text-center font-weight-normal">Enter new password:</h1>
            <div class="form-group row align-items-center">
                <div class="col-3">
                    <label for="password" class="col-input-label">Password</label>
                </div>
                <div class="col-9">
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
            </div>
            <div class="form-group row align-items-center">
                <div class="col-3">
                    <label for="confirmation" class="col-input-label">Retype</label>
                </div>
                <div class="col-9">
                    <input type="password" class="form-control form-control-lg" name="password_confirmation"
                       id="confirmation" placeholder="*************"/>
                </div>
            </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Change password
        </button>
    </form>

@endsection
