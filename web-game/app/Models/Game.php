<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'developer_id', 'homepage', 'enabled'
    ];

    protected $appends = ['average_rating'];

    public function developer()
    {
        return $this->belongsTo(User::class);
    }

    public function asset()
    {
        return $this->hasMany(GameAsset::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //average_rating
    public function getAverageRatingAttribute()
    {
        return round($this->comments()->avg('rate')) ?: 0;
    }
}
