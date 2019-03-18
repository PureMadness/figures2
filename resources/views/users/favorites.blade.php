@extends('layouts.layout')

@section('content')

    <div class="container text-center">
        @if (session('actionMessage'))
            <div class="alert alert-info">
                {{ session('actionMessage') }}
            </div>
        @endif
        @if (session('errorMessage'))
            <div class="alert alert-danger">
                {{ session('errorMessage') }}
            </div>
        @endif
    </div>
    <div class="container table-responsive text-center" id="table">
        @include('sections.table', [
        'figures' => isset($figures) ? $figures : null,
        'user' => \Illuminate\Support\Facades\Auth::user(),
        'fav' => true,
        ])
    </div>
@endsection
