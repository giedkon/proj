<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'camping_rating_user', 'rating_id', 'user_id');
    }

    public function camping()
    {
        return $this->belongsTo(Camping::class, 'camping_rating_user', 'rating_id', 'camping_id');
    }
}
