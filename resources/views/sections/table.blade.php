<table class="table table-bordered table-striped table-hover">
    <thead class="thead-light">
    <tr>
        <th>#</th>
        <th>Type of figure</th>
        <th>Data</th>
        <th>Area</th>
        <th>Image</th>
        @if(isset($figures) && ($figures[0]['user_id'] === $user->id))
            <th>Edit</th>
            <th>Delete</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @isset($figures)
        @foreach($figures as $figure)
            <tr>
                <td>{{ $figure->id }}</td>
                <td>{{ $figure->type }}</td>
                <td>{{ print_r($figure['data'], true) }}</td>
                <td>{{ $figure->area }}</td>
                @if(isset($figure->image))
                    <td><img class="icon"
                             src="{{ \Illuminate\Support\Facades\Storage::url($figure->image) }}"/>
                    </td>
                @else
                    <td></td>
                @endif
                @if(isset($figures) && ($figures[0]['user_id'] === $user->id))
                    <td>
                        <form action="{{ route('figure.edit', ['figure' => $figure->id,]) }}" method="get">
                            <button type="submit" class="btn btn-primary btn-sm">edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{  route('delete', $figure->id) }}" method="get">
                            <button type="submit" class="btn  btn-danger btn-sm">del</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    @endisset
    </tbody>
</table>
