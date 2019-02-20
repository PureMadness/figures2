@extends('layouts.layout')
@section('content')
    <div class="container mb-2">
        <div class="row justify-content-center">
            <div class="col col-auto">
                <p>Select figure you want to add:</p>
            </div>
            <div class="col">
                <form action="{{  route('figure.addForm') }}" method="get">
                    <select class="custom-select col-md-3" name="type">
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
    </div>

    <div class="container mb-4">
        <h3>Filters:</h3>
        <form action="{{ route('index') }}" method="get">
            <div class="form-row align-items-center">
                <div class="col-auto mr-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="circleCheck" @isset($circleCheck) checked @endisset id="circle">
                        <label class="form-check-label" for="circle">
                            circle
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="squareCheck" @isset($squareCheck) checked @endisset id="square">
                        <label class="form-check-label" for="square">
                            square
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="triangleCheck" @isset($triangleCheck) checked @endisset id="triangle">
                        <label class="form-check-label" for="triangle">
                            triangle
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rectangleCheck" @isset($rectangleCheck) checked @endisset id="rectangle">
                        <label class="form-check-label" for="rectangle">
                            rectangle
                        </label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="col-3">
                        <label for="from">From</label>
                        <input type="text" name="from" id="from" value="@isset($from){{ $from }}@endisset" placeholder="from">
                    </div>
                    <div class="col-3">
                        <label for="from">to</label>
                        <input type="text" name="to" id="to" value="@isset($to){{ $to }}@endisset" placeholder="to">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="asc" @if(isset($compare) && $compare === 'asc')) checked @endif name="compare" id="asc">
                        <label class="form-check-label" for="more">
                            >
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="desc" @if(isset($compare) && $compare === 'desc')) checked @endif name="compare" id="desc">
                        <label class="form-check-label" for="desc">
                            <
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-primary btn-lg">
                    Filter
                </button>
            </div>
        </form>
    </div>

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
    <div class="container">
        <table class="table table-sm table-bordered table-striped table-hover">
            <thead>
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
                            <button type="submit" class="btn btn-danger btn-sm">DEL</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('figure.edit', [
                     'figure' => $figure->id,
                    ]) }}" method="get">
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
