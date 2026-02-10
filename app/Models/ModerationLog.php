<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModerationLog extends Model
{
    protected $fillable = [
        'moderator_id',
        'user_id',
        'action',
        'reason',
    ];

    public function moderator()
    {
        return $this->belongsTo(User::class, 'moderator_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
