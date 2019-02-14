@extends('layouts.layout')
@section('content')
    <div class="add">
        <h3>Add new {{ $type }}</h3>
        <form enctype="multipart/form-data" action="{{ route('figure.save')  }}" method="post">
            <div class="form-group">
                @csrf
                @includeIf('forms.' . $type, ['$errors' => $errors])
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="file" class="form-control-file" accept="image/*" name="image">
                @if ($errors->get('image'))
                    @foreach ($errors->get('image') as $error)
                        {{ $error }}<br/>
                    @endforeach
                @endif
                <div>
                    <button class="btn btn-primary" type="submit">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
