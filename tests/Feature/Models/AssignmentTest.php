<?php

namespace Tests\Feature\Models;

use App\Models\Assignment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;

class AssignmentTest extends TestCase
{
    public function setUp(): void
    {
        // must call parent method first always
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->admin->assignRole("admin");

        $this->user = User::factory()->create();
        $this->user->assignRole("user");

        $this->developerA = User::factory()->create();
        $this->developerA->assignRole("developer");

        $this->developerB = User::factory()->create();
        $this->developerB->assignRole("developer");

        Sanctum::actingAs($this->user);
        // user create ticket
        $this->ticketA = Ticket::factory()->create();
        $this->ticketB = Ticket::factory()->create();
    }

    public function test_can_assign_developers_tickets()
    {
        // admin assign ticket
        Sanctum::actingAs($this->admin);
        $this->postJson(
            'api/tickets/' . $this->ticketA->id . '/assignments',
            [
                'developer_id' => $this->developerA->id,
            ]
        )
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'ticket_id' => $this->ticketA->id,
                    'developers' => $this->developerA->name,
                ]
            ]);
    }

    public function test_can_view_assigned_developers()
    {
        Sanctum::actingAs('admin');



        Assignment::create([
            'ticket_id' => $this->ticketA->id,
            'developer_id' => $this->userA->id,
        ]);
        Assignment::create([
            'ticket_id' => $this->ticketA->id,
            'developer_id' => $this->userB->id,
        ]);
        $this->getJson('api/assignment/' . $this->ticketA->id)
            ->assertJson([
                'data' => [
                    'ticket_id' => $this->ticketA->id,
                    'developers' => [$this->developerA->id, $this->developerB->id],
                ]
            ]);
    }
}
