<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Figure;

class FigureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Figure::query()->truncate();
        factory(\App\Models\Figure::class, 100)->create();
    }
}
