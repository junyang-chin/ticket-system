<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{


    /**
     * Test get user list
     */
    public function test_get_user_list()
    {
        $response = $this->getJson('/api/user');
        $response->assertStatus(200);
    }

    /**
     * Test get user by id
     */
    public function test_get_user()
    {
        $reponse = $this->getJson('/api/user/1');
        $reponse->assertStatus(200);

        $this->assertDatabaseHas(User::class, ['name' => 'admin']);
    }
}
