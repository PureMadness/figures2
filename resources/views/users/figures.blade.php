@extends('layouts.layout')

@section('content')

    <div class="container table-responsive text-center">
        @include('sections.table', ['figures' => isset($figures) ? $figures : null, 'user' => \Illuminate\Support\Facades\Auth::user(),])
        @isset($figures)
            <div class="row justify-content-center">
                <div>
                    {{ $figures->links() }}
                </div>
            </div>
        @endisset
    </div>
@endsection
