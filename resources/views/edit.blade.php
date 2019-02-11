@extends('layouts.layout')
@section('content')
    <div class="add">
        <h3>Edit {{ $figure->type }} id = {{ $figure->id }}</h3>
        <form action="{{ route('figure.save')  }}" method="post">
            @csrf
            @includeIf('forms.' . $figure->type, [
            '$errors' => $errors,
            '$figure' => $figure,
            '$id' => $figure->id,
            ])
            <input type="hidden" name="type" value="{{ $figure->type }}">
            <input type="hidden" name="id" value="{{ $figure->id }}">
            <div>
                <button type="submit">
                    Edit
                </button>
            </div>
        </form>
    </div>
@endsection
