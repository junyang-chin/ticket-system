<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ["ticket_id", "developer_id"];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'developer_id');
    }

    public function tickets()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
