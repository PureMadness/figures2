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
        $user = new User();
        $user->login = 'user';
        $user->password = bcrypt('secret');
        $user->email = 'my.pure.mail@bk.ru';
        $user->role = 1;
        $user->blocked = 0;
        $user->save();
        for ($i = 0; $i < 70; $i++) {
            $user->figures()->save(factory(Figure::class)->make());
        }
        factory(User::class, 99)->create()->each(function ($user) {
            $randNumber = rand(0, 100);
            for ($i = 0; $i < $randNumber; $i++) {
                $user->figures()->save(factory(Figure::class)->make());
            }
        });
    }
}
