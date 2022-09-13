<?php

namespace Tests\Feature\Models;

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
        $reponse
            ->assertStatus(200)
            //->assertOk() same as assertStatus(200)
            ->assertJson(
                ['name' => 'admin']
            );

        // $this->assertDatabaseHas(User::class, ['name' => 'admin']);
    }

    /**
     * Test create user
     */
    public function test_create_user()
    {
        $user = $this->getUserData();
        // dd($user);
        $response = $this->postJson('/api/user', $user);
        // dd($response->content());
        $response->assertStatus(201); //or assertCreated()
        // $this->assertDatabaseHas(User::class, ['name' => 'admin']);
    }

    /**
     * Test update user by id
     */
    public function test_update_user()
    {

        $response = $this->putJson('/api/user/2', ['name' => 'developer 1']);
        $response->assertStatus(200);
    }

    /**
     * Test delete user by id
     */
    public function test_delete_user()
    {
        $response = $this->deleteJson('/api/user/5');
        $response->assertStatus(200);
    }
}
