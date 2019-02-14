<?php

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
        $this->call(FigureSeeder::class);
        User::query()->truncate();
        factory(App\Models\User::class, 1)->create();
    }
}
