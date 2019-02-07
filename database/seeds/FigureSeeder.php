<?php

use App\Models\Figure;
use Illuminate\Database\Seeder;

class FigureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Figure::query()->truncate();
        factory(\App\Models\Figure::class, 50)->create();
    }
}
