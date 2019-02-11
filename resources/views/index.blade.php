@extends('layouts.layout')
@section('content')
    <div class="selectFigure">
        Select figure you want to add:
        <form action="{{  route('figure.addForm') }}" method="get">
            <select name="type">
                <option value="circle">Circle</option>
                <option value="square">Square</option>
                <option value="triangle">Triangle</option>
                <option value="rectangle">Rectangle</option>
            </select>
            <button type="submit">
                Add
            </button>
        </form>
    </div>

    @if (session('actionMessage'))
        <div class="alert alert-success">
            {{ session('actionMessage') }}
        </div>
    @endif

    <table>
        <tr>
            <th>Type of figure</th>
            <th>Data</th>
            <th>Area</th>
            <th>Delete?</th>
            <th></th>
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
                <td>
                    <form action="{{ route('figure.edit', [
                     'figure' => $figure->id,
                    ]) }}" method="get">
                        <button type="submit">Edit</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $figures->links() }}
@endsection
