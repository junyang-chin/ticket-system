<?php

namespace Tests\Feature\Models;

use App\Enums\TicketStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{


    /**
     * test index() api should get list of all tickets
     */
    public function test_get_ticket_list()
    {
        $response = $this->getJson('/api/ticket');
        $response->assertStatus(200);
    }
    /**
     * test show() api should get single ticket
     */
    public function test_get_ticket()
    {
        $response = $this->getJson('/api/ticket/1');
        $response->assertStatus(200);
    }
    /**
     * test store() api should create a ticket
     */
    public function test_create_ticket()
    {
        $data = Ticket::factory()->create();
        $response = $this->post('/api/ticket', $data);
        $response->assertStatus(201);
    }
    /**
     * test put() api should update ticket
     */
    public function test_update_ticket()
    {
        $data = TicketStatus::PENDING();
        // dd($data);
        $response = $this->putJson('/api/ticket/1', $data);
        $response->assertStatus(201);
    }
}
