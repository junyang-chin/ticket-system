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
            'category_id' => $this->category->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->ticketStatus->name,
            'status_id' => $this->ticketStatus->id,
            'priority' => $this->ticketPriority->name,
            'priority_id' => $this->ticketPriority->id,
            'poster' => $this->user->name,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
