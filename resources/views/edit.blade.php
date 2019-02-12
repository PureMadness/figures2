@extends('layouts.layout')
@section('content')
    <div class="add">
        <h3>Edit {{ $figure->type }} id = {{ $figure->id }}</h3>
        <form enctype="multipart/form-data" action="{{ route('figure.save', $figure->id)  }}" method="post">
            @csrf
            @includeIf('forms.' . $figure->type, [
            '$errors' => $errors,
            '$figure' => $figure,
            '$id' => $figure->id,
            ])
            <input type="file" accept="image/*" name="image" />
            @if ($errors->get('image'))
                @foreach ($errors->get('image') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            <input type="hidden" name="type" value="{{ $figure->type }}">
            <div>
                <button type="submit">
                    Edit
                </button>
            </div>
        </form>
    </div>
@endsection
