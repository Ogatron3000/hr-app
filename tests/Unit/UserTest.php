<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_path(): void
    {
        $user = User::factory()->create();

        $this->assertEquals('/users/' . $user->id, $user->path());
    }
}
