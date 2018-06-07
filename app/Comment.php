<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;
use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {

    use Notifiable;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
