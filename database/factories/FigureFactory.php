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

    switch ($type) {
        case (FigureTypes::CIRCLE):
            $data = ['radius' => $faker->numberBetween(0, 100)];
            break;

        case (FigureTypes::RECTANGLE):
            $data = [
                'x1' => $faker->numberBetween(-100, 100),
                'y1' => $faker->numberBetween(-100, 100),
                'x2' => $faker->numberBetween(-100, 100),
                'y2' => $faker->numberBetween(-100, 100),
            ];
            break;

        case (FigureTypes::SQUARE):
            $data = ['side' => $faker->numberBetween(0, 100)];
            break;

        case (FigureTypes::TRIANGLE):
            do {
                $data = [
                    'side1' => $faker->numberBetween(0,100),
                    'side2' => $faker->numberBetween(0,100),
                    'side3' => $faker->numberBetween(0,100),
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
    ];
});
