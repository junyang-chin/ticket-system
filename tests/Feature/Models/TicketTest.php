<?php

namespace Tests\Feature\Models;

use App\Enums\TicketStatus;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;

class TicketTest extends TestCase
{


    public function setUp(): void
    {
        $this->user = User::factory()->create();
        $this->user->assignRole('user');
        $this->userB = User::factory()->create();
        $this->userB->assignRole('user');
        Sanctum::actingAs($this->user);
    }

    public function test_can_view_their_own_tickets()
    {
        $ticketA = Ticket::factory()->for($this->user)->create();
        $ticketB = Ticket::factory()->for($this->user)->create();
        $ticketC = Ticket::factory()->for($this->userB)->create();

        $this->getJson('api/ticket')
        ->assertJson(2, 'data');
    }
    public function test_can_view_one_of_their_own_tickets()
    {
        $ticketA = Ticket::factory()->for($this->user)->create();
        $ticketB = Ticket::factory()->for($this->user)->create();
        $ticketC = Ticket::factory()->for($this->userB)->create();

        $this->getJson('api/ticket/' . $ticketA->id)
        ->assertJson(1, 'data');
    }
    public function test_can_create_ticket()
    {
        $ticketA = Ticket::factory()->make();
        $this->postJson('api/ticket/' . $ticketA->id, $ticketA->toArray())
        ->assertStatus(204);
    }

    public function test_can_update_ticket()
    {
        $ticket = Ticket::factory()->for($this->user)->create();
        
        $this->putJson('api/ticket/'. $ticket->id,['category_id'=> 2])
        ->assertStatus(200);
    }
    public function test_cannot_update_other_ticket()
    {
        $ticket = Ticket::factory()->for($this->userB)->create();
        
        $this->putJson('api/ticket/'. $ticket->id,['category_id'=> 2])
        ->assertStatus(403);
    }
    
    public function test_can_delete_own_ticket()
    {
        $ticket = Ticket::factory()->for($this->user)->create();
        $this->deleteJson('api/ticket', $ticket->id)
        ->assertStatus(200);
        
    }
    public function test_cannot_delete_others_ticket()
    {
        $ticket = Ticket::factory()->for($this->userB)->create();
        $this->deleteJson('api/ticket', $ticket->id)
        ->assertStatus(403);

    }
}
