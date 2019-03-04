@extends('layouts.layout')
@section('content')
    <div class="container">
        <div>
            <table class=" table table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Type of Figure</th>
                    <th>% of all</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Circles</td>
                    <td>{{ $areas['circle']/$allArea * 100 . ' %' }}</td>
                </tr>
                <tr>
                    <td>Squares</td>
                    <td>{{ $areas['square']/$allArea * 100 . ' %' }}</td>
                </tr>
                <tr>
                    <td>Rectangles</td>
                    <td>{{ $areas['rectangle']/$allArea * 100 . ' %' }}</td>
                </tr>
                <tr>
                    <td>Triangle</td>
                    <td>{{ $areas['triangle']/$allArea * 100 . ' %' }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
