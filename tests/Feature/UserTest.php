<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_profile()
    {
        $this->withoutExceptionHandling();

        $user = $this->signIn();

        $updatedUser = User::factory()->raw(['password' => 'newpassword']);

        $this->get($user->path() .'/edit')
            ->assertOk()
            ->assertSee($user->name)
            ->assertSee($user->email);

        $this->followingRedirects()
            ->patch($user->path(), $updatedUser)
            ->assertSee($updatedUser['name'])
            ->assertSee($updatedUser['email']);
    }

    public function test_user_cannot_update_other_users_profile()
    {
        $this->actingAs($user = User::factory()->create());

        $this->get($user->path() . '/edit')->assertStatus(403);
        $this->patch($user->path(), User::factory()->raw())->assertStatus(403);
    }

}
