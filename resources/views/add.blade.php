@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <h3>Add new {{ $type }}</h3>
        </div>

        <form enctype="multipart/form-data" action="{{ route('figure.save')  }}" method="post">
            @csrf
            @includeIf('forms.' . $type, ['$errors' => $errors])
            <div class="form-group my-1">
                <input type="file" class="form-control-file" accept="image/*" name="image">
                @if ($errors->get('image'))
                    @foreach ($errors->get('image') as $error)
                        {{ $error }}<br/>
                    @endforeach
                @endif
            </div>
            <input type="hidden" name="type" value="{{ $type }}">

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Add
                </button>
            </div>
        </form>
    </div>
@endsection
