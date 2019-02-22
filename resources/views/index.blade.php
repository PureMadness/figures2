@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <label class="" for="type">Select figure you want to add:</label>
                <form action="{{  route('figure.addForm') }}" method="get">
                    <select class="custom-select col-6 col-md-3" name="type" id="type">
                        <option value="circle">Circle</option>
                        <option value="square">Square</option>
                        <option value="triangle">Triangle</option>
                        <option value="rectangle">Rectangle</option>
                    </select>
                    <button type="submit" class="col-auto btn btn-primary ">
                        Add
                    </button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="container mb-4">
        <form action="{{ route('index') }}" method="get">
            <div class="form-row align-items-center">
                <div class="form-group col-12 col-md-4">
                    <label for="showTypes" class="col-form-label col-auto">Type of figure</label>
                    <select class="custom-select col-6" name="showTypes[]" id="showTypes" multiple>
                        <option value="circle" @isset($circleCheck) selected @endisset>Circles</option>
                        <option value="square" @isset($squareCheck) selected @endisset>Squares</option>
                        <option value="triangle" @isset($triangleCheck) selected @endisset>Triangles</option>
                        <option value="rectangle" @isset($rectangleCheck) selected @endisset>Rectangles</option>
                    </select>
                </div>
                <div class="form-group row col-12 col-md-4">
                    <label for="from" class="col col-3 col-form-label">Area</label>
                        <div class="col-9 row">
                            <input type="text" class="col col-9 form-control" name="from" id="from"
                                   value="@isset($from){{ $from }}@endisset" placeholder="from">
                        </div>
                        <div class="col-auto p-0"><h3>-</h3></div>
                        <div class="col-">
                            <input type="text" class="form-control" name="to" id="to"
                                   value="@isset($to){{ $to }}@endisset" placeholder="to">

                    </div>
                </div>
                <div class="form-group align-items-center">
                    <label for="compare" class="col-form-label">Sort by area:</label>
                    <select class="col-8 custom-select" name="compare" id="compare" size="2">
                        <option value="asc" @if(isset($compare) && $compare == 'asc') selected @endif>Ascending</option>
                        <option value="desc" @if(isset($compare) && $compare == 'desc') selected @endif>Descending
                        </option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
    <hr>
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
    <div class="container table-responsive text-center">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Type of figure</th>
                <th>Data</th>
                <th>Area</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @isset($figures)
                @foreach($figures as $figure)
                    <tr>
                        <td>{{ $figure->id }}</td>
                        <td>{{ $figure->type }}</td>
                        <td>{{ print_r($figure['data'], true) }}</td>
                        <td>{{ $figure->getArea() }}</td>
                        @if(isset($figure->image))
                            <td><img class="image"
                                     src="{{ \Illuminate\Support\Facades\Storage::url($figure->image) }}"/>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <form action="{{ route('figure.edit', [
                     'figure' => $figure->id,
                    ]) }}" method="get">
                                <button type="submit" class="btn btn-primary btn-sm">edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{  route('delete', $figure->id) }}" method="get">
                                <button type="submit" class="btn  btn-danger btn-sm">del</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>

    </div>
@endsection
