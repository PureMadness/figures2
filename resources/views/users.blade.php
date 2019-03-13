@extends('layouts.layout')

@section('content')

    <div class="container align-items-center">
        @if (session('actionMessage'))
            <div class="alert alert-info">
                {{ session('actionMessage') }}
            </div>
        @endif
        <div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Login</th>
                    <th>Role</th>
                    <th>Status</th>
                    @if(\Illuminate\Support\Facades\Auth::user()->role)
                        <th></th>
                        <th></th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('user.figures', $user) }}">{{ $user->login }}</a></td>
                        <td>@if($user->role) Admin @else User @endif</td>
                        @if($user->blocked)
                            <td class="text-danger">Blocked</td>
                        @else
                            <td class="text-info">Not Blocked</td>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role)
                            <td>
                                <form action="{{ route('user.edit', ['user' => $user->id,]) }}" method="get">
                                    <button type="submit" class="btn btn-primary btn-sm">edit</button>
                                </form>
                            </td>
                            @if($user->id === 1)
                                <td></td>
                            @else
                                <td>
                                    <form action="{{ route('user.delete', ['user' => $user->id,]) }}" method="get">
                                        <button type="submit" class="btn btn-danger btn-sm">del</button>
                                    </form>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

@endsection
