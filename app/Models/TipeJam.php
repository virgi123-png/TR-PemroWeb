<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeJam extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
