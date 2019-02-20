<div class="form-group align-items-center">
    <label for="first">First side</label>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.side1'))
                is-invalid
            @endif"
            @isset($figure)
            value="{{ $figure->data['side1'] }}"
            @endisset name="data[side1]" id="first" placeholder="first side"/>
    @if ($errors->get('data.side1'))
        @foreach ($errors->get('data.side1') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>
<div class="form-group align-items-center">
    <label for="second">Second side</label>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.side2'))
                is-invalid
            @endif"
            @isset($figure)
                value="{{ $figure->data['side2'] }}"
            @endisset name="data[side2]" id="second" placeholder="second side"/>
    @if ($errors->get('data.side2'))
        @foreach ($errors->get('data.side2') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>
<div class="form-group align-items-center">
    <label for="third">Third side</label>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.side3'))
                is-invalid
            @endif"

            @isset($figure)
                value="{{ $figure->data['side3'] }}"
            @endisset name="data[side3]" id="third" placeholder="third side"/>
    @if ($errors->get('data.side3'))
        @foreach ($errors->get('data.side3') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>
