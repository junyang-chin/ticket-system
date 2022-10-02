<?php

namespace App\Http\Services;

use App\Models\Assignment;

/**
 * @method assignDevelopersToTicket
 */
class AssignmentService
{
    public function assignDevelopers($ticket_id, $developer_id)
    {
        return Assignment::create([
            'ticket_id' => $ticket_id,
            'developer_id' => $developer_id,
        ]);
    }

    public function getDevelopers($ticket_id)
    {
        dd(Assignment::where('ticket_id', $ticket_id)->values('developer_id'));
    }
}
