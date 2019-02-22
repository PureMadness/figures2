@extends('layouts.signin')

@section('content')

    <form class="m-auto" action="{{ route('send') }}" method="get">

        @if (session('returnMessage'))
            <div class="alert alert-info">
                {{ session('returnMessage') }}
            </div>
        @else
            <h1 class="font-weight-normal">Forgot password?</h1>
            <div class="form-group">
                <label for="email">Enter your email:</label>
                <input type="text" class="form-control @if(session('errorMessage')) is-invalid @endif" name="email"
                       id="email"
                       placeholder="Email address">
                @if(session('errorMessage'))
                    <div class="invalid-feedback">
                        {{ session('errorMessage') }}<br/>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    Send
                </button>
            </div>
        @endif
        </form>

@endsection
