<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    use HasFactory;


    protected $fillable = ['status'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * One to one relationship (inverse)
     */
    public function tickets()
    {
        $this->hasMany(Ticket::class);
    }
}
