<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserTest extends TestCase
{

    /**
     * set up an authenticated user
     */
    public function setUp(): void
    {
        // must call parent method first
        parent::setUp();

        // create fake user as property
        $this->fakeUser = User::factory()->create();
        $this->fakeUser->assignRole('user');
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
        $this->developerA = User::factory()->create();
        $this->developerA->assignRole('user');
        $this->developerB = User::factory()->create();
        $this->developerB->assignRole('user');

        // authenticate user
        Sanctum::actingAs($this->fakeUser);
    }
    /**
     * Test get user list
     */
    public function test_admin_can_get_user_list()
    {
        $this->fakeUser->assignRole('admin');

        $response = $this->getJson('api/user');
        $response->assertStatus(200);
    }
    /**
     * Test get user list
     */
    public function test_user_cannot_get_user_list()
    {
        $response = $this->getJson('api/user');
        $response->assertStatus(403);
    }

    /**
     * Test get user by id
     */
    public function test_user_view_itself()
    {
        $reponse = $this->getJson('api/user/' . $this->fakeUser->id);
        $reponse
            ->assertStatus(200)
            //->assertOk() same as assertStatus(200)
            ->assertJson([
                'data' => ['name' => $this->fakeUser->name]
            ]);

        // $this->assertDatabaseHas(User::class, ['name' => 'admin']);
    }
    /**
     * Test get user by id
     */
    public function test_user_cannot_view_other()
    {
        $reponse = $this->getJson('api/user/1');
        $reponse
            ->assertStatus(403);


        // $this->assertDatabaseHas(User::class, ['name' => 'admin']);
    }

    /**
     * Test create user
     */
    public function test_create_user()
    {
        $user = ['name' => 'fakename', 'email' => 'testemal@email.com', 'password' => 'pwd123'];
        $response = $this->postJson('api/user', $user);
        $response->assertStatus(201); //or 
    }

    /**
     * Test update user by id
     */
    public function test_user_update_itself()
    {
        $response = $this->putJson('api/user/' . $this->fakeUser->id, ['name' => 'new name']);
        $response->assertStatus(200);

        $this->assertDatabaseHas(User::class, ['id' => $this->fakeUser->id, 'name' => 'new name']);
    }
    /**
     * Test update user by id
     */
    public function test_user_cannot_update_others()
    {
        $this->fakeUser->name = 'change name';

        $response = $this->putJson('api/user/' . '1', $this->fakeUser->toArray());
        $response->assertStatus(403);
    }
    /**
     * Test update user by id
     */
    public function test_admin_can_update_others()
    {
        $this->fakeUser->assignRole('admin');


        $response = $this->putJson('api/user/' . '1', ['name' => 'change name']);
        $response->assertStatus(200);
    }

    /**
     * Test delete user by id
     */
    public function test_admin_can_delete_user()
    {
        $this->fakeUser->assignRole('admin');
        $response = $this->deleteJson('api/user/' . $this->fakeUser->id);
        $response->assertStatus(200);
    }
    /**
     * Test delete user by id
     */
    public function test_user_cannot_delete_user()
    {
        $this->fakeUser->assignRole('user');
        $response = $this->deleteJson('api/user/' . $this->fakeUser->id);
        $response->assertStatus(403);
    }

    public function test_search_developer()
    {
        $this->postJson('api/developer/search/', ['search_developer_name' => $this->developerA->name])->assertJson(['data' => [
            ['name' => $this->developerA->name]
        ]]);
    }
}
