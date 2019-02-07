<p>First Side:
<input type="text" name="data[side1]"/>
</p>
@if ($errors->get('data.side1'))
    @foreach ($errors->get('data.side1') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
<p>Second Side:
<input type="text" name="data[side2]"/>
</p>
@if ($errors->get('data.side2'))
    @foreach ($errors->get('data.side2') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
<p>Third Side:
<input type="text" name="data[side3]"/>
</p>
@if ($errors->get('data.side3'))
    @foreach ($errors->get('data.side3') as $error)
        {{ $error }}<br/>
    @endforeach
@endif
