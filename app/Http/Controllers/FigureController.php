<?php

namespace App\Http\Controllers;

use App\Enums\FigureTypes;
use App\Http\Requests\SaveFigureRequest;
use App\Models\Figure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ViewErrorBag;

class FigureController extends Controller
{
    public function index()
    {
        $figures = Figure::simplePaginate(20);
        return view('index', ['figures' => $figures]);
    }

    public function add(Request $request)
    {
        $type = $request->get('type');
        /** @var ViewErrorBag $errors */

        $errors = Session::pull('errors', new ViewErrorBag());
        return view('add', [
            'type' => $type,
            'errors' => $errors,
        ]);
    }

    public function save(SaveFigureRequest $request)
    {
        $data = $request->all();
        $figure = new Figure;
        $figure->setAttribute('type', $data['type']);
        $figure->setAttribute('data',$data['data']);
        $figure->save();

        $figures = Figure::all();
        return view('index', [
           'figures' => $figures
        ]);
    }

    public function statistics()
    {
        $figures = Figure::all();
        $areas = array_fill_keys(FigureTypes::getAll(), 0);
        $allArea = 0;

        $figures->each(function (Figure $figure) use (&$areas, &$allArea): void {
            $areas[$figure->type] += $figure->getArea();
            $allArea += $figure->getArea();
        });

        return view('statistics', [
            'areas' => $areas,
            'allArea' => $allArea,
        ]);
    }

    public function delete(Figure $figure)
    {
        $figure->delete();

        return Redirect::route('index')
            ->with('myMessage', $figure->type . ' figure was deleted!!!');
    }
}
