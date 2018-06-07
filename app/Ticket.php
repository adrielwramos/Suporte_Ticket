<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Comment;

class Ticket extends Model {

    use Notifiable;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $fillable = [
        'user_id', 'uuid', 'ref', 'title', 'fullname', 'email', 'category', 'level', 'status', 'description',
    ];

    public function getRouteKeyName() {
        return 'uuid';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

}
