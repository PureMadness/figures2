<?php

namespace App\Http\Controllers;

use App\Enums\FigureTypes;
use App\Http\Requests\SaveFigureRequest;
use App\Models\Figure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ViewErrorBag;

class FigureController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $figures = Auth::user()->figures;
        if (!isset($data['circleCheck'])) {
            $figures = $figures->reject(function ($figure, $key) {
                return $figure->type === FigureTypes::CIRCLE;
            });
        }
        if (!isset($data['squareCheck'])) {
            $figures = $figures->reject(function ($figure, $key) {
                return $figure->type === FigureTypes::SQUARE;
            });
        }
        if (!isset($data['triangleCheck'])) {
            $figures = $figures->reject(function ($figure, $key) {
                return $figure->type === FigureTypes::TRIANGLE;
            });
        }
        if (!isset($data['rectangleCheck'])) {
            $figures = $figures->reject(function ($figure, $key) {
                return $figure->type === FigureTypes::RECTANGLE;
            });
        }

        if(isset($data['from'])){
            $from = $data['from'];
            $figures = $figures->reject(function ($figure) use ($from) {
                return $figure->getArea() < $from;
            });
        }
        if(isset($data['to'])){
            $to = $data['to'];
            $figures = $figures->reject(function ($figure) use ($to) {
                return $figure->getArea() > $to;
            });
        }
        if (isset($data['compare']) && $data['compare'] === 'asc') {
            $figures = $figures->sortBy(function ($figure) {
                return $figure->getArea();
            });
        } else {
            $figures = $figures->sortByDesc(function ($figure) {
                return $figure->getArea();
            });
        }

        if (!empty($data)) {
            return view('index', [
                'figures' => $figures,
                'compare' => isset($data['compare']) ? $data['compare'] : null,
                'from' => isset($data['from']) ? $data['from'] : null,
                'to' => isset($data['to']) ? $data['to'] : null,
                'circleCheck' => isset($data['circleCheck']) ? $data['circleCheck'] : null,
                'squareCheck' => isset($data['squareCheck']) ? $data['squareCheck'] : null,
                'triangleCheck' => isset($data['triangleCheck']) ? $data['triangleCheck'] : null,
                'rectangleCheck' => isset($data['rectangleCheck']) ? $data['rectangleCheck'] : null,
            ]);
        }
        return view('index', [
            'figures' => $figures,
        ]);
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
