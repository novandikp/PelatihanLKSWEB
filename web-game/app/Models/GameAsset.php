<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameAsset extends Model
{
    use HasFactory;
    protected $fillable = ['game_id', 'path', 'featured_image'];
}
