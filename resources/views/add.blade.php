@extends('layouts.layout')
@section('content')
    <div class="add">
        <h3>Add new {{ $type }}</h3>
        <form enctype="multipart/form-data" action="{{ route('figure.save')  }}" method="post">
            @csrf
            @includeIf('forms.' . $type, ['$errors' => $errors])
                <input type="hidden" name="type" value="{{ $type }}">

                <input type="file" accept="image/*" name="data.file">
                <div>
                <button type="submit">
                    Add
                </button>
                </div>
        </form>
    </div>
@endsection
