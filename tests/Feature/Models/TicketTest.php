<?php

namespace Tests\Feature\Models;

use App\Enums\TicketStatus;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;

class TicketTest extends TestCase
{


    public function setUp(): void
    {

        // must call parent method first always
        parent::setUp();

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

        $this->getJson('/api/ticket')
            ->assertJsonCount(2, 'data');
    }

    public function test_can_view_one_of_their_own_tickets()
    {
        $ticketA = Ticket::factory()->for($this->user)->create();
        $ticketB = Ticket::factory()->for($this->user)->create();
        $ticketC = Ticket::factory()->for($this->userB)->create();

        $this->getJson('api/ticket/' . $ticketA->id)
            ->assertJsonCount(1)
            ->assertJson([
                'data' => [
                    'category' => $ticketA->category->name,
                ]
            ]);
    }
    public function test_can_create_ticket()
    {
        $ticketA = Ticket::factory()->make();

        $this->postJson('api/ticket', $ticketA->toArray())
            ->assertStatus(201);
    }

    public function test_can_update_ticket()
    {
        $ticket = Ticket::factory()->for($this->user)->create();

        $this->putJson('api/ticket/' . $ticket->id, ['category_id' => 2])
            ->assertStatus(200);
    }
    public function test_cannot_update_other_ticket()
    {
        $ticket = Ticket::factory()->for($this->userB)->create();

        $this->putJson('api/ticket/' . $ticket->id, ['category_id' => 2])
            ->assertStatus(403);
    }

    public function test_can_delete_own_ticket()
    {
        $ticket = Ticket::factory()->for($this->user)->create();
        $this->deleteJson('api/ticket/' . $ticket->id)
            ->assertStatus(204);

        // make sure class is deleted from db
        $this->assertDatabaseMissing(Ticket::class, $ticket->toArray());
    }

    public function test_cannot_delete_others_ticket()
    {
        $ticketA = Ticket::factory()->for($this->user)->create();
        $ticketB = Ticket::factory()->for($this->userB)->create();
        $this->deleteJson('api/ticket/' . $ticketB->id)
            ->assertStatus(403);

        // make sure class is not deleted from db
        $this->assertDatabaseHas(Ticket::class, ['id' => $ticketB->id]);
    }

    public function test_users_can_search_ticket_by_user_id()
    {
        $ticketA = Ticket::factory()->for($this->user)->create();
        $ticketB = Ticket::factory()->for($this->user)->create();
        //ticket c belongs to user B
        $ticketC = Ticket::factory()->for($this->userB)->create();

        $this->postJson('api/ticket/search', ['search_user_id' => $this->user->id])
            ->assertJsonCount(2, 'data')
            ->assertJson([
                'data' => [
                    ['ticket_id' => $ticketA->id]
                ]
            ]);
    }
    public function test_users_can_search_by_title_and_category()
    {
        $ticketA = Ticket::factory()->for($this->user)->create();
        $ticketB = Ticket::factory()->for($this->user)->create();
        //ticket c belongs to user B
        $ticketC = Ticket::factory()->for($this->userB)->create();


        $this->postJson('api/ticket/search', [
            'search_title' => $ticketB->title,
            'search_category' => $ticketB->category->name,
        ])
            ->assertJson([
                'data' => [
                    ['ticket_id' => $ticketB->id]
                ]
            ]);
    }
    public function test_users_can_search_by_status_and_category()
    {
        $ticketA = Ticket::factory()->for($this->user)->create();
        $ticketB = Ticket::factory()->for($this->user)->create();
        //ticket c belongs to user B
        $ticketC = Ticket::factory()->for($this->userB)->create();


        $this->postJson('api/ticket/search', [
            'search_status' => $ticketB->status_id,
            'search_category' => $ticketB->category->name,
        ])
            ->assertJson([
                'data' => [
                    ['ticket_id' => $ticketB->id]
                ]
            ]);
    }
}
