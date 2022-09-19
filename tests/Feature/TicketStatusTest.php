<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TicketStatusTest extends TestCase
{
    public function setUp():void
    {
        // parent
        parent::setUp();

        $this->user = User::factory()->create();
        $this->user->assignRole('user');
        Sanctum::actingAs($this->user);
    }
    public function test_can_get_all_statuses()
    {
        $this->getJson('api/ticket-statuses')
            ->assertJson([
                'data' => [
                    ['status' => 'pending'],
                ]
            ])
            ->assertJsonCount(3,'data');
    }
}
