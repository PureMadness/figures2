<p>Radius:
<input type="text" class="form-control" name="data[radius]"
    @isset($figure)
        value="{{ $figure->data['radius'] }}"
    @endisset
/>
</p>
@if ($errors->get('data.radius'))
    @foreach ($errors->get('data.radius') as $error)
        {{ $error }}<br/>
    @endforeach
@endif

