@extends('layouts.layout')
@section('content')
    <div>
        <table>
            <tr>
                <th>Type of Figure</th>
                <th>% of all</th>
            </tr>
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
        </table>
    </div>
@endsection
