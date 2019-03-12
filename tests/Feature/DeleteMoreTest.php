<?php

namespace Tests\Feature;

use App\Models\Figure;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteMoreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDelete()
    {
        if (Figure::where('area', '>', 10000)->first() !== null) {
            Artisan::call('delete:more', ['area' => 10000]);
            $this->assertTrue(Figure::where('area', '>', 10000)->first() === null);
        }
        else {
            $this->assertFalse(true);
        }
    }
}
