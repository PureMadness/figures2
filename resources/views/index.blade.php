@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="form-row justify-content-center">
            <div class="col">
                <label for="type">Select figure you want to add:</label>
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
                    <label for="showTypes" class="col-form-label">Type of figure</label>
                    <select class="custom-select col-6" name="showTypes[]" id="showTypes" multiple>
                        <option value="circle" @isset($circleCheck) selected @endisset>Circles</option>
                        <option value="square" @isset($squareCheck) selected @endisset>Squares</option>
                        <option value="triangle" @isset($triangleCheck) selected @endisset>Triangles</option>
                        <option value="rectangle" @isset($rectangleCheck) selected @endisset>Rectangles</option>
                    </select>
                </div>
                <div class="form-row col-12 col-md-4">
                    <label for="from" class="col-auto col-form-label">Area</label>
                    <div class="col-3">
                        <input type="text" class="col form-control" name="from" id="from"
                               value="@isset($from){{ $from }}@endisset" placeholder="from">
                    </div>
                    <div class="col-auto p-0"><h3>-</h3></div>
                    <div class="col-3">
                        <input type="text" class="form-control" name="to" id="to"
                               value="@isset($to){{ $to }}@endisset" placeholder="to">

                    </div>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="sort" class="col-form-label">Sort by area:</label>
                    <select class="col-8 custom-select" name="sort" id="sort" size="2">
                        <option value="asc" @if(isset($sort) && $sort == 'asc') selected @endif>Ascending</option>
                        <option value="desc" @if(isset($sort) && $sort == 'desc') selected @endif>Descending
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
    <div class="container">
        @unless(session('deleteNumber'))
        <form action="{{ route('confirmDL') }}" method="get">
            <div class="form-row">
                <label for="deleteValue" class="col-form-label">
                    Enter a value less than which you want to delete:
                </label>
                <div class="col-4">
                    <input type="text" class="form-control" id="deleteValue" name="deleteValue">
                </div>
                <button type="submit" class="btn btn-danger">
                    delete
                </button>
            </div>
        </form>
        @endunless
        @if(session('deleteNumber'))
            <div class="alert alert-danger mb-1">
                Do you realy want to delete {{ session('deleteNumber') }} figures?
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <form class="form-inline" action="{{ route('delete.less', session('value')) }}" method="get">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
                <div class="form-group">
                    <form class="col" action="{{ route('index') }}" method="get">
                        <button type="submit" class="btn btn-primary">No</button>
                    </form>
                </div>
            </div>
        @endif
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
                        <td>{{ $figure->area }}</td>
                        @if(isset($figure->image))
                            <td><img class="icon"
                                     src="{{ \Illuminate\Support\Facades\Storage::url($figure->image) }}"/>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <form action="{{ route('figure.edit', ['figure' => $figure->id,]) }}" method="get">
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
        @isset($figures)
            <div class="row justify-content-center">
                <div>
                    {{ $figures->appends([
                    'showTypes' => [
                        isset($circleCheck) ? 'circle' : null,
                        isset($squareCheck) ? 'square' : null,
                        isset($triangleCheck) ? 'triangle' : null,
                        isset($rectangleCheck) ? 'rectangle' : null
                        ],
                    'from' => isset($from) ? $from : null, 'to' => isset($to) ? $to : null,
                    'sort' => (isset($sort) && $sort === 'asc') ? 'asc' : (isset($sort) && $sort === 'desc' ? 'desc' : null),
                    ])->links() }}
                </div>
            </div>
        @endisset
    </div>
@endsection
