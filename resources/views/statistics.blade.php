@extends('layouts.layout')
@section('content')
<table>
    <tr>
        <td>Type of Figure</td>
        <td>% of all</td>
    </tr>
    <tr>
        <td>Circles</td>
        <td>{{ ($areasSum['circle']/$areas) * 100 }}</td>
    </tr>
    <tr>
        <td>Squares</td>
        <td>{{ ($areasSum['square']/$areas) * 100 }}</td>
    </tr>
    <tr>
        <td>Rectangles</td>
        <td>{{ ($areasSum['rectangle']/$areas) * 100 }}</td>
    </tr>
    <tr>
        <td>Triangle</td>
        <td>{{ ($areasSum['triangle']/$areas) * 100 }}</td>
    </tr>
</table>

@endsection
