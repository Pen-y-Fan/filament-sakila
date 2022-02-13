<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_be_created(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
                "id"    => $user->id,
                "name"  => $user->name,
                "email" => $user->email,
            ]);
    }
}
