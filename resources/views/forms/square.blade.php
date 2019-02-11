<p>Side:
    <input type="text" name="data[side]"
           @isset($figure)
           value="{{ $figure->data['side'] }}"
           @endisset
    />
</p>
@if ($errors->get('data.side'))
    @foreach ($errors->get('data.side') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
