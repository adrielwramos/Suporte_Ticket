<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Ticket extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
