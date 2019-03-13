<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;

class UserObserver
{
    public function deleting(User $user)
    {
        $user->favorites()->detach();
        $user->figures()->chunkById(50, function ($figures) {
            foreach ($figures as $figure) {
                $figure->delete();
            }
        });
    }
}
