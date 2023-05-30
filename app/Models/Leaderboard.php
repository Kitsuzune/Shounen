<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $fillable = [
        'user_id',
        'score'
    
    ];

    public function User()
    {
    return $this->belongsTo(User::class);
    }

    use HasFactory;
}
