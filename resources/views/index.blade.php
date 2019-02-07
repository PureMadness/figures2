@extends('layouts.layout')
@section('content')
    <div>
        <h4>Select figure you want to add:</h4>
        <div style="margin-top: 10px">
        <form action="{{  route('figure.addForm') }}" method="get">
            <select name="figure">
                <option value="circle">Circle</option>
                <option value="square">Square</option>
                <option value="triangle">Triangle</option>
                <option value="rectangle">Rectangle</option>
            </select>
            <button type="submit">
                Add
            </button>
        </form>
            <a href="/statistics">Статистика</a>
        </div>
    </div>

    @if (session('myMessage'))
        <div class="alert alert-success">
            {{ session('myMessage') }}
        </div>
    @endif

    <table>
        <tr>
            <td>Type of figure</td>
            <td>Data</td>
            <td>Area</td>
            <td>Delete?</td>
        </tr>
        @foreach($figures as $figure)
            <tr name="id" value="{{ $figure->id }}">
                <td>{{ $figure->type }}</td>
                <td>{{ print_r($figure['data'], true) }}</td>
                <td>{{ $figure->getArea() }}</td>
                <td>
                    <form action="{{  route('delete', $figure->id) }}" method="get">
                        <button type="submit">DEL</button>
                    </form>
                </td>
                </tr>
        @endforeach
    </table>
    {{ $figures->links() }}
@endsection
