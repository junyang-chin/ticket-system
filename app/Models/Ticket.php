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
     * One to Many(inverse)
     */
    public function ticketStatus()
    {
        return $this->belongsTo(TicketStatus::class);
    }
    /**
     * One to Many(inverse)
     */
    public function ticketPriority()
    {
        return $this->belongsTo(TicketPriority::class);
    }


    // TODO: test pivot table
    // public function assignments()
    // {
    //     return $this->hasMany(Assignment::class, 'ticket_id');
    // }

    // test many to many 
    public function developers()
    {
        return $this->belongsToMany(User::class, 'assignments', 'ticket_id', 'developer_id')->as('assignments')->withTimestamps();
    }
}
