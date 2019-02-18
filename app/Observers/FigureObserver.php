<?php

namespace App\Observers;

use App\Models\Figure;
use Illuminate\Support\Facades\Storage;

class FigureObserver
{
    public function deleting(Figure $figure)
    {
        Storage::delete($figure->image);
    }
}
