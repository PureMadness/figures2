<?php

namespace App\Http\Controllers;

use App\Enums\FigureTypes;
use App\Http\Requests\SaveFigureRequest;
use App\Mail\RestoreLinkShipped;
use App\Models\Figure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ViewErrorBag;

class FigureController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->all() === []);
        if ($request->all() === []) {
            return view('index', [
                'figures' => null,
            ]);
        }
        $figures = new \Illuminate\Database\Eloquent\Collection;
        //dd($request->showTypes);
        //dd(in_array('circle', $request->showTypes));
        $showTypes = $request->showTypes;
        $params = [];
        if ($showTypes !== null) {
            if (in_array('circle', $showTypes)) {
                $figures = $figures->merge(Auth::user()->figures()->where('type', '=', 'circle')->get());
                $params = array_merge($params, ['circleCheck' => 'on']);
            }
            if (in_array('square', $showTypes)) {
                $figures = $figures->merge(Auth::user()->figures()->where('type', '=', 'square')->get());
                $params = array_merge($params, ['squareCheck' => 'on']);
            }
            if (in_array('triangle', $showTypes)) {
                $figures = $figures->merge(Auth::user()->figures()->where('type', '=', 'triangle')->get());
                $params = array_merge($params, ['triangleCheck' => 'on']);
            }
            if (in_array('rectangle', $showTypes)) {
                $figures = $figures->merge(Auth::user()->figures()->where('type', '=', 'rectangle')->get());
                $params = array_merge($params, ['rectangleCheck' => 'on']);
            }
        }

        if (isset($request->from)) {
            $from = $request->from;
            $figures = $figures->reject(function ($figure) use ($from) {
                return $figure->getArea() < $from;
            });
            $params = array_merge($params, ['from' => $request->from]);
        }
        if (isset($request->to)) {
            $to = $request->to;
            $figures = $figures->reject(function ($figure) use ($to) {
                return $figure->getArea() > $to;
            });
            $params = array_merge($params, ['to' => $request->to]);
        }
        if (isset($request->compare) && $request->compare === 'asc') {
            $figures = $figures->sortBy(function ($figure) {
                return $figure->getArea();
            });
        } elseif (isset($request->compare) && $request->compare === 'desc') {
            $figures = $figures->sortByDesc(function ($figure) {
                return $figure->getArea();
            });
        }

        $figures = ['figures' => $figures];
        $params = array_merge($params, $figures, ['compare' => isset($request->compare) ? $request->compare : null]);
        return view('index', $params);
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

    public function save(Figure $figure, SaveFigureRequest $request)
    {
        $data = $request->all();
        $path = ($request->hasFile('image')) ? $request->image->store('public/images') : null;

        if ($figure->type !== null) {
            if ($path !== $figure->image && $path !== null) {
                Storage::delete($figure->image);
            } else {
                $path = $figure->image;
            }
            $actionMessage = $figure->type . $figure->id . ' figure has been edited!!!';
        } else {
            $figure = new Figure;
            $figure->type = $data['type'];
            $actionMessage = 'New ' . $figure->type . ' figure has been saved!!!';
        }
        $figure->data = $data['data'];
        $figure->image = $path;

        Auth::user()->figures()->save($figure);

        return Redirect::route('index')
            ->with('actionMessage', $actionMessage);
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
        if ($figure->user_id !== Auth::id()) {
            return Redirect::route('index')
                ->with('errorMessage', 'U can delete only your figures!!!');
        }

        $figure->delete();
        return Redirect::route('index')
            ->with('actionMessage', $figure->type . ' figure was deleted!!!');
    }

    public function edit(Figure $figure)
    {
        if (Gate::denies('can-user', $figure)) {
            return Redirect::route('index')
                ->with('errorMessage', 'U can edit only your figures!!!');
        }
        /** @var ViewErrorBag $errors */

        $errors = Session::pull('errors', new ViewErrorBag());
        return view('edit', [
            'figure' => $figure,
            'errors' => $errors,
        ]);
    }
}
