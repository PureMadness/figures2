<?php

namespace App\Models;

use App\Enums\FigureTypes;
use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{

    protected $table = 'figures';

    public $timestamps = false;

    protected $fillable = [
        'type', 'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function getArea(): float
    {
        switch ($this['type']) {
            case FigureTypes::CIRCLE:
                $radius = $this->data['radius'];
                return pi() * $radius ** 2;
                break;
            case FigureTypes::SQUARE:
                $side = $this->data['side'];
                return $side ** 2;
                break;
            case FigureTypes::RECTANGLE:
                $length = $this->data['x1'] - $this->data['x2'];
                $width = $this->data['y1'] - $this->data['y2'];
                return abs($length * $width);
                break;
            case FigureTypes::TRIANGLE:
                $side1 = $this->data['side1'];
                $side2 = $this->data['side2'];
                $side3 = $this->data['side3'];
                $halfPerimeter = ($side1 + $side2 + $side3) / 2.0;
                return sqrt($halfPerimeter * ($halfPerimeter - $side1) * ($halfPerimeter - $side2) * ($halfPerimeter - $side3));
                break;
            default:
                return 'Nan';
                break;
        }
    }
}
