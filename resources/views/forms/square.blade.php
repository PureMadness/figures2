<p>Side:
<input type="text" name="data[side]"/>
</p>
@if ($errors->get('data.side'))
    @foreach ($errors->get('data.side') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
