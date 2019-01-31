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

use App\Enums\FigureTypes;

$factory->define(App\Models\Circle::class, function (Faker\Generator $faker) {

    $figures = [
        FigureTypes::CIRCLE,
        FigureTypes::RECTANGLE,
        FigureTypes::SQUARE,
        FigureTypes::TRIANGLE,
    ];

    $type = $faker->randomElement(array($figures));

    if ($type == FigureTypes::CIRCLE){

        $data = array("radius" => $faker->numberBetween(0,100),);
    }

    if ($type == FigureTypes::RECTANGLE){

        $data = array(
                "x1" => $faker->numberBetween(-50,50),
                "y1" => $faker->numberBetween(-50,50),
                "x2" => $faker->numberBetween(-50,50),
                "y2" => $faker->numberBetween(-50,50),
            );
    }

    if ($type == FigureTypes::SQUARE){

        $data = array("side" => $faker->numberBetween(0,100),);
    }

    if ($type == FigureTypes::TRIANGLE){

        $data = array(
                "side1" => $faker->numberBetween(15,100),
                "side2" => $faker->numberBetween(15,100),
                "side3" => $faker->numberBetween(0,30),
            );
    }

    return [
        'type' => $type,
        'data' => $data,
    ];
});
