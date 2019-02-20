<div class="form-group align-items-center">
    <label for="x1">X1</label>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.x1'))
            is-invalid
            @endif"
            @isset($figure)
                value="{{ $figure->data['x1'] }}"
            @endisset name="data[x1]" id="x1" placeholder="x1"/>
    @if ($errors->get('data.x1'))
        @foreach ($errors->get('data.x1') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>

<div class="form-group align-items-center">
    <label for="y1">Y1</label>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.y1'))
                is-invalid
            @endif"
            @isset($figure)
                value="{{ $figure->data['y1'] }}"
            @endisset name="data[x2]" id="y1" placeholder="y1"/>

    @if ($errors->get('data.y1'))
        @foreach ($errors->get('data.y1') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>

<div class="form-group align-items-center">
    <label for="x2">X2</label>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.x2'))
            is-invalid
            @endif"
            @isset($figure)
                value="{{ $figure->data['x2'] }}"
            @endisset name="data[x2]" id="x2" placeholder="x2"/>
    @if ($errors->get('data.x2'))
        @foreach ($errors->get('data.x2') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>

<div class="form-group align-items-center">
    <label for="y2">Y2</label>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.x2'))
                is-invalid
            @endif"
            @isset($figure)
                value="{{ $figure->data['y2'] }}"
            @endisset name="data[y2]" id="y2" placeholder="y2"/>

    @if ($errors->get('data.y2'))
        @foreach ($errors->get('data.y2') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>

