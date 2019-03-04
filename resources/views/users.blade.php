@extends('layouts.layout')

@section('content')

    <div class="container">
        <div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Login</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->login }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
