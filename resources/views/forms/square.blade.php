<div class="form-group align-items-center">
    <label for="side">Side</label>
    <input type="text" class="form-control  col-md-2
           @if ($errors->get('data.side'))
        is-invalid
@endif"
           name="data[side]" id="side"
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
