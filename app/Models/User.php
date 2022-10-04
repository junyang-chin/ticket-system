<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens, HasRoles;

    /**
     * Set default attribute
     */
    protected $attributes = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * hash password
     */
    public function setPasswordAttribute($pwd)
    {
        $this->attributes['password'] = Hash::make($pwd);
    }

    public function tickets()
    {
        return  $this->hasMany(Ticket::class);
    }


    // TODO: Test pivot table
    // public function assignments()
    // {
    //     return $this->hasMany(Assignment::class, 'developer_id');
    // }

    // test
    public function assignments()
    {
        return $this->belongsToMany(Ticket::class, 'assignments', 'user_id', 'ticket_id')->as('assignments')->withTimestamps();
    }
}
