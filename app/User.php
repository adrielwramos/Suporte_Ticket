<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Ticket;
use App\Comment;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function isUser() {
        return $this->role === 'user';
    }

}
