<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function testShowPosts(): void {
        $users = User::factory()
            ->count(5)
            ->create();

        echo env('APP_URL');

        $this->assertDatabaseCount('users', 5);
    }
}
