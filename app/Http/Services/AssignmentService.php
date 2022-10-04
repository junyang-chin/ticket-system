<?php

namespace App\Http\Services;

use App\Models\Assignment;
use App\Models\Ticket;
use App\Models\User;

/**
 * @method assignDevelopersToTicket
 */
class AssignmentService
{
    public function assignDevelopers($ticket_id, $developer_id)
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

        // dd($this->users()->where('id', $this->developer_id)->value('name'));
    }
}
