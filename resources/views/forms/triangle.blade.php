<p>First Side:
    <input type="text" class="form-control" name="data[side1]"
           @isset($figure)
           value="{{ $figure->data['side1'] }}"
        @endisset
    />
</p>
@if ($errors->get('data.side1'))
    @foreach ($errors->get('data.side1') as $error)
        {{ $error }}<br/>
    @endforeach
@endif

<p>Second Side:
    <input type="text" class="form-control" name="data[side2]"
           @isset($figure)
           value="{{ $figure->data['side2'] }}"
        @endisset/>
</p>
@if ($errors->get('data.side2'))
    @foreach ($errors->get('data.side2') as $error)
        {{ $error }}<br/>
    @endforeach
@endif

<p>Third Side:
    <input type="text" class="form-control" name="data[side3]"
           @isset($figure)
           value="{{ $figure->data['side3'] }}"
        @endisset/>
</p>
@if ($errors->get('data.side3'))
    @foreach ($errors->get('data.side3') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
