<?php

namespace App\Http\Controllers;

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
        //dd($figures);
        return view('index', ['figures' => $figures]);
    }

    public function add(Request $request)
    {
        $type = $request->get('figure');
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

        return view('statistics', ['figures' => $figures]);
    }

    public function delete(Figure $figure)
    {
        $figure->delete();

        return Redirect::route('index')
            ->with('myMessage', $figure->type . ' figure was deleted!!!');
    }
}
