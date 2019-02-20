<div class="form-row align-items-center">
    <h5>Radius:</h5>
    <input type="text" class="form-control col-md-2
            @if ($errors->get('data.radius'))
                is-invalid
            @endif"
            @isset($figure)
                value="{{ $figure->data['radius'] }}"
            @endisset
           name="data[radius]" placeholder="Radius"/>
    @if ($errors->get('data.radius'))
        <div class="invalid-feedback">
            @foreach ($errors->get('data.radius') as $error)
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif
</div>

