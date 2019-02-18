@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="align-items-center">
            <p>Select figure you want to add:</p>
            <form action="{{  route('figure.addForm') }}" method="get">
                <select class="custom-select col-sm-2" name="type">
                    <option value="circle">Circle</option>
                    <option value="square">Square</option>
                    <option value="triangle">Triangle</option>
                    <option value="rectangle">Rectangle</option>
                </select>
                <button type="submit" class=" btn btn-primary">
                    Add
                </button>
            </form>
        </div>
    </div>

    @if (session('actionMessage'))
        <div class="alert alert-info">
            {{ session('actionMessage') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            {{ $figures->links() }}
        </div>
        <table class="table table-sm table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Type of figure</th>
                <th>Data</th>
                <th>Area</th>
                <th>Image</th>
                <th>Delete?</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($figures as $figure)
                <tr name="id" value="{{ $figure->id }}">
                    <td>{{ $figure->type }}</td>
                    <td>{{ print_r($figure['data'], true) }}</td>
                    <td>{{ $figure->getArea() }}</td>
                    @if(isset($figure->image))
                        <td><img class="image" src="{{ \Illuminate\Support\Facades\Storage::url($figure->image) }}"/>
                        </td>
                    @else
                        <td></td>
                    @endif
                    <td>
                        <form action="{{  route('delete', $figure->id) }}" method="get">
                            <button type="submit" class="btn btn-danger">DEL</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('figure.edit', [
                     'figure' => $figure->id,
                    ]) }}" method="get">
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection