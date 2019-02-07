<p>X1:
<input type="text" name="data[x1]"/>
</p>
@if ($errors->get('data.x1'))
    @foreach ($errors->get('data.x1') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
<p>X2:
<input type="text" name="data[x2]"/>
</p>
@if ($errors->get('data.x2'))
    @foreach ($errors->get('data.x2') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
<p>Y1:
<input type="text" name="data[y1]"/>
</p>
@if ($errors->get('data.y1'))
    @foreach ($errors->get('data.y1') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
<p>Y2:
<input type="text" name="data[y2]"/>
</p>
@if ($errors->get('data.y2'))
    @foreach ($errors->get('data.y2') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
