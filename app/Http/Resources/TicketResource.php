<?php

namespace App\Http\Resources;

use App\Models\Ticket;
use App\Models\TicketStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // dd($this->ticketStatus->status);
        return [
            'ticket_id' => $this->id,
            'category' => $this->category->name,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->ticketStatus->name,
            'priority' => $this->ticketPriority->name,
            'poster' => $this->user->name,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
