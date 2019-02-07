@extends('layouts.layout')
@section('content')
    <h1>
        Add new {{ $type }}
    </h1>
    <form action="{{ route('figure.save')  }}" method="post">
        @csrf
    @switch($type)
        @case(\App\Enums\FigureTypes::CIRCLE)
            <p>Radius:</p>
            <input type="text" name="data[radius]"/>
            @if ($errors->get('data.radius'))
                @foreach ($errors->get('data.radius') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            @break
        @case(\App\Enums\FigureTypes::SQUARE)
            <p>Side:</p>
            <input type="text" name="data[side]"/>
            @if ($errors->get('data.side'))
                @foreach ($errors->get('data.side') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            @break
        @case(\App\Enums\FigureTypes::TRIANGLE)
            <p>First Side:</p>
            <input type="text" name="data[side1]"/>
            @if ($errors->get('data.side1'))
                @foreach ($errors->get('data.side1') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            <p>Second Side:</p>
            <input type="text" name="data[side2]"/>
            @if ($errors->get('data.side2'))
                @foreach ($errors->get('data.side2') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            <p>Third Side:</p>
            <input type="text" name="data[side3]"/>
            @if ($errors->get('data.side3'))
                @foreach ($errors->get('data.side3') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            @break
        @case(\App\Enums\FigureTypes::RECTANGLE)
            <p>X1:</p>
            <input type="text" name="data[x1]"/>
            @if ($errors->get('data.x1'))
                @foreach ($errors->get('data.x1') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            <p>X2:</p>
            <input type="text" name="data[x2]"/>
            @if ($errors->get('data.x2'))
                @foreach ($errors->get('data.x2') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            <p>Y1:</p>
            <input type="text" name="data[y1]"/>
            @if ($errors->get('data.y1'))
                @foreach ($errors->get('data.y1') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            <p>Y2:</p>
            <input type="text" name="data[y2]"/>
            @if ($errors->get('data.y2'))
                @foreach ($errors->get('data.y2') as $error)
                    {{ $error }}<br/>
                @endforeach
            @endif
            @break
        @default
        <h1>Isn't known figure ='(</h1>
    @endswitch
        <input type="hidden" name="type" value="{{ $type }}"><br>
        <button type="submit">
            Add
        </button>
    </form>
@endsection
