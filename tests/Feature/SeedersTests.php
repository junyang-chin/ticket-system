<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SeedersTests extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->user->assignRole('user');
        Sanctum::actingAs($this->user);
        
    }
   public function test_can_get_list_of_categories()
   {
    $this->getJson('api/category')->assertJsonCount(3,'data');
   }
   public function test_can_get_list_of_priorities()
   {
    $this->getJson('api/ticket-priority')->assertJsonCount(3,'data');
   }
   public function test_can_get_list_of_statuses()
   {
    $this->getJson('api/ticket-status')->assertJsonCount(3,'data');
   }
}
