<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camping extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'country', 'url', 'web_url', 'user_id'];
    protected $appends = ['rating'];
    protected $with = ['tags', 'reviews'];

    public function getRatingAttribute()
    {
        $ratings = $this->ratings;
        $calcRating = 0;
        foreach ($ratings as $rating) {
            $calcRating += $rating->rating;
        }
        if ($ratings->count() > 0) {
            return $calcRating / $ratings->count();
        } else {
            return 0;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
