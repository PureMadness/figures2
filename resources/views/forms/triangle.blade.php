<div class="form-row align-items-center">
    <h5>1 side:</h5>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.radius'))
        is-invalid
@endif" name="data[side1]"
           @isset($figure)
           value="{{ $figure->data['side1'] }}"
        @endisset placeholder="first side"/>
    @if ($errors->get('data.side1'))
        @foreach ($errors->get('data.side1') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>
<div class="form-row align-items-center">
    <h5>2 side:</h5>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.radius'))
        is-invalid
@endif" name="data[side2]"
           @isset($figure)
           value="{{ $figure->data['side2'] }}"
        @endisset placeholder="second side"/>
    @if ($errors->get('data.side2'))
        @foreach ($errors->get('data.side2') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>
<div class="form-row align-items-center">
    <h5>3 side:</h5>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.radius'))
        is-invalid
@endif"
           name="data[side3]"
           @isset($figure)
           value="{{ $figure->data['side3'] }}"
        @endisset
        placeholder="third side"/>
    @if ($errors->get('data.side3'))
        @foreach ($errors->get('data.side3') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>
