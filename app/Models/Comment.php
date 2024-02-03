<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Presenters\CommentPresenter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['body', 'user_id'];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function presenter()
    {
        return new CommentPresenter($this);
    }

    public function scopeParent(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
