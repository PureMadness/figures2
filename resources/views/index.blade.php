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
    <div class="container table-responsive text-center" id="table">
        @include('sections.table',
         [
            'figures' => isset($figures) ? $figures : null,
            'user' => \Illuminate\Support\Facades\Auth::user(),
         ])
    </div>
@endsection
