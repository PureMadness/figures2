<div class="form-row align-items-center">
    <h5>Side:</h5>
    <input type="text" class="form-control  col-md-2
           @if ($errors->get('data.side'))
        is-invalid
@endif"
           name="data[side]"
           @isset($figure)
           value="{{ $figure->data['side'] }}"
           @endisset
           placeholder="side"
    />
    @if ($errors->get('data.side'))
        @foreach ($errors->get('data.side') as $error)
            <div class="invalid-feedback">
                {{ $error }}<br/>
            </div>
        @endforeach
    @endif
</div>
