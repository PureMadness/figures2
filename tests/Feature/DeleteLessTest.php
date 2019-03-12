<?php

namespace Tests\Feature;

use App\Models\Figure;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteLessTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDelete()
    {
        if (Figure::where('area', '<', 500)->first() !== null) {
            Artisan::call('delete:less', ['area' => 500]);
            $this->assertTrue(Figure::where('area', '<', 500)->first() === null);
        }
        else {
            $this->assertFalse(true);
        }
    }
}
