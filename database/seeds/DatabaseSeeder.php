<?php

use App\Models\Figure;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(FigureSeeder::class);
        User::query()->truncate();
        Figure::query()->truncate();
        factory(User::class, 50)->create()->each(function ($user) {
            $user->figures()->save(factory(Figure::class)->make());
        });
    }
}
