<p>X1:
    <input type="text" class="form-control" name="data[x1]"
           @isset($figure)
           value="{{ $figure->data['x1'] }}"
        @endisset/>
</p>
@if ($errors->get('data.x1'))
    @foreach ($errors->get('data.x1') as $error)
        {{ $error }}<br/>
    @endforeach
@endif

<p>X2:
    <input type="text" class="form-control" name="data[x2]"
           @isset($figure)
           value="{{ $figure->data['x2'] }}"
        @endisset/>
</p>
@if ($errors->get('data.x2'))
    @foreach ($errors->get('data.x2') as $error)
        {{ $error }}<br/>
    @endforeach
@endif

<p>Y1:
    <input type="text" class="form-control" name="data[y1]"
           @isset($figure)
           value="{{ $figure->data['y1'] }}"
        @endisset/>
</p>
@if ($errors->get('data.y1'))
    @foreach ($errors->get('data.y1') as $error)
        {{ $error }}<br/>
    @endforeach
@endif

<p>Y2:
    <input type="text" class="form-control" name="data[y2]"
           @isset($figure)
           value="{{ $figure->data['y2'] }}"
        @endisset
    />
</p>
@if ($errors->get('data.y2'))
    @foreach ($errors->get('data.y2') as $error)
        {{ $error }}<br/>
    @endforeach
@endif

