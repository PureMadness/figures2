@extends('layouts.layout')
@section('content')
    <div class="container">
        <h3>Edit {{ $figure->type }} id = {{ $figure->id }}</h3>
        <form enctype="multipart/form-data" action="{{ route('figure.save', $figure->id)  }}" method="post">
            @csrf
            @includeIf('forms.' . $figure->type, [
            '$errors' => $errors,
            '$figure' => $figure,
            '$id' => $figure->id,
            ])
            <div class="form-group my-1">
            <input type="file" class="form-control-file" accept="image/*" name="image">

            @if($figure->image !== null)
                    Old image:<img class="image" src="{{ \Illuminate\Support\Facades\Storage::url($figure->image) }}"/>
            @endif
            @if ($errors->get('image'))
                @foreach ($errors->get('image') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            </div>
            <input type="hidden" name="type" value="{{ $figure->type }}">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Edit
                </button>
            </div>
        </form>
    </div>
@endsection
