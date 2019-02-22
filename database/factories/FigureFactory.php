<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \Illuminate\Support\Facades\Validator;

use App\Rules\TriangleRule;

use App\Enums\FigureTypes;

$factory->define(App\Models\Figure::class, function (Faker\Generator $faker) {

    $figures = FigureTypes::getAll();

    $type = $faker->randomElement($figures);
    $area = null;
    switch ($type) {
        case (FigureTypes::CIRCLE):
            $radius = $faker->numberBetween(0, 100);
            $data = ['radius' => $radius];
            $area = pi() * $radius ** 2;
            break;

        case (FigureTypes::RECTANGLE):
            $x1 = $faker->numberBetween(-100, 100);
            $x2 = $faker->numberBetween(-100, 100);
            $y1 = $faker->numberBetween(-100, 100);
            $y2 = $faker->numberBetween(-100, 100);
            $length = $x1 - $x2;
            $width = $y1 - $y2;
            $area = abs($length * $width);
            $data = [
                'x1' => $x1,
                'y1' => $x2,
                'x2' => $y1,
                'y2' => $y2,
            ];
            break;

        case (FigureTypes::SQUARE):
            $side = $faker->numberBetween(0, 100);
            $area = $side ** 2;
            $data = ['side' => $side];
            break;

        case (FigureTypes::TRIANGLE):
            do {
                $side1 = $faker->numberBetween(0, 100);
                $side2 = $faker->numberBetween(0, 100);
                $side3 = $faker->numberBetween(0, 100);
                $halfPerimeter = ($side1 + $side2 + $side3) / 2.0;
                $area = sqrt($halfPerimeter * ($halfPerimeter - $side1) * ($halfPerimeter - $side2) * ($halfPerimeter - $side3));
                $data = [
                    'side1' => $side1,
                    'side2' => $side2,
                    'side3' => $side3,
                ];

                $validator = Validator::make([
                    'triangle' => $data,
                ], [
                    'triangle' => new TriangleRule(),
                ]);

            } while ($validator->fails());

            break;
        default:
            throw new \Exception('Unknown figure type: ' . $type);
            break;
    }

    return [
        'type' => $type,
        'data' => $data,
        'area' => $area,
    ];
});
