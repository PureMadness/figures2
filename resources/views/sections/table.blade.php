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
        @if(isset($fav) || isset($users) && (isset($figures) && ($figures[0]['user_id'] !== $user->id)))
            <th></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @isset($figures)
        @foreach($figures as $figure)
            <tr @isset($fav) id="figure-{{ $figure->id }}" @endisset>
                <td>{{ $figure->id }}</td>
                <td>{{ $figure->type }}</td>
                <td>{{ print_r($figure['data'], true) }}</td>
                <td>{{ $figure->area }}</td>
                @if(isset($figure->image))
                    <td>
                        <img class="icon" src="{{ \Illuminate\Support\Facades\Storage::url($figure->image) }}"/>
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
                @isset($fav)
                    <td>
                        <a onclick="deleteFromFav({{ $figure->id }})"><i class="fas fa-star text-warning"></i></a>
                    </td>
                @endif
                @if(isset($users) && ($figures[0]['user_id'] !== $user->id))
                    @if($user->favorites()->find($figure->id) !== null)
                        <td>
                            <a id="fav-{{ $figure->id }}"
                               onclick="deleteFavorite({{ $figure->id }})"><i class="fas fa-star text-warning"></i></a>
                        </td>
                    @else
                        <td>
                            <a id="notFav-{{ $figure->id }}"
                               onclick="addFavorite({{ $figure->id }})"><i class="far fa-star text-info"></i></a>
                        </td>
                    @endif
                @endisset
            </tr>
        @endforeach
    @endisset
    </tbody>
</table>
@isset($figures)
    @if(\Illuminate\Support\Facades\Route::current()->action['as'] === 'index')
        <div class="row justify-content-center">
            <div>
                {{ $figures->appends([
                'showTypes' => [
                    isset($circleCheck) ? 'circle' : null,
                    isset($squareCheck) ? 'square' : null,
                    isset($triangleCheck) ? 'triangle' : null,
                    isset($rectangleCheck) ? 'rectangle' : null
                    ],
                'from' => isset($from) ? $from : null, 'to' => isset($to) ? $to : null,
                'sort' => (isset($sort) && $sort === 'asc') ? 'asc' : (isset($sort) && $sort === 'desc' ? 'desc' : null),
                ])->links() }}
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div>
                {{ $figures->links() }}
            </div>
        </div>
    @endif
@endisset
