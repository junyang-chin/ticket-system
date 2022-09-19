<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [
        'user_id',
        'ticket_id'
    ];

    /**
     * One to many(inverse)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One to Many(inverse)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * One to one
     */
    public function status()
    {
        return $this->hasOne(TicketStatus::class);
    }
}
