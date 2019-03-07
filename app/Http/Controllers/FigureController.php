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
        if ($request->all() === []) {
            $figures = Auth::user()->figures()->paginate(15);
            return view('index', [
                'circleCheck' => 'on',
                'squareCheck' => 'on',
                'triangleCheck' => 'on',
                'rectangleCheck' => 'on',
                'figures' => $figures,
            ]);
        }
        if ($request->showTypes === null) {
            return view('index');
        }

        $params = [];
        $showTypes = $request->showTypes;
        $userFigures = Auth::user()->figures();
        if (isset($request->from)) {
            $from = $request->from;
            $userFigures = $userFigures->where('area', '>=', $from);
            $params = array_merge($params, ['from' => $from]);
        }
        if (isset($request->to)) {
            $to = $request->to;
            $userFigures = $userFigures->where('area', '<=', $to);
            $params = array_merge($params, ['to' => $to]);
        }

        if ($showTypes !== null) {
            $userFigures->whereIn('type', $showTypes);
        }

        if ($showTypes !== null) {
            if (in_array('circle', $showTypes)) {
                $params = array_merge($params, ['circleCheck' => 'on']);
            }
            if (in_array('square', $showTypes)) {
                $params = array_merge($params, ['squareCheck' => 'on']);
            }
            if (in_array('triangle', $showTypes)) {
                $params = array_merge($params, ['triangleCheck' => 'on']);
            }
            if (in_array('rectangle', $showTypes)) {
                $params = array_merge($params, ['rectangleCheck' => 'on']);
            }
        }

        if (isset($request->sort) && $request->sort === 'asc') {
            $userFigures->orderBy('area');
        } elseif (isset($request->sort) && $request->sort === 'desc') {
            $userFigures->orderBy('area', 'desc');
        }

        $result = $userFigures->paginate(15);
        $figures = ['figures' => $result];
        $params = array_merge($params, $figures, ['sort' => isset($request->sort) ? $request->sort : null]);
        return view('index', $params);
    }

    public function add(Request $request)
    {
        $type = $request->get('type');
        /** @var ViewErrorBag $errors */
        Session::put('previousUrl', session()->get('_previous')['url']);
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
        $figure->setArea();
        $figure->image = $path;

        Auth::user()->figures()->save($figure);

        return Redirect::to(session('previousUrl'))
            ->with('actionMessage', $actionMessage);
    }

    public function statistics()
    {
        $figures = Auth::user()->figures();
        $areas = array_fill_keys(FigureTypes::getAll(), 0);
        $allArea = 0;

        $figures->each(function (Figure $figure) use (&$areas, &$allArea): void {
            $areas[$figure->type] += $figure->area;
            $allArea += $figure->area;
        });

        return view('statistics', [
            'areas' => $areas,
            'allArea' => $allArea,
        ]);
    }

    public function delete(Figure $figure, Request $request)
    {
        if ($figure->user_id !== Auth::id()) {
            return Redirect::to(session()->get('_previous')['url'])
                ->with('errorMessage', 'U can delete only your figures!!!');
        }

        $figure->delete();
        return Redirect::to(session()->get('_previous')['url'])
            ->with('actionMessage', $figure->type . ' figure was deleted!!!');
    }

    public function edit(Figure $figure)
    {
        if (Gate::denies('can-user', $figure)) {
            return Redirect::route('index')
                ->with('errorMessage', 'U can edit only your figures!!!');
        }
        /** @var ViewErrorBag $errors */
        Session::put('previousUrl', session()->get('_previous')['url']);
        $errors = Session::pull('errors', new ViewErrorBag());
        return view('edit', [
            'figure' => $figure,
            'errors' => $errors,
        ]);
    }

    public function confirmDeleteLess(Request $request)
    {
        $number = Auth::user()->figures()->where('area', '<=', $request->deleteValue)->count();
        return Redirect::route('index')->with([
            'deleteNumber' => $number,
            'value' => $request->deleteValue,
        ]);
    }

    public function deleteLess(int $value)
    {
        Auth::user()->figures()->where('area', '<=', $value)->delete();
        return Redirect::route('index')->with('actionMessage', 'Where delete figures with area less than ' . $value);
    }
}
