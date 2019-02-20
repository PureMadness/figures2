<div class="form-row align-items-center">
    <h5>X1:</h5>
    <input type="text" class="form-control col-md-2
           @if ($errors->get('data.x1'))
        is-invalid
@endif"
           name="data[x1]"
           @isset($figure)
           value="{{ $figure->data['x1'] }}"
           @endisset
           placeholder="x1"/>
    @if ($errors->get('data.x1'))
        @foreach ($errors->get('data.x1') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>

<div class="form-row align-items-center">
    <h5>Y1:</h5>
    <input type="text" class="form-control col-md-2
           @if ($errors->get('data.y1'))
        is-invalid
@endif"
           name="data[x2]"
           @isset($figure)
           value="{{ $figure->data['y1'] }}"
           @endisset
           placeholder="y1"/>

    @if ($errors->get('data.y1'))
        @foreach ($errors->get('data.y1') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>

<div class="form-row align-items-center">
    <h5>X2:</h5>
    <input type="text" class="form-control col-md-2
           @if ($errors->get('data.x2'))
        is-invalid
@endif"
           name="data[y1]"
           @isset($figure)
           value="{{ $figure->data['x2'] }}"
           @endisset
           placeholder="x2"/>

    @if ($errors->get('data.x2'))
        @foreach ($errors->get('data.x2') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>

<div class="form-row align-items-center">
    <h5>Y2:</h5>
    <input type="text" class="form-control col-md-2
           @if ($errors->get('data.x2'))
        is-invalid
@endif"
           name="data[y2]"
           @isset($figure)
           value="{{ $figure->data['y2'] }}"
           @endisset
           placeholder="y2"/>

    @if ($errors->get('data.y2'))
        @foreach ($errors->get('data.y2') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>

