<?php

namespace App\Http\Resources;

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
        // return parent::toArray($request);
        return [
            'ticket_id'=>$this->id,
            'user'=> $this->user->name,
            'category' => $this->category->name,
            'title'=> $this->title,
            'description'=> $this->description,
            'status'=> $this->status,
            'comment'=> $this->comment,
        ];
    }
}
