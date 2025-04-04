<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
