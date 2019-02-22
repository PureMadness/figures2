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
        User::query()->truncate();
        Figure::query()->truncate();
        factory(User::class, 100)->create()->each(function ($user) {
            $randNumber = rand(0,100);
            for($i = 0; $i < $randNumber; $i++) {
                $user->figures()->save(factory(Figure::class)->make());
            }
        });
    }
}
