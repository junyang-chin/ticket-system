<?php

namespace App\Http\Services;

use App\Models\Assignment;
use App\Models\Ticket;
use App\Models\User;

/**
 * @method assignDeveloper
 * @method getDevelopers
 * @method removeDeveloper
 */
class AssignmentService
{
    public function assignDeveloper($ticket_id, $developer_id)
    {
        // auth
        $ticket = Ticket::find($ticket_id);
        $ticket->developers()->attach($developer_id);
        return $ticket->developers;

        // foreach ($ticket->developers as $developer) {
        //     dump($developer->assignments->developer_id);
        //     array_push(['developer_name'])
        //  }
        // dd('stop');
        // return $ticket->pivot->developer_id;
    }

    public function getDevelopers($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        return $ticket->developers;
    }

    public function removeDeveloper($ticket_id, $developer_id)
    {
        $ticket = Ticket::find($ticket_id);
        $ticket->developers()->detach($developer_id);
        return $ticket->developers;
    }
}
